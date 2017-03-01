<?php 
$num_rec_per_page=10;
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
		
		<form method="get">
					<table class="td" border="1"width="70%">
					<tr><th colspan="2"><h3> Select Class</h3></th></tr><tr>
				
				<th>
					<?php
					//Display the class name from table class_list
					
					$selectquery="SELECT classid,classname FROM class_list order by classname";
					$result=mysql_query($selectquery);
					if(mysql_num_rows($result)>0)
					{	echo '<select name="class"required>';
						echo '<option>--select--</option>';
						while($row=mysql_fetch_array($result))
						{
							echo '<option value="'.$row['classid'].'">'.$row['classname'].'</option>';							
						}
						echo '</select>';
					}
					
					?>
									
				</th>
				<th>
					<input type="submit"  class="button-style" name="select" value="Select">
					</th></tr>
				</table> 
				</form>

		<?php
		$id=$_GET['class'];$sr=1;
		if(isset($id))
		{
			echo "<h3>Attendance is shown Date Wise in Descending order</h3>";
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }
		$start_from = ($page-1) * $num_rec_per_page; 
		$sql = "SELECT * FROM  `attendance` where classid=$id order by attdate desc  LIMIT $start_from, $num_rec_per_page"; 
		$rs_result = mysql_query ($sql); //run the query
		?> 
		<table class="td" border=1 width="70%">
		<tr><td><t>Sr </t></td><td><t> Date </td><td><t>Class</td><td><t>Absent Student No.</td></tr></t>
		<?php 
		
		while ($row = mysql_fetch_assoc($rs_result)) { 
		?> 
					<tr><td><?php echo $sr;?></td>
					<td><?php echo chdate($row['attdate']); ?></td>
					<td><?php echo $row['classid']; ?></td>            
					<td><?php 
					
					 $selectabsentatt="select s.rollno from student_list s, attendance a where a.classid=s.classid and attdate='$row[attdate]' and a.classid=$row[classid] and s.rollno not in($row[attendance])";
					
					$rest=mysql_query($selectabsentatt);
					while($rowt=mysql_fetch_array($rest))
					 echo $rowt[0].",";
					
					?></td> 
					</tr>
		<?php 
		$sr++;
		};
 		
		?> 
	</table>
		<?php 
		$sql = "SELECT * FROM attendance where classid=$id "; 
		$rs_result = mysql_query($sql); //run the query
		 $total_records = mysql_num_rows($rs_result);  //count number of records
		 $total_pages = ceil($total_records / $num_rec_per_page); 

		echo "<a href='viewattendance.php?class=$id&page=1'>".'|<'."</a> "; // Goto 1st page  

		for ($i=1; $i<=$total_pages; $i++) { 
			echo "<a href='viewattendance.php?class=$id&page=".$i."'>".$i."</a> "; 
		}; 
		echo " <a href='viewattendance.php?class=9&page=$total_pages'>".'>|'."</a> "; // Goto last page
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
