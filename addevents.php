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
					$target_dir = "images/";
					$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					
			if(isset($_POST['add'])&&isset($_POST['eventname']))
			{
				$eventname=$_POST['eventname'];
				$eventdesc=$_POST['eventdesc'];
				$eventdate=$_POST['eventdate'];
				// for image					
			if(isset($_POST["fileToUpload"]))	{			
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
					if($check !== false) {
						echo "File is an image - " . $check["mime"] . ".";
						$uploadOk = 1;
					} else {
						echo "File is not an image.";
						$uploadOk = 0;
					}
					// Check if file already exists
				if (file_exists($target_file)) {
					echo "Sorry, file already exists.";
					$uploadOk = 0;
				}
				if ($_FILES["fileToUpload"]["size"] > 500000) {
					echo "Sorry, your file is too large.";
					$uploadOk = 0;
				}
				
// Check file size
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
						echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
					} else {
						echo "Sorry, there was an error uploading your file.";
					}
				}
}
						$query="insert into event_list(eventname,eventdate,eventdesc)values ('$eventname','$eventdate','$eventdesc')";
						mysql_query($query);
					?>
					<script>
						alert("Event Successfully Inserted.");
					</script>
					<?php
						
					}

				?>
				<form method="post" enctype="multipart/form-data">
				<table class="td" border="1">
				<tr><th colspan="2"><h3> Add Event</h3></th></tr>
				<tr><td width="50%">Event Name</td>
					<td><input type="text" name="eventname" required/></td>
				</tr>
				<tr><td width="50%">Event Date</td>
					<td><input type="date" name="eventdate"/></td>
				</tr>
				<tr><td width="50%">Event Description</td>
					<td><textarea cols=40 rows=10 name="eventdesc"></textarea></td>
				</tr>
				<tr><td width="50%">Event Photos</td>
					<td><input type="file" name="fileToUpload"></td>
				</tr>
				<tr><td colspan="2">
				<input type="submit"  class="button-style" name="add" value="ADD"></td>
				</tr>
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
