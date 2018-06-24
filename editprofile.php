<?php
session_start();


require('firstimport.php');
if(isset($_SESSION['name'])){}
	else{
		header("location:login1.php");
		
	}
$tbl_name="users"; // Table name

mysqli_select_db($conn,"$db_name")or die("cannot select DB");


if(!isset($_SESSION["name"]))
header("location:login1.php");

$name=$_SESSION['name'];
$lname=$_POST['ln'];
$mail=$_POST['mail1'];
$gender=$_POST['gnd1'];
$marital=$_POST['mrt1'];
$dob=$_POST['dob1'];
$mobile=$_POST['mon1'];
$ques=$_POST['que1'];
$ans=$_POST['ans1'];



$sql="UPDATE $tbl_name SET l_name='$lname',email='$mail',gender='$gender',marital='$marital',dob='$dob',mobile='$mobile',ques='$ques',ans='$ans' WHERE f_name='$name'";
$result=mysqli_query($conn,$sql);


$_SESSION['error']==4;

header('location:profile.php');

?>




