<?php include('logincheck.php'); ?>
<?php
$cname="";
$cpic="";
if(isset($_GET['id']))
{
	include('../config.php');
	$id=$_GET['id'];
	$cid=$_GET['id'];
	$sql=mysql_query("select * from tblcats where cid=".$id); 
		if(mysql_num_rows($sql)>0)
		{
			$i=0;
			while($row=mysql_fetch_array($sql))
			{
				$cparent=$row['cparent'];
				$cname=$row['cname'];
				$cpic=$row['cpic'];
			}
	}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>FARMING ULSTER : ADMIN PANEL</title>
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
                            Add new category
                        </h1>
									
		</div>
            <div id="page-inner" class="inn-erme">
				<div class="row">
				<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                  Add new category
								
                            </div> 
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-offset-2 col-lg-8 col-lg-offset-2 reg-form">
								
                                    <form role="form" method="post" action="<?php if(isset($_GET['id'])) {echo "updatecats.php?id=".$id;} else {echo "insertcats.php";} ?>" enctype="multipart/form-data">
										<div class="form-group row">
                                            <label class="col-sm-3">Parent</label>
                                            <div class="col-sm-9">
											<select class="form-control" name="cparent" required>
											<?php if(isset($_GET['id'])) {
											  if($cparent=="root")
											  {
											   echo "<option value='root'>root</option>";
											  }
											  else
											  {
											    
											    $sqlgname=mysql_query("select * from tblcats where cid='".$cparent."'"); 
												if(mysql_num_rows($sqlgname)>0)
												{
												  while($rowgname=mysql_fetch_array($sqlgname))
												  {
													  $getparent=$rowgname['cname'];
												     echo "<option value='".$cparent."'>".$getparent."</option>";
												  }
												}
											  }										  
											}
											?>
											   <option value="">--Select--</option>
											   <option value="root">root</option>
											  <?php
											  include('../config.php'); 
								             $sql=mysql_query("select * from tblcats"); 
								            if(mysql_num_rows($sql)>0)
								           {
									         $i=0;
									         while($row=mysql_fetch_array($sql))
								             {
												 echo "<option value=".$row['cid'].">".$row['cname']."</option>";
								             }
								           }
									   ?>
											</select></div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-3">Category Name</label>
                                            <div class="col-sm-9"><input class="form-control" type="text" name="cname" required value="<?php if(isset($_GET['id'])) { echo $cname; } ?>"></div>
                                        </div>
									
                                        <div class="form-group row">
                                            <label class="col-sm-3">Category Pic</label>
                                            <div class="col-sm-9">
                                            	<input class="form-control" type="file" name="cpic">
                                            	<?php if(isset($_GET['id'])) { echo "<input type='hidden' name='hidepic' value='".$cpic."' /><img src='../pcats/". $cpic."' width='100px' height='100px' />"; } ?>
                                            </div>
                                        </div>
										<div class="form-group row">
                                         <div class="form-check">
	                                      <label class="col-sm-3">Status</label>
                                          <label class="form-check-label col-sm-9">
                                           <input class="form-check-input" type="checkbox" checked value="Y" name="cstatus"> 
                                        </label>
                                        </div>
                                       </div>
									  
										 <div class="form-group row">
                                            <label class="col-sm-3"></label>
                                            <div class="col-sm-9"><button type="submit" class="btn btn-default btn-submit">Submit</button>
											<a href="view-category.php" class="btn btn-primary">View Category</a>
                                        </div>
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
