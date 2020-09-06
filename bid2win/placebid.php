<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" /> 
<?php session_start();
if(isset($_SESSION['uid']))
{
	$uid=$_SESSION['uid'];
}
else
{
  echo "<script>window.location.href='login-signup.php?location=".urlencode($_SERVER['REQUEST_URI'])."'</script>";	
  die();
}
include('config.php');
$uid=$_SESSION['uid'];
$adid=$_POST['txtadid'];
$bidamount=$_POST['txtamount'];
$date=date('d-m-Y');
$status="Y";
$sqlbid=mysql_query("select * from tblbids where badid=".$adid);
if(mysql_num_rows($sqlbid)>0)
	{
		while($rowbid=mysql_fetch_array($sqlbid))
		{
		   $minamt=$rowbid['bminamt'];
		   if($bidamount<$minamt)
		   {
			   ?>
			   	<script type="text/javascript">
				  $(document).ready(function() {
				  swal({ 
					title: "Error",
				   text: "Bid Less than Minimum Amount. Please try again ...",
					type: "error" 
				  },
					function(){
				   window.location.href='showad.php?a=<?php echo $adid; ?>';
				  });
				  });
				  </script>
			   <?php
		   }
		   else
		   {
			  $sql=mysql_query("insert into tbluserbid values(0,'$adid','$uid','$bidamount','$date','$status','N','N')");
			  $sql=mysql_query("update tblbids set bminamt='$bidamount' where badid=".$adid);
if($sql)
{
	?>
	  <script type="text/javascript"> 
  $(document).ready(function() {
  swal({ 
    title: "Success",
    text: "Bid Placed Succesfully.",
    type: "success" 
  },
   function(){
    window.location.href='showad.php?a=<?php echo $adid; ?>';
  });
  });
  </script>
	<?php
}
else
{
	echo mysql_error();
	?>
	<script type="text/javascript">
  $(document).ready(function() {
  swal({ 
    title: "Error",
   text: "Bid Not Placed. Try again ...",
    type: "error" 
  },
    function(){
   window.location.href='showad.php?a=<?php echo $adid; ?>';
  });
  });
  </script>
	<?php
}
 
		   }
		}
	}
?>