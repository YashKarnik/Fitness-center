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
$username=$_COOKIE['username'];
$query_temp = "SELECT email,address FROM user_details WHERE username='{$username}'";
$result_temp = mysqli_query($conn,$query_temp);
$post_temp = mysqli_fetch_all($result_temp,MYSQLI_ASSOC)[0];
$address = $post_temp['address'];
$email =$post_temp['email'];
$tierhtml;
$discount=0;

if(isset($_COOKIE['username'])) {
	$temp=$_COOKIE['username'];
	$query="SELECT email FROM user_details WHERE username='{$temp}'";
	$result=mysqli_query($conn,$query);
	$email = mysqli_fetch_all($result,MYSQLI_ASSOC)[0]['email'];
	$query="SELECT tier FROM premium_membership WHERE email='{$email}' ORDER BY date_created DESC LIMIT 1";
    $result=mysqli_query($conn,$query);
    $x=mysqli_fetch_all($result,MYSQLI_ASSOC);
	$tier = isset($x[0]['tier'])?$x[0]['tier']:'';
    $tierhtml='';
    if($tier=="G") { $tierhtml="<div class='alert alert-warning mx-auto col-md-10' role='alert'><b>GOLD </b>Membership detected!!<b>10% OFF AND FREE DELIVERY (Same Day)</b></div>";
    $discount=0.1;
    
    }
    
    else if($tier=="S") {   $tierhtml="<div class='alert alert-secondary mx-auto col-md-10' role='alert'><b>SILVER </b>Membership detected!!<b>5% OFF AND FREE DELIVERY (Two Business Days)</b></div>";
        $discount=0.1;
    }
    
    else if($tier=="B") {   $tierhtml="<div class='alert alert-light mx-auto col-md-10' role='alert'><b>BRONZE </b>Membership detected!!<b>5% OFF your purchase</b></div>";
        $discount=0.05;
    }
}


echo $tierhtml;
foreach ($buyrequest as $item) {
    $cost_d=$costDict[$item]*$discount;
    $cost=$costDict[$item]-$cost_d;
    $query="INSERT INTO buying_details(email,item,item_cost,address) VALUES('{$email}','{$item}','{$cost}','{$address}')";
    if(mysqli_query($conn,$query))	echo "<div class='alert alert-success mx-auto col-md-10' role='alert'><b>Congrats! $" .$cost_d." Saved!! on {$item}</b>.Item will be shipped shortly</div>";

    else echo "<div class='alert alert-danger col-md-10 mx-auto' role='alert'>{$item} failed to deliver</div>";


}
?>
