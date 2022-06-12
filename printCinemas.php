<?php
$conn = mysqli_connect('localhost','root','','cinema');
	$result = mysqli_query($conn,
	"
	select * from cinema
	"
	);
	
	
	while($row = mysqli_fetch_assoc($result)) {
	
	echo '<pre>'; echo print_r($row);  echo '</pre>';
	echo "<br><br>";

}
?>