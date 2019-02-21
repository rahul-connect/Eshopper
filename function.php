
<?php  // To Fetch filtered Brands
include "db/connection.php";

if(isset($_POST['id'])){
	$id = $_POST['id'];
	
	$select = "select * from product where p_brand ='$id'";
    $run = mysqli_query($con,$select);
						while($row=mysqli_fetch_array($run)){
							$id = $row['id'];
							$name = $row['p_name'];
							$image = $row['p_image'];
							$price = $row['p_price'];
							
							
						echo "
						<div class='col-sm-4'>
							<div class='product-image-wrapper'>
								<div class='single-products'>
									<div class='productinfo text-center'>
										<img src='admin/images/$image' alt='' >
										<h2><span>Rs.</span>$price</h2>
										<p>$name</p>
										<a href='javascript:void(0)' class='btn btn-default add-to-cart' onclick = 'cart($id)'><i class='fa fa-shopping-cart'></i>Add to cart</a>
									<a href='$add_wish' class='btn btn-default add-to-cart wish' data-user='$s_email' onclick='wish($id)'><i class='glyphicon glyphicon-heart'></i> Wishlist</a>
									</div>
									
								</div>
								<div class='choose'>
									<ul class='nav nav-pills nav-justified'>
										
									</ul>
								</div>
							</div>
						</div>
						";
						}
	
	
}

if(isset($_POST['sub'])){
	$id = $_POST['sub'];
	
	$select = "select * from product where p_sub ='$id'";
    $run = mysqli_query($con,$select);
						while($row=mysqli_fetch_array($run)){
							$id = $row['id'];
							$name = $row['p_name'];
							$image = $row['p_image'];
							$price = $row['p_price'];
							
							
						echo "
						<div class='col-sm-4'>
							<div class='product-image-wrapper'>
								<div class='single-products'>
									<div class='productinfo text-center'>
										<img src='admin/images/$image' alt='' >
										<h2><span>Rs.</span>$price</h2>
										<p>$name</p>
										<a href='javascript:void(0)' class='btn btn-default add-to-cart' onclick = 'cart($id)'><i class='fa fa-shopping-cart'></i>Add to cart</a>
									  <a href='$add_wish' class='btn btn-default add-to-cart wish' data-user='$s_email' onclick='wish($id)'><i class='glyphicon glyphicon-heart'></i> Wishlist</a>
									</div>
									
								</div>
								<div class='choose'>
									<ul class='nav nav-pills nav-justified'>
										
									</ul>
								</div>
							</div>
						</div>
						";
						}
	
	
}


if(isset($_POST['c_id'])){
	$id = $_POST['c_id'];
	
	$select = "select * from product where p_category ='$id'";
    $run = mysqli_query($con,$select);
						while($row=mysqli_fetch_array($run)){
							$id = $row['id'];
							$name = $row['p_name'];
							$image = $row['p_image'];
							$price = $row['p_price'];
							
							
						echo "
						<div class='col-sm-4'>
							<div class='product-image-wrapper'>
								<div class='single-products'>
									<div class='productinfo text-center'>
										<img src='admin/images/$image' alt='' >
										<h2><span>Rs.</span>$price</h2>
										<p>$name</p>
										<a href='javascript:void(0)' class='btn btn-default add-to-cart' onclick = 'cart($id)'><i class='fa fa-shopping-cart'></i>Add to cart</a>
									<a href='$add_wish' class='btn btn-default add-to-cart wish' data-user='$s_email' onclick='wish($id)'><i class='glyphicon glyphicon-heart'></i> Wishlist</a>
									</div>		
								</div>
								<div class='choose'>
									<ul class='nav nav-pills nav-justified'>
										
									</ul>
								</div>
							</div>
						</div>
						";
						}
	
	
}

// Funtion for add to cart

	if(isset($_POST['p_id'])){
		$p_id = $_POST['p_id'];
		$review_cart = "select * from cart where p_id='$p_id' && session_id='$cookie_id'";
		$run_review = mysqli_query($con,$review_cart);
		
		if (mysqli_num_rows($run_review) > 0 ){
		 echo 1;
		 
		}else{
			
		
		$sel = "select * from product where id='$p_id'";
		$query = mysqli_query($con,$sel);
		$row = mysqli_fetch_array($query);
		$name = $row['p_name'];
		$price = $row['p_price'];
		$image = $row['p_image'];
		
		$insert = "insert into cart(p_id,p_title,p_image,p_price,p_qty,session_id) VALUES('$p_id','$name','$image','$price','1','$cookie_id')";
		$run_insert = mysqli_query($con,$insert);
		echo 0;
		}
	}
	
	
	

