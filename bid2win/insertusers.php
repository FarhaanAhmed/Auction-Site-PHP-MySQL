<?php session_start(); ?>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" /> 
<?php include('config.php'); 
$redirect = '';
if($_POST['location'] != '') {
    $redirect = $_POST['location'];
}
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
	  $_SESSION['uid']=mysql_insert_id();
	   $_SESSION['uid']=$row['uid'];
	  $_SESSION['uemail']=$row['uemail'];
	  $_SESSION['uuname']=$row['uuname'];
	   $_SESSION['ufname']=$row['ufname'];
  ?> 
  <script type="text/javascript"> 
  $(document).ready(function() {
  swal({ 
    title: "Success",
    text: "Registered Successfully. You may now Login.",
    type: "success" 
  },
   function(){
      <?php  if($redirect) 
	   {
	   ?>
		    window.location.href='<?php echo $redirect ;?>';
	   <?php
	   }
	   else
	   {
	   ?>
		    window.location.href='member/index.php';
	   <?php		
	   }
	   ?>
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
   text: "User not registered. Try again.",
    type: "error" 
  },
    function(){
   window.location.href='login-signup.php';
  });
  });
  </script>
  <?php 
}
?>