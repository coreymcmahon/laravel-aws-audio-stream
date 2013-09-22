<?php 

class StreamsController extends BaseController {

	private $amazonS3;

	public function __construct($amazonS3 = null)
	{
		if ($amazonS3 === null) $amazonS3 = new Amazon\S3();
		$this->amazonS3 = $amazonS3;

		$this->beforeFilter('auth');
	}

	public function index()
	{
		return View::make('streams.index')
			->with('streams', Stream::all());
	}

	public function create()
	{
		return View::make('streams.create');
	}

	public function store()
	{
		$file = Input::file('file');

		if ($file === null) return Redirect::to('/streams')
			->with('error_message', 'Valid file must be provided.');

		if (strtolower($file->getClientOriginalExtension()) !== 'mp3') return Redirect::to('/streams')
			->with('error_message', 'Only MP3 file format supported.');

		$filesize = $file->getClientSize();
		$originalFilename = $file->getClientOriginalName();
		$filename = str_random(16) . '.mp3';

		$filepath = $file->getPath() . '/' . $file->getFilename();

		if ($this->amazonS3->uploadMp3File($filepath, $filename)) {
			Stream::create([
				'name' => $filename,
				'filesize' => $filesize,
				'user_id' => Auth::user()->id,
				'original_name' => $originalFilename,
				//'url' => $this->amazonS3->getFileUrl($filename),
			]);
			return Redirect::to('/streams')
				->with('success_message', 'Stream successfully added.');
		} else {
			return Redirect::to('/streams')
				->with('error_message', 'Error occurred while trying to add stream.');
		}
	}

	public function show($id)
	{
		// @TODO: implement
	}

	public function edit($id)
	{
		// @TODO: implement
	}

	public function update($id)
	{
		// @TODO: implement
	}

	public function destroy($id)
	{
		// @TODO: implement
	}

	public function playStream($id)
	{
		return View::make('streams.play')
			->with('stream', Stream::find($id));
	}
}