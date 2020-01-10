<?php




session_start();
function generateFormToken($form) {
       // generate a token from an unique value
    	$token = md5(uniqid(microtime(), true));  
    	// Write the generated token to the session variable to check it against the hidden field when the form is sent
    	$_SESSION[$form.'_token'] = $token;    	
    	return $token;
}

?>
<?php
   // generate a new token for the $_SESSION superglobal and put them in a hidden field
   $newToken = generateFormToken('signup');   
?>
<link href='http://fonts.googleapis.com/css?family=Poppins&display=swap' rel='stylesheet' type='text/css'>
	<style>
		ul{
		list-style-type: none;
		}
	.typeahead { border: 2px solid #FFF;border-radius: 4px;padding: 8px 12px;max-width: 300px;min-width: 290px;
    background: rgb(55, 136, 173);color: #FFF;}
	input.typeahead {min-width: 265px;}
	.tt-menu { width:300px; }
	ul.typeahead{margin:0px;padding:10px 0px;}
	ul.typeahead.dropdown-menu li a {padding: 5px !important;color:#FFF; text-decoration:none !important;}
	ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important;text-decoration:none; }
	 no-repeat center center;padding: 100px 10px 130px;border-radius:4px;text-align:center;margin:10px;}
	.demo-label {font-size:1.5em;color: #686868;font-weight: 500;color:#FFF;line-height:6px;}
	.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
    text-decoration: none;
    background-color: #1f3f41;
    outline: 0;
		
}
* {
    -webkit-box-sizing: unset;
    -moz-box-sizing: unset;
    box-sizing: unset;
}
	</style>


<style type="text/css">
	
.form-style-10{
	width:450px;
	padding:30px;
	margin:40px auto;
	background: #FFF;
	border-radius: 10px;
	-webkit-border-radius:10px;
	-moz-border-radius: 10px;
	box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
	-moz-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
	-webkit-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
}
.form-style-10 .inner-wrap{
	padding: 30px;
	background: #F8F8F8;
	border-radius: 6px;
	margin-bottom: 15px;
}
.form-style-10 h1{
	background: #2A88AD;
	padding: 20px 30px 15px 30px;
	margin: -30px -30px 30px -30px;
	border-radius: 10px 10px 0 0;
	-webkit-border-radius: 10px 10px 0 0;
	-moz-border-radius: 10px 10px 0 0;
	color: #fff;
	text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
	font: normal 30px 'Bitter', serif;
	-moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
	-webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
	box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
	border: 1px solid #257C9E;
}
.form-style-10 h1 > span{
	display: block;
	margin-top: 2px;
	font: 13px Arial, Helvetica, sans-serif;
}
.form-style-10 label{
	display: block;
	font: 13px Arial, Helvetica, sans-serif;
	color: #888;
	margin-bottom: 15px;
}
.form-style-10 input[type="text"],
.form-style-10 input[type="date"],
.form-style-10 input[type="datetime"],
.form-style-10 input[type="email"],
.form-style-10 input[type="number"],
.form-style-10 input[type="search"],
.form-style-10 input[type="time"],
.form-style-10 input[type="url"],
.form-style-10 input[type="password"],
.form-style-10 textarea,
.form-style-10 select {
	display: block;
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	width: 100%;
	padding: 8px;
	border-radius: 6px;
	-webkit-border-radius:6px;
	-moz-border-radius:6px;
	border: 2px solid #fff;
	box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
	-moz-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
	-webkit-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
}

.form-style-10 .section{
	font: normal 20px 'Bitter', serif;
	color: #2A88AD;
	margin-bottom: 5px;
}
.form-style-10 .section span {
	background: #2A88AD;
	padding: 5px 10px 5px 10px;
	position: absolute;
	border-radius: 50%;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	border: 4px solid #fff;
	font-size: 14px;
	margin-left: -45px;
	color: #fff;
	margin-top: -3px;
}
.form-style-10 input[type="button"], 
.form-style-10 input[type="submit"]{
	background: #2A88AD;
	padding: 8px 20px 8px 20px;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	color: #fff;
	text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
	font: normal 30px 'Bitter', serif;
	-moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
	-webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
	box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
	border: 1px solid #257C9E;
	font-size: 15px;
}
.form-style-10 input[type="button"]:hover, 
.form-style-10 input[type="submit"]:hover{
	background: #2A6881;
	-moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
	-webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
	box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
}
.form-style-10 .privacy-policy{
	float: right;
	width: 250px;
	font: 12px Arial, Helvetica, sans-serif;
	color: #4D4D4D;
	margin-top: 10px;
	text-align: right;
}
	.typeahead li{
	height:19px;
	}
	.next{
	float: right;
    background-color: #3788ad;
    color: white;
    padding: 6px;
    cursor: pointer;
	width: 55px;
       height: 20px;
	}
	
