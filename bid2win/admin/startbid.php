<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" /> 
<?php include('../config.php'); 
$id=$_GET['id'];
$sql=mysql_query("update tblbids set bstatus='AA' where bid=".$id); 
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
    window.location.href='bid-management.php';
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
   text: "Bbid Not Updated. Try again.",
    type: "error" 
  },
    function(){
   window.location.href='bid-management.php';
  });
  });
  </script>
  <?php 
}
?>