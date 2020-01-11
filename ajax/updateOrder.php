<?php
// check request
error_reporting(E_ALL);
ini_set('display_errors', 1);


if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    define('SECURE',1);
    include("db_connection.php");
    date_default_timezone_set('Asia/Karachi');
    $date = date("h:i:sa");

    // get user id
    $user_id = $_POST['id'];
    $feedback = 10;
   if(isset($_POST['feed']))
      { $feedback = $_POST['feed'];
      }
    
//----------------------------------Update Internet---------------------------------    
    $internetrating = $_POST['internetrating'];
    $time = $_POST['time'];
    $name = $_POST['name'];
    $internet_query = "INSERT INTO `internet` (`time`, `rating`, `name`) VALUES ('$time', '$internetrating','$name')"; 
    //echo $internet_query;
   // echo"<br>";
    // delete User
    if (!$result =  $conn->query($internet_query)) {
       
        exit(mysql_error());
    }
//-------------------------------------------------------------------------------------    
    
    $query = "UPDATE tea_orders SET status='0', rating='$feedback' , delivery_time = '$date' WHERE id = '$user_id'";
    if (!$result =  $conn->query($query)) {
        echo mysql_error();
    }
}else{

echo "ID is not valid";
}
?>