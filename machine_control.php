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
    <link rel="stylesheet" href="./css/control.css">
</head>
<body>

<div style="height:200px;margin-top:50px;">
  <div id="slider-vertical"></div>
  <button type="button" class="arrow" id="arrowUp">&#8593;</button><br />
  <button type="button" class="arrow" id="arrowDown">&#8595;</button>
</div>
  <p>
    <label for="amount">Throttle:</label>
    <input class="text" type="text" id="amount" readonly />
    <button type="button" id="stop" name="stop">STOP!</button>
    <button type="button" id="1">1</button>
	<button type="button" id="2">2</button>
	<button type="button" id="3">3</button>
	<button type="button" id="backmove">reverse</button>
  </p>
<div>
	<div id="slider"></div>
	<p>
	  <label for="amount1">Steering:</label>
	  <input class="text" type="text" id="amount1" readonly />
	  <button type="button" id="arrowLeft">&#8592;</button>
	  <button type="button" id="arrowRitght">&#8594;</button>
	  <button type="button" id="alignment">alignment</button>
	</p>
</div>
<div>
  <p>
    <label for="speed">Speed:</label>
    <input type="button" class="text" type="text" id="speed" readonly value="0" />
    <button type="button" id="light">light</button>
	<button type="button" id="sound">bign</button>
  </p>
</div>
<div><p id="ajax">Wait for ajax request</p></div>
<script type="text/javascript">
	
</script>
<script>
$(function(){
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

    $( "#slider" ).slider({
      value: 0,
      min: -50,
      max: 50,
      slide: function( event, ui ) {
        $( "#amount1" ).val( "%" + ui.value );
      }
    });
    $( "#amount1" ).val( "%" + $( "#slider" ).slider( "value" ) );

	function up(){
		$( "#slider-vertical" ).slider( "value", $("#slider-vertical").slider("value")+1);	
		$( "#amount" ).val( $( "#slider-vertical" ).slider( "value" ) );
		$.ajax({
				url:"session.php",
				data:"throttle="+$( "#slider-vertical" ).slider( "value" ),
				success:function(data){
					console.log("Sudmited value of throttle, " + data+"\nSubmit:"+$( "#slider-vertical" ).slider( "value" ));
					}
				});
}
	function down(){
		$("#slider-vertical").slider("value",$("#slider-vertical").slider("value")-1);
		$( "#amount" ).val( $( "#slider-vertical" ).slider( "value" ) );
		$.ajax({
				url:"session.php",
				data:"throttle="+$( "#slider-vertical" ).slider( "value" ),
				success:function(data){
					console.log("Sudmited value of throttle, " + data+"\nSubmit:"+$( "#slider-vertical" ).slider( "value" ));
					}
				});
	}
	function left(){
		$("#slider").slider("value",$("#slider").slider("value")-1);
		$( "#amount1" ).val( $( "#slider" ).slider( "value" ) );
		$.ajax({
				url:"session.php",
				data:"steering="+$( "#slider" ).slider( "value" ),
				success:function(data){
					console.log("Sudmited value of steering, " + data+"\nSubmit:"+$( "#slider" ).slider( "value" ));
					}
				});
	}
	function right(){
		$("#slider").slider("value",$("#slider").slider("value")+1);
		$( "#amount1" ).val( $( "#slider" ).slider( "value" ) );
		$.ajax({
				url:"session.php",
				data:"steering="+$( "#slider" ).slider( "value" ),
				success:function(data){
					console.log("Sudmited value of steering, " + data+"\nSubmit:"+$( "#slider" ).slider( "value" ));
					}
				});
	}
	function stop(){
		$("#slider-vertical").slider("value",0);
		$( "#amount" ).val( $( "#slider-vertical" ).slider( "value" ) );
		$.ajax({
				url:"session.php",
				data:"throttle=0",
				success:function(data){
					console.log("Sudmited value of throttle, " + data+"\nSubmit: 0");
					}
				});
	}
	function alignment(){
		$("#slider").slider("value",0);
		$( "#amount1" ).val( $( "#slider" ).slider( "value" ) );
		$.ajax({
				url:"session.php",
				data:"steering=0",
				success:function(data){
					console.log("Sudmited value of steering, " + data+"\nSubmit: 0");
					}
				});
	}
	function first(){
		$("#slider-vertical").slider("value",33);
		$( "#amount" ).val( $( "#slider-vertical" ).slider( "value" ) );
		$.ajax({
				url:"session.php",
				data:"throttle=33",
				success:function(data){
					console.log("Sudmited value of throttle, " + data+"\nSubmit: 33");
					}
				});
	}
	function second(){
		$("#slider-vertical").slider("value",66);
		$( "#amount" ).val( $( "#slider-vertical" ).slider( "value" ) );
		$.ajax({
				url:"session.php",
				data:"throttle=66",
				success:function(data){
					console.log("Sudmited value of throttle, " + data+"\nSubmit: 66");
					}
				});
	}
	function third(){
		$("#slider-vertical").slider("value",100);
		$( "#amount" ).val( $( "#slider-vertical" ).slider( "value" ) );
		$.ajax({
				url:"session.php",
				data:"throttle=100",
				success:function(data){
					console.log("Sudmited value of throttle, " + data+"\nSubmit: 100");
					}
				});
	}
    function get(){
    	var xhr = $.get("info.txt",function(data,success){
    		if(success){
    			$("#ajax").text(data);
    		}
    	},"text");
    	
    }
	$( window ).keydown(function(event){
		switch(event.key) {
		case "ArrowUp":
			up();
			break;
		case "ArrowDown":
			down();
			break;
		case "ArrowRight":
			right();
			break;
		case "ArrowLeft":
			left();
			break;
		case " ":
			stop();	
		    break;
		case "0":
			alignment();
			break;
		case "1":
			first();
		    break;
		case "2":
			second();
		    break;
		case "3":
			third();
		    break;
		}
	});


	$("#arrowUp").on("click",up);
	$("#arrowDown").on("click",down);
	$("#stop").on("click",stop);
	$("#1").on("click",first);
	$("#2").on("click",second);
	$("#3").on("click",third);
	$("#arrowLeft").on("click",left);
	$("#arrowRitght").on("click",right);
	$("#alignment").on("click",alignment);
	$("#sound").on("click",get);
});
</script>
</body>
</html>