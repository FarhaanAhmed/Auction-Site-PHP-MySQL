<?php include('logincheck.php'); ?>
<?php include('../config.php'); 
$uid=$_SESSION['uid'];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	 <title>Bid2win</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
</head>

<body>
    <div id="wrapper">
       <?php include('topmenu.php'); ?>
        <!--/. NAV TOP  -->
		<?php include('mainmenu.php'); ?>
		<!-- /. NAV SIDE  -->
      
		<div id="page-wrapper">
		  <div class="header"> 
                        <h1 class="page-header">
                           My Bids Management
                        </h1>
									
		</div>
            <div id="page-inner" class="inn-erme">
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered table-hover manag-table" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>S.no</th>
									<th>Ad Title</th>
									<th>My Bid Price</th>
									<th>Bids Status</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									include('../config.php'); 
									$sql=mysql_query("select tbluserbid.*,tblad.* from tbluserbid inner join tblad on tbluserbid.uadid=tblad.adid where tbluserbid.uuid=$uid");
									if(mysql_num_rows($sql)>0)
									{
										$i=0;
										
										while($row=mysql_fetch_array($sql))
									   {
										  $i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['atitle']; ?></td>
									<td> £ <?php echo $row['uprice']; ?></td>
									<td><?php
										if($row['uaward']=='N' && $row['upaid']=='N')
										{
											echo "Pending";
										}
										if ($row['uaward']=='Y' && $row['upaid']=='N')
										{
											echo "Offer Accepted<br/>";
											?>
											<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" class="buy-now">
										<input type="hidden" name="business" value="<?php echo MERCHANT_EMAIL; ?>">
										<input type="hidden" name="cmd" value="_xclick">
										<input type="hidden" name="item_name" value="<?php echo $row['atitle']; ?>">
										<input type="hidden" name="amount" value="<?php echo $row['uprice']; ?>.00">
										<input type="hidden" name="cancel_return" value="<?php echo SITE_URL; ?>/cancelled.php">
									<input type="hidden" name="return" value="<?php echo SITE_URL; ?>/thankyou.php">
										<input type="hidden" name="currency_code" value="<?php echo CURRENCY_CODE; ?>">
										<button type="submit" name="submit" class="buy">Pay Now</button>

										</form>
											<?php
											
										}
										if($row['uaward']=='Y' && $row['upaid']=='Y')
										{
											echo "Completed";
										}
									?></td>
									
								</tr>
							<?php
									   }
									}
									?>
							
							</tbody>
							</table>
						</div>
                    </div>
                </div>	   
				<?php include('footer.php'); ?>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
	<script src="assets/js/jquery-1.10.2.js"></script>
	 <script src="assets/js/bootstrap.min.js"></script>
	 
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	
	<script>
		$(document).ready(function() {
    $('#example').DataTable();
} );
	</script>
</body>

</html>