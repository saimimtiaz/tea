<?php require('ajax/check.php'); ?>
<head>
<link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<script>
    
    // Add Record


// READ records
function readRecords() {
    $.get("ajax/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}




function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("ajax/readUserDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_first_name").val(user.first_name);
            $("#update_last_name").val(user.last_name);
            $("#update_email").val(user.email);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var first_name = $("#update_first_name").val();
    var last_name = $("#update_last_name").val();
    var email = $("#update_email").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/updateUserDetails.php", {
            id: id,
            first_name: first_name,
            last_name: last_name,
            email: email
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});
    
</script>
    <script src="js/jquery.cookie.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">    
</head>
<body style="background-color:#fefefe;padding:20px;font-family: 'Roboto', sans-serif;">
    <style>
    .message{
    font-weight: 500;
    line-height: 54px;
    text-align: center;
    margin-bottom: 13px;
    border-radius: 4px;
    letter-spacing: 2px;
    color: #000000;
    text-transform: capitalize;
    background-color: #fff337;

    }
      .lable  {
        padding: 13px;
    font-size: 16px;
    font-weight: 600;
    color: #090a0a;
    background-color: white;
    font-family: 'Roboto', sans-serif;
        }
    .body{
    font-weight: 200;
    }
    #feedback{
     background-color: fff337;
        color: black;
    }
    
.flash-button{
	background:blue;
	padding:5px 10px;
	color:#fff;
	border:none;
	border-radius:5px;
	
	animation-name: flash;
	animation-duration: 1s;
	animation-timing-function: linear;
	animation-iteration-count: infinite;

	//Firefox 1+
	-webkit-animation-name: flash;
	-webkit-animation-duration: 1s;
	-webkit-animation-timing-function: linear;
	-webkit-animation-iteration-count: infinite;

	//Safari 3-4
	-moz-animation-name: flash;
	-moz-animation-duration: 1s;
	-moz-animation-timing-function: linear;
	-moz-animation-iteration-count: infinite;
    position:relative;
    right: 272px;
    top: 76px;
    
}

@keyframes flash {  
    0% { opacity: 1.0; }
    50% { opacity: 0.5; }
    100% { opacity: 1.0; }
}

//Firefox 1+
@-webkit-keyframes flash {  
    0% { opacity: 1.0; }
    50% { opacity: 0.5; }
    100% { opacity: 1.0; }
}

//Safari 3-4
@-moz-keyframes flash {  
    0% { opacity: 1.0; }
    50% { opacity: 0.5; }
    100% { opacity: 1.0; }
}    
   a:hover{
   color:white !important;
       text-decoration:none !important;
   } 
        .items img{
        margin-left: 14px;
        margin-right:5px;
        }
        .items span{
            font-size: 10px;
            color: black;
            font-weight: bold;
        }
        .items input{
    width: 15px;
    z-index: 100000000000;
        }
        .sugar{
    width: 170px;
    margin: 0 auto;
    text-align: center;
   
        
        }
 .blur {
  -webkit-filter: blur(1px);
  -moz-filter: blur(1px);
  -o-filter: blur(1px);
  -ms-filter: blur(1px);
  filter: blur(1px);
cursor: not-allowed;


}
.overlay{
    position: fixed;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    z-index: 1000000;
    background-color: #000000e8;
    text-align: justified;
    font-size: 20px;
    color: #ecece7;
    padding: 20px;
    font-weight:100;
    font-weight: 100;
    letter-spacing: 4px;   
    }
.overlay2{
    position: fixed;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    z-index: 1000000;
    background-color: #000000e8;
    text-align: justified;
    font-size: 20px;
    color: #ecece7;
    padding: 20px;
    font-weight:100;
    font-weight: 100;
    letter-spacing: 4px; 

}        
    .cross{
        position: relative;
    top: 21px;
    font-size: 20px;
    background-color: white;
    padding: 10px;
    width: 56px;
    /* height: 20px; */
    color: black;
    cursor: pointer;
    
    }.
    .message2
        {
    font-weight: 200;
   
    line-height: 34px;
    color: white;
    text-align: center;
    margin-bottom: 13px;
    border-radius: 4px;
    letter-spacing: 2px;
    padding:20px;
 
    }
     .hidden{
        display: none;
    }
    
    /*---------------*/
    .custom-select {
  position: relative;
  
}
.custom-select select {
  display: none; /*hide original SELECT element:*/
}
.select-selected {
         background-color: #419cde;
}
/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 17px;
  right: 10px;
  width: 0;
  height: 0;
  border: 8px solid transparent;
  border-color: #fff transparent transparent transparent;
}
/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}
/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
    text-align:left;
}
/*style items (options):*/
.select-items {
  position: absolute;
  background-color: DodgerBlue;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}
