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
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title></title>
		<script src="js/jquery.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script src = "js/pomosna.js"></script>
		<link rel="stylesheet" type="text/css" href="css/mystyle.css">
		<link rel="stylesheet" type="text/css" href="css/screen.css">
		<link rel="stylesheet" href="css/formee-style.css" type="text/css" />
		<link rel="stylesheet" href="css/formee-structure.css" type="text/css" />
		<link rel="stylesheet" href="css/jquery-timepicker.css" type="text/css" />
		
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/start/jquery-ui.css" />
		<script src="js/jquery-time-picker.js"></script>
		<script src="js/jquery.ui.datepicker-mk.js"></script>
		<style>
			body {
				font-family: "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
				font-size: 62.5%;
			}
		</style>
	  
		<script>
		var now = new Date();
		var outStr = now.getHours()+':'+now.getMinutes();
		$(function() {
			
			  $('#datepicker').datetimepicker({
			      showMonthAfterYear: false,
			      minDate:0,
			      hour: now.getHours(),
			      minute: now.getMinutes(),
			   //   stepMinute: '15',
			    	  controlType: 'select'
			    },
			    $.datepicker.regional['mk']
			  );
			});

		
		  
		$(function() {
			  $('#datepicker1').datetimepicker({
			      showMonthAfterYear: false,
			      minDate:+1,
			      hour: now.getHours(),
			      minute: now.getMinutes(),
			      controlType: 'select'
			   //   stepMinute: '15'
			    },
			    $.datepicker.regional['mk']
			  );
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
		<h1><?php echo $firma_detail['NAZIV']?></h1>
		<div>
		<!--<img src="<?php echo $firma_detail['LOGO']?>" alt="<?php echo $firma_detail['NAZIV'] ?>">
		--></div>
		<div id="content">
			<form id="form1" class="formee" name="input" action="" method="post">
				
				
				<div id="Prv" class="ex">
					<fieldset><legend>Период на резервација</legend>
					<div class="grid-6-12">  
						<p class="firstt">
							<label for="datepicker">Датум од</label>
							<input type="text"  name="datum_od" id="datepicker" readonly="readonly"/>
						</p>
					</div>
					<div class="grid-6-12"> 
						<p>
							<label for="datepicker1">Даттум до</label>
							<input type="text" id="datepicker1" name="datum_do" readonly="readonly"/>
						</p>				
					</div>
					<div id="vkupno-denovi" class="msg"></div><div><input id="vkupno-denovi-input" type="hidden"></input></div>
					<div class="grid-12-12">
						<input id="button-show-second" type="button" onclick="showSecond()" value="Следно" disabled="disabled"/>
					</div>
				</fieldset>
				</div>
				
				
				<div id="Vtor" class="ex">
				<fieldset>
				<legend>Автомобил</legend>
					<div class="grid-6-12"> 
							<label>Избери класа на возило</label>
							<select id="car-class" name="car-class">
							
							<option value = "" selected>--Избери класа на возило--</option>
								<?php 
								foreach($cr->car_class() as $record){ 
						    		echo "<option value=\"".$record['CAS_KLASA']."\">".$record['OPIS']."</option>";
								}
								?>
							</select>
						</div>
						
					
					<div class="grid-6-12">
						<div id="car-choice">
							
						</div>
					</div>
						<div id="car-price" class="msg">
						
						</div>
					<div class="grid-6-12">
						<input type="button" onclick="showFirst()" value="Назад"/>
					</div>
					<div class="grid-6-12">
						<input id="button-show-third" type="button" onclick="showThird()" value="Следно" disabled="disabled"/>
					</div>

				</fieldset>
				</div>
				
				
				
				<div id="Tret" class="ex">
					<fieldset>
						<legend>Податоци</legend>
						<div style="width:50%; padding-left:50px; ">
							<div id="message_post"></div>
							<div class="grid-12-12">
							<label for="firstname">Име:<span class="required">*</span></label>
								<input id="firstname" type="text" name="firstname" /><div id="fname_error" class="error"></div>
							</div>
							<div class="grid-12-12">
							<label for="lastname">Презиме:<span class="required">*</span></label>
								<input id="lastname" type="text" name="lastname" /><div id="lname_error" class="error"></div>
							</div>
							<div class="grid-12-12">
							<label for="tel">Телефон:<span class="required">*</span></label>
								<input id="tel" type="text" name="tel" /><div id="phone_error" class="error"></div>
							</div>
							<div class="grid-12-12">
							<label for="email">Емаил:<span class="required">*</span></label>
								<input id="email" type="text" name="email" /><div id="email_error" class="error"></div>
							</div>
							
							<div class="grid-6-12">
								<input type="button" onclick="showSecond()" value="Назад"/>
							</div>							
							<input type="hidden" name="submit"/>	
							<div class="grid-6-12"><input type="submit" id="submitButton" value="Резервирај"></input></div>
						</div>
					</fieldset>
				</div>
				
			</form>
			</div>
		</div>
<script>
	$(document).ready( function() {
		$('#car-class').change(
		   function() { 
			   $("#car-choice").html('<img src="img/ajax-loader.gif" />');
			   $("#car-price").html('');
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
					var d1 = $('#datepicker').val();
					var d2 = $('#datepicker1').val();
	            //	var d1 = new Date($('#datepicker').val());
		          //  var d2 = new Date($('#datepicker1').val());
		            $.ajax({
						   type: "GET",
						   url: "action.php",
						   data: { d1:d1, d2:d2,date:'date'}
						   }).done(function( data ) {
								var obj = jQuery.parseJSON(data);
							  // console.log(obj.d);
							  // console.log(obj.h);
							  var d = obj.d;
							  if(obj.d>=0){
								if(obj.h>0){
									d = obj.d+1;
								}
								
							    $("input#vkupno-denovi-input").val(d);
					            $("#vkupno-denovi").text("Вкупно денови: "+d).removeAttr( 'style' );            
				           	 	$("input#button-show-second").removeAttr("disabled"); 	
							  }						   
					            else{
					            	$("#vkupno-denovi").text('<?php echo "Имате изберено погрешен датум"?>').css('color','red');
					            	$("input#button-show-second").prop('disabled', true);
						      }
						  });            
	            }
	            else{
	            	$("input#button-show-second").prop('disabled', true);
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
	            	var d1 = $('#datepicker').val();
	            	var d2 = $('#datepicker1').val();
			         $.ajax({
						   type: "GET",
						   url: "action.php",
						   data: { d1:d1, d2:d2,date:'date'}
						   }).done(function( data ) {
								var obj = jQuery.parseJSON(data);
							  // console.log(obj.d);
							  // console.log(obj.h);
							var d = obj.d;
							if(obj.d>=0){
								if(obj.h>0){
									d = obj.d+1;
								}
							    $("input#vkupno-denovi-input").val(d);
					            $("#vkupno-denovi").text("Вкупно денови: "+d).removeAttr( 'style' );            
				           	 	$("input#button-show-second").removeAttr("disabled"); 	
							  }						   
					            else{
					            	$("#vkupno-denovi").text('<?php echo "Имате изберено погрешен датум"?>').css('color','red');
					            	$("input#button-show-second").prop('disabled', true);
						      }
						  });  
	            }
	            else{
	            	$("input#button-show-second").prop('disabled', true); 
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
		            $("input#button-show-third").removeAttr("disabled");
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
	            	$("input#button-show-third").prop('disabled', true);
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