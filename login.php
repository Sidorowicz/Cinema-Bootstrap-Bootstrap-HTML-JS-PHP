<?php

	session_start();
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: index.php');
		exit();
	}
$polaczenie = mysqli_connect('localhost','root','','cinema');
	if ($polaczenie->connect_errno!=0)
	{
		echo "Er: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$password = $_POST['haslo'];
		//$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		//$password = htmlentities($password, ENT_QUOTES, "UTF-8");
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM users WHERE login='%s' AND password='%s'",
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$password))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;
				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['id'] = $wiersz['id'];
				$_SESSION['login'] = $wiersz['login'];
				$_SESSION['email'] = $wiersz['email'];
				$_SESSION['type'] = $wiersz['type'];
				
				unset($_SESSION['blad']);
				$rezultat->free_result();
				header('Location: logged.php');
			} else {
				header('Location: index.php');
			}
		}
		$polaczenie->close();
	}
	
?>