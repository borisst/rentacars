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
		}
	}
	
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

            
            