<?php
if(isset($_GET['id']) && isset($_GET['id']) != "" && isset($_GET['mac'])){
define('SECURE',1);
include("db_connection.php");
    $order_id = $_GET['id'];
    $item_id = $_GET['item'];
    $query = "DELETE FROM  tea_orders WHERE id = '$order_id'";
    
    $stock_update = "UPDATE `tblproduct` SET stock = stock+1  WHERE `tblproduct`.`id` = '$item_id'";
    $conn->query($stock_update);
    if (!$result =  $conn->query($query)) {
        exit(mysql_error());
}else{
    echo"ok";
    }
}
?>