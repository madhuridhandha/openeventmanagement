<div id="header">
		<div id="logo">
			<h1 align=center><a href="#">sri vivekananda vidyvihar</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li class="current_page_item"><a href="index.php" accesskey="1" title="">Home</a></li>
				<li><a href="aboutus.php " accesskey="2" title="">About Us</a></li>
				<li><a href="events.php " accesskey="3" title="">Events</a></li>
				<li><a href="viewattendance.php " accesskey="4" title="">Attendance</a></li>
				<li><a href="viewfaculty.php " accesskey="4" title="">Faculties</a></li>
				<li><a href="contactus.php" accesskey="5" title="">Contact US</a></li>
				<?php
				
				if(isset($_SESSION['user']))
					{
				?>
				<li><a href="logout.php" accesskey="5" title="">Log Out</a></li>
				<?php
				}
				?>
			</ul>
		</div>
	</div>