<?php
//print_r($_SESSION);
//exit;
/*	*/
	ini_set("display_errors", "on");
	error_reporting(E_ALL | E_STRICT);  
	
	date_default_timezone_set("Europe/Skopje");
	define("HAS_ACCESS", true);	
	require_once('auth.php');
	//require("../CarReservation.class.php"); 
	$cr = new CarReservation();
	$firma_detail = $cr->get_firma_detail($_SESSION['SESS_FIRMAID']);
?>
<!DOCTYPE HTML>
<html dir="ltr" lang="en-US">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Име на фирма</title>

	<!--- CSS --->
	<link rel="stylesheet" href="css/style.css" type="text/css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<!--- Javascript libraries (jQuery and Selectivizr) used for the custom checkbox --->

	<!--[if (gte IE 6)&(lte IE 8)]>
		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="js/selectivizr.js"></script>
		<noscript><link rel="stylesheet" href="css/fallback.css" /></noscript>
	<![endif]-->

	</head>

	<body>
		<div id="main">
		<h1>Резервација / Договор за наем на возило</h1>
		<div id='cssmenu'>
			<ul>
			   <li class='active'><a href='firma-index.php'><span>Почеток</span></a></li>
			   <li><a href='#' id="new_contract"><span>Нов договор</span></a></li>
			   <li><a href='#' id="contract_list" ><span>Преглед на договори</span></a></li>
			   <li class='last'><a href='#' id="cars"><span>Aвтомобили</span></a></li>
			</ul>
		</div>
		<div id="content">
			<div id="loader"></div>
		</div>
		</div>
		<div id="footer">
		<?php  //print_r($firma_detail);
		echo $firma_detail['NAZIV'];?>
		</div>
<script>
	$(document).ready( function() {

		    $.ajaxSetup ({  
		        cache: false  
		    });  
		    var ajax_load = '<img src="../img/ajax-loader.gif" />';  
		      
		//  load() functions  
		    var loadUrl = "action-admin.php?action=contracts_list";  
		    $("#contract_list").click(function(){  
		        $("#content").html(ajax_load).load(loadUrl);  
		    });  
		});
</script>		
	</body>
</html>
