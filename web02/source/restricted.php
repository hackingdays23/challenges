<html>
	<body>
		<head>
			<link rel="stylesheet" type="text/css" href="css/mystyle.css">
			<title>Restricted Area </title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		</head>


		<img src=media/hack01.jpg alt="hacking" class="hack01">
		<hr>


		<p class="hack-text2">Members Only</p>

		<?php include('menu.php'); ?> 

		<div class="restricted"> 
			<form action="/validation.php" method="POST">
				<input type="text" id="login" name="login" placeholder="Login">
				<br/>
				<input type="password" id="password" name="password" placeholder="Password">
				</br>
				<input type="submit" value="Submit">
			</form>
		</div>

<!--
session_start();

$login = $_POST['login'];
$password = $_POST['password'];

$db = substr("0e625161f2ea214fe730487f0665539c6683d12e5f69c16f20ab65dd1ef1f907", 0, 8);

if ($login == "admin" && substr(hash("sha256", $password), 0, 8) == $db){
	
	$_SESSION['login'] = $login;
	$_SESSION['senha'] = $senha;
        header("Location: secret.php", true, 301);
        exit();


}

else {

        header("HTTP/1.0 403 Invalid Credentials");
        echo '<script>alert("Wrong login or password");</script>';
        echo '<script language="javascript">';
        echo "window.setTimeout(function() {
        window.location.href = 'restricted.php';
        }, 00000);";
        echo '</script>';


}

-->

	</body>


</html>
