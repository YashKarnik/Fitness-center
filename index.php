<!DOCTYPE html>
<html lang="en">

<?php include('include/header.php') ?>

<title>Fitness Center</title>

<body>

	<?php include('include/navbar.php') ?>

	<div class="container-fuild">
		<div class="row">
			<div class="col-lg-8 text-center p-5">
				<div class="card mb-5">
					<div class="card-header">
						This company helped me loose a ton of excess weight
					</div>
					<div class="card-body">
						<blockquote class="blockquote mb-0">
							<footer class="blockquote-footer text-right">Silvester Stallone in <cite title="Source Title">Mens Health</cite></footer>
						</blockquote>
					</div>
				</div>
				<div class="card mb-5">
					<div class="card-header">
						Helped me acheive my fitness goals. Great Service and supplements
					</div>
					<div class="card-body">
						<blockquote class="blockquote mb-0">
							<footer class="blockquote-footer text-right">Ryan Renolds in <cite title="Source Title">Weekly exercise</cite></footer>
						</blockquote>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h5>Body Mass Index Calculator (BMI) (mass/height<sup>2</sup>)</h5>
					</div>
					<div class="card-body">
						<blockquote class="blockquote mb-0" style='color:grey; font-size:1.3rem;'>
							<div class="row">
								<div class="col">
									<label for="weight">Weight (Kg)</label>
									<input type="number" placeholder='Weight (Kg)' class="form-control" id="weight" />
								</div>
								&divide;

								<div class="col">
									<label for="height">Height (Ft)</label>
									<input type="number" placeholder='Height (ft)' class="form-control" id="height" />
								</div>
								=

								<div class="col">
									<label for="BMI">BMI</label>
									<p id='bmi' style='margin:0; padding:0;color:black;'></p>
									<p id='bmi-res' style='margin:0; padding:0;'></p>
								</div>

						</blockquote>
					</div>
				</div>
			</div>
			<div class="col-lg-4 text-center">
				<img src="./static/images/male-bodybuilder.png" id="bodybuilder" alt="" height='600' width='430'>
			</div>
		</div>

	</div>
	<div class="footer">
		<div class="text-center"><img src="./static/images/products-images/whey_protein_generic.jpg" alt="" srcset=""></div>
		<div>
			<p class="display-3 text-left">Tested.Trusted.</p>
			<p class="display-4 text-left text-danger">Truth in every bottle.</p>
			<div id="supplement-review">
				<img src="./static/svgs/Left_square_bracket.svg" id="supplement-review-bracket-left" alt="" srcset="">
				<img src="./static/svgs/Left_square_bracket.svg" id="supplement-review-bracket-right" alt="" srcset="">
				<p class="display-5 text-left">One of the best supplements in the market</p>
				<p class="display-5 text-left">~John Doe</p>
			</div>
		</div>
	</div>
	<?php //include('./include/footer.php') 
	?>

	<h1 class="text-center display-2 text-white mb-4">Premium Memberships</h1>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card mb-5 bg-warning" style="height:85%;">
					<div class="card-header display-4 text-center" style="background-color:#c49102;">
						<img src="./static/svgs/gold-medal.svg" width="60" height="60" alt="" loading="lazy" />
						Gold
					</div>
					<div class="card-body">
						<blockquote>
							<footer>
								<ul>
									<li>Same day delivery</li>
									<li>10% Discount on all products</li>
									<li>Customized workout(Weights)</li>
									<li>Calorie counter</li>
								</ul>
							</footer>
						</blockquote>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card mb-5 bg-light" style="height:85%">
					<div class="card-header display-4 text-center" style="background-color:gray;">
						<img src="./static/svgs/silver-medal.svg" width="60" height="60" alt="" loading="lazy" />Silver
					</div>
					<div class="card-body">
						<blockquote class="mb-0">
							<footer>
								<ul>
									<li>Same day delivery</li>
									<li>10% Discount on all products</li>
									<li>Customized workout(Weights)</li>
								</ul>
							</footer>
						</blockquote>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card mb-5" style="background-color:#a97142;height:85%">
					<div class="card-header display-4 text-center" style="background-color:brown;">
						<img src="./static/svgs/bronze-medal.svg" width="60" height="60" alt="" loading="lazy" />Bronze
					</div>
					<div class="card-body">
						<blockquote class=" mb-0">
							<footer>
								<ul>
									<li>Delivery within two business days</li>
									<li>5% Discount on all products</li>
									<li>Customized workout(Cardio)</li>
								</ul>
							</footer>
						</blockquote>
					</div>
				</div>
			</div>
		</div>


	</div>
	<?php include("./include/footer.php") ?>
</body>
<script>
	let height = document.getElementById('height')
	let weight = document.getElementById('weight')
	let bmi = document.getElementById('bmi')
	let bmiRes = document.getElementById('bmi-res')


	height.addEventListener('input', updateBMILabel)
	weight.addEventListener('input', updateBMILabel)

	function updateBMILabel(e) {
		let x = weight.value
		let y = (height.value || 1) / 3.281
		let z = parseFloat(x / (y * y)).toFixed(3)
		bmi.innerText = z
		if (z <= 18.5) bmiRes.innerHTML = "<span class='text-danger'>Underweight</span>"
		else if (z <= 24.9) bmiRes.innerHTML = "<span class='text-success'>Normal weight</span>"
		else if (z <= 29.9) bmiRes.innerHTML = "<span class='text-warning' >Overweight</span>"
		else bmiRes.innerHTML = "<span class='text-danger'>Obese</span>"

	}
</script>

</html>