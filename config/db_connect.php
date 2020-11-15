<?php
require('db_connect_creds.php');
$host=constant('HOST');
$user=constant('USER');
$password=constant('PASSWORD');
$database=constant('DATABASE_NAME');
$conn = new mysqli($host,$user,$password,$database);
if(mysqli_connect_errno()) {
    echo mysqli_connect_errno();
}

