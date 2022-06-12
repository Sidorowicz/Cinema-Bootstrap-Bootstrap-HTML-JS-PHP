<?php
$conn = mysqli_connect('localhost','root','','cinema');
$a = $_POST['namer'];
$b = $_POST['sname'];


$ide = mysqli_query($conn,"select id from directors where name='".$b."' and surname='".$c."' ");
$x=mysqli_fetch_row($ide);
if($x!=NULL){
	echo "Błąd! Istnieje taki reżyser.";
	exit();
}



$insert = 
"insert into directors
values ('','".$a."','".$b."')
";
$execute = mysqli_query($conn, $insert);

?>