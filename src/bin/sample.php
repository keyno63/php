#/bin/env php
<?php

require '/vendor/autoload.php';
require_once 'src/lib/DBConnect.php';

$dsn = sprintf(
    'mysql:host=%s;port=%d;dbname=%s;charset=utf8mb4',
    "127.0.0.1",
    "23306",
    "sample_db"
);
$user = "user";
$pass = "user_pass";
$db = new DBConnect($dsn, $user, $pass);
