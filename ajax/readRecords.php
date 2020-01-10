<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />

<?php

$dev = false;
if (isset($_GET['dev'])) {
    $dev = true;
}
// include Database connection file
define('SECURE',1);
include("db_connection.php");
include("products.php");
if (isset($_GET['mac'])) {
    $mac   = $_GET['mac'];
    $data   = '<table style="font-size: 10px;position: relative;left: -30px;width: 100%;" class="table table-bordered table-striped">
                        <tr>
                            <th>Request Id</th>
                            <th>Name</th>
                            <th>Serving Time</th>
                            <th>Order Time</th>
                            <th>Item</th>   
                            <th>Option</th>            
                                     
                        </tr>';
    $s      = "SELECT * FROM tea_orders WHERE mac = '$mac' AND status = '1' ORDER BY id DESC";
    //echo $s;
    $result = $conn->query($s);
    if ($dev) {
        echo "<hr>";
        echo "<br>";
        echo "Nuber of orders Exists " . $result->num_rows;
        echo "<pre>";
        $row = $result->fetch_assoc();
        print_r($row);
        echo "</pre>";
        
    }
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $item_id = $row['item_id'];
            $sugar = $row['sugar'];
            $item_image_path = ((new Products($conn))->get_image($item_id));
            $item_name = ((new Products($conn))->get_name($item_id));
            //---------------------------------
//            $item = "<span style='background-color: #FFEB3B;color: #6d6b6b;padding: 10px;'>Tea($sugar)</span>";
//            if($item_id=='2'){ $item = "<span style='background-color: #39c34c;color: white;padding: 10px;'>Green Tea($sugar)<span>";}
            
            
            //---------------------------------
            $data .= '<tr>
                <td>' . $row['id'] . '</td>
                <td>' .  $item_name . '</td>
                <td>' . $row['serving_time'] . '</td>
               
                <td>' . $row['order_time'] . '</td>
                 
                
                                <td style="width: 100px;"><img width="40" src="' . $item_image_path . '"/></td>
                <td>
                    <button onclick="feedback_for_tea(' . $row['id'] . ')" class="btn btn-danger btn-xs">Delivered</button>
                </td>

            </tr>';
        }
    } else {
        // records now found 
        $data .= '<tr><td colspan="6">No Order Yet!</td></tr>';
    }
    
    $data .= '</table>';
    
    echo $data;
} else {
    echo "No Refrence to Read";
}

?>