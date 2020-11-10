<html>
<head>
<title>Cebu Cars and Parts</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/footer.css" rel="stylesheet">

<script>
var base_url= "<?php echo base_url(); ?>";
$(document).ready(function() {

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
    document.getElementById('register-submit').style.visibility = 'hidden';
    e.preventDefault();
});

$('#login-submit').click(function(e) {
	var emailLog = $("input#emailLog").val();
	var pword = $("input#pword").val();

	if(email == ''){
		if(pword == ''){
			alert('Invalid Entry: Email and Password Empty');
		}else{
			alert('Invalid Entry: Email Empty');
		}
	}else if(pword == ''){
		alert('Invalid Entry: Password Empty');
	}else{
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>" + "index.php/dbProcess/userlogin",
			//data: {emailLog:emailLog,pword:pword},
			data:"emailLog="+emailLog+"&pword="+pword,
			success: function(response){
					if(response == 1){
						//alert(response);
						window.location.href = base_url+'index.php/pages/index';
					}else{
						alert('Error!');
					}	
				},
			error: function(data){
				alert('DB error!');
			}
		});
	}
});

$('#register-submit').click(function(e) {

	var fname =  $("input#fname").val();
	var lname =  $("input#lname").val();
	var cnum =  $("input#cnum").val();
	var address =  $("input#address").val();
	var email =  $("input#email").val();
	var password =  $("input#password").val();

		$.ajax({
		type: "POST",
		url: "<?php echo base_url(); ?>" + "index.php/dbProcess/registerUser",
		dataType: 'html',
		data: {email:email,password:password,fname:fname,lname:lname,address:address,cnum:cnum},
		success: function(data){ 
		alert(data);	
		}	
		});			
});

$('body').keyup(function(e) {
	var fname =  $("input#fname").val();
	var lname =  $("input#lname").val();
	var cnum =  $("input#cnum").val();
	var address =  $("input#address").val();
	var email =  $("input#email").val();
	var password =  $("input#password").val();
	var confirm_password =  $("input#confirm-password").val();
	var filter = /^[a-zA-Z]+$/;


	if(isNaN(fname)){
		if(filter.test(fname)){
			if(isNaN(lname)){
				if(filter.test(lname)){
					if(isNaN(cnum)){
						document.getElementById('register-submit').style.visibility = 'hidden';
					}else if(!cnum){
						document.getElementById('register-submit').style.visibility = 'hidden';
					}else{
						if(!address){
							document.getElementById('register-submit').style.visibility = 'hidden';
						}else{
							if(!email){
								document.getElementById('register-submit').style.visibility = 'hidden';
							}else{	
								if(!password){
									document.getElementById('register-submit').style.visibility = 'hidden';	 
								}else{
									if(!confirm_password){
										document.getElementById('register-submit').style.visibility = 'hidden';
									}else if(confirm_password != password){
										document.getElementById('register-submit').style.visibility = 'hidden';
									}else{
										document.getElementById('register-submit').style.visibility = 'visible';
									}
								}	
							}
						}
					}
				}else{
					document.getElementById('register-submit').style.visibility = 'hidden'; 
				}
			}else if(!lname){
				document.getElementById('register-submit').style.visibility = 'hidden';	
			}else{
				document.getElementById('register-submit').style.visibility = 'hidden';
			}	
		}else{
		document.getElementById('register-submit').style.visibility = 'hidden';
		}
	}else if(!fname){
		document.getElementById('register-submit').style.visibility = 'hidden';	
	}else{
		document.getElementById('register-submit').style.visibility = 'hidden';	 
	}	

});


});
</script>
</head>

