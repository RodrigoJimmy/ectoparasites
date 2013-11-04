<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Guzzle\Http\Client;

class RunSearchesCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'ectoparasites:runsearches';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Run searches stored in database';

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
		// Guzzle
		$client = new Client('http://emuweb.fieldmuseum.org');


		// pega todas as buscas
		$searches = Search::all();
		foreach ($searches as $search)
		{
            
			if (! $search->response)
            {
				echo $search->species->name . "\n";
				$request = $client->post('/arthropod/EPResultsList.php', array(), array(
					'QueryName' => 'DetailedQuery',
					'StartAt'	=> '1',
					'QueryPage'	=> '/arthropod/ectoparasites.php',
					'Restriction'	=>  "CatCatalog = 'Insects' AND ((CatCatalogSubset = 'Bat flies') OR (CatCatalogSubset = 'Louse'))",
					'col_IdeFiledAsQualifiedName' => $search->species->name,
					'col_IdeFiledAsFamily'	=> '',
					'col_IdeFiledAsOrder'	=> '',
					'col_HosOtherHostTaxonRef_tab->etaxonomy->ClaScientificName'	=> '',
					'col_HosOtherHostTaxonRef_tab->etaxonomy->ClaFamily'			=> '',
					'col_LotRegionSingleValue'	=> '',
					'col_PriContinentLocal'		=> '',
					'col_PriCountryLocal'		=> '',
					'col_PriProvinceLocal'		=> '',
					'col_PriSiteCENumberRef->ecollectionevents->ColParticipantLocal_tab'	=> '',
					'col_CatTypesPresent'		=> '',
					'col_date_PriDateVisitedFromLocal'	=> '',
					'LimitPerPage'	=> 750000,
					'Search'	=> 'Search'
				));

				$response = $request->send();
				
				$search->response = utf8_encode($response->getBody());

				if ( ! strstr($search->response, '</html>') )
				{
					$search->response = NULL;	
				}

				$search->response_code = $response->getStatusCode();
				$search->save();
			}
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