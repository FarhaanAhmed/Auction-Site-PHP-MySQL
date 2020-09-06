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
	<!-- //online fonts -->
	<script language="javascript">
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
<div class="banner-top">
			<div class="slider">
				<div class="callbacks_container">
					<ul class="rslides callbacks callbacks1" id="slider4">
						
						<li>
							<div class=" banner-bg banner-bg1">
								<div class="layer">
									<div class="container">
										<div class="w3l-index-banner-info">
											<h4>Bid2Win</h4>
											<p>Buy & Sell all sorts of items.</p>

										</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="banner-bg banner-bg2">
								<div class="layer">
									<div class="container">
										<div class="w3l-index-banner-info">
											<h4>Bid2Win</h4>
											<p>Buy & Sell all sorts of items.</p>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		
	</div>
      <!--newest items section-->
	  <div class="products">
        <div class="container">
	<div class="col-xs-12 col-sm-12 col-md-12 categoryDetailSection">
		<?php 
			include('config.php'); 
			$sql=mysql_query("select * from tblad where astatus='Y'");
			$i=0;
			if(mysql_num_rows($sql)>0)
			{
				while($row=mysql_fetch_array($sql))
				{
					$i++;
					$sqlbid=mysql_query("select * from tblbids where badid=".$row['adid']);
										if(mysql_num_rows($sqlbid)>0)
										{
				?>
		  						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="categoryDetailWrap">
							
								<a id="btnadd<?php echo $i; ?>" href="showad.php?a=<?php echo $row['adid'];?>">
								  <img src="uploads/<?php echo $row['aimage'];?>" style="width:100%;max-height: 200px;min-height: 200px;" class="project-album-link">
								</a>
								<div class="categoryNameWrap">
									<a id="btnad<?php echo $i; ?>" style="color:white; text-decoration:none;" href="showad.php?a=<?php echo $row['adid'];?>">
										<h4 class="categoryName" style="margin-top:0px !important">
											<?php echo $row['atitle'];?>
										</h4>
										<strong class="home-price" style="margin-top:5px;font-size:20px; color:black;">
											&pound; <?php echo $row['aprice'];?>.00
											<span class="pull-right">
											<?php echo $row['aqty'];?> Available
											</span>
										</strong>
										<?php
										$btndisabled="";
										$href="#";
										/*** Bid Time ***/
										$sqlbid=mysql_query("select * from tblbids where badid=".$row['adid']);
										if(mysql_num_rows($sqlbid)>0)
										{
											while($rowbid=mysql_fetch_array($sqlbid))
										   {
											   $pstart=date('Y/m/d',strtotime($rowbid['bstart']));
											   $pend=date('Y/m/d',strtotime($rowbid['bend']));
										   }
										   $btndisabled="";
										   $href="showad.php?a=".$row['adid'];
										}
										else
										{
											echo "<b style='color:red;text-transform:uppercase'>Bid not started yet</b>";
											$btndisabled="disabled";
											$href="#";
											?>
											<script type="text/javascript">
											document.getElementById("btnad<?php echo $i; ?>").href="#";
											document.getElementById("btnadd<?php echo $i; ?>").href="#"
											</script>
											<?php
										}
										/*** Bid Time ***/
										?>
									
											<div id="countdowntimer"><span id="given_date<?php echo $i;?>"></span></div>
										
										<div class="buttons" style="width:100%;text-align: center;">
										<a class="bid col-md-5" href="<?php echo $href;?>">Place Bid</a>
										<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" class="buy-now-btn col-md-5">
										<input type="hidden" name="business" value="<?php echo MERCHANT_EMAIL; ?>">
										<input type="hidden" name="cmd" value="_xclick">
										<input type="hidden" name="item_name" value="<?php echo $row['atitle']; ?>">
										<input type="hidden" name="amount" value="<?php echo $row['aprice']; ?>.00">
										<input type="hidden" name="cancel_return" value="<?php echo SITE_URL; ?>/cancelled.php">
									<input type="hidden" name="return" value="<?php echo SITE_URL; ?>/thankyou.php">
										<input type="hidden" name="currency_code" value="<?php echo CURRENCY_CODE; ?>">
										<button <?php echo $btndisabled; ?> type="submit" name="submit" class="buy" >Buy Now</button>

										</form>
										<button <?php echo $btndisabled; ?> type="button" name="submit" class="buy col-md-2" onclick="addtocart(<?php echo $row['adid']?>)"><i class="fa fa-shopping-basket"></i></button>
										</div>
									</a>
									
								</div>
							</div>
						</div>	
<?php
										}
				}
			}
?>			
	</div>
			
    </div>
     </div>  
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
	<script>
		// You can also use "$(window).load(function() {"
		$(function () {
			// Slideshow 4
			$("#slider4").responsiveSlides({
				auto: true,
				pager: true,
				nav: false,
				speed: 500,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});

		});
	</script>
	<!-- //banner-responsive-slider -->
	<!-- testimonials owl carousel -->
	<script src="js/owl.carousel.js"></script>
	<script>
		$(document).ready(function () {
			$("#owl-demo").owlCarousel({

				autoPlay: 3000, //Set AutoPlay to 3 seconds
				autoPlay: true,
				items: 3,
				itemsDesktop: [991, 2],
				itemsDesktopSmall: [414, 4]

			});
		});
	</script>
	<!-- //testimonials owl carousel -->
	<!-- About FlexSlider -->
	<script defer src="js/jquery.flexslider.js"></script>
	<script>
		$(window).load(function () {
			$('#carousel').flexslider({
				animation: "slide",
				controlNav: false,
				animationLoop: true,
				slideshow: false,
				itemWidth: 102,
				itemMargin: 5,
				asNavFor: '#slider'
			});

			$('#slider').flexslider({
				animation: "slide",
				controlNav: false,
				animationLoop: true,
				slideshow: true,
				sync: "#carousel",
				start: function (slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>
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
	<!-- Placed at the end of the document so the pages loads faster -->
	<script src="js/bootstrap.js"></script>
	 <script type="text/javascript" src="extras/jquery.countdownTimer.js"></script>
        <link rel="stylesheet" type="text/css" href="extras/jquery.countdownTimer.css" />
			<?php 
			include('config.php'); 
			$sql=mysql_query("select * from tblad where astatus='Y'");
			// Displays all ads if condition is met
			$j=0;
			if(mysql_num_rows($sql)>0)
			{
				while($row=mysql_fetch_array($sql))
				{
					$j++;
					
					if(mysql_num_rows($sql)>0)
					{
						$sqlbid=mysql_query("select * from tblbids where badid=".$row['adid']);
						if(mysql_num_rows($sql)>0)
					{
						while($rowbid=mysql_fetch_array($sqlbid))
							{
							$pstart=date('Y/m/d',strtotime($rowbid['bstart']));
							$pend=date('Y/m/d',strtotime($rowbid['bend']));
										
				?>
		  			
			<script>
               $(function(){
                  $('#given_date<?php echo $j; ?>').countdowntimer({
                     startDate : "<?php echo $pstart; ?>",
                     dateAndTime : "<?php echo $pend; ?>",
                     size : "lg",
					 regexpMatchFormat: "([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})",
      					regexpReplaceWith: "$1<sup class='displayformat'>days</sup> / $2<sup class='displayformat'>hours</sup> / $3<sup class='displayformat'>minutes</sup> / $4<sup class='displayformat'>seconds</sup>"
                 });
                });
             </script> 
			<?php }}}}} ?>	
  </body>
</html>