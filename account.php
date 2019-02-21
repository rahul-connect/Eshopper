<?php include "inc/header.php"; ?>
<?php
$sel_info = "select * from customer where c_email='$s_email'";
$run_info = mysqli_query($con,$sel_info);
$info = mysqli_fetch_array($run_info);
$n = $info['c_name'];
$c_id = $info['c_id'];
$e = $info['c_email'];
$p = $info['c_pass'];
$i = $info['c_image'];

$total_order = "select * from order_address where user_id='$c_id' ORDER BY 1 DESC";
$run_total = mysqli_query($con,$total_order);
$count_total = mysqli_num_rows($run_total);
if($count_total > 0){
	$count_final = $count_total;
}else{
	$count_final = 0;
}

$delivered = "select * from order_address where order_status='delivered' && user_id='$c_id'";
$run_delivered = mysqli_query($con,$delivered);
$count_delivered = mysqli_num_rows($run_delivered);
if($count_delivered > 0){
	$final_delivered = $count_delivered;
}else{
	$final_delivered =0;
}

$cancelled = "select * from order_address where order_status='cancelled' && user_id='$c_id'";
$run_cancelled = mysqli_query($con,$cancelled);
$count_cancelled = mysqli_num_rows($run_cancelled);
if($count_cancelled > 0){
	$final_cancelled = $count_delivered;
}else{
	$final_cancelled =0;
}

?>
<link href="css/account.css" rel="stylesheet">

