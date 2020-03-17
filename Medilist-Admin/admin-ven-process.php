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
  $query = "DELETE FROM `vendor` WHERE ven_id='$id'";
  $del= mysqli_query($con,$query);
  if ($del == 1) {
    echo "Successfully Deleted";
    header("refresh:2; url=admin-vendor.php");
  }
  else {
      echo "No record has been altered";
  }
}
/* -------------------------EDIT CODE-------------------------*/
if (isset($_POST['update'])) {
  $edit= $_POST['id'];
  $ven_name=$_POST['ven_name'];
  $ven_contact=$_POST['ven_contact'];
  $ven_email =$_POST['ven_email'];
  $ven_address =$_POST['ven_address'];

 $sql="UPDATE `vendor` SET `ven_name`='$ven_name',`ven_contact`='$ven_contact',`ven_email`='$ven_email',`ven_address`='$ven_address' WHERE `ven_id`= '$edit'";

  if(mysqli_query($con,$sql)){
      echo "Successfully edited";
      header("refresh:2; url=admin-vendor.php");
  }
  else{
    echo "Not edited";
  }
}

 ?>
