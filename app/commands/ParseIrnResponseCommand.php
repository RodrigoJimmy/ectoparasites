<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ParseIrnResponseCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'ectoparasites:parseirnresponse';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Parse IRN response';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		// para cada IRN com response
		file_put_contents('output.csv', "irn;species;subfamily;family;order;class;phylum;host_species;host_family;region;continent;country;state;precise_location;lat;lon;collector;date_start;date_end\n");

		//foreach (Irn::whereNotNull('response')->take(25000)->get() as $irn)
		foreach (Irn::all() as $irn)
		{
			$this->info('Analysing IRN: ' . $irn->irn);
			// aplicar tidy
			$tidy = new tidy;
			$tidy_conf = array('wrap' => false);
			$tidy->parseString($irn->response, $tidy_conf, 'utf8');
			$tidy->cleanRepair();
			$body = tidy_get_output($tidy);

			/*
			if ($irn->irn == 374640)
			{
				echo $body;
			}
			*/
			// aplicar todas as regex disponíveis
			$patterns = Config::get('patterns');
			
			#### TAXONOMY ####
			$taxonomy = array();
			if (preg_match('@<b>.*Higher taxonomy.*</b>@', $body))
			{
				preg_match($patterns['taxonomy'], $body, $matches);
				$taxonomy['subfamily']	= str_replace(';', '-', $matches['subfamily']);	
				$taxonomy['family']		= str_replace(';', '-', $matches['family']);
				$taxonomy['order']		= str_replace(';', '-', $matches['order']);	
				$taxonomy['class']		= str_replace(';', '-', $matches['class']);	
				$taxonomy['phylum'] 	= str_replace(';', '-', $matches['phylum']);	
			}
						
			
			#### HOST ####			
			$host = array();
			if (preg_match('@<b>Host</b>@', $body))
			{
				preg_match($patterns['host'], $body, $matches);
				$host['species']	= str_replace(';', '-', $matches['species']);	
				$host['family']		= str_replace(';', '-', $matches['family']);	
			}
			
			#### REGION ####
			$region = array();
			if (preg_match('@<b>.*Region.*</b>@', $body))
			{
				preg_match($patterns['region'], $body, $matches);
				$region['name']		= str_replace(';', '-', $matches['name']);		
			}
			

			#### GEOGRAPHY ####		
			$geography = array();
			if (preg_match('@<b>.*Geography.*</b>@', $body))
			{
				preg_match($patterns['geography'], $body, $matches);
				$geography['continent']			= str_replace(';', '-', $matches['continent']);	
				$geography['country']			= str_replace(';', '-', $matches['country']);		
			}
			

			#### COUNTRY_GEOGRAPHY
			$country_geography = array();
			if (preg_match('@<b>.*Country geography.*</b>@', $body))
			{
				preg_match($patterns['country_geography'], $body, $matches);
				$country_geography['state']				= str_replace(';', '-', $matches['state']);	
			}
			
			#### PRECISE_LOCATION
			$precise_location = array();
			if (preg_match('@<b>.*Precise location.*</b>@', $body))
			{
				preg_match($patterns['precise_location'], $body, $matches);
				$precise_location['name']	= str_replace(';', '-', $matches['name']);	
			}

			#### LAT. LONG.
			$coordinates = array();
			if (preg_match('@<b>.*Lat / Lon \(Dec.\).*</b>@', $body))
			{
				preg_match($patterns['coordinates'], $body, $matches);
				$coordinates['lat']	= $matches['lat'];
				$coordinates['lon'] = $matches['lon'];
			}

			#### COLLECTOR ####
			$collector = array();
			if (preg_match('@<b>.*Collector\(s\).*</b>@', $body))
			{
				preg_match($patterns['collector'], $body, $matches);
				$collector['name']			= str_replace(';', '-', $matches['name']);	
			}
			
			##### COLLECTED_DATE #####
			$collected_date = array();
			if (preg_match('@<b>.*Collected date\(s\).*</b>@', $body))
			{
				preg_match($patterns['collected_date'], $body, $matches);
				$collected_date['start']	= $matches['start'];
				$collected_date['end']		= $matches['end'];	
			}

			/*
			print_r($taxonomy);
			print_r($host);
			print_r($region);
			print_r($geography);
			print_r($country_geography);
			print_r($precise_location);
			print_r($coordinates);
			print_r($collector);
			print_r($collected_date);
			*/

			$csv_output = "{$irn->irn};{$irn->search->species->name};";
			if($taxonomy)
				$csv_output .= implode(';',$taxonomy) . ';';
			else
				$csv_output .= ';;;;;';

			if($host)
				$csv_output .= implode(';',$host) . ';';
			else
				$csv_output .= ';;';

			if ($region)
				$csv_output .= implode(';',$region) . ';';
			else
				$csv_output .= ';';

			if($geography)
				$csv_output .= implode(';',$geography) . ';';
			else
				$csv_output .= ';;';

			if ($country_geography)
				$csv_output .= implode(';',$country_geography) . ';';
			else
				$csv_output .= ';';
			
			if ($precise_location)
				$csv_output .= implode(';',$precise_location) . ';';
			else
				$csv_output .= ';';

			if ($coordinates)
				$csv_output .= implode(';',$coordinates) . ';';
			else
				$csv_output .= ';;';

			if ($collector)
				$csv_output .= implode(';',$collector) . ';';
			else
				$csv_output .= ';';
			

			if ($collected_date)
				$csv_output .= implode(';',$collected_date);
			else
				$csv_output .= ';;';

			$csv_output = html_entity_decode($csv_output);

			file_put_contents('output.csv', $csv_output . "\n", FILE_APPEND);



			// verificar a que resultou em maior número de campos estraídos
			// organizar os campos
			// salvar os dados verificando registros já existentes e/ou criando novos
		}
			
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
		return array(
			array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
		return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}