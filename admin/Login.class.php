<?php
/**
*
*   Login class 
*	
*
*	Boris Sterjev
*	borces@gmail.com
*	16.10.2010
*/

/*if(!defined("HAS_ACCESS")) {
	header("location: index.php");
	exit();
}*/
require_once("../CarReservation.class.php"); 

class Login extends CarReservation{

	private $cr;
	
	public function __construct(){
		require_once('../include/Database.class.php');
		require_once("../include/config.inc.php"); 
		/*
		$this->cr = new CarReservation();*/
		$this->sec_session_start();
		//$this->firmaid = $firmaid;		
	}
	
	public function login(){		
		//define('DS', DIRECTORY_SEPARATOR);	
		//Sanitize the POST values
		$login = $this->clean($_POST['username']);
		$password = $this->clean($_POST['password']);
		$salt='ffff3245mhbjhdsa76234';
		$password = hash('sha512', $password.$salt); // hash the password with the unique salt.
		
		//validacija
		if(($this->validateInput($login)) || ($this->validateInput($password))){
				session_regenerate_id();	
				$_SESSION['ERRMSG_ARR'] = 'Погрешно корисничко име или лозинка';
				session_write_close();
				header("location: index.php");
				exit();
		}

		$result = $this->get_firma($login, $password);
		//print_r($result);
		//exit;
		//Check whether the query was successful or not
		if(count($result) == 1) {
			//Login Successful
			session_regenerate_id();
		//	$_SESSION['SESS_FIRMAID'] = $result[0]['FIRMAID'];
			$user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
			
			$firmaid = preg_replace("/[^0-9]+/", "", $result[0]['FIRMAID']); // XSS protection as we might print this value
            $_SESSION['SESS_FIRMAID'] = $firmaid;        
            $_SESSION['SESS_LOGIN_STRING'] = hash('sha512', $firmaid.$user_browser);
               // Login successful.
			session_write_close();
			return true;
		}else {
			//Login failed
			session_regenerate_id();
			
			$_SESSION['ERRMSG_ARR'] = 'Погрешно корисничко име или лозинка';
			session_write_close();
			return false;
		}		
	}
	

	
	public function logout(){
		$_SESSION = array();
		// get session parameters 
		$params = session_get_cookie_params();
		// Delete the actual cookie.
		setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
		// Destroy session
		session_destroy();
		header("location: index.php");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
/*	private function clean($str) { 
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}*/
	
	private function validateInput($str){
		$str = filter_var($str, FILTER_SANITIZE_STRING);  
	    if ($str == "") {  
			$errflag = true;  
			return true;
	    }
		return false;
	}
}
?>