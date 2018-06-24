<?php


session_start();
require('firstimport.php');
if(isset($_SESSION['name'])){}
	else{
		header("location:login1.php");
		
	}
$tbl_name="booking";

mysqli_select_db($conn,"$db_name") or die("cannot select db");


$uname=$_SESSION['name'];
$num=$_GET['tno'];
$seat= $_GET['selct'];
$name=$_GET['name1'];
$age=$_GET['age1'];
$sex=$_GET['sex1'];
$fromstn=$_GET[	'fromstn'];
$tostn=$_GET['tostn'];
$doj=$_GET['doj'];
$dob=$_GET['dob'];
echo "..".$num."..".$name."..".$age."..".$sex."..".$seat."..";

$sql1="SELECT ".$seat." from seats_availability where Train_No='".$num."' and doj='".$doj."'";
$result1=$conn->query($sql1);


while($row1=mysqli_fetch_array($result1)){
		$value=$row1["".$seat];
}


//echo "</br>".$value."</br>".$seat."</br>";

if($value>0){
	$status="Confirmed";
	if(!empty($name) || !empty($age) )
	{
	$sql="INSERT INTO $tbl_name(uname,Tnumber,class,doj,DOB,fromstn,tostn,Name,Age,sex,Status)
	VALUES ('$uname','$num','$seat','$doj','$dob','$fromstn','$tostn','$name','$age','$sex','$status')";
	$result=$conn->query($sql);
	echo "$sql</br>";
	if(!$result) die ($conn->error);
	$value-=1;
$sql2="UPDATE seats_availability SET ".$seat."=".$value." WHERE doj='".$doj."' and Train_No=".$num."";
	$result2=$conn->query($sql2);
	echo "</br>".$sql2."</br>";
	if(!$result) die ($conn->error);
	}
}
else{
	$status="Waiting";
	if(!empty($name) || !empty($age) )
	{
	$sql="INSERT INTO $tbl_name(uname,Tnumber,class,doj,DOB,fromstn,tostn,Name,Age,sex,Status)
	VALUES ('$uname','$num','$seat','$doj','$dob','$fromstn','$tostn','$name','$age','$sex','$status')";
	$result=$conn->query($sql);
	echo "$sql</br>";
	if(!$result) die ($conn->error);
	$value-=1;
	$sql2="UPDATE seats_availability SET ".$seat."=".$value." WHERE doj='".$doj."' and Train_No=".$num."";
	$result2=$conn->query($sql2);
	echo "</br>".$sql2."</br>";
	if(!$result) die ($conn->error);
	}
}



	


	$name=$_GET['name2'];
	$age=$_GET['age2'];
	$sex=$_GET['sex2'];

if($value>0){
	$status="Confirmed";
	if(!empty($name) || !empty($age) )
	{
	$sql="INSERT INTO $tbl_name(uname,Tnumber,class,doj,DOB,fromstn,tostn,Name,Age,sex,Status)
	VALUES ('$uname','$num','$seat','$doj','$dob','$fromstn','$tostn','$name','$age','$sex','$status')";
	$result=$conn->query($sql);
	echo "$sql</br>";
	if(!$result) die ($conn->error);
	$value-=1;
$sql2="UPDATE seats_availability SET ".$seat."=".$value." WHERE doj='".$doj."' and Train_No=".$num."";
	$result2=$conn->query($sql2);
	echo "</br>".$sql2."</br>";
	if(!$result) die ($conn->error);
	}
}
else{
	$status="Waiting";
	if(!empty($name) || !empty($age) )
	{
	$sql="INSERT INTO $tbl_name(uname,Tnumber,class,doj,DOB,fromstn,tostn,Name,Age,sex,Status)
	VALUES ('$uname','$num','$seat','$doj','$dob','$fromstn','$tostn','$name','$age','$sex','$status')";
	$result=$conn->query($sql);
	echo "$sql</br>";
	if(!$result) die ($conn->error);
	$value-=1;
	$sql2="UPDATE seats_availability SET ".$seat."=".$value." WHERE doj='".$doj."' and Train_No=".$num."";
	$result2=$conn->query($sql2);
	echo "</br>".$sql2."</br>";
	if(!$result) die ($conn->error);
	}
}






	$name=$_GET['name3'];
	$age=$_GET['age3'];
	$sex=$_GET['sex3'];

