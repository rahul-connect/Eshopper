<?php
include "inc/header.php";

?>

<?php include "inc/sidebar.php"; ?>

 <div id="page-wrapper">

            <div class="container-fluid">
			     <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Insert Product
                        </h1>
                            <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Insert Product
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
				     <div class="col-lg-2 col-sm-2"></div>
				     <div class="col-lg-8 col-sm-8">
					 <form role="form" method="post" enctype="multipart/form-data" action="insert_p.php">
					     
                            <div class="form-group">
                                <label>Product Name</label>
                                <input class="form-control" name="p_name">
                                <p class="help-block"></p>
                            </div>
							
							 <div class="form-group">
                                <label>Product Category</label>
                                <select class="form-control" name='p_cat'>
                                    <option value="null">Select a Category</option>
									<?php 
									$select = "SELECT * FROM category";
									$run = mysqli_query($con,$select);
									while($row=mysqli_fetch_array($run)){
										$id = $row['id'];
										$name = $row['name'];
										echo "<option value='$id'>$name</option>";
									}
									
									?>
                                    
									
                                </select>
                            </div>
							
								 <div class="form-group">
                                <label>Select Sub-Category</label>
                                <select class="form-control" name='p_sub'>
                                    <option value="null">Select a Sub-Category</option>
									<?php 
									$select = "SELECT * FROM sub_category";
									$run = mysqli_query($con,$select);
									while($row=mysqli_fetch_array($run)){
										$id = $row['id'];
										$name = $row['name'];
										echo "<option value='$id'>$name</option>";
									}
									
									?>
                                    
									
                                </select>
                            </div>
							
							<div class="form-group">
                                <label>Product Brand</label>
                                <select class="form-control" name='p_brand'>
                                    <option value="null">Select a Brand</option>
                                    <?php 
									$select = "SELECT * FROM brand";
									$run = mysqli_query($con,$select);
									while($row=mysqli_fetch_array($run)){
										$id = $row['id'];
										$title = $row['title'];
										echo "<option value='$id'>$title</option>";
									}
									
									?>
									
                                </select>
                            </div>
							
							 <div class="form-group">
                                <label>Product Price</label>
                                <input type="number" class="form-control" name="p_price">
                                <p class="help-block"></p>
                            </div>
							
							<div class="form-group">
                                <label>Product Description</label>
                                <textarea class="form-control" name="p_desc" rows="10" cols="15"></textarea>
                                <p class="help-block"></p>
                            </div>
							
						 <div class="form-group">
                                <label>Quantity Available</label>
                                <input type="number" class="form-control" name="p_qty">
                                <p class="help-block"></p>
                            </div>
							
							 <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" name='image'>
                            </div>
							<br>
							<center> <button type="submit" name="insert" class="btn btn-primary" style="padding:5px;width:100%;font-size:25px;">INSERT</button></center>
							
					 </form>
					 </div>
				     <div class="col-lg-2 col-sm-2"></div>
				</div>
			  <br>
			  <br>
			</div>
</div>

<?php
if(isset($_POST['insert'])){
	$name = $_POST['p_name'];
	$cat = $_POST['p_cat'];
	$sub = $_POST['p_sub'];
	$brand = $_POST['p_brand'];
	$price = $_POST['p_price'];
	$desc = addslashes($_POST['p_desc']);
	$qty = $_POST['p_qty'];
	$image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
	
	if($cat == "null" || $brand =="null"){
		echo "<script>alert('Please Select brand or category')</script>";
		echo "<script>window.open('insert_p.php','_self')</script>";
		exit();
	}else if($image==''){
		echo "<script>alert('Please choose an image')</script>";
		echo "<script>window.open('insert_p.php','_self')</script>";
		exit();	
	}else{
		$insert = "insert into product(p_name,p_category,p_sub,p_brand,p_price,p_desc,p_qty,p_image) VALUES('$name','$cat','$sub','$brand','$price','$desc','$qty','$image')";
		$run = mysqli_query($con,$insert);
		if($run){
			move_uploaded_file($tmp_image,"images/$image");
			echo "<script>alert('Product inserted Successfully !!')</script>";
		    echo "<script>window.open('view_p.php','_self')</script>";
			
		}else{
			echo "<script>alert('Something went wrong !!')</script>";
		    echo "<script>window.open('index.php','_self')</script>";
		}
	}
	
}



?>