<?php

if ("POST" == $_SERVER["REQUEST_METHOD"] && ($_SERVER["HTTP_ORIGIN"]!='http://localhost:3000')) {
    if (isset($_SERVER["HTTP_ORIGIN"])) {
        $address = "http://".$_SERVER["SERVER_NAME"];
        if (strpos($address, $_SERVER["HTTP_ORIGIN"]) !== 0) {
            exit("CSRF protection in POST request: detected invalid Origin header: ".$_SERVER["HTTP_ORIGIN"]);
        }
    }
}

// Connection variables 
$host = "localhost"; // MySQL host name eg. localhost
$user = "root"; // MySQL user. eg. root ( if your on localserver)
$password = ""; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "tea"; // MySQL Database name

// Connect to MySQL Database 

$conn = mysqli_connect($host,$user,$password,$database);
//echo mysqli_error($conn);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
require('common.php');
?>