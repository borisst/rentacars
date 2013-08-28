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
		echo json_encode($cr->insert_data($_POST));
		
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
 * 
 * Function to sanitize values received from the form. Prevents SQL injection ...
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



?>