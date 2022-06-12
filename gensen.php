<!DOCTYPE html>
<?php

?>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>The Cinema</title>
	<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<main>
<script>
        function selectCinema(parameter) {
		document.cookie='cinema='+parameter;
        window.location.reload();
        }
		  function selectSeance(parameter) {
			document.cookie='seance='+parameter;
			document.cookie='selectedmovie='+parameter;
			location.href="genhall.php";
        }

		
	function openForm() {
	  document.getElementById("confirmform").style.display = "block";
	}

	function closeForm() {
	  document.getElementById("confirmform").style.display = "none";
	}
		function selectMovie(parameter) {
			//document.cookie='selectedmovie='+parameter;
			//location.href="seances.php";
        }
		function changedate(datay,datam,datad) {
		document.cookie='dateday='+datay;
		document.cookie='datemonth='+datam;
		document.cookie='dateyear='+datad;
        window.location.reload();
		
        }
</script>
	<div id="moviecalendar">
	<?php
	$conn = mysqli_connect('localhost','root','','cinema');
	$ddate = ' '.$_COOKIE['dateyear'].'-'.$_COOKIE['datemonth'].'-'.$_COOKIE['dateday'].' '	;
	
	echo "<script>console.log('Debug Objects: " . $ddate. "' );</script>";
	

	$ress = mysqli_query($conn,"
	select movies.title, movies.id
	from movies

	where movies.ongoing > 0 

	" );

	while ($rs =mysqli_fetch_assoc($ress)) {
		echo '<div class="cinema" >    <div class="titlec" > '.$rs['title'].'</div>';
			$ressx = mysqli_query($conn,"
			select *
			from seance
			where cinemaId=".$_COOKIE["cinema"]." and moveId=".$rs['id']." and seance.date = '".$ddate."'
			" );
			
			if (mysqli_num_rows($ressx)==0) {
				echo '<div class="hour2"> Brak zaplanowanych seansów</div>';
			}else{
			while ($rsx =mysqli_fetch_assoc($ressx)) {
				
				echo '<a href="#"><div class="hour" onclick="selectSeance('.$rsx['id'].'  , '.$rs['id'].'       )"> '.$rsx['hour'].' </div></a>';
			}
			
			}
			
		echo '</div>';
	}
	?>
	</div>
</main>
</body>
</html>