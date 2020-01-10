<?php
//phpinfo();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
define('SECURE',1);
include("db_connection.php");


$keyword = strval($_REQUEST['query']);
//echo $keyword;

$search_param = "{$keyword}%";
//$conn = new mysqli('localhost', 'vebvay_teauser', 'jdpt{kU1*X1c' , 'vebvay_vd_tea');
//$conn = new mysqli('localhost', 'root', 'root' , 'vd_tea');
$s= "SELECT * FROM locations WHERE areas LIKE '$search_param'";
	$result = $conn->query($s);





 if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
  $areaResulst[] = $row["areas"];
  }
 echo json_encode($areaResulst);
 
 }else{
 echo mysql_error();
 }


//	$$=("SELECT * FROM locations WHERE areas LIKE ?");
//	$sql->bind_param("s",$search_param);			
//	$sql->execute();
//	$result = $sql->get_result();
////		 echo $result;
////echo die;
//	if ( $result->num_rows > 0) {
//			while($row = $result->fetch_assoc()) {
//		$areaResulst[] = $row["areas"];
//		}
//		echo json_encode($areaResulst);
//	}
//	$conn->close();
?>

