<?php
//print_r($_SESSION);
//exit;
/*	*/
	ini_set("display_errors", "on");
	error_reporting(E_ALL | E_STRICT);  
	
	date_default_timezone_set("Europe/Skopje");
	define("HAS_ACCESS", true);	
	require_once('auth.php');
	//require("../CarReservation.class.php"); 
	$cr = new CarReservation();
	$firma_detail = $cr->get_firma_detail($_SESSION['SESS_FIRMAID']);
?>
<!DOCTYPE HTML>
<html dir="ltr" lang="en-US">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Име на фирма</title>

	<!--- CSS --->
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/formee-style.css" type="text/css" />
	<link rel="stylesheet" href="css/formee-structure.css" type="text/css" />

	<style title="currentStyle" type="text/css">
			@import "css/demo_page.css";
			@import "css/demo_table.css";
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<script src="../js/jquery.ui.datepicker-mk.js"></script>
	<script src="../js/jquery-time-picker.js"></script>
		<script src="js/jquery.ui.datepicker-mk.js"></script>
		<script src="js/knockout-2.2.1.js"></script>
		<script src="js/globalize.min.js"></script>
		<script src="js/dx.chartjs.js"></script>
<script src="js/jquery.dataTables.js"></script>
	<!--- Javascript libraries (jQuery and Selectivizr) used for the custom checkbox --->

	<!--[if (gte IE 6)&(lte IE 8)]>
		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="js/selectivizr.js"></script>
		<noscript><link rel="stylesheet" href="css/fallback.css" /></noscript>
	<![endif]-->

	</head>

	<body>
	<?php $number_rezervation = $cr->number_reservation_car_class($_SESSION['SESS_FIRMAID']);?>
	<script type="text/javascript">
$(function (){
	  $("#chartContainer01").dxRangeSelector({
		    margin: {
		        top: 50
		    },
		    size: {
		        height: 200
		    },
		    scale: {
		        startValue: new Date(2013, 1, 1),
		        endValue: new Date(),
		        minorTickInterval: "week",
		        majorTickInterval: { days: 7 },
		        minRange: "week",
		        maxRange: "week",
		        showMinorTicks: false
		    },
		    sliderMarker: {
		        format: "dd dddd"
		    },
		    selectedRange: {
		        startValue: new Date(),
		        endValue: new Date()
		    },
		    selectedRangeChanged: function (e) {
			    console.log(e);
			    $.ajax({
					   type: "GET",
					   url: "action-admin.php",
					   data: { action:'chartPie', start:e.startValue, end:e.endValue}
					   }).done(function( msg ) {
					   $('#popupBox').html(msg);
					});
		    }
		    
		});
		
   $("#chartContainer").dxChart({
    dataSource: [
        {day: "Monday", oranges: 3},
        {day: "Tuesday", oranges: 2},
        {day: "Wednesday", oranges: 3},
        {day: "Thursday", oranges: 30},
        {day: "Friday", oranges: 6},
        {day: "Saturday", oranges: 11},
        {day: "Sunday", oranges: 4} ],
 
    series: {
        argumentField: "day",
        valueField: "oranges",
        name: "My oranges",
        type: "bar",
        color: '#ffa500'
    },

    pointClick: function(e) {
        var clickedArgument = e.orogonalArgument;
        console.log(e);
        var newDataSource;
        //Fill out newDataSource based on clickedArgument 
        $("#chartContainer").dxChart({
             dataSource: newDataSource,
             series: {
                 argumentField: "newArgField",
                 valueField: "newValFied",
                 type: "bar"
             }
        });
    }
});

   var dataSource = [
                  	<?php foreach ($number_rezervation as $nr):?>                  
                  	{ klasa: "<?php echo $nr['OPIS'];?>", area: <?php echo $nr['br_rezervacii'];?> },
                  	<?php endforeach;?>
                  	];
                  	
                  	$("#chartContainerP").dxPieChart({
                  	size:{ 
                  	  width: 500
                  	},
                  	dataSource: dataSource,
                  	series: [
                  	  {
                  	      argumentField: "klasa",
                  	      valueField: "area",
                  	      label:{
                  	          visible: true,
                  	          connector:{
                  	              visible:true,           
                  	              width: 1
                  	          }
                  	      }
                  	  }
                  	],
                  	title: "Резервации"
                  	});
	

}

			);
		</script>
		<div id="main">
		<br />
		<h1>Резервација / Договор за наем на возило</h1>
			<div id='cssmenu'>
				<ul>
				   <li class='active'><a href='firma-index.php'><span>Почеток</span></a></li>
				   <li><a href='#' id="new_contract"><span>Нов договор</span></a></li>
				   <li><a href='#' id="contract_list" ><span>Преглед на договори</span></a></li>
				   <li><a href='#' id="rezervation_pending_list" ><span>Преглед на резервации</span></a></li>
				   <li class='last'><a href='#' id="cars"><span>Aвтомобили</span></a></li>
				</ul>
			</div>
			<div id="content">
				<div id="loader"></div>
				<div class="grid-12-12">
					<div id="chartContainer01" style="width: 100%; height: 240px;"></div>
					</div>
				<div class="grid-6-12">
					<div id="chartContainer" style="width: 100%; height: 240px;"></div>
					</div>
					<div class="grid-6-12">
						<div id="chartContainerP" style="width: 100%; height: 240px;"></div>
					</div>
			</div>
					<div id="footer">
		<?php  //print_r($firma_detail);
		echo $firma_detail['NAZIV'];?>
		</div>
		</div>
