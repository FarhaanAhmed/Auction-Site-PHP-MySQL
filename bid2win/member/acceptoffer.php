<?php include('logincheck.php'); ?>
<?php include('../config.php'); 
$uid=$_SESSION['uid'];
?>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" /> 
<?php 
$bid=$_GET['id'];
$adid=$_GET['adid'];
$sql=mysql_query("update tbluserbid set uaward='Y' where ubid=".$bid); 
$sql=mysql_query("update tblad set astatus='F' where adid=".$adid); 
if($sql) 
{ 
  ?> 
  <script type="text/javascript"> 
  $(document).ready(function() {
  swal({ 
    title: "Success",
    text: "Offer Accepted Successfully !!",
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
   text: "Record Not Saved. Try again ...",
    type: "error" 
  },
    function(){
   window.location.href='viewbids.php';
  });
  });
  </script>
  <?php 
}
?>
