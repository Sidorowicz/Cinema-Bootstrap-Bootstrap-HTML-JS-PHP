<!DOCTYPE html>
<html lang="pl">
<head >
<?php
	session_start();
	if (    isset($_COOKIE['cinema'])   &&    isset($_SESSION['selectedmovie'])   &&   isset($_SESSION['seance'])   &&    isset($_SESSION['dateday'])   &&     isset($_SESSION['dateyear'])   &&     isset($_SESSION['datemonth'])  )
	{
		header('Location: index.php');
		exit();
		
	}
?>
<meta charset="utf-8">
<title>Page Title</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<script src="jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
	//
	const ticketst = new Array();
	var price=0;
	$("select").each(function(){
		var tic = $( this ).val();
		ticketst.push(tic);
	});
	for(var i = 0 ; i < ticketst.length-1; i++){
		if(ticketst[i+1]=="Normalny"){
			price += 20;
		}else{
			price += 15;
		}
	}
	$('#priceR').html(price); 
	//
	$('select').on('change', function() {
			const ticketst = new Array();
		var price=0;
		$("select").each(function(){
			var tic = $( this ).val();
			ticketst.push(tic);
		});
		for(var i = 0 ; i < ticketst.length-1; i++){
			if(ticketst[i+1]=="Normalny"){
				price += 20;
			}else{
				price += 15;
			}
		}
		$('#priceR').html(price); 
	});
	
	$('#buttonend').hide(); 
	//
	const seats = new Array();
	const ticketss = new Array();
	function removeItemOnce(arr, value) {
		 var index = arr.indexOf(value);
			arr.splice(index, 1);
		  return arr;
	}
	
	function uniq(a) {
		return a.sort().filter(
			function(item, pos, ary) {
				return !pos || item != ary[pos - 1];
			}	
		);
	}
	//
	$(".seat").click(function(){
		var reserve = $( this ).html(  );
		if($(this).css("background-color")=="rgb(220, 20, 60)"){
			removeItemOnce(seats,reserve);
			$( this ).css("background-color","white");
			document.getElementById("arr").value = uniq(seats);
			$('#array').val(uniq(seats));
		}else{
			seats.push(reserve);	
			$( this ).css("background-color","Crimson");
			document.getElementById("arr").value = uniq(seats);
			$('#array').val(uniq(seats));
		}
	});
	//
	
	//
$("#confirmbtn").click(function(){
	var stringe="";
	$("select").each(function(){
		var tic = $( this ).val();
		ticketss.push(tic);
	});
	$('select').prop('disabled', true);
	$('#buttonend').prop('disabled', false);
	for(var i = 0 ; i < ticketss.length-1; i++){
	stringe+= " "+ticketss[i+1];
	}
	var tarray="";
	for(var i = 0 ; i < ticketss.length-1; i++){
		if(ticketss[i+1]=="Normalny"){
			tarray+="2 ";
		}else{
			tarray+="1 ";
		}
	}
	price=0;

	$('#tickets').val(tarray); 
	$('#buttonend').show(); 
	$('#confirmbtn').hide(); 
});
//






});
</script>
</head>
<body>
<div id="header">
	<a href="index.php"><div class="header_selection_logo">Cinemax</div></a>
	<a href="cennik.php"><div class="header_selection">CENNIK</div></a>
	<div class="header_selection">
		<label>Twoje Kino    :</label>
		<select onchange="selectCinema(this.value)">
						
							<?php
							$conn = mysqli_connect('localhost','root','','cinema');
							$ress = mysqli_query($conn,"
							select *
							from `cinema` 
							" );

							while ($rs =mysqli_fetch_assoc($ress) ) {
								if($rs['id']==$_COOKIE["cinema"]){
									echo '<option  value="'.$rs['id'].'" selected="selected"> '.$rs['name'].'  '.$rs['city'].'    '.$rs['adress'].'  </option>';
								}else{
									echo '<option  value="'.$rs['id'].'"> '.$rs['name'].'  '.$rs['city'].'    '.$rs['adress'].'  </option>';
								}
								
							}
							?>
		</select>
	</div>
</div>
<div id="confirmationx">
<div id="duzeliterki">
Dziękujemy za rezerwację, prosimy pamiętać o uregulowaniu płatności conajmniej 30 minut przed rozpoczęciem seansu.<br>
Podany kod prosimy podać przy uregulowaniu płatności.<br><br>
<?php
echo "Kod rezerwacji :   ". $_COOKIE['code'];
?>






</div>
</div>

</body>
</html>