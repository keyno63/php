#!/bin/env php
<?php
set_include_path("/opt/project");

require '/vendor/autoload.php';
require_once 'src/lib/DBConnect.php';

$dsn = sprintf(
    'mysql:host=%s;port=%d;dbname=%s;charset=utf8mb4',
    "mysql57_phptest",
    "3306",
    "sample_db"
);
$user = "user";
$pass = "user_pass";
$db = new PDO($dsn, $user, $pass);
