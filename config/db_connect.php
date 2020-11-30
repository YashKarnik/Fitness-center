<?php
include(__DIR__."/../db_connect_creds.php");
$conn = new mysqli($host,$user,$password,$database);
if(mysqli_connect_errno()) {
    echo 'FAIL'.mysqli_connect_errno();
    // echo mysqli_error($conn);
}



?>
