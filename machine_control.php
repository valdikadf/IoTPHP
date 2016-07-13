<?php 

?>
<!DOCTYPE html>
<html>
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Machine control</title>
    <script src="./ui/external/jquery/jquery.js"></script>
    <script src="./ui/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="./ui/jquery-ui.min.css">
</head>
<body>
<button id="stop" name="stop">STOP!</button>
<button id="1">1</button>
<button id="2">2</button>
<button id="3">3</button>
<button id="arrowLeft">&#60</button>
<button id="arrowRitght">&#62</button>
<button id="light">light</button>
<button id="sound">bign</button>
<button id="backmove">reverse</button>
<p id="key"></p>
<div id="slider-vertical" style="height:200px;"></div>
  <p>
    <label for="amount">Throttle:</label>
    <input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;" />
  </p>
<div id="slider"></div>
<p>
  <label for="amount1">scale:</label>
  <input type="text" id="amount1" readonly style="border:0; color:#f6931f; font-weight:bold;">
</p>

<script>
    $("#slider-vertical").slider({
      orientation: "vertical",
      range: "min",
      min: 0,
      max: 100,
      value: 0,
      slide: function( event, ui ) {
        $( "#amount" ).val( ui.value );
      }
    });
    $( "#amount" ).val( $( "#slider-vertical" ).slider( "value" ) );
</script>
<script type="text/javascript">
	$( function() {
	    $( "#slider" ).slider({
	      range: "min",
	      value: 0,
	      min: -50,
	      max: 50,
	      slide: function( event, ui ) {
	        $( "#amount1" ).val( "%" + ui.value );
	      }
	    });
	    $( "#amount1" ).val( "%" + $( "#slider" ).slider( "value" ) );
  } );
</script>

<script type="text/javascript">
$(function(){
	
	$( window ).keydown(function(event){
		switch(event.key) {
			case "ArrowUp":
			x = $("#slider-vertical").slider("value");
			$("#slider-vertical").slider({
			      orientation: "vertical",
			      range: "min",
			      min: 0,
			      max: 100,
			      value: x+1,
			      slide: function( event, ui ) {
			        $( "#amount" ).val( ui.value );
			      }
			    });
			$( "#amount" ).val( $( "#slider-vertical" ).slider( "value" ) );
			break;
		case "ArrowDown":
			x = $("#slider-vertical").slider("value");
			$("#slider-vertical").slider({
			      orientation: "vertical",
			      range: "min",
			      min: 0,
			      max: 100,
			      value: x-1,
			      slide: function( event, ui ) {
			        $( "#amount" ).val( ui.value );
			      }
			    });
			$( "#amount" ).val( $( "#slider-vertical" ).slider( "value" ) );
			break;
		case "ArrowRight":
			x = $("#slider").slider("value");
			$( "#slider" ).slider({
		      range: "min",
		      value: x+1,
		      min: -50,
		      max: 50,
		      slide: function( event, ui ) {
		        $( "#amount1" ).val( "%" + ui.value );
		      }
		    });
		    $( "#amount1" ).val( "%" + $( "#slider" ).slider( "value" ) );
			break;
		case "ArrowLeft":
			x = $("#slider").slider("value");
			$( "#slider" ).slider({
		      range: "min",
		      value: x-1,
		      min: -50,
		      max: 50,
		      slide: function( event, ui ) {
		        $( "#amount1" ).val( "%" + ui.value );
		      }
		    });
		    $( "#amount1" ).val( "%" + $( "#slider" ).slider( "value" ) );
			break;
		case " ":
			$("#slider-vertical").slider({
		      orientation: "vertical",
		      range: "min",
		      min: 0,
		      max: 100,
		      value: 0,
		      slide: function( event, ui ) {
		        $( "#amount" ).val( ui.value );
		      }
		    });
		    $( "#amount" ).val( $( "#slider-vertical" ).slider( "value" ) );	
		case "0":
			$( "#slider" ).slider({
		      range: "min",
		      value: 0,
		      min: -50,
		      max: 50,
		      slide: function( event, ui ) {
		        $( "#amount1" ).val( "%" + ui.value );
		      }
		    });
		    $( "#amount1" ).val( "%" + $( "#slider" ).slider( "value" ) );
			break;
		}

	});
})

</script>
</body>
</html>