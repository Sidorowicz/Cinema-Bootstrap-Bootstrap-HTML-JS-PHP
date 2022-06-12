<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>The Cinema</title>
	<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<script src="jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){	
		document.cookie='cinema='+"1";
		var today = new Date();
		document.cookie='dateday='+today.getDate();
		document.cookie='datemonth='+(today.getMonth()+1);
		document.cookie='dateyear='+today.getFullYear();
		location.href="main.php";
});
</script>




</body>
</html>