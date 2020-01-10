<html>

<head>
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <script src="js/script.js"></script>

</head>
<style>
    .message {
    font-weight: 200;
    background-color: #dbe6e4;
    line-height: 34px;
    color: #4e4949;
    text-align: center;
    margin-bottom: 13px;
    border-radius: 4px;
    /* font-weight: bolder; */
    letter-spacing: 2px;
        width: 345px;
    margin-top: 20px;
    }
    
    body,html {
        font-weight: 200;
    background-color:white !important;
        color:black;
        font-size:16px;
    }
    
    .hidden {
        display: none;
    }
    #card{
    width:400px;
        height:60px;
        font-size:20px;
        color:gray;
    }
    input{
    color:gray;
    }
</style>

<body style="background-color:#fefefe;padding:20px;">
<div class="container">
    <div class="row">

    <form>
       <center> <lable>Enter Your card number</lable>
        <br>
        <input id="card" type="text">
        <input id="name" name="name" type="hidden" value='<?php if (isset ($_GET["name"])){echo $_GET["name"];} ?>'>
        <input id="mac" name="mac" type="hidden" value=' <?php if (isset ($_GET["mac"])){echo $_GET["mac"];} ?>'>
        <br>
        <center><img src="img/preloader.gif" class="hidden preloader"></center>
           <div class="message"></div>

    </form></center>

    <script type="text/javascript">
        $(document).ready(function () {
            
            
            $('#card').keypress(function (event) {
    if (event.keyCode === 10 || event.keyCode === 13) {
        event.preventDefault();
    }
});
            
            
            $('#card').blur(function() {  
           
                $('.preloader').removeClass('hidden');
                $card = $(this).val();
                $name = $('#name').val();
                $mac = $('#mac').val();
                $.post("ajax/card_process.php", {
                    card: $card,
                    name: $name,
                    mac: $mac,
                }, function (data, status) {
                    // close the popup
                    $('.preloader').addClass('hidden');
                    // $(".message").html(data);
                    //$("html, body").animate({ scrollTop: 0 }, "slow");
                    //location.reload();
                    //readRecords();
                    
                     $('.message').text(data);
                    
                    
                    //                             if(data == 'ok'){
                    //                             alert('Rs 100 is loaded into your account');
                    //                             }else{
                    //                             alert('invalid card');
                    //                             }
                });
          
            });

        });
    </script>
</body>

</html>