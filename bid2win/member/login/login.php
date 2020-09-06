<?php session_start(); ?>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" /> 
<?php 
include('../../config.php'); 
$uuname=$_POST['uuname'];
$upass=$_POST['upass'];
$sql=mysql_query("select * from tblusers where uuname='$uuname' and upass='$upass' and ustatus='Y' and utype='member'"); 
if(mysql_num_rows($sql)>0)
{
    while($row=mysql_fetch_array($sql))
   {
      $_SESSION['uid']=$row['uid'];
	  $_SESSION['uemail']=$row['uemail'];
	  $_SESSION['uuname']=$row['uuname'];
   }
?> 
  <script type="text/javascript"> 
  $(document).ready(function() {
  swal({ 
    title: "Success",
    text: "Login Successfull",
    type: "success" 
  },
   function(){
    window.location.href='../index.php';
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
   text: "Invalid . Please check details and try again.",
    type: "error" 
  },
    function(){
   window.location.href='login-signup.html';
  });
  });
  </script>
  <?php 
}
?>