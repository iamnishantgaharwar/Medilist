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
						<a href="inventory-vendor.html">
							<span><i class="fa fa-bar-chart"></i></span>
							<span>Inventory</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="main-content">
			<div class="title">
				Inventory
			</div>

<!-- TABLE OF CONTENT -->

		<form class="" action="index.html" method="post">
			<table class="table">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Medicine Name</th>
      <th scope="col">Manufacture Date</th>
      <th scope="col">Expiry Date</th>
			<th scope="col">Price</th>
			<th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

		<!-- PHP SCRIPT FOR GETTING VALUES IN TABLE -->

		<?php
			$con = mysqli_connect('localhost','root','','medilist');
				if(!$con)
				{
					echo "Not connected to the database:(";
				}
				$sql="SELECT * FROM `inventory`";
				$result=mysqli_query($con,$sql);
				$total=mysqli_num_rows($result);
				if ($total!=0)
				{
					while ($data=mysqli_fetch_assoc($result))
					{
			?>
    <tr>
			<th scope="col"> <?php echo $data['medicine_id'];?> </th>
      <th scope="col"> <?php echo $data['medicine_name'];?> </th>
    	<th scope="col"> <?php echo $data['medicine_mfg_date'];?> </th>
      <th scope="col"> <?php echo $data['medicine_exp_date'];?> </th>
			<th scope="col"> <?php echo $data['medicine_price'];?> </th>
			<td colspan="2">  <a class="btn btn-info" href="update-inventory.php?edit=<?php echo $data['medicine_id']; ?>">Edit</a>
				<a class="btn btn-danger"href="inventory-vendor-process.php?delete=<?php echo $data['medicine_id']; ?>">Delete</a>
			</td>
    </tr>
		<?php
		}
	}
		else {
			echo "No Record Found";
		}
		 ?>
  </tbody>
</table>
		</form>
			</div>
	</body>
</html>
