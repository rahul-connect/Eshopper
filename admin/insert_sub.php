<?php
include "inc/header.php";

?>

<?php include "inc/sidebar.php"; ?>

 <div id="page-wrapper" style="height:615px;">

            <div class="container-fluid">
			     <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Insert Sub-Category
                        </h1>
                            <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Insert Sub-Category
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
				     <div class="col-lg-2 col-sm-2"></div>
				     <div class="col-lg-8 col-sm-8">
					 <form role="form" method="post">
					     
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" name="c_name">
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
					
							<br>
							<center> <button type="submit" class="btn btn-primary" name="insert" style="padding:5px;width:100%;font-size:25px;">INSERT</button></center>
							
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
	global $con;
	$c_name = $_POST['c_name'];
	$cat = $_POST['p_cat'];
	
	if($cat == "null" || $brand =="null"){
		echo "<script>alert('Please Select a category')</script>";
		echo "<script>window.open('insert_sub.php','_self')</script>";
		exit();
	}
	$insert = "insert into sub_category(cat_id,name) VALUES('$cat','$c_name')";
	$query = mysqli_query($con,$insert);
	
	if($query){
		echo "<script>alert('Category has been inserted Successfully')</script>";
		echo "<script>window.open('view_sub.php','_self')</script>";
	}else{
	
		echo "<script>alert('Unsuccessful !! Something went wrong')</script>";
		echo "<script>window.open('index.php','_self')</script>";

	}
	
}


?>