i {
  border: solid white;
  border-width: 0 3px 3px 0;
  display: inline-block;
  padding: 3px;
	}

.right {
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
}

	
</style>
<div class="form-style-10">
<?php
	function stripcleantohtml($s){
		// Restores the added slashes (ie.: " I\'m John " for security in output, and escapes them in htmlentities(ie.:  &quot; etc.)
		// Also strips any <html> tags it may encouter
		// Use: Anything that shouldn't contain html (pretty much everything that is not a textarea)
		return htmlentities(trim(strip_tags(stripslashes($s))), ENT_NOQUOTES, "UTF-8");
}
	
	
?>
	<?php if (isset($_GET['name'])){$name= stripcleantohtml($_GET['name']);}else{$name = 'Friend';} ?>
<h1>Hello <?php echo ucfirst($name); ?> <span> We need some information to update our record</span></h1>
<form method="post" action="get_user_data.php">
	<input type="hidden" name="token" value="<?php echo $newToken; ?>">
	<input name="mac" type="hidden" value="<?php if(isset($_GET['mac'])){echo stripcleantohtml($_GET['mac']); } else{die;} ?>"/>
	<input type="hidden" name="name" value="<?php echo $name; ?>"/>
    <div class="section"><span>1</span>Personal Information</div>
    <div class="inner-wrap">
        <label>Your Full Name :<input required type="text" name="full_name" /></label>
		
        <label>Your area or Location:(residence) <input required autocomplete="off" type="text" name="location" id="txtlocation"  required/></label>
		<label>
			<label>Are You? </label>
			
			<input required type="radio" value="male" name="gender"/>Male:
			<input required type="radio" value="female" name="gender"/>Female:<br><br></label>
		<label>
		Your Age : <select name="age" style="height:40px;background-color:white">
					<option value="18-">under 18</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28" selected>28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
					<option value="32">32</option>
					<option value="33">33</option>
					<option value="34">34</option>
					<option value="35">35</option>
					<option value="35">36</option>
					<option value="37">37</option>
					<option value="38">38</option>
					<option value="39">39</option>
					<option value="40">40</option>
					<option value="41">41</option>
					<option value="42">42</option>
					<option value="43">43</option>
					<option value="44">44</option>
					<option value="45">45</option>
					<option value="46">46</option>
					<option value="47">47</option>
					<option value="48">48</option>
					<option value="48+">48+</option>
			
					</select>
		
		</label>
			 <label>NIC Number: <input required placeholder=" XXXXX-XXXXXXX-X"  type="text" name="id_card"  id='cnic' /><span class="messagenic" style="color: #ab3434;
 "></span></label>
		<div class="next">
			
		Next<i class="arrow right"></i>
		
		</div>
		
    </div>
<div id="section2">
    <div class="section"><span>2</span>Contact Info</div>
    <div class="inner-wrap">
        <label>Email Address: <input required type="email" name="email" /></label>
       
	
        <label>Phone Number: <input title='Like this 03001234567 ' placeholder="Example 03001234567"  required type="text" name="phone" pattern="^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$" /></label>
    </div>
</div>
	<div id="section3">
<div class="section"><span>3</span>Your Company Info</div>	
	 <div class="inner-wrap">
		 <label>Company Name:
		 <input type="text" name="company" placeholder="optional"></label>
 <label>Position in your comapany:
	<select name="position" style="height:40px;background-color:white">
		<option value="Self Employed 2">I am individual Self Employed</option>
		<option value="Self Employed 1">I am self employed & I have a team here</option>
		<option value="Job 2">My company hired me & I am doing a job</option>
		<option value="Job 1">I am doing job but I am the team lead here </option>
	</select>
	 <label> Your Biometrics id	 <input type="text"  name="biometrics_id"></label>
	<label>I acquired  
	 <select name="space" style="height:40px;background-color:white">
	 <option>Shared Space</option>
	 <option>Dedicated Room</option>
	 </select>
	 </label>
	</label>
	</div>
    <div class="button-section">
     <input type="submit" name="Sign Up" />
    
    </div>
	</div>	
</form>
</div>

 <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="ajax/typeahead.js"></script>

<script>
    $(document).ready(function () {
		
		$('#section2').hide();
		$('#section3').hide();
		
		$('.next').click(function(){
		
		$('#cnic').blur();
		});
		
$('#cnic').blur(function(){
	myRegExp = new RegExp(/\d{5}-\d{7}-\d/);
	if(myRegExp.test($('#cnic').val())) {
		//if true
		$('#section2').show('slow');
		$('#section3').show('slow');
		$('.messagenic').hide('slow');
		$('.next').hide('slow');
	}
	else {
		$('.messagenic').text('Invalid NIC');
		$('#section2').hide('slow');
		$('#section3').hide('slow');
		
	}

});

		
		
        $('#txtlocation').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "ajax/search.php",
					data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });
</script>