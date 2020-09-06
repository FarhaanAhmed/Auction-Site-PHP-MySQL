<?php
	include("includes/db.php");
	include("includes/functions.php");
	include("config.php");
?>	
<center style="margin:50px auto">
<img src="processing.gif" style="width:500px" />
</center>
<div style="display:none">
	<form id="myForm" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" class="buy-now home-buy">
	<!--Transaction method used Sandbox PayPal-->
		<input type="hidden" name="business" value="<?php echo MERCHANT_EMAIL; ?>">
		<input type="hidden" name="cmd" value="_cart">
		 <input type="hidden" name="upload" value="1">
		<?php if(is_array($_SESSION['cart'])){
			$max=count($_SESSION['cart']);
			$j=0;
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					$q=$_SESSION['cart'][$i]['qty'];
					$pname=get_product_name($pid);
					if($q==0) continue;	
					$j++;
				
		?>
			<input type="hidden" name="item_name_<?php echo $j;?>" value="<?php echo $pname?>">
			<input type="hidden" name="amount_<?php echo $j;?>" value="<?php echo get_price($pid)?>.00">
			<input type="hidden" name="quantity_<?php echo $j;?>" value="1">
		<?php
				}
		}
		?>
		<input type="hidden" name="cancel_return" value="<?php echo SITE_URL; ?>/cancelled.php">
		<input type="hidden" name="return" value="<?php echo SITE_URL; ?>/thankyou.php">
		<input type="hidden" name="currency_code" value="<?php echo CURRENCY_CODE; ?>">
		<button type="submit" name="btnsubmit" class="buy">Buy Now</button>

		</form>
		</div>
		<script>
		document.getElementById("myForm").submit();
		</script>