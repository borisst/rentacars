<?php
/**
 * @author Boris Sterjev
 * 
 * 
 */

class CarReservation {
	private $db;
	private $firmaid;
	public function __construct($firmaid = null){
		require_once("include/config.inc.php"); 
		require_once("include/Database.class.php");
		$this->firmaid = $firmaid;
		
	}
	
	public function db_select(){
		$this->db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);
	}
	
	
	/**
	 * 
	 * zapisuvanje na rezervacija vo bazata
	 */
	public function insert_data($data_post){
	  $datum_od = $this->clean($data_post['datum_od']);
		$datum_do = $this->clean($data_post['datum_do']);
		$car_klasa = $this->clean($data_post['car-class']);
		$car_id = $this->clean($data_post['car-choice']);
		$firstname = $this->clean($data_post['firstname']);
		$lastname = $this->clean($data_post['lastname']);
		$tel = $this->clean($data_post['tel']);
		$email = $this->clean($data_post['email']);
		$cena = $this->clean($data_post['cena']);

		$_SESSION['form1']['datum_od'] = $datum_od; // store session data
		$_SESSION['form1']['datum_do'] = $datum_do; // store session data
		$_SESSION['form1']['car-class'] = $car_klasa; // store session data
		$_SESSION['form1']['car-choice'] = $car_id; // store session data
		$_SESSION['form1']['firstname'] = $firstname; // store session data
		$_SESSION['form1']['lastname'] = $lastname; // store session data
		$_SESSION['form1']['tel'] = $tel; // store session data
		$_SESSION['form1']['email'] = $email; // store session data
		$_SESSION['form1']['cena'] = $cena; // store session data
		
		$this->db_select(); 
		$this->db->connect(); 
		//se zima dok_id od tabelata rent_rezervacii 
		//se formatira vo format Ryyxxxxxx
		//yy - godina
		//xxxxxx - increment na posledniot vnes vo bazata
		//se vnesuvaat podatocite vo bazata
		$sql = "SELECT * 
				FROM ".TABLE_RENT_REZERVACII."
				WHERE dok_id = ( 
				SELECT MAX( dok_id ) 
				FROM ".TABLE_RENT_REZERVACII.")";	
		$rows = $this->db->fetch_all_array($sql);
		foreach($rows as $record){ 
			$dok_id= $record['DOK_ID'];
		}
		$id_num = intval(substr($dok_id, 3, strlen($dok_id)-3));
		$id_num++;
		$formatted_id_num = sprintf("%06d", $id_num);
		$year = date('y');
		$dok_id = 'R'.$year.$formatted_id_num;
		$_SESSION['form1']['dok_id'] = $dok_id; // store session data
		$data['DOK_ID'] = $dok_id;
		$data['KONTAKT_LICE']=$firstname.' '.$lastname;
		$data['KONTAKT_TEL'] = $tel;
		$data['DATUM_POC'] = $datum_od;
		$data['DATUM_KRAJ'] = $datum_do;
		$data['CAR_KLASA'] = $car_klasa;
		$data['CAR_ID'] = $car_id;
		$data['DATUM'] = date('Y-m-d H:i:s');
		$data['CENA'] = $cena;
		$data['STATUS'] = 'R';//prvicen status na rezervacijata, koga e potvrdena se dobiva status P
		try {
		    $this->db->query_insert(TABLE_RENT_REZERVACII, $data);
		    unset($data['CAR_KLASA']);
		    $this->db->query_insert(TABLE_RENT_DOGOVOR, $data);
		} catch (Exception $e) {
		    return  $e->getMessage();
		}
		try{
			mail($email, 'Ime na firma -rent a car',$data['KONTAKT_LICE'], "From:no-replay@email.com");
		}catch (Exception $e){
			return $e->getMessage();
		}
		
	}
	
	/**
	 * 
	 * dodava nuli na pocetokot od nekoj string
	 * primer: 0000001
	 * se koristi za generiranje na DOK_ID
	 * @param string $mStretch
	 * @param int $iLength
	 */
	private function zerofill($mStretch, $iLength = 2)
	{
	    $sPrintfString = '%0' . (int)$iLength . 's';
	    return sprintf($sPrintfString, $mStretch);
	}
	
	public function validation(){
		
	}
	
	/*
	 * kalkulacija na cena
	 * 
	 */
	public function get_rate($car_id=null, $zona=null, $denovi=null){
		$this->db_select(); 
		$this->db->connect(); 		 
		$sql = "SELECT vrati_cena('$car_id', '$zona', '$denovi')";
		$rows = $this->db->fetch_all_array($sql); 
		
		$price = "";
			foreach($rows as $record){ 
				$cena = $record["vrati_cena('$car_id', '$zona', '$denovi')"];
				$price .= 'Cenata e:'.$cena.'<input type="hidden" name="cena" value="'.$cena.'"/> denari';
			}
		return json_encode($price);
	}
