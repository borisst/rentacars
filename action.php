<?php
session_start();
/**
 * 
 */
//prikazuvanje na greswki
ini_set ( "display_errors", "on" );
error_reporting ( E_ALL | E_STRICT );

require("CarReservation.class.php"); 
global $firmaid;

//setiranje na vremenska zona
date_default_timezone_set("Europe/Skopje");

//print_r($_POST);
//exit;


$cr = new CarReservation(1);


if($_POST){
	//serialize(print_r("kk"));
	if(isset($_POST['submit'])){
		//validacija
		require_once 'Validation.class.php';
		$form = new Validation();
		$datum_od = $_POST['datum_od'];
		$datum_do = $_POST['datum_do'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$tel = $_POST['tel'];
		$email = $_POST['email'];
		
		$error['fname_error'] = $form->name_validation($firstname, 'First name');
		$error['lname_error'] = $form->name_validation($lastname, 'Last name');
		$error['email_error'] = $form->email_validation($email, 'E-mail');
		$error['phone_error'] = $form->digits_validation($tel, 'phone number');
		//kraj za validacija
		if(is_array_empty($error)){
			//vnesuvanje vo baza
			//echo json_encode($cr->insert_data($_POST)); 
			$cr->insert_data($_POST);
			echo json_encode($error['false']=null);
		}
		else{
			//pecatenje na greska
			echo json_encode($error);
		}
		
		exit;	
		//zapisuvanje vo bazata		
	}
	else{
		if($_POST['datum_od'] && $_POST['datum_do'] && $_POST['car_klasa']){
			$datum_od = clean($_POST['datum_od'], $cr);
			$datum_do = clean($_POST['datum_do'], $cr);
			$car_klasa = clean($_POST['car_klasa'], $cr);
			$_SESSION['form1']['car-klasa']= clean($_POST['text'], $cr);
			car_choise($car_klasa, $datum_od, $datum_do, $cr);
		}
		else{
			if(empty($_POST['car_klasa'])){
				//error
				echo "Izberi klasa na vozilo";
			}
			if(empty($_POST['datum_od']) || empty($_POST['datum_do'])){
				//error
				echo "Popolnete gi datum od i datum do!";
			}
		}
	}
}
if($_GET){
	if(isset($_GET['pecati'])){
		generate_pdf();
	}
	if(isset($_GET['car_id'])){
		$car_id = clean($_GET['car_id'], $cr);
		$denovi = clean($_GET['denovi'], $cr);
		$zona = clean($_GET['zona'], $cr);
		$_SESSION['form1']['car-model']= clean($_GET['text'], $cr);
		price($car_id, $zona, $denovi, $cr);
	}
	if(isset($_GET['dataOd'])){
		echo json_encode($cr->date_convert($_GET['dataOd']));
	}
	if(isset($_GET['date'])){
		$d1 = $_GET['d1'];
		$d2 = $_GET['d2'];
		//echo $d1;
		$date1 = $cr->date_convert($d1, true);
		$date2 = $cr->date_convert($d2, true);
	//	$date1 = date_create_from_format('d/m/Y H:i', $d1);
	//	$date2 = date_create_from_format('d/m/Y H:i', $d2);
		
	//	$date1 = date_format($date1, 'Y-m-d H:i');
	//	$date2 = date_format($date2, 'Y-m-d H:i');
		//echo date("Y-m-d H:i", strtotime($date1));

		$dStart = new DateTime($date1);
	    $dEnd  = new DateTime($date2);
	    $dDiff = $dStart->diff($dEnd);;
	    $d['d'] = $dDiff->days;
	    $d['h'] = $dDiff->h;
	    if($dDiff->invert != 0) {
	    	$d['d'] = -$dDiff->days;
	    }
	    echo json_encode($d);
	   // echo $dDiff->d.' '.$dDiff->h;
	}
	if(isset($_GET['mesto'])){
		$mesto = $_GET['mesto'];
		$html = '
		<ul class="lokacija '.$mesto.'">
		    <li>
		      <h3>Берово</h3>
		    </li>
		       
		    <li>
		      <h3>Сkopje</h3>
		    </li>
		 
		    <li>
		      <h3>Штип</h3>
		    </li>
		 
		    <li>
		      <h3>Струмица</h3>
		    </li>
		  </ul>';
		echo $html;
	}
	
}
exit;



/**
 * 
 * Funkcijata ja dava cenata za izbranoto vozilo
 * @param int $car_id
 * @param string $zona
 * @param int $denovi
 * @param object $cr
 */
function price($car_id, $zona='',$denovi, $cr){
	echo json_decode($cr->get_rate($car_id, $zona, $denovi));
}

/**
 * 
 * Funkcijata gi diva site slobodni vozila za odreden datum i izbrana klasa
 * @param string $car_klasa
 * @param string $datum_od
 * @param string $datum_do
 * @param object $cr
 */
function car_choise($car_klasa, $datum_od, $datum_do, $cr){
	echo json_decode($cr->car_choise($car_klasa, $datum_od, $datum_do));
}

/**
 * Funkcijata gi ciste  (sanitize) vrednostite dobieni od formata, Zastita od SQL injection
 * @param string $str
 */
function clean($str, $cr) {
  $cr->db_select();
	$str = @trim($str);
	if(get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
 	return $str;
	//return mysql_real_escape_string($str);
}

/**
 * 
 * Proveruva dali elementite na edna niza se prazni
 * @param array $a
 */
function is_array_empty($a){
	foreach($a as $elm){
		if(!empty($elm)){
			return false;
		}
	}
	return true;
}

?>