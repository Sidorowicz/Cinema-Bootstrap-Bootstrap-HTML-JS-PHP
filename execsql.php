<?php
$conn = mysqli_connect('localhost','root','','cinema');
$a = $_POST['sqlt'];
	$result = mysqli_query($conn,$a);
	while($row = mysqli_fetch_assoc($result)) {
          // Print the entire row data
	
	echo '<pre>'; echo print_r($row);  echo '</pre>';
	echo "<br><br>";

}
?>