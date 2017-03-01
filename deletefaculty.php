<?php 
$num_rec_per_page=6;
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
		<table align="left"> <tr><td>
		<?php
		if(isset($_GET['fid']))
		{
			$deletequery="DELETE FROM facultydetail where fid='$_GET[fid]'";
			mysql_query($deletequery);
			?><script>alert("Data deleted successfully.")</alert></script>
			<?php
		}
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }
		$start_from = ($page-1) * $num_rec_per_page; 
		
		$sql = "SELECT * FROM facultydetail"; 
		$rs_result = mysql_query($sql); //run the query
		 $total_records = mysql_num_rows($rs_result);  //count number of records
		 $total_pages = ceil($total_records / $num_rec_per_page); 

		echo "<a href='deletefaculty.php?page=1'>".'|<'."</a> "; // Goto 1st page  

		for ($i=1; $i<=$total_pages; $i++) { 
			echo "<a href='deletefaculty.php?page=".$i."'>".$i."</a> "; 
		}; 
		echo " <a href='deletefaculty.php?page=$total_pages'>".'>|'."</a><br/> "; // Goto last page
		
		$sql = "SELECT * FROM facultydetail LIMIT $start_from, $num_rec_per_page"; 
		$rs_result = mysql_query ($sql); //run the query
		$var=1;
		?>
		
		</td></tr>
		<tr>
		<?php
		if(!isset($_GET['page']))
			$_GET['page']=1;
		while ($row = mysql_fetch_assoc($rs_result)) 
		{	
			?>
			<td><a href="deletefaculty.php?page=<?php echo $_GET["page"];?>&fid=<?php echo $row['fid'];?>"> <img src="images/b_drop.png" /></a>
			<div class='viewfacultyblock'>
			 <b> <?php echo $row['fname'];?></b>
			<br/>Qualification : <?php echo $row['qualification'];?>
			<br/>Address :<br/> <?php echo $row['address'];?>
			<br/>Mobile : <?php echo $row['mobile'];?>
			</div>
			
			<?php
			if($var%3==0)
				echo "</td></tr><tr>";
			else
				echo "</td>";
				
		 $var++;
		};
		?></table>
		</div>
			<?php 
			if(isset($_SESSION['user']))
			include('sidebar.php'); 
			else
			echo "<img border='5px' src='images/header-img.jpg' height=300 width=200/>";?>
		</div>
	</div>
</div>

<div id="footer" class="container">
	<?php include_once('footer.php');?>
</div>
</body>
</html>
