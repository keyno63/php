#!/bin/env php
<?php
require '/vendor/autoload.php';

use GuzzleHttp\Client;

$fileName = "/tmp/file.txt";
$rsc = fopen($fileName, "w");
    $client = new Client();
    $client->request('GET', 'https://qiita.com/tnm18', array(
        "sink" => $rsc,
    ));