// To refresh number of product count in the cart

if(isset($_GET['cart_count'])){
	$cookie = $_GET['cart_count'];
	$check_cart = "select p_id from cart where session_id='$cookie'";
	$run_check = mysqli_query($con,$check_cart);
	$count_cart = mysqli_num_rows($run_check);
	echo $count_cart;
	
}


// To delete product from cart 
if(isset($_POST['del'])){
	$del_id = $_POST['del'];
	$del_cart = "delete from cart where p_id='$del_id' && session_id='$cookie_id'";
	$run_del = mysqli_query($con,$del_cart);
	if($run_del){
		echo 1;
	}else{
		echo 0;
	}
}


// To update cart qty

if(isset($_POST['qty'])){
	$qty = $_POST['qty'];
	$pro_id = $_POST['pro_id'];
	$update_cart = "update cart set p_qty='$qty' where session_id='$cookie_id' && p_id='$pro_id'";
    $run_update_cart = mysqli_query($con,$update_cart);
	
	
	
	
}

// function to view wish list


if(isset($_POST['email'])){
	$email= $_POST['email'];
	$w_id= $_POST['w_id'];
	
	$select_wish = "select p_id from wishlist where user_email='$email' && p_id='$w_id'";
	$run_select = mysqli_query($con,$select_wish);
	if(mysqli_num_rows($run_select) > 0){
		echo 1;
		
	}else{
		
	$select_cart = "select * from product where id='$w_id'";
	$run_select_cart = mysqli_query($con,$select_cart);
	$fetch = mysqli_fetch_array($run_select_cart);
	$p_name = $fetch['p_name'];
	$p_price = $fetch['p_price'];
	$p_image = $fetch['p_image'];
	
	$insert_wish = "insert into wishlist(p_id,p_title,p_image,p_price,user_email) VALUES('$w_id','$p_name','$p_image','$p_price','$email')";
	$run_wish = mysqli_query($con,$insert_wish);
	if($run_wish){
		echo 0;
	}
	
	}
	
}

// Delete item from wishlist

if(isset($_POST['del_wish'])){
	$del_wish = $_POST['del_wish'];
	
	$remove_wish = "delete from wishlist where p_id='$del_wish' && user_email='$s_email'";
	$run_remove = mysqli_query($con,$remove_wish);
	if($run_remove){
		echo 1;
	}
	
}

// Function to add to cart from wishlist

if(isset($_POST['add_id'])){
	$add_id_cart = $_POST['add_id'];
	$qty =1;
	
	$check_cart_wish = "select * from cart where p_id='$add_id_cart' && session_id='$cookie_id'";
	$run_check_wish = mysqli_query($con,$check_cart_wish);
	$count_check = mysqli_num_rows($run_check_wish);
	if($count_check > 0){
		echo 0;
		exit();
	}else{
		
	
	
	$sel_id_cart = "select * from wishlist where p_id='$add_id_cart' && user_email='$s_email'";
	$run_sel_cart = mysqli_query($con,$sel_id_cart);
	$fetch_run = mysqli_fetch_array($run_sel_cart);
	   $w_t = $fetch_run['p_title'];
	   $w_i = $fetch_run['p_image'];
	   $w_p = $fetch_run['p_price'];
	   
	 $insert_cart = "insert into cart(p_id,p_title,p_image,p_price,p_qty,session_id) VALUES('$add_id_cart','$w_t','$w_i','$w_p','$qty','$cookie_id')";
	 $run_insert_cart = mysqli_query($con,$insert_cart);
	 if($run_insert_cart){
		 $del_wish = "delete from wishlist where p_id='$add_id_cart' && user_email='$s_email'";
		 $run_del_wish = mysqli_query($con,$del_wish);
		 if($run_del_wish){
			 echo 1;
		 }
	 }
	
	}
}
	
// function to update count of wishlist badge

if(isset($_GET['wish_count'])){
	$w_email = $_GET['wish_count'];
	$count_wish = "select * from wishlist where user_email='$w_email'";
	$run_count = mysqli_query($con,$count_wish);
	$count_wish_num = mysqli_num_rows($run_count);
	echo $count_wish_num;
	
	
}	


// function to edit account of user

