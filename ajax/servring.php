<?php
	// include Database connection file 
	//echo time();
$serving = array (11,14,17,20);

date_default_timezone_set("Asia/Karachi"); 
	// include Database connection file 
//echo time();

$current_hour = date('H', time());
//echo $current_hour;
//die;

foreach ($serving as $t)
{
// case 1 if the time has passed
	
	if ($current_hour < $t){
	
	$res = $t;
	break;
	}else{
	
	$res = $serving[0];
	}
	//echo $res;
	
	
}


//echo"<br>"; 
$serving_time = date('h:i A', strtotime("$res:00:00")); 
echo date('h:i A', strtotime("$res:00:00"));

?>