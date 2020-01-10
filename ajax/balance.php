<?php

   if(!defined('SECURE')){

      echo'security token not defined';
      die;
   }


 
class User
{
   
    private $user;  
    
    function __construct($conn,$name,$mac){
         
        $query = "SELECT * FROM `users` WHERE  mac='$mac'";
//        echo $query;
//        die;
        $users = $conn->query($query);
        $this->user = $users->fetch_array();
//       echo"<pre>";
//        print_r($this->user);
//        die;

    }
    function show_query(){
         echo"<pre>";
         print_r($this->$user);
    }
    function get_balance(){
   $balance =   $this->user['balance'];
       if($balance == ''){
            $balance = 0;
       }
       return $balance;
    }
    function get_full_name(){
    
    return  $this->user['full_name'];
    }
    
    
    
    
    

    

}

//echo ((new User($conn,$name,$mac))->get_balance());



?>