<?php
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
				<h1>About us</h1>
				<p>This is.   The photos in this Fotogrph. This free template is released under the license, so you're pretty much free to do whatever you want with it (even use it commercially) provided you give us credit for it. Have fun :) </p>
				
				<p class="button-style"><a href="events.php">More Events</a></p>
			</div>
			<?php 
			if(isset($_SESSION['user']))
				include('sidebar.php'); 
			else
				echo "<img border='5px' src='images/header-img.jpg' height=300 width=200/>";
			?>
		</div>
	</div>
</div>

<div id="footer" class="container">
	<?php include_once('footer.php');?>
</div>
</body>
</html>
