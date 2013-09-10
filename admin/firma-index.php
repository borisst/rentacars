<?php
/*	
	ini_set("display_errors", "on");
	error_reporting(E_ALL | E_STRICT);  
	*/
	date_default_timezone_set("Europe/Skopje");
	define("HAS_ACCESS", true);	
	require_once('auth.php');
/*	require("../CarReservation.class.php"); 
	$cr = new CarReservation();
	$firma_detail = $cr->get_firma_detail($_SESSION['SESS_FIRMAID']);*/
?>
<!DOCTYPE HTML>
<html dir="ltr" lang="en-US">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Име на фирма</title>

	<!--- CSS --->
	<link rel="stylesheet" href="css/style.css" type="text/css" />


	<!--- Javascript libraries (jQuery and Selectivizr) used for the custom checkbox --->

	<!--[if (gte IE 6)&(lte IE 8)]>
		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="js/selectivizr.js"></script>
		<noscript><link rel="stylesheet" href="css/fallback.css" /></noscript>
	<![endif]-->

	</head>

	<body>
		<div id="container">
		</div>
		<div id="footer">
		<?php //echo mb_convert_encoding($firma_detail['NAZIV'],'UTF-8','windows-1251');?>
		</div>
	</body>
</html>
