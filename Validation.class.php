<?php

class Validation
{
	function name_validation($name, $field = 'Name', $min_length = 2, $max_length = 50)
	{
		// Full Name must contain letters, dashes and spaces only. We have to eliminate dash at the begining of the name.
		$name = trim($name);
		if (strlen($name) >= $min_length )
		{
			if (strlen($name) <= $max_length )
			{
				/*if(preg_match("/^[a-zA-Z][a-zA-Z -]+$/", $name) === 0)
					//$error = $field.'must contain letters, dashes and spaces only. we don\'t accept dash at the begining of the '.$field;
					$error = 'moze da sodrzi samo bukvi, -';
				else $error = null;*/
				$error = null;
			}else $error = 'Може да биде највеќе '.$max_length.' знака.';
		}else 
			{
				$error = 'Внеси '.$field;
			
			}
		
		return $error;
		
		/*
		if we want to impose the Full Name to start with upper case letter we have to use that:
		if(preg_match("/^[A-Z][a-zA-Z -]+$/", $name) === 0)
		*/
	}
	
	function email_validation($email, $email_label='E-mail')
	{
		//E-mail validation: We use regexp to validate email.
		$email = trim($email);
		if (strlen($email) >= 1 )
		{
			if(preg_match("/^[a-zA-Z]\w+(\.\w+)*\@\w+(\.[0-9a-zA-Z]+)*\.[a-zA-Z]{2,4}$/", $email) === 0)
				$error = 'Внесете валидна емаил адреса';
			else $error = null;
		}else $error = 'Внесете емаил адреса';
		
		return $error;
	}
	
	function digits_validation($digits, $digits_label=null)
	{
		//Value must be digits.
		$digits = trim($digits);
		if (strlen($digits) >= 1 )
		{
			if(preg_match("/^[0-9]+$/", $digits) === 0)
				$error = 'Внесете валиден '.$digits_label;
			else $error = null;
		}else $error = 'Внесете '.$digits_label;
		
		return $error;
	}
	
	function username_validation($username, $username_label)
	{
		//User must be digits and letters.
		$username = trim($username);
		if (strlen($username) >= 1 )
		{
			if(preg_match("/^[0-9a-zA-Z_]{3,}$/", $username) === 0)
				$error = $username_label.' must be digits and letters and at least 3 characters.';
			else $error = null;
		}else $error = 'You have to enter your '.$username_label;
		
		return $error;
	}
	
	function date_validation($date, $date_label=NULL)
	{
		//Date must be with this form: YYYY-MM-DD.
		$date = trim($date);
		if (strlen($date) >= 1 )
		{
			if(preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/", $date) === 0)
				$error = ' Невалидна дата';
			else $error = null;
		}else $error = 'Внеси '.$date_label;
		
		return $error;
	}
	
	function address_validation($address, $required, $address_label)
	{
		//Address must be only letters, numbers or one of the following ". , : /"
		$address = trim($address);
		if (strlen($address_label) == 0) $address_label = 'address';
		
		if (strlen($address) >= 1)
		{
			if(preg_match("/^[a-zA-Z0-9 _.,:\"\']+$/", $address) === 0)
				$error = 'You have to enter a valid '.$address_label;
			else $error = null;
		}elseif ($required == true) 
			$error = 'You have to enter your '.$address_label;
		else $error = null;
		
		return $error;
	}

	function car_licence_validation($address, $required, $address_label)
	{
	}	
	
	function password_validation($password, $level, $password_label)
	{
		$password = trim($password);
		
		switch ($level)
		{
			//Password must be at least 8 characters
			case 0:
			if (strlen($password) >= 1 )
			{
				if(preg_match("/^.*(?=.{8,}).*$/", $password) === 0)
					$error = 'Password must be at least 8 characters.';
				else $error = null;
			}else $error = 'You have to enter your '.$password_label;
			
			break;
			
			//Password must be at least 8 characters and at least one digit.
			case 1:
			if (strlen($password) >= 1 )
			{
				if(preg_match("/^.*(?=.{8,})(?=.*[0-9]).*$/", $password) === 0)
					$error = 'Password must be at least 8 characters and one digit.';
				else $error = null;
			}else $error = 'You have to enter your '.$password_label;
			
			break;
			
			//Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit(alphanumeric).
			case 2:
			if (strlen($password) >= 1 )
			{
				if(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $password) === 0)
					$error = 'Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit.';
				else $error = null;
			}else $error = 'You have to enter your '.$password_label;
			
			break;
		
			default:
			$error = null;
			break;			
		}
		return $error;
	}
	
	/**
	 * 
	 * Валидација за македонски матичен број 
	 * на родени од 1900 до 2899 год
	 * @param string $embg
	 * @param string $msg
	 */
	public function embg_validation($embg = NULL, $msg=null){
		//prazen string
		if(empty($embg)){
			$error = 'Внесете '.$msg;
		}
		else{
			//razlicno od 13 brojki
			if(strlen($embg)!=13){
				$error = 'Погрешен '.$msg;
			}else{
				//ako nekoj od znacite ne e broj
				for ($i=0; $i++; $i<=12){
					if(!is_int($embg[$i])){
						$error = 'Погрешен '.$msg;
					}
				}
				
				$d = substr($embg, 0,2);
				$m = substr($embg, 2,2);
				$y = substr($embg, 4,3);
				$code = substr($embg, 6,6);
				$stotki = substr($y, 0,1);
				if($stotki == 9){
					$iljadarki = 1;
				}
				else{
					$iljadarki = 2;
				}
				$year = $iljadarki.$y;
				$is_valid_date = checkdate($m, $d, $year);
				if(!$is_valid_date){
					$error = 'Погрешен '.$msg;
				}
				else{
					$error = null;
				}
			}
		}
		return $error;
	}
	
	
};
?>