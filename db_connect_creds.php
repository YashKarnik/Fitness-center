<?php
require_once ("vendor/autoload.php");
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$host=$_ENV['HOST'];
$user=$_ENV["USER"];
$password=$_ENV["PASSWORD"];
$database=$_ENV["DATABASE"];
?>