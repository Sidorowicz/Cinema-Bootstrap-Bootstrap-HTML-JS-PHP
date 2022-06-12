<!DOCTYPE html>
<html lang="pl">

<?php
	session_start();
	if (    !isset($_COOKIE['cinema'])   ||    !isset($_COOKIE['selectedmovie'])   ||   !isset($_COOKIE['seance'])   ||    !isset($_COOKIE['dateday'])   ||     !isset($_COOKIE['dateyear'])   ||     !isset($_COOKIE['datemonth'])  )
	{
		header('Location: index.php');
		exit();
	}
?>
<head >

<meta charset="utf-8">
<title>Page Title</title>
<link rel="stylesheet" type="text/css" href="style.css">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<script src="jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
	
	const seats = new Array();
	var ele = document.getElementsByClassName("seat");

	
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
		
	$(".seat").click(function(){
		var reserve = $( this ).html(  );
		if($(this).css("background-color")=="rgb(220, 20, 60)"){
			removeItemOnce(seats,reserve);
			$( this ).css("background-color","white");
			document.getElementById("arr").value = uniq(seats);
			//$('#array').html(uniq(seats));
		}else{
			seats.push(reserve);	
			$( this ).css("background-color","Crimson");
			document.getElementById("arr").value = uniq(seats);
			//$('#array').html(uniq(seats));
		}
	});
});
</script>

</head>
<body>
<main>
<!--<div id="array" >a</div>-->
<div class="hallView">


<?php
$conn = mysqli_connect('localhost','root','','cinema');
$ress = mysqli_query($conn,"
select * 
from `seats` 
inner join `seance` 
on seats.hallID = seance.hallId 
where seance.id= ".$_COOKIE['seance']."" 
 );
$ressx = mysqli_query($conn,"
select *
from `seatseance`
where`seance`= ".$_COOKIE['seance']."
order by seat ASC
" );
$wing = mysqli_query($conn,"
select *
from hall
inner join seance
on seance.hallId = hall.id
where seance.id = ".$_COOKIE['seance']."
" );


$i=0;
$rsx =mysqli_fetch_assoc($ressx);
$wing =mysqli_fetch_assoc($wing);
$r=0;



if($wing['type']=="L"){
while ($rs =mysqli_fetch_assoc($ress)) {
	if($i==0){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==14){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==28){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==42){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==56){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==70){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==84){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==98){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==112){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==126){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==140){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==144){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	
	if($i==158){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
if (mysqli_num_rows($ressx)!=0) { 

if($rs['seatNumber']==$rsx['seat']){
	
	echo '<div class="seatoccupied">'.$rs['seatNumber'].'</div>';
	$rsx =mysqli_fetch_assoc($ressx);
}else{
	echo '<div class="seat">'.$rs['seatNumber'].'</div>';
}

}else{
	echo '<div class="seat">'.$rs['seatNumber'].'</div>';
}
$i++;
}

}else{
	while ($rs =mysqli_fetch_assoc($ress)) {
	if($i==0){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==14){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==28){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==42){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==56){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==70){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==84){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==98){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==112){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==126){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';

	}
	if($i==130){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==144){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
	if($i==148){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';

	}
	if($i==162){
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
		echo '<div class="seatfiller"></div>';
	}
if (mysqli_num_rows($ressx)!=0) { 

if($rs['seatNumber']==$rsx['seat']){
	echo '<div class="seatoccupied">'.$rs['seatNumber'].'</div>';
	$rsx =mysqli_fetch_assoc($ressx);
}else{
	echo '<div class="seat">'.$rs['seatNumber'].'</div>';
}

}else{
	echo '<div class="seat">'.$rs['seatNumber'].'</div>';
}
$i++;
	}
	
	}
?>
</div>

<form action="genhall2.php" method="post">
<input type="hidden" id="arr" name="arr">
<button id="empbut">Zarezerwuj</button>
</form>

</main>
</body>
</html>