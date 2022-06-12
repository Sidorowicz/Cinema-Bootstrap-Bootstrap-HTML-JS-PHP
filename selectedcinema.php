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
function selectMovieHour(parameter1,parameter2) {
document.cookie='movieid='+parameter1;
document.cookie='seanceid='+parameter2;

//location.href="seances.php";
}
    </script>




<div class="calendar">
<?php
$days  ;
$period = new DatePeriod(new DateTime(), new DateInterval('P1D'), 6 );
foreach ($period as $day)
{
    $days= $day->format('D');
    $dayss= $day->format('jS');
	echo	"<div class='days'>".$days." ".$dayss."</div>";
}
?>
</div>





<div class="calendar">
<?php
$conn = mysqli_connect('localhost','root','','cinema');
$ress = mysqli_query($conn,"
select *
from `movies`
where ongoing=1 
" );
$i=0;




while ($rs =mysqli_fetch_assoc($ress)) {
	
	echo '<div class="movie"> '.$rs['title'].' </div>';
	//$b = date('Y-m-d');
	$b = date('2021-11-20');


	
	$resss = mysqli_query($conn,"
	select *
	from `seance` 
	where moveId='".$rs['id']."' and cinemaId='".$_COOKIE["cinema"]."' and date='".$b."'
	" );
	echo '<div class="hours">';


	if (mysqli_num_rows($resss)==0) { 
	
		echo '<div class="hour"> No seances planned</div>';
	
	}
	while ($rsx =mysqli_fetch_assoc($resss)) {
		
		echo '<div class="hour" onclick="selectMovieHour('.$rs['id'].' , '.$rsx['id'].' )"> '.$rsx['hour'].' </div>';

	}

	echo '</div>';
}
?>
</div>














</body>
</html>