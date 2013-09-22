<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class S3Request extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'amazon:s3';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Execute an S3 request.';

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
		if (strtolower($this->argument('request')) == 'test') {
			$amazonS3 = new Amazon\S3();
			$this->info('Fetching buckets...');
			
			$this->info("\nBuckets:");
			foreach($amazonS3->getBuckets() as $bucket) {
				$this->info("\t* $bucket");
			}
			
			$this->info("\nDone.");
		} elseif (strtolower($this->argument('request')) == 'config') {
			$this->info("\nConfiguration");
			$this->info("\tenvironment:           " . App::environment());
			$this->info("\tkey:                   " . Config::get('amazon.key'));
			$this->info("\tsecret:                " . Config::get('amazon.secret'));
			$this->info("\tdefault_cache_config:  " . Config::get('amazon.default_cache_config'));
			$this->info("\tcertificate_authority: " . Config::get('amazon.certificate_authority'));
			$this->info("\tdefaultbucket:         " . Config::get('amazon.defaultbucket') . "\n");
		}

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('request', InputArgument::REQUIRED, 'The request.'),
			array('param1', InputArgument::OPTIONAL, 'Parameter 1.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			//array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}