<?php session_start();?>
<style>
dl { 
	border: 3px double #ccc; 
	padding: 0.5em;
	font-size: 16px;
}
dt { float: left; clear: left; width: 280px; text-align: right; font-weight: bold; color: green; }
dt:after { content: ":"; }
dd { margin: 0 0 0 110px; padding: 0 0 1.5em 0; }
</style>
<div>
	<dl>
		<dt><b>Договор број</b></dt>
		<dd><?php echo $_SESSION['form1']['dok_id'];?></dd>
		<dt><b>Име</b></dt>
		<dd><?php echo $_SESSION['form1']['firstname'];?></dd>
		<dt><b>Презиме</b></dt>
		<dd><?php echo $_SESSION['form1']['lastname']?></dd>
		<dt><b>Телефон</b></dt>
		<dd><?php echo $_SESSION['form1']['tel']?></dd>
		<dt><b>Емаил</b></dt>
		<dd><?php echo $_SESSION['form1']['email']?></dd>
		<dt><b>Автомобил</b></dt>
		<dd><?php echo $_SESSION['form1']['car-klasa'].' '.$_SESSION['form1']['car-model'];?></dd>
		<dt><b>Резервација на автомобил за дата</b></dt>
		<dd><?php echo $_SESSION['form1']['datum_od'].' - '.$_SESSION['form1']['datum_do'];?></dd>
		<dt><b>Цена</b></dt>
		<dd><?php echo $_SESSION['form1']['cena'];?> MKD</dd>
	</dl>
	
	<a href="#" onclick="window.print()" id="pecati">Печати</a>
</div>
<?php unset($_SESSION['form1']);?>

