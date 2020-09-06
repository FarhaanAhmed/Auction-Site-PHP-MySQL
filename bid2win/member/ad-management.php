<?php include('logincheck.php'); ?>
<?php 
$acat="";		
			$atitle="";
			$adesc="";
			$aimage="";
			$aprice="";
			$aqty="";
if(isset($_GET['id']))
{
	include('../config.php');	
	$aid=$_GET['id'];
	$sql=mysql_query("select * from tblad where adid='$aid'");
	if(mysql_num_rows($sql)>0)
	{
		while($row=mysql_fetch_array($sql))
		{
			$acat=$row['acat'];		
			$atitle=$row['atitle'];
			$adesc=$row['adesc'];
			$aimage=$row['aimage'];
			$aprice=$row['aprice'];
			$aqty=$row['aqty'];
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
                            Ad Management
                        </h1>
									
		</div>
            <div id="page-inner" class="inn-erme">
				<div class="row">
				<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                 Ad Management - Required Fields are marked with a *
                            </div> 
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-offset-2 col-lg-8 col-lg-offset-2 reg-form">
								
                                    <form role="form" method="post" action="<?php if(isset($_GET['id'])) {echo "updateads.php?id=$aid";} else {echo "insertads.php";} ?>" enctype="multipart/form-data">
										
										<div class="form-group row">
                                            <label class="col-sm-3">* Category</label>
                                            <div class="col-sm-9">
											 <?php
											include('dbConfig.php');
											$query = $db->query("SELECT * FROM tblcats ORDER BY cid ASC");
											$rowCount = $query->num_rows;
											?>
										<select required name="acat" id="acat" class="form-control">
										
										<?php if(isset($_GET['id']))
										{
											$getcname=mysql_query("SELECT * FROM tblcats where cid=".$acat);
											while($rowcname=mysql_fetch_array($getcname))
											 {
											?>
											<option value="<?php echo $acat; ?>"><?php echo $rowcname['cname']; ?></option>
											<?php
											 }
										}
										?>
										<option value="">--Select--</option>
										<?php
										include('../config.php'); 
										$sql1=mysql_query("select * from tblcats where cstatus='Y' and cparent='root'"); 
										if(mysql_num_rows($sql1)>0)
										{
											while($row1=mysql_fetch_array($sql1))
											{
												echo "<option value='".$row1['cid']."'>".$row1['cname']."</option>";
											}
										}
										?>
										
										</select>
									
										
											</div>
                                        </div>
											<div class="form-group row">
                                            <label class="col-sm-3">* Sub Category</label>
                                            <div class="col-sm-9">
										
										<select name="asubcat" required id="asubcat" class="form-control" <?php if(isset($_GET['id'])) { echo ""; }else {echo "disabled";} ?>>
										<?php if(isset($_GET['id']))
										{
											$getcname=mysql_query("SELECT * FROM tblcats where cid=".$asubcat);
											while($rowcname=mysql_fetch_array($getcname))
											 {
											?>
											<option value="<?php echo $asubcat; ?>"><?php echo $rowcname['cname']; ?></option>
											<?php
											 }
										}
										?>
										
										   <option>--Please select parent category first--</option>
										</select>
										</div>
										</div>								
										<div class="form-group row">
                                            <label class="col-sm-3">* Ad Title</label>
                                            <div class="col-sm-9"><input class="form-control" type="text" name="atitle" required value="<?php echo $atitle; ?>"></div>
                                        </div>
										
										
                                        <div class="form-group row">
                                            <label class="col-sm-3">* Ad Description</label>
                                            <div class="col-sm-9"><textarea class="textarea" placeholder="Enter description of item here" name="adesc" required style="width: 100%;height:200px"><?php echo $adesc; ?></textarea></div>
                                        </div>
										
										<div class="form-group row">
                                            <label class="col-sm-3">Ad Image</label>
                                            <div class="col-sm-9"><input class="form-control" type="file" name="aimage">
											<?php
											  if(isset($_GET['id']))
											  {
												  ?>
												  <img src="../uploads/<?php echo $aimage?>" width="150px" />
												  <input type="hidden" name="ahid" value="<?php echo $aimage; ?>" />
												  <?php
											  }
											?>
											</div>
                                        </div>
										
                                        <div class="form-group row">
                                            <label class="col-sm-3">* Ad Price (£)</label>
                                            <div class="col-sm-9"><input class="form-control" type="number" step=".01" name="aprice" required value="<?php echo $aprice; ?>"></div>
                                        </div>
										
                                        <div class="form-group row">
                                            <label class="col-sm-3">* Quantity Available</label>
                                            <div class="col-sm-9"><input class="form-control" type="number" step="1" name="aqty" required value="<?php echo $aqty; ?>"></div>
                                        </div>
									<div class="form-group row">
                                            <label class="col-sm-3">Publish</label>
                                            <div class="col-sm-9"><input class="" type="checkbox" checked name="astatus"></div>
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
<script>
					
						jQuery(document).ready(function(){
							/*** get otp ***/
							jQuery("#acat").change(function(){
								jQuery.post("getsubcat.php",
								{
								  pid: jQuery("select#acat option:selected").attr('value')
								},
								function(data,status){
									//alert("Data: " + data + "\nStatus: " + status);
									if(status=="success")
									{
										jQuery("#asubcat").html(data);
										jQuery("#asubcat").removeAttr("disabled");
									}
									else
									{
										alert("Error. Please retry");
									}
								});
							});
						});
					</script>
					       
</body>

</html>
