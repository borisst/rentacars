<?php session_start();?>

<div>
	<h2><?php echo $firma_detail['NAZIV']?></h2>
	<dl>
		<dt><b>Dogovor broj</b></dt>
		<dd><?php echo $_SESSION['form1']['dok_id'];?></dd>
		<dt><b>Ime</b></dt>
		<dd><?php echo $_SESSION['form1']['firstname'];?></dd>
		<dt><b>Prezime</b></dt>
		<dd><?php echo $_SESSION['form1']['lastname']?></dd>
		<dt><b>Tel</b></dt>
		<dd><?php echo $_SESSION['form1']['tel']?></dd>
		<dt><b>email</b></dt>
		<dd><?php echo $_SESSION['form1']['email']?></dd>
		<dt><b>Avtomobil</b></dt>
		<dd><?php echo $_SESSION['form1']['car-klasa'].' '.$_SESSION['form1']['car-model'];?></dd>
		<dt><b>Rezervacija na avtomobil za data</b></dt>
		<dd><?php echo $_SESSION['form1']['datum_od'].' - '.$_SESSION['form1']['datum_do'];?></dd>
		<dt><b>Cena</b></dt>
		<dd><?php echo $_SESSION['form1']['cena'];?> MKD</dd>
	</dl>
	
	<a href="#" onclick="window.print()" id="pecati">Pecati</a>
</div>
<?php unset($_SESSION['form1']);?>

