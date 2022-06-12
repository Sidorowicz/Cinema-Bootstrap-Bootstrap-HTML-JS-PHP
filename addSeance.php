<?php
$conn = mysqli_connect('localhost','root','','cinema');
$a = $_POST['aS1'];
$b = $_POST['aS2'];
$c = $_POST['aS3'];
$d = $_POST['aS4'];
$e = $_POST['aS5'];

$today = date("Y-m-d"); // 2001-03-10
$today2 = date("H:i"); // 10:20



$ide = mysqli_query($conn,"select * from movies where id = ".$a."");
$x=mysqli_fetch_row($ide);
if($x==NULL){
	echo "Błąd! Nie istnieje taki film.";
	exit();
}


if($b<$today){
	echo "Błąd! Wczorajsza* data.";
	exit();
}

$ide = mysqli_query($conn,"select * from cinema where id = ".$d."");
$x=mysqli_fetch_row($ide);
if($x==NULL){
	echo "Błąd! Takie kino nie istnieje.";
	exit();
}

$ide = mysqli_query($conn,"select * from hall where id = ".$e."  and cinemaId=".$d."");
$x=mysqli_fetch_row($ide);
if($x==NULL){
	echo "Błąd! Hala nie istnieje bądź nie należy do podanego kina.";
	exit();
}


$ide = mysqli_query($conn,"select * from seance where date= '".$b."'  and hour='".$c."' and moveId = ".$a." ");
$x=mysqli_fetch_row($ide);
if($x!=NULL){
	echo "Błąd! Istnieje taki seans.";
	exit();
}



	$ide = mysqli_query($conn,
	"
	insert into seance
	values(null,".$a.",'".$c."',".$e.",'".$b."',".$d.")
	");

?>

