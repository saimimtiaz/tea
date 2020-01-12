<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.5-dist/css/bootstrap.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>    
    <style type='text/css'>
        .rating{
        background-color: #8b0bed ;color: white;padding: 10px;
        
        }
        .yellow{
        background-color:yellow !important;
        }
    </style>
</head>
<body style="background-color:#fefefe;padding:20px">
<body>
<?php
define('SECURE',1);
include("db_connection.php");
include("products.php");
$dev = false;
if (isset($_GET['dev'])) {
    $dev = true;
}

// include Database connection file 

?>
<div class="well" style="display:hidden">
  Next serving at <b><?php  include("servring.php"); ?></b><br>
 
    </div>
    
<div class="">
<?php

date_default_timezone_set('Asia/Karachi');
$date = date('d/m/Y');
$status = 1;
$user = 0;
$time = $serving_time;
echo $dev;
if(isset($_GET['user'])){  $user =  mysqli_real_escape_string($conn,$_GET['user']);}
if(isset($_GET['date'])){ $date =  mysqli_real_escape_string($conn,$_GET['date']);}
if(isset($_GET['status'])){ $status = mysqli_real_escape_string($conn,$_GET['status']);}
if(isset($_GET['time'])){ $time = mysqli_real_escape_string($conn,$_GET['time']);}
if(isset($_GET['report'])){ $report = true;}else{ $report = false; }
?>
<center><h3> Orders of <?php echo $date; ?> - <?php echo $time; ?></h3>  </center>
  
<?php
    $data   = '<table style="font-size:20px;text-align:center" class="table table-bordered table-striped">
                        <tr  style="text-align:center;">
                            <th>Name</th>
                            <th>Spoons</th>
                            <th>Order Time</th>
                            <th>Item</th>
                            
                            <th>Option</th>            
                        </tr>';

//----------------------------------------------
                        //Total Stock
$stock = "SELECT * FROM `tblproduct`";
$tbl_products = $conn->query($stock);
//----------------------------------------------
//----------------------------------------------
                        //Total Tea count of Date 
$today = "SELECT * FROM tea_orders WHERE date = '$date' ORDER BY id DESC";
$today_results = $conn->query($today);
//----------------------------------------------
                        //Green Tea Count  of Date
$green_Tea_query = "SELECT id,date,item_id FROM tea_orders WHERE date = '$date' AND item_id = '2'  ORDER BY id DESC";
$green_tea_results = $conn->query($green_Tea_query);

//----------------------------------------------

                        //Organi Tea Count
$organic_Tea_query = "SELECT id,date,item_id FROM tea_orders WHERE date = '$date' AND item_id = '1'  ORDER BY id DESC";
$organic_tea_results = $conn->query($organic_Tea_query);

//----------------------------------------------
//-----------------------Average Rating-----------------------
$avg_query = "SELECT AVG(rating),date FROM tea_orders WHERE rating != 10 AND date = '$date' AND payment_type ='free' ";
$ratings  = $conn->query($avg_query);
//echo $avg_query;
//"<h2>$average_rataing</h2>";
//echo"<pre>";
//print_r($average_rataing);
$row = $ratings->fetch_assoc(); 
//     echo"<pre>";
//     print_r($row);
echo "<div class='rating'> Tea rating is <b> " . $row["AVG(rating)"]."
</b></div>";
    




//----------------------------------------------





//echo $today;
//echo"<br>";
//echo  $rowcount = mysqli_num_rows($today_results);

//-----------------------------------------Main page Query --------------------


$s = "SELECT * FROM tea_orders WHERE date = '$date' AND serving_time = '$time' AND status ='1' ORDER BY id DESC";



//----------------------------------------------------------------------------------


$rating = false;

if (isset($_GET['rating'])) {
$rating = true;

}

if ($report){
$s = $today;
}
//----------------------------------Orders for a users -----------------------------------------------
    if ($user != ''){
        
        
    //    $s = "SELECT *  FROM `tea_orders` WHERE `user` = \'saim\' ORDER BY `serving_time` ASC";
    $s = "SELECT * FROM tea_orders WHERE  user = '$user' ORDER BY id DESC";
        echo "<h4>All Orders of $user</h4>";
    }
//---------------------------------

if (isset($_GET['dev'])) {
    echo"<code> $s</code>";
    echo"<br>";
    $result = $conn->query($s);
    echo  $rowcount = mysqli_num_rows($result);
}

//echo "<hr><span class='query' style='color:white'>".$s;"</span></hr>";
    $result = $conn->query($s);
