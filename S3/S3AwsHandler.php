<?php

/**
 * This file is part of the NzoS3AwsBundle package.
 *
 * (c) Ala Eddine Khefifi <alakhefifi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nzo\S3AwsBundle\S3;

use Aws\S3\S3Client;

class S3AwsHandler
{
    private $awsAccessKey;
    private $awsSecret;
    private $awsRegion;
    private $awsBucket;

    public function __construct(
        string $awsAccessKey,
        string $awsSecret,
        string $awsRegion,
        string $awsBucket
    ) {
        $this->awsAccessKey = $awsAccessKey;
        $this->awsSecret = $awsSecret;
        $this->awsRegion = $awsRegion;
        $this->awsBucket = $awsBucket;
    }

    public function uploadFile(string $fileName, string $filePath): ?string
    {
        $s3 = new S3Client(
            [
                'version' => 'latest',
                'region' => $this->awsRegion,
                'credentials' => [
                    'key' => $this->awsAccessKey,
                    'secret' => $this->awsSecret,
                ],
            ]
        );
        // Upload data.
        $result = $s3->putObject(
            [
                'Bucket' => $this->awsBucket,
                'Key' => $fileName,
                'SourceFile' => $filePath,
            ]
        );

        // return the URL.
        return $result['ObjectURL'];
    }
}
