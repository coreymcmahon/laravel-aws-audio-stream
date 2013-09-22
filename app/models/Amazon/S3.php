<?php namespace Amazon;

class S3 {

	private $amazonS3;

	/**
	 */
	public function __construct($amazonS3 = null)
	{
		if ($amazonS3 === null) {
			\CFCredentials::set([
				'development' => [
					'key' => \Config::get('amazon.key'),
					'secret' => \Config::get('amazon.secret'),
					'default_cache_config' => \Config::get('amazon.default_cache_config'),
					'certificate_authority' => \Config::get('amazon.certificate_authority'),
					],
				'@default' => 'development'
				]);
			$amazonS3 = new \AmazonS3();
		}
		$this->amazonS3 = $amazonS3;
	}

	/**
	 */
	public function getBuckets()
	{
		return $this->amazonS3->get_bucket_list();
	}

	/**
	 */
	public function uploadMp3File($filepath, $filename, $contentType = 'audio/mpeg3')
	{

		$response = $this->amazonS3->create_object(
			\Config::get('amazon.defaultbucket'),
			$filename,
			[
				'fileUpload'  => $filepath,
				'acl'         => \AmazonS3::ACL_PUBLIC,
				'contentType' => $contentType,
				'storage'     => \AmazonS3::STORAGE_REDUCED,
				'headers'     => [
					'Cache-Control'    => 'max-age',
					'Content-Encoding' => 'gzip',
					'Content-Language' => 'en-US',
					'Expires'          => 'Thu, 01 Dec 1994 16:00:00 GMT',
				],
			]
		);
		return $response->isOk();
	}
}