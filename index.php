<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
<style>
#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
opacity:2;}
#hh{
z-index:1000;
font-size: 2.3em;
        font-family: serif;
        color: transparent;
        text-align: center;





}
#lg,#rg{
border-radius:100%;
background: rgb(0,0,0);
background: linear-gradient(90deg, rgba(0,0,0,0.5858718487394958) 0%, rgba(78,66,66,0.938813025210084) 100%, rgba(0,212,255,1) 100%);

border-radius:12px;
 background-color: black;
}
#lg:hover{
background: rgb(45,40,131);
background: linear-gradient(90deg, rgba(45,40,131,1) 30%, rgba(53,53,176,0.958420868347339) 59%, rgba(0,212,255,1) 100%);
font-size:22px;
border-radius:22px;
box-shadow: -5px -3px 49px 12px rgba(0,0,0,0.82);
-webkit-box-shadow: -5px -3px 49px 12px rgba(0,0,0,0.82);
-moz-box-shadow: -5px -3px 49px 12px rgba(0,0,0,0.82);}
#rg:hover{
background: rgb(45,40,131);
background: linear-gradient(90deg, rgba(45,40,131,1) 30%, rgba(53,53,176,0.958420868347339) 59%, rgba(0,212,255,1) 100%);
font-size:22px;
border-radius:22px;
box-shadow: -5px -3px 49px 12px rgba(0,0,0,0.82);
-webkit-box-shadow: -5px -3px 49px 12px rgba(0,0,0,0.82);
-moz-box-shadow: -5px -3px 49px 12px rgba(0,0,0,0.82);}
#hh:hover{
font-size: 45px;
filter: blur(2px);
}
#header
{
background-image: linear-gradient(to top, rgba(0,0,0,0), rgba(0,0,0,1));
filter: blur(0px);
opacity:0.7;}
.d1:hover {
border-top-left-radius: 25px;
border-top-left-radius: 25px;
  font-size: 35px;
box-shadow: 2px 2px 2px 2px #888888;
}


</style>
		<meta charset="UTF-8">
		<title>FARMER'S WORKMATE</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap\js\bootstrap.min.js"></script>
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="login.css"/>
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<link rel="stylesheet" href="indexfooter.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
<body class="dp">
<video autoplay muted loop id="myVideo">
  <source src="farm.mp4" type="video/mp4">
</video>


	<?php
		require 'menu.php';
	?>

		<!-- Banner -->
			<section id="banner" class="wrapper">
				<div class="container">
				<h2>FARMER'S WORKMATE</h2>
				<p>WE SUPPORT YOU</p>
				<br><br>
				<center>
					<div class="row uniform">
						<div  class="6u 12u$(xsmall)">
							<button id="lg" class="button fit" onclick="document.getElementById('id01').style.display='block'" style="width:auto">LOGIN</button>
						</div>

						<div class="6u 12u$(xsmall)">
							<button id="rg" class="button fit" onclick="document.getElementById('id02').style.display='block'" style="width:auto">REGISTER</button>
						</div>
					</div>
				</center>


			</section>

		

		


			<div id="id01" class="modal">

  <form class="modal-content animate" action="Login/login.php" method='POST'>
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
    <h3>Login</h3>
							<form method="post" action="Login/login.php">
								<div class="row uniform 50%">
									<div class="7u$">
										<input type="text" name="uname" id="uname" value="" placeholder="UserName" style="width:80%" required/>
									</div>
									<div class="7u$">
										<input type="password" name="pass" id="pass" value="" placeholder="Password" style="width:80%" required/>
									</div>
								</div>
									<div class="row uniform">
										<p>
				                            <b>Category : </b>
				                        </p>
				                        <div class="3u 12u$(small)">
				                            <input type="radio" id="login_farmer" name="category" value="1">
				                            <label for="login_farmer">Farmer</label>
				                        </div>
				                        <div class="3u 12u$(small)">
				                            <input type="radio" id="login_buyer" name="category" value="0" checked>
				                            <label for="login_buyer">Buyer</label>
				                        </div>
									</div>
									<center>
									<div class="row uniform">
										<div class="7u 12u$(small)">
											<input type="submit" value="Login" />
										</div>
									</div>
									</center>
								</div>
							</form>
						</section>
</div>
    </div>
    </div>
  </form>
</div>


<div id="id02" class="modal">

  <form class="modal-content animate" action="Login/signUp.php" method='POST'>
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">

<section>
							<h3>SignUp</h3>
							<form method="post" action="Login/signUp.php">
								<center>
								<div class="row uniform">
									<div class="3u 12u$(xsmall)">
										<input type="text" name="name" id="name" value="" placeholder="Name" required/>
									</div>
									<div class="3u 12u$(xsmall)">
										<input type="text" name="uname" id="uname" value="" placeholder="UserName" required/>
									</div>
								</div>
								<div class="row uniform">
									<div class="3u 12u$(xsmall)">
										<input type="text" name="mobile" id="mobile" value="" placeholder="Mobile Number" required/>
									</div>

									<div class="3u 12u$(xsmall)">
										<input type="email" name="email" id="email" value="" placeholder="Email" required/>
									</div>
								</div>
								<div class="row uniform">
									<div class="3u 12u$(xsmall)">
			                            <input type="password" name="password" id="password" value="" placeholder="Password" required/>
			                        </div>
			                        <div class="3u 12u$(xsmall)">
			                            <input type="password" name="pass" id="pass" value="" placeholder="Retype Password" required/>
			                        </div>
								</div>
								<div class="row uniform">
									<div class="6u 12u$(xsmall)">
										<input type="text" name="addr" id="addr" value="" placeholder="Address" style="width:80%" required/>
									</div>
								</div>
								<div class="row uniform">
									<p>
			                            <b>Category : </b>
			                        </p>
			                        <div class="3u 12u$(small)">
			                             <input type="radio" id="register_farmer" name="category" value="1">
										  <label for="register_farmer">Farmer</label><br>
			                        </div>
			                        <div class="3u 12u$(small)">
			                            <input type="radio" id="register_buyer" name="category" value="0" checked>
			                            <label for="register_buyer">Buyer</label><br>
			                        </div>
								</div>
								<div class="row uniform">
									<div class="3u 12u$(small)">
										<input type="submit" value="Submit" name="submit" class="special" /></li>
									</div>
									<div class="3u 12u$(small)">
										<input type="reset" value="Reset" name="reset"/></li>
									</div>
								</div>
							</center>
							</form>
						</section>

    </div>
    </div>
  </form>
</div>



<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var modal1= document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}

</script>


	</body>
</html>
