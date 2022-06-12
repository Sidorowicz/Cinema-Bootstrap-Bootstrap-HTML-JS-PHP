<?php
$conn = mysqli_connect('localhost','root','','cinema');
$a = $_POST['payreser'];
if($_POST['payreser']!=NULL){
	$ide = mysqli_query($conn,
	"select *
	from reservations
	where userId='".$a."'
	");
	$genre_id=mysqli_fetch_assoc($ide);
	if($genre_id['id']!=0){
		$ide = mysqli_query($conn,
		"select *
		from reservations
		where userId='".$a."'
		");
		$genre_id=mysqli_fetch_assoc($ide);
		if($genre_id['paid']==0){
			$ide = mysqli_query($conn,
			"update reservations
			set paid= 1
			where userId='".$a."'
			");
			
			
			
			$ide = mysqli_query($conn,
			"select *
			from seance
			inner join hall
			on seance.hallID = hall.id
            inner join reservations
            on reservations.seance = seance.id
			where userId= '".$a."'
			");
			$genre_id=mysqli_fetch_assoc($ide);
			echo "Opłacono. Numer sali : ".$genre_id['number'].""; 
			
			
		}else{
			$ide = mysqli_query($conn,
			"select *
			from seance
			inner join hall
			on seance.hallID = hall.id
            inner join reservations
            on reservations.seance = seance.id
			where userId= '".$a."'
			");
			$genre_id=mysqli_fetch_assoc($ide);
			echo "Rezerwacja została wcześniej opłacona. Numer sali : ".$genre_id['number']."";
		}
	}else{
		echo "Brak rezerwacji o podanym kodzie w bazie danych";
	}
}
?>