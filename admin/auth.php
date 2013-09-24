<?php
	require_once("Login.class.php"); 
	//sessijata avtopatski se startuva vo contruktorot na klasot	
	$oLoginClass = new Login();

	if(!$oLoginClass->login_check()){
		header("location: index.php");
		exit();
	}
/*	else{
		header("location: firma-index.php");
		exit();
	}*/
/*
	//Check whether the session variable SESS_FIRMAID is present or not
	if(!isset($_SESSION['SESS_FIRMAID']) || (trim($_SESSION['SESS_FIRMAID']) == '')) {
		header("location: index.php");
		exit();
	}*/
?>