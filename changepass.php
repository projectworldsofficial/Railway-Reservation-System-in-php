<?php

session_start();
$pass=$_GET['pass'];
$name=$_SESSION['name'];

require('firstimport.php');

$db_name="railres";
$tbl_name="users"; // Table name

mysqli_select_db($conn,	"$db_name")or die("cannot select DB");

$sql="UPDATE users SET password=$pass WHERE f_name='$name'"; 


$result=mysqli_query($conn,$sql);

$_SESSION['error']=6;

//echo "name : ".$name."  Pass : ".$pass;
header('location:profile.php');
?>