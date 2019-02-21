<?php
include "inc/header.php";
include "inc/sidebar.php";

?>


<div id="page-wrapper">

            <div class="container-fluid">
			     <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            View Product
                        </h1>
                            <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> View Product
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
				
				<div class="row">
				     <div class="col-lg-2 col-sm-2"></div>
				     <div class="col-lg-8 col-sm-8">
					  
					       
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								
								<?php
								$select = "select * from product";
								$run = mysqli_query($con,$select);
								$i = 0;
								
								while($row=mysqli_fetch_array($run)){
									$id = $row['id'];
									$name = $row['p_name'];
									$cat = $row['p_category'];
									$brand = $row['p_brand'];
									$price = $row['p_price'];
									$desc = $row['p_desc'];
									$qty = $row['p_qty'];
									$image = $row['p_image'];
									$i++;
												
								?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td align="center"><img src="images/<?php echo $image; ?>" height="50px" width="50px"></td>
                                        <td><?php echo $price; ?></td>
										<td align="center">
										<div class="btn-group" width="30px;" align="center">
                                    <a href="#" class="btn btn-primary"  style="font-size:20px;"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                    <a href="view_p.php?del=<?php echo $id; ?>" class="btn btn-danger" style="font-size:20px;"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
  
                                        </div>
										</td>
                                    </tr>
                                 <?php } ?>  
								   
                                </tbody>
                            </table>
                        </div>
						
					 </div>
					 <div class="col-lg-2 col-sm-2"></div>
				</div>
				
		</div>
		
</div>

<?php
if(isset($_GET['del'])){
	$del_id = $_GET['del'];
	
	$select = "select * from product where id='$del_id'";
	$run = mysqli_query($con,$select);
    
    $row=mysqli_fetch_array($run);
	$image = $row['p_image'];				
	
	$delete = "delete from product where id='$del_id'";
	$run = mysqli_query($con,$delete);
	
	if($run){
		$del_image = unlink("images/".$image);
		echo "<script>window.open('view_p.php','_self')</script>";
		
	}else{
		echo "<script>alert('Something went Wrong !!')</script>";
	}
	
}


?>