<?php
// check request
if ("POST" == $_SERVER["REQUEST_METHOD"]) {
    if (isset($_SERVER["HTTP_ORIGIN"])) {
        $address = "http://".$_SERVER["SERVER_NAME"];
        if (strpos($address, $_SERVER["HTTP_ORIGIN"]) !== 0) {
            exit("CSRF protection in POST request: detected invalid Origin header: ".$_SERVER["HTTP_ORIGIN"]);
        }
    }
}


if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("db_connection.php");
    date_default_timezone_set('Asia/Karachi');
    $date = date("h:i:sa");

    // get user id
    $user_id = $_POST['id'];

    // delete User
    $query = "UPDATE tea_orders SET status='0' , delivery_time = '$date' WHERE id = '$user_id'";
    if (!$result =  $conn->query($query)) {
        exit(mysql_error());
    }
}
?>