<?php if (isset ($_GET["name"])){$name = $_GET["name"];} ?>
<?php if (isset ($_GET["mac"])){ $mac = $_GET["mac"];} ?>
<?php if (!(isset ($_GET["mac"]) || isset($_GET['id']))){echo "ref not define";die;} ?>

<?php
$dev = false;

if (isset($_GET['dev'])) {
    $dev = true;}
// include Database connection file
define('SECURE',1);
include("db_connection.php");


if(!(isset($_GET['id']))){ // id or token is set it means its not new user
    
    
    //------------Checking if the mac address exist in our database or its a new user
 
$query_for_mac = "SELECT * FROM users WHERE `mac` = '$mac' AND `check` = 1";

    $result = $conn->query($query_for_mac);

    if($dev){echo $result->num_rows;die;}
    if ($result->num_rows <= 0) {
       //echo"xxx";
     header("Location: link.php?mac=$mac&name=$name"); 

    exit; 
     }

}
?>