<?php
/* -------------------------CONNECTION CODE-------------------------*/
$con = mysqli_connect('localhost','root','','medilist');
if(!$con)
{
  echo "Not connected to the database:(";
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Medilist-Admin</title>
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="main.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script>
		<script src="main.js"></script>



	</head>
	<body>
		<div class="header">
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>Medilist-Admin</span>
			</div>
			<a href="#" class="nav-trigger"><span></span></a>
		</div>
		<div class="side-nav">
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>Medilist-Admin</span>
			</div>
			<nav>
				<ul>
					<li>
						<a href="admin-user.php">
							<span><i class="fa fa-user"></i></span>
							<span>User</span>
						</a>
					</li>
          <li>
						<a href="admin-vendor-inventory.php">
							<span><i class="fa fa-user"></i></span>
							<span>Vendor's Inventory</span>
						</a>
					</li>
					<li class="active">
						<a href="admin-update-ven.php">

							<span><i class="fa fa-envelope"></i></span>
							<span>Update Vendor</span>
						</a>
					</li>
					<li>
						<a href="admin-vendor.php">
							<span><i class="fa fa-bar-chart"></i></span>
							<span>Back</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="main-content">
			<div class="title">
				Update Vendor
			</div>
<!-- TABLE OF CONTENT -->
<?php
		if (isset($_GET['edit'])){
			$edit = $_GET['edit'];
			$update = "SELECT *FROM `vendor` WHERE ven_id='$edit'";
			$rec= mysqli_query($con,$update);
			$record= mysqli_fetch_assoc($rec);
			$ven_name=$record['ven_name'];
			$ven_contact=$record['ven_contact'];
			$ven_email =$record['ven_email'];
			$ven_address =$record['ven_address'];
			// $med_vendor_id =$record['vendor_id'];
			$id = $record['ven_id'];
			}
			else {
					echo "No record has been altered";
			}

		?>
<form class="" action="admin-ven-process.php" method="post">

		<input type="hidden" name="id" value="<?php echo $edit; ?>">
		<input class="form-control" type="text" name="ven_name" value="<?php echo $ven_name; ?>" placeholder="Name"><br>
		<input class="form-control" type="text" name="ven_contact" value="<?php echo $ven_contact; ?>" placeholder="Contact"><br>
		<input class="form-control" type="email" name="ven_email" value="<?php echo $ven_email; ?>" placeholder="Email"><br>
		<input class="form-control" type="text" name="ven_address" value="<?php echo $ven_address; ?>" placeholder="Address"><br>
		<!-- <input class="form-control" type="text" name="vendor_id" value="" placeholder="Vendor ID"><br> -->
		<button class="btn btn-outline-success" type="submit" name="update">Update</button>
</form>


		</div>
	</body>
</html>
