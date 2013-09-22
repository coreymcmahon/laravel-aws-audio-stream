<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CreateUser extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'create:user';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Creates a user in the database.';

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
		$email = $value = $this->argument('email');
		$password = $this->secret('Please enter a password');
		$confirmation = $this->secret('Please confirm the password');

		$user = new User();
		$validator = $user->getValidator([
				'email' => $email,
				'password' => $password,
				'password_confirmation' => $confirmation,
			]);

		if ($validator->fails()) return $this->error($validator->errors()->first());

		$user->email = $email;
		$user->password = Hash::make($password);
		$user->save();

		$this->info('User successfully added.');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('email', InputArgument::REQUIRED, 'The email for the user.'),
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