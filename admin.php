<?php
    session_start();
    if ( $_SESSION['logged_in'] != true || $_SESSION['is_admin'] != true )
    {
      $_SESSION['message'] = "You must log in before viewing your profile page!";
      header("location: error.php");
    }
    require 'db.php';
		$message = "";

		if (isset($_GET['operation']) && isset($_GET['pid'])) {
			$status = 0;
			if ($_GET['operation'] == "approve") {
				$status = 1;
			} else if ($_GET['operation'] == "reject") {
				$status = -1;
			}
			$sql = "UPDATE `fproduct` SET `status`=".$status." WHERE `pid`=".$_GET['pid'];
			$result = mysqli_query($conn, $sql);
			if($result)
			{
				$message = "Updated successfully";
			}
			else
			{
				$message = "Error, could not update.";
			}
		}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
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
		?>

		<!-- One -->
			<section id="main" class="wrapper style1 align-center" >
				<div class="container">
					<h2>Welcome to digital market</h2>
					<h3 style="color: #000"><?php echo $message; ?></h3>

				<?php
					if(isset($_GET['n']) AND $_GET['n'] == 1):
				?>
					<h3>Select Filter</h3>
					<form method="GET" action="productMenu.php?">
						<input type="text" value="1" name="n" style="display: none;"/>
						<center>
							<div class="row">
							<div class="col-sm-4"></div>
							<div class="col-sm-2">
								<div class="select-wrapper" style="width: auto" >
									<select name="type" id="type" required style="background-color:white;color: black;">
										<option value="all" style="color: black;">List All</option>
										<option value="agriculture" style="color: black;">Agriculture</option>
										<option value="animal_husbandry" style="color: black;">Animal Husbandry</option>
										<option value="farm_produce" style="color: black;">Farm Produce</option>
									</select>
							  	</div>
							</div>
							<div class="col-sm-2">
								<input class="button special" type="submit" value="Go!" />
							</div>
							<div class="col-sm-4"></div>
						</div>
						</center>
					</form>
				<?php endif; ?>

				<section id="two" class="wrapper style2 align-center">
				<div class="container">
				<?php
          $sql = "SELECT * FROM fproduct WHERE status=0";
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
								<blockquote><?php echo "Type : ".$row['pcat'].'';?><br><?php echo "Price : ".$row['price'].' /-';?><br></blockquote>
								<a href="admin.php?operation=reject&pid=<?php echo $row['pid'];?>" class="btn btn-danger" style="text-decoration: none;">Reject</a>
								<a href="admin.php?operation=approve&pid=<?php echo $row['pid'];?>" class="btn btn-primary" style="text-decoration: none;">Approve</a>
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
