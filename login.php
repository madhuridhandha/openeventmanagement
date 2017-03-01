<?php
include_once('connection.php');

if(isset($_POST['login']))
{
	$user=$_POST['user'];
	$pass=$_POST['password'];
	$query="SELECT * from register where username='$user' and password='$pass' and verify=1";
	$result=mysql_query($query);

	if(mysql_num_rows($result)==1)
	{	session_start();
		$_SESSION['user']=$user;
		header('location:index.php');
	}
	else
	{?>
	<script>
	alert("Sorry");
	</script>
	<?php
		
	}
}
	
?>
<html>
<head>
<?php include('head.php');?>
</head>
<body>
<div id="header-wrapper">
	
			<?php include('menu.php');?>
		
	<div id="banner">
		<div class="img-border" align="center" > 
		<form method="post" action="login.php">
		
		<table class="td" height="80%" style="margin-top:40px;" width="50%" border="1">
		<tr><td width="50%" >
		<h3>For Admin Only</h3><br/><br/>
		<input type="text" placeholder="User Name" name="user"><br/><br/>
		<input type="password" placeholder="Password" name="password"><br/><br/>
		<input type="submit" class="button-style" name="login" value="Login"></td>
		
		</form>
		</table>
		</div>
	</div>
</div>
 

<div id="footer" class="container">
	<?php include_once('footer.php');?>
</div>
</body>
</html>
