<?php error_reporting(0);
	@mysql_connect("localhost","root","") or die("Demo is not available, please try again later");
	@mysql_select_db("bid2win") or die("Demo is not available, please try again later");
	session_start();
?>