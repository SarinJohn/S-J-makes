<?php
	session_start();
	require 'db.php';
	if (isset($_GET['delete'])) {
		$sql = "DELETE FROM `fproduct` WHERE `pid`=".$_GET['delete'];
		$result = mysqli_query($conn, $sql);
		if($result == 1) {
			$message = "Successfully deleted";
		} else {
			$message = "Delete failed";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>

<style>
.d1:hover {
border-top-left-radius: 25px;
border-top-left-radius: 25px;
  font-size: 35px;
box-shadow: 2px 2px 2px 2px #888888;
transition-timing-function: ease-in;
}
#type{
border-radius:32px;
border-top-color: hsl(60, 90%, 50%, .8);
border-right-color: green;
border-bottom-color: red;
border-left-color: blue;}
.#fk{
border-radius:32px;
border-top-color: hsl(60, 90%, 50%, .8);
border-right-color: green;
border-bottom-color: red;
border-left-color: blue;
border-radius: 50%;
}
.col-md-4{
border:inline ;

border-radius:20px;
box-shadow: 10px 9px 5px -1px rgba(0,0,0,0.61);
-webkit-box-shadow: 10px 9px 5px -1px rgba(0,0,0,0.61);
-moz-box-shadow: 10px 9px 5px -1px rgba(0,0,0,0.61);

}



#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
filter:blur(8px);
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
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body class>

		<?php
			require 'menu.php';
			function dataFilter($data)
			{
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
			function status_message($code) {
				if($code == 0) {
					return "to be verified";
				} else if ($code == 1) {
					return "approved";
				} else {
					return "rejected";
				}
			}
		?>

		<!-- One -->
			<section id="main" class="wrapper style1 align-center" >
				<div class="container">
					<h2>Welcome to digital market</h2>
					<h3 style="color:#FFF"><?php echo ""; ?></h3>
					<h3>Select Filter</h3>
					<form method="GET" action="productMenu.php?">
						<input type="text" value="<?php echo $_SESSION['Category']; ?>" name="n" style="display: none;"/>
						<center>
							<div class="row">
							<div class="col-sm-4"></div>
							<div class="col-sm-2">
								<div class="select-wrapper" style="width: auto" >
									<select name="type" id="type" required style="color: black;">
										<option value="all" style="color: black;">List All</option>
										<option value="agriculture" style="color: black;">Agriculture</option>
										<option value="animal_husbandry" style="color: black;">Animal Husbandry</option>
										<option value="farm_produce" style="color: black;">Farm Produce</option>
									</select>
							  	</div>
							</div>
							<div class="col-sm-2">
								<input id="fk" class="button special"style="border-radius:100%;" type="submit" value="Go!" />
							</div>
							<div class="col-sm-4"></div>
						</div>
						</center>
					</form>

				<section id="two" class="wrapper style2 align-center">
				<div class="container">
					<?php
						if(isset($_GET['n']) AND $_GET['n'] == 1) {
							$condition = "fid=".$_SESSION['id'];
						} else {
							$condition = "status=1";
						}
						if(!isset($_GET['type']) OR $_GET['type'] == "all")
						{
							$sql = "SELECT * FROM fproduct WHERE ".$condition;
						}
						else if(isset($_GET['type']) AND $_GET['type'] == "agriculture")
						{
							$sql = "SELECT * FROM fproduct WHERE pcat = 'agriculture' and ".$condition;
						}
						else if(isset($_GET['type']) AND $_GET['type'] == "animal_husbandry")
						{
							$sql = "SELECT * FROM fproduct WHERE pcat = 'animal_husbandry' and ".$condition;
						}
						else if(isset($_GET['type']) AND $_GET['type'] == "farm_produce")
						{
							$sql = "SELECT * FROM fproduct WHERE pcat = 'farm_produce' and ".$condition;
						}
						$result = mysqli_query($conn, $sql);

					?>
					<div class="row">
					<?php

						while($row = $result->fetch_array()):
							$picDestination = "images/productImages/".$row['pimage'];
						?>
							<div class="col-md-4">
							<section>
							<strong><h2 class="title" style="color:black; "><?php echo $row['product'].'';?></h2></strong>
							<a href="review.php?pid=<?php echo $row['pid'] ;?>" > <img class="image fit" src="<?php echo $picDestination;?>" height="220px;"  /></a>

							<div style="align: left">
							<blockquote><?php echo "Type : ".$row['pcat'].'';?><br>
								<?php echo "Price : ".$row['price'].' /-';?><br>
								<?php echo "Status : ".status_message($row['status']);?><br>
							</blockquote>
							<a href="productMenu.php?n=1&delete=<?php echo $row['pid'];?>" class="btn btn-danger" style="text-decoration: none;">Delete</a>
							<br><br><br><br>

						</section>
						</div>

						<?php endwhile;	?>


					</div>

			</section>
					</header>

			</section>

	</body>
</html>
