<?php
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'medilist');

if(!$con)
{
	echo "Not connected to the database:(";
}
		$med_name=$_POST['medicine_name'];
		$med_manufacture=$_POST['medicine_mfg_date'];
		$med_expiry =$_POST['medicine_exp_date'];
    $med_price =$_POST['medicine_price'];
    $med_vendor_id =$_POST['vendor_id'];

		$sql="INSERT INTO inventory (medicine_name,medicine_mfg_date,medicine_exp_date,medicine_price,vendor_id) VALUES('$med_name','$med_manufacture','$med_expiry','$med_price','$med_vendor_id')";
		$result=mysqli_query($con,$sql);
		if($result)
		{
		//$_SESSION["username"]=$_su["username"];
	//	header("location:homepage.html");
		echo "success";
		}
		else
		{
		//echo "<br>"."error wrong password or username";
		//header("location:index.html");
		echo "unsuccess";
		}
?>