/*	
	public function get_days($datum_od, $datum_do){
		$datum_od = strtotime($datum_od);
		$datum_od = strtotime($datum_do);
		$total_days = abs($datum_od-$datum_do);
		return $total_days/86400;
	}
*/	
	/*
	 * izbor na klasa na vozilo
	 */
	public function car_class(){	
		$this->db_select(); 
		$this->db->connect(); 		
		$sql = "SELECT * FROM `".TABLE_CARS_KLASI."` 
		          WHERE FIRMAID = ".$this->firmaid." ORDER BY `CAS_KLASA` DESC"; 
		$rows = $this->db->fetch_all_array($sql); 
		
		return $rows;
	}
	
	/*
	 * izbor na vozilo vrz osnova na klasata
	 */
	public function car_choise($car_clas = null, $datum_od = null, $datum_do = null){
		if(!empty($car_clas)){
			$this->db_select();
			$datum_od = date_format(date_create($datum_od),"Y-m-d");
			$datum_do = date_format(date_create($datum_do),"Y-m-d");
			$this->db->connect(); 		
			$sql = "select car_id, marka, model, registracija, tip_gorivo, tip_menuvac, tekovna_lokacija, zafatnina, 
			MOKNOST_KW , BR_VRATI, reg_do, PROIZVODSTVO, OPREMA_KLIMA, OPREMA_EL_PROZORI, OPREMA_CENTR_BRAVA, 
			OPREMA_ABS, OPREMA_LANCI, OPREMA_DOKUMENTI, OPREMA_REZ_TRKALO, OPREMA_DIGALKA, OPREMA_PRVA_POMOS, 
			OPREMA_RADIO, OPREMA_REZ_SIJALICI, oprema_triagolnik, zgumi_broj
			from cars 
			where otpisan_datum is null
			  and KLASA = '$car_clas'
        and ifnull(tekovna_lokacija, 'M') not in ('S', 'P')
        and slobodno_vozilo(car_id, '$datum_od', '$datum_do','') =  '1'
			order by marka, model, tip_gorivo, tip_menuvac, zafatnina, proizvodstvo;";
			$rows = $this->db->fetch_all_array($sql); 
			$cars_dropdown = '<select id="car-choice-select" name="car-choice">';
			$cars_dropdown .= '<option value="" selected>--Izberi marka na mozilo--</option>';
			foreach($rows as $record){ 
				$cars_dropdown .= '<option value="'.$record['car_id'].'">'.$record['marka'].'-'.$record['model'].'-'.$record['PROIZVODSTVO'].'</option>';
			}
			$cars_dropdown .= '</select>';
			return json_encode($cars_dropdown);
		}
		else{
			return "Izberi klasa na vozilo";
		}
	}
	
		/**
		 * 
		 * Function to sanitize values received from the form. Prevents SQL injection ...
		 * @param string $str
		 */
	public 	function clean($str) {
     // $this->db_select();
			$str = @trim($str);
			if(get_magic_quotes_gpc()) {
				$str = stripslashes($str);
			} 
   return $str; 
			//return mysql_real_escape_string($str);
		}
	
	

}
?>