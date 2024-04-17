<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

$username = &$_POST ["username"];
$email = &$_POST ["email"];
$user_id=&$_SESSION["user_id"];


include("connect.php");
if($username!="" && $email!="" && $user_id!="") {
	$strSQL1="UPDATE пользователи SET username='".$username."', email='".$email."' WHERE user_id ='".$user_id."'";
	$result1=$mysqli->query($strSQL1) or die("Не могу выполнить запрос!");
	$_SESSION["username"]=$username;

	mysqli_close($mysqli);
	// обновили значение сеансовой переменной

	header("Location: cabinet.php?success=7");
	exit();
}	else {
	header("Location: cabinet.php?success=8");
	exit();
	
}

?>
