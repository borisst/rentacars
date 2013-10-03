			<?php //print_r($get_rezervation_detail)?>
			<form id="forma" class="formee" method="post">
		    <fieldset>
		    	<div id="detali-rezervacija">
			        <p class="datum-izdavanje">Договор <b><?php echo $get_rezervation_detail['DOK_ID']?></b></p>
					<input name="dokid" type="hiden" value="<?php echo $get_rezervation_detail['DOK_ID']?>">		
					<p class="datum-izdavanje">Датум на резервирање <b><?php echo $get_rezervation_detail['DATUM']?></b></p>
			        <input name="DATUM" type="hiden" value="<?php echo $get_rezervation_detail['DATUM']?>">	
				       <?php //print_r($get_rezervation_detail)?>         
				      <div class="grid-3-12">          
				            <select id="status" name="STATUS">
			                    <option value="R" <?php if($get_rezervation_detail['STATUS']=='R') echo 'selected'?>>Наем (Отворен договор)</option>
			                    <option value="N" <?php if($get_rezervation_detail['STATUS']=='N') echo 'selected'?>>Резервација (Склучен договор)</option>
			                </select>
		               </div>
	             </div>	        
		     </fieldset> 
		        <fieldset>
		        	<div style="width:100%">
			        	<legend>Контакт</legend>
				        <div class="grid-3-12">
					        <label for="kontakt-lice">Контакт лице</label>
					        <input id="kontakt-lice" name="KONTAKT_LICE" class="forma-kontakt-lice" type="text" value="<?php echo $get_rezervation_detail['KONTAKT_LICE']?>">
				        </div>
				        <div class="grid-3-12">
					        <label for="embg">ЕМБГ</label>
					        <input id="embg" name="EMBG" class="forma-kontakt-lice" type="text" value="">
				        </div>
				        <div class="grid-3-12">
					        <label for="roden-vo">Роден во</label>
					        <input id="roden-vo" name="EMBG_MESTO" type="text" value="">
				        </div>
				        <div class="grid-3-12">
					        <label for="data-ragjanje">Дата на раѓање</label>
					        <input id="data-ragjanje" name="EMBG_DATA" type="text" value="">
				        </div>
			        </div>
			        <div style="width:80%">
				        <div class="grid-3-12">
					        <label for="br-lk">Број на лична карта</label>
					        <input id="br-lk" name="LK_BROJ" type="text" value="">
				        </div>
				        <div class="grid-3-12">
					        <label for="data-izdavanje-lk">Издадена на</label>
					        <input id="data-izdavanje-lk" name="LK_DATUM" type="text" value="">
				        </div>
				        <div class="grid-3-12">
					        <label for="lk-mesto-izdavanje">Издадена во</label>
					        <input id="lk-mesto-izdavanje" name="LK_MESTO" type="text" value="">
						</div>
					</div>
					<div style="width:80%">
						<div class="grid-3-12">
					        <label for="br-pasos">Број на пасош</label>
					        <input id="br-pasos" name="PASS_BROJ" type="text" value="">
				        </div>
				        <div class="grid-3-12">
					        <label for="data-izdavanje-pasos" class="nformee-medium">Издаден на</label>
					        <input id="data-izdavanje-pasos" name="PASS_DATUM"  class="nformee-medium" type="text" value="">
				        </div>
				        <div class="grid-3-12">
					        <label for="pasos-mesto-izdavanje">Издаден во</label>
					        <input id="pasos-mesto-izdavanje" name="PASS_MESTO" type="text" value="">
				        </div>
			        </div>
			        <div style="width:80%">
				        <div class="grid-3-12">
					       	<label for="br-vozacka">Број на возачка</label>
					        <input id="br-vozacka" type="text" name="VOZACKA_BROJ" value="">
				        </div>
				        <div class="grid-3-12">
				        	<label for="data-izdavanje-vozacka">Издадена на</label>
				        	<input id="data-izdavanje-vozacka" name="VOZACKA_DATUM" type="text" value="">
				        </div>
				        <div class="grid-3-12">
					        <label for="vozacka-mesto-izdavanje">Издадена во</label>
					        <input id="vozacka-mesto-izdavanje" name="VOZACKA_MESTO" type="text" value="">
				   		 </div>
			   		 </div>
			   		 <div style="width:80%">
				   		 <div class="grid-3-12">
					       	<label for="tel">Тел</label>
					        <input id="tel" type="text" name="KONTAKT_TEL" value="<?php echo $get_rezervation_detail['KONTAKT_TEL']?>">
				        </div>
				        <div class="grid-3-12">
					        <label for="email">Емаил</label>
					        <input id="email" type="text" name="KONTAKT_EMAIL" value="<?php echo $get_rezervation_detail['KONTAKT_EMAIL']?>">
				        </div>		
			        </div>        
		        </fieldset>
		        <fieldset>		   
		        	<div style="width:100%">
			        	<legend>Возило</legend>   
					<input name="CAR_ID" type="hiden" value="<?php echo $get_rezervation_detail['CAR_ID']?>">		
			        	
			        	<div class="grid-3-12">  
					        <label for="marka">Марка</label>
					        <input id="marka"  type="text" value="<?php echo $get_rezervation_detail['MARKA']?>">
				        </div>
				        <div class="grid-3-12">
					        <label for="model">Модел</label>
					        <input id="model"  type="text" value="<?php echo $get_rezervation_detail['MODEL']?>">
				        </div>
				        <div class="grid-3-12">
					        <label for="registracija">Регистрација</label>
					        <input id="registracija"  type="text" value="<?php echo $get_rezervation_detail['REGISTRACIJA']?>">
				       </div>
				       <div class="grid-3-12">
					        <label for="reg_do">Регистрирана до</label>
					        <input id="reg_do"  type="text" value="<?php echo $get_rezervation_detail['REG_DO']?>">
				        </div>
				        <div class="grid-2-12">
					        <label for="proizvodstvo">Година</label>
					        <input id="proizvodstvo"  type="text" value="<?php echo $get_rezervation_detail['PROIZVODSTVO']?>">
				        </div>
				        <div class="grid-2-12">
					        <label for="BR_VRATI">Број на врати</label>
					        <input id="BR_VRATI" name="BR_VRATI" type="text" value="<?php echo $get_rezervation_detail['BR_VRATI']?>">
						</div>
						<div class="grid-2-12">
					        <label for="moknost">Моќност</label>
					        <input id="moknost"  type="text" value="<?php echo $get_rezervation_detail['MOKNOST_KW']?>">
				        </div>
				        <div class="grid-2-12">
					        <label for="zafatnina">Зафатнина</label>
					        <input id="zafatnina" type="text" value="<?php echo $get_rezervation_detail['ZAFATNINA']?>">
						</div>
						<div class="grid-2-12">
					        <label>Тип на гориво</label>
					        <ul class="formee-list">
					        	<li>
					        		<input type="radio" name="petrol" value="<?php echo $get_rezervation_detail['TIP_GORIVO'] ?>" <?php if($get_rezervation_detail['TIP_GORIVO']=='D'){echo "checked=\"checked\"";}?>>
					        		<label>Дизел</label>
					        	</li>
					        	<li>
					        		<input type="radio" name="petrol" value="<?php echo $get_rezervation_detail['TIP_GORIVO'] ?>" <?php if($get_rezervation_detail['TIP_GORIVO']=='B'){echo "checked=\"checked\"";}?>>
					        		<label>Бензин</label>
					        	</li>
					        </ul>

						</div>
					</div>
					<div style="width:96%; padding-left:20px">
						<div id="tabs">
							<ul>
								<li><a href="#fragment-1"><span>Опрема</span></a></li>
								
							</ul>
							<div id="fragment-1">
								
				                
				                <div class="grid-2-12">
					                <ul class="formee-list">
					                    <li><input name="OPREMA_KLIMA" type="checkbox" <?php if($get_rezervation_detail['OPREMA_KLIMA']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> 
					                    	<label>Клима</label>
					                    </li>
					                    <li><input name="OPREMA_CETR_BRAVA" type="checkbox" <?php if($get_rezervation_detail['OPREMA_CENTR_BRAVA']=='D'){echo "checked=\"checked\ value=\"D\"";}?>> <label>Цент. брава</label></li>
					                    <li><input name="OPREMA_TRIAGOLNIK" type="checkbox" <?php if($get_rezervation_detail['OPREMA_TRIAGOLNIK']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> 
					                    <label>Триаголник</label>
					                    </li>
					                    <li><input name="OPREMA_ABS" type="checkbox" <?php if($get_rezervation_detail['OPREMA_ABS']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> <label>АБС</label></li>
					                </ul>
				                </div>
				                <div class="grid-2-12">
				                	<ul class="formee-list">
				                		<li><input name="OPREMA_RADIO" type="checkbox" <?php if($get_rezervation_detail['OPREMA_RADIO']=='D'){echo "checked=\"checked\ value=\"D\"";}?>> <label>Радио</label></li>
					                    <li><input name="OPREMA_DOKUMENTI" type="checkbox" <?php if($get_rezervation_detail['OPREMA_DOKUMENTI']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> <label>Документи</label></li>
					                    <li><input name="OPREMA_LANCI" type="checkbox" <?php if($get_rezervation_detail['OPREMA_LANCI']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> <label>Ланци</label></li>
					                    <li><input name="OPREMA_DIGALKA" type="checkbox" <?php if($get_rezervation_detail['OPREMA_DIGALKA']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> <label>Дигалка</label></li>
				                	</ul>
				                </div>
				                <div class="grid-3-12">
				                	<ul class="formee-list">
				                		<li><input name="OPREMA_REZ_TRKALO" type="checkbox" <?php if($get_rezervation_detail['OPREMA_REZ_TRKALO']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> <label>Резервно тркало</label></li>
					                    <li><input name="OPREMA_REZ_SIJALICI" type="checkbox" <?php if($get_rezervation_detail['OPREMA_REZ_SIJALICI']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> <label>Резервни сијалици</label></li>
					                    <li><input name="OPREMA_EL_PROZORI" type="checkbox" <?php if($get_rezervation_detail['OPREMA_EL_PROZORI']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> <label>Ел. прозорци</label></li>
					                    <li><input name="OPREMA_PRVA_POMOS" type="checkbox" <?php if($get_rezervation_detail['OPREMA_PRVA_POMOS']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> <label>Прва Помош</label></li>
				                		<li><input name="OPREMA_ZELEN_KARTON" type="checkbox" <?php if($get_rezervation_detail['OPREMA_PRVA_POMOS']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> <label>Прва Помош</label></li>
				                		
				                	</ul>
				                </div>
        						<div class="grid-4-12">
						        	<label for="zabeleska">Забелешка</label>
						        	<textarea id="zabeleska" name="ZABELESKA" cols=""></textarea>
					        	</div>
							</div>
						</div>
					</div>
				</fieldset>
				<fieldset>
			        <div style="width:60%">
			        	<legend>Изнајмување</legend> 
			            <div class="grid-6-12">
			                <label for="datum-izdavanje">Датум и време на издавање</label>
							<input id="datum-izdavanje" name="DATUM_POC" type="text" value="<?php echo $get_rezervation_detail['DATUM_POC']?>">
			            </div>
						<div class="grid-6-12">
			                <label for="mesto-izdavanje">Место</label>
							<input id="mesto-izdavanje" name="MESTO_POC" type="text" value="<?php echo $get_rezervation_detail['MESTO_POC']?>">
			            </div>
			            
			            <div class="grid-6-12">
			                <label for="predvideo-vrakane">Предвидено враќање</label>
							<input id="predvideo-vrakane" name="PREDV_DATUM_KRAJ" type="text" value="<?php echo $get_rezervation_detail['DATUM_KRAJ']?>">
			            </div>
						<div class="grid-6-12">
			                <label for="predvideno-mesto-vrakane">Место</label>
							<input id="predvideno-mesto-vrakane" name="MESTO_PREDV_KRAJ" type="text" value="<?php echo $get_rezervation_detail['MESTO_KRAJ']?>">
			            </div>
			            
			            <div class="grid-6-12">
			                <label for="vrakane">Враќање</label>
							<input id="vrakane" name="DATUM_KRAJ" type="text" value="<?php echo $get_rezervation_detail['DATUM_KRAJ']?>">
			            </div>
						<div class="grid-6-12">
			                <label for="mesto-vrakane">Место</label>
							<input id="mesto-vrakane" name="MESTO_KRAJ" type="text" value="<?php echo $get_rezervation_detail['MESTO_KRAJ']?>">
			            </div>		            
			        </div>
			        <div style="width:100%">
			        	<div class="grid-2-12">
				        	<label for="vkupno-denovi">Вкупно денови</label>
				        	<input id="vkupno-denovi" name="DENOVI" type="text" value="">
			        	</div>
			        	<div class="grid-3-12">
					        <label>Возилото ќе се вози во</label>
					        <ul class="formee-list">
					        	<li>
					        		<input type="radio" name="TIP_RELACIJA" value="M" checked="checked">
					        		<label>Македонија</label>
					        	</li>
					        	<li>
					        		<input type="radio" name="TIP_RELACIJA" value="S">
					        		<label>Странство</label>
					        	</li>
					        </ul>
						</div>
						<div class="grid-2-12">
				        	<label for="km-izdavanje">Km при издавање</label>
				        	<input id="km-izdavanje" name="KM_POC" type="text" value="">
			        	</div>
			        	<div class="grid-2-12">
				        	<label for="km-vrakjanje">Km при враќање</label>
				        	<input id="km-vrakjanje" name="KM_KRAJ" type="text" value="">
			        	</div>
			        	<div class="grid-2-12">
				        	<label for="km-izminato">Изминати Km</label>
				        	<input id="km-izminato" type="text" value="">
			        	</div>						
			        </div>
			        <div style="width:80%">
			        	<div class="grid-6-12">
				        	<label for="dopolnitelen-opis">Дополнителен опис</label>
				        	<textarea id="dopolnitelen-opis" name="DOPOLNITELEN_OPIS" cols=""></textarea>
			        	</div>
			        </div>
			        <div style="width:96%; padding-left:20px">
			        <div id="tabs2">
							<ul>
								<li><a href="#tab-1"><span>Дополнителни информации</span></a></li>
								<li><a href="#tab-2"><span>Ценовник</span></a></li>
							</ul>
							<div id="tab-1">
								<div style="width:10%;float:left">
									<div class="grid-12-12">
										<label for="gorivo">Гориво</label>
										<input id="gorivo" name="IZNOS_GORIVO" type="text" value="">
									</div>
									<div class="grid-12-12">
										<label for="prezemanje">Преземање</label>
										<input id="prezemanje" name="IZNOS_PREZEMANJE" type="text" value="">
									</div>
									<div class="grid-12-12">
										<label for="dostava">Достава</label>
										<input id="dostava" name="IZNOS_ODBITOCI" type="text" value="">
									</div>
									<div class="grid-12-12">
										
										<label for="razno">Разно</label>
										<input id="razno" name="IZNOS_RAZNO" type="text" value="">
									</div>
								</div>
								<div style="width:80%;float:right">
									<div style="border-bottom:1px solid">
										<h4>Резервоар со гориво</h4>
										<div class="grid-3-12">
											
											<label>Пред издавање</label>				
						                    <select name="GORIVO_POC">
						                    	<option value=""></option>
							                    <option value="1">1</option>
							                    <option value="1/2">1/2</option>
							                    <option value="0">0</option>
						               	 	</select>
						               	 </div>
						               	 <div class="grid-3-12">
						               	 	<label>При враќање</label>				
						                    <select name="GORIVO_KRAJ">
						                    	<option value=""></option>
							                    <option value="1">1</option>
							                    <option value="1/2">1/2</option>
							                    <option value="0">0</option>
						               	 	</select>		
										</div>
									</div>
									<div class="grid-3-12">
										<label>Депозит</label>				
					                    <select id="depozit">
					                    	<option value=""></option>
						                    <option value="depozit">Оставил депозит</option>
						                    <option value="">Select</option>
						                    
					               	 	</select>		
									</div>
									<div class="grid-3-12" style="border-right:1px solid">
					                    <label for="depozit-iznos">Износ</label>
										<input id="depozit-iznos" name="DEPOZIT_IZNOS" type="text" value="">		
									</div>
								
									<div class="grid-4-12">
					                    <label for="dop-relacija">Релација</label>
										<input id="dop-relacija" name="RELACIJA" type="text" value="">		
									</div>
								
									<div class="grid-12-12">
					                    <label for="dop-vozac">Дополнителен возач</label>
										<input id="dop-vozac" name="VOZAC" type="text" value="">		
									</div>
									<div class="grid-2-12">
					                    <label for="dop-vozacka-br">Возачка број</label>
										<input id="dop-vozacka-br" name="VOZACKA_BROJ2" type="text" value="">		
									</div>
									<div class="grid-2-12">
					                    <label for="dop-vozacka-izdadena-na">Издадена на</label>
										<input id="dop-vozacka-izdadena-na" name="VOZACKA_DATUM2" type="text" value="">		
									</div>
									<div class="grid-3-12">
					                    <label for="dop-vozacka-izdadena-od">Издадена од</label>
										<input id="dop-vozacka-izdadena-od" name="VOZACKA_MESTO_NAZIV2" type="text" value="">		
									</div>
								</div>
							</div>
							<div id="tab-2">
							    <div style="width:20%; float:left">
								    <div class="grid-12-12">
						                    <label for="cena-cenovnik">Цена</label>
											<input id="cena-cenovnik" name="CENA" type="text" value="<?php echo $get_rezervation_detail['CENA']?>">		
									</div>
									<div class="grid-12-12">
						                    <label for="valuta-cenovnik">Валута</label>
											<input id="valuta-cenovnik" name="VALUTA" type="text" value="<?php echo $get_rezervation_detail['VALUTA']?>">		
									</div>
									<div class="grid-12-12">
						                    <label for="kurs-cenovnik">Курс</label>
											<input id="kurs-cenovnik" name="KURS" type="text" value="">		
									</div>
								</div>
								<div style="width:70%; float:right">
									<div class="grid-4-12">
						                    <label for="cena-mkd-cenovnik">Цена (МКД)</label>
											<input id="cena-mkd-cenovnik" name="CENA_DEN" type="text" value="<?php echo $get_rezervation_detail['CENA']?>">		
									</div>
									<div class="grid-3-12">
						                    <label for="popust-cenovnik">Попуст</label>
											<input id="popust-cenovnik" name="POPUST" type="text" value="">		
									</div>
									<div class="grid-3-12">
						                    <label for="popust-cenovnik">Одобрил Попуст</label>
											<input id="popust-cenovnik" name="ODOBRIL_POPUST" type="text" value="">		
									</div>
									<div class="grid-3-12">
						                    <label for="vkupno-cenovnik">Вкупно</label>
											<input id="vkupno-cenovnik" name="VK_IZNOS" type="text" value="<?php echo $get_rezervation_detail['CENA']?>">		
									</div>
									<div class="grid-3-12">
						                    <label for="ddv-cenovnik">ДДВ (%)</label>
											<input id="ddv-cenovnik" name="DDV_PROCENT" type="text" value="18">		
									</div>
									<div class="grid-3-12">
						                    <label for="ddv-iznos-cenovnik">ДДВ износ</label>
											<input id="ddv-iznos-cenovnik" name="DDV" type="text" value="<?php echo $get_rezervation_detail['CENA']*(18/100)?>">		
									</div>
									<div class="grid-4-12">
						                    <label for="vkupno-iznos-cenovnik">Износ за плаќање</label>
											<input id="vkupno-iznos-cenovnik" name="KRAEN_IZNOS" type="text" value="<?php echo $get_rezervation_detail['CENA']?>">		
									</div>
								</div>
							</div>
						</div>
				 </div>
		        </fieldset>
		        <fieldset>
			        <div style="width:100%; text-align:center">
				        <div class="grid-12-12">
							<input type="submit" name="zacuvaj" value="Зачувај"/>
							<input type="submit" name="pregledaj"  value="Прегледај"/>
							<input type="submit" name="pecati" value="Печати"/>
						</div>
					</div>
				</fieldset>	  
		</form>
<script type="text/javascript">
$( "#tabs" ).tabs();
$( "#tabs2" ).tabs();
$("form#forma").submit(function(e){     
   	e.preventDefault();    
         
    $.post("action-admin.php", 
	        $("form#forma").serialize(),
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
</script>