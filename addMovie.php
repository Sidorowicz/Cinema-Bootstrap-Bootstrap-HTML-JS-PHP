<?php
$conn = mysqli_connect('localhost','root','','cinema');
$a = $_POST['title'];
$b = $_POST['directorname'];
$c = $_POST['directorsname'];
$d = $_POST['genre'];
$e = $_POST['duration'];

$ide = mysqli_query($conn,"select * from movies where title = '".$a."'");
$x=mysqli_fetch_row($ide);
if($x!=NULL){
	echo "Błąd! Istnieje film o takim tytule.";
	exit();
}
$ide = mysqli_query($conn,"select id from directors where name='".$b."' and surname='".$c."' ");
$x=mysqli_fetch_row($ide);
if($x==NULL){
	echo "Błąd! Nie istnieje taki reżyser.";
	exit();
}
$ide = mysqli_query($conn,"select * from movietypes where genre = '".$d."'");
$x=mysqli_fetch_row($ide);
if($x==NULL){
	echo "Błąd! Nie istnieje taki gatunek filmowy.";
	exit();
}

if($e<60){
	echo "Błąd! Film ma poniżej 60 minut.";
	exit();
}



$ide = mysqli_query($conn,
"select id 
from movietypes
where genre='".$d."' 
");
$genre_id=mysqli_fetch_row($ide);
$genre_id=$genre_id[0];
$gen = mysqli_query($conn,
"select id 
from directors
where name='".$b."' and surname='".$c."' 
");
$director_id=mysqli_fetch_row($gen);
$director_id=$director_id[0];
$insert_note = 
"insert into movies
values (null,'".$a."',".$director_id.",".$genre_id.",".$e.",1,'','','')
";
$execute_insert_note = mysqli_query($conn, $insert_note);
?>