<?php
$conn = mysqli_connect('localhost','root','','cinema');
$a = $_POST['name'];
$b = $_POST['city'];
$c = $_POST['adres'];

$ide = mysqli_query($conn,"select * from cinema where name='".$a."' and city = '".$b."' and adress='".$c."' ");
$x=mysqli_fetch_row($ide);
if($x!=NULL){
	echo "Błąd! Istnieje takie kino.";
	exit();
}



$insert = 
"insert into cinema
values ('','".$a."','".$b."','".$c."')
";
$execute = mysqli_query($conn, $insert);
echo "Dodano kino";
?>