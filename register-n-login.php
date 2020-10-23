<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>Log In</title>
		<link rel="stylesheet" href="register-n-login.css" />
	</head>
	<body>
	
		<div class="login">
			<h1>Login to Web App</h1>
			<form method="POST" action="success.php">
				<input
					type="email"
					name="login"
					placeholder="Username or Email"
				/>
				<br />
				<input
					type="password"
					name="password"
					
					placeholder="Password"
				/>
				<br />
				<input type="submit" name="commit" value="Login" />
			</form>
		</div>

		<div class="login-help">
			<p>Forgot your password? <a href="#">Click here to reset it</a>.</p>
		</div>
	</body>
</html>
