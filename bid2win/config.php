<?php error_reporting(0);
	$con = mysql_connect("localhost","root","");
	mysql_select_db("bid2win",$con);
	define('SITE_URL', 'http://127.0.0.1/bid2win');
	define('CURRENCY_CODE', 'GBP');
	define('MERCHANT_EMAIL', 'farhaan_ahmed-96-facilitator@hotmail.co.uk');
?>