.balance{
    padding: 10px;
    font-size: 19px !important;
    background-color: 33c5b9;
    color: #ffffff;
    width: 129px;
    text-align: center;
    position: relative;
    top: 95px;
/*    text-shadow: 1px 1px 2px grey;*/
}
/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}
.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}
.name{
    background-color: #fbfbfb;
    padding: 5px;
    color: black !important;
    position: relative;
    top: 6px;
    margin:20px auto;
    clear: both;
    display:inline-block;
    width:239px;
    text-align:center;
    font-weight:normal !important;
            
    }
    .price{
        background-color: whitesmoke;
    color: #343535 !important;
    text-align: center;
    margin: 20px auto;
    padding: 8px;
    position: relative;
    top: -44px;
    clear: both;
    display: inline-block;
    right: -158px;
    }
    .item-section{
    float:left;width:256px;margin-bottom:20px; border-right:1px solid #cfd2d6;padding:10px;    line-height: 25px;
    }
    .name-price{
    display:inline-block
    }
    .error{
        background-color:red !important;
        color:white;
        padding:10px;
    } 
    .successs{
/*
        background-color: #19bf9a;
        color:white;
        padding:10px;
*/
    }
    .outofstock {
    margin-right: 16px;
    background-color: #ec5f09;
    color: white !important;
    font-size: 9px;
    padding: 3px;
    }
    
    .submit {
    color: #fff8f8;
    font-weight: 400;
    padding: 11px;
    border: 0px;
    background-color: #242727;
    position: relative;
    width: 100%;
 
    }
    .hidden{
    dispaly:none;
    }
        
    label{
        
    font-size: 16px;
     font-weight: normal !important;    
        }
        .teel{
            background-color:  #37f2b9 !important;
        }
        .question{
        transition: transform .2s;
           font-family: 'Roboto', sans-serif;
        padding: 13px;
        
   
        }
        select:not([multiple]) {
    -webkit-appearance: none;
    -moz-appearance: none;
    background-position: right 50%;
    background-repeat: no-repeat;
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAMCAYAAABSgIzaAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NDZFNDEwNjlGNzFEMTFFMkJEQ0VDRTM1N0RCMzMyMkIiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NDZFNDEwNkFGNzFEMTFFMkJEQ0VDRTM1N0RCMzMyMkIiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo0NkU0MTA2N0Y3MUQxMUUyQkRDRUNFMzU3REIzMzIyQiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo0NkU0MTA2OEY3MUQxMUUyQkRDRUNFMzU3REIzMzIyQiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PuGsgwQAAAA5SURBVHjaYvz//z8DOYCJgUxAf42MQIzTk0D/M+KzkRGPoQSdykiKJrBGpOhgJFYTWNEIiEeAAAMAzNENEOH+do8AAAAASUVORK5CYII=);
    padding: .5em;
    padding-right: 1.5em
}

#mySelect {
    border-radius: 0;
    width: 200px;
    background-color: #5ec5ba;
    color: white;
}
       
        
    </style>
<div class="container">
    <div class="row">
  <?php

if(date('j', time()) > '27') {
    
?>
        <center><a type="button" class="flash-button" href='https://docs.google.com/forms/d/e/1FAIpQLSe8ymaP_KOut0Cw4FnImKpjuSyiochmA_a60tosUWzIyt6LqA/viewform?usp=sf_link' target="_top"><?php if (isset ($_GET["name"])){echo ucfirst ($_GET["name"]);} ?> we need your Feedback!</a></center>
        
        
<?php
                                
}
?>
    </div>
    <!-- ----------------->
 
   <?php require('message.php'); ?>
   <?php require('ajax/balance.php'); ?>
   <?php require('ajax/products.php'); ?>
    <?php 

