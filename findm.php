<?php
$conn = mysqli_connect('localhost','root','','cinema');

	$result = mysqli_query($conn,
	"
	select * 
	from movies 
	inner join direcotors
	on direcotrs.id = movied.director
	where movies.id like ".$_POST['tip']" 
	or movies.title like ".$_POST['tip']" 
	or directors.name like ".$_POST['tip']"
	or directors.surname like ".$_POST['tip']"	;
	"
	);
	
	
	while($row = mysqli_fetch_assoc($result)) {
	
	
	
	
	
	echo '<pre>'; 
	echo print_r($row);  
	echo '</pre>';
	echo "<br><br>";

}
?>