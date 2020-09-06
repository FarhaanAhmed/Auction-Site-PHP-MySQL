<?php include('logincheck.php'); ?>
<?php include('../config.php'); 
$uid=$_SESSION['uid'];
?>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" /> 
<?php include('config.php'); 
$adid=0;
$acat=$_POST['acat'];
$asubcat=$_POST['asubcat'];
$atitle=$_POST['atitle'];
$adesc=$_POST['adesc'];
$aqty=$_POST['aqty'];
if(empty($_FILES['aimage']['name']))
{
	$aimage="noimg.png";
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

$sql=mysql_query("insert into tblad values ($adid,'$acat','$asubcat','$atitle','$adesc','$aimage','$aprice','$auser','$astatus','$adate','$aqty')"); 
if($sql) 
{ 
  ?> 
  <script type="text/javascript"> 
  $(document).ready(function() {
  swal({ 
    title: "Success",
    text: "Ad Saved Successfully.",
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
echo mysql_error();
?>
  <script type="text/javascript">
  $(document).ready(function() {
  swal({ 
    title: "Error",
   text: "Ad Not Saved. Try again.",
    type: "error" 
  },
    function(){
   window.location.href='ad-management.php';
  });
  });
  </script>
  <?php 
}
?>
