<?php
	session_start();
	
require('firstimport.php');
if(isset($_SESSION['name'])){}
	else{
		header("location:login1.php");
		
	}
$tbl_name="booking";

mysqli_select_db($conn,"$db_name") or die("cannot select db");
	$name1=$_SESSION['name'];
	$sql="SELECT DISTINCT Tnumber,class,doj,DOB,fromstn,tostn,Status FROM $tbl_name WHERE uname='$name1' ORDER BY doj ASC";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);


 
$tnum=$row['Tnumber'];
$cl=$row['class'];
$result=mysqli_query($conn,"SELECT * FROM train_list WHERE Number='$tnum'");

$row=mysqli_fetch_array($result);
$tname=$row['Name'];
$result=mysqli_query($conn,$sql);

			 if(isset($_SESSION['name']))
			 {
			 //echo "Welcome,".$_SESSION['name']."&nbsp;&nbsp;&nbsp;<a href=\"logout.php\" class=\"btn btn-info\">Logout</a>";
			 }
			 else
			 {
				$_SESSION['error']=15;
				header("location:login1.php");
			 } 
?>
<!DOCTYPE html>
<html>
<head>
	<title> Reservation </title>
	<link rel="shortcut icon" href="images/favicon.png"></link>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	</link>
	<link href="css/Default.css" rel="stylesheet">
	</link>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script>
		$(document).ready(function()
		{
			var x=(($(window).width())-1024)/2;
			$('.wrap').css("left",x+"px");
		});

	</script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/man.js"></script>
	
</head>
<body>
	<div class="wrap">
		<div class="header">
			<div style="float:left;width:150px;">
				<img src="images/logo.jpg"/>
			</div>		
			<div>
			<div style="float:right; font-size:20px;margin-top:20px;">
			<?php
			 if(isset($_SESSION['name']))
			 {
			 echo "Welcome,".$_SESSION['name']."&nbsp;&nbsp;&nbsp;<a href=\"logout.php\" class=\"btn btn-info\">Logout</a>";
			 }
			 ?>
			
			</div>
			<div id="heading">
				<a href="index.php">Indian Railways</a>
			</div>
			</div>
		</div>
		<!-- Navigation bar -->
		<div class="navbar navbar-inverse" >
			<div class="navbar-inner">
				<div class="container" >
				<a class="brand" href="index.php" >HOME</a>
				<a class="brand" href="train.php" >FIND TRAIN</a>
				<a class="brand" href="reservation.php">RESERVATION</a>
				<a class="brand" href="profile.php">PROFILE</a>
				<a class="brand" href="booking.php">BOOKING HISTORY</a>
				</div>
			</div>
		</div>
		
		<div class="span12 well">
			<div align="center" style="border-bottom: 3px solid #ddd;">
				<h2>Booked Ticket History </h2>
			
			</div>
			<br>
			<!--
			<div >
				<table class="table">
				
				<tr>
					<th style="border-top:0px;" > <label>Train No.<label></th>
					<td style="border-top:0px;"><label class="text-error"><?php echo $tnum;?></label></td>
					<th style="border-top:0px;"><label> Train Name<label> </th>
					<td style="border-top:0px;"><label class="text-error"><?php echo $tname;?></label></td>
					<th style="border-top:0px;"> <label>Class <label></th>
					<td style="border-top:0px;"><label class="text-error"><?php echo $cl;?></label></td>	
					
				</tr>
				</table>
			</div>
			-->
			<div>
			
			</div>
			<div >
				<table  class="table">
				<col width="90">
					<col width="90">
				<col width="90">
				<col width="110">
				<col width="90">
				<col width="90">
				<col width="90">
				<col width="90">
				<tr>
					<th style="width:10px;border-top:0px;">SNo.</th>
					<th style="width:100px;border-top:0px;">Train Number</th>
					<th style="width:100px;border-top:0px;">Date Of Journey</th>
					<th style="width:100px;border-top:0px;">From</th>
					<th style="width:100px;border-top:0px;">To</th>
					<th style="width:100px;border-top:0px;">Date Of Booking</th>
					<th style="width:100px;border-top:0px;">Current Status</th>
				</tr>	
				<?php
				
				$n=1;
				while($row=mysqli_fetch_array($result)){
					if($n%2!=0)
					{
				?>
				<tr class="text-error">
					<th style="width:10px;"> <?php echo $n; ?> </th>
					<th style="width:100px;"> <?php echo $row['Tnumber']; ?> </th>
					<th style="width:100px;"> <?php echo $row['doj']; ?> </th>
					<th style="width:100px;"> <?php echo $row['fromstn']; ?> </th>
					<th style="width:100px;"> <?php echo $row['tostn']; ?> </th>
					<th style="width:100px;"> <?php echo $row['DOB']; ?> </th>
					<th style="width:100px;"> <?php echo $row['Status']; ?> </th>
					<th style="width:100px;"><a href="ViewFullStatus.php?Tnumber=<?php echo $row['Tnumber'];?>&doj=<?php echo $row['doj'];?>&fromstn=<?php echo $row['fromstn']; ?>&tostn=<?php echo $row['tostn']; ?>&DOB=<?php echo $row['DOB'];?>">View Full Status </a> </th>
				</tr>
				<?php 
					}
					else
					{
				?>
				<tr class="text-info">
					<td style="width:10px;"> <?php echo $n; ?> </td>
					<th style="width:100px;"> <?php echo $row['Tnumber']; ?> </th>
					<th style="width:100px;"> <?php echo $row['doj']; ?> </th>
					<th style="width:100px;"> <?php echo $row['fromstn']; ?> </th>
					<th style="width:100px;"> <?php echo $row['tostn']; ?> </th>
					<th style="width:100px;"> <?php echo $row['DOB']; ?> </th>
					<th style="width:100px;"> <?php echo $row['Status']; ?> </th>
					<th style="width:100px;"><a href="ViewFullStatus.php?Tnumber=<?php echo $row['Tnumber'];?>&doj=<?php echo $row['doj'];?>&fromstn=<?php echo $row['fromstn']; ?>&tostn=<?php echo $row['tostn']; ?>&DOB=<?php echo $row['DOB'];?>">View Full Status </a> </th>
					
				</tr>
				<?php
					}
					$n++;
				}
				?>
				
				
				</table>

			</div>
		</div>
			
		<!-- Copyright -->
		<footer >
		<div style="width:100%;">
			<div style="float:left;">
			<p class="text-right text-info">  &copy; 2018 Copyright PVT Ltd.</p>	
			</div>
			<div style="float:right;">
			<p class="text-right text-info">	Desinged By : projkectworlds</p>
			</div>
		</div>
		</footer>
	</div>
</body>
</html>	












