<?php
include "db/connection.php";

if(isset($_POST['order_id'])){
	
	$order_id = $_POST['order_id'];
	$u_id = $_POST['u_id'];
	$d_name = $_POST['d_name'];
	$d_city = $_POST['d_city'];
	$d_address = $_POST['d_address'];
	$total = $_POST['total'];
	
	$run = "insert into order_address(order_id,user_id,order_name,city,address,total_amount,order_status) VALUES('$order_id','$u_id','$d_name','$d_city','$d_address','$total','confirmed')";
	$query = mysqli_query($con,$run);
	
	echo 0;
}


if(isset($_POST['order'])){
	
	$order = $_POST['order'];
	
	$sel_cart = "select * from cart where session_id='$cookie_id'";
	$run_sel = mysqli_query($con,$sel_cart);
	while($row=mysqli_fetch_array($run_sel)){
		$p_id = $row['p_id'];
		$p_qty = $row['p_qty'];
		
		$insert_order = "insert into order_details(order_id,pro_id,qty) VALUES('$order','$p_id','$p_qty')";
		$run_insert = mysqli_query($con,$insert_order);
	}
	
	$remove = "delete from cart where session_id='$cookie_id'";
	$run_delete = mysqli_query($con,$remove);
	if($run_delete){
		echo 1;
	}
}

?>