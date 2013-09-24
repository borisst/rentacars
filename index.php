<?php
/**
 *
 * @author dejavu
 * @version 10
 * 
 */
require("CarReservation.class.php"); 

?>
	<?php		 
		/*require("include/config.inc.php"); 
		require("include/Database.class.php"); 
		$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
		$db->connect(); 
		
		$sql = "SELECT * FROM `".TABLE_GALERY."` 
		          ORDER BY `created` DESC 
		          LIMIT 0,10"; 
		$rows = $db->fetch_all_array($sql); 
		foreach($rows as $record){ 
		    echo "<a id=\"example8\" href=\"./upload/$record[file]\" title=\"$record[description]\"><img alt=\"example1\" src=\"./thumb/$record[file]\" /></a>";
		}
		$db->close();
		*/
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script src = "js/pomosna.js"></script>
		<link rel="stylesheet" type="text/css" href="css/mystyle.css">
		<link rel="stylesheet" type="text/css" href="css/screen.css">
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<style>
			body {
				font-family: "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
				font-size: 62.5%;
			}
		</style>
	  
		<script>
			  $(function() {
			    $( "#datepicker" ).datepicker();
			  });
			   $(function() {
			    $( "#datepicker1" ).datepicker();
			  });
			  function showFirst()
			  {
				_("Vtor").style.display = "none";
				_("Prv").style.display = "block";
				
			  }
			  function showSecond()
			  {
				_("Prv").style.display = "none";
				_("Vtor").style.display = "block";
				_("Tret").style.display = "none";
				
			  }
			  function showThird()
			  {
				_("Vtor").style.display = "none";
				_("Tret").style.display = "block";
				
			  }
		</script>
	</head>
	<body>
	<?php 
				$cr = new CarReservation();
				$firma_detail = $cr->get_firma();
			//	print_r($cr->car_class());
			//	print_r($cr->car_choise('MV','8/17/2013','8/27/2013'));
			//	exit;
				
			?>
			
		<div id="container">
		<h2><?php echo $firma_detail['NAZIV']?></h2>
		<div><img src="<?php echo $firma_detail['LOGO']?>" alt="<?php echo $firma_detail['NAZIV'] ?>"></div>
		<div id="content">
			<form id="form1" name="input" action="" method="post">
				
				<fieldset><legend>Rent a car</legend>
				<div id="Prv" class="ex">
						<p class="first">
							<label for="datepicker">Датум од</label>
							<input type="text"  name="datum_od" id="datepicker" readonly="readonly"/>
						</p>
						<p>
							<label for="datepicker1">Datum do</label>
							<input type="text" id="datepicker1" name="datum_do" readonly="readonly"/>
						</p>				
						<p>Vkupno Denovi: <div id="vkupno-denovi"></div><div><input id="vkupno-denovi-input" type="hidden"></input></div></p>
						<p class="submit"><button id="button-show-second" type="button" onclick="showSecond()" disabled>Next!</button></p>
				</div>
				</fieldset>
				<fieldset>
				<div id="Vtor" class="ex">

						<p class="first">
							<label for="car-class">Datum od</label>
							<select id="car-class" name="car-class">
							<option value = "" selected>--Izberi klasa na vozilo--</option>
								<?php 
								foreach($cr->car_class() as $record){ 
						    		echo "<option value=\"".$record['CAS_KLASA']."\">".$record['OPIS']."</option>";
								}
								?>
							</select>
						</p>
						
					
					
					<div id="car-choice">
						
					</div>
					<div id="car-price">
					
					</div>
					<p class="submit"><button id="button-show-third" type="button" onclick="showThird()" disabled>Next!</button>
					
					<button type="button" onclick="showFirst()">Back!</button></p>
				</div>
				</fieldset>
				<fieldset>
				
				<div id="Tret" class="ex">
					Treta strana <br />
					<div id="message_post"></div>
					<label for="firstname">Ime:<span class="required">*</span></label>
						<input id="firstname" type="text" name="firstname"><div id="fname_error" class="error"></div><br>
					<label for="lastname">Prezime:<span class="required">*</span></label>
						<input id="lastname" type="text" name="lastname"><div id="lname_error" class="error"></div><br>
					<label for="tel">Tel:<span class="required">*</span></label>
						<input id="tel" type="text" name="tel"><div id="phone_error" class="error"></div><br>
					<label for="email">Email:<span class="required">*</span></label>
						<input id="email" type="text" name="email"><div id="email_error" class="error"></div><br>
					<p class="submit"><button type="button" onclick="showSecond()">Back!</button>	
					<input type="hidden" name="submit"/>	
					<input type="submit" id="submitButton" value="Rezerviraj"></input></p>
				</div>
				</fieldset>
			</form>
			</div>
		</div>
