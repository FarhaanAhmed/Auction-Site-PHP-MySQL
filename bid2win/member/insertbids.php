<?php include('logincheck.php'); ?>
<?php include('../config.php'); 
$uid=$_SESSION['uid'];
?>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" /> 
<?php 
$bid=0;
$badid=$_POST['badid'];
$buid=$uid;
$bstart=$_POST['bstart'];
$bminamt=$_POST['bminamt'];
$bend=$_POST['bend'];
$bstatus="Active";

$sql=mysql_query("insert into tblbids values ($bid,'$badid','$buid','$bminamt','$bstart','$bend','$bstatus')"); 
if($sql) 
{ 
  ?> 
  <script type="text/javascript"> 
  $(document).ready(function() {
  swal({ 
    title: "Success",
    text: "Bid Updated Successfully.",
    type: "success" 
  },
   function(){
    window.location.href='viewbids.php';
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
   text: "Bid Not Updated. Try again.",
    type: "error" 
  },
    function(){
   window.location.href='bids.php';
  });
  });
  </script>
  <?php 
}
?>