//    $name = 'saim';
//    $mac = '7C:D1:C3:E1:A9:D9';
   

    //-------------------- Get User Details ----------------------
     if(isset($_GET['id'])){
         
         $userobj = (new User($conn,'token',stripcleantohtml($_GET['id'])));
         
    }elseif(isset($_GET['mac'])){
     
     $userobj = (new User($conn,'mac',stripcleantohtml($_GET['mac'])));
     }
//echo"<pre>";
//print_r($userobj);
//die;
    $balance = $userobj->get_balance();
    $full_name = $userobj->get_full_name();
    //-------------------------------------------------------------
    $products = new Products($conn);
    $items = $products->get_all_products();
    //echo"$items";
    //echo"<pre>";
    //print_r ($items);
    ?>
    <div class="feedback overlay2 teel hidden">
    <div style="margin: 0 auto;width: 500px;padding:10px">  
      <form id="feedback">
          <input id="refid" type="hidden" value="">
          <p class="lable">Please Be honest with your feedback, this data will really help to improve our services.</p>
        <div class="question">
          <h2>How was your tea ?</h2>
        
                  <label>  <input required type="radio"  name="feedback" value="1">  It was pathetic  </label><br>
                    <label>  <input required type="radio" name="feedback" value="2"> I did't like it </label><br>
                   <label>  <input  required type="radio" name="feedback"  value="3"> It was ok </label><br>
                    <label>  <input required type="radio" name="feedback" value="4"> It was very good</label><br>
                    <label>  <input required type="radio" name="feedback" value="5"> It was Excellent</label><br>
        </div>
          <div class="question">
          <h2> How was the Internet ?</h2>
    
          <label>  <input required type="radio"  name="internet" value="1"> Zero </label><br>
          <label>  <input required type="radio"  name="internet" value="2"> Poor Speed </label><br>
          <label>  <input required type="radio"  name="internet" value="3"> I can't do my work </label><br>
          <label>  <input required type="radio"  name="internet" value="4"> It was Good </label><br>
          <label>  <input required type="radio"  name="internet" value="5"> It was perfect </label><br>
          </div>
          <input class="submit" type="submit">
       </form>
      </div>   
    </div>
    
    
    <div class="row">
     <div class="balance">
         <?php if($balance!=''){ ?>
         <span>Rs.  <?php echo $balance; ?>
         
         <?php }else{
    
    echo"<span>Rs 0.00 </span>";
            }?>
         </span></div>
        
        
        <div style="margin-top: -70px;">
        
            <div class="message"></div>
        <span id="name" style="display:none"><?php echo $full_name; ?></span>
        <span id="time"  style="display:none"> <?php  include ("ajax/servring.php"); ?></span>
        
        <div class="col-md-12"> 
            <center><a href="cards.php?name=<?php echo $name; ?>&mac=<?php echo $mac; ?>"> <img width="50" src='tea-cup.png' /></a></center>
            <center>
                <h6>V 6.01(Johar Town)</h6></center>
            <span id="notice" style="display:none;"><?php echo $notice_name; ?></span>
            <center>
                <h4>Next serving at <span style="font-weight: bolder;color: #e68134;" class="serving"><?php echo $serving_time; ?></span></h4></center>
            
            </div>
            <form>
              

                <div class="form-group">
<!--                    <label for="first_name">Name</label>-->
   <input style="display:none"  type="text" id="first_name" placeholder="Name" class="form-control"  value="<?php if (isset ($_GET["name"])){echo $_GET["name"];} ?>"/>
                </div>
<!-- Items Section Start -->                
<!--
                <div class="form-group items">
            <div style="clear:both"></div>
                    <div style="width:300px; padding-bottom: 44px;
    padding-top: 20px;">
                <div style="float:left">        
          <input type="radio" name="item"  title="our" checked value="1"><img width="50" src="img/tea-yellow-lablel.png">
                    <span>Organic Tea</span>
                        </div>
                <div style="float:right">         
           <input type="radio"  name="item" value="2" style=" margin-right: -5px;
 "> <img width="50"  src="img/greentea.png">
                     <span>Green Tea</span>
                        </div>
                    </div>    
                </div>
