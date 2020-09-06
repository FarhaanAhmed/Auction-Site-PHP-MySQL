<?php include('logincheck.php'); ?>
<?php include('../config.php'); 
$uid=$_SESSION['uid'];
?>
<?php 
			$btitle="";
			$bstart="";
			$bend="";
if(isset($_GET['id']))
{
	include('../config.php');	
	$bid=$_GET['id'];
	$sql=mysql_query("select * from tblbids where bid='$bid'");
	if(mysql_num_rows($sql)>0)
	{
		while($row=mysql_fetch_array($sql))
		{
			$btitle=$row['badid'];
			$bstart=$row['bstart'];
			$bend=$row['bend'];	
			$bminamt=$row['bminamt'];
		}
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
	<link href="assets/css/bootstrap3-wysihtml5.min.css" rel="stylesheet" />
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
                            Bid Management
                        </h1>
									
		</div>
            <div id="page-inner" class="inn-erme">
				<div class="row">
				<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                 Bid Management
                            </div> 
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-offset-2 col-lg-8 col-lg-offset-2 reg-form">
								
                                    <form role="form" method="post" action="<?php if(isset($_GET['id'])) {echo "updatebids.php?id=$bid";} else {echo "insertbids.php";} ?>" enctype="multipart/form-data">
										
										<div class="form-group row">
                                            <label class="col-sm-3">Choose Ad Title</label>
                                            <div class="col-sm-9">
											<select class="form-control" type="text" name="badid" required>
											<?php 
											$sql=mysql_query("select * from tblad where auser='$uid'");
											$selected="";
											
											if(mysql_num_rows($sql)>0)
											{
												while($row=mysql_fetch_array($sql))
											   {
												   if(isset($_GET['id']))
												   {
													   if($row['adid']==$btitle)
													     $selected="selected";
												   }
												   echo "<option $selected value='".$row['adid']."'>".$row['atitle']."</option>";
											   }
											}
									   ?>		
											</select>
											</div>
                                        </div>
										
										<div class="form-group row">
                                            <label class="col-sm-3">Min. Bid Amount</label>
                                            <div class="col-sm-9">
											<input class="form-control" type="number" step=".01" name="bminamt" required value="<?php echo $bminamt; ?>"></div>
                                        </div>
										
										<div class="form-group row">
                                            <label class="col-sm-3">Start Date</label>
                                            <div class="col-sm-9">
											<input id="bstart" class="form-control" type="text" name="bstart" required value="<?php echo $bstart; ?>"></div>
                                        </div>
										
										
                                        <div class="form-group row">
                                            <label class="col-sm-3">End Date</label>
                                            <div class="col-sm-9">
											<input id="bend" class="form-control" type="text" name="bend" required value="<?php echo $bend; ?>"></div>
                                        </div>
									
									
										
										 <div class="form-group row">
                                            <label class="col-sm-3"></label>
                                            <div class="col-sm-9">
											<button type="submit" class="btn btn-default btn-submit">Save</button>
											<a href="viewads.php" class="btn btn-dealer">View</a>
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
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#bstart" ).datepicker({ dateFormat: 'dd-mm-yy' });
	$( "#bend" ).datepicker({ dateFormat: 'dd-mm-yy' });
  } );
  </script>       
</body>

</html>
