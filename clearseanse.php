<?php
$conn = mysqli_connect('localhost','root','','cinema');
$a = $_POST['clears'];


$today = date("Y-m-d"); // 2001-03-10
$today2 = date("H:i"); // 10:20
	$ide = mysqli_query($conn,
	"
	delete 
	FROM `seance` 
	WHERE date <'".$today." '

	;
	");

//	and FORMAT(hour,'t') < '".$today2."'
?>