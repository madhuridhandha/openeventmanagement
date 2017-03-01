<?php
$num_rec_per_page=6;
session_start();
include_once('connection.php');

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
				<h1 align="center">Upcoming Events  List</h1>
				<?php
				
				if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }
				$start_from = ($page-1) * $num_rec_per_page; 

				$sql = "SELECT * from event_list order by eventdate desc"; 
				$rs_result = mysql_query($sql); //run the query
				$total_records = mysql_num_rows($rs_result);  //count number of records
				$total_pages = ceil($total_records / $num_rec_per_page); 

				echo "<a href='events.php?page=1'>".'|<'."</a> "; // Goto 1st page  

				for ($i=1; $i<=$total_pages; $i++) { 
				echo "<a href='events.php?page=".$i."'>".$i."</a> "; 
				}; 
				echo " <a href='events.php?page=$total_pages'>".'>|'."</a><br/>"; // Goto last page

				$sql = "SELECT * FROM event_list order by eventdate desc LIMIT $start_from, $num_rec_per_page"; 
				$rs_result = mysql_query ($sql); //run the query

				while ($row = mysql_fetch_assoc($rs_result)) 
				{
					echo "<div class='event'><p>`".$row['eventname'];
					echo "` on date ".chdate($row['eventdate'])."";
					echo "</p>".$row['eventdesc']."</div><br/>";
					
				}
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
