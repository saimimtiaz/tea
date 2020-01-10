<?php
if(!defined('SECURE')){
   echo'security token not defined';
   die;
}

class Products
{
   
    private $product = array();   
    
    function __construct($conn){
        
         $query = "SELECT * FROM `tblproduct` ORDER BY 'id' DESC";
        $results_array = array();
        $tbl_products = $conn->query($query);
      while ($row = $tbl_products->fetch_assoc()) {
           $this->product[] = $row;
      }
       
//       echo"<pre>";
//       print_r($this->product);
//         echo $this->product[0]['name'];
//        die;
       
       
    }
   //$this->product = $results_array;
//   function get_price_by_id($id){
//         $query = "SELECT price FROM `tblproduct` where id='$id'";
//         $tbl_products = $conn->query($query);
//         return $tbl_products;
//   }
      
    function show_query(){
         echo"<pre>";
         print_r($this->product);
    }
    function get_all_products(){
    
       return $this->product;
    }
   
   function get_name($id){
      $id = $id -1;
       return $this->product[$id]['name'];
    }
    function get_price($id){
       $id = $id -1;
       return $this->product[$id]['price'];
    }
    function get_stock($id){
       $id = $id -1;
       return $this->product[$id]['stock'];
    }
    function get_payment_type($id){
         $id = $id -1;
       return $this->product[$id]['payment_type'];
       
    }
   function get_image($id){
      $id = $id -1;
      return $this->product[$id]['image'];
    }
    
    
    
    

    

}

//echo ((new Products(3))->get_payment_type());



?>