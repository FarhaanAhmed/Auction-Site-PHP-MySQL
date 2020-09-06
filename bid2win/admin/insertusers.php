<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" /> 
<?php include('../config.php'); 
$uid=0;
$ufname=$_POST['ufname'];
$ulname=$_POST['ulname'];
$uuname=$_POST['uuname'];
$uemail=$_POST['uemail'];
$upass=$_POST['upass'];
$uphone=$_POST['uphone'];
$uaddress=$_POST['uaddress'];
$ustatus='Y';
$udate=date('d-M-Y h:i:s');

$sql=mysql_query("insert into tblusers values ($uid,'$ufname','$ulname','$uuname','$uemail','$upass','$uphone','$uaddress','$ustatus','$udate','member')"); 
if($sql) 
{ 
  ?> 
  <script type="text/javascript"> 
  $(document).ready(function() {
  swal({ 
    title: "Success",
    text: "User Registered Successfully.",
    type: "success" 
  },
   function(){
    window.location.href='viewusers.php';
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
   text: "User Not Registered. Try again.",
    type: "error" 
  },
    function(){
   window.location.href='viewusers.php';
  });
  });
  </script>
  <?php 
}
?>