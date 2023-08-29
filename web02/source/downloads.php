<?php

if (isset($_GET['file'])){

	$page = $_GET['file'];
}

?>

<html>
	<body>
		<head>
			<link rel="stylesheet" type="text/css" href="css/mystyle.css">
			<title>Restricted Area </title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		</head>


		<img src=media/hack01.jpg alt="hacking" class="hack01">
		<hr>


		<p class="hack-text2">H4ck Downloads</p>
		<center><a href="/downloads/subseven.zip" style="color:red;">SubSeven</a></center>

		<?php include('menu.php'); ?>

		 <p><font color="red"> <?php /* include($page); */ ?></font></p>
		
			
		

	</body>


</html>
