<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_REQUEST['mac']) && isset($_REQUEST['mac']) != "")
{
    // include Database connection file
    define('SECURE',1);
    include("db_connection.php");
    date_default_timezone_set('Asia/Karachi');
    $date = date("d-m-yy");
    $mac = $_REQUEST['mac'];
    $id = $_REQUEST['id'];
$s = "SELECT * FROM feedback WHERE mac = '$mac' AND date = '$date'";
		$result = $conn->query(($s));
	//echo "<br><code>$s</code><br>";	
		
		if($result->num_rows > 0){
        // no need of feedback just update the tea status deliver
            //echo "false";
		$query = "UPDATE tea_orders SET status='0' WHERE mac = '$mac' AND id = '$id'";
        if (!$result =  $conn->query($query)) {
            echo mysql_error();
        }else{
        echo "ok $id status changed";
        }
			
			
        } else{
        // need feedback
        echo "true";
        }


//----------------------------	

}

?>