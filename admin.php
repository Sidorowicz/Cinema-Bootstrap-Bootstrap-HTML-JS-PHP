<!DOCTYPE html>
<html lang="pl">
<head >
<?php
//START SESJI
	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: log.php');
		exit();
	}

	if ($_SESSION['type']!=2)
	{
		header('Location: logged.php');
		exit();
	}
?>
<meta charset="utf-8">
<title>Page Title</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<script src="jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
	
	const seats = new Array();
	var ele = document.getElementsByClassName("seat");

	
	function removeItemOnce(arr, value) {
		 var index = arr.indexOf(value);
			arr.splice(index, 1);
		  return arr;
	}
	
	function uniq(a) {
		return a.sort().filter(
			function(item, pos, ary) {
				return !pos || item != ary[pos - 1];
			}	
		);
	}
		
	$(".seat").click(function(){
		var reserve = $( this ).html(  );
		if($(this).css("background-color")=="rgb(220, 20, 60)"){
			removeItemOnce(seats,reserve);
			$( this ).css("background-color","white");
			document.getElementById("test").innerHTML = uniq(seats);
			$('#array').val(uniq(seats));
		}else{
			seats.push(reserve);	
			$( this ).css("background-color","Crimson");
			document.getElementById("test").innerHTML = uniq(seats);
			$('#array').val(uniq(seats));
		}
	});
});
</script>
</head>
<body>
<div id="formes">
	<div class="formesin">	
		<form action="payreser.php" method="post"  target="consoleframe"><br><br><br>
			<label>Opłać rezerwacje</label><br><br>
			<input type="text" placeholder="Kod rezerwacji" name="payreser" id="payreser" required><br><br>
			<button>Zmień stan rezerwacji</button>
		</form><br><br>
	</div>
	<div class="formesin">	
		<form action="clearseanse.php" method="post" target="consoleframe"><br><br>
			<label>Usuń rozpoczęte seanse</label><br><br>
			<input type="text" placeholder="Id kina" name="clears" id="clears" required><br><br>
			<button>Wyczyść ukończone seanse</button>
		</form><br><br>
	</div>
	<div class="formesin">	
		<form action="addSeance.php" method="post" target="consoleframe"><br><br>
			<label>Dodawanie seansów do repertuaru sieci</label><br><br>
			<input type="text" placeholder="id filmu" id="aS1" name="aS1" required><br>
			<input type="text" placeholder="data( YYYY-MM-DD )" id="aS2" name="aS2" required><br>
			<input type="text" placeholder="godzina( HH:MM )" id="aS3" name="aS3" required><br>
			<input type="text" placeholder="id kina" id="aS4" name="aS4" required><br>
			<input type="text" placeholder="id hali" name="aS5" id="aS5" required><br><br>
			<button type="submit" >Dodaj Seans</button>
		</form><br><br>
	</div>
	<div class="formesin">	
		<form action="addDirector.php" method="post" target="consoleframe"><br><br>
			<label>Dodawanie reżyserów</label><br><br>
			<input type="text" placeholder="imie reżysera" name="namer" id="namer" required><br>
			<input type="text" placeholder="nazwisko reżysera" name="sname" id="sname" required><br><br>
			<button type="submit" >Dodaj Reżysera</button>
		</form><br><br>
	</div>
	<div class="formesin">	
		<form action="addGenre.php" method="post" target="consoleframe"><br><br>
			<label>Dodawanie gatunków filmów</label><br><br>
			<input type="text" placeholder="gatunek" id="gn" name="gn" required><br><br>
			<button type="submit" >Dodaj Gatunek</button>
		</form><br><br>
	</div>
	<div class="formesin">	
		<form action="addMovie.php" method="post" target="consoleframe"><br><br>
			<label>Dodawanie filmów do repertuaru sieci</label><br><br>
			<input type="text" placeholder="tytuł" name="title" id="title" required><br>
			<input type="text" placeholder="imie reżysera" name="directorname" id="directorname" required><br>
			<input type="text" placeholder="nazwisko reżysera" name="directorsname" id="directorsname" required><br>
			<input type="text" placeholder="gatunek" name="genre" id="genre" required><br>
			<input type="text" placeholder="długość w minutach" name="duration" id="duration" required><br><br>
			<button type="submit" >Dodaj Film</button>
		</form><br><br>
	</div>
	<div class="formesin" >	
		<form action="addCinema.php" method="post" target="consoleframe"><br><br>
			<label>Dodawanie nowych kin</label><br><br>
			<input type="text" placeholder="nazwa" name="name" id="name" required><br>
			<input type="text" placeholder="miasto" name="city" id="city" required><br>
			<input type="text" placeholder="adres" name="adres" id="adres" required><br><br>
			<button type="submit" >Dodaj Kino</button>
		</form><br><br>
	</div>
	<div class="formesin">	
		<form action="addHall.php" method="post"  target="consoleframe"><br><br>
			<label>Dodawanie nowych sal kinowych</label><br><br>
			<input type="number" placeholder="id kina" name="cinema" id="cinema" required><br>
			<input type="text" placeholder="lewe/prawe skrzydło (L/R)" name="wing" id="wing" required><br><br>
			<button type="submit" >Dodaj Sale</button>
		</form><br><br>
	</div>
	<div class="formesin">	
		<form action="addUser.php" method="post"  target="consoleframe"><br><br>
			<label>Dodawanie użytkowników</label><br><br>
			<input type="text" placeholder="login" name="usern" id="usern" required><br>
			<input type="password" placeholder="haslo" name="passn" id="passn" required><br>
			<input type="number" placeholder="1-usr 2-admin 3-menager" name="tn" id="tn" required><br><br>
			<button type="submit" >Dodaj użytkownika</button>
		</form><br><br>
	</div>

	


