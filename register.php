<?php
	require './config/db_connect.php';
	if(isset($_POST['username']) and $_POST['password1']==$_POST['password2']) 
	{
		$error;
		$passerror;
		$success;
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password1'];
		$address=$_POST['address'];
		$city=$_POST['city'];
		$age=$_POST['age'];
		$zip=$_POST['zip'];
		$gender=strtoupper($_POST['gender'][0]);
		$query = "INSERT INTO user_details (username,email,password,address,city,age,zip,gender) VALUES ('{$username}','{$email}','{$password}','{$address}','{$city}','{$age}','{$zip}','{$gender}')";
		if(mysqli_query($conn,$query)){
			$success=TRUE;
		}
		else {$error=mysqli_error($conn);
		};
	}
	else if(isset($_POST['username']) and $_POST['password1']!==$_POST['password2']) {
		$passerror=TRUE;
	}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('./include/header.php') ?> 
	<body>
		<?php include('./include/navbar.php') ?>
		<img
			src="./static/favicon/favicon.svg"
			class="dead-center bg-img"
			alt="gg"
		/>
			<?php if(isset($error)): ?>
			<div class="alert alert-danger 	col-md-10 text-center font-weight-bold mx-auto mt-5 mb-0" role="alert">
 			<h4>ERROR! User already exists. Select different username or email</h4>
			</div>
			<?php endif?>	
			<?php if(isset($passerror)): ?>
			<div class="alert alert-danger 	col-md-10 text-center font-weight-bold mx-auto mt-5 mb-0" role="alert">
 			<h4>ERROR! Passwords do not match</h4>
			</div>
			<?php endif?>	
			<?php if(isset($success)): ?>
			<div class="alert alert-success col-md-10 text-center font-weight-bold mx-auto mt-5 mb-0" role="alert">
 			<h4>Successfully registered!!</h4>
			</div>
			<?php endif?>	
		<div class="container bg-danger mt-5 p-3 rounded-sm">
			<h1 class="text-center">Sign Up</h1>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputEmail4">Username</label>
						<input type="name" class="form-control" id="inputEmail4" name='username' required />
					</div>
					<div class="form-group col-md-6">
						<label for="inputPassword4">Email</label>
						<input type="email" class="form-control" id="inputPassword4" name='email' required />
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputEmail5">Password</label>
						<input type="password" class="form-control" id="inputEmail5" minlength="5" required name='password1' />
					</div>
					<div class="form-group col-md-6">
						<label for="inputPassword5">Confirm Password</label>
						<input type="password" class="form-control" id="inputPassword5" minlength="5" required name='password2' />
					</div>
				</div>
				<div class="form-group">
					<label for="inputAddress" >Address</label>
					<input
						type="text"
						class="form-control"
						id="inputAddress"
						placeholder="1234 Main St"
						required
						name='address'
					/>
				</div>

				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="inputCity">City</label>
						<input type="text" class="form-control" id="inputCity" required name='city' />
					</div>
					<div class="form-group col-md-3">
						<label for="inputAge">Age</label>
						<input type="number" class="form-control" id="inputAge" required name='age'/>
					</div>

					<div class="form-group col-md-3">
						<label for="inputZip">Zip</label>
						<input type="text" class="form-control" id="inputZip" required name='zip'/>
					</div>
					<div class="form-group col-md-3">
						<label for="inputZip" class="my-2">Gender</label><br />
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="male"
								value="male"
								name="gender"
								class="custom-control-input"
								required
							/>
							<label class="custom-control-label" for="male">Male</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="female"
								value="female"
								name="gender"
								class="custom-control-input"
							/>
							<label class="custom-control-label" for="female">Female</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="other"
								value="other"
								name="gender"
								class="custom-control-input"
							/>
							<label class="custom-control-label" for="other">Other</label>
						</div>
					</div>
					<button
						type="submit"
						class="btn btn-primary btn-lg display-3 mx-auto text-center"
					>
						Submit
					</button>
				</div>
				<a href="logIn.php" class="text-light">Already a user ? Sign in here</a
				><br />
			</form>
		</div>
	</body>
	<script>
		document.getElementsByName('gender').forEach(element => {
			element.addEventListener('input', e => console.log(e.target.id));
		});
	</script>
</html>
