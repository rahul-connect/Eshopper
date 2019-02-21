    <!---Header Starts--->
	<?php include "inc/header.php"; ?>
	<!---Header Ends--->
	
	<!---Slider Starts--->
	<?php include "inc/slider.php"; ?>
    <!---Slider Ends---->
	
	
	<section>
		<div class="container">
			<div class="row">
			<!---Sidebar Starts--->
				  <?php include "inc/sidebar.php"; ?>
		 <!---Sidebar Ends--->
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
				        
						
						<?php
						$select = "select * from product ORDER BY RAND() LIMIT 0,6";
						$run = mysqli_query($con,$select);
						
							
						
						while($row=mysqli_fetch_array($run)){
							$id = $row['id'];
							$name = $row['p_name'];
							$image = $row['p_image'];
							$price = $row['p_price'];
							
							
							
						
						
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="admin/images/<?php echo $image; ?>" alt="" >
										<h2><span>Rs.</span><?php echo $price; ?></h2>
										<p><?php echo $name; ?></p>
										<a href="javascript:void(0)" class="btn btn-default add-to-cart" onclick="cart(<?php echo $id; ?>)"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										<a href="<?php echo $add_wish ?>" class="btn btn-default add-to-cart wish" data-user="<?php echo $s_email; ?>" onclick="wish(<?php echo $id; ?>)"><i class="glyphicon glyphicon-heart"></i> Wishlist</a>
									</div>
									
									<img src="images/home/new.png" class="new" alt="" />
								</div>
								
							</div>
						</div>
						<?php } ?>
						
						
					</div><!--features_items-->
				
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
								<li><a href="#blazers" data-toggle="tab">Blazers</a></li>
								<li><a href="#jeans" data-toggle="tab">Jeans</a></li>
								<li><a href="#tops" data-toggle="tab">Tops</a></li>
								<li><a href="#skirts" data-toggle="tab">Skirts</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >
							<?php
							$tshirt = "SELECT * from product where p_sub='7' ORDER BY RAND() LIMIT 0,4";
							$run_t = mysqli_query($con,$tshirt);
							while($shirt = mysqli_fetch_array($run_t)){
							$id = $shirt['id'];
							$name = $shirt['p_name'];
							$image = $shirt['p_image'];
							$price = $shirt['p_price'];
								
							
							
							?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="admin/images/<?php echo $image; ?>" alt="" />
												<h2><span>Rs.</span><?php echo $price; ?></h2>
												<p><?php echo $name; ?></p>
												<a href="javascript:void(0)" class="btn btn-default add-to-cart" onclick="cart(<?php echo $id; ?>)"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											    <a href="<?php echo $add_wish ?>" class="btn btn-default add-to-cart wish" data-user="<?php echo $s_email; ?>" onclick="wish(<?php echo $id; ?>)"><i class="glyphicon glyphicon-heart"></i> Wishlist</a>
											</div>
											
										</div>
									</div>
								</div>
							
							<?php } ?>
							</div>

							<div class="tab-pane fade" id="blazers" >
							<?php
							$blazer = "SELECT * from product where p_sub='12' ORDER BY RAND() LIMIT 0,4";
							$run_blaz = mysqli_query($con,$blazer);
							while($blaz = mysqli_fetch_array($run_blaz)){
							$id = $blaz['id'];
							$name = $blaz['p_name'];
							$image = $blaz['p_image'];
							$price = $blaz['p_price'];
								
							
							
							?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="admin/images/<?php echo $image; ?>" alt="" />
												<h2><span>Rs.</span><?php echo $price; ?></h2>
												<p><?php echo $name; ?></p>
												<a href="javascript:void(0)" class="btn btn-default add-to-cart" onclick="cart(<?php echo $id; ?>)"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											    <a href="<?php echo $add_wish ?>" class="btn btn-default add-to-cart wish" data-user="<?php echo $s_email; ?>" onclick="wish(<?php echo $id; ?>)"><i class="glyphicon glyphicon-heart"></i> Wishlist</a>
											</div>
											
										</div>
									</div>
								</div>
								
							<?php } ?>
							</div>
							
							<div class="tab-pane fade" id="jeans" >
							   <?php
							$jeans = "SELECT * from product where p_sub='9' ORDER BY RAND() LIMIT 0,4";
							$run_jean = mysqli_query($con,$jeans);
							while($jean = mysqli_fetch_array($run_jean)){
							$id = $jean['id'];
							$name = $jean['p_name'];
							$image = $jean['p_image'];
							$price = $jean['p_price'];
							?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="admin/images/<?php echo $image; ?>" alt="" />
												<h2><span>Rs.</span><?php echo $price; ?></h2>
												<p><?php echo $name; ?></p>
												<a href="javascript:void(0)" class="btn btn-default add-to-cart" onclick="cart(<?php echo $id; ?>)"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											<a href="<?php echo $add_wish ?>" class="btn btn-default add-to-cart wish" data-user="<?php echo $s_email; ?>" onclick="wish(<?php echo $id; ?>)"><i class="glyphicon glyphicon-heart"></i> Wishlist</a>
											</div>
											
										</div>
									</div>
								</div>
							<?php } ?>
								
							</div>
							
							<div class="tab-pane fade" id="tops" >
							 <?php
							$tops = "SELECT * from product where p_sub='8' ORDER BY RAND() LIMIT 0,4";
							$run_top = mysqli_query($con,$tops);
							while($top = mysqli_fetch_array($run_top)){
							$id = $top['id'];
							$name = $top['p_name'];
							$image = $top['p_image'];
							$price = $top['p_price'];
							?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="admin/images/<?php echo $image; ?>" alt="" />
												<h2><span>Rs.</span><?php echo $price; ?></h2>
												<p><?php echo $name; ?></p>
												<a href="javascript:void(0)" class="btn btn-default add-to-cart" onclick="cart(<?php echo $id; ?>)"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											<a href="<?php echo $add_wish ?>" class="btn btn-default add-to-cart wish" data-user="<?php echo $s_email; ?>" onclick="wish(<?php echo $id; ?>)"><i class="glyphicon glyphicon-heart"></i> Wishlist</a>
											</div>
											
										</div>
									</div>
								</div>
							<?php } ?>

								
							</div>
							
							<div class="tab-pane fade" id="skirts" >
							 <?php
							$skirts = "SELECT * from product where p_sub='11' ORDER BY RAND() LIMIT 0,4";
							$run_skirt = mysqli_query($con,$skirts);
							while($skirt = mysqli_fetch_array($run_skirt)){
							$id = $skirt['id'];
							$name = $skirt['p_name'];
							$image = $skirt['p_image'];
							$price = $skirt['p_price'];
							?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="admin/images/<?php echo $image; ?>" alt="" />
												<h2><span>Rs.</span><?php echo $price; ?></h2>
												<p><?php echo $name; ?></p>
												<a href="javascript:void(0)" class="btn btn-default add-to-cart" onclick="cart(<?php echo $id; ?>)"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											<a href="<?php echo $add_wish ?>" class="btn btn-default add-to-cart wish" data-user="<?php echo $s_email; ?>" onclick="wish(<?php echo $id; ?>)"><i class="glyphicon glyphicon-heart"></i> Wishlist</a>
											</div>
											
										</div>
									</div>
								</div>
							<?php } ?>
								
							</div>
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
								  <?php
							$s_slider = "SELECT * from product ORDER BY RAND() LIMIT 0,3";
							$run_slider = mysqli_query($con,$s_slider);
							while($slider = mysqli_fetch_array($run_slider)){
							$id = $slider['id'];
							$name = $slider['p_name'];
							$image = $slider['p_image'];
							$price = $slider['p_price'];
							?>
								
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="admin/images/<?php echo $image; ?>" alt="" />
													<h2><span>Rs.</span><?php echo $price; ?></h2>
													<p><?php echo $name; ?></p>
													<a href="javascript:void(0)" class="btn btn-default add-to-cart" onclick="cart(<?php echo $id; ?>)"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												<a href="<?php echo $add_wish ?>" class="btn btn-default add-to-cart wish" data-user="<?php echo $s_email; ?>" onclick="wish(<?php echo $id; ?>)"><i class="glyphicon glyphicon-heart"></i> Wishlist</a>
												</div>
												
											</div>
										</div>
									</div>
							<?php } ?>
									
								</div>
								<div class="item">
								<?php
							
							$s_slider = "SELECT * from product ORDER BY RAND() LIMIT 0,3";
							$run_slider = mysqli_query($con,$s_slider);
							while($slider = mysqli_fetch_array($run_slider)){
							$id = $slider['id'];
							$name = $slider['p_name'];
							$image = $slider['p_image'];
							$price = $slider['p_price'];
							
							?> 
							   	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="admin/images/<?php echo $image; ?>" alt="" />
													<h2><span>Rs.</span><?php echo $price; ?></h2>
													<p><?php echo $name; ?></p>
													<a href="javascript:void(0)" class="btn btn-default add-to-cart" onclick="cart(<?php echo $id; ?>)"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												<a href="<?php echo $add_wish ?>" class="btn btn-default add-to-cart wish" data-user="<?php echo $s_email; ?>" onclick="wish(<?php echo $id; ?>)"><i class="glyphicon glyphicon-heart"></i> Wishlist</a>
												</div>
												
											</div>
										</div>
									</div>
									
							<?php } ?>
							
								</div>	
								
								<div class="item">
								<?php
							
							$s_slider = "SELECT * from product ORDER BY RAND() LIMIT 0,3";
							$run_slider = mysqli_query($con,$s_slider);
							while($slider = mysqli_fetch_array($run_slider)){
							$id = $slider['id'];
							$name = $slider['p_name'];
							$image = $slider['p_image'];
							$price = $slider['p_price'];
							
							?> 
							   	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="admin/images/<?php echo $image; ?>" alt="" />
													<h2><span>Rs.</span><?php echo $price; ?></h2>
													<p><?php echo $name; ?></p>
													<a href="javascript:void(0)" class="btn btn-default add-to-cart" onclick="cart(<?php echo $id; ?>)"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												<a href="<?php echo $add_wish ?>" class="btn btn-default add-to-cart wish" data-user="<?php echo $s_email; ?>" onclick="wish(<?php echo $id; ?>)"><i class="glyphicon glyphicon-heart"></i> Wishlist</a>
												</div>
												
											</div>
										</div>
									</div>
									
							<?php } ?>
							
								</div>	
								
								<div class="item">
								<?php
							
							$s_slider = "SELECT * from product ORDER BY RAND() LIMIT 0,3";
							$run_slider = mysqli_query($con,$s_slider);
							while($slider = mysqli_fetch_array($run_slider)){
							$id = $slider['id'];
							$name = $slider['p_name'];
							$image = $slider['p_image'];
							$price = $slider['p_price'];
							
							?> 
							   	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="admin/images/<?php echo $image; ?>" alt="" />
													<h2><span>Rs.</span><?php echo $price; ?></h2>
													<p><?php echo $name; ?></p>
													<a href="javascript:void(0)" class="btn btn-default add-to-cart" onclick="cart(<?php echo $id; ?>)"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												<a href="<?php echo $add_wish ?>" class="btn btn-default add-to-cart wish" data-user="<?php echo $s_email; ?>" onclick="wish(<?php echo $id; ?>)"><i class="glyphicon glyphicon-heart"></i> Wishlist</a>
												</div>
												
											</div>
										</div>
									</div>
									
							<?php } ?>
							
								</div>
								
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
	<!---Footer Starts--->
	<?php include "inc/footer.php"; ?>
	<!---Footer Ends--->
	<script>
		function cart($pro_id){
		var p_id = $pro_id;
		
		$.ajax({
			url:"function.php",
			method:"post",
			data:{p_id:p_id},
			success: function($data){
			    if($data > 0){
					notif({
						msg:"Product Already Added !!!",
						type:"warning",
						width:330,
						height:40,
						timeout:1000,
						
					})
					
				}else{
					notif({
						msg:"Added to Cart",
						type:"success",
						width:330,
						height:40,
						timeout:1000,
						
					})
				}
				   	
			}
			
		})
		
	}
	
	function wish($p_id){
		var w_id = $p_id;
		var email = $(".wish").data("user");
		
		if(email != 0){
		$.ajax({
			url:"function.php",
			method:"post",
			data:{w_id:w_id,email:email},
			success: function($wish){
				    if($wish > 0){
					notif({
						msg:"Product Already Added to wishlist!!!",
						type:"warning",
						width:330,
						height:40,
						timeout:1000,
						
					})
					
				}else{
					notif({
						msg:"Added to wishlist",
						type:"success",
						width:330,
						height:40,
						timeout:1000,
						
					})
				}
			}
		})
		}
	}
	

	
	</script>
	<?php
	if(isset($_GET['logout'])){
		echo "<script>
		notif({
				        msg:'You Have logged out Successfully !!',
						type:'warning',
						width:330,
						height:40,
						timeout:2000,
						
					})
					</script>
		";
		
	}
	
	if(isset($_GET['login'])){
		echo "<script>
		notif({
				        msg:'You Have logged in Successfully !!',
						type:'success',
						width:330,
						height:40,
						timeout:2000,
						
					})
					</script>
		";
		
	}
		if(isset($_GET['account'])){
		echo "<script>
		notif({
				        msg:'Your Account has been created Successfully !!',
						type:'success',
						width:330,
						height:40,
						timeout:2000,
						
					})
					</script>
		";
		
	}
	
	if(isset($_GET['thank'])){
		echo "<script>
		notif({
				        msg:'Thank you for shopping with us!!',
						type:'success',
						width:330,
						height:40,
						timeout:2000,
						
					})
					</script>
		";
		
	}
	
	
	?>