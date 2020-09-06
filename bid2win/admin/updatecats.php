<?php include('logincheck.php'); ?>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" /> 
<?php 
include('../config.php'); 
$cid=$_GET['id'];
$cname=$_POST['cname'];
$cparent=$_POST['cparent'];
if(empty($_FILES['cpic']['name']))
{
	$cpic=$_POST['hidepic'];
}
else
{
	$cpic=rand().$_FILES['cpic']['name'];
	move_uploaded_file($_FILES['cpic']['tmp_name'],"../pcats/".$cpic);
}
if($_POST['cstatus'])
{
$cstatus="Y";
}
else
{
$cstatus="N";
}

$sql=mysql_query("update tblcats set cparent='$cparent',cname='$cname',cpic='$cpic',cstatus='$cstatus' where cid=".$cid); 
if($sql) 
{ 

  ?> 
  <script type="text/javascript"> 
  $(document).ready(function() {
  swal({ 
    title: "Success",
    text: "Category Updated Successfully,",
    type: "success" 
  },
   function(){
    window.location.href='view-category.php';
  });
  });
  </script>
  <?php 
}
else 
{ 
mysql_error();
echo "update tblcats set cparent='$cparent',cname='$cname',cpic='$cpic',cstatus='$cstatus' where cid=".$cid;
?>
  <script type="text/javascript">
  $(document).ready(function() {
  swal({ 
    title: "Error",
   text: "Category Not Updated. Try again.",
    type: "error" 
  },
    function(){
   window.location.href='view-category.php';
  });
  });
  </script>
  <?php 
}
?>