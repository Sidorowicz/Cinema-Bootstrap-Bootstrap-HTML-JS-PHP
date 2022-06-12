<?php
$conn = mysqli_connect('localhost','root','','cinema');
	$result = mysqli_query($conn,
	"
	select * from movies where ongoing = 1;
	"
	);
	
	
	while($row = mysqli_fetch_assoc($result)) {
	
	
	
	
	
	echo '<pre>'; 
	echo print_r($row);  
	echo '</pre>';
	echo "<br><br>";

}
?>