//    if ($dev) {
//        echo "<hr>";
//        echo "<br>";
//        echo "Nuber of orders Exists " . $result->num_rows;
//        echo "<pre>";
//        $row = $result->fetch_assoc();
//        print_r($row);
//        echo "</pre>";
//        
//    }


 echo ' <a href="readall.php" class="btn btn-large " style="    float: left;" type="button">Number of Orders<h5 style="font-size:35px"> '.$result->num_rows.'</h5></a>'; 

echo ' <a href="?date='.$date.'&report" class="btn btn-large " style=" float: right;" type="button">Total Number of Orders <h5 style="font-size:35px">  '.$today_results->num_rows.'</h5></a>'; 
echo '   <span style="background-color: #39c34c;color: white;padding: 10px;"> Green Tea '.$green_tea_results->num_rows.'</span>';

echo '   <span style="background-color: #FFEB3B;color: #6d6b6b;padding: 10px;"> Green Tea '.$organic_tea_results->num_rows.'</span>';


?>
  
    </div>
    <?php
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $user =  $row['user'];
            $serving_time = $row['serving_time'];
            $sugar = $row['sugar'];
            $qty =$row['qty'];
            $id = $row['id'];
            $mac = $row['mac'];
            $rat = 'N/A';
            if($rating){$rat = $row['rating'];}
            $order_time = $row['order_time'];
            $item_id = $row['item_id'];
            
            $product = new Products($conn);
           $item_image_path = $product->get_image($item_id);
           $product_name = $product->get_name($item_id);
            
            $item = "<span style='background-color: #FFEB3B;color: #6d6b6b;padding: 10px;'>Organic Tea</span>";
             $item = "<img width='40' src='../$item_image_path'/><br>($product_name)";
           
            
            
            
            $data .= "<tr style='font-weight:900;font-size:20px'>
                <td ><a href='readall.php?user=".$user."' type='button' class='btn btn-primary btn-lg'>$user <span class='badge'> $serving_time</span></a>
          <br> <small><a href='whatsapp.php?user=".$user."'><img width='24px' src='../img/whatsapp.png'/></a></small>
                </td>
                <td>$sugar Spoons</td>
                <td >$order_time</td>
                <td><small>$item</small></td>
                
                <td>
                    <a href='del.php?id=$id&item=$item_id'class='btn btn-danger btn-xs'>Delete</a><br>
                    <small style='font-size:9px'>$id | $mac<br>$rat</small>
                </td>
            </tr>";
            
        }
    } else {
        // records now found 
        $data .= '<tr><td colspan="6">No Order Yet!</td></tr>';
    }
    
    $data .= '</table>';
    
    echo $data;

?>
    <br>
    <hr>
    
    
    
   <div class="well"> 
    
   <div class="form-group">
 
    <form class="" action="" method="get">
     <div class="control-group">
         <label>Date</label>
        
         <input type="text" name="date" value="<?php  echo $date; ?>"/>
         <select name="time">
         <?php 
         foreach($serving as $s){
         $res = date('h:i A', strtotime("$s:00:00"));
         echo"<option value='$res'>$res</option>";
         
         }
         ?>
             </select>
          <select name="status">
         <?php   $selected =''; if(isset($_GET['status'])){ 
            
             if($_GET['status']==0){ $selected= 'selected="selected"'; } } ?>
         <option  value="1">Not Delivered</option>
        <option <?php echo $selected; ?>value="0">Delivered</option>
         
         </select>
         <br>
         <br>
    <input class="btn btn-success btn-large " type="submit">
        </div>
    </form> 
       </div>
       
       
    </div>
    <?php if($report){ ?>
    <div>
    <h1>Stock</h1>
      <?php   
            
             
             while ($row = $tbl_products->fetch_assoc()) {
                
                 echo "<h4>";
                 echo $row['name'];
                 echo"(";
                 echo $row['stock'];
                 echo")";
                 echo "</h4>";
                echo"<br>";
             }
        
?>
        <?php  }?>
    
    </div>
    </body>
    
    
  <script type="text/javascript">
$(document).ready(function(){
                      
    function DeleteRequest(id) {
   event.preventDefault();
    var conf = confirm("Are you sure, you have received ?");
    if (conf == true) {
        console.log(id);
        $.post("deletetea.php", {
                id: id
            },
            function (data, status) {
            
                // reload Users by using readRecords();
                
                location.reload();
            }
        );
    }
}
    
$('tr').click(function(){
    $(this).toggleClass('yellow');

});
    
});                  </script>