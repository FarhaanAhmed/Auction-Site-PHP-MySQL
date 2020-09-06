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
<?php
if(isset($_GET['cat']) || isset($_GET['sub']))
{
 $getacat=$_GET['cat'];
 include("config.php");
 $catname="";
 $cimg="";
 $sqlcatname=mysql_query("select * from tblcats where cid=".$getacat); 
 // Retrieve Category from the MYSql table tblcats
	if(mysql_num_rows($sqlcatname)>0)
		{
			$i=0;
			while($rowcatname=mysql_fetch_array($sqlcatname))
			{
				$catname=$rowcatname['cname'];
				$cimg=$rowcatname['cpic'];
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
		<li><a href="index.php">Home</a></li>
		<li class="active"><span><?php echo $catname; ?></span></li>
	</ol>
</div>
		</div>
		 <main>
		<!-- //header -->

		
	<div class="main-container">
        <div class="container">
    	<div class="row">
		<div class="adds-wrapper">
		<?php
				include('config.php');
				if(isset($_GET['cat']))
				{
					$getacat=$_GET['cat'];
					$sqlquery="select * from tblad where astatus='Y' and acat=".$getacat;
				}
				if(isset($_GET['sub']))
				{
					$getacat=$_GET['sub'];
					$sqlquery="select * from tblad where astatus='Y' and asubcat=".$getacat;
				}
				$sql=mysql_query($sqlquery);
				$i=0;
				if(mysql_num_rows($sql)>0)
					{
					 while($row=mysql_fetch_array($sql))
					  {
						  $i++;
							/*** Bid Time ***/
							$sqlbid=mysql_query("select * from tblbids where badid=".$row['adid']);
							if(mysql_num_rows($sqlbid)>0)
								{
								while($rowbid=mysql_fetch_array($sqlbid))
								{
									$pstart=date('Y/m/d',strtotime($rowbid['bstart']));
									$pend=date('Y/m/d',strtotime($rowbid['bend']));
								}
						}
						/*** Bid Time ***/					
		?>
									  
		<div class="item-list">
			<div class="row">
				<div class="col-md-2 no-padding photobox">
					<div class="add-image"> <a href="showad.php?a=<?php echo $row['adid'];?>"><img class="thumbnail no-margin" src="uploads/<?php echo $row['aimage']; ?>" alt="img"></a>
					</div>
				</div>
    <!--/.photobox-->
			<div class="col-sm-4 add-desc-box">
				<div class="ads-details">
					<h5 class="add-title"><a href="showad.php?a=<?php echo $row['adid'];?>">
						<?php echo $row['atitle']; ?> </a></h5>
					<span class="info-row"> 
					<?php echo $row['adesc']; ?>
					<br><b style="color:maroon"><i><?php echo $row['aqty']; ?> Available</i></b>
					</span>
					
					</div>
			</div>
    <!--/.add-desc-box-->
			<div class="col-md-6 text-right  price-box">
				<h2 class="item-price"> &pound; <?php echo $row['aprice']; ?> </h2>
				
				
				<div id="countdowntimer"><span id="given_date<?php echo $i; ?>"></span></div>
			
			
			
			
			
				<div class="buttons">
				 <a class="bid" href="showad.php?a=<?php echo $row['adid'];?>">Place Bid</a> 
					<img style='width:40px' src='member/images/clock.gif' />Bidding is Active
					<a class="buy" href="showad.php?a=<?php echo $row['adid'];?>">Buy Now</a>
						<button type="button" name="submit" class="buy" onclick="addtocart(<?php echo $row['adid'];?>)"><i class="fa fa-shopping-basket"></i></button>
				</div>
			</div>
    <!--/.add-price-->
			</div>
	</div>
		<?php
			}
		}
		?>
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
		<?php
				include('config.php');
				if(isset($_GET['cat']))
				{
					$getacat=$_GET['cat'];
					$sqlquery="select * from tblad where astatus='Y' and acat=".$getacat;
				}
				if(isset($_GET['sub']))
				{
					$getacat=$_GET['sub'];
					$sqlquery="select * from tblad where astatus='Y' and asubcat=".$getacat;
				}
				$sql=mysql_query($sqlquery);
				$i=0;
				if(mysql_num_rows($sql)>0)
					{
					 while($row=mysql_fetch_array($sql))
					  {
						  $i++;
							/*** Bid Time ***/
							$sqlbid=mysql_query("select * from tblbids where badid=".$row['adid']);
							if(mysql_num_rows($sqlbid)>0)
								{
								while($rowbid=mysql_fetch_array($sqlbid))
								{
									$pstart=date('Y/m/d',strtotime($rowbid['bstart']));
									$pend=date('Y/m/d',strtotime($rowbid['bend']));
								}
						}
						/*** Bid Time ***/	
						?>
			<script>
               $(function(){
                  $('#given_date<?php echo $i; ?>').countdowntimer({
                     startDate : "<?php echo $pstart; ?>",
                     dateAndTime : "<?php echo $pend; ?>",
                     size : "lg",
					  regexpMatchFormat: "([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})",
      					regexpReplaceWith: "$1<sup class='displayformat'>days</sup> / $2<sup class='displayformat'>hours</sup> / $3<sup class='displayformat'>minutes</sup> / $4<sup class='displayformat'>seconds</sup>"
                 });
                });
             </script> 
			 <?php
					  }
					}
					?>
  </body>
</html>