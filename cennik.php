<!DOCTYPE html>
<?php
	session_start();
	if (    isset($_COOKIE['cinema'])   &&    isset($_SESSION['selectedmovie'])   &&   isset($_SESSION['seance'])   &&    isset($_SESSION['dateday'])   &&     isset($_SESSION['dateyear'])   &&     isset($_SESSION['datemonth'])  )
	{
		header('Location: index.php');
		exit();
	}
?>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>The Cinema</title>
	<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div id="header">
	<a href="index.php"><div class="header_selection_logo">Cinemax</div></a>
	<a href="cennik.php"><div class="header_selection">CENNIK</div></a>
	<div class="header_selection">
		<label>Twoje Kino    :</label>
		<select onchange="selectCinema(this.value)">
						
							<?php
							$conn = mysqli_connect('localhost','root','','cinema');
							$ress = mysqli_query($conn,"
							select *
							from `cinema` 
							" );

							while ($rs =mysqli_fetch_assoc($ress) ) {
								if($rs['id']==$_COOKIE["cinema"]){
									echo '<option  value="'.$rs['id'].'" selected="selected"> '.$rs['name'].'  '.$rs['city'].'    '.$rs['adress'].'  </option>';
								}else{
									echo '<option  value="'.$rs['id'].'"> '.$rs['name'].'  '.$rs['city'].'    '.$rs['adress'].'  </option>';
								}
								
							}
							?>
		</select>
	</div>
</div>
<div id="confirmation">
<div class="pricedivider"><h1>Cennik</h1></div>
<div class="pricedivider">Ulgowy : 15zł </div>
<div class="pricedivider">Normalny : 20zł </div>
<div class="pricedivider">Ulgowy 3D : 25zł </div>
<div class="pricedivider">Normalny 3D : 30zł </div>


</div>
</body>
</html>