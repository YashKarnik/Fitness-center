<!DOCTYPE html>
<html lang="en">

	<?php include('./include/header.php') ?>
	<body >
		<?php include('./include/navbar.php') ?>
		<div class="container w-50 h-50 bg-danger mt-5 p-3 rounded-sm">
			<h1 class="text-center">Premium Membership</h1>
			<form method="POST" action="/lll">
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="inputPassword4">Email</label>
						<input type="email" class="form-control" id="inputPassword4" required/>
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
					<input type="range" min="1" max="24" value="3" style="width: 100%;margin-bottom: 2rem;" id="membership-duration" required>
				</div>
				<div class="form-row">
					<button type="button" class="btn btn-lg btn-success mx-auto" data-toggle="modal" data-target="#premiumMembershipModal" onclick="updatePremiumMembershipModal()" >
						Activate
					</button>
				</div>
			</form>
		</div>
		<div class="modal fade" id="premiumMembershipModal" tabindex="-1" aria-labelledby="premiumMembershipModal" aria-hidden="true">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title-mem" id="exampleModalLabel">Membership Type</h5>
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>
				<div class="modal-body" id='modal-body-mem'>
				  Membership Duration
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-dark" id="total-cost-bnt" data-dismiss="modal">Total</button>
				  <button type="button" class="btn btn-primary">Buy now</button>
				</div>
			  </div>
			</div>
		  </div>
		  <?php include('./include/footer.php') ?>
	</body>
	<script>
		let radiobtn = document.getElementsByName('tier');
		let tierCost = document.getElementById('tier-cost');
		let membershipDuration = document.getElementById('membership-duration');
		let totalCostBnt = document.getElementById('total-cost-bnt');
		let mebershimpDurationLabel = document.getElementById('membership-duration-label');
		let type=''
		let dur=0
		let costdict= {'gold':100,'silver':50,'bronze':25}
		radiobtn.forEach(element => {
			element.addEventListener('input', e => {
				console.log(e.target.id);
				let x = e.target.id;
				type=x
				let cost = 0;
				if (x == 'gold') cost = 100;
				else if (x == 'silver') cost = 50;
				else if (x == 'bronze') cost = 25;

				tierCost.innerText =
					x.charAt(0).toUpperCase() + x.slice(1) + ` ($${cost}/month)`;
			});
		});
		membershipDuration.addEventListener('input',(e)=>{mebershimpDurationLabel.innerText=e.target.value+' Months';dur=e.target.value})
		function updatePremiumMembershipModal() { 
			document.querySelector('.modal-title-mem').innerText=type?`TIER: ${type.toUpperCase()}`:'Select Memebership type'
			document.querySelector('#modal-body-mem').innerText=`DURATION: ${dur} Monthts`
			document.querySelector('#total-cost-bnt').innerText=(!isNaN(costdict[type]*dur))?'Total=$'+costdict[type]*dur:'Total=$'+0
		 }
	</script>
</html>
