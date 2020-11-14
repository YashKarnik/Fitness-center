<?php
	require './config/db_connect.php';
	if(isset($_POST['email'])) 
	{
		$error;
		$success;
		$email=$_POST['email'];
		$password=$_POST['password'];
		$query = "SELECT username FROM user_details WHERE email='{$email}' AND password='{$password}'";
		$result =mysqli_query($conn,$query);
		$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
		$username;
		if($result){
			// echo print_r($posts);
			$success=TRUE;
			if(count($posts)>0) {$username=$posts[0]['username']; 
			session_start();
			$_SESSION['username']=$username;
			header('Location: ./exercise-list.php');}
		}
		else {$error=mysqli_error($conn);
		// echo $error;
		};
	}
?>

<!DOCTYPE html>
<html lang="en">
	<?php include('./include/header.php') ?> 
	<body>
	
		<?php include('./include/navbar.php') ?>
		<div class="container w-50 h-50 bg-danger mt-5 p-3 rounded-sm">
			<h1 class="text-center">Log In</h1>
			<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="inputPassword4">Email</label>
						<input type="email" class="form-control" id="inputPassword4" required name='email'/>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="inputPassword4"> Password</label>
						<input type="password" class="form-control" id="inputPassword4" required
						minlength='5'
						name='password' 
						/>
					</div>
					<button type="submit" class="btn btn-lg btn-primary mx-auto">
						Log in
					</button>
				</div>
				<a href="./register.php" class="text-light">Not a user ? Sign up here</a>
			</form>
		</div>
		<?php include('./include/footer.php') ?>
	</body>

</html>
