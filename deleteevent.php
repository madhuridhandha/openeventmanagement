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
				<h1 align="center"> Event List</h1>
		<?php
		if(isset($_GET['eid']))
		{
			$deletequery="DELETE FROM event_list where eid='$_GET[eid]'";
			mysql_query($deletequery);
			?><script>alert("Data deleted successfully.")</alert></script>
			<?php
		}
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }
		$start_from = ($page-1) * $num_rec_per_page; 
		
		$sql = "SELECT * from event_list order by eventdate desc"; 
		$rs_result = mysql_query($sql); //run the query
		 $total_records = mysql_num_rows($rs_result);  //count number of records
		 $total_pages = ceil($total_records / $num_rec_per_page); 

		echo "<a href='deleteevent.php?page=1'>".'|<'."</a> "; // Goto 1st page  

		for ($i=1; $i<=$total_pages; $i++) { 
			echo "<a href='deleteevent.php?page=".$i."'>".$i."</a> "; 
		}; 
		echo " <a href='deleteevent.php?page=$total_pages'>".'>|'."</a><br/> "; // Goto last page
		
		$sql = "SELECT * FROM event_list LIMIT $start_from, $num_rec_per_page"; 
		$rs_result = mysql_query ($sql); //run the query
		
		if(!isset($_GET['page']))
			$_GET['page']=1;
		while ($row = mysql_fetch_assoc($rs_result)) 
		{	
			?>
			<a href="deleteevent.php?page=<?php echo $_GET["page"];?>&eid=<?php echo $row['eid'];?>"> <img src="images/b_drop.png" /></a>
			<div class='event'><p>
			  "<?php echo $row['eventname'];?> "</p>
			on <?php echo $row['eventdate'];?>
			<br/> <?php echo $row['eventdesc'];?>
			
			</div>
			
			<?php
			
				
		 
		};
		?>
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
