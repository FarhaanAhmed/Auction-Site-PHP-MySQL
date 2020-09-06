<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" /> 
<?php include('../config.php'); 
$cid=0;
$cparent=$_POST['cparent'];
$cname=$_POST['cname'];
$cpic=$_POST['cpic'];
$cstatus=$_POST['cstatus'];
if(empty($_FILES['cpic']['name']))
{
	$cpic="noimg.png";
}
else
{
	$cpic=rand().$_FILES['cpic']['name'];
	move_uploaded_file($_FILES['cpic']['tmp_name'],"../pcats/".$cpic);
}

$sql=mysql_query("insert into tblcats values ($cid,'$cparent','$cname','$cpic','$cstatus')"); 
if($sql) 
{ 
  ?> 
  <script type="text/javascript"> 
  $(document).ready(function() {
  swal({ 
    title: "Success",
    text: "Ccategory Saved Successfully.",
    type: "success" 
  },
   function(){
    window.location.href='category.php';
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
   text: "Category Not Saved. Try again.",
    type: "error" 
  },
    function(){
   window.location.href='category.php';
  });
  });
  </script>
  <?php 
}
?>