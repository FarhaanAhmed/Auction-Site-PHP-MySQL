<?php include('logincheck.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Bid2win</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
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
                            View category
                        </h1>
									
		</div>
            <div id="page-inner" class="inn-erme">
				<div class="row">
					<div class="col-lg-12">
					
						<div class="table-responsive">
						<table id="example2" class="table table-striped table-bordered table-hover manag-table common" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>S.no</th>
									<th>Parent</th>
									<th>Category</th>
									<th>Pic</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								include('../config.php'); 
								$sql=mysql_query("select * from tblcats where cparent='root'"); 
								if(mysql_num_rows($sql)>0)
								{
									$i=0;
									while($row=mysql_fetch_array($sql))
								   {
									   $i++;
									  echo "<tr>"; 
										echo "<td>".$i."</td>";
										echo "<td>".$row['cparent']."</td>";
										echo "<td class='text-lefts'>".$row['cname'];
										$parent=$row['cid'];
										   $qsubcat=mysql_query("select * from tblcats where cparent='".$parent."'");
										   
										   if(mysql_num_rows($qsubcat))
										   {
											   echo "<ul type='square'>";
											   while($rscat=mysql_fetch_array($qsubcat))
											   {
												   echo "<li><span style='min-width:200px;display:inline-block'>".$rscat['cname']."</span><a style='padding: 3px 7px;margin-bottom: 3px;' class='btn btn-default btn-submit edit' href='category.php?id=".$rscat['cid']."'><i class='fa fa-pencil'></i> Edit</a> <a style='padding: 3px 7px;margin-bottom: 3px;'  class='btn btn-default btn-submit delete btn-view' href='delcats.php?id=".$rscat['cid']."'><i class='fa fa-trash-o'></i> Delete</a></li>";
											   }
											   echo "</ul>";
										   }
										   else
										   {
											   echo "<br/><i style='color:red'>- No Subcategory Found !!!</i>";
										   }
										echo "</td>";
										echo "<td><img src='../pcats/".$row['cpic']."' width='150px' height='150px' /></td>";
										echo "<td style='width:5%'>".$row['cstatus']."</td>";
										echo "<td style='width:15%'> 
										<a class='btn btn-default btn-submit edit' href='category.php?id=".$row['cid']."'><i class='fa fa-pencil'></i> Edit</a> 
										<a  class='btn btn-default btn-submit delete btn-view' href='delcats.php?id=".$row['cid']."'><i class='fa fa-trash-o'></i> Delete</a></td>";
									  echo "</tr>";
								  }
								}
								else 
								{
								?> 
								 <tr>
								 <td colspan="5" class="text-center">No Records Found.</td>
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
    $('#example2').DataTable();
} );
	</script>
</body>

</html>