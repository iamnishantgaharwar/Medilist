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
  $query = "DELETE FROM `customer` WHERE cus_id='$id'";
  $del= mysqli_query($con,$query);
  if ($del == 1) {
    echo "Successfully Deleted";
    header("refresh:2; url=admin-user.php");
  }
  else {
      echo "No record has been altered";
  }
}
/* -------------------------EDIT CODE-------------------------*/
if (isset($_POST['update'])) {
  $edit= $_POST['id'];
  $cus_name=$_POST['cus_name'];
  $cus_contact=$_POST['cus_contact'];
  $cus_email =$_POST['cus_email'];
  $cus_address =$_POST['cus_address'];

 $sql="UPDATE `customer` SET `cus_name`='$cus_name',`cus_contact`='$cus_contact',`cus_email`='$cus_email',`cus_address`='$cus_address' WHERE `cus_id`= '$edit'";

  if(mysqli_query($con,$sql)){
      echo "Successfully edited";
      header("refresh:2; url=admin-user.php");
  }
  else{
    echo "Not edited";
  }
}

 ?>