-->
                
<!-- Items Section Ends --> 
             <!----------------------- Sugar Section ------------------------------------>       
                
           
        <div class="sugar">
            <small style="font-size: 12px;font-weight:900">&nbsp;&nbsp;&nbsp; </small><br>
    <div class="custom-select" style="width:200px;">    
        <select  style="" name="sugar" id="sugar">
                    <option value="0">No Sugar</option>
                    <option value="1">1 </option>
                    <option selected value="2">2</option>
                    <option value="3">3</option>
        </select>    
          
     </div>


            
            <lable> Select serving time </lable>
            <div class="custom-select2" style="width:200px;"> 
                  <select id='mySelect'  style="" name="s_time" id="s_time"> 
<?php if (strtotime("11:00 AM")>time()){ echo"<option value='11:00 AM' >11:00 AM</option> "; } ?>     <?php if (strtotime("2:00 PM")>time()){ echo"<option value='2:00 PM' >2:00 PM</option> "; } ?>          
<?php if (strtotime("5:00 PM")>time()){ echo"<option value='5:00 PM' >5:00 PM</option> "; } ?>     
<?php if (strtotime("8:00 PM")>time()){ echo"<option value='8:00 PM' >8:00 PM</option> "; }
else{ echo"<option value='11:00 AM' >11:00 AM</option> "; } ?>               
                </select>  
            </div>    
                </div>    
               <hr>
                
        <!----------------------- PAID ITEM SECTION ------------------------------------>   
             <div class="form-group items">
                <div style="clear:both"></div>
                <div style="width:1120px;margin-top:20px; margin: 0 auto;">
         <?php
//echo"<pre>";
//print_r($items);die;
        foreach($items as $item){
        
        $id = $item['id'];
        $name = $products->get_name($id);
        $image = $products->get_image($id);
        $price = $products->get_price($id);
        $stock = $products->get_stock($id);
            $out_of_stock = '';
            $msg = '';
            if ($stock == 0){ $out_of_stock = 'hidden'; $msg = "<span class='outofstock'>Out Of Stock</span>"; }
            
            
       echo"<div class='item-section $out_of_stock' style=''>";
//           if ($stock == 0){ 
//            echo"<span class='outofstock'>$msg</span>";
//           }
            echo"
           <div class='$out_of_stock'>
           <input required class='' type='radio'  name='item' value='$id' style=''>  
               <span class='price'>Rs $price</span>
                <img  class='' width='50'  src='$image'>
                <div class='name-price'>
                <span class='name'>$name </span>
            </div>
        </div>
        ";       
        echo"</div>";
        
        }

