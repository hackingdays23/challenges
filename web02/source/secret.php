<?php

session_start();

$FLAG = "iFlag{4uth_juggl1ng_lf1_byp4ss}";

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['password']) == true)){
	header('location:restricted.php');
}

$logged = $_SESSION['login'];


if (isset($_GET['q'])){

	$page = $_GET['q'];
}

?>

<html>
	<body>
		<head>
			<link rel="stylesheet" type="text/css" href="css/mystyle.css">
			<title>Secret Area </title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		</head>


		<img src=media/hack01.jpg alt="hacking" class="hack01">
		<hr>


		<p class="hack-text2">SECRET</p>
		<div class=”hack01”>
                        <img src=media/scar01.jpg alt=ifood" class="hack02">
                </div>


		<?php include('menu.php'); ?>

		 <p><font color="red"> <?php  include($page); ?></font></p>
		
			
		

	</body>


</html>
