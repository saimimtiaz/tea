<?php

if ("POST" == $_SERVER["REQUEST_METHOD"]) {
    if (isset($_SERVER["HTTP_ORIGIN"])) {
        $address = "http://".$_SERVER["SERVER_NAME"];
        if (strpos($address, $_SERVER["HTTP_ORIGIN"]) !== 0) {
            exit("CSRF protection in POST request: detected invalid Origin header: ".$_SERVER["HTTP_ORIGIN"]);
        }
    }
}


	if(isset($_POST['name']))
	{
		$card_value = 100;
		// include Database connection file 
		define('SECURE',1);
		include("db_connection.php");
        require('balance.php');
        
        $name = $_POST['name'];
		$card = $_POST['card'];
		$mac = $_POST['mac'];
		$mac= mysql_real_escape_string($mac);
		$mac = stripslashes($mac);
        $mac = str_replace(' ', '', $mac);
//		echo $mac;
//		echo $name;
//		die;
        
     	$query = "SELECT * FROM cards  WHERE number = '$card' AND status = '1' ";  
       
        
			$result = $conn->query(($query));
//		echo $result->num_rows;
//		die;
		
		//if card is valid 
			if($result->num_rows > 0){
           
          // -----------------Check if the user already exist in user table-------------------------- 
			$query = "SELECT * FROM users  WHERE mac = '$mac' ";  
				//echo $query;
			$result = $conn->query(($query));
				//echo $result->num_rows;
				//die;
				if($result->num_rows > 0){
					//echo"<pre>";	
					//print_r ($result->fetch_assoc());
					//die();
				 $old_bal = $result->fetch_assoc()['balance'];

				}
				//echo $old_bal;
				
				$sql = "UPDATE `users` SET balance = $old_bal + $card_value  WHERE `mac` = '$mac'";
				
			if ($conn->query($sql) === TRUE){
		$nameMac = "$name| $mac |";
		$cardStatus = "UPDATE `cards` SET status ='0', name ='$nameMac'  WHERE `number` = '$card'";
				if ($conn->query($cardStatus) === TRUE){
					echo "Your Account is loaded with $card_value";
				}else{
				echo mysqli_error($conn);
				}
			}else{
			echo mysqli_error($conn);
			}
				
				
           //-------------------------------------------------- 
				
				
				
            }else{
				//------------------------if Card already used-------------------------- 
			$query = "SELECT * FROM cards  WHERE number = '$card' AND status = '0' ";  	
			$result = $conn->query(($query));
				if($result->num_rows > 0){
				//	echo"<pre>";
					$name = $result->fetch_array()['3'];
				echo"This card was already used by $name";
			die;
				}else{
				
				
				echo"Your Card is invalid";
				
				}
				
			}
        
    }


?>


