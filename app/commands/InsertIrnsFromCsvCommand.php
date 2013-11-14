<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class InsertIrnsFromCsvCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'ectoparasites:insertirnsfromcsv';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Insert IRNs from CSV file';

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
		if ($csv_file = fopen('ausentes.csv', 'r'))
		{
			while ($line = fgets($csv_file))
			{
				$line = explode(';', $line);
				$irn_number = (int) $line[0];
				
				try{
					Irn::whereRaw("irn = $irn_number")->firstOrFail();
					echo "OPA, IRN: $irn_number já cadastrado\n";
				}catch(Exception $e)
				{
					
					$irn = new Irn;
					$irn->irn = $irn_number;
					$irn->search_id = 556;
					$irn->save();	
					
				}
/*
				if ( $x = Irn::whereRaw("irn = $irn_number") ) 
				{
					echo "OPA, IRN: $irn_number já cadastrado\n";
					print_r($x);
					die();
				}
				else
				{
					
					$irn = new Irn;
					$irn->irn = $irn_number;
					$irn->search_id = 556;
					$irn->save();	
					die();
				}
				*/
			}
		}
		else
		{
			die("Falha ao abrir arquivo csv");
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