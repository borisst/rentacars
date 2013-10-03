<?php
	ini_set("display_errors", "on");
	error_reporting(E_ALL | E_STRICT);  
	
	date_default_timezone_set("Europe/Skopje");
	//define("HAS_ACCESS", true);	
	require_once('auth.php');
	$cr = new CarReservation();
	//die($_GET['action']);
	if(isset($_GET['action'])){
		switch ($_GET['action']) {
		    case 'contracts_list':
		        contracts_list($_SESSION['SESS_FIRMAID'], $cr);
		        break;
		    case 'rezervation_pending_list':
		        rezervation_pending_list($_SESSION['SESS_FIRMAID'], $cr);
		        break;
		     case 'get_rezervation_detail':
		        get_rezervation_detail($_SESSION['SESS_FIRMAID'], $_GET['dok_id'], $cr);
		        break;
		}
	}
	if(isset($_POST)){
		//proverka za koja forma se raboti
		if(isset($_POST['dogovor'])){
			//se vcituva klasot validacija
			require_once '../Validation.class.php';
			$form = new Validation();
			//validacija na polinjata od formata
			//ako ima greska se zapisuva vo nizata $error
		
			$error['klice_error'] = $form->name_validation($_POST['KONTAKT_LICE']);
			$error['embg_mesto_error'] = $form->name_validation($_POST['EMBG_MESTO'],'населено место');
			$error['kontakt_email_error'] = $form->email_validation($_POST['KONTAKT_EMAIL'],'емаил');
			$error['embg_error'] = $form->digits_validation($_POST['EMBG'],'матичен број');
			$error['embg_data_error'] = $form->date_validation($_POST['EMBG_DATA'],'дата на раѓање');
			$error['vozacka_broj_error'] = $form->digits_validation($_POST['VOZACKA_BROJ'],'број на возачка');
			$error['kontakt_tel_error'] = $form->digits_validation($_POST['KONTAKT_TEL'],'телефонски број');
			if(!empty($error)){
				echo json_encode($error);
			}
			else{
				//zapisuvanje na podatocite od formata za dogovor vo bazata
		
				print_r($_POST);
				exit;
			}

		}
		

	}
	

	/**
	 * 
	 * Detali za rezervacijata koja e napravena od korisnicit
	 * za pokasno ovaa rezervacija da premine vo dogovor
	 * @param int $firmaid
	 * @param varchar $dok_id //id na rezervacijata
	 * @param object $cr
	 */
	function get_rezervation_detail($firmaid, $dok_id, $cr){
		$get_rezervation_detail = $cr->get_rezervation_detail($firmaid, $dok_id);
		include("firma-rezervacija-forma.php");

	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param unknown_type $firmaid
	 * @param unknown_type $cr
	 */
	function rezervation_pending_list($firmaid, $cr){
		$rezervation_pending_list = $cr->rezervation_pending($firmaid);
				$html = "
		
		<div class=\"table_contracts\" >
				<h2>Список на резервации кои чекаат да бидат одобрени</h2>
                <table >
                    <tr>
                        <td>
                            DOK_ID
                        </td>
                        <td >
                            Контакт
                        </td>
                        <td>
                            Тел
                        </td>
                        <td>
                            Датум од
                        </td>
                        <td>
                            Датум до
                        </td>
                        <td>
                            Опции
                        </td>
                    </tr>";
		foreach ($rezervation_pending_list as $rpl){
			$html .= "<tr>
                        <td>
                            <a href='?dok_id=".$rpl['DOK_ID']."' id='get_rezervation_detail'>".$rpl['DOK_ID']."</a>
                        </td>
                        <td >
                            ".$rpl['KONTAKT_LICE']."
                        </td>
                        <td>
                            ".$rpl['KONTAKT_TEL']."
                        </td>
                        <td>
                            ".$rpl['DATUM_POC']."
                        </td>
                        <td>
                            ".$rpl['DATUM_KRAJ']."
                        </td>
                        <td>
                            Опции
                        </td>
                    </tr>";
		}
		$html .= "</table></div>
		";
		echo $html;
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param unknown_type $firmaid
	 * @param unknown_type $cr
	 */
	function contracts_list($firmaid, $cr){
		$contract_list = $cr->contracts_list($firmaid);
		$html = "
		
		<div class=\"table_contracts\" >
				<h2>Список на направени договори</h2>
                <table >
                    <tr>
                        <td>
                            DOK_ID
                        </td>
                        <td >
                            Контакт
                        </td>
                        <td>
                            Платено
                        </td>
                        <td>
                            Тел
                        </td>
                        <td>
                            Долгорочен
                        </td>
                        <td>
                            Опции
                        </td>
                    </tr>";
		foreach ($contract_list as $cl){
			$html .= "<tr>
                        <td>
                            ".$cl['DOK_ID']."
                        </td>
                        <td >
                            ".$cl['KONTAKT_LICE']."
                        </td>
                        <td>
                            ".$cl['PLATENO']."
                        </td>
                        <td>
                            ".$cl['KONTAKT_TEL']."
                        </td>
                        <td>
                            ".$cl['DOLGOROCEN']."
                        </td>
                        <td>
                            Опции
                        </td>
                    </tr>";
		}
		$html .= "</table></div>";
		echo $html;
	}

?>

            
            