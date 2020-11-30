<?php
require_once realpath(__DIR__."/vendor/autoload.php");
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();



$host=$_ENV['HOST'];
$user=$_ENV["USER"];
$password=$_ENV["PASSWORD"];
$database=$_ENV["DATABASE"];
?>