<body>
<?php $this->load->view('includes/nav'); ?>
<div class="container container-login">
	<div class="col-md-6 mb-4 white-text text-center text-md-left">
    <h1 class="display-4 font-weight-bold">SIGN UP NOW! </h1>
    <hr class="hr-light">
        <p><strong>CEBU CARS and PARTS</strong></p>
        <p class="mb-4 d-none d-md-block">
        <strong>Register An Account To Post The Items That You Want To Sell / Trade Or To Post An Item That You Are Looking For</strong>
		</p>
	</div>
	
    	<div class="row">
			<div style="position:absolute;" class="col-md-4 col-md-offset-6">
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
								<form id="login-form" action="" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="email" name="emailLog" id="emailLog" tabindex="1" class="form-control" placeholder="Email" value="">
									</div>
									<div class="form-group">
										<input type="password" name="pword" id="pword" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<!---->
								</form>
								<form id="register-form" action="" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="fname" id="fname" tabindex="1" class="form-control" placeholder="First name" value="">
										<span id="errorname1" style="color:red;"></span>
									</div>
                                    <div class="form-group">
										<input type="text" name="lname" id="lname" tabindex="1" class="form-control" placeholder="Last name" value="" >
										<span id="errorname2" style="color:red;"></span>
									</div>
                                    <div class="form-group">
										<input type="text" name="cnum" id="cnum" tabindex="1" class="form-control" placeholder="Contact number" value="" >
										<span id="errorname3" style="color:red;"></span>
									</div>
                                    <div class="form-group">
										<input type="text" name="address" id="address" tabindex="1" class="form-control" placeholder="Address" value="" >
										<span id="errorname4" style="color:red;"></span>
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" >
										<span id="errorname5" style="color:red;"></span>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" data-toggle="tooltip" title="Password must contain 8 or more characters.">
										<span id="errorname6" style="color:red;"></span>
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" required>
										<span id="errorname7" style="color:red;"></span>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<span id="">&nbsp;</span>
												</div>
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
var filter = /^[a-zA-Z]+$/;
var error = 0;
var confirm = 0;
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

$("#fname").keyup(function(event){
	var fname =  $("input#fname").val();
	if(isNaN(fname)){
		if(filter.test(fname)){
		document.getElementById('fname').style.borderColor = "green";
		document.getElementById('errorname1').innerHTML="";
		confirm = confirm + 1;
		}else{
		document.getElementById('errorname1').innerHTML=" * Invalid First Name";
		document.getElementById('fname').style.borderColor = "red";
		error = 1;
		}
	}else if(!fname){
		document.getElementById('errorname1').innerHTML=" * Please Type In Your First Name";
		document.getElementById('fname').style.borderColor = "red";
		error = 1;	
	}else{
		document.getElementById('errorname1').innerHTML=" * Invalid First Name";
		document.getElementById('fname').style.borderColor = "red";
		error = 1;
	}	
}).keydown(function( event ) {
  if ( event.which == 13 ) {
    event.preventDefault();
	
  }
});

$("#lname").keyup(function(event){
	var lname =  $("input#lname").val();
	
	if(isNaN(lname)){
		if(filter.test(lname)){
		document.getElementById('lname').style.borderColor = "green";
		document.getElementById('errorname2').innerHTML="";
		confirm = confirm + 1;
		}else{
		document.getElementById('errorname2').innerHTML=" * Invalid Last Name";
		document.getElementById('lname').style.borderColor = "red";
		error = 1;
		}
	}else if(!lname){
		document.getElementById('errorname2').innerHTML=" * Please Type In Your Last Name";
		document.getElementById('lname').style.borderColor = "red";	
		error = 1;
	}else{
		document.getElementById('errorname2').innerHTML=" * Invalid Last Name";
		document.getElementById('lname').style.borderColor = "red";
		error = 1;
	}	
}).keydown(function( event ) {
  if ( event.which == 13 ) {
    event.preventDefault();

  }
});

