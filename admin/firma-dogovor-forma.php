			<?php //print_r($detail)?>
			<form id="forma" class="formee" method="post">
			<input name="dogovor" type="hidden" value="dogovor"/>
		    <fieldset>
		    	<div id="detali-rezervacija">
			        <div class="grid-6-12">
				        <p class="datum-izdavanje">Број на договор: <b><?php echo $detail['DOK_ID']?></b></p>
						<input name="dokid" type="hidden" value="<?php echo $detail['DOK_ID']?>">		
						<p class="datum-izdavanje">Датум на резервирање <b><?php echo $detail['DATUM']?></b></p>
					</div>
					<div class="grid-6-12">
						<p class="datum-izdavanje">Период на изнајмување од <b><?php echo date("d-m-Y", strtotime($detail['DATUM_POC']));?></b> до <b><?php echo date("d-m-Y", strtotime($detail['PREDV_DATUM_KRAJ']));?></b></p>
					</div>
					
					<div class="grid-12-12">
				        <input name="DATUM" type="hidden" value="<?php echo $detail['DATUM']?>">	
					       <?php //print_r($detail)?>   
					             
					      <div class="grid-3-12">    
					           <h2>Статус на договорот</h2> <br/>
					            <select id="status" name="STATUS">
									<option value="R" <?php if($detail['STATUS']=='R') echo 'selected'?>>Резервација (Отворен договор)</option>
				                    <option value="N" <?php if($detail['STATUS']=='N') echo 'selected'?>>Наем (Склучен договор)</option>
				                    <option value="Z" <?php if($detail['STATUS']=='Z') echo 'selected'?>>Затворен договор</option>
				                </select>
			               </div>
		            </div>
	             </div>	        
		     </fieldset> 
		        <fieldset>
		        	<div style="width:100%">
			        	<legend>Контакт</legend>
			        	<div id="overlay_dokumenti"></div>
						<div id="popupBox_dokumenti" ></div>
						<div>
							<div class="grid-12-12">
								<ul class="formee-list">
					                    <li><label>Ако лицето е странец штиклирај те го квадратчето </label><input id="stranec" name="stranec" type="checkbox"></li>
					            </ul>
								
							</div>
						</div>
						<div>
					        <div class="grid-3-12">
						        <label for="kontakt-lice">Контакт лице</label>
						        <input id="kontakt-lice" name="KONTAKT_LICE" class="forma-kontakt-lice" type="text" value="<?php echo $detail['KONTAKT_LICE']?>">
					        	<div id="klice_error" class="error"></div>
					        </div>
					        <div class="grid-3-12">
						        <label for="embg">ЕМБГ</label>
						        <input id="embg" name="EMBG" class="forma-kontakt-lice" type="text" value="<?php if(!empty($detail['EMBG'])){echo $detail['EMBG'];}?>">
						        <div id="embg_error" class="error"></div>
					        </div>
					        <div class="grid-3-12">
						        <label for="embg_mesto">Роден во</label>
						        <input id="embg_mesto" name="EMBG_MESTO" type="text" value="<?php if(!empty($detail['EMBG_MESTO'])){echo $detail['EMBG_MESTO'];}?>">
						        <div id="embg_mesto_error" class="error"></div>
						        
					        </div>
					        <div class="grid-3-12">
						        <label for="embg_data">Дата на раѓање</label>
						        <input id="embg_data" name="EMBG_DATUM" type="text" value="<?php if(!empty($detail['EMBG_DATUM'])){echo date("d-m-Y", strtotime($detail['EMBG_DATUM']));}?>">
						        <div id="embg_data_error" class="error"></div>
					        </div>
				        </div>
			        </div>
			        <div style="width:80%">
				        <div class="grid-3-12">
					        <label for="br-lk">Број на лична карта</label>
					        <input id="br-lk" name="LK_BROJ" type="text" value="<?php if(!empty($detail['LK_BROJ'])){echo $detail['LK_BROJ'];}?>">
				        </div>
				        <div class="grid-3-12">
					        <label for="data-izdavanje-lk">Издадена на</label>
					        <input id="data-izdavanje-lk" name="LK_DATUM" type="text" value="<?php if(!empty($detail['LK_DATUM'])){echo $detail['LK_DATUM'];}?>">
				        </div>
				        <div class="grid-3-12">
					        <label for="lk-mesto-izdavanje">Издадена во</label>
					        <input id="lk-mesto-izdavanje" name="LK_MESTO" type="text" value="<?php if(!empty($detail['LK_MESTO'])){echo $detail['LK_MESTO'];}?>">
						</div>
					</div>
					<div style="width:80%">
						<div class="grid-3-12">
					        <label for="br-pasos">Број на пасош</label>
					        <input id="br-pasos" name="PASS_BROJ" type="text" value="<?php if(!empty($detail['PASS_BROJ'])){echo $detail['PASS_BROJ'];}?>">
				        </div>
				        <div class="grid-3-12">
					        <label for="data-izdavanje-pasos" class="nformee-medium">Издаден на</label>
					        <input id="data-izdavanje-pasos" name="PASS_DATUM"  class="nformee-medium" type="text" value="<?php if(!empty($detail['PASS_DATUM'])){echo $detail['PASS_DATUM'];}?>">
				        </div>
				        <div class="grid-3-12">
					        <label for="pasos-mesto-izdavanje">Издаден во</label>
					        <input id="pasos-mesto-izdavanje" name="PASS_MESTO" type="text" value="<?php if(!empty($detail['PASS_MESTO'])){echo $detail['PASS_MESTO'];}?>">
				        </div>
			        </div>
			        <div style="width:80%">
				        <div class="grid-3-12">
					       	<label for="vozacka_broj">Број на возачка</label>
					        <input id="vozacka_broj" type="text" name="VOZACKA_BROJ" value="<?php if(!empty($detail['VOZACKA_BROJ'])){echo $detail['VOZACKA_BROJ'];}?>">
					        <div id="vozacka_broj_error" class="error"></div>
				        </div>
				        <div class="grid-3-12">
				        	<label for="data-izdavanje-vozacka">Издадена на</label>
				        	<input id="data-izdavanje-vozacka" name="VOZACKA_DATUM" type="text" value="<?php if(!empty($detail['VOZACKA_DATUM'])){echo $detail['VOZACKA_DATUM'];}?>">
				        </div>
				        <div class="grid-3-12">
					        <label for="vozacka-mesto-izdavanje">Издадена во</label>
					        <input id="vozacka-mesto-izdavanje" name="VOZACKA_MESTO" type="text" value="<?php if(!empty($detail['VOZACKA_MESTO'])){echo $detail['VOZACKA_MESTO'];}?>">
				   		 </div>
			   		 </div>
			   		 <div style="width:80%">
				   		 <div class="grid-3-12">
					       	<label for="kontakt_tel">Тел</label>
					        <input id="kontakt_tel" type="text" name="KONTAKT_TEL" value="<?php echo $detail['KONTAKT_TEL']?>">
				        	<div id="kontakt_tel_error" class="error"></div>
				        </div>
				        <div class="grid-3-12">
					        <label for="kontakt_email">Емаил</label>
					        <input id="kontakt_email" type="text" name="KONTAKT_EMAIL" value="<?php echo $detail['KONTAKT_EMAIL']?>">
				        	<div id="kontakt_email_error" class="error"></div>
				        </div>		
			        </div>        
		        </fieldset>
		        <fieldset>		   
		        	<div style="width:100%">
			        	<legend>Возило</legend>   
					<input name="CAR_ID" type="hidden" value="<?php echo $detail['CAR_ID']?>">		
			        	
			        	<div class="grid-3-12">  
					        <label for="marka">Марка</label>
					        <input id="marka"  disabled type="text" value="<?php echo $detail['MARKA']?>">
				        </div>
				        <div class="grid-3-12">
					        <label for="model">Модел</label>
					        <input id="model"   disabled type="text" value="<?php echo $detail['MODEL']?>">
				        </div>
				        <div class="grid-3-12">
					        <label for="registracija">Регистрација</label>
					        <input id="registracija"  disabled type="text" value="<?php echo $detail['REGISTRACIJA']?>">
				       </div>
				       <div class="grid-3-12">
					        <label for="reg_do">Регистрирана до</label>
					        <input id="reg_do"   disabled type="text" value="<?php echo $detail['REG_DO']?>">
				        </div>
				        <div class="grid-2-12">
					        <label for="proizvodstvo">Година</label>
					        <input id="proizvodstvo"  disabled type="text" value="<?php echo $detail['PROIZVODSTVO']?>">
				        </div>
				        <div class="grid-2-12">
					        <label for="BR_VRATI">Број на врати</label>
					        <input id="BR_VRATI"  disabled name="BR_VRATI" type="text" value="<?php echo $detail['BR_VRATI']?>">
						</div>
						<div class="grid-2-12">
					        <label for="moknost">Моќност</label>
					        <input id="moknost"  disabled type="text" value="<?php echo $detail['MOKNOST_KW']?>">
				        </div>
				        <div class="grid-2-12">
					        <label for="zafatnina">Зафатнина</label>
					        <input id="zafatnina"  disabled type="text" value="<?php echo $detail['ZAFATNINA']?>">
						</div>
						<div class="grid-2-12">
					        <label>Тип на гориво</label>
					        <ul class="formee-list">
					        	<li>
					        		<input type="radio"  name="petrol"  value="<?php echo $detail['TIP_GORIVO'] ?>" <?php if($detail['TIP_GORIVO']=='D'){echo "checked=\"checked\"";}?> disabled>
					        		<label>Дизел</label>
					        	</li>
					        	<li>
					        		<input type="radio"  name="petrol" value="<?php echo $detail['TIP_GORIVO'] ?>" <?php if($detail['TIP_GORIVO']=='B'){echo "checked=\"checked\"";}?> disabled>
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
					                    <li><input name="OPREMA_KLIMA" type="checkbox" <?php if($detail['OPREMA_KLIMA']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> 
					                    	<label>Клима</label>
					                    </li>
					                    <li><input name="OPREMA_CENTR_BRAVA" type="checkbox" <?php if($detail['OPREMA_CENTR_BRAVA']=='D'){echo "checked=\"checked\ value=\"D\"";}?>> <label>Цент. брава</label></li>
					                    <li><input name="OPREMA_TRIAGOLNIK" type="checkbox" <?php if($detail['OPREMA_TRIAGOLNIK']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> 
					                    <label>Триаголник</label>
					                    </li>
					                    <li><input name="OPREMA_ABS" type="checkbox" <?php if($detail['OPREMA_ABS']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> <label>АБС</label></li>
					                </ul>
				                </div>
				                <div class="grid-2-12">
				                	<ul class="formee-list">
				                		<li><input name="OPREMA_RADIO" type="checkbox" <?php if($detail['OPREMA_RADIO']=='D'){echo "checked=\"checked\ value=\"D\"";}?>> <label>Радио</label></li>
					                    <li><input name="OPREMA_DOKUMENTI" type="checkbox" <?php if($detail['OPREMA_DOKUMENTI']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> <label>Документи</label></li>
					                    <li><input name="OPREMA_LANCI" type="checkbox" <?php if($detail['OPREMA_LANCI']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> <label>Ланци</label></li>
					                    <li><input name="OPREMA_DIGALKA" type="checkbox" <?php if($detail['OPREMA_DIGALKA']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> <label>Дигалка</label></li>
				                	</ul>
				                </div>
				                <div class="grid-3-12">
				                	<ul class="formee-list">
				                		<li><input name="OPREMA_REZ_TRKALO" type="checkbox" <?php if($detail['OPREMA_REZ_TRKALO']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> <label>Резервно тркало</label></li>
					                    <li><input name="OPREMA_REZ_SIJALICI" type="checkbox" <?php if($detail['OPREMA_REZ_SIJALICI']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> <label>Резервни сијалици</label></li>
					                    <li><input name="OPREMA_EL_PROZORI" type="checkbox" <?php if($detail['OPREMA_EL_PROZORI']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> <label>Ел. прозорци</label></li>
					                    <li><input name="OPREMA_PRVA_POMOS" type="checkbox" <?php if($detail['OPREMA_PRVA_POMOS']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> <label>Прва Помош</label></li>
				                		<li><input name="OPREMA_ZELEN_KARTON" type="checkbox" <?php if($detail['OPREMA_PRVA_POMOS']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> <label>Прва Помош</label></li>
				                		
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
					<div id="overlay"></div>
					<div id="popupBox" ></div>
			        <div style="width:60%">
			        	<legend>Изнајмување</legend> 
			            <div class="grid-6-12">
			                <label for="datum-izdavanje">Датум и време на издавање</label>
							<input id="datum-izdavanje" name="DATUM_POC" type="text" value="<?php echo date("d-m-Y H:i", strtotime($detail['DATUM_POC']))?>">
			            </div>
						<div class="grid-6-12">
			                <label for="mesto-izdavanje">Место</label>
							<input id="mesto-izdavanje" name="MESTO_POC" type="text" value="<?php echo $detail['MESTO_POC']?>">
			            </div>
			            
			            <div class="grid-6-12">
			                <label for="predvideno-vrakane">Предвидено враќање</label>
							<input id="predvideno-vrakane" name="PREDV_DATUM_KRAJ" type="text" value="<?php echo date("d-m-Y H:i", strtotime($detail['PREDV_DATUM_KRAJ']))?>">
			            </div>
						<div class="grid-6-12">
			                <label for="predvideno-mesto-vrakane">Место</label>
							<input id="predvideno-mesto-vrakane" name="MESTO_PREDV_KRAJ" type="text" value="<?php echo $detail['MESTO_PREDV_KRAJ']?>">
			            </div>
			            
			            <div class="grid-6-12">
			                <label for="vrakane">Враќање</label>
							<input id="vrakane" name="DATUM_KRAJ" type="text" value="<?php if(!empty($detail['DATUM_KRAJ'])){echo $detail['DATUM_KRAJ'];}?>">
			            </div>
						<div class="grid-6-12">
			                <label for="mesto-vrakane">Место</label>
							<input id="mesto-vrakane" name="MESTO_KRAJ" type="text" value="<?php if(!empty($detail['MESTO_KRAJ'])){echo $detail['MESTO_KRAJ'];}?>">
			            </div>		            
			        </div>
			        <div style="width:100%">
			        	<div class="grid-2-12">
				        	<label for="vkupno-denovi">Вкупно денови</label>
				        	<input id="vkupno-denovi" name="DENOVI" type="text" value="<?php if(!empty($detail['DENOVI'])){echo $detail['DENOVI'];}?>">
			        	</div>
			        	<div class="grid-3-12">
					        <label>Возилото ќе се вози во</label>
					        <ul class="formee-list">
					        	<li>
					        		<input type="radio" name="TIP_RELACIJA" value="M" <?php echo $detail['TIP_RELACIJA'] ?>" <?php if($detail['TIP_RELACIJA']=='M'){echo "checked=\"checked\"";}?>>
					        		<label>Македонија</label>
					        	</li>
					        	<li>
					        		<input type="radio" name="TIP_RELACIJA" value="S" <?php echo $detail['TIP_RELACIJA'] ?>" <?php if($detail['TIP_RELACIJA']=='S'){echo "checked=\"checked\"";}?>>
					        		<label>Странство</label>
					        	</li>
					        </ul>
						</div>
						<div class="grid-2-12">
				        	<label for="km-izdavanje">Km при издавање</label>
				        	<input id="km-izdavanje" name="KM_POC" type="text" value="<?php if(!empty($detail['KM_POC'])){echo $detail['KM_POC'];}?>">
			        	</div>
			        	<div class="grid-2-12">
				        	<label for="km-vrakjanje">Km при враќање</label>
				        	<input id="km-vrakjanje" name="KM_KRAJ" type="text" value="<?php if(!empty($detail['KM_KRAJ'])){echo $detail['KM_KRAJ'];}?>">
			        	</div>
			        	<div class="grid-2-12">
				        	<label for="km-izminato">Изминати Km</label>
				        	<input id="km-izminato" type="text" value="">
			        	</div>						
			        </div>
			        <div style="width:80%">
			        	<div class="grid-6-12">
				        	<label for="dopolnitelen-opis">Дополнителен опис</label>
				        	<textarea id="dopolnitelen-opis" name="DOPOLNITELEN_OPIS" cols="<?php if(!empty($detail['DOPOLNITELEN_OPIS'])){echo $detail['DOPOLNITELEN_OPIS'];}?>"></textarea>
			        	</div>
			        </div>
			        <div style="width:96%; padding-left:20px">
			        <div id="tabs2">
							<ul>
								<li><a href="#tab-1"><span>Дополнителни информации</span></a></li>
								<li><a href="#tab-3"><span>Дополнителни услуги</span></a></li>
								<li><a href="#tab-2"><span>Ценовник</span></a></li>
							</ul>
							<div id="tab-1">
								<div style="width:100%;float:right">
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
										<input id="depozit-iznos" name="DEPOZIT_IZNOS" type="text" value="<?php if(!empty($detail['DEPOZIT_IZNOS'])){echo $detail['DEPOZIT_IZNOS'];}?>">		
									</div>
								
									<div class="grid-4-12">
					                    <label for="dop-relacija">Релација</label>
										<input id="dop-relacija" name="RELACIJA" type="text" value="<?php if(!empty($detail['RELACIJA'])){echo $detail['RELACIJA'];}?>">		
									</div>
								
									<div class="grid-12-12">
					                    <label for="dop-vozac">Дополнителен возач</label>
										<input id="dop-vozac" name="VOZAC" type="text" value="<?php if(!empty($detail['VOZAC'])){echo $detail['VOZAC'];}?>">		
									</div>
									<div class="grid-2-12">
					                    <label for="dop-vozacka-br">Возачка број</label>
										<input id="dop-vozacka-br" name="VOZACKA_BROJ2" type="text" value="<?php if(!empty($detail['VOZACKA_BROJ2'])){echo $detail['VOZACKA_BROJ2'];}?>">		
									</div>
									<div class="grid-2-12">
					                    <label for="dop-vozacka-izdadena-na">Издадена на</label>
										<input id="dop-vozacka-izdadena-na" name="VOZACKA_DATUM2" type="text" value="<?php if(!empty($detail['VOZACKA_DATUM'])){echo $detail['VOZACKA_DATUM'];}?>">		
									</div>
									<div class="grid-3-12">
					                    <label for="dop-vozacka-izdadena-od">Издадена од</label>
										<input id="dop-vozacka-izdadena-od" name="VOZACKA_MESTO_NAZIV2" type="text" value="<?php if(!empty($detail['VOZACKA_MESTO_NAZIV2'])){echo $detail['VOZACKA_MESTO_NAZIV2'];}?>">		
									</div>
								</div>
							</div>
							<div id="tab-3">
								<div class="grid-4-12">
				                	<ul class="formee-list">
				                		<li><input name="OPREMA_GPS" type="checkbox" <?php if($detail['OPREMA_GPS']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> <label>GPS</label></li>
					                    <li><input name="OPREMA_DSEDISTE" type="checkbox" <?php if($detail['OPREMA_DSEDISTE']=='D'){echo "checked=\"checked\" value=\"D\"";}?>> <label>Детско седиште</label></li>
					                   </li>
				                	</ul>
				                </div>
							</div>
							<div id="tab-2">
							    <div style="width:20%; float:left">
								    <div class="grid-12-12">
						                    <label for="cena-cenovnik">Цена</label>
											<input id="cena-cenovnik" name="CENA" type="text" value="<?php echo $detail['CENA']?>">		
									</div>
									<div class="grid-12-12">
						                    <label for="valuta-cenovnik">Валута</label>
											<input id="valuta-cenovnik" name="VALUTA" type="text" value="<?php echo $detail['VALUTA']?>">		
									</div>
									<div class="grid-12-12">
						                    <label for="kurs-cenovnik">Курс</label>
											<input id="kurs-cenovnik" name="KURS" type="text" value="">		
									</div>
								</div>
								<div style="width:70%; float:right">
									<div class="grid-4-12">
						                    <label for="cena-mkd-cenovnik">Цена (МКД)</label>
											<input id="cena-mkd-cenovnik" name="CENA_DEN" type="text" value="<?php echo $detail['CENA']?>">		
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
						             		<input class="vkupno-cenovnik" id="vkupno-cenovnik"  type="text" value="<?php echo $detail['CENA']?>" disabled>	
											<input class="vkupno-cenovnik" name="VK_IZNOS" type="hidden" value="<?php echo $detail['CENA']?>" disabled>	
									</div>
									<div class="grid-3-12">
						                    <label for="ddv-cenovnik">ДДВ (%)</label>
											<input id="ddv-cenovnik" name="DDV_PROCENT" type="text" value="18">		
									</div>
									<div class="grid-3-12">
						                    <label for="ddv-iznos-cenovnik">ДДВ износ</label>
											<input class="ddv-iznos-cenovnik" id="ddv-iznos-cenovnik_disabled" type="text" value="<?php echo $detail['CENA']*(18/100)?>" disabled>													
											<input class="ddv-iznos-cenovnik" name="DDV" type="hidden" value="<?php echo $detail['CENA']*(18/100)?>">													
									</div>
									<div class="grid-4-12">
						            		<input class="vkupno-iznos-cenovnik" id="vkupno-iznos-cenovnik"  type="text" value="<?php echo $detail['CENA']?>" disabled>
											<input class="vkupno-iznos-cenovnik" name="KRAEN_IZNOS" type="hidden" value="<?php echo $detail['CENA']?>" disabled>		
									</div>
								</div>
							</div>
						</div>
				 </div>
		        </fieldset>
		        <fieldset>
			        <div style="width:100%; text-align:center">
			        	<div id="validation"></div>
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

function error_style(key, val){
	var validate = 'false';
  	$('#'+key).html(val);	
  	$( "#"+key.replace(/_error/g,"") ).addClass( "input-validation-error" );
  	if($( "#validation" ).hasClass( "validation" )){
  		$( "#validation" ).append('<br />'+val);
  	}
  	else{
  		$( "#validation" ).addClass( "validation" ).html(val);
  	}
  	console.log(val+' '+key);	
}

$("form#forma").submit(function(e){     
   	e.preventDefault();    
         
    $.post("action-admin.php", 
	        $("form#forma").serialize(),
	        function(data){
        		
	        		$( "#validation" ).removeClass( "validation" );
	        		$( "#validation" ).html( "" );
	        		console.log(data);
	        		if(data !== null){
	        			 $.each( data, function( key, val ) {
	        				 //kod	        				 
	        				 $('#'+key).empty();	        				 
	        				 $( "#"+key.replace(/_error/g,"")).removeClass( "input-validation-error" );
	        				 
	        				 if(val !== null){
	        				 	error_style(key, val);
	        				 }
	        			});
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

var now = new Date();
var outStr = now.getHours()+':'+now.getMinutes();
$(function() {
	
	  $('#embg_data').datepicker({
	    },
	    $.datepicker.regional['mk']
	  );

	  $('#data-izdavanje-vozacka').datepicker({
	    },
	    $.datepicker.regional['mk']
	  );

	  $('#data-izdavanje-pasos').datepicker({
	    },
	    $.datepicker.regional['mk']
	  );

	  $('#data-izdavanje-lk').datepicker({
	    },
	    $.datepicker.regional['mk']
	  );
	  $('#reg_do').datepicker({
	    },
	    $.datepicker.regional['mk']
	  );
	  
	  $('#datum-izdavanje').datetimepicker({
	      showMonthAfterYear: false,
	      minDate:0,
	      hour: now.getHours(),
	      minute: now.getMinutes(),
	   //   stepMinute: '15',
	    	  controlType: 'select'
	    },
	    $.datepicker.regional['mk']
	  );
	  
	  $('#predvideno-vrakane').datetimepicker({
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


	$(document).on("click", "input#embg",function(e){
		var embg = $('#embg').val();
		alert(embg);
		$.ajax({
		   type: "GET",
		   url: "action-admin.php",
		   data: { action:'birthday',birthday_embg:embg}
		   }).done(function( msg ) {
		   $('#embg_data').val(msg);
		});
	});
	
	$(document).on("click", "input#mesto-izdavanje",function(e){
		$.ajax({
		   type: "GET",
		   url: "action-admin.php",
		   data: { action:'poc'}
		   }).done(function( msg ) {
		   $('#popupBox').html(msg);
		});
		$("div#overlay").fadeIn('500');
		$("div#popupBox").delay('800');
		$("div#popupBox").fadeIn('500');
	});

	$(document).on("click", "ul.lokacija.poc h2",function(e){			    	
		var txt = $(e.target).text();
		$("#mesto-izdavanje").val(txt);	
		$("div#popupBox").fadeOut('500');
		$("div#overlay").delay('800');
		$("div#overlay").fadeOut('500');
	});
	
	$("input#predvideno-mesto-vrakane").click(function(){
		$.ajax({
		   type: "GET",
		   url: "action-admin.php",
		   data: { action:'kraj'}
		   }).done(function( msg ) {
		   $('#popupBox').html(msg);
		});
		$("div#overlay").fadeIn('500');
		$("div#popupBox").delay('800');
		$("div#popupBox").fadeIn('500');
	});
	
	$(document).on("click", "ul.lokacija.kraj h2",function(e){			    	
		var txt = $(e.target).text();
		$("#predvideno-mesto-vrakane").val(txt);	
		$("div#popupBox").fadeOut('500');
		$("div#overlay").delay('800');
		$("div#overlay").fadeOut('500');
	});

	//generira datum na ragjanje od maticniot broj
	$(document).on("focusout", "input#embg",function(e){
		var embg = $('#embg').val();
		if(embg != ''){
			alert(embg);
			$.ajax({
			   type: "GET",
			   url: "action-admin.php",
			   data: { action:'birthday',birthday_embg:embg}
			   }).done(function( msg ) {
			   $('#embg_data').val(msg);
			});
		}
	});
	
		$(document).on("click", "input#lk-mesto-izdavanje",function(e){
			if(!$('#stranec').is(':checked')){
				$.ajax({
				   type: "GET",
				   url: "action-admin.php",
				   data: { action:'dokumenti', tip:'lk'}
				   }).done(function( msg ) {
				   $('#popupBox_dokumenti').html(msg);
				});
				$("div#overlay_dokumenti").fadeIn('500');
				$("div#popupBox_dokumenti").delay('800');
				$("div#popupBox_dokumenti").fadeIn('500');
			}
		});
	
		$(document).on("click", "ul.lokacija.lk h2",function(e){			    	
			var txt = $(e.target).text();
			$("#lk-mesto-izdavanje").val(txt);	
			$("div#popupBox_dokumenti").fadeOut('500');
			$("div#overlay_dokumenti").delay('800');
			$("div#overlay_dokumenti").fadeOut('500');
		});
	
	
		$(document).on("click", "input#pasos-mesto-izdavanje",function(e){
			if(!$('#stranec').is(':checked')){
				$.ajax({
				   type: "GET",
				   url: "action-admin.php",
				   data: { action:'dokumenti', tip:'pasos'}
				   }).done(function( msg ) {
				   $('#popupBox_dokumenti').html(msg);
				});
				$("div#overlay_dokumenti").fadeIn('500');
				$("div#popupBox_dokumenti").delay('800');
				$("div#popupBox_dokumenti").fadeIn('500');
			}
		});
	
		$(document).on("click", "ul.lokacija.pasos h2",function(e){			    	
			var txt = $(e.target).text();
			$("#pasos-mesto-izdavanje").val(txt);	
			$("div#popupBox_dokumenti").fadeOut('500');
			$("div#overlay_dokumenti").delay('800');
			$("div#overlay_dokumenti").fadeOut('500');
		});
		
	
	
		$(document).on("click", "input#vozacka-mesto-izdavanje",function(e){
			if(!$('#stranec').is(':checked')){
				$.ajax({
				   type: "GET",
				   url: "action-admin.php",
				   data: { action:'dokumenti', tip:'vozacka'}
				   }).done(function( msg ) {
				   $('#popupBox_dokumenti').html(msg);
				});
				$("div#overlay_dokumenti").fadeIn('500');
				$("div#popupBox_dokumenti").delay('800');
				$("div#popupBox_dokumenti").fadeIn('500');
			}
		});
	
		$(document).on("click", "ul.lokacija.vozacka h2",function(e){			    	
			var txt = $(e.target).text();
			$("#vozacka-mesto-izdavanje").val(txt);	
			$("div#popupBox_dokumenti").fadeOut('500');
			$("div#overlay_dokumenti").delay('800');
			$("div#overlay_dokumenti").fadeOut('500');
		});
		$("div#overlay_dokumenti").click(function(){
			$("div#popupBox_dokumenti").fadeOut('500');
			$("div#overlay_dokumenti").delay('800');
			$("div#overlay_dokumenti").fadeOut('500');
		});

	$("div#overlay").click(function(){
		$("div#popupBox").fadeOut('500');
		$("div#overlay").delay('800');
		$("div#overlay").fadeOut('500');
	});

	//za presmetka  na cena
	$(document).on("keyup", "input#cena-mkd-cenovnik,#popust-cenovnik,#ddv-cenovnik",function(e){	
		$(this).val($(this).val().replace(/[^\d]/,''));		    	
		var cena = parseInt($('#cena-mkd-cenovnik').val());	
		var popust_procenti = $('#popust-cenovnik').val();
		if(popust_procenti == ''){
				popust_procenti = 0;
			}
		else{
				popust_procenti = parseInt(popust_procenti);
			}
		var popust = cena*popust_procenti/100;
		var vkupno_cenovnik = cena-popust;
		var ddv_cenovnik = parseInt($('#ddv-cenovnik').val());
		var ddv_iznos_cenovnik = ddv_cenovnik*vkupno_cenovnik/100;
		var vkupno = vkupno_cenovnik+ddv_iznos_cenovnik;
		$("#vkupno-cenovnik").val(vkupno_cenovnik);	
		$("#vkupno-iznos-cenovnik").val(vkupno);
		$("#ddv-iznos-cenovnik").val(ddv_iznos_cenovnik);
		
	});
</script>