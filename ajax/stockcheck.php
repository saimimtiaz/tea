<?php
//*********************************************************************		

	function stock_check($conn,$item,$output = false){	
		//------------------------Stock check Query ----------------
		$out_of_stock = false;
		$stock_check =  "SELECT * FROM `tblproduct` WHERE id='$item' AND stock !=0 ";
		$item_avilable = $conn->query(($stock_check));
		
//------------------------------ First of all we check the Stock -------------------------
		if(!$item_avilable->num_rows > 0){
			echo "item out of Stock";
			$out_of_stock = true;
			die;
		}elseif($output){
			 return $item_avilable->num_rows;
		}
	}
//*********************************************************************		

?>