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
				<h1 align="center"> Attendance</h1>
				<form method="get">
					<table class="td"border="1" width="70%">
					<tr><th>
					<b>Select Class</b></th>
				
				<th>
					<?php
					//Display the class name from table class_list
					
					$selectquery="SELECT classname	FROM class_list order by classname";
					$result=mysql_query($selectquery);
					if(mysql_num_rows($result)>0)
					{	echo '<select name="classselect"required>';
						echo '<option>--select--</option>';
						while($row=mysql_fetch_array($result))
						{
							echo '<option>'.$row['classname'].'</option>';
							
						}
						echo '</select>';
					}
					else
					{
						// if class could not found
						echo "<br/><font color='red'>Class is not inserted</font><br/><br/>
						<a href='addclass.php'> Click Here</a> to add the class.";
					}
					
					?>
			
							
				</th>
				<th rowspan=2>
					<input type="submit"  class="button-style" name="select" value="Select">
					</th></tr>
				
				<tr><th>Select Date</th>
				<th>
					<input type="date" name="date" required/>
					</th></tr>
					
					</td>
					</tr>
					</table> 
				</form>
				
				<?php
				
				//when attendance is saved
				if(isset($_POST['pr']))
				{	$date=$_POST['date'];
					$classid=$_POST['classid'];
					
					//check in the databse if same attendance is saved or not
					
					$searchentry=mysql_query("select * from attendance where attdate='$date' and classid=$classid");
					
					if(mysql_num_rows($searchentry)>0)
						echo "<br/><br/><highlight> Data already Saved.</highlight>";
					else
					{	
						// If attendance is not found in the database then save it.
						
						
						foreach($_POST['pr'] as $x=>$xvalue)
						{	$attendance=$attendance."$xvalue,"; }
						$attendance=substr($attendance,0,strlen($attendance)-1);
						$queryinsert="insert into attendance(attdate,classid,attendance) values('$date',$classid,'$attendance')";
						mysql_query($queryinsert);
						$fdate=chdate($date);  
						
						echo "<highlight>Attendance Successfully Saved for class -".$_SESSION['class']." ($fdate).</highlight>";
						
					}
					echo "<br/><br/><h3>Present student's Roll numbers are :</h3><br/><br/>";
					$selectatt="select attendance from attendance where classid=$classid and attdate='$date'";
					$res=mysql_query($selectatt);
					$row=mysql_fetch_array($res);
					$att=$row[0];
					echo "<t>$att</t>";
					
					echo "<br/><br/><h3>Absent student's Roll  numbers are :</h3><br/><br/>";
					 $selectabsentatt="select s.rollno from student_list s, attendance a where a.classid=s.classid and attdate='$date' and a.classid=$classid and s.rollno not in($att)";
					
					$res2=mysql_query($selectabsentatt);
					while($row2=mysql_fetch_array($res2))
					 echo "<t>".$row2[0].",</t>";
				}
				
				// allow user to select the class and date
				if(isset($_GET['classselect']) && $_GET['classselect']!='--select--')
				{	echo "<h3>attendance of class - ";
					$_SESSION['class'] =$class	=$_GET['classselect'];
					$attendancedate=$_GET['date'];
					echo $class." for the date ".chdate($attendancedate)."</h3>";
					echo "<br/>";
				
				//diplay the list of students for marking presence.				
					$select="SELECT *FROM student_list s,class_list c where s.classid=c.classid and c.classname='$class' order by rollno ";
					$result=mysql_query($select);
					if(mysql_num_rows($result)>0)
					{	$sr=1;
						echo '<form method="post" action="attendance.php">';
						echo '<table class="td" border=1 width="70%">';
						echo '<tr>
						<th>Serial No.</th><th>Student Name</th><th>Roll No.</th><th>Present / Absent</th></tr>';
						?>
						<script>
						alert("Present students are ticked.\n\nUntick the absent students.");
						</script>
						<?php
						while($row=mysql_fetch_array($result))
						{
							echo '<tr><td>'.$sr.'</td><td>'.$row['studentname'].'</td><td>'.$row['rollno'].'</td><td><input type="checkbox" name="pr[]" value="'.$row['rollno'].'" checked="true"></td></tr>';
							$sr++;
							$class=$row['classid'];
						}
						
						//to pass the value of date and class for page redirection.
						echo '<input type="hidden" name="date" value="'.$attendancedate.'"><input type="hidden" name="classid" value="'.$class.'">';
						echo '<tr><td colspan=4>
						<input type="submit"  class="button-style" name="save" value="Save"><input type="reset"  class="button-style" value="Reset">
					</td></tr>';
						echo '</table></form>';
					}
					else
						echo "sorry data doesnot found";
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
