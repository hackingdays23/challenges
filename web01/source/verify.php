<?php
session_start();

$login = $_POST['login'];
$password = $_POST['pass'];


if ($login == "admin" && $password == "admin"){
	
	$_SESSION['login'] = $login;
	$_SESSION['pass'] = $pass;
	setrawcookie("data", "ZnV6ei1tZV9mdXp6LW1lX2Z1ei1tZV9mdXp6LW1lCg==");
	header('location:go.php', true, 302);
}

else{
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	echo '<script language="javascript">';
	echo 'alert("Incorrect login or password")';
	echo '</script>';
	header("HTTP/1.0 403 Forbidden");
}

?>
