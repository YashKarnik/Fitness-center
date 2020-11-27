<?php
require './config/db_connect.php';
$temp=$_COOKIE['username'];
$query="SELECT email FROM user_details WHERE username='{$temp}'";
$result=mysqli_query($conn,$query);
$email = mysqli_fetch_all($result,MYSQLI_ASSOC)[0]['email'];

$query="SELECT tier FROM premium_membership WHERE email='{$email}' ORDER BY date_created DESC LIMIT 1";
$result=mysqli_query($conn,$query);
$temp2=mysqli_fetch_all($result,MYSQLI_ASSOC);
	$tier =(isset($temp2[0]['tier'])) ? $temp2[0]['tier']: '';
// echo print_r($tier)
$tierhtml1='';

  if($tier=="G") $tierhtml1='<h3 data-id="'.$tier.'" class="tier-info text-warning text-center m-3 p-0">Gold Tier <img src="./static/svgs/gold-medal.svg" width="40" height="40" alt="" loading="lazy"/></h3>';

  else if($tier=="S") $tierhtml1='<h3 data-id="'.$tier.'" class="tier-info text-secondary text-center m-0 p-0">Silver Tier <img src="./static/svgs/silver-medal.svg" width="40" height="40" alt="" loading="lazy"/></h3>';
  
	else if($tier=="B") $tierhtml1='<h3 data-id="'.$tier.'" style="color:#96720f;"class="tier-info text-center m-0 p-0">Bronze Tier <img src="./static/svgs/bronze-medal.svg" width="40" height="40" alt="" loading="lazy"/></h3>';

  // echo htmlentities($tierhtml)
?>
<!-- &#10003; -->
<!DOCTYPE html>
<html lang="en">
  <?php include('./include/header.php') ?>
  <title>Todays Workout</title>
	<body>
    <?php include('./include/navbar.php') ?>
    <div class="container mt-5 rounded-lg">
      <h2 class="text-white text-center" id="table-label">
        
      </h2>
      
      <?php echo $tierhtml1 ?>
     
      <?php if($tier=='G') include('gold-exercises.php');
      else if($tier=='S') include('silver-exercises.php');
      else if($tier=='B') include('bronze-exercises.php');
      else include('no-tier-exercises.php')
      ?>
  <p id="calories-burnt" class="text-right text-white"></p>
  <p id="congrats-txt" class="display-2 text-center text-white"></p>
        
        </div>
        <?php include('./include/footer.php') ?>
	</body>
	<script>
        let d = new Date
        let days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        let date=d.getDate()
        let month=d.getMonth()
        let year=d.getFullYear()
        let day = days[d.getDay()]
        document.querySelector('#table-label').innerText=`Today's workout ${day}-${date}/${month}/${year}`
        
       

let exerciseList=document.querySelectorAll(".exercise-list")
  let len=4
exerciseList.forEach(element=>{
  let x=element.children[3].children[0] //anchor tags
  let y=element // parent of x
  console.log({x,y})
  x.addEventListener('click',e=>{
    y.remove();
    len-=1
    console.log(len)
    if(len==0) {
      document.getElementsByClassName('thread-dark')[0].remove()
      document.getElementsByClassName('workout-type')[0].remove()
      document.getElementById('congrats-txt').innerHTML='CONGRATULATIONS!!'
      let tierHeading=document.querySelector(".tier-info").getAttribute('data-id');
      if(tierHeading=="G") {document.getElementById("calories-burnt").innerHTML= '<h3>1000 Calories Burnt!</h3>'}
    }
  })
  
  })


	</script>
</html>
