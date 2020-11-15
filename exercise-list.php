<?php
require './config/db_connect.php';
$temp=$_COOKIE['username'];
$query="SELECT email FROM user_details WHERE username='{$temp}'";
$result=mysqli_query($conn,$query);
$email = mysqli_fetch_all($result,MYSQLI_ASSOC)[0]['email'];

$query="SELECT tier FROM premium_membership WHERE email='{$email}' ORDER BY date_created DESC LIMIT 1";
$result=mysqli_query($conn,$query);
$tier = mysqli_fetch_all($result,MYSQLI_ASSOC)[0]['tier'];
echo print_r($tier)
?>

<!DOCTYPE html>
<html lang="en">
<?php include('./include/header.php') ?>
	<body>
	<?php include('./include/navbar.php') ?>
	<div class="container mt-5 rounded-lg">
        <h2 class="text-white text-center" id='table-label'></h2>
        <table class="table text-white text-center bg-dark ">
            <thead  class='thread-dark' >
              <tr>
                  <th scope="col">Exercise</th>
                  <th scope="col">Reps &times; Sets</th>
                  <th scope="col">Weight</th>
                  <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
            
            </tbody>
          </table>
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
		
	</script>
</html>