<script type="text/javascript">
	$(document).ready( function() {

		    $.ajaxSetup ({  
		        cache: false  
		    });  
		    var ajax_load = '<img src="../img/ajax-loader.gif" />';  
		      
		//  load() functions  
		    var loadUrl = "action-admin.php?action=contracts_list"; 
		    var loadUrlRezList = "action-admin.php?action=rezervation_pending_list";  
		    var loadUrlNewContract = "action-admin.php?action=new_contract";
		    $("#contract_list").click(function(){  
		        $("#content").html(ajax_load).load(loadUrl, function() {
		        	 $('#dogovori').dataTable( {
		        	        "bPaginate": true,
		        	        "bLengthChange": true,
		        	        "bFilter": true,
		        	        "bSort": true,
		        	        "bInfo": true,
		        	        "bAutoWidth": true
		        	    } );  
		        }); 
		    });  
		    $("#new_contract").click(function(){  
		        $("#content").html(ajax_load).load(loadUrlNewContract, function() { 
		        	return false; 
			        
		        	//event.preventDefault();
		        }); 
		    });  
		    $("#rezervation_pending_list").click(function(){  
		        $("#content").html(ajax_load).load(loadUrlRezList, function() {
		        	 $('#rezervacii').dataTable( {
		        	        "bPaginate": true,
		        	        "bLengthChange": true,
		        	        "bFilter": true,
		        	        "bSort": true,
		        	        "bInfo": true,
		        	        "bAutoWidth": true
		        	    } );
		        });  
		       
		    }); 


		    $(document).on("click", "#get_rezervation_detail",function(event){			   
		    	event.preventDefault();
	    	    var url = ($(this).attr('href'));
	    	    var dok_id = getURLParameter(url, 'dok_id');
	    	    alert(dok_id);
		    	var loadUrlGetRezDet= "action-admin.php?action=get_rezervation_detail&dok_id="+dok_id; 
		    	$("#content").html(ajax_load).load(loadUrlGetRezDet);
		    	
		    	return false;
		    });

		    $(document).on("click", "#get_contract_detail",function(event){			   
		    	event.preventDefault();
	    	    var url = ($(this).attr('href'));
	    	    var dok_id = getURLParameter(url, 'dok_id');
	    	    alert(dok_id);
		    	var loadUrlGetRezDet= "action-admin.php?action=get_contract_detail&dok_id="+dok_id; 
		    	$("#content").html(ajax_load).load(loadUrlGetRezDet);
		    	return false;
		    });
		    
		    function getURLParameter(url, name) {
		        return (RegExp(name + '=' + '(.+?)(&|$)').exec(url)||[,null])[1];
		    }
		    
		});
</script>		
	</body>
</html>