if(isset($_GET['edit_user'])){
	$u_edit = $_GET['edit_user'];
$sel_u = "select * from customer where c_email='$u_edit'";
$run_u = mysqli_query($con,$sel_u);
$user_data = mysqli_fetch_array($run_u);
$user_id = $user_data['c_id'];
$user_n = $user_data['c_name'];
$cus_id = $user_data['c_id'];
$user_e = $user_data['c_email'];
$user_p = $user_data['c_pass'];
$user_i = $user_data['c_image'];
	
	echo "<div class='panel-heading'>
              <h3 class='panel-title'>Edit Your Account</h3>
            </div>
			<div class='panel-body'>
			<div class='row'>
			<div class='col-xs-8 col-xs-offset-2'>
			      <form class='form-horizontal' role='form' enctype='multipart/form-data' action='function.php' method='post'>
				     <div class='form-group'>
					    <label for='user_name'>Name : </label>
					    <input type='text' class='form-control' value='$user_n' name='user_name' id='user_name'>
					 </div>
					 
					 <div class='form-group'>
					    <label for='user_email'>Email : </label>
					    <input type='text' class='form-control' value='$user_e' id='user_email' name='user_email'>
					 </div>
					 
					 <div class='form-group'>
					    <label for='user_pass'>Password : </label>
					    <input type='text' class='form-control' value='$user_p' id='user_pass' name='user_pass'>
					 </div>
					 
					 <div class='form-group'>
					    <label for='user_image'>Profile Image : </label>
					    <input type='file' class='form-control' id='user_image' name='user_image'>
						<center><img src='images/user_images/$user_i' width='70px' height='70px' style='margin-top:15px;border:1px solid black'></center>
					 </div>
				  <input type='submit' id='save' value='Save' name='save' class='btn btn-block btn-success' style='padding:5px;'>
				  </form>
	        </div>
	 </div>
	</div>
	<div class='panel-footer'>
              <center><div>
				          
                        </div></center>
            </div>
			
	
	";
	
	
	
	
	
}
// Function to edit user account

if(isset($_POST['save'])){
	$u_n = $_POST['user_name'];
	$u_e = $_POST['user_email'];
	$u_p = $_POST['user_pass'];
	$u_i = $_FILES['user_image']['name'];
	$u_tmp = $_FILES['user_image']['tmp_name'];
	
	if($u_i != ""){
		$update_edit = "update customer set c_name='$u_n',c_email='$u_e',c_pass='$u_p',c_image='$u_i' WHERE c_email='$s_email'"; 
	    $run_insert_edit = mysqli_query($con,$update_edit);
	}else{
		$update_edit = "update customer set c_name='$u_n',c_email='$u_e',c_pass='$u_p' WHERE c_email='$s_email'"; 
	    $run_insert_edit = mysqli_query($con,$update_edit);
	}
	
	if($run_insert_edit){
		move_uploaded_file($u_tmp,"images/user_images/$u_i");
		header("location:account.php?edit_yes");
	}
	
}
	
// Function to cancel an order by user

if(isset($_POST['c_id'])){
    $cancel_id = $_POST['c_id'];
	
	$cancel_order = "update order_address set order_status='cancelled' WHERE order_id='$cancel_id'";
	$run_cancel =  mysqli_query($con,$cancel_order);
	if($run_cancel){
		echo 1;
	}
	
}	

if(isset($_POST['forgot'])){
	$forgot = $_POST['forgot'];
	$check_user = "select * from customer where c_email = '$forgot'";
	$run_check_user = mysqli_query($con,$check_user);
	$num_user = mysqli_num_rows($run_check_user);
	if($num_user == 1){
		echo 1;
	}else{
		echo 0;
	}
	
}

if(isset($_GET['ok_email'])){
	$ok_email = $_GET['ok_email'];
    $code = md5($ok_email.time());
	
	$insert_code = "insert into forgot_pass(user_email,code) VALUES('$ok_email','$code')";
	$run_code = mysqli_query($con,$insert_code);
	
	if($run_code){
		include('mail.php');
			$to=$ok_email;
			$subject="Forgot Password Link";
			$body = "Please Change your Flying Shopee Account password by clicking on the link<br><a href='http://www.flyingshopee.pe.hu/Eshopper/change_pass.php?code=$code'>$code</a>";
			
			Send_Mail($to,$subject,$body);
           
	}
	
	
}

if(isset($_POST['change_e'])){
    $change_e = $_POST['change_e'];	
    $change_p = $_POST['change_p'];

   $update_change = "update customer set c_pass ='$change_p' WHERE c_email = '$change_e'";
   $run_change_update = mysqli_query($con,$update_change);   
   $delete_code = "delete from forgot_pass where user_email='$change_e'";
   $run_del_code = mysqli_query($con,$delete_code);
}




?>