<?php 
require './config/db_connect.php';

if(isset($_POST['logout-btn'])) {
	session_start();
	
		setcookie('username', '', time() + (86400 * 30),'/'); // empty value and old timestamp
		header("Refresh:0;url=landing.php");

	session_destroy();
}

if(isset($_COOKIE['username'])) {
	$temp=$_COOKIE['username'];
	$query="SELECT email FROM user_details WHERE username='{$temp}'";
	$result=mysqli_query($conn,$query);
	$email = mysqli_fetch_all($result,MYSQLI_ASSOC)[0]['email'];
	$query="SELECT tier FROM premium_membership WHERE email='{$email}' ORDER BY date_created DESC LIMIT 1";
	$result=mysqli_query($conn,$query);

	$temp2=mysqli_fetch_all($result,MYSQLI_ASSOC);
	$tier =(isset($temp2[0]['tier'])) ? $temp2[0]['tier']: '';
	
	$tierhtml='';
	if($tier=="G") $tierhtml='	<img src="./static/svgs/gold-medal.svg" width="20" height="20" alt="" loading="lazy"/>';
	else if($tier=="S") $tierhtml='	<img src="./static/svgs/silver-medal.svg" width="20" height="20" alt="" loading="lazy"/>';
	else if($tier=="B") $tierhtml='	<img src="./static/svgs/bronze-medal.svg" width="20" height="20" alt="" loading="lazy"/>';
}



?>

<nav class="navbar navbar-expand-lg navbar-light bg-danger">
			<a class="navbar-brand" href="#">
				<img
					src="./static/svgs/dumbell.svg"
					width="40"
					height="40"
					alt=""
					loading="lazy"
				/>
			</a>
			<button
				class="navbar-toggler"
				type="button"
				data-toggle="collapse"
				data-target="#navbarTogglerDemo01"
				aria-controls="navbarTogglerDemo01"
				aria-expanded="false"
				aria-label="Toggle navigation"
			>
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
				<a class="navbar-brand" href="./landing.php"><b>Fitness Center</b></a>
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item ">
						<a class="nav-link font-weight-bold" href="./mform.php"
							>Premium membership <span class="sr-only">(current)</span></a
						>
					</li>
					<li class="nav-item">
						<a class="nav-link font-weight-bold" href="./products.php">Supplements</a>
					</li>
					<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <b>Articles</b>
            </a>
            <div class="dropdown-menu bg-danger" style="border: none;" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./deadlift.php">Deadlift</a>
              <a class="dropdown-item" href="./squat.php">Squat</a>
              <a class="dropdown-item" href="./benchpress.php">Benchpress</a>
              <a class="dropdown-item" href="curls.php">Curls</a>
             
              
            </div>
		  </li>
				<?php if(isset($_COOKIE['username'])):?>
					<li class="nav-item">
						<a class="nav-link font-weight-bold" href="./exercise-list.php">Todays Workout</a>
					</li>
				<?php endif ?>
					<li class="nav-item">
						<a class="nav-link font-weight-bold" id='cart-details' href="" data-toggle="modal" data-target="#exampleModal" onclick="updateModalBody()">Cart (0)</a>
					</li>
					<li class="nav-item">
						<a class="nav-link font-weight-bold" href="#">About Us</a>
					</li>
					
					</li>
				</ul>
				
				<?php if(isset($_COOKIE['username'])):?>
					<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
					<button name='logout-btn' type='submit' class="btn-dark my-2 my-sm-0 btn-lg">
						<?php echo '@'.$_COOKIE['username']?>
						<?php echo $tierhtml ?>
					</button>
					</form>
					
					<?php else: ?>
						<a href="./logIn.php">
					<button class="btn btn-dark my-2 my-sm-0 btn-lg">
						Sign In
					</button>
				</a>
						<a href="./register.php" class='ml-3'>
					<button class="btn btn-dark my-2 my-sm-0 btn-lg">
						Sign Up
					</button>
				</a>
					<?php endif ?>
			</div>
    </nav>
		<img
			src="./static/favicon/favicon.svg"
			class="dead-center bg-img"
			alt="gg"
		/>
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cart Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
           
            <button type="button" id="cost-details" class="btn btn-dark" disabled>$0</button>
            <button type="button" class="btn btn-primary" disabled>Buy Now</button>
          </div>
        </div>
      </div>
    </div>

		<script defer>
			let x=localStorage.getItem('cart') && localStorage.getItem('cart').split(',')
			document.getElementById('cart-details').innerText='Cart ('+x.length+')'
			document.getElementsByName("logout-btn")[0].addEventListener('click',()=>
			localStorage.removeItem('cart')
			)
			
			let costDict ={"Whey protein (Standard)":100,
"Whey protein (Isolate)":200,
"Whey protein (Gold)":300,
"BCAA (Standard)":100,
"BCAA (Pro)":200,
"BCAA (Gold)":300,
"Creatine Monohydrate (Standard)":100,
"Creatine Monohydrate (Isolate)":200,
"Creatine Monohydrate (Gold)":300,
"Mass Gainers (Standard)":100,
"Mass Gainers (Isolate)":200,
"Mass Gainers (Gold)":300
}
   
    let cart=localStorage.getItem('cart')?localStorage.getItem('cart').split(','):[]
    document.getElementById('cart-details').innerText='Cart ('+cart.length+')'
    console.log(cart);
    function removeEle(param) {cart.splice(cart.indexOf(param), 1) ; updateModalBody() ;}
    function updateModalBody(){
      if(cart.length==0)
      document.querySelector('.modal-body').innerText="Cart Empty"
      else 
      {
        cost=0
        htmlstr=''
        cart.forEach(e=>{
          cost+=costDict[e]
          htmlstr+=`<p class='m-0 p-0'>${e} @ $${costDict[e]}<button onclick='removeEle("${e}")' data-element-name='${e}'class='close float-right remove-element-btn' disabled>&times;</button></p></br>`
        })
        localStorage.setItem('cart',cart.toString()) 
        document.querySelector('.modal-body').innerHTML=htmlstr
        document.querySelector('#cost-details').innerText='Total=$'+cost
        
      }
    
    }





		</script>