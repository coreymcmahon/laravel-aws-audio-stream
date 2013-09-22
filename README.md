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
$ composer install
$ ./artisan serve
```

Update ```app/config/amazon.php``` with your AWS settings.
