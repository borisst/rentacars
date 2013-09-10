<?php 
//require_once('auth.php');
require_once ("../CarReservation.class.php");
$cr = new CarReservation();
$cr->sec_session_start();
$firma_detail = $cr->get_firma();
?>
<!DOCTYPE HTML>
<html dir="ltr" lang="en-US">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Име на фирма</title>

	<!--- CSS --->
	<link rel="stylesheet" href="css/style.css" type="text/css" />


	<!--- Javascript libraries (jQuery and Selectivizr) used for the custom checkbox --->

	<!--[if (gte IE 6)&(lte IE 8)]>
		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="js/selectivizr.js"></script>
		<noscript><link rel="stylesheet" href="css/fallback.css" /></noscript>
	<![endif]-->

	</head>

	<body>
		<div id="container">
			<form action="mainpage.php" method="post">

				<div class="login"><?php echo mb_convert_encoding($firma_detail['NAZIV'],'UTF-8','windows-1251');?></div>
				<div class="username-text">Корисничко име:</div>
				<div class="password-text">Лозинка:</div>
				<div class="username-field">
					<input type="text" name="username" value="" />
				</div>
				<div class="password-field">
					<input type="password" name="password" value="" />
				</div>
				<p>
				<?php 
					if(isset($_SESSION['ERRMSG_ARR'])){
						echo $_SESSION['ERRMSG_ARR'];
						unset($_SESSION['ERRMSG_ARR']);
					}
					//print_r($_SESSION);?></p>
				<input type="checkbox" name="remember-me" id="remember-me" /><label for="remember-me">Запомни ме</label>
				<input type="submit" name="submit" value="Влез" />
				
			</form>
		</div>
		<div id="footer">
		<?php echo mb_convert_encoding($firma_detail['NAZIV'],'UTF-8','windows-1251');?>
		</div>
	</body>
</html>
