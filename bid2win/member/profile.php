<?php include('logincheck.php'); ?>
<?php include('../config.php'); 
$uid=$_SESSION['uid'];
$sql=mysql_query("select * from tblusers where uid=".$uid);
	   $ufname="";
	   $ulname="";
	   $uuname="";
	   $uemail="";
	   $uphone="";
	   $uaddress="";
if(mysql_num_rows($sql)>0)
{
    while($row=mysql_fetch_array($sql))
   {
	   $ufname=$row['ufname'];
	   $ulname=$row['ulname'];
	   $uuname=$row['uuname'];
	   $uemail=$row['uemail'];
	   $uphone=$row['uphone'];
	   $uaddress=$row['uaddress'];
   }
}
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
                            Profile
                        </h1>
									
		</div>
            <div id="page-inner" class="inn-erme">
				<div class="row">
				<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                  Profile
								
                            </div> 
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-offset-2 col-lg-8 col-lg-offset-2 reg-form">
								
                                    <form role="form" method="post" action="updateprofile.php">
											<div class="form-group row">
                                            <label class="col-sm-3">First Name</label>
                                            <div class="col-sm-9"><input class="form-control" type="text" name="ufname" required value="<?php echo $ufname; ?>"></div>
                                        </div>
										            
														<div class="form-group row">
                                            <label class="col-sm-3">Last Name</label>
                                            <div class="col-sm-9"><input class="form-control" type="text" name="ulname" required value="<?php echo $ulname; ?>"></div>
                                        </div>
										            
													
										<div class="form-group row">
                                            <label class="col-sm-3">Username</label>
                                            <div class="col-sm-9"><label><?php echo $uuname; ?></label></div>
                                        </div>
										                                        
										<div class="form-group row">
                                            <label class="col-sm-3">Email</label>
                                            <div class="col-sm-9"><input class="form-control" type="email" name="uemail" required value="<?php echo $uemail; ?>"></div>
                                        </div>
										

										<div class="form-group row">
                                            <label class="col-sm-3">Phone</label>
                                            <div class="col-sm-9"><input class="form-control" type="text" name="uphone" value="<?php echo $uphone; ?>"></div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3">Address</label>
                                            <div class="col-sm-9">
											<textarea class="form-control" name="uaddress" required> <?php echo $uaddress; ?></textarea></div>
                                        </div>
                                        
										 <div class="form-group row">
                                            <label class="col-sm-3"></label>
                                            <div class="col-sm-9">
											<button type="submit" class="btn btn-default btn-submit">Update Profile</button>
                                        </div>
                                    </form>
                                </div>
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
