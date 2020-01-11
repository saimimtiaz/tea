<?php

// Connection variables 
$host = "localhost"; // MySQL host name eg. localhost
$user = "root"; // MySQL user. eg. root ( if your on localserver)
$password = ""; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "tea"; // MySQL Database name

// Connect to MySQL Database 

$conn = mysqli_connect($host,$user,$password,$database);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
require('common.php');
?>