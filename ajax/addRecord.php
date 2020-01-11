<?php


//echo $_SERVER["HTTP_ORIGIN"];
//echo"<hr>";




	if(isset($_POST['name']))
	{
		// include Database connection file 
		define('SECURE',1);
		include("db_connection.php");
		include("products.php");
		require('balance.php');
		
    //-------------------- Get User Details ----------------------
    

		date_default_timezone_set('Asia/Karachi');
		$date = date('d/m/Y');
		$date_time = date("D j M Y - g:i:s a ");
		//date('h:i:s a m/d/Y', strtotime(date('Y-m-d H:i:s')));
		// get values 
		$name = $_POST['name'];
		$time = $_POST['time'];
		$mac = $_POST['mac'];
		$qt = $_POST['qt'];
		$item = $_POST['item'];
		$sugar = $_POST['sugar'];
		// -----------------Getting User balance--------------
//		$name = 'saim';
//    	$mac = '7C:D1:C3:E1:A9:D9';
//		echo "<br>";
//		echo "Name:";
//		echo $name;
//		echo "<br>";
//		echo "MAC:";
	//	echo $time;
	
		$user = (new User($conn,$name,$mac));
		$balance = $user->get_balance();
		
		
		//--------------------------------------------------
		$product_tbl = new Products($conn,$item);
		$payment_type = $product_tbl->get_payment_type($item);
		$product_price = $product_tbl->get_price($item);
		
		//echo $payment_type;
		//die;
		//--------------------------------------------------

//----------------Prodcut Price Compare with User Balance------------------
		
		if ($product_price > $balance){
		//echo "Product Price = $product_price & Your Balance = $balance";
		echo"<span class='error'>Not Enough Balance to buy this product Request for balance</span> ";
		die;
		}
		
//----------------------------Blacklisted Macs		
		
		$black_listed = array("B4:0F:B3:4C:ED:33", "00:E0:25:2D:9E:C3", "B4:0F:B3:4C:ED:33", "Cleveland");
		
		if (in_array($mac,$black_listed)){
		echo"<span class='error'>You can't order $mac </span> ";
		die;
		
		}
		
				
//-----------------if User have undelivered orders of previous date not today
		//echo $date;
		//echo"<br>";
		$s = "SELECT * FROM tea_orders WHERE user = '$name' AND status ='1' AND payment_type = 'free'";
		$result = $conn->query(($s));
		//echo"<pre>";
		$undelivered_tea_order = $result->fetch_assoc();
		 
		//echo"<hr>";
		//print_r($result->fetch_assoc());
		if($result->num_rows > 0 && $undelivered_tea_order["date"] != $date){
				$orders= $result->num_rows;
				echo"<span class='error'>You have $orders Undelivered Order Please mark that deliver first</span>";
				die;
		}
		
		
		
//||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
		
$s = "SELECT * FROM tea_orders WHERE User = '$name' AND Date = '$date' AND serving_time  ='$time' ";

		require('stockcheck.php');
		stock_check($conn,$item);
		
//----------------Once Stock is checked if order already placed we will update the order --			
		
		$result = $conn->query(($s));
		$last_order = $result->fetch_assoc();
		
		$type =  $last_order['payment_type'];
		$last_order_serving_time =  $last_order['serving_time'];
		$last_order_date =  $last_order['date'];
		$id =  $last_order['id'];
		$status =  $last_order['status'];

//		echo $status;
//		die;
		//--------------------------------------One order in one serving time (order alredy deliverd at that time)-----------------------------
//		echo "$date == $last_order_date &&  $time == $last_order_serving_time && $payment_type =='free'";
//		die;
		if($result->num_rows > 0 && $payment_type =='free' && $status == 0)
		{
		echo"<span class='error'> You already Delivered (<small>$id</small>)  <b>$last_order_serving_time<b> order.</span>";
		die;
		}
		
//------------------------------------------------------------------------------------------
		
		//echo $result->num_rows;
//		echo"<pre>";
//		print_r($result->fetch_assoc());
		
		// If Free item order already exist them UPDATE that order instead of creating new order
	
			if( $result->num_rows > 0 && $payment_type =='free' && $status == 1) {
				
				//$last_serving_time =  $last_order['serving_time'];
				
				
				//echo "Last Serving $last_serving_time| current time $time"; echo"<pre>";
					
				$sql = "UPDATE tea_orders SET item_id='$item', sugar='$sugar'  WHERE date='$date' && serving_time = '$time' && user='$name' ";
	
	//echo $sql;
				if($conn->query($sql) === TRUE) { 
				echo"<span class='successs'>$last_order_serving_time Order updated successfully</span>";
				}else{
				echo "Error:  <br>" . $conn->error;
				}
		}else{
	
	echo "order Added";
	
		//--------------------- otherwise just insert the order and - Minus the Stock
				$stock = stock_check($conn,$item,true);
				$updated_stock = $stock-$qt;
				
				$query = "INSERT INTO tea_orders (user, serving_time,sugar, mac, qty, date, order_time, item_id, payment_type) VALUES('$name', '$time','$sugar','$mac','$qt','$date','$date_time','$item','$payment_type')";
				 //$conn->query($query);
				
				//--------------------Minus the Stock---------------------------------
				$stock_update = "UPDATE `tblproduct` SET stock=stock-1  WHERE `tblproduct`.`id` = '$item'";
				$balance_update = "UPDATE `users` SET balance=balance-$product_price  WHERE `users`.`mac` = '$mac'";
				
				  if ($conn->query($query) === TRUE && $conn->query($stock_update) === TRUE && $conn->query($balance_update) === TRUE) {  
					  	
						echo "<span class='successs'>Your Order has been placed & will be served after $time</span>";
				  }else{

				  echo "Error:  <br>" . $conn->error;
				  }
		  }
			
		
	}

?>