if($value>0){
	$status="Confirmed";
	if(!empty($name) || !empty($age) )
	{
	$sql="INSERT INTO $tbl_name(uname,Tnumber,class,doj,DOB,fromstn,tostn,Name,Age,sex,Status)
	VALUES ('$uname','$num','$seat','$doj','$dob','$fromstn','$tostn','$name','$age','$sex','$status')";
	$result=$conn->query($sql);
	echo "$sql</br>";
	if(!$result) die ($conn->error);
	$value-=1;
$sql2="UPDATE seats_availability SET ".$seat."=".$value." WHERE doj='".$doj."' and Train_No=".$num."";
	$result2=$conn->query($sql2);
	echo "</br>".$sql2."</br>";
	if(!$result) die ($conn->error);
	}
}
else{
	$status="Waiting";
	if(!empty($name) || !empty($age) )
	{
	$sql="INSERT INTO $tbl_name(uname,Tnumber,class,doj,DOB,fromstn,tostn,Name,Age,sex,Status)
	VALUES ('$uname','$num','$seat','$doj','$dob','$fromstn','$tostn','$name','$age','$sex','$status')";
	$result=$conn->query($sql);
	echo "$sql</br>";
	if(!$result) die ($conn->error);
	$value-=1;
	$sql2="UPDATE seats_availability SET ".$seat."=".$value." WHERE doj='".$doj."' and Train_No=".$num."";
	$result2=$conn->query($sql2);
	echo "</br>".$sql2."</br>";
	if(!$result) die ($conn->error);
	}
}







	$name=$_GET['name4'];
	$age=$_GET['age4'];
	$sex=$_GET['sex4'];
	
if($value>0){
	$status="Confirmed";
	if(!empty($name) || !empty($age) )
	{
	$sql="INSERT INTO $tbl_name(uname,Tnumber,class,doj,DOB,fromstn,tostn,Name,Age,sex,Status)
	VALUES ('$uname','$num','$seat','$doj','$dob','$fromstn','$tostn','$name','$age','$sex','$status')";
	$result=$conn->query($sql);
	echo "$sql</br>";
	if(!$result) die ($conn->error);
	$value-=1;
$sql2="UPDATE seats_availability SET ".$seat."=".$value." WHERE doj='".$doj."' and Train_No=".$num."";
	$result2=$conn->query($sql2);
	echo "</br>".$sql2."</br>";
	if(!$result) die ($conn->error);
	}
}
else{
	$status="Waiting";
	if(!empty($name) || !empty($age) )
	{
	$sql="INSERT INTO $tbl_name(uname,Tnumber,class,doj,DOB,fromstn,tostn,Name,Age,sex,Status)
	VALUES ('$uname','$num','$seat','$doj','$dob','$fromstn','$tostn','$name','$age','$sex','$status')";
	$result=$conn->query($sql);
	echo "$sql</br>";
	if(!$result) die ($conn->error);
	$value-=1;
	$sql2="UPDATE seats_availability SET ".$seat."=".$value." WHERE doj='".$doj."' and Train_No=".$num."";
	$result2=$conn->query($sql2);
	echo "</br>".$sql2."</br>";
	if(!$result) die ($conn->error);
	}
}








	$name=$_GET['name5'];
	$age=$_GET['age5'];
	$sex=$_GET['sex5'];

if($value>0){
	$status="Confirmed";
	if(!empty($name) || !empty($age) )
	{
	$sql="INSERT INTO $tbl_name(uname,Tnumber,class,doj,DOB,fromstn,tostn,Name,Age,sex,Status)
	VALUES ('$uname','$num','$seat','$doj','$dob','$fromstn','$tostn','$name','$age','$sex','$status')";
	$result=$conn->query($sql);
	echo "$sql</br>";
	if(!$result) die ($conn->error);
	$value-=1;
$sql2="UPDATE seats_availability SET ".$seat."=".$value." WHERE doj='".$doj."' and Train_No=".$num."";
	$result2=$conn->query($sql2);
	echo "</br>".$sql2."</br>";
	if(!$result) die ($conn->error);
	}
}
else{
	$status="Waiting";
	if(!empty($name) || !empty($age) )
	{
	$sql="INSERT INTO $tbl_name(uname,Tnumber,class,doj,DOB,fromstn,tostn,Name,Age,sex,Status)
	VALUES ('$uname','$num','$seat','$doj','$dob','$fromstn','$tostn','$name','$age','$sex','$status')";
	$result=$conn->query($sql);
	echo "$sql</br>";
	if(!$result) die ($conn->error);
	$value-=1;
	$sql2="UPDATE seats_availability SET ".$seat."=".$value." WHERE doj='".$doj."' and Train_No=".$num."";
	$result2=$conn->query($sql2);
	echo "</br>".$sql2."</br>";
	if(!$result) die ($conn->error);
	}
}






	echo("file succesfully inserted");

header("location:display.php?tno='$num'&& doj='$doj'&& seat='$seat'");


?>
