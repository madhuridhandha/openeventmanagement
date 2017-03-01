<?php
$server='localhost';
$user='root';
$password='';
$database='freelancer';
error_reporting(0);
mysql_connect($server,$user,$password);
mysql_select_db($database);

function chdate($date)
{
	$fdate=date_create("$date");  
	$fdate=date_format($fdate,"d-m-Y");
	return $fdate;
}
?>