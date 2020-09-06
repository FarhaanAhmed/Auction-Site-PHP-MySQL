<?php include('logincheck.php'); include('config.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                            Upload Sheet
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
								   <th>Origin</th>
								   <th>Dispatch Date</th>
								   <th>Move Order No. / DSM Order No.</th>
								   <th>Contact Person </th>
								   <th>Contact Person No</th>
								   <th>Site Id / AR Code</th>
								   <th>Site Name / Distributor Name</th>
								   <th>Location</th>
								   <th>Zone</th>
								   <th>Transporter  / Courier Name</th>
								   <th>Vehicle Number</th>
								   <th>Docket No. / Gr. No.</th>
								   <th>Invoice No./ DC No.</th>
								   <th>No of Packages</th>
								   <th>Weight</th>
								   <th>Material type</th>
								   <th>Remarks</th>
								   <th>Status</th>
								   <th>Image</th>
								   <th>Delete</th>
								</tr>
							</thead>
							<tbody>
							<!--
								<tr>
									<td>1</td>
									<td>Same</td>
									<td>+91 48635 56426</td>
									<td><button type="submit" class="btn btn-default btn-submit"><i class="fa fa-pencil"></i> Edit</button> <a href="view.html" class="btn btn-view"><i class="fa fa-trash-o"></i>  Delete</a></td>
								</tr>
							-->
							<?php 
							include('config.php'); 
							$sql=mysql_query("select * from tblupload order by cid desc"); 
							$i=0;
							if(mysql_num_rows($sql)>0)
							{
								while($row=mysql_fetch_array($sql))
							   {
								   $dateshow=date('d-m-Y', strtotime($row['pidate']));
								   $i++;
								    echo "<tr>"; 
									echo "<td>".$i."</td>";
									echo "<td>".$row['corigin']."</td>";
									echo "<td>".$dateshow."</td>";
									echo "<td>".$row['porder']."</td>";
									echo "<td>".$row['pcperson']."</td>";
									echo "<td>".$row['pcpersono']."</td>";
									echo "<td>".$row['psiteid']."</td>";
									echo "<td>".$row['psitename']."</td>";
									echo "<td>".$row['ploc']."</td>";
									echo "<td>".$row['ptransport']."</td>";
									echo "<td>".$row['pzone']."</td>";
									echo "<td>".$row['pvehicle']."</td>";
									echo "<td>".$row['pdocket']."</td>";
									echo "<td>".$row['pinvoice']."</td>";
									echo "<td>".$row['ppackages']."</td>";
									echo "<td>".$row['pweight']."</td>";
									echo "<td>".$row['pmaterial']."</td>";
									echo "<td>".$row['premarks']."</td>";
									echo "<td>";
									if($row['pstatus']  == '0'){
										echo "In Transit";
									}elseif($row['pstatus']  == 1){
										echo "Delievered";
									}elseif($row['pstatus']  == 2){
										echo "Out for Delievry";
									}elseif($row['pstatus']  == 4){
										echo "Returned";
									}elseif($row['pstatus']  == 5){
										echo "Lost/Damaged";
									}


									echo "</td>";

									echo "<td>";
									if(!empty($row['cimage'])){ ?>
										<a target="_blank" href="<?php echo 'ideapp/'.$row['cimage']?>">POD</a>

										<?php								}else{
										echo "--";
									}

									echo "</td>";
									
									echo "<td><a href='delupentry.php?id=".$row['cid']."'>Delete</a>";

								    echo "</tr>";
							  }
							}
							else 
							{
							?> 
							 <tr>
							 <td colspan="13" class="text-center">No Records Found !!</td>
							</tr>
							<?php 
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