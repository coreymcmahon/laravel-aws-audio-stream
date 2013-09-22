laravel-aws-audio-stream
========================

Small proof of concept application showing how audio files (MP3s) can be streamed from S3 using CloudFront and JWPlayer.


Requirements
========================
* AWS account with S3 and CloudFront enabled
* AWS key and secret key
* Name of a bucket created in S3


Usage
========================

To install:

```
$ git clone git@github.com:coreymcmahon/laravel-aws-audio-stream.git
$ cd laravel-aws-audio-stream
$ chmod -R 777 app/storage/
```

Update ```app/config/amazon.php``` with your AWS settings.

Update ```app/config/database.php``` with your database settings.

```
$ composer install
$ ./artisan migrate
$ ./artisan serve
```


Notes
========================

* You'll probably need to update your `upload_max_filesize` setting (default is 2 MB).
