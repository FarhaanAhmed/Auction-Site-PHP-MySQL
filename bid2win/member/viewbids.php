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
                           View Bids
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
									<th>Ad Start</th>
									<th>Ad End</th>
									<th>Status</th>
									<th>Bids Recd.</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									include('../config.php'); 
									$sql=mysql_query("select tblbids.*,tblad.* from tblbids inner join tblad on tblbids.badid=tblad.adid where tblbids.buid=$uid");
									if(mysql_num_rows($sql)>0)
									{
										$i=0;
										
										while($row=mysql_fetch_array($sql))
									   {
										  $i++;
										  $adid=$row['adid']
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['atitle']; ?></td>
									<td><?php echo $row['bstart']; ?></td>
									<td><?php echo $row['bend']; ?></td>
									<td style="color: #0c406c;font-weight: bold;">
									<?php
									   $timefromdb= date("Y-m-d", strtotime($row['bstart']));
									   $future= date("Y-m-d", strtotime($row['bend']));
									   //$timeleft = $future-$timefromdb;
									 
									   echo "Bidding is Active<img style='width:40px' src='images/clock.gif' />";
									?>
									</td>
									<td>
									 <?php 
									     $sqlbids=mysql_query("select tbluserbid.*,tblusers.* from tbluserbid inner join tblusers on tbluserbid.uuid=tblusers.uid where tbluserbid.uadid='".$row['badid']."'");
										  if(mysql_num_rows($sqlbids)>0)
										 {
											 echo "<ul>";
											 while($rowbids=mysql_fetch_array($sqlbids))
											 {
												echo "<li>Offer Price : ".$rowbids['uprice'].".00<br/> Name : ".$rowbids['ufname']." ".$rowbids['ulname']."<br/>
												Contact : ".$rowbids['uphone']."<br/>Email : ".$rowbids['uemail']."<br/>";
												if($rowbids['uaward']=="N")
												  echo "<a href='acceptoffer.php?adid=".$adid."&id=".$rowbids['ubid']."'>Accept Offer</a>";
												else
												  echo "<b>Awarded</b>" ;	
												echo "<hr/></li>"; 
											 }
											 echo"</ul>";
										 }
										 ?>
									</td>
									<td style='width:10%'>
									<?php echo $row['bstatus']; ?><br/>
									<a class='btn btn-default btn-submit edit' href='bid.php?id=<?php echo $row['bid']; ?>'><i class="fa fa-pencil"></i></a> <a class="btn btn-default btn-submit delete" href="delbid.php?id=<?php echo $row['bid']; ?>"><i class="fa fa-trash-o"></i></a></td>
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