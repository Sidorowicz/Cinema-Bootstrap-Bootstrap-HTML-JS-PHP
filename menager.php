
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
	if ($_SESSION['type']==1)
	{
		header('Location: logged.php');
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
		
		<?php
		echo "Menager: ".$_SESSION['login']."<br> ";
		?>
		<a href="logout.php">Wyloguj się!</a>
	</div>
		<div class="formeu">	
		<form action="payreser.php" method="post"  target="payf">
			<label>Opłać rezerwacje</label><br>
			<input type="text" placeholder="Kod rezerwacji" name="payreser" id="payreser" required><br>
			<button>Zmień stan rezerwacji</button>
		</form>
		</div>
		
		<div class="formeu">	
		<form action="addSeance.php" method="post" target="payf">
			<label>Admin+Menedżer/Dodawanie seansów do repertuaru sieci</label><br>
			<input type="text" placeholder="id filmu" id="aS1" name="aS1" required><br>
			<input type="text" placeholder="data( YYYY-MM-DD )" id="aS2" name="aS2" required><br>
			<input type="text" placeholder="godzina( HH:MM )" id="aS3" name="aS3" required><br>
			<input type="text" placeholder="id kina" id="aS4" name="aS4" required><br>
			<input type="text" placeholder="id hali" name="aS5" id="aS5" required><br>
			<button type="submit" >Dodaj Seans</button>
		</form><br><br>
	</div>
	<div class="formeu">	
		<form action="addUser.php" method="post"  target="payf"><br>
			<label>Admin/dodawanie użytkowników</label><br>
			<input type="text" placeholder="login" name="usern" id="usern" required><br>
			<input type="password" placeholder="haslo" name="passn" id="passn" required><br>
			<input type="number" placeholder="1-usr 3-menager" name="tn" id="tn" required><br>
			<button type="submit" >Dodaj użytkownika</button>
		</form><br><br>
	</div>
		<iframe id="payf" name="payf" >
		</iframe>
	
	
</main>




	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="js/bootstrap.min.js"></script>

</body>
</html>