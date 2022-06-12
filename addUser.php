<?php
$conn = mysqli_connect('localhost','root','','cinema');
$a = $_POST['usern'];
$b = $_POST['passn'];
$c = $_POST['tn'];

$ide = mysqli_query($conn,"select * from users where login='".$a."' ");
$x=mysqli_fetch_row($ide);
if($x!=NULL){
	echo "Błąd! Istnieje konto o podanym loginie.";
	exit();
}



$insert = 
"insert into users
values ('','".$a."','".$b."','','".$c."')
";
$execute = mysqli_query($conn, $insert);
echo "Dodano usera";
?>