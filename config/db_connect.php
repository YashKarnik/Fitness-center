<?php
// include(__DIR__.'\..\db_connect_creds.php');
$host="localhost";
$user="root";
$password="";
$database="avbc";
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
