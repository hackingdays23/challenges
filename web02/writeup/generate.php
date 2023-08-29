<?php

$n = 20; 
$findstring   = '0e';

while(true){

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
                $index = rand(0, strlen($characters) - 1);

                $randomString .= $characters[$index];
        }

        #echo $randomString;

	$value = hash("sha256", $randomString);

	$piece = substr($value, 0, 2);
	$piece2 = substr($value, 0, 8);

	$pos =  strpos($piece, $findstring) ;

	if ($pos !== false) {
	
		
		echo $randomString;
		echo "\n" ;
		echo $value;
		echo "\n";
	 	var_dump($piece2 ==  "0e625161");
		break;

	}

        

}


?>

