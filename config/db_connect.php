<?php
require 'db_connect_creds.php';
// $host=$host;
// $user=$user;
// $password=$PASSWORD;
// $database=$DATABASE_NAME;
$conn = new mysqli($host,$user,$password,$database);
if(mysqli_connect_errno()) {
    echo 'FAIL'.mysqli_connect_errno();
}

?>
