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
                            Change Password
                        </h1>
									
		</div>
            <div id="page-inner" class="inn-erme">
				<div class="row">
				<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                 Change Password - Required Fields are marked with a *
                            </div> 
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-offset-2 col-lg-8 col-lg-offset-2 reg-form">
								
                                    <form role="form" method="post">
										<div class="form-group row">
                                            <label class="col-sm-3">* Old Password</label>
                                            <div class="col-sm-9"><input class="form-control" type="text" name="ops" required></div>
                                        </div>
										
										
                                        <div class="form-group row">
                                            <label class="col-sm-3">* New Password</label>
                                            <div class="col-sm-9"><input class="form-control" type="text" name="nps" required></div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-3">* Confirm Password</label>
                                            <div class="col-sm-9"><input class="form-control" type="text" name="nps" required></div>
                                        </div>
										</div>
											<div class="registrationFormAlert" id="divCheckPasswordMatch">
										</div>
										 <div class="form-group row">
                                            <label class="col-sm-3"></label>
                                            <div class="col-sm-9"><button type="submit" name="sub" class="btn btn-default btn-submit">Change</button>
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
       
</body>

</html> 
<?php
include ('../config.php');
if (isset($_POST['sub']))
{
	$username=$_SESSION['uuname'];

	$pass=$_POST['ops'];
	$newpass=$_POST['nps'];
	$query = mysql_query("select * from tblusers where uuname='$username' and upass='$pass'");

	if (mysql_num_rows($query))
	{
	$update=mysql_query("update tblusers set upass='$newpass' where uuname='$username'");
	if ($update)
	{
	echo "<script>alert('Password Changed Successfully.')</script>";
	}
	else
	{
	die ("<script>alert('Error Occurred. Try Again')</script>");
	}
	}
	else
	{
	echo ("<script>alert('Incorrect old password.')</script>");
	die ();
	}
}
?>