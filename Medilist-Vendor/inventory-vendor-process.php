<?php
/* -------------------------CONNECTION CODE-------------------------*/
$con = mysqli_connect('localhost','root','','medilist');
if(!$con)
{
  echo "Not connected to the database:(";
}

/* -------------------------INSERT CODE-------------------------*/
if (isset($_POST['save'])) {
  $firstname= $_POST['uname'];
  $lastname= $_POST['uname1'];
  $sql="INSERT INTO testing (uname,uname1) VALUES('$firstname','$lastname')";
  //mysqli_query($con,$sql)
  if(mysqli_query($con,$sql)){
      echo "Successfully Saved";
      header("refresh:2; url=adminpanel.php");
  }
  else{
    echo "Not Saved";
  }
}
/* -------------------------DELETE CODE-------------------------*/
if (isset($_GET['delete'])){
  $id = $_GET['delete'];
  $query = "DELETE FROM `inventory` WHERE medicine_id='$id'";
  $del= mysqli_query($con,$query);
  if ($del == 1) {
    echo "Successfully Deleted";
    header("refresh:2; url=inventory-vendor.php");
  }
  else {
      echo "No record has been altered";
  }
}
/* -------------------------EDIT CODE-------------------------*/
if (isset($_POST['update'])) {
  $edit= $_POST['id'];
  $med_name=$_POST['medicine_name'];
  $med_manufacture=$_POST['medicine_mfg_date'];
  $med_expiry =$_POST['medicine_exp_date'];
  $med_price =$_POST['medicine_price'];
  $med_vendor_id =$_POST['vendor_id'];
  $sql="UPDATE `inventory` SET `medicine_name`='$med_name',`medicine_mfg_date`='$med_manufacture',`medicine_exp_date`='$med_expiry',`medicine_price`='$med_price',`vendor_id`='$med_vendor_id' WHERE `medicine_id`= '$edit'";
  //mysqli_query($con,$sql)
  if(mysqli_query($con,$sql)){
      echo "Successfully edited";
      header("refresh:2; url=inventory-vendor.php");
  }
  else{
    echo "Not edited";
  }
}

 ?>
