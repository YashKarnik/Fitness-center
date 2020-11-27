<?php 
require './config/db_connect.php';
// require './get_usename.php';
// echo getUsername();





if(isset($_POST['email']) && isset($_COOKIE['username'])){
		$success;
		$error;
		$error2;
		$email=$_POST['email'];
		$tier=strtoupper($_POST['tier'][0]);
		$duration=$_POST['duration'];
		if($tier=='G')	$cost=$duration*100;
		else if($tier=='S')	$cost=$duration*50;
		else if($tier=='B')	$cost=$duration*25;
		$cost=$cost*1.05;
		$query_temp = "SELECT username FROM user_details WHERE email='{$email}'";
		$result_temp = mysqli_query($conn,$query_temp);
		$posts_temp = mysqli_fetch_all($result_temp,MYSQLI_ASSOC);
		if(count($posts_temp)>0) 	
		{	
			$query="INSERT INTO premium_membership(email,tier,duration,cost,date_expiry) VALUES('{$email}','{$tier}','{$duration}','{$cost}',DATE_ADD(CURRENT_TIMESTAMP, INTERVAL {$duration} MONTH))";
			// echo $query;
			if(mysqli_query($conn,$query))	$success=TRUE;
			else 	$error2=mysqli_error($conn);
		}
		else $error=TRUE;
	}
	else if(empty($_COOKIE['username']) && isset($_POST['email'])) $error=TRUE;
	

?>
<!DOCTYPE html>
<html lang="en">

	<?php include('./include/header.php') ?>
	<title>Premium Membership</title>
	<body >
		<?php include('./include/navbar.php'); 
		
		?>
		
		<?php if(isset($success)): ?>
			<div class="alert alert-success col-md-6 text-center font-weight-bold mx-auto mt-5 mb-0" role="alert">
 			<h4>Successfully activated!</h4>
			</div>
		<?php endif?>
		<?php if(isset($error)): ?>
			<div class="alert alert-danger 	col-md-6 text-center font-weight-bold mx-auto mt-5 mb-0" role="alert">
 			<h4>ERROR! Invalid email</h4>
			</div>
		<?php endif?>
	
		<?php if(isset($error2)): ?>
			<div class="alert alert-danger col-md-6 text-center font-weight-bold mx-auto mt-5 mb-0" role="alert">
 			<h4>Error!! Couldn't connect to database <br><?php echo $error2 ?></h4>
			</div>
		<?php endif ?>
		<div class="container w-50 h-50 bg-danger mt-5 p-3 rounded-sm">
			<?php if(!$tierhtml): ?>
			<h1 class="text-center">Premium Membership</h1>
			<form method="POST" action='<?php echo $_SERVER['PHP_SELF'];  ?>'>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="inputPassword4">Email</label>
						<input type="email" name='email' class="form-control" id="inputPassword4" required/>
					</div>
				</div>
				<div class="form-group col-md-12 text-center">
					<label for="inputZip" class="my-2"
						><h3 id="tier-cost">Select Tier</h3></label
					><br />
					<div class="custom-control custom-radio custom-control-inline">
						<input
							type="radio"
							id="gold"
							name="tier"
							value="gold"
							class="custom-control-input"
							required
						/>
						<label class="custom-control-label" for="gold">Gold</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input
							type="radio"
							id="silver"
							name="tier"
							value="silver"
							class="custom-control-input"
						/>
						<label class="custom-control-label" for="silver">Silver</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input
							type="radio"
							id="bronze"
							name="tier"
							class="custom-control-input"
							value="bronze"
						/>
						<label class="custom-control-label" for="bronze">Bronze</label>
					</div>
				</div>
				<div class="form-group col-md-12 text-center">
					<label  for="membership-duration"><h3 id="membership-duration-label">Set Duration</h3></label>
					<input type="range" min="1" max="24" value="3" style="width: 100%;margin-bottom: 2rem;" id="membership-duration" name='duration' required>
				</div>
				<div class="form-row">
				
					<button id="activate-btn" type="submit" class="btn btn-lg btn-success mx-auto">
						Activate
					</button>
				</div>
				<p class='m-0 mt-1 p-0 text-center'>(Inclusive of all taxes)</p>
			</form>
			<?php else: ?>
			<?php $enlargedTierSVG = $tierhtml;
			$enlargedTierSVG=str_replace('width="20"','width="80"',$enlargedTierSVG);
			$enlargedTierSVG=str_replace('height="20"','height="80"',$enlargedTierSVG);
			?>
			<p class='text-center'><?php echo $enlargedTierSVG?></p>
			<h1 class='text-center'>Membership Already Active.<br>
			<span><h3>Expires on <?php echo $date_expiry?></h3></span> 
			
			<a href="./cancel-membership.php">
			<button class='btn btn-warning btn-lg'>Cancel?</button>
			</a>
			</h1>
			<?php endif ?>
		</div>
		
		  <?php include('./include/footer.php') ?>
	</body>
	<script>
		let radiobtn = document.getElementsByName('tier');
		let tierCost = document.getElementById('tier-cost');
		let membershipDuration = document.getElementById('membership-duration');
		let mebershimpDurationLabel = document.getElementById('membership-duration-label');
		let activateBtn = document.getElementById('activate-btn');
		let totalCost=0
		let dur=0
		let costdict= {'gold':100,'silver':50,'bronze':25}
		radiobtn.forEach(element => {
			element.addEventListener('input', e => {
				let x = e.target.id;
				cost=costdict[x]
				tierCost.innerText =
					x.charAt(0).toUpperCase() + x.slice(1) + ` ($${cost}/month)`;
				totalCost=dur*cost*1.05
				activateBtn.innerText=`($${totalCost}) Activate`
			});
		});
		membershipDuration.addEventListener('input',(e)=>{
			mebershimpDurationLabel.innerText=e.target.value+' Months';
			dur=e.target.value
			totalCost=dur*cost*1.05
			activateBtn.innerText=`($${totalCost}) Activate`
		})
	</script>
</html>
