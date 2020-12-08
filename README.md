NzoS3AwsBundle
==============

[![Build Status](https://travis-ci.org/nayzo/NzoS3AwsBundle.svg?branch=master)](https://travis-ci.org/nayzo/NzoS3AwsBundle)
[![Latest Stable Version](https://poser.pugx.org/nzo/s3-aws-bundle/v/stable)](https://packagist.org/packages/nzo/s3-aws-bundle)

The **NzoS3AwsBundle** is a Symfony Bundle used to handle **AWS S3** Files Upload.

##### Compatible with **Symfony >= 4.4**


Installation
------------

### Through Composer:

```
$ composer require nzo/s3-aws-bundle
```

### Register the bundle in config/bundles.php (without Flex):

``` php
// config/bundles.php

return [
    // ...
    Nzo\S3AwsBundle\NzoS3AwsBundle::class => ['all' => true],
];
```

### Configure your application's config.yml:

``` yml
# config/packages/nzo_s3_aws.yaml

nzo_s3_aws:
    aws_access_key: '%env(AWS_ACCESS_KEY)%'  required: 
    aws_secret:     '%env(AWS_SECRET)%'      required: 
    aws_region:     '%env(AWS_REGION)%'      required:  (example: eu-west-1)
    aws_bucket:     '%env(AWS_BUCKET)%'      required:  (the bucket name)
    aws_endpoint:   '%env(AWS_ENDPOINT)%'    optional:
```

Usage
-----

```php
use Nzo\S3AwsBundle\S3\S3AwsHandler;
    
    private $s3AwsHandler;

    public function __construct(S3AwsHandler $s3AwsHandler)
    {
        $this->s3AwsHandler = $s3AwsHandler;
        
        // without autowiring use: $this->get('nzo_s3_aws')
    }

    public function uploadFilesToS3Aws(string $key, string $filePath)
    {
        try {

            // $key: it represent the file name and path in the S3 Bucket. Example: "my_folder/my-image.jpg"
            // $filePath: is the absolute path to the file. Example: "/var/www/my-image.jpg"

            $awsFile = $this->s3AwsHandler->uploadFile($key, $filePath);

        } catch (\Exception $e) {
            // Unable to upload the file to AWS S3
        }
    }
```

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

See [LICENSE](https://github.com/nayzo/NzoS3AwsBundle/tree/master/LICENSE)
