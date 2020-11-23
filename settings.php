<!DOCTYPE html>
<html lang="en">
<?php include('./include/header.php') ?>


</style>
<body>
<?php include('./include/navbar.php');
include ('./change_password.php');
include ('./change_username.php');
// echo print_r($_POST);
if(isset($_POST['current_password']))
 changePassword($_POST['current_password'],$_POST['new_password'],$_COOKIE['username']);

// if(isset($_POST['new_username']))
//  changeUsername($_COOKIE['username'],$_POST['new_username']);

if(isset($_POST['logout_sure_btn']))
{
	echo 'LOGOUT';
}
?>
<div class="container w-50 h-50 bg-danger mt-5 p-3 rounded-sm">
			<h1 class="text-center">Settings</h1>
			<div class="col">
				<div class="row p-3">
				<button id='change-password-btn' class='col-12 mb-2 btn btn-secondary'>Change Password</button>
				<!-- <p style='display:none;' id='password-form'>BTN DISP</p> -->
				<form  class='col-12' style='display:none;' action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id='password-form'>
				<div class="form-group row text-center">
					<input type="text" name='current_password' class='form-control col-12 my-2' placeholder='Enter previous password' required>
					<input type="text" name='new_password' class='form-control col-12 my-2' placeholder='Enter new password' required>
					<input type="submit" class='btn btn-warning col-12 my-2' >
				</div>
				</form>
				</div>
			</div>
			
			<div class="col">
				<div class="row p-3">
				<button id='change-username-btn' class='col-12 btn btn-secondary mb-2'>About Us</button>
				<!-- <form  class='col-12' style='display:none;' action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id='email-form'>
				<div class="form-group row text-center">
					<input type="text" name='new_username' class='form-control col-12 my-2' placeholder='Enter new username' required>
					<input type="submit" class='btn btn-warning col-12 my-2' >
				</div>
				</form> -->
				<p style='display:none;' id="email-form">
				Uash
				</p>
				</div>
			</div>
			
			
		</div>
</body>
<script>
let changePasswordBtn = document.querySelector('#change-password-btn')
let changeUsernameBtn = document.querySelector('#change-username-btn')
let flags={passwordFlag:true,usernameFlag:true}
// console.log(flags.Passwordflag)
changePasswordBtn.addEventListener('click',e=>{document.querySelector('#password-form').style.display=flags.passwordFlag?'none':'block';flags.passwordFlag=!flags.passwordFlag})

changeUsernameBtn.addEventListener('click',e=>{document.querySelector('#email-form').style.display=flags.usernameFlag?'none':'block';flags.usernameFlag=!flags.usernameFlag})




</script>
</html>