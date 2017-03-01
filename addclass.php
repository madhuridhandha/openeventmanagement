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
						$classid=$_GET['deleteid'];
						$deletequery="delete from class_list where classid='$classid'";
						mysql_query($deletequery);
					}
					if(isset($_GET['add'])&&isset($_GET['classname']))
					{
						$classname=$_GET['classname'];
						$classteacher=$_GET['classteacher'];
						$searchentry="select * from class_list where classname='$classname'";
						$searchresult=mysql_query($searchentry);
						if(mysql_num_rows($searchresult)>0)
						{?>
							<script>
							alert("Sorry Class name already exists\nChoose another class name");
							</script>
							<?php
						}
						else
						{
						$query="insert into class_list(classname,classteacher)values ('$classname','$classteacher')";
						mysql_query($query);
						
						}
					}
					

				?>
				<form method="get" action="addclass.php">
				<table class="td" border="1">
				<tr><th colspan="2"><h3> Add Class</h3></th></tr>
				<tr><td width="50%">Class Name</td>
					<td><input type="text" name="classname" required/></td>
				</tr>
				<tr><td width="50%">Class Teacher Name</td>
					<td><input type="text" name="classteacher"></td>
				</tr>
		<tr><td colspan="2">
		<input type="submit"  class="button-style" name="add" value="ADD"></td>
		</tr>
		</table> 
			</form>	
			<?php
			$selectquery="SELECT * FROM class_list order by classname";
					$result=mysql_query($selectquery);
					if(mysql_num_rows($result)>0)
					{	echo '<table width="50%" class="td" border="1">';
						echo '<tr><th colspan=3><h3> Class List</h3></th></tr>';
						echo '<tr><th>Class Name</th><th colspan=2>Class Teacher</th></tr>';
						while($row=mysql_fetch_array($result))
						{
							echo '<tr><td>'.$row['classname'].'</td>';
							echo '<td>'.$row['classteacher'].'</td>';
							echo '<td><a href="addclass.php?deleteid='.$row['classid'].'">Delete</a></td></tr>';
						}
						echo '</table>';
					}
					else
					{
						echo "<highlight>Class is not added still.</highlight>";
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
