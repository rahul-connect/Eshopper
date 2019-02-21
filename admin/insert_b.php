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
                            Insert Brand
                        </h1>
                            <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Insert Brand
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
                                <label>Brand Name</label>
                                <input class="form-control" name="b_name">
                                <p class="help-block"></p>
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
	$b_name = $_POST['b_name'];
	
	$insert = "insert into brand(title) VALUES('$b_name')";
	$query = mysqli_query($con,$insert);
	
	if($query){
		echo "<script>alert('Brand has been inserted Successfully')</script>";
		echo "<script>window.open('view_b.php','_self')</script>";
	}else{
	
		echo "<script>alert('Unsuccessful !! Something went wrong')</script>";
		echo "<script>window.open('index.php','_self')</script>";

	}
	
}


?>