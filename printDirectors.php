<?php
$conn = mysqli_connect('localhost','root','','cinema');
	$result = mysqli_query($conn,
	"
	select * from directors
	"
	);
	while($row = mysqli_fetch_assoc($result)) {
          // Print the entire row data
	
	echo '<pre>'; echo print_r($row);  echo '</pre>';
	echo "<br>";

}
?>