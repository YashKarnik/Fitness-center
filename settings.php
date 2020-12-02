<!DOCTYPE html>
<html lang="en">
<?php include('./include/header.php') ?>
<title>Settings</title>

<body>
	<style>
		.style-img {
			padding: 0;
			border-top-left-radius: 10px;
			border-bottom-left-radius: 10px;
		}

		.userdetails-form {
			border: 4px solid black;
			padding: 10px;
			border-radius: 10px;
		}

		.ind-comp {
			background-color: orange;
			border-radius: 10px;

		}
	</style>
	<?php include('./include/navbar.php');
	require './config/db_connect.php';
	$prodImgRefs = array(
		"Whey protein (Standard)" => "./static/images/products-images/whey/whey_protien.jpg",
		"Whey protein (Isolate)" => "./static/images/products-images/whey/whey_protien_isolate.jpg",
		"Whey protein (Gold)" => "./static/images/products-images/whey/whey_protien_gold.jpg",
		"BCAA (Standard)" => "./static/images/products-images/bcaa/bcaa_normal.jpg",
		"BCAA (Pro)" => "./static/images/products-images/bcaa/bcaa_pro.jpg",
		"BCAA (Gold)" => "./static/images/products-images/bcaa/bcaa_gold.jpg",
		"Creatine Monohydrate (Standard)" => "./static/images/products-images/creatine/creatine_1.jpg",
		"Creatine Monohydrate (Isolate)" => "./static/images/products-images/creatine/creatine_2.jpg",
		"Creatine Monohydrate (Gold)" => "./static/images/products-images/creatine/creatine_3.jpg",
		"Mass Gainers (Standard)" => "./static/images/products-images/mass_gainer/mass_gainer_1.jpg",
		"Mass Gainers (Isolate)" => "./static/images/products-images/mass_gainer/mass_gainer_pro.jpg",
		"Mass Gainers (Gold)" => "./static/images/products-images/mass_gainer/mass_gainer_gold.jpg"
	);



	$success = '';
	include('./change_password.php');
	include('./change_username.php');
	if (isset($_POST['current_password']))
		$success = changePassword($_POST['current_password'], $_POST['new_password'], $_COOKIE['username']);


	// Shopping History
	$temp = $_COOKIE['email'];
	$query = "SELECT item,purchaced_on,item_cost FROM buying_details WHERE email='{$temp}'";
	$result = mysqli_query($conn, $query);
	$list = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// 



	?>
	<?php echo $success ?>
	<div class="container w-50 h-50 bg-danger mt-5 p-3 rounded-sm">
		<h1 class="text-center">@<?php echo $_COOKIE['username'] ?></h1>

		<div class="col">
			<div class="row p-3">
				<button id='change-password-btn' class='col-12 mb-2 btn btn-secondary'>Change Password</button>
				<form class='col-12' style='display:none;' action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id='password-form'>
					<div class="form-group row text-center">
						<input type="text" name='current_password' class='form-control col-12 my-2' placeholder='Enter previous password' required>
						<input type="text" name='new_password' class='form-control col-12 my-2' placeholder='Enter new password' required>
						<input type="submit" class='btn btn-warning col-12 my-2'>
					</div>
				</form>
			</div>
		</div>
		<div class="col">
			<div class="row p-3">
				<button id='userdetails-btn' class='col-12 btn btn-secondary mb-4'>Shopping History</button>
				<div style="display:none;" class="container userdetails-form">
					<?php if (count($list) > 0) : ?>
						<?php foreach ($list as  $value) : ?>
							<div class="ind-comp m-3 row " style="border-bottom:5px;">
								<img class='style-img col-3' src="<?php echo $prodImgRefs[$value['item']] ?>" height="130" width="130" alt="Img">
								<div class="col-9 text-left" style="font-size:1.3rem;">
									<b><?php echo $value['item'] ?><br></b>
									<hr>
									<?php echo "Purchaced on: " . $value['purchaced_on'] ?><br>
									<?php echo "Cost: $" . $value["item_cost"] ?>
								</div>
							</div>
						<?php endforeach ?>
					<?php else : ?>
						<h2 class="text-center">No orders played yet.</h2>
					<?php endif ?>
				</div>
			</div>


		</div>
</body>
<script>
	let changePasswordBtn = document.querySelector('#change-password-btn')
	let changeUsernameBtn = document.querySelector('#userdetails-btn')
	let flags = {
		passwordFlag: true,
		usernameFlag: true
	}
	// console.log(flags.Passwordflag)
	changePasswordBtn.addEventListener('click', e => {
		document.querySelector('#password-form').style.display = flags.passwordFlag ? 'none' : 'block';
		flags.passwordFlag = !flags.passwordFlag
	})

	changeUsernameBtn.addEventListener('click', e => {
		document.querySelector('.userdetails-form').style.display = flags.usernameFlag ? 'none' : 'block';
		flags.usernameFlag = !flags.usernameFlag
	})
</script>

</html>