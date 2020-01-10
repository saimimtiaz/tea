<?php
session_start();
function verifyFormToken($form) {
//      echo $_SESSION[$form.'_token'];
    // check if a session is started and a token is transmitted, if not return an error
	if(!isset($_SESSION[$form.'_token'])) { 
    
		return false;
    }
	
	// check if the form is sent with token in it
	if(!isset($_POST['token'])) {
		return false;
    }
	
	// compare the tokens against each other if they are still the same
	if ($_SESSION[$form.'_token'] !== $_POST['token']) {
		return false;
    }
	
	return true;
}


function cleantohtml($s){
		// Restores the added slashes (ie.: " I\'m John " for security in output, and escapes them in htmlentities(ie.:  &quot; etc.)
		// It preserves any <html> tags in that they are encoded aswell (like &lt;html&gt;)
		// As an extra security, if people would try to inject tags that would become tags after stripping away bad characters,
		// we do still strip tags but only after htmlentities, so any genuine code examples will stay
		// Use: For input fields that may contain html, like a textarea
		return strip_tags(htmlentities(trim(stripslashes($s))), ENT_NOQUOTES, "UTF-8");
}
//||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

if (verifyFormToken('signup')) {

   // ... more security testing
   // if pass, send email

	//checking
	
	$whitelist = array('full_name','location','gender','name','age','company','id_card','position','token','email','phone','mac','space','biometrics_id','Sign_Up');

// *********************Building an array with the $_POST-superglobal 
	
	foreach ($_POST as $key=>$item) {
        
        // Check if the value $key (fieldname from $_POST) can be found in the whitelisting array, if not, die with a short message to the hacker
		if (!in_array($key, $whitelist)) {
			echo $key."<br>";
			writeLog('Unknown form fields');
			die("Hack-Attempt detected. Please use only the fields in the form");
			
			}
	}
	
//******************************************************************
	
	if ("POST" == $_SERVER["REQUEST_METHOD"]) {
    if (isset($_SERVER["HTTP_ORIGIN"])) {
        $address = "http://".$_SERVER["SERVER_NAME"];
        if (strpos($address, $_SERVER["HTTP_ORIGIN"]) !== 0) {
            writeLog('CSRF protection in POST request: detected invalid Origin header:');
			exit("CSRF protection in POST request: detected invalid Origin header: ".$_SERVER["HTTP_ORIGIN"]);
        }
    }
}
	
//******************************************************************
//echo"<pre>";
	
//	print_r($_POST);
//	echo $_POST['name'];
//	die;
	
	//**************************Connecting with Database ****************************************

	define('SECURE',1);
	include("ajax/db_connection.php");
	//******************************************************************
	
$name = stripcleantohtml($_POST['name']);
$full_name = stripcleantohtml($_POST['full_name']);
$location = stripcleantohtml($_POST['location']);
$token = stripcleantohtml($_POST['token']);
$email = stripcleantohtml($_POST['email']);
$phone = stripcleantohtml($_POST['phone']);
$mac = stripcleantohtml($_POST['mac']);
$gender = stripcleantohtml($_POST['gender']);
$age = stripcleantohtml($_POST['age']);
$company = stripcleantohtml($_POST['company']);
$position = stripcleantohtml($_POST['position']);
$id_card = stripcleantohtml($_POST['id_card']);
$biometrics_id = stripcleantohtml($_POST['biometrics_id']);
$space = stripcleantohtml($_POST['space']);
	
	
	
	
	

//*************************** Update OR Insert Record *******************************
$query_for_mac = "SELECT mac FROM users WHERE mac = '$mac'";
$result = $conn->query($query_for_mac);
    
	if ($result->num_rows > 0) {
     	
$query = "UPDATE `users` SET `name` = '$name', `full_name`= '$full_name', `position` = '$position', `location` = '$location' , `id_card`= '$id_card' , `gender` = '$gender', `age` = '$age', `company`= '$company' ,`biometrics_id` = '$biometrics_id', `token`= '$token',`space`= '$space',`check`= 1 , `phone`= '$phone',`email`= '$email'  WHERE mac = '$mac'; ";
   

   
     }else{
	
	$query = "INSERT INTO `users` (`id`, `name`, `full_name`, `mac`, `position`, `balance`, `location`, `id_card`, `gender`, `age`, `company`,`biometrics_id`, `token`,`space`,`check`,`phone`,`email`) VALUES (NULL,'$name','$full_name','$mac','$position','','$location','$id_card','$gender','$age','$company','$biometrics_id','$token','$space','1','$phone','$email')";	
	
	
	
	}
	echo"<br>";
	echo $result->num_rows;
	echo"<br>";
	echo $query;
	
	
//******************************************************************
	
	

	
	if ($conn->query($query) === TRUE){
	
	 header("Location: tea.php?name=$name&mac=$mac"); 
	}else{
		echo $conn->error;
	writeLog("My sql Error:  <br>$name<br>$mac<br>" . $conn->error);
	
	}
 

} else {
  
  
   echo "Hack-Attempt detected. Got ya!.";
   writeLog('Formtoken');
   die;
}

?>