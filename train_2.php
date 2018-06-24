<?php
session_start();
if(isset($_SESSION['name'])){}
	else{
		header("location:login1.php");
		
	}
require('firstimport.php');
$tbl_name="interlist";

mysql_connect("$host","$username","$password")or die("cannot connect");
mysql_select_db("$db_name") or die("cannot select db");
$k=0;
if(isset($_SESSION['name'])){}
	else{
		header("location:login1.php");
		
	}
if(isset($_POST['byname']) && ($_POST['bynum']==""))
{
	$name1=$_POST['byname'];
	$k=2;
	$name1=strtoupper($name1);
	$tbl_name="train_list";
	$sql="SELECT * FROM $tbl_name WHERE Number='$name1' or Name='$name1' ";
	$result=mysql_query($sql);
}
else if(isset($_POST['byname']) && isset($_POST['bynum']))
{
	$k=1;
	$from=$_POST['byname'];
	$to=$_POST['bynum'];
	$from=strtoupper($from);
	$to=strtoupper($to);
	$sql="SELECT * FROM $tbl_name WHERE (Ori='$from' or st1='$from' or st2='$from' or st3='$from' or st4='$from' or st5='$from') and (st1='$to' or st2='$to' or st3='$to' or st4='$to' or st5='$to' or Dest='$to')";
	$result=mysql_query($sql);
}
else if((!isset($_POST['byname'])) && (!isset($_POST['bynum'])))
{
	$k=0;
	$from="";
	$to="";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title> Find Train </title>
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
			//alert($(window).width());
			var x=(($(window).width())-1024)/2;
			//alert(x);
			$('.wrap').css("left",x+"px");
		});

	</script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/man.js"></script>
	
</head>
<body>
	<div class="wrap">
		<!-- Header -->
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
		
		<!-- Find train-->
		<div class="span12 well" id="boxh">
		
			<form style="margin:0px;" method="get" >
			<table class="table" style="margin-bottom:0px;">
				<tr>
					<th style="border-top:0px;">
						 Search Train 
					</th>
					<td style="border-top:0px;">
						<select id="myselect" onchange="clicker()">
						<option value="plf">By Station</option>
						<option value="name" >By Name</option>
						<option value="num" >By Number</option>
						</select>
					</td>
					<td id="mbox" style="border-top:0px;"> <label>From </label></td>
					<td style="border-top:0px;"><input  type="text" class="input-block-level" name="byname" id="byn" ></td>
					<td id="xbox" style="border-top:0px;"><label> To </label></td>
					<td style="border-top:0px;"><input id="xbox1" type="text" class="input-block-level" name="bynum" ></td>
					<td style="border-top:0px;"><input class="btn btn-info" type="submit" value="Find"> </td>
					<td style="border-top:0px;"><a href="train.php" class="btn btn-info" type="reset" value="Reset">Reset</a></td>
				</tr>
			</table>
			</form>
		</div>
