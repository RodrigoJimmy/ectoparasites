<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Guzzle\Http\Client;

class RunIrnsQueryCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'ectoparasites:runirnsquery';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Run IRNs query';

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
		$client = new Client('http://emuweb.fieldmuseum.org');

		$irns = Irn::whereRaw('response is NULL')->get();
		$total = count($irns);
		$count = 0;
		foreach ($irns as $irn)
		{
			$count++;
			$request = $client->get("/arthropod/EPDisplay.php?irn={$irn->irn}");
			$response = $request->send();
			
			$irn->response = utf8_encode($response->getBody());
			$irn->response_code = $response->getStatusCode();
			$irn->save();
			$this->info("IRN {$irn->irn} done. ($count/$total)");
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