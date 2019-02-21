<?php
$host = "localhost";
$user = "";
$password =  "";
$db_name = "";

$con = mysqli_connect($host,$user,$password,$db_name);
session_start();
$session_id = session_id();

if(!isset($_COOKIE["user_session"])){
setcookie("user_session", "$session_id", time()+86400*30*12 );
header("location:index.php");
exit();
}else{
	$cookie_id =  $_COOKIE["user_session"];
}



if(!$con){
	echo "Connection Error".mysqli_connect_error();
	exit();
}

?>
<?php
					if(isset($_SESSION['email'])){
						$s_email = $_SESSION['email'];
						$sel = "select c_name from customer where c_email ='$s_email'";
						$sel_query = mysqli_query($con,$sel);
						$fetch = mysqli_fetch_array($sel_query);
						$user = $fetch['c_name'];
						$sign = "Logout";
						$nav = "account";
						$wish = "wishlist.php";
						$add_wish= "javascript:void(0)";
						
					}else{
						$user = "Guest";
						$sign = "Login";
						$nav = "Login";
						$wish = "Login.php?wish";
						$add_wish = "Login.php?wish";
						$s_email = 0;
						
					}
					?>