</div>









<div id="iframes">
<!--
<form action="execsql.php" method="post" target="consoleframe">
<input type="text" id="sqlt" name="sqlt" placeholder="SELECT * FROM .....">
<button type="submit" >Wykonaj</button>
</form>
-->
<a href="logout.php">Wyloguj się!</a> 
<iframe id="frame" name="consoleframe">

</iframe>

<div class="formesin">	
	<form action="printCinemas.php" method="post" target="consoleframe">
		<button type="submit" >Wypisz       kina</button>
	</form><br>
	<form action="printDirectors.php" method="post" target="consoleframe">
		<button type="submit" >Wypisz Reżyserów</button>
	</form><br>
	<form action="printGenres.php" method="post" target="consoleframe">
		<button type="submit" >Wypisz Gatunki</button>
	</form><br>
	<form action="printHalls.php" method="post" target="consoleframe">
		<button type="submit" >Wypisz Hale</button>
	</form><br>
	<form action="printmovies.php" method="post" target="consoleframe">
		<button type="submit" >Wypisz Filmy</button>
	</form><br>
</div>
<!--
<form action="findm.php" method="post" target="consoleframe">
		<input type="text" placeholder="Coś o filmie" name="tip" id="tip" required><br>
		<button type="submit" >Wypisz Filmy</button>
</form>

-->


</div>


</body>
</html>

<!--


<div id="movieselector">
/*
<?php
$conn = mysqli_connect('localhost','root','','cinema');
$ress = mysqli_query($conn,
"
select * 
from movies
"
);
$ressx = mysqli_query($conn,
"
select * 
from directors
"
);


while ($rs =mysqli_fetch_assoc($ress)) {
echo '<form action="editmovie.php" method="post">';
echo '<label>Tytuł</label>';
echo '<input type="text" name="title" id="title" value="'.$rs['title'].'" required>';

echo '<label>Director</label>';
echo'<select name="director" id="director" required>';
while ($rsx =mysqli_fetch_assoc($ressx)) {
echo'<option value="'.$rsx['id'].'">'.$rsx['name'].'</option>';
}
echo'<select>';


echo '<label>Type</label>';
echo '<input type="number" name="title" class="title" value="'.$rs['title'].'">';

echo '<label>Tytuł</label>';
echo '<input type="text" name="title" id="title" value="'.$rs['title'].'">';

echo '<label>Tytuł</label>';
echo '<input type="text" name="title" id="title" value="'.$rs['title'].'">';
echo '</form>';
}
?>
*/
</div>

-->