<!DOCTYPE html>
<html lang="pl">
<?php
	session_start();
	if (    !isset($_COOKIE['cinema'])   ||    !isset($_COOKIE['selectedmovie'])   ||   !isset($_COOKIE['seance'])   ||    !isset($_COOKIE['dateday'])   ||     !isset($_COOKIE['dateyear'])   ||     !isset($_COOKIE['datemonth'])  )
	{
		header('Location: index.php');
		exit();
	}
	if (   $_POST['arr']==''  ){
		header('Location: conf2.php');
		exit();
	}
?>
<head >

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
		<select onchange="selectCinema(this.value)"  disabled>
						
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

<div id="billpage">
<div id="billpageL">
<?php
$a = $_POST['arr'];
$b=explode(",",$a++);





foreach($b as $var){
	echo "<div class='seatdesc'>";
	echo "<div class='seatlabel'>";
	echo "Miejsce nr ".$var;
	echo "</div>";
	
	
	echo "<div class='seatnumber'>";
	echo "<select id='ticket' name='ticket'>";
	echo "<option>Normalny</option>";
	echo "<option>Ulgowy</option>";
	echo "</select>";
	echo "</div>";
	echo "</div>";
	
}
echo "<button id='confirmbtn'>Zatwierdź miejsca</button>";



?>
</div>

<div id='billpageR'>

<?php
echo "Data: ".$_COOKIE['dateyear']."-".$_COOKIE['datemonth']."-".$_COOKIE['dateday']."<br>
<div id='priceL'>Cena:<div id='priceR'>.</div></div>


";


echo "<form action='reserve.php' method='post'>";
echo "<input type='hidden' id='arr' name='arr' value='".$_POST['arr']."'>";
echo "<input type='hidden' id='tickets' name='tickets' >";
echo "<button id='buttonend' disabled>Zarezerwuj</button>";
echo "</form>";

?>




</div>
</div>



</body>
</html>