<!-- display result -->
		<div class="span12 well">
			<div class="display" style="height:30px;">
				<table class="table">
				<tr>
					<th style="width:70px;border-top:0px;"> Train No.</th>
					<th style="width:210px;border-top:0px;"> Train Name </th>
					<th style="width:65px;border-top:0px;"> Orig. </th>
					<th style="width:55px;border-top:0px;"> Des. </th>
					<th style="width:60px;border-top:0px;"> Arr. </th>
					<th style="width:65px;border-top:0px;"> Dep. </th>
					<th style="width:20px;border-top:0px;"> M </th>
					<th style="width:25px;border-top:0px;"> T </th>
					<th style="width:29px;border-top:0px;"> W </th>
					<th style="width:25px;border-top:0px;"> T </th>
					<th style="width:25px;border-top:0px;"> F </th>
					<th style="width:25px;border-top:0px;"> S </th>
					<th style="border-top:0px;"><font color=red> S </font></th>
				</tr>
				</table>
			</div>
			<div class="display" style="margin-top:0px;overflow:auto;">
				<table class="table">
				<?php
				if($k==1)
				{	echo "<script> document.getElementById(\"byn\").value=\"$from\";
									   document.getElementById(\"xbox1\").value=\"$to\";
							</script>";
					$n=0;
					while($row=mysql_fetch_array($result)){
					//$q="from: ".$from;
						if($from==$row['st1'])
						{	$q=$row['st1arri'];
							//echo $q;
						}
						else
						if($from==$row['st2'])
						{	$q=$row['st2arri']; }
						else if($from==$row['st3'])
						{	$q=$row['st3arri']; }
						else if($from==$row['st4'])
						{	$q=$row['st4arri']; }
						else if($from==$row['st5'])
						{	$q=$row['st5arri']; }
						else if($from==$row['Ori'])
						{	$q=$row['Oriarri']; }
						else if($from==$row['Dest'])
						{	$q=$row['Destarri'];}
						
						$p1=substr($q,0,2);
						$p2=substr($q,3,2);
						$p2=$p2+5;
						if($p2<10)
						{$p2="0".$p2;}
						$d=$p1.":".$p2;
					if($n%2==0)
					{
				?>
				<tr class="text-error">
					<td style="width:70px;"> <? echo $row['Number']; ?> </td>
					<td style="width:210px;"> <? echo $row['Name']; ?> </td>
					<td style="width:65px;"> <? echo $row['Ori']; ?> </td>
					<td style="width:55px;"> <? echo $row['Dest']; ?> </td>
					<td style="width:60px;"> <? echo $q; ?> </td>
					<td style="width:65px;"> <? echo $d; ?> </td>
					<td style="width:20p;"> <? echo $row['Mon']; ?> </td>
					<td style="width:25px;"> <? echo $row['Tue']; ?> </td>
					<td style="width:29px;"> <? echo $row['Wen']; ?> </td>
					<td style="width:25px;"> <? echo $row['Thu']; ?> </td>
					<td style="width:25px;"> <? echo $row['Fri']; ?> </td>
					<td style="width:25px;"> <? echo $row['Sat']; ?> </td>
					<td> <? echo $row['Sun']; ?> </td>
				</tr>
				<?php
					}
					else
					{
				?>
				<tr class="text-info">
					<td style="width:70px;"> <? echo $row['Number']; ?> </td>
					<td style="width:210px;"> <? echo $row['Name']; ?> </td>
					<td style="width:65px;"> <? echo $row['Ori']; ?> </td>
					<td style="width:55px;"> <? echo $row['Dest']; ?> </td>
					<td style="width:60px;"> <? echo $q; ?> </td>
					<td style="width:65px;"> <? echo $d; ?> </td>
					<td style="width:20p;"> <? echo $row['Mon']; ?> </td>
					<td style="width:25px;"> <? echo $row['Tue']; ?> </td>
					<td style="width:29px;"> <? echo $row['Wen']; ?> </td>
					<td style="width:25px;"> <? echo $row['Thu']; ?> </td>
					<td style="width:25px;"> <? echo $row['Fri']; ?> </td>
					<td style="width:25px;"> <? echo $row['Sat']; ?> </td>
					<td> <? echo $row['Sun']; ?> </td>				</tr>
				<?php
					}
					$n++;
					}
				}
				else if($k==2)
				{//	echo "<script> document.getElementById(\"byn\").value=\"$from\";
					//				   document.getElementById(\"xbox1\").value=\"$to\";
					//		</script>";
					//echo $k;
					$n=0;
					while($row=mysql_fetch_array($result)){
					if($n%2==0)
					{
				?>
				<tr class="text-error">
					<td style="width:70px;"> <? echo $row['Number']; ?> </td>
					<td style="width:210px;"> <? echo $row['Name']; ?> </td>
					<td style="width:65px;"> <? echo $row['Origin']; ?> </td>
					<td style="width:55px;"> <? echo $row['Destination']; ?> </td>
					<td style="width:60px;"> <? echo $row['Arrival']; ?> </td>
					<td style="width:65px;"> <? echo $row['Departure']; ?> </td>
					<td style="width:20p;"> <? echo $row['Mon']; ?> </td>
					<td style="width:25px;"> <? echo $row['Tue']; ?> </td>
					<td style="width:29px;"> <? echo $row['Wen']; ?> </td>
					<td style="width:25px;"> <? echo $row['Thu']; ?> </td>
					<td style="width:25px;"> <? echo $row['Fri']; ?> </td>
					<td style="width:25px;"> <? echo $row['Sat']; ?> </td>
					<td> <? echo $row['Sun']; ?> </td>
				</tr>
				<?php
					}	
					else
					{
				?>
				<tr class="text-info">
					<td style="width:70px;"> <? echo $row['Number']; ?> </td>
					<td style="width:210px;"> <? echo $row['Name']; ?> </td>
					<td style="width:65px;"> <? echo $row['Origin']; ?> </td>
					<td style="width:55px;"> <? echo $row['Destination']; ?> </td>
					<td style="width:60px;"> <? echo $row['Arrival']; ?> </td>
					<td style="width:65px;"> <? echo $row['Departure']; ?> </td>
					<td style="width:20p;"> <? echo $row['Mon']; ?> </td>
					<td style="width:25px;"> <? echo $row['Tue']; ?> </td>
					<td style="width:29px;"> <? echo $row['Wen']; ?> </td>
					<td style="width:25px;"> <? echo $row['Thu']; ?> </td>
					<td style="width:25px;"> <? echo $row['Fri']; ?> </td>
					<td style="width:25px;"> <? echo $row['Sat']; ?> </td>
					<td> <? echo $row['Sun']; ?> </td>		
				</tr>
				<?php
					}
					$n++;
					}
				}
				else
				{
				    echo "<div class=\"alert alert-error\"  style=\"margin:100px 350px;\"> please search the train.. </div>";
				}
				mysql_close();
				?>
				</table>
			</div>
		</div>
		
		<footer >
		<div style="width:100%;">
			<div style="float:left;">
			<p class="text-right text-info">  &copy; 2018 Copyright PVT Ltd.</p>	
			</div>
			<div style="float:right;">
			<p class="text-right text-info">	Desinged By : projectworlds</p>
			</div>
		</div>
		</footer>	
		</div>
</body>
</html>