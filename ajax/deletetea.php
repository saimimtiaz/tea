<?php
// check request

if(isset($_GET['id']) && isset($_GET['id']) != "")
{
    // include Database connection file
    define('SECURE',1);
    include("db_connection.php");
    date_default_timezone_set('Asia/Karachi');
    $date = date("h:i:sa");

    // get user id
    $user_id = $_POST['id'];

    // delete User
    $query = "DELETE FROM  tea_orders WHERE id = '$user_id'";
    if (!$result =  $conn->query($query)) {
        exit(mysql_error());
    }
}
?>