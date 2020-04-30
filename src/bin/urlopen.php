#!/bin/env php
<?php

$target = "https://qiita.com/tnm18";
$fileName = "/tmp/test.txt";
$fp = fopen($target, 'r');
$fpw = fopen($fileName, 'w');

while (!feof($fp)) {
    $buffer = fread($fp, 1024);
    if ($buffer === false) {
        $size = false;
        break;
    }

    $wsize = fwrite($fpw, $buffer);
    if ($wsize === false) {
        $size = false;
        break;
    }

    $size += $wsize;
}

fclose($fb);
fclose($fpw);


