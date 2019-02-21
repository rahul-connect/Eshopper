<?php include "inc/header.php" ?>
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
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="Enter your Email Address" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" id="submit" value="Reset Password" type="submit"  disabled="disabled">
						<span id="loading" style="display:none;"><img src="loading.gif" width="100px" height="100px"></span>
						<div id="message" style="color:green;display:none;"><h4>A link has been send to your Email address</h4></div>
                      </div>
                      
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
$("#email").on("keyup",function(){
	var email = $(this).val();
	
 	if(email != ""){
		
	
  $.ajax({
	  url:"function.php",
		method:"post",
		data:{forgot:email},
		success : function($result){
			if($result > 0){
				$(".input-group-addon").css({"background-color": "green", "color": "white"});
				$("#submit").removeAttr("disabled");
			}else{
				$(".input-group-addon").css({"background-color": "#fd0000", "color": "white"});
				$("#submit").attr("disabled",true);
				
			}
		}
  })	

	}else{
		$(".input-group-addon").css("background","grey");
	}
});


$("#submit").click(function(event){
	event.preventDefault();
	var ok_email = $("#email").val();
	
	$.ajax({
		url:"function.php",
		method:"get",
		data : {ok_email:ok_email},
		beforeSend: function(){
		$("#submit").hide();
        $("#loading").show();
		
   },
  
		cache : false,
		success : function(){
			 $("#loading").hide();
			$("#message").show();
			
		}
	})
	
});

</script>