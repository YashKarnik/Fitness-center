<?php
require './config/db_connect.php';
$buyrequest=$_GET['x'];  
$buyrequest=(explode(',',$buyrequest));

$costDict = array(
"Whey protein (Standard)"=>100,
"Whey protein (Isolate)"=>200,
"Whey protein (Gold)"=>300,
"BCAA (Standard)"=>100,
"BCAA (Pro)"=>200,
"BCAA (Gold)"=>300,
"Creatine Monohydrate (Standard)"=>100,
"Creatine Monohydrate (Isolate)"=>200,
"Creatine Monohydrate (Gold)"=>300,
"Mass Gainers (Standard)"=>100,
"Mass Gainers (Isolate)"=>200,
"Mass Gainers (Gold)"=>300);

session_start();
$username=$_SESSION['username'];
$query_temp = "SELECT email,address FROM user_details WHERE username='{$username}'";
$result_temp = mysqli_query($conn,$query_temp);
$post_temp = mysqli_fetch_all($result_temp,MYSQLI_ASSOC)[0];
$address = $post_temp['address'];
$email =$post_temp['email'];

foreach ($buyrequest as $item) {
    $cost=$costDict[$item];
    $query="INSERT INTO buying_details(email,item,item_cost,address) VALUES('{$email}','{$item}','{$cost}','{$address}')";
    if(mysqli_query($conn,$query))	echo "<div class='alert alert-success mx-auto col-md-10' role='alert'>{$item} will be shipped shortly</div>";
    else echo "<div class='alert alert-danger col-md-10 mx-auto' role='alert'>{$item} failed to deliver</div>";
}


?>
