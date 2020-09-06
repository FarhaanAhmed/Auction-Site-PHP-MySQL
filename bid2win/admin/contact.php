
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
                            Contact
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
									<th>Mobile</th>
									<th>Email</th>
									<th>Message</th>
								</tr>
							</thead>
							<tbody>
							
								<tr>
									<td>1</td>
									<td>CONTACT</td>
									<td>1234567890</td>
									<td>w1539727@my.westminster.ac.uk</td>
									<td>
				<a href="#" class="btn btn-view"><i class="fa fa-trash-o"></i>  Delete</a>
				<a href="#" class="btn btn-reply" data-toggle="modal" data-target="#reply"><i class="fa fa-mail-reply"></i>  Reply</a>
									</td>
								</tr>
							
							
							 
							</tbody>
							</table>
						</div>
                    </div>
                </div>.

<div class="modal fade product_view" id="reply">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">Reply</h3>
            </div>
            <div class="modal-body">
                <form class="reply-form">
				<div class="form-group">
				<textarea class="form-control" Placeholder="Enter your message here...."></textarea>
				</div>
				<button type="submit" class="btn btn-default btn-submit">Send</button>
				<a href="#" data-dismiss="modal" class="btn btn-dealer">Close</a>
				</form>
            </div>
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