<?php
session_start();
include_once('connection.php');

if(!isset($_SESSION['user']))
	header('location:login.php');

?>
<html>
<head>
<?php include_once('head.php');?>
</head>
<body>
<div id="header-wrapper">
	<?php include_once('menu.php');?>
	
</div>
<div id="wrapper">
	<div id="page-wrapper">
		<div id="page">
			<div id="content">
				<h1 align="center"> Faculty List</h1>
				<?php
				if(isset($_POST['submit']))
				{
					$facultyname=$_POST['fname'];
					$facultymobile=$_POST['fmobile'];
					$gender=$_POST['gender'];
					$qualification=$_POST['qualification'];
					$address=$_POST['address'];
					
					 $select="SELECT * from facultydetail where fname='$facultyname' and mobile='$facultymobile'";
					 $number=mysql_num_rows(mysql_query($select));
					if($number>0)
					{
						echo "<highlight>Data already Exists.";
					}
					else
					{
						if(strlen($facultymobile)!=10)
						{
							echo "<highlight>Please enter 10 digit mobile number</highlight>";
							?><script>alert("Please enter 10 digit number");</script><?php
						}
						else
						{
					$insert="insert into facultydetail values('','$facultyname','$facultymobile','$gender','$qualification','$address')";
					mysql_query($insert);
						echo "<highlight>Your Data Successfully inseted.";}
					}
				}
				?>
				<form method="post" action="facultydetail.php">
				<table class="td" width="60%" border="1">
				<tr><th colspan="2"><h3> Faculty Details</h3></th></tr>
				<tr><td>Name :</td><td><input type="text" name="fname" size="15" maxlenth="50"></td></tr>
				<tR><td>Mobile Number:</td><td>+ 91 -<input type="number" name="fmobile" size="10" maxlength="10"> </td></tr>
				<tr><td>Select the Gender:</td><td>
				<input type="radio"name="gender"value="M" checked>Male
				<input type="radio"name="gender"value="F">Female</td></tr>
				<tr><td>Qualification :</td><td>
				<select name="qualification" />
				<option selected>Msc</option>
				<option>BED</option>
				<option >B.Com</option>
				<option>Bsc</option>

				</select></td></tr>
				<tr><td>Address :</td><td>
				<textarea name="address" rows="7" "cols="50">
				</textarea></td></tr>
				<tr><td colspan=2>
				<input type="submit" name="submit" class="button-style" value="Save">
				<input type="reset" name="reset" class="button-style" value="Reset">
				</td></tr>
				</table>
			</form>	
			</div>
			<?php include('sidebar.php'); ?>
		</div>
	</div>
</div>

<div id="footer" class="container">
	<?php include_once('footer.php');?>
</div>
</body>
</html>
