<?php
session_start();
include_once('connection.php');

if(!isset($_SESSION['user']))
	header('location:login.php');

?>
<html>
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Sri vivekananda vidyvihar</title>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Abel|Satisfy' rel='stylesheet' type='text/css' />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />

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
				<table class="td"border="1" width="70%">
				<tr><th colspan="2"><h3> Select Class</h3></th></tr><tr>
				
				<th>
					<?php
					//Display the class name from table class_list
					
					$selectquery="SELECT classid,classname FROM class_list order by classname";
					$result=mysql_query($selectquery);
					if(mysql_num_rows($result)>0)
					{	echo '<select name="class" required>';
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
			<form method="get" action="addstudents.php">
			<?php
			$name=$_GET["name"]; //student name array
			$roll=$_GET["roll"]; //student rollno. array
			$class=$_GET["class"]; // class for the students
			$i=0;
			$count=0; // counter to check how many rows inserted
			while($i<5)
			{		
				if(strlen($name[$i])>0&&($roll[$i]>0))
				{	$query=mysql_query("SELECT * from student_list where classid=$class && rollno=$roll[$i]"); 
					//insert into student table
					if(mysql_num_rows($query)==1)
					{	//check for data duplication
						$s=1;
					}
					else{
					$insert="Insert into student_list values(NULL,'$name[$i]',$class,'$roll[$i]')";
					mysql_query($insert);
					}
					$count++;
				}
				$i++;
			}
			if($s==1)
			{
				echo "<highlight>One or more Values have error in Roll no. Change the Roll number of student.</hightlight>";
			}
			if($count>0) //if any row inserted, give message
			{
				?>
				<script>
				alert("Data  Inserted  Successfully.");
				</script>
				<?php
			}
			
			
			
		$id=$_GET['class']; 
		$sr=1;
		if(isset($id))
		{//display textboxes.
			?>
		<table class="td" border=1 width="70%">
		<tr><td><t>Sr </t></td><td><t> Student Name</t> </td><td><t>Roll No.</t> </td><td><t> Class </t></td></tr>
		<input type="hidden" name="class" value="<?php echo $id;?>">
		<?php 
		$list=0;
		$cname="SELECT classname FROM class_list where classid='$id'";
		$c=mysql_fetch_row(mysql_query($cname));
		
		while($list<5)
		{	echo "<tr><td> $sr </td>
			<td><input type='text' name='name[]'></td>
			<td><input type='text' name='roll[]'></td>
			<td>".$c[0]."</td>
			</tr>";
			$list++;$sr++;
		}
		
		?> 
		<tr><td colspan=4>
		<input type="submit"  class="button-style" name="save" value="Save">
		<input type="reset"class="button-style" >
		</td></tr>
</table>
		<?php
		 }?>
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
