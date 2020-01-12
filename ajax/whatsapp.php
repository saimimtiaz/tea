<?php
define('SECURE',1);
include("db_connection.php");
if(isset($_GET['user'])){  $user =  mysqli_real_escape_string($conn,$_GET['user']);}
$s = "SELECT * FROM users WHERE full_name = '$user'";
//echo $s;
$result = $conn->query($s);
$row = $result->fetch_assoc(); 
$phone= $row['phone'];
if ($phone != ''){
$link = "https://api.whatsapp.com/send?phone=$phone&text= Hello $user!";
//  echo $link;
}else{
echo "<h1>No phone number</h1>";
  die;
}
?>
  <?php header("Location: $link"); ?>