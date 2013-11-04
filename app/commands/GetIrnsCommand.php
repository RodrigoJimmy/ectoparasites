<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class GetIrnsCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'ectoparasites:getirns';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Get IRNs from searches responses';

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
		$searches = Search::all();

		$pattern = '/EPDisplay.php\?irn=(?<irn>\d+)&amp;/';

		foreach ($searches as $search)
		{
			if ($search->parsed)
			{
				continue;
			}	

			if (preg_match_all($pattern, $search->response, $matches))
			{
				$irns = $matches['irn'];
				$total_irns = count($irns);
				foreach ($irns as $irn_number)
				{

					$irn = new Irn(array('irn' => $irn_number));
					
					try{
						$aux = Irn::where('irn', '=', $irn_number)->firstOrFail();
						echo "\nIRN duplicado $irn, em searches {$aux->search->id} e {$search->id}";
					}catch(Exception $e)
					{
						$irn = $search->irns()->save($irn);
					}
					
				}
			}
			else
			{
				echo "\n{$search->species->name}: no IRNs found ====";
				$total_irns = 0;
			}

			$search->parsed = True;
			$search->irns_found = $total_irns;
			$search->save();
			
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