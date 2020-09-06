<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" /> 
<?php include('../config.php'); 
$id=$_GET['id'];
$sql=mysql_query("delete from tblusers where uid=".$id); 
if($sql) 
{ 
  ?> 
  <script type="text/javascript"> 
  $(document).ready(function() {
  swal({ 
    title: "Success",
    text: "User Deleted Successfully.",
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
?>   <script type="text/javascript">
  $(document).ready(function() {
  swal({ 
    title: "Error",
   text: "User Not Deleted. Try again.",
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