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
