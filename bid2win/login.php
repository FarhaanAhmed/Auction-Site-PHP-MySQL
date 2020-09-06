<?php session_start(); ?>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" /> 
<?php 
$redirect = '';
if($_POST['location'] != '') {
    $redirect = $_POST['location'];
}
include('config.php'); 
$uuname=$_POST['uuname'];
$upass=$_POST['upass'];
$sql=mysql_query("select * from tblusers where uuname='$uuname' and upass='$upass' and ustatus='Y'"); 
// Selects all the registered user to see if the username and password input in the login matches the database. Login in acceprted if condition met.
if(mysql_num_rows($sql)>0)
{
    while($row=mysql_fetch_array($sql))
   {
      $_SESSION['uid']=$row['uid'];
	  $_SESSION['uemail']=$row['uemail'];
	  $_SESSION['uuname']=$row['uuname'];
	   $_SESSION['ufname']=$row['ufname'];
   }
?> 
  <script type="text/javascript"> 
  $(document).ready(function() {
  swal({ 
    title: "Success",
    text: "Login Successful.",
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
 $url = 'login-signup.php?p=1';
 echo $redirect;
 if($redirect!='') {
	  
        $url .= '&location=' . urlencode($redirect);
 }
?>
  <script type="text/javascript">
  $(document).ready(function() {
  swal({ 
    title: "Error",
   text: "Invalid login details. Try again.",
    type: "error" 
  },
    function(){
   window.location.href='<?php echo $url; ?>';
  });
  });
  </script>
  <?php 
  
}
?>