<script>
	$(document).ready( function() {
		$('#car-class').change(
		   function() { 
			   $("#car-choice").html('<img src="img/ajax-loader.gif" />');
			   var car_klasa = $('select#car-class option:selected').val();
			   var datum_od = $('#datepicker').val();
			   var datum_do = $('#datepicker1').val();
			   var text = $('select#car-class option:selected').text();
			   $.ajax({
				   type: "POST",
				   url: "action.php",
				   data: { car_klasa: car_klasa, datum_od: datum_od, datum_do: datum_do, text:text }
				   }).done(function( msg ) {
				   $('#car-choice').html(msg);
				   });													   
			    }
		   );
			
		 //kopceto za sleden del od formata (NEXT) stanuva aktivno ako e izbrna data_od i data_do
		 $('input#datepicker').change(function(){
	            //Validate your form here, example:
	            var validated = true;
	            if(($('#datepicker').val().length === 0) || ($('#datepicker1').val().length === 0)){
		            
		            validated = false;
		            
	            }
	            //If form is validated enable form
	            if(validated) {
	            	var d1 = new Date($('#datepicker').val());
		            var d2 = new Date($('#datepicker1').val());
		            var diff =  Math.floor((d2.getTime() - d1.getTime()) / 86400000);
		            
		            if(diff > 0){		
		            	$("input#vkupno-denovi-input").val(diff);
			            $("#vkupno-denovi").text(diff).removeAttr( 'style' );            
		           	 	$("button#button-show-second").removeAttr("disabled"); 
		            }
		            else{
		            	$("#vkupno-denovi").text('<?php echo "Datum od ne moze da bide pogolem od Datum do"?>').css('color','red');
		            	$("button#button-show-second").prop('disabled', true);
			        }
	            }
	            else{
	            	$("button#button-show-second").prop('disabled', true);
	            }                            
	      });	
		 $('input#datepicker1').change(function(){
	            //Validate your form here, example:
	            var validated = true;
	            if(($('#datepicker').val().length === 0) || ($('#datepicker1').val().length === 0)){
		            validated = false;
	            }
	            //If form is validated enable form
	            if(validated) {
	            	 var d1 = new Date($('#datepicker').val());
			         var d2 = new Date($('#datepicker1').val());
			         var diff = Math.floor((d2.getTime() - d1.getTime()) / 86400000);
			         if(diff > 0){		
			            	$("input#vkupno-denovi-input").val(diff);
				            $("#vkupno-denovi").text(diff).removeAttr( 'style' );            
			           	 	$("button#button-show-second").removeAttr("disabled"); 
			            }
			            else{
			            	$("#vkupno-denovi").text('<?php echo "Datum od ne moze da bide pogolem od Datum do"?>').css('color','red');
			            	$("button#button-show-second").prop('disabled', true);
				       }  
	            }
	            else{
	            	$("button#button-show-second").prop('disabled', true); 
	            }                          
	      });	
	      //kopceto za tretiot del od formata stanuva aktivno ako e zadovolen baraniot uslov
	      //odnosno da se popolneti baranite polinja
	      //vo sprotivno se deaktivira	
		 $(document).on("change", "#car-choice-select",function(){
	            var validated = true;
	            if(($('select#car-choice-select option:selected').val().length === 0)) validated = false;
	 			
	            //If form is validated enable form
	            if(validated) {
		            $("button#button-show-third").removeAttr("disabled");
		            $("#car-price").html('<img src="img/ajax-loader.gif" />');
					   var car_id = $('select#car-choice-select option:selected').val();
					   var denovi = $('#vkupno-denovi-input').val();
					   var zona='';
					   var text =  $('select#car-choice-select option:selected').text();
					   $.ajax({
						   type: "GET",
						   url: "action.php",
						   data: { car_id:car_id, zona:zona, denovi:denovi, text:text }
						   }).done(function( msg ) {
						   $('#car-price').html(msg);
						   });													   
					 
		            }
	            else{
	            	$("button#button-show-third").prop('disabled', true);
	            }                             
	      });
			    $("form#form1").submit(function(e){     
			       	e.preventDefault();    
			             
			        $.post("action.php", 
					        $("form#form1").serialize(),
					        function(data){
				        		
					        		$('#fname_error').empty();
					        		$('#lname_error').empty();
					        		$('#phone_error').empty();
					        		$('#email_error').empty();
					        		console.log(data);
					        		if(data !== null){
								        if((data.fname_error !== null)){
									        if(data.fname_error !== null){
									            var validate = 'false';
									          	$('#fname_error').html(data.fname_error);	
									          	console.log('1'+validate);		 
								        	}         	
								        }
								        else if(data.lname_error !== null){
								        	var validate = 'false';
								        	$('#lname_error').html(data.lname_error); 
								        	console.log('3'+validate);
								       
								        }
								        else if(data.phone_error !== null){
								        	var validate = 'false';
								        	$('#phone_error').html(data.phone_error);
								        	console.log('5'+validate);	
								        	
								        }
								        else if(data.email_error !== null){
								        	var validate = 'false';
								        	$('#email_error').html(data.email_error); 
								        	console.log('7'+validate);	
								        	
								        }
					        		}
							        else{
							        	var validate = 'true';
							        	console.log('8'+validate);	
							        }
				        		
						        console.log(validate);
						        if(validate == 'true'){
					          		console.log(data);
					        		$("#content").load('report.php');
						        }						        
			        		}, 
			        	"json");     
			    });	
			    	
		});
</script>
	</body>
</html>