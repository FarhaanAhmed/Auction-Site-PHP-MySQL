<?php error_reporting(0); session_start();
if(isset($_SESSION['uid']))
{
	echo "<script>window.location.href='member/index.php';</script>";
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home page
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--decorative-->
    <meta name="theme-color" content="#d44f68">
    <!--decorative END-->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
	<!-- animation -->
	<!-- <link href="css/animate.css" rel="stylesheet" type="text/css" media="all"> -->
	<!-- //animation -->
	<!-- header and footer stylesheet -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/custom-style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //header and footer stylesheet -->
	<!-- testimonials stylesheet -->
	<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all">
	<!-- testimonials stylesheet -->
	<!-- about flexslider  stylesheet-->
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<!-- //about flexslider  stylesheet -->
	<!--gallery  stylesheet -->
	<link type="text/css" rel="stylesheet" href="css/cm-overlay.css" />
	<!-- //gallery stylesheet -->
	<!-- yoga page css -->
	<link href="css/yoga.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //yoga page css -->
	<!-- online fonts -->
	<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans:100,100i,300,300i,400,400i,500,500i,700,700i,800,800i,900,900i"
	    rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
	<!-- //online fonts --></head>
  <body>
  
  
    <?php include('header.php'); ?>
		<div class="page-breadcrumb breadcrumb-arrow">
			<div class="container">
    <ol class=" ">
		<li><a href="#">Home</a></li>
		<li class="active"><span>Login / Signup</span></li>
	</ol>
</div>
		</div>
		 <main>
		<!-- //header -->

		
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
								<form id="login-form" action="login.php" method="post" role="form" style="display: block;">
								<?php
								echo '<input type="hidden" name="location" value="';
if(isset($_GET['location'])) {
    echo htmlspecialchars($_GET['location']);
}
echo '" />';
?>
									<div class="form-group">
										<input type="text" name="uuname" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="upass" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="insertusers.php" method="post" role="form" style="display: none;">
								<?php
								echo '<input type="hidden" name="location" value="';
if(isset($_GET['location'])) {
    echo htmlspecialchars($_GET['location']);
}
echo '" />';
?>
									<div class="form-group">
										<input type="text" name="ufname" required id="username" tabindex="1" class="form-control" placeholder="First Name" value="">
									</div>
									<div class="form-group">
										<input type="text" name="ulname" required id="username" tabindex="1" class="form-control" placeholder="Last Name" value="">
									</div>
									<div class="form-group">
										<input type="text" name="uuname" required id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="email" name="uemail" required id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="upass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" required id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<input type="uphone" name="uphone" id="password" tabindex="2" class="form-control" placeholder="Phone Number">
									</div>
									<div class="form-group">
										<textarea type="uaddress" name="uaddress" required id="password" tabindex="2" class="form-control" placeholder="Address"></textarea>
									</div>
									<!--Form to input registration details-->
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
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


   
      
      
     
      <!--newest items section-->
     
      <!--newest items section END-->
    </main>
    <?php include('footer.php'); ?>
    <!--Base style-->
    
    <!--Base js-->
    <script src="js/jquery-2.2.3.min.js"></script>
	<!-- //js-->
	<!-- dropdown menu js -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- dropdown menu js -->
	<!-- banner-responsive-slider -->
	<script src="js/responsiveslides.min.js"></script>
	
	<!-- //banner-responsive-slider -->
	<!-- testimonials owl carousel -->
	<script src="js/owl.carousel.js"></script>

	<!-- //testimonials owl carousel -->
	<!-- About FlexSlider -->
	<script defer src="js/jquery.flexslider.js"></script>
	
	<!-- // About FlexSlider -->
	<!-- //gallery -->
	<script src="js/jquery.tools.min.js"></script>
	<script src="js/jquery.mobile.custom.min.js"></script>
	<script src="js/jquery.cm-overlay.js"></script>
	<script>
		$(document).ready(function () {
			$('.cm-overlay').cmOverlay();
		});
	</script>
	<!-- //gallery -->
	<!-- smooth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<script src="js/SmoothScroll.min.js"></script>
	<!-- //smooth-scrolling -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- smooth-scrolling-of-move-up -->
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/bootstrap.js"></script>
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
  </body>
</html>