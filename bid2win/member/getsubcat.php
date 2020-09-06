<?php include('../config.php');
$aid=$_POST['pid'];
	$sql=mysql_query("select * from tblcats where cparent=".$aid); 
	if(mysql_num_rows($sql)>0)
	{
		while($row=mysql_fetch_array($sql))
	   {
		   $cid=$row['cid'];
		   echo "<option value='".$cid."'>".$row['cname']."</option>";
	   }
	}
	else
	{
		echo "<option value='0'>--Null--</option>";
	}

?>