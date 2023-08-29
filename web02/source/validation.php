<?php

session_start();

$login = $_POST['login'];
$password = $_POST['password'];

$db = substr("0e625161f2ea214fe730487f0665539c6683d12e5f69c16f20ab65dd1ef1f907", 0, 8);

if ($login == "admin" && substr(hash("sha256", $password), 0, 8) == $db){

	$_SESSION['login'] = $login;
	$_SESSION['senha'] = $password;
        header("Location: secret.php?q=page1", true, 301);
	exit();

  
}

else {

	header("HTTP/1.0 403 Invalid Credentials");
	unset ($_SESSION['login']);
	unset ($_SESSION['password']);
	echo '<script>alert("Wrong login or password");</script>';
	echo '<script language="javascript">';
	echo "window.setTimeout(function() {
    	window.location.href = 'restricted.php';
	}, 00000);";
	echo '</script>';
	

}

?>
