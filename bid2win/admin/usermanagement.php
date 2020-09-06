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
                            Add User
                        </h1>
									
		</div>
            <div id="page-inner" class="inn-erme">
				<div class="row">
				<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                  Create User - Required Fields are marked with a *
								
                            </div> 
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-offset-2 col-lg-8 col-lg-offset-2 reg-form">
								<form id="register-form" action="insertusers.php" method="post" role="form">
									<div class="form-group">
										<input type="text" name="ufname" required id="username" tabindex="1" class="form-control" placeholder="* First Name" value="">
									</div>
									<div class="form-group">
										<input type="text" name="ulname" required id="username" tabindex="1" class="form-control" placeholder="* Last Name" value="">
									</div>
									<div class="form-group">
										<input type="text" name="uuname" required id="username" tabindex="1" class="form-control" placeholder="* Username" value="">
									</div>
									<div class="form-group">
										<input type="email" name="uemail" required id="email" tabindex="1" class="form-control" placeholder="* Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="upass" required id="password" tabindex="2" class="form-control" placeholder="* Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" required id="confirm-password" tabindex="2" class="form-control" placeholder="* Confirm Password">
									</div>
									<div class="form-group">
										<input type="uphone" name="uphone" id="password" tabindex="2" class="form-control" placeholder="Phone">
									</div>
									<div class="form-group">
										<textarea type="uaddress" name="uaddress" required id="password" tabindex="2" class="form-control" placeholder="* Address"></textarea>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<button type="submit" name="register-submit" id="register-submit" tabindex="4" class="btn btn-default btn-submit">Register Now</button>
												<a href="viewusers.php" class="btn btn-dealer">View</a>
											</div>
										</div>
									</div>
								</form>
							 <!-- /.col-lg-6 (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                            
                            
                        </div>

                    </div>
                </div>	   
            </div>
			 <?php include('footer.php'); ?>
       
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
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>

</html>
