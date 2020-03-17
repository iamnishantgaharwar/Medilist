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
		<title>Medilist-Vendor</title>
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
				<span>Medilist-Vendor</span>
			</div>
			<a href="#" class="nav-trigger"><span></span></a>
		</div>
		<div class="side-nav">
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>Medilist-Vendor</span>
			</div>
			<nav>
				<ul>
					<li>
						<a href="add-medicine.html">
							<span><i class="fa fa-user"></i></span>
							<span>Add Medicine</span>
						</a>
					</li>
					<li class="active">
						<a href="update-inventory.php">

							<span><i class="fa fa-envelope"></i></span>
							<span>Update Medicine</span>
						</a>
					</li>
					<li>
						<a href="inventory-vendor.php">
							<span><i class="fa fa-bar-chart"></i></span>
							<span>Back</span>
						</a>
					</li>
					<!--li>
						<a href="#">
							<span><i class="fa fa-credit-card-alt"></i></span>
							<span>Payments</span>
						</a>
					</li-->
				</ul>
			</nav>
		</div>
		<div class="main-content">
			<div class="title">
				Update Inventory
			</div>
<!-- TABLE OF CONTENT -->
<?php
		if (isset($_GET['edit'])){
			$edit = $_GET['edit'];
			$update = "SELECT *FROM `inventory` WHERE medicine_id='$edit'";
			$rec= mysqli_query($con,$update);
			$record= mysqli_fetch_assoc($rec);
			$med_name=$record['medicine_name'];
			$med_manufacture=$record['medicine_mfg_date'];
			$med_expiry =$record['medicine_exp_date'];
			$med_price =$record['medicine_price'];
			$med_vendor_id =$record['vendor_id'];
			$id = $record['medicine_id'];
			}
			else {
					echo "No record has been altered";
			}

		?>
<form class="" action="inventory-vendor-process" method="post">

		<input type="hidden" name="id" value="<?php echo $edit; ?>">
		<input class="form-control" type="text" name="medicine_name" value="<?php echo $med_name; ?>" placeholder="Medicine Name"><br>
		<input class="form-control" type="datetime" name="medicine_mfg_date" value="<?php echo $med_manufacture; ?>" placeholder="Manufacture Date"><br>
		<input class="form-control" type="datetime" name="medicine_exp_date" value="<?php echo $med_expiry; ?>" placeholder="Expiry Date"><br>
		<input class="form-control" type="text" name="medicine_price" value="<?php echo $med_price; ?>" placeholder="Medicine Price"><br>
		<input class="form-control" type="text" name="vendor_id" value="<?php echo $med_vendor_id; ?>" placeholder="Vendor ID"><br>
		<button class="btn btn-outline-success" type="submit" name="update">Update</button>
</form>


		</div>
	</body>
</html>
