<?php include('logincheck.php'); ?>
<?php include('../config.php'); 
$uid=$_SESSION['uid'];
?>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" /> 
<?php
$ufname=$_POST['ufname'];
$ulname=$_POST['ulname'];
$uemail=$_POST['uemail'];
$uphone=$_POST['uphone'];
$uaddress=$_POST['uaddress'];
$sql=mysql_query("update tblusers set ufname='$ufname',ulname='$ulname',uemail='$uemail',uphone='$uphone',uaddress='$uaddress' where uid=".$uid); 
if($sql) 
{ 
  ?> 
  <script type="text/javascript"> 
  $(document).ready(function() {
  swal({ 
    title: "Success",
    text: "Profile Updated Successfully.",
    type: "success" 
  },
   function(){
    window.location.href='profile.php';
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
   text: "Profile Not Updated. Try again.",
    type: "error" 
  },
    function(){
   window.location.href='profile.php';
  });
  });
  </script>
  <?php 
}
?>