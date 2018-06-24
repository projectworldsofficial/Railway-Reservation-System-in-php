<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
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
		
		<!-- Login and signup -->
		<div align="center">
		
		<?php
			if(isset($_SESSION['error']))
			{
			 if(isset($_SESSION['name']))
			 {
				//echo "nikul";
			 }
			 else if($_SESSION['error']==15)
			 {
				//echo "hilgr";
		?>
				<div class="alert alert-error"><font size="5"> Please Login First..</font> 
				</div>
		<?php	 }
			}
			//else{ echo "hi";}
		?>
			<br />
			<br />
		<div  class=" well login">
			<form class="form-signin " method="post" action="login.php">
		
			<table class="table" style="margin-bottom:4px;">
			
			<tr>
			<td style="border-top:0px;"><label> Username</label></td>
			<td style="border-top:0px;"> <input type="text" name="user" class="input-block-level" placeholder="Username"></td>
			</tr>
			<tr >
			<td style="border-top:0px;"> <label>Password</label></td>
			<td style="border-top:0px;"><input type="password" name="psd" class="input-block-level" placeholder="password"></td>
			</tr>
			<tr>
			<td colspan=2 style="border-top:0px; visibility:hidden;" id="wrong"  class="label label-important">Username and Password Wrong !!!</td>
			</tr>
			<tr>
			<td style="border-top:0px;"></td>
			<td style="border-top:0px;"> <input class="btn btn-info" type="submit" value="Login"></td>
			</tr>
			<tr>
			<td colspan="2" style="border-top:0px;"> <p>  You don't have register?</p></td>
			</tr>
			<tr>
			<td style="border-top:0px;"></td>
			<td style="border-top:0px;"> <a class="btn btn-info" href="signup.php?value=0">Signup</a></td>
			</tr>
			
			</table>
			</form>
		</div>
		</div>
		<br/>
		<!-- Footer -->
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
<?php
if(isset($_SESSION['error']))
{
if($_SESSION['error']==1)
echo "<script>document.getElementById(\"wrong\").style.visibility=\"\";</script>";
session_destroy();
}

?>	