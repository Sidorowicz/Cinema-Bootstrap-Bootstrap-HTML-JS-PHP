
<!DOCTYPE html>
<html lang="pl">

<?php
	session_start();
	if (    !isset($_COOKIE['cinema'])   ||    !isset($_COOKIE['dateday'])   ||     !isset($_COOKIE['dateyear'])   ||     !isset($_COOKIE['datemonth'])  )
	{
		header('Location: index.php');
		exit();
	}
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
		if ($_SESSION['type']==2)
	{
		header('Location: admin.php');
		exit();
	}
	if ($_SESSION['type']==3)
	{
		header('Location: menager.php');
		exit();
	}
?>
<head >

<meta charset="utf-8">
<title>Page Title</title>
<link rel="stylesheet" type="text/css" href="style.css">

<script>
		  function selectSeance(parameter) {
			document.cookie='seance='+parameter;
			document.cookie='selectedmovie='+parameter;
			location.href="conf.php";
        }
		function selectMovies(parameter) {
			document.cookie='selectedmovie2='+parameter;
			location.href="movies.php";
        }

</script>
</head>
<body>
<main>
				<iframe id="empframe" name="empframe" src="gensen.php">
				</iframe>
				<div class="formeu">	
		<form action="payreser.php" method="post"  target="consoleframe">
			<label>Opłać rezerwacje</label><br>
			<input type="text" placeholder="Kod rezerwacji" name="payreser" id="payreser" required><br>
			<button>Zmień stan rezerwacji</button>
		</form><br><br>
	</div>
	<div class="formeu">	
		
		<?php
		echo "Pracownik: ".$_SESSION['login']."<br> ";
		?>
		<a href="logout.php">Wyloguj się!</a>
	</div>
</main>




	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="js/bootstrap.min.js"></script>

</body>
</html>