<?php
// include(__DIR__.'\..\db_connect_creds.php');
// $host=$host;
// $user=$user;
// $password=$PASSWORD;
// $database=$DATABASE_NAME;
require_once (__DIR__."/../vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/../");
$dotenv->load();
$conn = new mysqli($_ENV['HOST'],$_ENV['USER'],$_ENV['PASSWORD'],$_ENV['DATABASE']);
if(mysqli_connect_errno()) {
    echo 'FAIL'.mysqli_connect_errno();
    mysqli_error($conn);
}

?>
