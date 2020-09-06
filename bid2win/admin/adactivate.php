<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" /> 
<?php include('../config.php'); 
$id=$_GET['id'];
$sql=mysql_query("update tblad set astatus='Y' where adid=".$id); 
if($sql) 
{ 
  ?> 
  <script type="text/javascript"> 
  $(document).ready(function() {
  swal({ 
    title: "Success",
    text: "Ad Updated Successfully.",
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
?>   <script type="text/javascript">
  $(document).ready(function() {
  swal({ 
    title: "Error",
   text: "Ad Not Updated. Try again.",
    type: "error" 
  },
    function(){
   window.location.href='viewads.php';
  });
  });
  </script>
  <?php 
}
?>