$("#cnum").keyup(function(event){
	var cnum =  $("input#cnum").val();
	
	if(isNaN(cnum)){
		document.getElementById('errorname3').innerHTML=" * Invalid Contact Number";
		document.getElementById('cnum').style.borderColor = "red";
		error = 1;
	}else if(!cnum){
		document.getElementById('errorname3').innerHTML=" * Please Type In Your Contact Number";
		document.getElementById('cnum').style.borderColor = "red";	
		error = 1;
	}else{	
		document.getElementById('cnum').style.borderColor = "green";
		document.getElementById('errorname3').innerHTML="";	
		confirm = confirm + 1;
	}	
}).keydown(function( event ) {
  if ( event.which == 13 ) {
    event.preventDefault();
	
  }
});

$("#address").keyup(function(event){
	var address =  $("input#address").val();
	
	if(!address){
		document.getElementById('errorname4').innerHTML=" * Please Type In Your Address";
		document.getElementById('address').style.borderColor = "red";
		error = 1;	
	}else{	
		document.getElementById('address').style.borderColor = "green";
		document.getElementById('errorname4').innerHTML="";	
		confirm = confirm + 1;
	}	
}).keydown(function( event ) {
  if ( event.which == 13 ) {
    event.preventDefault();
	
  }
});


$("#email").keyup(function(event){
	var email =  $("input#email").val();
	
	if(!email){
		document.getElementById('errorname5').innerHTML=" * Please Type In Your Email Address";
		document.getElementById('email').style.borderColor = "red";
		error = 1;	
	}else if(!validateEmail(email)){
		document.getElementById('errorname5').innerHTML=" * Invalid Email Address";
		document.getElementById('email').style.borderColor = "red";
		error = 1;	
	}else{	
		document.getElementById('email').style.borderColor = "green";
		document.getElementById('errorname5').innerHTML="";	
		confirm = confirm + 1;
	}	
}).keydown(function( event ) {
  if ( event.which == 13 ) {
    event.preventDefault();
	
  }
});


$("#password").keyup(function(event){
	var password =  $("input#password").val();
	var confirm_password =  $("input#confirm-password").val();
	if(password.length < 8){
		document.getElementById('errorname6').innerHTML=" * Please Type In Your Password";
		document.getElementById('confirm-password').style.borderColor = "red";
		document.getElementById('password').style.borderColor = "red";	
		error = 1;
	}
	else if(confirm_password.length && confirm_password != password){ 
		document.getElementById('errorname6').innerHTML=" *  Password does not match";
		document.getElementById('confirm-password').style.borderColor = "red";
		document.getElementById('password').style.borderColor = "red";	
		error = 1;
	}
	else{	
		document.getElementById('confirm-password').style.borderColor = "green";
		document.getElementById('password').style.borderColor = "green";
		document.getElementById('errorname6').innerHTML="";
		document.getElementById('errorname7').innerHTML="";		
		confirm = confirm + 1;
	}	
}).keydown(function( event ) {
  if ( event.which == 13 ) {
    event.preventDefault();

  }
});

$("#confirm-password").keyup(function(event){
	var password =  $("input#password").val();
	var confirm_password =  $("input#confirm-password").val();
	var message;
	if(!confirm_password){
		document.getElementById('errorname7').innerHTML=" * Please Type In Your Password Confirmation";
		document.getElementById('confirm-password').style.borderColor = "red";
		document.getElementById('password').style.borderColor = "red";
		error = 1;
	}else if(confirm_password != password){
		document.getElementById('errorname7').innerHTML=" * Password does not match";
		document.getElementById('confirm-password').style.borderColor = "red";
		document.getElementById('password').style.borderColor = "red";
		error = 1;
	}else{	
		document.getElementById('confirm-password').style.borderColor = "green";
		document.getElementById('password').style.borderColor = "green";
		document.getElementById('errorname6').innerHTML="";	
		document.getElementById('errorname7').innerHTML="";	
		confirm = confirm + 1;
	}
	
}).keydown(function( event ) {
  if ( event.which == 13 ) {
    event.preventDefault();

  }
});


</script>

</html>