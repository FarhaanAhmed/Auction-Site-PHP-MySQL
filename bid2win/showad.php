<?php
$pstart="";
$pend="";
?>
<?php
	include("includes/db.php");
	include("includes/functions.php");
	
	if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
		$pid=$_REQUEST['productid'];
		addtocart($pid,1);
		header("location:shoppingcart.php");
		exit();
	}
	
?>
<?php session_start();
if(isset($_GET['a']))
{
 $getacat=$_GET['a'];
 include("config.php");
 $atitle="";
 $aimage="";
 $adesc="";
 $aprice="";
 $aqty="";
 $auser="";
 $sqlcatname=mysql_query("select * from tblad where adid=".$getacat);
 
	if(mysql_num_rows($sqlcatname)>0)
		{
			$i=0;
			while($rowcatname=mysql_fetch_array($sqlcatname))
			{
				$adid=$rowcatname['adid'];
				$atitle=$rowcatname['atitle'];
				$aimage=$rowcatname['aimage'];
				$adesc=$rowcatname['adesc'];
				$aprice=$rowcatname['aprice'];
				$aqty=$rowcatname['aqty'];
				$auser=$rowcatname['auser'];
				$aimage=$rowcatname['aimage'];
				$udate=date('d M Y', strtotime($rowcatname['udate']));
			}
		}
}
else
{
	echo "<script>window.location.href='index.php';</script>";
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
	<!-- //online fonts --><script language="javascript">
	function addtocart(pid){
		document.form1.productid.value=pid;
		document.form1.command.value='add';
		document.form1.submit();
	}
</script>
	</head>
  <body>
  <form name="form1">
	<input type="hidden" name="productid" />
    <input type="hidden" name="command" />
</form>
  <?php include('header.php'); ?>	
		<div class="page-breadcrumb breadcrumb-arrow">
			<div class="container">
    <ol class=" ">
		<li><a href="#">Home</a></li>
		<li class="active"><span><?php echo $atitle; ?></span></li>
	</ol>
</div>
		</div>
		 <main>
		<!-- //header -->

		
	<div class="container-fluid">
    <div class="content-wrapper">	
		<div class="item-container">	
			<div class="container">	
			<div class="row">
				<div class="col-md-12">
					<div class="product col-md-4 service-image-left">
                    
						<center>
							<img id="item-display" src="uploads/<?php echo $aimage; ?>" alt=""></img>
						</center>
					</div>
					
					
					<div class="col-md-8">
					<aside>
                        <div class="card sidebar-card  bg-contact-seller">
                            <div class="card-header">Contact Seller</div>
                            <div class="card-content user-info">
                                <div class="card-body text-center">
                                    <div class="seller-info">
									<?php 
									  $sqluser=mysql_query("select * from tblusers where uid=".$auser);
									  if(mysql_num_rows($sqluser))
									  {
										  while ($rowuser=mysql_fetch_array($sqluser))
										  {
									?>
                                        <h3 class="no-margin"><?php echo $rowuser['ufname']." ".$rowuser['ulname']; ?></h3>
                                        <p>Location: <strong><?php echo $rowuser['uaddress']; ?></strong>
                                        </p> 
										<p>Mobile: <strong><?php echo $rowuser['uphone']; ?></strong>
                                        </p> 
										<p>Email: <strong><?php echo $rowuser['uemail']; ?></strong>
                                        </p>
                                        <p>Joined: <strong><?php echo $rowuser['udate']; ?></strong>
                                        </p>
										<?php
										  }
									  }
										  ?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>		  
                        <div class="card sidebar-panel">
                            <div class="card-header">Payments Details</div>
                            <div class="card-content">
                                <div class="card-body text-center">
                                    <p>You can either Buy Now or Place the Bid.</p>
                                   <div class="product-price">&pound; <?php echo $aprice; ?></div>
								   <p style="font-weight: bold;padding: 2px;border: dashed 1px #777;width: 100px;margin: 10px auto;background: #eee;">
								   <?php echo $aqty; ?> Available
								   </p>
								   <?php
										/*** Bid Time ***/
										$sqlbid=mysql_query("select * from tblbids where badid=".$adid);
										if(mysql_num_rows($sqlbid)>0)
										{
											while($rowbid=mysql_fetch_array($sqlbid))
										   {
											   $pstart=date('Y/m/d',strtotime($rowbid['bstart']));
											   $pend=date('Y/m/d',strtotime($rowbid['bend']));
										   echo "<b style='color:#c73d25;font-size:17px'>Min. Bid Amount is &pound;".$rowbid['bminamt']."</b>";
										   }
										}
										/*** Bid Time ***/
										?>
										
									
											<div id="countdowntimer"><span id="given_date"></span></div>
										
									  
								   <div class="buttons">
								   <?php if(isset($_SESSION['uid']))
										{
										}
										else
										{
										?>											
										<p style="font-size:14px;color:red"><i>You must be <a href='login-signup.php?location=<?php echo urlencode($_SERVER['REQUEST_URI']);?>'>logged in </a>before Bidding</i></p>
										<?php } ?>
									
									<form method="post" action="placebid.php" class="col-md-7">
								        <input type="text" class="form-control col-md-7 place-bid-form" name="txtamount" placeholder="Enter your Bid Amount" />
										<input type="hidden" name="txtadid" value="<?php echo $adid; ?>" />
										
										<button type="submit" class="bid col-md-5">Place Bid</button>
										</form>
										<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" class="col-md-3">
										<input type="hidden" name="business" value="<?php echo MERCHANT_EMAIL; ?>">
										<input type="hidden" name="cmd" value="_xclick">
										<input type="hidden" name="item_name" value="<?php echo $atitle; ?>">
										<input type="hidden" name="amount" value="<?php echo $aprice; ?>.00">
										<input type="hidden" name="cancel_return" value="<?php echo SITE_URL; ?>/cancelled.php">
									<input type="hidden" name="return" value="<?php echo SITE_URL; ?>/thankyou.php">
										<input type="hidden" name="currency_code" value="<?php echo CURRENCY_CODE; ?>">
										<button type="submit" name="submit" class="buy">Buy Now</button>

										</form>
											<button <?php echo $btndisabled; ?> type="button" name="submit" class="buy col-md-2" onclick="addtocart(<?php echo $getacat; ?>)"><i class="fa fa-shopping-basket"></i></button>
										<!--
										<a class="buy" href="checkout.html">Buy Now</a>
										-->
		
								   </div>
                                </div>
                            </div>
                        </div>
                        <!--/.categories-list-->
                    </aside>
					</div>
</div>
</div>
				<div class="row">
				
				<div class="col-md-12">
				<div class="whole-detail">
				<h2 class="detail">Detailed Description</h2>
				<div class="product-title">
			
				<?php echo $atitle; ?>
					<hr></div>
					<div class="product-desc"><?php echo $adesc; ?></div>
					
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
    <?php include ('footer.php'); ?>
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
	 <script type="text/javascript" src="extras/jquery.countdownTimer.js"></script>
        <link rel="stylesheet" type="text/css" href="extras/jquery.countdownTimer.css" />
			<script>
               $(function(){
                  $('#given_date').countdowntimer({
                     startDate : "<?php echo $pstart; ?>",
                     dateAndTime : "<?php echo $pend; ?>",
                     size : "lg",
					 regexpMatchFormat: "([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})",
      					regexpReplaceWith: "$1<sup class='displayformat'>days</sup> / $2<sup class='displayformat'>hours</sup> / $3<sup class='displayformat'>minutes</sup> / $4<sup class='displayformat'>seconds</sup>"
                 });
                });
             </script> 
  </body>
</html>