<?php include("inc/header.php"); ?>

	<div class="container">
	<span class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">Cart</li>
				</ol>
			</span><!--/breadcrums-->
	<div class="row">
	<style>
	.disabled{
		font-size:20px;
		text-decoration: line-through;
	}
	</style>
	
		<div class="col-xs-12 col-lg-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6 col-lg-6">
								<h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
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
				$total = 0;
				$sel = "select * from cart where session_id='$cookie_id'";
				$run = mysqli_query($con,$sel);
				$count_cart = mysqli_num_rows($run);
				if($count_cart < 1){
					$checkout="index";
				}else{
					$checkout = "checkout";
				}
				while($row=mysqli_fetch_array($run)){
					$p_id = $row['p_id'];
					$p_title = $row['p_title'];
					$p_image = $row['p_image'];
					$p_price = $row['p_price'];
					$p_qty = $row['p_qty'];
					
					
					$total += ($p_price * $p_qty);
				
				?>
					<div class="row">
						<div class="col-xs-2 col-lg-2"><img class="img-responsive" src="admin/images/<?php echo $p_image; ?>" width="70" height="70">
						</div>
						<div class="col-xs-3 col-lg-4">
							<h4 class="product-name"><strong><?php echo $p_title; ?></strong></h4>
						</div>
						<div class="col-xs-7 col-lg-6">
							<div class="col-xs-4 col-lg-6 text-right">
								<h6><strong><?php echo $p_price; ?> <span class="text-muted">x</span></strong></h6>
							</div>
							<div class="col-xs-5 col-lg-4">
								<input type="text" class="form-control input-sm" data-pro_id="<?php echo $p_id; ?>"  value="<?php echo $p_qty; ?>">
							</div>
							<div class="col-xs-3 col-lg-2">
								<button type="button" class="btn btn-link btn-xs delete" id="<?php echo $p_id; ?>">
									<span class="glyphicon glyphicon-trash"></span>
								</button>
							</div>
						</div>
					</div>
					<hr>
				<?php } ?>
					
					
				</div>
				<div class="panel-footer">
					<div class="row text-center">
						<div class="col-xs-6 col-lg-9">
							<h4 class="text-right">Total&nbsp; Rs.<strong><?php echo $total; ?></strong></h4>
						</div>
						<div class="col-xs-6 col-lg-3">
							<a href="<?php echo $checkout; ?>.php"><button type="button" class="btn btn-success btn-block" id="check_btn">
								Checkout
							</button></a>
						</div>
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
				data:{del:id},
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
		
		
		
		$(".input-sm").on("change",function(){
			var qty = $(this).val();
			 if(qty == 0){
				var qty = 1;
			}
			var p_id = $(this).data('pro_id');
                $.ajax({
					url:"function.php",
					method:"post",
					data:{qty:qty,
					      pro_id:p_id},
					success:function($data){
						setTimeout(function() { location.reload(); }, 100);
					}
				})			
			
		});
		
	});
	
	
	</script>
	     <script>
	       		   <?php if($count_cart < 1){
					   echo "$('.panel-body').html('<center><h1>No product is added to Cart</h1></center>');";
					   echo "$('#check_btn').addClass('disabled');";
				   }else{
					   echo "$('#check_btn').removeClass('disabled');";
				   } ?>
				  
				   
		 </script>