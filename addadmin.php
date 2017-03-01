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
				<?php
					if(isset($_GET['deleteid']))
					{
						$id=$_GET['deleteid'];
						$deletequery="delete from register where id='$id'";
						mysql_query($deletequery);
					}
					if(isset($_GET['add'])&&isset($_GET['name']))
					{
						$name=$_GET['name'];
						$password=$_GET['password'];
						$searchentry="select * from register where username='$name'";
						$searchresult=mysql_query($searchentry);
						if(mysql_num_rows($searchresult)>0)
						{?>
							<script>
							alert("Sorry admin name already exists\nChoose another name");
							</script>
							<?php
						}
						else
						{
						$query="insert into register(username,password,verify)values ('$name','$password',1)";
						mysql_query($query);
						
						}
					}
					

				?>
				<form method="get" action="addadmin.php">
				<table class="td" border="1">
				<tr><th colspan="2"><h3> Add Admin</h3></th></tr>
				<tr><td width="50%"> Name</td>
					<td><input type="text" name="name" required/></td>
				</tr>
				<tr><td width="50%">Password</td>
					<td><input type="password" name="password"></td>
				</tr>
		<tr><td colspan="2">
		<input type="submit"  class="button-style" name="add" value="ADD"></td>
		</tr>
		</table> 
			</form>	
			<?php
			$selectquery="SELECT * FROM register where verify=1";
					$result=mysql_query($selectquery);
					if(mysql_num_rows($result)>0)
					{	echo '<table width="50%" class="td" border="1">';
						echo '<tr><th colspan=2><h3> Admin List</h3></th></tr>';
						echo '<tr><th>Name</th><th>Delete</th></tr>';
						while($row=mysql_fetch_array($result))
						{
							echo '<tr><td>'.$row['username'].'</td>';
							if($_SESSION['user']==$row['username'])
							{
								echo '<td></td></tr>';
							}
							else
							{
							echo '<td><a href="addadmin.php?deleteid='.$row['id'].'">Delete</a></td></tr>';
							}
						}
						echo '</table>';
					}
					else
					{
						echo "<highlight>Admin is not added still.</highlight>";
					}?>
			
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
