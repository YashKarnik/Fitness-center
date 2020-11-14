<?php
$host='localhost';
$user='root';
$password='';
$database='fitness_center';
$conn = new mysqli($host,$user,$password,$database);
if(mysqli_connect_errno()) {
    echo 'FAIL'.mysqli_connect_errno();
}

?>
