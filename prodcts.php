<?php
class Products{
        private $id;
        private $type;
        private $price;


        public function __construct() {
     define('SECURE','1');
    include("ajax/db_connection.php");
    date_default_timezone_set('Asia/Karachi');
    $date = date("h:i:sa");

    // get user id
   

    $s      = "SELECT * FROM tblproduct  WHERE payment_type = 'free' ORDER BY id DESC ";
    $result =  $conn->query($s);
    $row = $result->fetch_assoc();
    echo"<pre>";
    print_r($row);
            if (!$result =  $conn->query($s)) {
        exit(mysql_error());
    }else{
    
       
    }
        }


      

}

 $product = new Products();
echo"<pre>";
print_r($result);



?>