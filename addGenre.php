<?php
$conn = mysqli_connect('localhost','root','','cinema');
$a = $_POST['gn'];
$ide = mysqli_query($conn,"select * from movietypes where title = ".$d."");
$x=mysqli_fetch_row($ide);
if($x!=NULL){
	echo "Błąd! Istnieje taki gatunek filmowy.";
	exit();
}
$insert = 
"insert into movietypes
values ('','".$a."')
";
$execute = mysqli_query($conn, $insert);

?>