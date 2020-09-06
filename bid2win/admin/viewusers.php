<?php include('logincheck.php'); ?>
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
                            View User(s)
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
									<th>Name</th>
									<th>Contact</th>
									<th>Username</th>
									<th>Password</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php 
							include('../config.php'); 
							$sql=mysql_query("select * from tblusers where utype!='admin'"); 
							$i=0;
							if(mysql_num_rows($sql)>0)
							{
								while($row=mysql_fetch_array($sql))
							   {
								   $i++;
								  echo "<tr>"; 
									echo "<td>".$i.".</td>";
									echo "<td>".$row['ufname']." ".$row['ulname']."</td>";
									echo "<td>".$row['uemail']."<br/>".$row['uphone']."<br/>".$row['uaddress']."</td>";
									echo "<td>".$row['uuname']."</td>";
									echo "<td>".$row['upass']."</td>";
									echo "<td>".$row['ustatus']."</td>";
									echo "<td><a href='deluser.php?id=".$row['uid']."' class='btn btn-view'><i class='fa fa-trash-o'></i>  Delete</a>";
									if($row['ustatus']=="Y")
									{
										echo "<a href='suspenduser.php?id=".$row['uid']."' class='btn btn-suspend'><i class='fa fa-dot-circle-o'></i>  Suspend</a>";
									}
									else if($row['ustatus']=="N")
									{
										echo "<a href='activateuser.php?id=".$row['uid']."' class='btn btn-suspend'><i class='fa fa-check'></i>  Activate</a>";
									}
								  echo "</td>";
								  echo "</tr>";
							  }
							}
							else 
							{
							?> 
							 <tr>
							 <td colspan="7" class="text-center">No Records Found !!</td>
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