<?php include "inc/header.php" ?>
	
	<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="Login.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="email" name="useremail" id="username" tabindex="1" class="form-control" placeholder="Email Id" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<!--<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>-->
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="forgot_pass.php" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="Login.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script>
	$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

	</script>
	<?php include "inc/footer.php" ?>
<?php
if(isset($_POST['register'])){
	$uname = $_POST['username'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$c_pass = $_POST['confirm-password'];
	
	
	if($pass !== $c_pass){
	echo "<script>
	             notif({
						msg:'Password doesnot match each other !!!',
						type:'error',
						width:330,
						height:40,
						timeout:3000,
						})
	</script>";
	}else{
		
		$check = "select * from customer where c_email = '$email'";
		$run_check = mysqli_query($con,$check);
		if(mysqli_num_rows($run_check) < 1){
		$insert_user = "insert into customer(c_session,c_name,c_email,c_pass,c_image) VALUES('$cookie_id','$uname','$email','$pass','default.png')";
		$run_insert = mysqli_query($con,$insert_user);
		if($run_insert){
			$_SESSION['email'] = $email;
			echo "<script>window.open('index.php?account','_self')</script>";
			exit();
		}
		}else{
			echo"<script>
	             notif({
						msg:'Email Address already Registered !!!',
						type:'warning',
						width:330,
						height:40,
						timeout:3000,
						})
						
						</script>";
		}
		
	}
}

if(isset($_POST['login'])){
	$useremail = $_POST['useremail'];
	$password = $_POST['password'];
	
	$check_user = "select * from customer where c_email ='$useremail' && c_pass='$password'";
	$run_user = mysqli_query($con,$check_user);
	if(mysqli_num_rows($run_user)==1){
		$_SESSION['email'] = $useremail;
		$update_session = "update customer set c_session='$cookie_id'";
		$run_update = mysqli_query($con,$update_session);
		
	    echo "<script>window.open('index.php?login','_self')</script>";
	}else{
		echo "<script>
		notif({
						msg:'Email or Password Incorrect !!!',
						type:'error',
						width:330,
						height:40,
						timeout:3000,
						
			})	
		setTimeout(function() { header('location:login.php') }, 1000);
	
		</script>";
						
	
}
}

if(isset($_GET['wish'])){
	echo "<script>
		notif({
				        msg:'Please Login to view/add to wishlist !!',
						type:'info',
						width:330,
						height:40,
						timeout:2000,
						
					})
					</script>
		";
}

if(isset($_GET['change'])){
	echo "<script>
		notif({
				        msg:'Password has been Changed Successfully',
						type:'success',
						width:330,
						height:40,
						timeout:2000,
						
					})
					</script>
		";
}
?>
	