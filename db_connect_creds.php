<?php
require_once ("vendor/autoload.php");
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$host=getenv('HOST');
$user=getenv("USER");
$password=getenv("PASSWORD");
$database=getenv("DATABASE");
?>