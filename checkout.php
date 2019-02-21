<?php include "db/connection.php"; ?>
<?php 
if(!isset($_SESSION['email'])){
	header("location:login.php");
}

?>
<html>
<head>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<style>
/*custom font*/

@import url(http://fonts.googleapis.com/css?family=Montserrat);
/*basic reset*/
* {
margin: 0;
padding: 0;
}
html {
height: 100%;
/*Image only BG fallback*/
background: url('http://thecodeplayer.com/uploads/media/gs.png');
/*background = gradient + image pattern combo*/
background: linear-gradient(rgba(196, 102, 0, 0.2), rgba(155, 89, 182, 0.2)),  url('http://thecodeplayer.com/uploads/media/gs.png');
}
body {
font-family: montserrat, arial, verdana;
}
/*form styles*/
#msform {
width: 400px;
margin: 50px auto;
text-align: center;
position: relative;
}
#msform fieldset {
background: white;
border: 0 none;
border-radius: 3px;
box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
padding: 20px 30px;
box-sizing: border-box;
width: 80%;
margin: 0 10%;
/*stacking fieldsets above each other*/
position: absolute;
}
/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
display: none;
}
/*inputs*/
#msform input, #msform textarea {
padding: 15px;
border: 1px solid #ccc;
border-radius: 3px;
margin-bottom: 10px;
width: 100%;
box-sizing: border-box;
font-family: montserrat;
color: #2C3E50;
font-size: 13px;
}
/*buttons*/
#msform .action-button {
width: 100px;
background: #27AE60;
font-weight: bold;
color: white;
border: 0 none;
border-radius: 1px;
cursor: pointer;
padding: 10px 5px;
margin: 10px 5px;
}
#msform .action-button:hover, #msform .action-button:focus {
box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
}
/*headings*/
.fs-title {
font-size: 15px;
text-transform: uppercase;
color: #2C3E50;
margin-bottom: 10px;
}
.fs-subtitle {
font-weight: normal;
font-size: 13px;
color: #666;
margin-bottom: 20px;
}
/*progressbar*/
#progressbar {
margin-bottom: 30px;
overflow: hidden;
/*CSS counters to number the steps*/
counter-reset: step;
}
#progressbar li {
list-style-type: none;
color: white;
text-transform: uppercase;
font-size: 9px;
width: 33.33%;
float: left;
position: relative;
}
#progressbar li:before {
content: counter(step);
counter-increment: step;
width: 20px;
line-height: 20px;
display: block;
font-size: 10px;
color: #333;
background: white;
border-radius: 3px;
margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
content: '';
width: 100%;
height: 2px;
background: white;
position: absolute;
left: -50%;
top: 9px;
z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
/*connector not needed before the first step*/
content: none;
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before, #progressbar li.active:after {
background: #27AE60;
color: white;
}

.submit{
	width:300px;
	padding:2px;
}
</style>
<title>jQuery Multi-Step Form Example</title>
</head>
<body>

<h1 style="margin-top:50px" align="center">Complete your Payment</h1>
<!-- multistep form -->
<form id="msform">
<!-- progressbar -->
<ul id="progressbar">
<li class="active">DELIVERY ADDRESS</li>
<li>PAYMENT</li>
<li>CONFIRMATION</li>
</ul>
<!-- fieldsets -->
<fieldset>
<h2 class="fs-title">Delivery Address</h2>
<h3 class="fs-subtitle">Please mention your Address</h3>
<input type="text" name="email" id="d_name" placeholder="Name...."  required/>
<input type="text" name="pass" id="d_city" placeholder="City" required>
<textarea cols="5" rows="5" placeholder="Your Full Address.." id="d_address"></textarea>
<a href="index.php"><input type="button" class="action-button" value="Cancel" style="background:red;"></a>
<input type="button" name="next" id="step1" class="next action-button" value="Next" disabled="disabled" style="background:#ddd;">

</fieldset>
<fieldset>
<h2 class="fs-title">Payment</h2>
<h3 class="fs-subtitle">Pay Securely with Us</h3>
<?php 
				$total = 0;
				$sel = "select * from cart where session_id='$cookie_id'";
				$run = mysqli_query($con,$sel);
				$count_cart = mysqli_num_rows($run);
				while($row=mysqli_fetch_array($run)){
					$p_id = $row['p_id'];
					$p_title = $row['p_title'];
					$p_image = $row['p_image'];
					$p_price = $row['p_price'];
					$p_qty = $row['p_qty'];
					
					
					$total += ($p_price * $p_qty);
				}
				
				$random = mt_rand(1000,10000000);
				
				$get_user = "select c_id from customer where c_email ='$s_email'";
				$run_get = mysqli_query($con,$get_user);
				$get = mysqli_fetch_array($run_get);
				$u_id = $get['c_id'];
				
?>
<input type="number" name="num" id="num" placeholder="Enter Dummy Card Number">
<input type="text" name="expiry date" id="expiry" name="expiry" placeholder="Expiry date">
<input type="number" name="cvv" id="cvv" name="cvv" placeholder="Enter CVV">
<input type="button" name="total" id="total" value="Total Payment Rs. <?php echo $total; ?>" style="background:#66B5F0;font-weight:bolder;">
<a href="index.php"><input type="button" class="action-button" value="Cancel" style="background:red;"></a>
<input type="button" name="next" id="pay" class="paynow action-button" value="Pay Now" disabled="disabled" style="background:#ddd;"/>
</fieldset>
<fieldset>
<h2 class="fs-title">Confirmation</h2>
<h3 class="fs-subtitle">Your Order Has been Confirmed</h3>
<h1>Your Order ID is </h1><br><h2><?php echo $random; ?></h2><br>

</fieldset>
</form>

<!-- jQuery --> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- jQuery easing plugin --> 
<script src="js/jquery.easing.min.js" type="text/javascript"></script> 
<script>
$(function() {

//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".paynow").on('click',function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
		
		

	});
	
	
	

	
});

$(".paynow").on('click',function(){
	
     var order_id = <?php echo $random; ?>;
	 var u_id = <?php echo $u_id; ?>;
	  var total = <?php echo $total; ?>;
	 var d_name = $("#d_name").val();
	 var d_city = $("#d_city").val();
	 var d_address = $("#d_address").val();
	
	 
	   $.ajax({
		   url:"payment.php",
		   method:"post",
		   data:{order_id:order_id,u_id:u_id,d_name:d_name,d_city:d_city,d_address:d_address,total:total},
		   success($data){
			   if($data < 1){
				   $.ajax({
					   url:"payment.php",
					   method:"post",
					   data:{order:order_id},
					   success: function($confirm){
						   if($confirm > 0){
							   setTimeout(function(){ window.location.href = "index.php?thank"; }, 1000);
							    
						   }
					   }
					   
				   })
			   }
		   }
	   });
	
	
	
});


$(".submit").click(function(){
	return false;
})

});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script>
$("#d_name, #d_city, textarea").on("keyup", function(){
    if($("#d_name").val() != "" && $("textarea").val() != "" && $("#d_city").val() != ""){
        $("#step1").removeAttr("disabled").css("background","#27AE60");
    } else {
        $("#step1").attr("disabled", "disabled").css("background","#ddd");
    }
});

$("#num, #expiry, #cvv").on("keyup", function(){
    if($("#num").val() != "" && $("#expiry").val() != "" && $("#cvv").val() != ""){
        $("#pay").removeAttr("disabled").css("background","#27AE60");
    } else {
        $("#pay").attr("disabled", "disabled").css("background","#ddd");
    }
});



</script>
</body>

</html>



