<?php include "db/connection.php"; ?>
<?php

if(isset($_POST['id'])){
	$id = $_POST['id'];
	
	$select = "select * from product WHERE id < $id ORDER by id DESC LIMIT 12";
	$query = mysqli_query($con,$select);
	 if(mysqli_num_rows($query)>0){
	                   while($row=mysqli_fetch_array($query)){
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
										<li><a href=''><i class='fa fa-plus-square'></i>Add to wishlist</a></li>
										<li><a href=''><i class='fa fa-plus-square'></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						";
						}
						
						echo "<div id='more'>
                       <input type='hidden' value = 'Loading......' id='last_id' class ='$id'>
   
	                    </div>";
	}else{
		echo "";
		exit();
		
	}
}
?>


