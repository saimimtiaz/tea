<?php

// Connection variables 
$host = "127.0.0.1"; // MySQL host name eg. localhost
$user = "vebvay_teauser"; // MySQL user. eg. root ( if your on localserver)
$password = "jdpt{kU1*X1c"; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "vebvay_vd_tea"; // MySQL Database name

// Connect to MySQL Database 

$conn = mysqli_connect($host,$user,$password,$database);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
require('common.php');
?>