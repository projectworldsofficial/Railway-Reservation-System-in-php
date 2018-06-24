<?php


session_start();
if(isset($_SESSION['name'])){}
	else{
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
	<link href="css/bootstrap.min.css" rel="stylesheet" ></link>
	<link href="css/bootstrap.css" rel="stylesheet" ></link>
	<link href="css/Default.css" rel="stylesheet" >	</link>
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
				<a href="index.html">Indian Railways</a>
			</div>
			</div>
		</div>
		
		<!-- Navigation bar -->
		<div class="navbar navbar-inverse">
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
		
		
		<div class="display" style="margin-top:0px;height:30px;">
		
		
		
		
		<form method="get" action="booking.php">
				
				<table class="table" style="border-style:ridge;">
				<col width="99">
				<col width="50">
				<col width="50">
				<col width="80">
				<col width="80">
				<col width="70">
				<col width="70">
				<col width="70">
				<col width="70">
				<col width="70">
				<col width="90">
				<tr>
					<th style="border-top:0px;">Journey date:</th>
					<th style="border-top:0px;"> Train No./Name:</th>
					<th style="border-top:0px;">From Station:</th>
					<th style="border-top:0px;">To Station:</th>
					<th style="border-top:0px;">Quota:</th>
					<th style="border-top:0px;"> 1A</th>
					<th style="border-top:0px;"> 2A </th>
					<th style="border-top:0px;"> 3A </th>
					<th style="border-top:0px;"> SL </th>
				</tr>
				<tr>
					<td style="border-top:0px;"> <?php echo $_GET['doj'];?> </td>
					<input name="doj" style="display:none;" type="text" value="<?php echo $_GET['doj'];?>">
					<input name="dob" style="display:none;" type="text" value="<?php echo date("Y-m-d");?>">
					<td style="border-top:0px;"> <?php echo $_GET['tno'];?> </td>
					<input name="tno" style="display:none;" type="text" value="<?php echo $_GET['tno'];?>"> </td>
					
					<td style="border-top:0px;"><?php echo $_GET['fromstn'];?></td>
					<input name="fromstn" style="display:none;" type="text" value="<?php echo $_GET['fromstn'];?>"> </td>
					
					<td style="border-top:0px;"><?php echo $_GET['tostn'];?></td>
					<input name="tostn" style="display:none;" type="text" value="<?php echo $_GET['tostn'];?>"> </td>
		
					<td style="border-top:0px;"><?php echo $_GET['quota'];?></td>
					<input name="quota" style="display:none;" type="text" value="<?php echo $_GET['quota'];?>"> </td>
		
					<td style="border-top:0px;"> <input type="radio" name="selct" value="1A" onclick="return false;" <?php if($_GET['class']=='1A') {echo 'checked';}?>> </td>
					
					<td style="border-top:0px;"> <input type="radio" name="selct" value="2A" onclick="return false;" <?php if($_GET['class']=='2A') echo 'checked';?>> </td>
					
					<td style="border-top:0px;"> <input type="radio" name="selct" value="3A" onclick="return false;" <?php if($_GET['class']=='3A') echo 'checked';?>> </td>
					
					<td style="border-top:0px;"> <input type="radio" name="selct" value="SL" onclick="return false;" <?php if($_GET['class']=='SL') echo 'checked';?>> </td>
				</tr>
				</table>
				
		</div>
		<div class="display" style="height:50px;">
				
		</div>
		<br /><br />
		<div class="display" style="margin-top:0px;height:415px;">
		<h2><font color="blue">Passenger Detail</font></h2>
			
			<table class="table">
				<tr>
					<th style="width:100px;border-top:0px;">SNo.</th>
					<th style="width:200px;border-top:0px;"> Name</th>
					<th style="width:100px;border-top:0px;"> Age </th>
					<th style="width:100px;border-top:0px;"> Sex </th>
				</tr>
				<tr>
					<td > 1</td>
					<td ><input type="text" name="name1" ></td>
					<td ><input type="text" name="age1" class="input-small"></td>
					<td ><select name="sex1" class="input-small">
						<option value="male">MALE</option>
						<option value="female">FEMALE</option>
						</select>
					</td>
				</tr>
				<tr>
					<td > 2</td>
					<td ><input type="text" name="name2" ></td>
					<td ><input type="text" name="age2" class="input-small"></td>
					<td ><select name="sex2" class="input-small">
						<option value="male">MALE</option>
						<option value="female">FEMALE</option>
						</select>
					</td>
				</tr>
				<tr>
					<td > 3</td>
					<td ><input type="text" name="name3" ></td>
					<td ><input type="text" name="age3" class="input-small"></td>
					<td ><select name="sex3" class="input-small">
						<option value="male">MALE</option>
						<option value="female">FEMALE</option>
						</select>
					</td>
				</tr>
				<tr>
					<td > 4</td>
					<td ><input type="text" name="name4" ></td>
					<td ><input type="text" name="age4" class="input-small"></td>
					<td ><select name="sex4" class="input-small">
						<option value="male">MALE</option>
						<option value="female">FEMALE</option>
						</select>
					</td>
				</tr>
				<tr>
					<td > 5</td>
					<td ><input type="text" name="name5" ></td>
					<td ><input type="text" name="age5" class="input-small"></td>
					<td ><select name="sex5" class="input-small">
						<option value="male">MALE</option>
						<option value="female">FEMALE</option>
						</select>
					</td>
				</tr>
				
				<tr>
					<td style="border-top:0px;"><input class="btn btn-info"type="submit" value="Submit" id="subb" ></td>
					<td style="border-top:0px;"><input class="btn btn-info"type="reset" value="Reset"></td>
				</tr>	
				
			</table>
			</form>
		</div>
		
		<div>
		<br  />
		<p> <font color="red"> CHILDREN BELOW 5 YEAR (FOR WHOM TICKET IS NOT TO BE ISSUED). </font> </p>
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