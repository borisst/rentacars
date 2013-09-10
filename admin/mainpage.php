<?php
	// prikazuvanje na greska
	ini_set("display_errors", "on");
	error_reporting(E_ALL | E_STRICT);  
	
	define("HAS_ACCESS", true);
	require_once("Login.class.php"); 
	//sessijata avtopatski se startuva vo contruktorot na klasot	
	$oLoginClass = new Login(); 
	if($_POST){
		if($oLoginClass->login()){ 
			header("location: firma-index.php");
		}
		else{
			header("location: index.php");
		}
	}
	elseif (isset($_GET['logout'])){
		$oLoginClass->logout();
	}
	else {
		header("location: index.php");
	}
	
?>