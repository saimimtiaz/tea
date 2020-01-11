<?php

//if ("POST" == $_SERVER["REQUEST_METHOD"]) {
//    if (isset($_SERVER["HTTP_ORIGIN"])) {
//        $address = "http://".$_SERVER["SERVER_NAME"];
//        if (strpos($address, $_SERVER["HTTP_ORIGIN"]) !== 0) {
//            exit("CSRF protection in POST request: detected invalid Origin header: ".$_SERVER["HTTP_ORIGIN"]);
//        }
//    }
//}
	if(isset($_POST['name']))
	{
		// include Database connection file 
		define('SECURE',1);
		include("db_connection.php");
	
		
    //-------------------- Get User Details ----------------------
    

	
		//date('h:i:s a m/d/Y', strtotime(date('Y-m-d H:i:s')));
		// get values 
		$name = $_POST['name'];	
		$mac = $_POST['mac'];
		$notice = $_POST['notice'];

				
				$query = "INSERT INTO notices (name, mac, notice) VALUES('$name','$mac','$notice')";
				 //$conn->query($query);
				
				
				
				  if ($conn->query($query) === TRUE) {  
					  	
				  }else{

				  echo "Error:  <br>" . $conn->error;
				  }
		  }
			
		
	

?>