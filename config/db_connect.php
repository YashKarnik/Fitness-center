<?php
// include(__DIR__.'\..\db_connect_creds.php');
$host="mariadb105-cfa1.euw2.cloud.ametnes.com";
$user="dQpjwsLEmO";
$password="8btlbGDGu70rbeWjPQUs";
$database="2428473479";
require_once ("vendor/autoload.php");

//$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'\\..\\');
//$dotenv->load();
//$conn = new mysqli($_ENV['HOST'],$_ENV['USER'],$_ENV['PASSWORD'],$_ENV['DATABASE']);
$conn = new mysqli($host,$user,$password,$database);
if(mysqli_connect_errno()) {
    echo 'FAIL'.mysqli_connect_errno();
    mysqli_error($conn);
}

?>
