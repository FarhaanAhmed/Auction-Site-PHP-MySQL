<?php 
session_start();
if(isset($_SESSION['uid']))
{
	$uid=$_SESSION['uid'];
	
}
else
{
   //echo "<script>alert('Unauthorized Access !!! Login to continue');window.location.href='../adminlogin/index.html';</script>";	
   echo "<script>window.location.href='login/index.html';</script>";	
}
$inactive = 900; // Set timeout period in seconds

if (isset($_SESSION['timeout'])) {
    $session_life = time() - $_SESSION['timeout'];
    if ($session_life > $inactive) {
        session_destroy();
        header("Location: logout.php");
    }
}
$_SESSION['timeout'] = time();

?>
