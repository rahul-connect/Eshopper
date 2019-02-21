<?php include("inc/header.php"); ?>

	<div class="container">
	<span class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">Wishlist</li>
				</ol>
			</span><!--/breadcrums-->
	<div class="row">
	
	
		<div class="col-xs-12 col-lg-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6 col-lg-6">
								<h5><span class="glyphicon glyphicon-shopping-cart"></span>Your Wishlist</h5>
							</div>
							<div class="col-xs-6 col-lg-6">
								<a href="index.php"><button type="button" class="btn btn-primary btn-sm btn-block">
									<span class="glyphicon glyphicon-share-alt"></span> Continue shopping
								</button></a>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
				<?php 
				$sel = "select * from wishlist where user_email='$s_email'";
				$run = mysqli_query($con,$sel);
				$count_wish = mysqli_num_rows($run);
				
				while($row=mysqli_fetch_array($run)){
					$p_id = $row['p_id'];
					$p_title = $row['p_title'];
					$p_image = $row['p_image'];
					$p_price = $row['p_price'];
					
				
				?>
				
					<div class="row">
				
						<div class="col-xs-2"><img class="img-responsive" src="admin/images/<?php echo $p_image; ?>" width="70" height="70">
						</div>
						<div class="col-xs-4">
							<h4 class="product-name"><strong><?php echo $p_title; ?></strong></h4>
						</div>
						
							<div class="col-xs-2">
								<h6><strong>Rs. <?php echo $p_price; ?></strong></h6>
							</div>
							<div class="col-xs-2">
								<button type="button" class="btn btn-success btn-sm add" value="<?php echo $p_id; ?>">
								<span class="glyphicon glyphicon-shopping-cart"></span> <span class="hidden-xs">Add to cart</span>
								</button>
							</div>
							<div class="col-xs-2">
								<button type="button" class="btn btn-danger btn-sm delete" id="<?php echo $p_id; ?>">
									<span class="glyphicon glyphicon-trash"></span>
								</button>
							</div>
						
					</div>
					<hr>
				<?php } ?>
					
					
				</div>
				<div class="panel-footer">
					<div class="row text-center">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



	<?php include "inc/footer.php"; ?>
	<script>
	$(document).ready(function(){
		$(".delete").on("click",function(){
			var id = $(this).attr('id');
			
			$.ajax({
				url:"function.php",
				method:"post",
				data:{del_wish:id},
				success($data){
					if($data > 0){
						notif({
						msg:"Product removed !!!",
						type:"info",
						width:330,
						height:40,
						timeout:1000,
						
						
					})
					}
					setTimeout(function() { location.reload(); }, 1000);
					
				}
			});
		});
		
		
		$(".add").on("click",function(){
			var add_id = $(this).val();
			
			$.ajax({
				url:"function.php",
				method:"post",
				data:{add_id:add_id},
				success: function($wish){
					if($wish > 0){
						notif({
						msg:"Product added to cart !!!",
						type:"success",
						width:330,
						height:40,
						timeout:1000,
						
						
					})
					
					}else{
						notif({
						msg:"Product is already added in the cart !!!",
						type:"warning",
						width:330,
						height:40,
						timeout:2000,
						
						
					})
					}
					
					
					setTimeout(function() { location.reload(); }, 1000);
				}
			})
			
			
			
		});
		
		
	});
	</script>
	
	
	     <script>
	       		   <?php if($count_wish < 1){
					   echo "$('.panel-body').html('<center><h1>No product is added to wishlist</h1></center>');";
				   } ?>
				   
		 </script>
	