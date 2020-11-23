<?php 
require './config/db_connect.php';

// if(isset($_POST['logout-btn'])) {
// 	session_start();
//     setcookie('username', '', time() + (86400 * 30),'/'); // empty value and old timestamp
//     header("Refresh:0;url=landing.php");
// 	session_destroy();
// }

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
<!DOCTYPE html>
<html lang="en">
  
  <?php include('./include/header.php') ?>
  <style>
    .card {
      margin:1rem auto 1rem auto;
      padding-top: 10px;
    }
    nav {
      margin-bottom: 1rem;
    }
  </style>
  <body>
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
				<a class="navbar-brand" href="./index.php"><b>Fitness Center</b></a>
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item ">
						<a class="nav-link font-weight-bold" href="./mform.php"
							>Premium membership <span class="sr-only">(current)</span></a
						>
					</li>
					<li class="nav-item">
						<a class="nav-link font-weight-bold" href="#">Supplements</a>
					</li>
					<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <b>Articles</b>
            </a>
            <div class="dropdown-menu bg-danger" style="border: none;" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="./deadlift.php">Deadlift</a>
              <a class="dropdown-item" href="#">Squat</a>
              <a class="dropdown-item" href="#">Benchpress</a>
              <a class="dropdown-item" href="#">Curls</a>
              
            </div>
          </li>
          
				<?php if(isset($_COOKIE['username'])):?>
					<li class="nav-item">
						<a class="nav-link font-weight-bold" href="./exercise-list.php">Todays Workout</a>
					</li>
					<?php endif ?>
					<li class="nav-item">
						<a class="nav-link font-weight-bold" id='cart-details' href="" data-toggle="modal" data-target="#exampleModal" onclick="updateModalBody()">Cart</a>
					</li>
				
					
					</li>
				</ul>
        <?php if(isset($_COOKIE['username'])):?>
            	
          <a href="./settings.php" class="mr-3">
					<button class="btn btn-dark my-2 my-sm-0 btn-lg">
                    <?php echo '@'.$_COOKIE['username']?>
						<?php echo $tierhtml ?>
					</button>
				    </a>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
					<button name='logout-btn' type='submit' class="btn-dark my-2 my-sm-0 btn-lg">
						Logout
					</button>
					</form>
			<?php else: ?>
            <a href="./logIn.php">
					<button class="btn-dark my-2 my-sm-0 btn-lg">
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
    <img src="./static/favicon/favicon.svg" alt="Dumbell.svg" class="dead-center bg-img" />
    
    <p id='demo'></p>

    
    <div class="container-fluid text-center">
      <h1 class='text-light py-2 m-4' style="border-bottom: 4px solid white;">Whey Protein</h1>
      <div class="row ">
        <div class="col-md-4 mx-auto">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="./static/images/products-images/whey/whey_protien.jpg" alt="Card image cap">
            
            <div class="card-body">
              <h5 class="card-title">Whey protein (Standard)</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">2kgs | $100 </li>
           
            </ul>
            <div class="card-body">
              <a href="#"  class="card-link" data-product-name="Whey protein (Standard)">Buy now</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="./static/images/products-images/whey/whey_protien_isolate.jpg" alt="Card image cap">
            
            <div class="card-body">
              <h5 class="card-title">Whey protein (Isolate)</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">2kgs | $200 </li>
           
            </ul>
            <div class="card-body">
              <a href="#" class="card-link" data-product-name="Whey protein (Isolate)">Buy now</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="./static/images/products-images/whey/whey_protien_gold.jpg" alt="Card image cap">
            
            <div class="card-body">
              <h5 class="card-title">Whey protein (Gold)</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">2kgs | $300 </li>
           
            </ul>
            <div class="card-body">
              <a href="#" class="card-link" data-product-name="Whey protein (Gold)">Buy now</a>
            </div>
          </div>
        </div>
       
        
      </div>
      <h1 class='text-light py-2 m-4' style="border-bottom: 4px solid white;">Branch Chain Amino Acids(BCAAs)</h1>
      <div class="row ">
        <div class="col-md-4 mx-auto">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="./static/images/products-images/bcaa/bcaa_normal.jpg" alt="Card image cap">
            
            <div class="card-body">
              <h5 class="card-title">BCAA (Standard)</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">2kgs | $100 </li>
           
            </ul>
            <div class="card-body">
              <a href="#" class="card-link" data-product-name="BCAA (Standard)">Buy now</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="./static/images/products-images/bcaa/bcaa_pro.jpg" alt="Card image cap">
            
            <div class="card-body">
              <h5 class="card-title">BCAA (Pro)</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">2kgs | $200 </li>
           
            </ul>
            <div class="card-body">
              <a href="#" class="card-link" data-product-name="BCAA (Pro)">Buy now</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="./static/images/products-images/bcaa/bcaa_gold.jpg" alt="Card image cap">
            
            <div class="card-body">
              <h5 class="card-title">BCAA (Gold)</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">2kgs | $300 </li>
           
            </ul>
            <div class="card-body">
              <a href="#" class="card-link" data-product-name="BCAA (Gold)">Buy now</a>
            </div>
          </div>
        </div>
       
        
      </div>
      <h1 class='text-light py-2 m-4' style="border-bottom: 4px solid white;">Creatine Monohydrate</h1>
      <div class="row ">
        <div class="col-md-4 mx-auto">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="./static/images/products-images/creatine/creatine_1.jpg" alt="Card image cap">
            
            <div class="card-body">
              <h5 class="card-title">Creatine Monohydrate (Standard)</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">2kgs | $100 </li>
           
            </ul>
            <div class="card-body">
              <a href="#" class="card-link" data-product-name="Creatine Monohydrate (Standard)">Buy now</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="./static/images/products-images/creatine/creatine_2.jpg" alt="Card image cap">
            
            <div class="card-body">
              <h5 class="card-title">Creatine Monohydrate (Isolate)</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">2kgs | $200 </li>
           
            </ul>
            <div class="card-body">
              <a href="#" class="card-link" data-product-name="Creatine Monohydrate (Isolate)">Buy now</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="./static/images/products-images/creatine/creatine_3.jpg" alt="Card image cap">
            
            <div class="card-body">
              <h5 class="card-title">Creatine Monohydrate (Gold)</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">2kgs | $300 </li>
           
            </ul>
            <div class="card-body">
              <a href="#" class="card-link" data-product-name="Creatine Monohydrate (Gold)">Buy now</a>
            </div>
          </div>
        </div>
       
        
      </div>
      <h1 class='text-light py-2 m-4' style="border-bottom: 4px solid white;">Mass Gainers</h1>
      <div class="row ">
        <div class="col-md-4 mx-auto">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="./static/images/products-images/creatine/creatine_1.jpg" alt="Card image cap">
            
            <div class="card-body">
              <h5 class="card-title">Mass Gainers (Standard)</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">2kgs | $100 </li>
           
            </ul>
            <div class="card-body">
              <a href="#" class="card-link" data-product-name="Mass Gainers (Standard)">Buy now</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="./static/images/products-images/creatine/creatine_2.jpg" alt="Card image cap">
            
            <div class="card-body">
              <h5 class="card-title">Mass Gainers (Isolate)</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">2kgs | $200 </li>
           
            </ul>
            <div class="card-body">
              <a href="#" class="card-link" data-product-name="Mass Gainers (Isolate)">Buy now</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="./static/images/products-images/creatine/creatine_3.jpg" alt="Card image cap">
            
            <div class="card-body">
              <h5 class="card-title">Mass Gainers (Gold)</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">2kgs | $300 </li>
           
            </ul>
            <div class="card-body">
              <a href="#" class="card-link" data-product-name="Mass Gainers (Gold)">Buy now</a>
            </div>
          </div>
        </div>
       
        
      </div>
      
    </div>
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
           
            <button type="button" id="cost-details" class="btn btn-dark" >$0</button>
          
                <button type="button"  onclick='handleClick()' class="btn btn-primary" data-dismiss="modal">Buy Now</button>

          </div>
        </div>
      </div>
    </div>
    <?php include('./include/footer.php') ?>
  </body>
  <script>
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
    let temp=document.querySelectorAll('.card-link')
    cart=localStorage.getItem('cart')?localStorage.getItem('cart').split(','):[]
    document.getElementById('cart-details').innerText='Cart ('+cart.length+')'
    temp.forEach(element=>{
      element.addEventListener('click',e=>{
        let item=e.target.getAttribute('data-product-name')
        cart.push(item)
        localStorage.setItem('cart',cart.toString())
        console.log(cart);
        document.getElementById('cart-details').innerText='Cart ('+cart.length+')'
      })
    })
    function removeEle(param) {cart.splice(cart.indexOf(param), 1) ;console.log(cart);document.getElementById('cart-details').innerText='Cart ('+cart.length+')';updateModalBody() ;}
    
    function updateModalBody(){
      localStorage.setItem('cart',cart.toString()) 
      if(cart.length==0)
      {document.querySelector('.modal-body').innerText="Cart Empty"
      document.querySelector('#cost-details').innerText='Total=$0'}
      else 
      {
        cost=0
        htmlstr=''
        console.log(cart)
        cart.forEach(e=>{
          cost+=costDict[e]
          htmlstr+=`<p class='m-0 p-0'>${e} @ $${costDict[e]}<button onclick='removeEle("${e}")' data-element-name='${e}'class='close float-right remove-element-btn'>&times;</button></p></br>`
        })
        // localStorage.setItem('cart',cart.toString()) 
        document.querySelector('.modal-body').innerHTML=htmlstr
        document.querySelector('#cost-details').innerText='Total=$'+cost
        
      }
    
    }
   function handleClick(param) { 
       var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        document.getElementById("demo").innerHTML = xhttp.responseText;
        console.log(xhttp.response)
      }
    xhttp.open('GET','buy.php?x='+cart.join(','),true)
    xhttp.send()
    }
  </script>
</html>