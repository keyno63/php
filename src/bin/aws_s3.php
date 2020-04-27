#!/bin/env php
<?php
require '/vendor/autoload.php';


use Aws\S3\S3Client;
use Aws\Exception\AwsException;

$key = $argv[1];
$secret = $argv[2];

$s3Client = S3Client::factory([
    'credentials' => [
        'key' => $key,
        'secret' => $secret
    ],
    'region' => 'us-east-2',
    'version' => 'latest'
]);

$bucketName = "kofujiw-s3bucket";
$key = "sample1.txt";

try {
    $content = $s3Client->getObject(
        [
            'Bucket' => $bucketName,
            'Key' => $key,
        ]
    );
} catch (\Exception $e) {
    echo "failed get file = [$key], reason: " . $e->getMessage();
    exit(1);
}
$content['Body']->rewind();

$fileName = "/tmp/file.txt";

// ファイルの保存
$fp = fopen($fileName, 'w');
fputs($fp, $content['Body']->read($content['ContentLength']));
fclose($fp);
