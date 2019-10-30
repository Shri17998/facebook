<?php
include_once("settings.php");
if(isset($_POST['loginbutton']))
{
	$aid=$_POST['aid'];
	$password=$_POST['password'];
	$quer=mysql_query("SELECT * FROM admin WHERE username='$aid' AND password='$password' AND role='admin'") or die(mysql_error());
	if($rows=mysql_fetch_array($quer))
	{
		if ((strcasecmp($rows['username'],$aid) == 0) && (strcasecmp($rows['password'],$password) == 0)) {
			 $_SESSION['aid']=$_POST['aid'];
			 header("Location:index.php?role=admin");
		} 
	}	
		else {		
			session_unset();
			echo "<script type='text/javascript'>";
			echo "alert('User id and password incorrect please try again')";
			echo "</script>";	
		}	
	}
?>
<!doctype html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<title>Login</title>	
	<link href="css/form.css" rel="stylesheet" type="text/css"/>	
	<script src="js/jquery.min.js"></script>
	<style>
		.error
		{
			color:#F00;
			font-weight:bold;
			font-size: 12px;
		}
		html, body, div, span, applet, object, iframe,
		h1, h2, h3, h4, h5, h6, p, blockquote, pre,
		a, abbr, acronym, address, big, cite, code,
		del, dfn, em, img, ins, kbd, q, s, samp,
		small, strike, strong, sub, sup, tt, var,
		b, u, i, center,
		dl, dt, dd, ol, ul, li,
		fieldset, form, label, legend,
		table, caption, tbody, tfoot, thead, tr, th, td,
		article, aside, canvas, details, embed, 
		figure, figcaption, footer, header, hgroup, 
		menu, nav, output, ruby, section, summary,
		time, mark, audio, video {
			margin: 0;
			 padding: 0; 
			 border: 0; 
			 font-size: 100%; 
			 
			 vertical-align: baseline; 
		}
</style>

	<script type="text/javascript">
	function validlogin()
	{
		
		var status4=true;
		var aid=lf.aid.value;
		
		var pass=lf.password.value;
		
		if(aid=="" || aid.length==0)
		{
			
			status4=false;
			document.getElementById('aidError').innerHTML="please enter first name";
		}
		else
		{
			document.getElementById('aidError').innerHTML="";

		}
		if(pass=="" || pass.length==0)
		{
			
			status4=false;
			document.getElementById('pwdError').innerHTML="please enter password";
		}
		else
		{
			document.getElementById('pwdError').innerHTML="";

		}
		
		return status4;
	}
</script>

</head>

<body>
<div style="background: #FFA500;float: left;width: 100%">
	<p style="float: left;font-size: 2pc;padding: 25px;color: #FFF;font-family: fantasy;">Get Buddy App</p>
	<!--<p style="float: right;padding-right: 25px;padding-top: 18px;"><img src="images/applogo.png" /></p>-->
</div>
<div style="clear: both"></div>
	<div id="login">
		<h2><span class="fontawesome-lock"></span>Admin Sign In</h2>
		<form action="#" name="lf" method="POST" onsubmit="return validlogin(); ">
			<fieldset>
				<p><label style="font-size: 20px;color: rgba(55, 51, 51, 0.79);">Username</label></p>
				<p><input type="text"  name="aid">
					<br/><span id="aidError" class="error"></span>
					</p>
					
				<p><label for="password" style="font-size: 20px;color: rgba(55, 51, 51, 0.79);">Password</label></p>
				<p><input type="password" id="password"  name="password">
					 <br/><span id="pwdError" class="error"></span></p>

				<p><input type="submit" value="Sign In" name="loginbutton"></p>

			</fieldset>

		</form>

	</div> <!-- end login -->

</body>	
</html>