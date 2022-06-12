<?php
$conn = mysqli_connect('localhost','root','','cinema');
$a = $_POST['cinema'];
$b = $_POST['wing'];

if($b!='L' && $b!='R'){
	echo "Błąd! Podaj R lub L.";
	exit();
}

$ide = mysqli_query($conn,"select * from cinema where id=".$a." ");
$x=mysqli_fetch_row($ide);
if($x==NULL){
	echo "Błąd! Takie kino nie istnieje.";
	exit();
}




$hall_number = mysqli_query($conn,
"select count( * )
from hall
where cinemaId='".$a."' 
");
$e=mysqli_fetch_row($hall_number);
$e=$e[0];
$e=$e+1;

$insert_note = 
"insert into hall
values ('','".$b."','".$e."','".$a."')
";
$execute_insert_note = mysqli_query($conn, $insert_note);
$id = $conn->insert_id;
for ($i = 1; $i <= 185; $i++) {
	echo $i;
$insert = 
"insert into seats
values ('','".$id."','".$i."')
";
$execute_insert_note = mysqli_query($conn, $insert);
}

?>