<div class="col-lg-12 col-sm-12 col-xs-12">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="images/banner.jpg">

        </div>
        <div class="useravatar">
            <img alt="" src="images/user_images/<?php echo $i; ?>">
        </div>
        <div class="card-info"> <span class="card-title"><?php echo $n; ?></span>

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="">My Account</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                <div class="">My Orders</div>
            </button>
        </div>
        
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
          <div class="container">
      <div class="row">
      
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info" id="edit_ajax">
            <div class="panel-heading">
              <h3 class="panel-title">Your Account Details</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                
               
                <div class="col-md-12 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name :</td>
                        <td><?php echo $n; ?></td>
                      </tr>
                      <tr>
                        <td>Email :</td>
                        <td><?php echo $e; ?></td>
                      </tr>
                      <tr>
                        <td>Password </td>
                        <td>*********</td>
                      </tr>
					  
					  <tr>
                        <td>Image </td>
                        <td><?php echo $i; ?></td>
                      </tr>
                    <tr>
                        <td>Total Orders</td>
                        <td><?php echo $count_final; ?></td>
                      </tr>
                         <tr>
                             <tr>
                        <td>Orders Delivered</td>
                        <td><?php echo $final_delivered; ?></td>
                      </tr>
                        <tr>
                        <td>Orders Cancelled</td>
                        <td><?php echo $final_cancelled; ?></td>
                      </tr>
					  
					 
                      
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                 
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <center><div class="" style="height:20px;margin-bottom:15px;">
						 <a href="javascript:void(0)" data-original-title="Edit this user" data-toggle="tooltip" type="button" id="edit" class="btn btn-md btn-warning"><i class="glyphicon glyphicon-edit"></i>&nbsp;Edit your account</a>

                        </div></center>
                    </div>
            
          </div>
        </div>
      </div>
    </div>
        </div>
        <div class="tab-pane fade in" id="tab2">
                <div class="row">
      
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   <?php
   while($fetch = mysqli_fetch_array($run_total)){
	   $order_id = $fetch['order_id'];
	   $order_city = $fetch['city'];
	   $order_ad = $fetch['address'];
	   $order_amt = $fetch['total_amount'];
	   $order_status = $fetch['order_status'];
	   
	   if($order_status == "cancelled"){
		   
		   $text_decoration = "line-through";
		   $mark = "cancel_mark";
		   $display ="none";
		   
	   }else if($order_status == "delivered"){
		   $text_decoration = "none";
		   $mark = "deliver_mark";
		   $display ="none";
		   
	   }else{
		   
		   $text_decoration = "none";
		   $mark = "";
		   $display = "";
	   }
   
   $p_details = "select * from order_details where order_id='$order_id'";
   $run_details = mysqli_query($con,$p_details);
     
			
   
   ?>
   
          <div class="panel panel-info" id="my_order" style="margin-bottom:15px;">
            <div class="panel-heading">
              <h3 class="panel-title">Order Id - <?php echo $order_id; ?> </h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12 col-lg-12 "> 
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Price</th>
                     
                      </tr>
					  <?php
					   while($fetch_p = mysqli_fetch_array($run_details)){
				$pro_id = $fetch_p['pro_id'];
				$qty = $fetch_p['qty'];
				   $sel_all = "select * from product where id='$pro_id'";
				   $run_sel = mysqli_query($con,$sel_all);
				   $fetch_pro = mysqli_fetch_array($run_sel);
				       $pro_price = $fetch_pro['p_price'];
				       $pro_image = $fetch_pro['p_image'];
				       $pro_name = $fetch_pro['p_name'];
					  
					  ?>
					  <tr>
					  <td><p style="text-decoration:<?php echo $text_decoration; ?>"><?php echo $pro_name; ?></p></td>
					  <td><img src="admin/images/<?php echo $pro_image; ?>" width="50" height="50"></td>
					  <td style="text-decoration:<?php echo $text_decoration; ?>"><?php echo $qty; ?></td>
					  <td style="text-decoration:<?php echo $text_decoration; ?>"><?php echo $pro_price; ?></td>
                      </tr>
					   <?php } ?>					  
                    </tbody>
                  </table>
				  
				  <h5 style="text-decoration:<?php echo $text_decoration; ?>"><span class="glyphicon glyphicon-home"></span>&nbsp;Delivery Address : <span style="font-family:COMIC SANS MS;"><?php echo ucfirst($order_ad) ?> ,&nbsp;<?php echo $order_city; ?></span></h5>
				  <h5 id="status"><span class="glyphicon glyphicon-time"></span>&nbsp;Order Status :<span class="<?php echo $mark; ?>"> <?php echo $order_status; ?></span></h5>
				  <h5 style="text-decoration:<?php echo $text_decoration; ?>"><span class="glyphicon glyphicon-star"></span>&nbsp;Total Amount : Rs. <?php echo $order_amt; ?></h5>
                </div>
				
              </div>
            </div>
                 <div class="panel-footer">
                       <center style="display:<?php echo $display; ?>;"><input type="button" value="Cancel Order" class="btn btn-danger cancel" data-cancel="<?php echo $order_id; ?>"></center>
                    </div>
            
          </div>
		  
		  <?php 
		  } 
		  ?>
        </div>
      </div>
    
		  
        </div>
        
      </div>
    </div>
    
    </div>
            
    
          <script>
		  
$(document).ready(function() {
$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).removeClass("btn-default").addClass("btn-primary");   
});

$("#edit").on("click",function(){
	
	$.ajax({
		url:"function.php?edit_user=<?php echo $s_email; ?>",
		method:"post",
		success($data){
			$("#edit_ajax").html($data);
		}
	});
	
});


});
</script>
<?php include "inc/footer.php"; ?>

<?php
if(isset($_GET["edit_yes"])){
	echo "<script>
	     notif({
						msg:'Account Details has been updated',
						type:'success',
						width:330,
						height:40,
						timeout:2000,
						
					})
		 
		 
		 
		 </script>
	";
}

?>
<script>
$(".cancel").on("click",function(){
	var c_id = $(this).data("cancel");
	
	$.ajax({
		url:"function.php",
		method:"post",
		data:{c_id:c_id},
		success: function($cancel){
			if($cancel > 0){
				 
                 window.location.reload(true);
			}
		}
	})
	
});



</script>















