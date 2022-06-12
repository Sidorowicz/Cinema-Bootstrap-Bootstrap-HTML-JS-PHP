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

<script>
function dalej()
{
location.href="conf2.php";
}
</script>
<div id="header">
	<a href="index.php"><div class="header_selection_logo">Cinemax</div></a>
	<a href="cennik.php"><div class="header_selection">CENNIK</div></a>
	<div class="header_selection">
		<label>Twoje Kino    :</label>
		<select onchange="selectCinema(this.value)"  disabled>
						
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


<div id="movieconf">
<?php
$conn = mysqli_connect('localhost','root','','cinema');
$resss = mysqli_query($conn,"
select *
from `movies` 
inner join `seance`
on movies.id = seance.moveId
inner join `directors`
on movies.director = directors.id
inner join `movietypes`
on movies.type= movietypes.id
inner join cinema
on seance.cinemaId=cinema.id
where seance.id=".$_COOKIE['seance']." 
" );
$rss =mysqli_fetch_assoc($resss);
echo '<img id="lastimg" alt="x" src="'.$rss['imagefull'].'">';
echo '<div id="titleconf"><h1>'.$rss['title'].'</h1></div><br>';
echo '<div id="genreconf"><h3>'.$rss['genre'].'</h3></div>';
echo '<div id="timeconf">Czas trwania : '.$rss['duration'].' min</div>';


echo "</div> <div id='cinemaconf'>
<h4>Kino: ".$rss['name']." ".$rss['city']." ".$rss['adress']."</h4><br>
<h4>Seans: ".$rss['hour']." ".$rss['date']."</h4>



</div>
<button id='reser' onclick='dalej()'>Zarezerwuj</button>

</div>";
?>
<div id="footer">
	©Cinemax Projekt P.S. 2021 HTML/CSS/JS/JQuery/SQL/PHP
</div>





























</body>
</html>