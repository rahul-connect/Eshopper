<?php include "inc/header.php" ?>
<?php 
if(isset($_GET['code'])){
	$code = $_GET['code'];
    $select_code = "select * from forgot_pass where code='$code'";
	$run_select_code = mysqli_query($con,$select_code);
	$fetch = mysqli_fetch_array($run_select_code);
	$email = $fetch['user_email'];
	if(mysqli_num_rows($run_select_code) != 1){
		exit();
	}
}
?>
<style>
.form-gap {
    padding-top: 20px;
}
</style>

 <div class="form-gap"></div>
<div class="container" style="margin-bottom:50px;">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x" style="color:green;"></i></h3>
                  <h2 class="text-center">Change Password</h2>
                  <p>Type your new Password here .</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                     
                          <input id="password" name="pass" placeholder="Enter your New Password" class="form-control"  type="password"><br>
                           
						   
						<input id="c_password" name="c_pass" placeholder="Enter your Password Again" class="form-control"  type="password">
                      
					 
                      <div class="form-group">
                        <input name="submit" class="btn btn-lg btn-primary btn-block" id="submit" value="Change Password" type="submit"  disabled="disabled">
                      </div>
                      
                      <input type="hidden" class="hide" name="hidden" id="hidden" value="<?php echo $email; ?>"> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
	</div>

<?php include "inc/footer.php" ?>
<script>
$(document).ready(function(){
	$("#password").change(function(){
		var pass = $("#password").val();
		$("#c_password").on("keyup",function(){
			var c_pass = $("#c_password").val();
			   if(pass == c_pass){
				   $("#submit").removeAttr("disabled");
				   
			   }else{
				   $("#submit").attr("disabled","disabled");
			   }
			
		});
		
	});
	
	$("#submit").on("click",function(e){
		e.preventDefault();
		var email = $("#hidden").val();
		var final_pass = $("#password").val();
		
		$.ajax({
			url:"function.php",
			method:"post",
			data :{change_e:email,change_p:final_pass},
			success : function(){
				window.location.href="login.php?change";
			}
			
		})
		
	});
		
	
});
</script>