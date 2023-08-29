<?php

ini_set('display_errors', '1');

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['pass']) == true)){
	unset($_SESSION['login']);
	unset($_SESSION['pass']);
	header("HTTP/1.0 403 Forbidden");
	echo '<script> window.location.href="/login.html"</script>';
	exit();
}

?>

<?php

$logged = $_SESSION['login'];

class Master{
	
	private $id;
	private $host;
	
	
	public function __wakeup(){
		if (isset($this->id)) eval($this->id);
	}

	public function setHost($value){
		$this->host = $value;
	}

       
	public function getCookie(){
		return $this->cookie;
	}

	public function getHost(){
		return system('ping -w3'.' '.escapeshellarg($this->host));
				
	}
}


$p1 = new Master;

$p1->setHost($_POST['host']);

//echo $p1->getHost();

$user_data = unserialize($_COOKIE['data']);

$error =  ini_set('display_errors', '1');

if ($error == 1){
	echo var_dump($p1);
}

?>

<html>
        <head>
		<title> Connection test </title>
		<h1> Hello, <?php echo $logged;?> </h1>
        </head>

        <body>
                <form action="" method="post">
                        <label for="host">Host:</label><br>
                        <input type="text" id="host" name="host"><br>
			<input type="submit" value="Submit">
		</form>

		<p> <?php echo $p1->getHost();?></p>
	</body>
</html>

