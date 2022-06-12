<!DOCTYPE html>
<?php
	session_start();
	if (    !isset($_COOKIE['cinema'])     ||    !isset($_COOKIE['dateday'])   ||     !isset($_COOKIE['dateyear'])   ||     !isset($_COOKIE['datemonth'])  )
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
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<script src="jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){	

document.addEventListener("keydown", function(event) {
    if (event.altKey && (event.key === 'x' || event.key === 'X'))
    {
        location.href="log.php";
        event.preventDefault();
    }
});
		var a= $( ".news_smaller" ).html(  );
		var img= $(".news_smaller").css("background-image");
		$("#news_big").css("background-image",  img);
		document.getElementById("news_big").innerHTML =a;

	$(".news_smaller").click(function(){
		var a= $( this ).html(  );
		var img= $(this).css("background-image");
		$("#news_big").css("background-image",  img );
		document.getElementById("news_big").innerHTML =a;
	});
	

});

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
<div id="news">
	<div id="news_big"></div>
	<div id="news_small">
							<?php
							$conn = mysqli_connect('localhost','root','','cinema');
							$resss = mysqli_query($conn,"
							select *
							from `movies` 
							where ongoing > 0
							order by id desc
							" );
							for($i=0;$i<3;$i++){
								$rss =mysqli_fetch_assoc($resss);
									echo '<div class="news_smaller" style="background-image:url('.$rss['image'].')">
									<div class="premiera">Premiera</div><div class="imgtext">'.$rss['title'].'</div>
									</div>';
							}
							?>

	</div>
</div>
<div id="boxunderline"></div>
<div id="movieselection">
	<div id="selectioninfo">
		<div class="selectmore">
							Repertuar | 
							<?php
							$today = date("D j M | ");
							echo $_COOKIE['dateday'].".".$_COOKIE['datemonth']." | ";
							$conn = mysqli_connect('localhost','root','','cinema');
							$re = mysqli_query($conn,"
							select *
							from `cinema` 
							where id='".$_COOKIE["cinema"]."'
							" );
							$rs =mysqli_fetch_assoc($re);
							echo $rs['name'].'  '.$rs['city'].'    '.$rs['adress'];

							?>
		</div>
		<div class="selectmore">
							
							<?php
							$days   = [];
							$period = new DatePeriod(new DateTime(), new DateInterval('P1D'), 6 );
							foreach ($period as $day)
							{
								switch($days[] = $day->format('D')){
									case "Mon":
										echo  "<div class='dayselection' onclick='changedate(".$day->format('j').",".$day->format('m').",".$day->format('Y').")'>Pon<br> ".$days[] = $day->format('j ');
									break;
									case "Tue":
										echo  "<div class='dayselection' onclick='changedate(".$day->format('j').",".$day->format('m').",".$day->format('Y').")'>Wt<br> ".$days[] = $day->format('j ');
									break;
									case "Wed":
										echo  "<div class='dayselection' onclick='changedate(".$day->format('j').",".$day->format('m').",".$day->format('Y').")'>Sr<br> ".$days[] = $day->format('j ');
									break;
									case "Thu":
										echo  "<div class='dayselection' onclick='changedate(".$day->format('j').",".$day->format('m').",".$day->format('Y').")'>Czw<br> ".$days[] = $day->format('j ');
									break;
									case "Fri":
										echo  "<div class='dayselection' onclick='changedate(".$day->format('j').",".$day->format('m').",".$day->format('Y').")'>Pt<br> ".$days[] = $day->format('j ');
									break;
									case "Sat":
										echo  "<div class='dayselection' onclick='changedate(".$day->format('j').",".$day->format('m').",".$day->format('Y').")'>Sob<br> ".$days[] = $day->format('j ');
									break;
									case "Sun":
										echo  "<div class='dayselection' onclick='changedate(".$day->format('j').",".$day->format('m').",".$day->format('Y').")'>Nie<br> ".$days[] = $day->format('j ');
									break;
								}
								switch($days[] = $day->format('M')){
								case "Jan":
								echo "<br>STY</div>";
								break;
								
								case "Feb":
								echo "<br>LUT</div>";
								break;
								
								case "Mar":
								echo "<br>MAR</div>";
								break;
								
								case "Apr":
								echo "<br>KWI</div>";
								break;
								
								case "May":
								echo "<br>MAJ</div>";
								break;
								
								case "Jun":
								echo "<br>CZE</div>";
								break;
								
								case "Jul":
								echo "<br>LIP</div>";
								break;
								
								case "Aug":
								echo "<br>SIE</div>";
								break;
								
								case "Sep":
								echo "<br>WRZ</div>";
								break;
								
								case "Oct":
								echo "<br>PAZ</div>";
								break;
								
								case "Nov":
								echo "<br>LIS</div>";
								break;
								
								case "Dec":
								echo "<br>GRU</div>";
								break;
								
								
								
								}
								
							   
							}
							?>
		</div>
	</div>
	

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
		echo '<div class="cinema" >    <div class="titlec" onclick="selectMovies('.$rs['id'].')"> '.$rs['title'].'</div>';
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



</div>

<div id="footer">
	©Cinemax Projekt P.S. 2021 HTML/CSS/JS/JQuery/SQL/PHP
</div>





























</body>
</html>