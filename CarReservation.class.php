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
		//$this->firmaid = $firmaid;
		
	}
	
	public function db_select(){
		$this->db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
    	if(isset($_SESSION['firmaid'])){
  			$this->firmaid = $_SESSION['firmaid'];
  		}
	}
	
 	public function get_firma($username = null, $password = null){
 		$this->db_select(); 
		$this->db->connect();
 		if(empty($username) || empty($password)){
			$host = $_SERVER['HTTP_HOST'];			 		 
			$sql = "SELECT * FROM firma WHERE http='$host'";
			$rows = $this->db->query_first($sql); 
			$_SESSION['firmaid'] = $rows['FIRMAID'];
			return $rows;	
 		}
 		else{
 			$sql="SELECT FIRMAID, USERNAME, PASSWORD FROM firma WHERE USERNAME='$username' AND PASSWORD='".$password."'";
			$result = $this->db->fetch_all_array($sql); 
			return $result;
 		}
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
		    //$this->db->query_insert(TABLE_RENT_DOGOVOR, $data);
		} catch (Exception $e) {
		    return  $e->getMessage();
		}
		try{
      # First, instantiate the SDK with your API credentials and define your domain. 
      $firma_detail =  $this->get_firma();
			$this->send_mail($email,$firma_detail);
			//mail($email, 'Ime na firma -rent a car',$data['KONTAKT_LICE'], "From:no-replay@email.com");
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
	
	
public function send_mail($to, $firma_detail){
     $mg_api = 'key-7l3inwcadklnc1uyagv7qkchwq-bscg9';
      $mg_version = 'api.mailgun.net/v2/';
      $mg_domain = "rentacarsborces.mailgun.org";
      $mg_from_email = "borces@gmail.com";
      $mg_reply_to_email = "borces@gmail.com";
      
      $mg_message_url = "https://".$mg_version.$mg_domain."/messages";
      
 /*     
$headers = array(
               "Content-Type: application/x-www-form-urlencoded; charset: windows-1251"
            );
   */   
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
 //     
//	  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt ($ch, CURLOPT_MAXREDIRS, 3);
      curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, false);
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt ($ch, CURLOPT_VERBOSE, 0);
      curl_setopt ($ch, CURLOPT_HEADER, 1);
      curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 10);
      curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
      
      curl_setopt($ch, CURLOPT_USERPWD, 'api:' . $mg_api);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      
      curl_setopt($ch, CURLOPT_POST, true); 
      //curl_setopt($curl, CURLOPT_POSTFIELDS, $params); 
      curl_setopt($ch, CURLOPT_HEADER, false); 
      
      //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
      curl_setopt($ch, CURLOPT_URL, $mg_message_url);
      
      curl_setopt($ch, CURLOPT_POSTFIELDS,                
              array(  'from'      => 'aaaa <' . $mg_from_email . '>',
                      'to'        => $to,
                      'h:Reply-To'=>  ' <' . $mg_reply_to_email . '>',
                      'subject'   => 'Rezervacija na avtomobil '.$firma_detail['NAZIV'],
                      'html'      => '<h1>Rezervacija na avtomobil'.$firma_detail['NAZIV'].'</h1>',
                 //     'attachment'[1] => 'aaa.rar'
                  ));
      $result = curl_exec($ch);
      curl_close($ch);
   
   }
   
   public function sec_session_start() {
        $session_name = 'sec_session_id'; // Set a custom session name
        $secure = false; // Set to true if using https.
        $httponly = true; // This stops javascript being able to access the session id. 
 
        ini_set('session.use_only_cookies', 1); // Forces sessions to only use cookies. 
        $cookieParams = session_get_cookie_params(); // Gets current cookies params.
        session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
        session_name($session_name); // Sets the session name to the one set above.
        session_start(); // Start the php session
        session_regenerate_id(); // regenerated the session, delete the old one.  
	}
	
	public function get_firma_detail($firmaid=null){
		if(!empty($firmaid)){
			//echo $id;
			$this->db_select(); 
			$this->db->connect();
			$sql="SELECT * FROM firma WHERE FIRMAID = '$firmaid'";
			$result = $this->db->query_first($sql); 
			return $result;
		}
	}
	
	public function login_check(){
		//print_r($_SESSION);		
		if(isset($_SESSION['SESS_FIRMAID']) && ($_SESSION['SESS_LOGIN_STRING'])) {
		     $firmaid = $_SESSION['SESS_FIRMAID'];
		     $login_string = $_SESSION['SESS_LOGIN_STRING'];
		     $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.		     
			 $login_check = hash('sha512', $firmaid.$user_browser);
			 if($login_check == $login_string) {
	              // Logged In!!!!
	              return true;
	           } else {
	              // Not logged in
	              return false;
	           }
		}
		else{
			return false;
		}
	}
	
	/**
	 * 
	 * spisok so napraveni dogovori
	 * @param int $firmaid
	 */
	
	public function contracts_list($firmaid = null){
		if(!empty($firmaid)){
			//proverka dali e logiran korisnikot
			if($this->login_check()){
				$this->db_select(); 
				$this->db->connect();
				$sql="SELECT * FROM rent_dogovor WHERE FIRMAID = '$firmaid'";
				$result = $this->db->fetch_all_array($sql); 
				return $result;
			}
			else{
				die('carclas-ERROR-Acces Denied');
			}
		}
	}

}
?>