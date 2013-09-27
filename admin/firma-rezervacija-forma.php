			<?php //print_r($get_rezervation_detail)?>
			<form class="formee">
		    <fieldset>
		    	<div id="detali-rezervacija">
			        <p class="datum-izdavanje">Договор <b><?php echo $get_rezervation_detail['DOK_ID']?></b></p>
					<p class="datum-izdavanje">Датум на резервирање <b><?php echo $get_rezervation_detail['DATUM']?></b></p>
			        
				       <?php //print_r($get_rezervation_detail)?>         
				      <div class="grid-3-12">          
				            <select id="status" >
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
					        <input id="kontakt-lice" name="kontakt-lice" class="forma-kontakt-lice" type="text" value="<?php echo $get_rezervation_detail['KONTAKT_LICE']?>">
				        </div>
				        <div class="grid-3-12">
					        <label for="embg">ЕМБГ</label>
					        <input id="embg" name="embg" class="forma-kontakt-lice" type="text" value="">
				        </div>
				        <div class="grid-3-12">
					        <label for="roden-vo">Роден во</label>
					        <input id="roden-vo" name="roden_vo" type="text" value="">
				        </div>
				        <div class="grid-3-12">
					        <label for="data-ragjanje">Дата на раѓање</label>
					        <input id="data-ragjanje" name="data_ragjanje" type="text" value="">
				        </div>
			        </div>
			        <div style="width:80%">
				        <div class="grid-3-12">
					        <label for="br-lk">Број на лична карта</label>
					        <input id="br-lk" name="br_lk" type="text" value="">
				        </div>
				        <div class="grid-3-12">
					        <label for="data-izdavanje-lk">Издадена на</label>
					        <input id="data-izdavanje-lk" name="data-izdavanje-lk" type="text" value="">
				        </div>
				        <div class="grid-3-12">
					        <label for="lk-mesto-izdavanje">Издадена во</label>
					        <input id="lk-mesto-izdavanje" name="lk-mesto-izdavanje" type="text" value="">
						</div>
					</div>
					<div style="width:80%">
						<div class="grid-3-12">
					        <label for="br-pasos">Број на пасош</label>
					        <input id="br-pasos" name="br-pasos" type="text" value="">
				        </div>
				        <div class="grid-3-12">
					        <label for="data-izdavanje-pasos" class="nformee-medium">Издаден на</label>
					        <input id="data-izdavanje-pasos" name="data-izdavanje-pasos"  class="nformee-medium" type="text" value="">
				        </div>
				        <div class="grid-3-12">
					        <label for="pasos-mesto-izdavanje">Издаден во</label>
					        <input id="pasos-mesto-izdavanje" name="pasos-mesto-izdavanje" type="text" value="">
				        </div>
			        </div>
			        <div style="width:80%">
				        <div class="grid-3-12">
					       	<label for="br-vozacka">Број на возачка</label>
					        <input id="br-vozacka" type="text" name="br-vozacka" value="">
				        </div>
				        <div class="grid-3-12">
				        	<label for="data-izdavanje-vozacka">Издадена на</label>
				        	<input id="data-izdavanje-vozacka" name="data-izdavanje-vozacka" type="text" value="">
				        </div>
				        <div class="grid-3-12">
					        <label for="vozacka-mesto-izdavanje">Издадена во</label>
					        <input id="vozacka-mesto-izdavanje" name="vozacka-mesto-izdavanje" type="text" value="">
				   		 </div>
			   		 </div>
			   		 <div style="width:80%">
				   		 <div class="grid-3-12">
					       	<label for="tel">Тел</label>
					        <input id="tel" type="text" name="tel" value="<?php echo $get_rezervation_detail['KONTAKT_TEL']?>">
				        </div>
				        <div class="grid-3-12">
					        <label for="email">Емаил</label>
					        <input id="email" type="text" name="email" value="<?php echo $get_rezervation_detail['KONTAKT_EMAIL']?>">
				        </div>		
			        </div>        
		        </fieldset>
		        <fieldset>		   
		        	<div style="width:100%">
			        	<legend>Возило</legend>   
			        	<div class="grid-3-12">  
					        <label for="marka">Марка</label>
					        <input id="marka" name="marka" type="text" value="<?php echo $get_rezervation_detail['MARKA']?>">
				        </div>
				        <div class="grid-3-12">
					        <label for="model">Модел</label>
					        <input id="model" name="model" type="text" value="<?php echo $get_rezervation_detail['MODEL']?>">
				        </div>
				        <div class="grid-3-12">
					        <label for="registracija">Регистрација</label>
					        <input id="registracija" name="registracija" type="text" value="<?php echo $get_rezervation_detail['REGISTRACIJA']?>">
				       </div>
				       <div class="grid-3-12">
					        <label for="reg_do">Регистрирана до</label>
					        <input id="reg_do" name="reg_do" type="text" value="<?php echo $get_rezervation_detail['REG_DO']?>">
				        </div>
				        <div class="grid-2-12">
					        <label for="proizvodstvo">Година</label>
					        <input id="proizvodstvo" name="proizvodstvo" type="text" value="<?php echo $get_rezervation_detail['PROIZVODSTVO']?>">
				        </div>
				        <div class="grid-2-12">
					        <label for="BR_VRATI">Број на врати</label>
					        <input id="BR_VRATI" name="br_vrati" type="text" value="<?php echo $get_rezervation_detail['BR_VRATI']?>">
						</div>
						<div class="grid-2-12">
					        <label for="moknost">Моќност</label>
					        <input id="moknost" name="moknost" type="text" value="<?php echo $get_rezervation_detail['MOKNOST_KW']?>">
				        </div>
				        <div class="grid-2-12">
					        <label for="zafatnina">Зафатнина</label>
					        <input id="zafatnina" name="zafatnina" type="text" value="<?php echo $get_rezervation_detail['ZAFATNINA']?>">
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
					                    <li><input name="oprema_klima" type="checkbox" <?php if($get_rezervation_detail['OPREMA_KLIMA']=='D'){echo "checked=\"checked\"";}?>> 
					                    	<label>Клима</label>
					                    </li>
					                    <li><input name="oprema_centr_brava" type="checkbox" <?php if($get_rezervation_detail['OPREMA_CENTR_BRAVA']=='D'){echo "checked=\"checked\"";}?>> <label>Цент. брава</label></li>
					                    <li><input name="oprema_triagolnik" type="checkbox" <?php if($get_rezervation_detail['OPREMA_TRIAGOLNIK']=='D'){echo "checked=\"checked\"";}?>> 
					                    <label>Триаголник</label>
					                    </li>
					                    <li><input name="oprema_abs" type="checkbox" <?php if($get_rezervation_detail['OPREMA_ABS']=='D'){echo "checked=\"checked\"";}?>> <label>АБС</label></li>
					                </ul>
				                </div>
				                <div class="grid-2-12">
				                	<ul class="formee-list">
				                		<li><input name="oprema_radio" type="checkbox" <?php if($get_rezervation_detail['OPREMA_RADIO']=='D'){echo "checked=\"checked\"";}?>> <label>Радио</label></li>
					                    <li><input name="oprema_dokumenti" type="checkbox" <?php if($get_rezervation_detail['OPREMA_DOKUMENTI']=='D'){echo "checked=\"checked\"";}?>> <label>Документи</label></li>
					                    <li><input name="oprema_lanci" type="checkbox" <?php if($get_rezervation_detail['OPREMA_LANCI']=='D'){echo "checked=\"checked\"";}?>> <label>Ланци</label></li>
					                    <li><input name="oprema_digalka" type="checkbox" <?php if($get_rezervation_detail['OPREMA_DIGALKA']=='D'){echo "checked=\"checked\"";}?>> <label>Дигалка</label></li>
				                	</ul>
				                </div>
				                <div class="grid-3-12">
				                	<ul class="formee-list">
				                		<li><input name="oprema_rez_trkalo" type="checkbox" <?php if($get_rezervation_detail['OPREMA_REZ_TRKALO']=='D'){echo "checked=\"checked\"";}?>> <label>Резервно тркало</label></li>
					                    <li><input name="oprema_rez_sijalici" type="checkbox" <?php if($get_rezervation_detail['OPREMA_REZ_SIJALICI']=='D'){echo "checked=\"checked\"";}?>> <label>Резервни сијалици</label></li>
					                    <li><input name="oprema_el_prozori" type="checkbox" <?php if($get_rezervation_detail['OPREMA_EL_PROZORI']=='D'){echo "checked=\"checked\"";}?>> <label>Ел. прозорци</label></li>
					                    <li><input name="oprema_prva_pomos" type="checkbox" <?php if($get_rezervation_detail['OPREMA_PRVA_POMOS']=='D'){echo "checked=\"checked\"";}?>> <label>Прва Помош</label></li>
				                		
				                	</ul>
				                </div>
        						<div class="grid-4-12">
						        	<label for="zabeleska">Забелешка</label>
						        	<textarea id="zabeleska" name="zabeleska" cols=""></textarea>
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
							<input id="datum-izdavanje" name="datum-izdavanje" type="text" value="">
			            </div>
						<div class="grid-6-12">
			                <label for="mesto-izdavanje">Место</label>
							<input id="mesto-izdavanje" name="mesto-izdavanje" type="text" value="">
			            </div>
			            
			            <div class="grid-6-12">
			                <label for="predvideo-vrakane">Предвидено враќање</label>
							<input id="predvideo-vrakane" name="predvideo-vrakane" type="text" value="">
			            </div>
						<div class="grid-6-12">
			                <label for="predvideno-mesto-vrakane">Место</label>
							<input id="predvideno-mesto-vrakane" name="predvideno-mesto-vrakane" type="text" value="">
			            </div>
			            
			            <div class="grid-6-12">
			                <label for="vrakane">Враќање</label>
							<input id="vrakane" name="vrakane" type="text" value="">
			            </div>
						<div class="grid-6-12">
			                <label for="mesto-vrakane">Место</label>
							<input id="mesto-vrakane" name="mesto-vrakane" type="text" value="">
			            </div>		            
			        </div>
			        <div style="width:100%">
			        	<div class="grid-2-12">
				        	<label for="vkupno-denovi">Вкупно денови</label>
				        	<input id="vkupno-denovi" name="vkupno-denovi" type="text" value="">
			        	</div>
			        	<div class="grid-3-12">
					        <label>Возилото ќе се вози во</label>
					        <ul class="formee-list">
					        	<li>
					        		<input type="radio" name="tip-relacija" value="M" checked="checked">
					        		<label>Македонија</label>
					        	</li>
					        	<li>
					        		<input type="radio" name="tip-relacija" value="S">
					        		<label>Странство</label>
					        	</li>
					        </ul>
						</div>
						<div class="grid-2-12">
				        	<label for="km-izdavanje">Km при издавање</label>
				        	<input id="km-izdavanje" name="km-izdavanje" type="text" value="">
			        	</div>
			        	<div class="grid-2-12">
				        	<label for="km-vrakjanje">Km при враќање</label>
				        	<input id="km-vrakjanje" name="km-vrakjanje" type="text" value="">
			        	</div>
			        	<div class="grid-2-12">
				        	<label for="km-izminato">Изминати Km</label>
				        	<input id="km-izminato" name="km-izminato" type="text" value="">
			        	</div>						
			        </div>
			        <div style="width:80%">
			        	<div class="grid-6-12">
				        	<label for="dopolnitelen-opis">Дополнителен опис</label>
				        	<textarea id="dopolnitelen-opis" name="dopolnitelen-opis" cols=""></textarea>
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
										<input id="gorivo" name="gorivo" type="text" value="">
									</div>
									<div class="grid-12-12">
										<label for="prezemanje">Преземање</label>
										<input id="prezemanje" name="prezemanje" type="text" value="">
									</div>
									<div class="grid-12-12">
										<label for="dostava">Достава</label>
										<input id="dostava" name="dostava" type="text" value="">
									</div>
									<div class="grid-12-12">
										
										<label for="razno">Разно</label>
										<input id="razno" name="razno" type="text" value="">
									</div>
								</div>
								<div style="width:80%;float:right">
									<div style="border-bottom:1px solid">
										<h4>Резервоар со гориво</h4>
										<div class="grid-3-12">
											
											<label>Пред издавање</label>				
						                    <select>
						                    	<option value=""></option>
							                    <option value="1">1</option>
							                    <option value="1/2">1/2</option>
							                    <option value="0">0</option>
						               	 	</select>
						               	 </div>
						               	 <div class="grid-3-12">
						               	 	<label>При враќање</label>				
						                    <select class="formee-medium">
						                    	<option value=""></option>
							                    <option value="1">1</option>
							                    <option value="1/2">1/2</option>
							                    <option value="0">0</option>
						               	 	</select>		
										</div>
									</div>
									<div class="grid-3-12">
										<label>Депозит</label>				
					                    <select>
					                    	<option value=""></option>
						                    <option value="depozit">Оставил депозит</option>
						                    <option value="">Select</option>
						                    
					               	 	</select>		
									</div>
									<div class="grid-3-12" style="border-right:1px solid">
					                    <label for="depozit-iznos">Износ</label>
										<input id="depozit-iznos" name="depozit-iznos" type="text" value="">		
									</div>
								
									<div class="grid-4-12">
					                    <label for="dop-relacija">Релација</label>
										<input id="dop-relacija" name="dop-relacija" type="text" value="">		
									</div>
								
									<div class="grid-12-12">
					                    <label for="dop-vozac">Дополнителен возач</label>
										<input id="dop-vozac" name="dop-vozac" type="text" value="">		
									</div>
									<div class="grid-2-12">
					                    <label for="dop-vozacka-br">Возачка број</label>
										<input id="dop-vozacka-br" name="dop-vozacka-br" type="text" value="">		
									</div>
									<div class="grid-2-12">
					                    <label for="dop-vozacka-izdadena-na">Издадена на</label>
										<input id="dop-vozacka-izdadena-na" name="dop-vozacka-izdadena-na" type="text" value="">		
									</div>
									<div class="grid-3-12">
					                    <label for="dop-vozacka-izdadena-od">Издадена од</label>
										<input id="dop-vozacka-izdadena-od" name="dop-vozacka-izdadena-od" type="text" value="">		
									</div>
								</div>
							</div>
							<div id="tab-2">
							    <div style="width:20%; float:left">
								    <div class="grid-12-12">
						                    <label for="cena-cenovnik">Цена</label>
											<input id="cena-cenovnik" name="cena-cenovnik" type="text" value="<?php echo $get_rezervation_detail['CENA']?>">		
									</div>
									<div class="grid-12-12">
						                    <label for="valuta-cenovnik">Валута</label>
											<input id="valuta-cenovnik" name="valuta-cenovnik" type="text" value="<?php echo $get_rezervation_detail['VALUTA']?>">		
									</div>
									<div class="grid-12-12">
						                    <label for="kurs-cenovnik">Курс</label>
											<input id="kurs-cenovnik" name="kurs-cenovnik" type="text" value="">		
									</div>
								</div>
								<div style="width:70%; float:right">
									<div class="grid-4-12">
						                    <label for="cena-mkd-cenovnik">Цена (МКД)</label>
											<input id="cena-mkd-cenovnik" name="cena-mkd-cenovnik" type="text" value="<?php echo $get_rezervation_detail['CENA']?>">		
									</div>
									<div class="grid-3-12">
						                    <label for="popust-cenovnik">Попуст</label>
											<input id="popust-cenovnik" name="popust-cenovnik" type="text" value="">		
									</div>
									<div class="grid-3-12">
						                    <label for="vkupno-cenovnik">Вкупно</label>
											<input id="vkupno-cenovnik" name="vkupno-cenovnik" type="text" value="<?php echo $get_rezervation_detail['CENA']?>">		
									</div>
									<div class="grid-3-12">
						                    <label for="ddv-cenovnik">ДДВ (%)</label>
											<input id="ddv-cenovnik" name="ddv-cenovnik" type="text" value="18">		
									</div>
									<div class="grid-3-12">
						                    <label for="ddv-iznos-cenovnik">ДДВ износ</label>
											<input id="ddv-iznos-cenovnik" name="ddv-iznos-cenovnik" type="text" value="<?php echo $get_rezervation_detail['CENA']*(18/100)?>">		
									</div>
									<div class="grid-4-12">
						                    <label for="vkupno-iznos-cenovnik">Износ за плаќање</label>
											<input id="vkupno-iznos-cenovnik" name="vkupno-iznos-cenovnik" type="text" value="<?php echo $get_rezervation_detail['CENA']?>">		
									</div>
								</div>
							</div>
						</div>
				 </div>
		        </fieldset>
		        <fieldset>
			        <div style="width:100%; text-align:center">
				        <div class="grid-12-12">
							<input type="submit" value="Зачувај"/>
							<input type="submit" value="Прегледај"/>
							<input type="submit" value="Печати"/>
						</div>
					</div>
				</fieldset>	  
		</form>
<script type="text/javascript">
$( "#tabs" ).tabs();
$( "#tabs2" ).tabs();
</script>