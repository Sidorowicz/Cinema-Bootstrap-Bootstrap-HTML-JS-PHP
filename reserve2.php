
<?php
$conn = mysqli_connect('localhost','root','','cinema');
$a = $_POST['arr'];
$b= $_POST['tickets'];
$a=explode(",",$a++);
$b=explode(" ",$b++);

$p=0;
foreach($b as $value){
	if($value == 2){
		$p+=20;
	}
	if($value == 1){
		$p+=15;
	}
	
	
}

function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$code = generate_string($permitted_chars, 8);


$insert = 
"insert into reservations
values ('','".$_COOKIE['seance']."','".$code."',".$p.",'true')
";
$execute_insert_note = mysqli_query($conn, $insert);
$id = $conn->insert_id;

foreach($a as $value){
	mysqli_query($conn,"
	insert into seatseance
	values('".$_COOKIE['seance']."','".$value."',".$id.")
	");
	

	
}
$ress = mysqli_query($conn,"
							select userId
							from reservations 
							where id =".$id."
							" );
$rs =mysqli_fetch_assoc($ress);

setcookie('code', $rs['userId'], time() + (86400 * 30), "/");

header('Location: gensen.php');
exit();
?>