<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>The Cinema</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<script>
        function selectMovie(parameter) {
			document.cookie='movie='+parameter;
			let x = getCookie('movie');
			location.href="seances.php";
        }
		
function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
}
    </script>

<form action="login.php" method="post">
		Login: <br /> <br><input type="text" name="login" class="type-2"/> <br />
		Hasło: <br /> <br><input type="password" name="haslo" class="type-2"/> <br />
		<button class="index_button">Zaloguj</button><br />
</form>




<?php
$conn = mysqli_connect('localhost','root','','cinema');
$ress = mysqli_query($conn,"
select *
from seance
where cinemaId=".$_COOKIE["cinema"]." and moveId=".$_COOKIE["movie"]."
" );

while ($rs =mysqli_fetch_assoc($ress)) {
	echo '<div class="cinema" onclick="selectSeance('.$rs['id'].')"> '.$rs['hour'].' </div>';
}


?>

<div id="aaa"></div>







</body>
</html>