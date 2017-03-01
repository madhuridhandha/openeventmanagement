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
				<h1>contact us </h1>
				<p>This is.   The photos in this Fotogrph. This free template is released under the license, so you're pretty much free to do whatever you want with it (even use it commercially) provided you give us credit for it. Have fun :) </p>sce odio. Etiam arcu dui, faucibus eget, placerat vel, sodales eget, orci. Donec ornare neque ac sem. Mauris aliquet. Donec leo. Vivamus fermentum nibh in augue. Praesent a lacus at urna congue rutrum. Nulla enim eros, porttitor eu, tempus id, varius non, nibh. Duis enim nulla, luctus eu, dapibus lacinia, venenatis id, quam. Vestibulum imperdiet, magna nec eleifend rutrum, nunc lectus vestibulum velit, euismod lacinia quam nisl id lorem. Quisque erat. Vestibulum pellentesque, justo mollis pretium suscipit, justo nulla blandit libero, in blandit augue justo quis nisl. 
				<p class="button-style"><a href="events.php">More Events</a></p>
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
<?php include_once('footer.php');?></div>
</body>
</html>