//            echo"<pre>";
//            print_r($item);
//echo $products->get_name(2);

         ?>
                
                </div>
            </div>
                
               
        <!----------------------- ---------------------------------------------------- -->         
                <div style="clear:both;"></div>
                  <div class="form-group">
                   <div style="display:none">
                      Number of Tea:<span class="qt"></span>
                    <input id="qt" disabled  name="tea" type="number" style="height:32px;text-align:center" max="2" min="1" value="1">
                    </div> 
                     
                      <div style="width:150px;margin:28px auto;">
                    <input type="submit" style=" border-radius: 0px !important;" id="order" class="btn btn-success" value="Request Your Order">
                      </div>
                </div>
            </form>
        
            <center><h4>Your Orders</h4></center>
            
            <div class="read"></div>
 <span id="mac" style="display:none"><?php echo $mac; ?></span>
            <script type="text/javascript">
                
              function feedback_for_tea(id) {
    $('#refid').val(id); // updating ref 
    $('.feedback').removeClass('hidden');
}        
                
  $(document).ready(function() {
      $('input[name=item]').first().click();
      if("null" != $.cookie('sugar')){ 
      $(".select-selected").text($.cookie('sugar'));
          if($.cookie('sugar') == 0){ 
              $(".select-selected").text('No Sugar'); 
          }
      $('#sugar').val($.cookie('sugar'));
      }
      // overlay section  
    $('.cross').click(function() {
        $('.overlay').addClass('hidden');
        $.cookie('<?php echo"$cookie_name"; ?>', 'the_value', {
            expires: 7
        });
         var mac = $("#mac").text();
        var name = $("#name").text();
        var notice = $("#notice").text();
    
           $.post("ajax/checked_notice.php", {
            name: name,
            mac: mac,
            notice: notice,
               
        }, function(data, status) {

        });
        
      
    })
 //  overlay section
    //document.addEventListener('contextmenu', event => event.preventDefault());

        
    //-------------------Sugar prefrence 
       
        function sugar_prefrance(){
        //$('#sugar').val();
        var spoons = $('#sugar').val();
        $.cookie('sugar', spoons , {
            expires: 7
        });    
        }
        
    //--------------------------    
   
      function noticeboard(){
         var mac = $("#mac").text();
        var name = $("#name").text();
        var notice = $("#notice").text();
          
          $.post("ajax/notice_display.php", {
            name: name,
            mac: mac,
            notice: notice,
               
        }, function(data, status) {
              console.log("DAta"+data);
              if(data != 'viewed'){
                $('.overlay').removeClass('hidden');
              }
        });
          
          
      
      }
      
      //-------------------------- feedback form submission
      
  
      $('#feedback').submit(function(){
        event.preventDefault();
        var fdb = $("input[name='feedback']:checked").val();
        var internetRating = $("input[name='internet']:checked").val();
          var recodId =  $('#refid').val();
          var time =   $(".serving").text();
          var username =   $("#name").text();
         // alert(recodId);
         // debugger;
          if (fdb != null && fdb < 6) {
        $.post("ajax/updateOrder.php", {
                id: recodId,
                feed: fdb,
                internetrating: internetRating,
                time: time,
                name: username  
            },
            function (data, status) {
                // reload Users by using readRecords();
                
            if(status == 'success'){
                readRecords();
                $('.feedback').addClass('hidden');
            }else{
                alert(status);
            }           
                //location.reload();
            }
        );
    }
          
         //alert(recodId);
      });
      
      
      //--------------------------    
        
    function serving() {
        $.get("ajax/servring.php", {}, function(data, status) {
            $(".serving").html(data);
            $("#time").html(data);
        });

        $.get("ajax/servring.php", {}, function(data, status) {
            $(".serving").html(data);
            $("#time").html(data);
        });

    }
    serving();

    $("#order").on("click", function(event) {
        //debugger;
        event.preventDefault();
        noticeboard();
        sugar_prefrance();
        serving(); 
        addRecord();


    });
    readRecords();

        function readRecords() {
        $.get("ajax/readRecords.php?mac=<?php if (isset ($_GET["mac"])){echo $_GET["mac"];} ?>", {},function(data, status) {$(".read").html(data);});}

//    function DeleteRequest(id) {
//        event.preventDefault();
//        var conf = prompt("Please enter your name", "Harry Potter");
//        if (conf != null) {
//            console.log(id);
//            $.post("ajax/updateOrder.php", {
//                    id: id,
//                    feed:conf    
//                },
//                function(data, status) {
//
//                    // reload Users by using readRecords();
//                    readRecords();
//                    // location.reload();
//                }
//            );
//        }
//    }


    function addRecord() {
        //if (window.self != window.top){
        
        var mac = $("#mac").text();
        var qt = $("#qt").val();
        var sugar = $("#sugar").val();
        //    var email = $("#email").val();
        var item = $('input[name=item]:checked').val();
        
        //console.log(item);

        var name = $("#name").text();
        //var s_time = $("#time").text();
        var s_time = $('#mySelect').val();

if(mac !='' && name!=''){
        // Add record
        $.post("ajax/addRecord.php", {
            name: name,
            time: s_time,
            sugar: sugar,
            mac: mac,
            item: item,
            qt: 1
        }, function(data, status) {
            // close the popup
            
            $(".message").html(data);
            $("html, body").animate({ scrollTop: 0 }, "slow");
            //location.reload();
            readRecords();

        });
}else{
$(".message").addClass('error');    
$(".message").html("Mac Address or Your name is invalid");
$("html, body").animate({ scrollTop: 0 }, "slow");

}
        //}
    }
      
     

     
      
});
                            
    
                
            </script>
            
    <script>
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 0; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
        
$(function() {
  $(".cross").delay(6000).fadeIn();
});        
</script> 
            