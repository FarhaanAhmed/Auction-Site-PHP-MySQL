<?php include('logincheck.php'); ?>
<?php include('../config.php'); 
$uid=$_SESSION['uid'];
?>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" /> 
<?php 
$adid=$_GET['id'];
$acat=$_POST['acat'];
$atitle=$_POST['atitle'];
$adesc=$_POST['adesc'];
$aqty=$_POST['aqty'];
if(empty($_FILES['aimage']['name']))
{
	$aimage=$_POST['ahid'];
}
else
{
	$aimage=rand().$_FILES['aimage']['name'];
	move_uploaded_file($_FILES['aimage']['tmp_name'],"../uploads/".$aimage);
}
$aprice=$_POST['aprice'];
$auser=$uid;
if($_POST['astatus'])
{
	$astatus='Y';
}
else
{
	$astatus='N';
}
$adate=date('d-M-Y h:i:s');

$sql=mysql_query("update tblad set acat='$acat',atitle='$atitle',adesc='$adesc',aimage='$aimage',aprice='$aprice',auser='$auser',astatus='$astatus',adate='$adate',aqty='$aqty' where adid=".$adid); 
if($sql) 
{ 
  ?> 
  <script type="text/javascript"> 
  $(document).ready(function() {
  swal({ 
    title: "Success",
    text: "Ad Updated Successfully.",
    type: "success" 
  },
   function(){
    window.location.href='viewads.php';
  });
  });
  </script>
  <?php 
}
else 
{ 
?>
  <script type="text/javascript">
  $(document).ready(function() {
  swal({ 
    title: "Error",
   text: "Ad Not Updated. Try again.",
    type: "error" 
  },
    function(){
   window.location.href='viewads.php';
  });
  });
  </script>
  <?php 
}
?>
