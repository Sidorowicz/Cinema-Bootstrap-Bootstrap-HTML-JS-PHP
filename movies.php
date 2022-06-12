<!DOCTYPE html>
<?php
	session_start();
	if (    isset($_COOKIE['cinema'])   &&    isset($_SESSION['selectedmovie2'])   &&   isset($_SESSION['seance'])   &&    isset($_SESSION['dateday'])   &&     isset($_SESSION['dateyear'])   &&     isset($_SESSION['datemonth'])  )
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
<script>
        function selectCinema(parameter) {
		document.cookie='cinema='+parameter;
        window.location.reload();
        }
		  function selectSeance(parameter) {
			document.cookie='seance='+parameter;
			document.cookie='selectedmovie='+parameter;
			location.href="conf.php";
        }
		function selectMovies(parameter) {
			document.cookie='selectedmovie2='+parameter;
			location.href="movies.php";
        }
		
	function openForm() {
	  document.getElementById("confirmform").style.display = "block";
	}

	function closeForm() {
	  document.getElementById("confirmform").style.display = "none";
	}
		function selectMovie(parameter) {
			//document.cookie='selectedmovie2='+parameter;
			//location.href="seances.php";
        }
		function changedate(datay,datam,datad) {
		document.cookie='dateday='+datay;
		document.cookie='datemonth='+datam;
		document.cookie='dateyear='+datad;
        window.location.reload();
        }
		
</script>




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


<div id="movieconf">
<?php
$conn = mysqli_connect('localhost','root','','cinema');
$resss = mysqli_query($conn,"
select *
from `movies` 
inner join `directors`
on movies.director = directors.id
inner join `movietypes`
on movies.type= movietypes.id
where movies.id=".$_COOKIE['selectedmovie2']." 
" );
$rss =mysqli_fetch_assoc($resss);
echo '<img id="lastimg" src="'.$rss['imagefull'].'"></img>';
echo '<div id="titleconf")"><h1>'.$rss['title'].'</h1></div><br>';
echo '<div id="genreconf")"><h3>'.$rss['genre'].'</h3></div>';
echo '<div id="timeconf")">Czas trwania : '.$rss['duration'].' min</div>';


echo "</div> <div id='cinemaconf'>




</div>
";
?>
<div id="moviecalendar">
<h2>Seanse w najbliższym czasie</h2>
	<?php
	$conn = mysqli_connect('localhost','root','','cinema');
	$period = new DatePeriod(new DateTime(), new DateInterval('P1D'), 6 );
	foreach ($period as $day)
	{
		$x =$day->format('Y-m-j');
		echo '<div class="cinema2" >';
		
		
		
		
		
								
								
								
			echo '<div class="cinhead">';
switch($days[] = $day->format('D')){
									case "Mon":
										echo  "Poniedziałek  ";
										break;
									case "Tue":
										echo  "Wtorek  ";
										break;
									case "Wed":
										echo  "Sroda  ";
										break;
									case "Thu":
										echo  "Czwartek  ";
										break;
									case "Fri":
										echo  "Piatek  ";
										break;
									case "Sat":
										echo  "Sobota  ";
										break;
									case "Sun":
										echo  "Niedziela  ";
										break;
								}

			echo ''.$x.' </div>';

			
			$day = $day->format('Y-m-d');
			$ressx = mysqli_query($conn,"
			select *
			from seance
			where cinemaId= ".$_COOKIE["cinema"]." and date=' ".$day."' and moveId=".$_COOKIE['selectedmovie2']."
			" );





			if (mysqli_num_rows($ressx)==0) {
				echo '<div class="hour2"> Brak zaplanowanych seansów</div>';
			}
			
			while ($rsx =mysqli_fetch_assoc($ressx)) {

				echo '<a href="#"><div class="hour" onclick="selectSeance('.$rsx['id'].'  , '.$rs['id'].'       )"> '.$rsx['hour'].' </div></a>';
			}
			
			
echo '</div >';
	}

			

			


	
	
	?>
	</div>
	</div>
<div id="footer">
	©Cinemax Projekt P.S. 2021 HTML/CSS/JS/JQuery/SQL/PHP
</div>





























</body>
</html>