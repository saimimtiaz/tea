<?php

if ("POST" == $_SERVER["REQUEST_METHOD"]) {
    if (isset($_SERVER["HTTP_ORIGIN"])) {
        $address = "http://".$_SERVER["SERVER_NAME"];
        if (strpos($address, $_SERVER["HTTP_ORIGIN"]) !== 0) {
            exit("CSRF protection in POST request: detected invalid Origin header: ".$_SERVER["HTTP_ORIGIN"]);
        }
    }
}
	
		// include Database connection file 
		define('SECURE',1);
		include("db_connection.php");
	if(isset($_POST['name']))
	{

		$name = $_POST['name'];	
		$mac = $_POST['mac'];
		$notice = $_POST['notice'];

    $s      = "SELECT * FROM notices WHERE mac = '$mac' AND notice = '$notice'";
		
	$result = $conn->query($s);
 if ($result->num_rows > 0) {
 echo "viewed";
 
 }
        
    }

?>