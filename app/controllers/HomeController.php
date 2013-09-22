<?php

class HomeController extends BaseController {

	private $amazonS3;

	public function __construct(Amazon\S3 $amazonS3)
	{
		$this->amazonS3 = $amazonS3;

		$this->beforeFilter('auth');
	}

	public function getIndex()
	{
		if (!Auth::check()) return Redirect::to('/auth');

		return Redirect::to('/streams');

		//return View::make('home.index');
		//->with('buckets', $this->amazonS3->getBuckets());
	}

}