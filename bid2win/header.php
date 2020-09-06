<?php session_start() ; ?>
<!--- header ---->
 <div class="top-header">
  <div class="container">
  <div class="row">
  <div class="col-lg-3 col-md-4 col-xs-12 login-side">
  <?php if(isset($_SESSION['uid']))
  {
  ?>
   <a href="member/index.php" class="login"> Hi <?php echo $_SESSION['ufname']; ?></a>
   <br/><br/><i>Click above to enter Member Panel</i>
  <?php  
  }
  else
  {
  ?>
	  <a href="login-signup.php" class="login">Login/Register</a>
  <?php
  }
  ?>
  </div>
  <div class="col-lg-3 col-md-4 col-xs-12">
  <div class="logo"><a href="index.php"><img src="images/logo.png"></a></div>
  </div>
  
  <div class="col-lg-4 col-md-3 col-xs-6 cart-part">
  <a href="mailto:support@website.com" class="cart"><i class="fa fa-envelope-open-o"></i> Contact Via Email</a> 
  </div>
   
   <div class="col-lg-2 col-md-1col-xs-6 cart-part">
  <a href="shoppingcart.php" class="cart"><i class="fa fa-shopping-basket"></i></a> 
  </div>
  
  </div>
  
  </div>
  
  <section class="b-subscribe">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12 col-lg-12">
              <div class="b-subscribe_input-group input-group">
				<form method="get" action="searchresults.php" style="width:100%">
					<input class="form-control" name="q" type="text" placeholder="Search For Product Here."  style="width:98%"><span class="input-group-btn">
					<button class="btn btn-primary btn-search" type="submit" style="height:34px">Search</button></span>
				</form>
              </div>
            </div>
          </div>
        </div>
    </section>
    <div class="banner">
		<div class="header-nav">
			<!-- navigation -->
			<nav class="navbar navbar-default">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						Menu
					</button>
				</div>
				<!-- top-nav -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="index.php" class="active"><i class="fa fa-home"></i></a>
						</li>
						<?php
			include('config.php');
			$sql=mysql_query("select * from tblcats where cparent='root' and cstatus='Y' "); 
			// Selects all categories from tblcats if the two conditions are met
			$c=0;
			if(mysql_num_rows($sql)>0)
			{
				while($row=mysql_fetch_array($sql))
				{
					$c++;				  
			?>
						<li class="dropdown">
							<a href="#" data-toggle="dropdown" aria-expanded="true">  <?php echo $row['cname']; ?></a>
							<ul class="dropdown-menu">
							<li><a href="category.php?cat=<?php echo $row['cid']; ?>">Show All</a></li>
							 <?php
					 	$sqlchild=mysql_query("select * from tblcats where cparent='".$row['cid']."' and cstatus='Y' order by cname ASC"); 
						// Selects all categories from tblcats, if condition is met, where parent categories are organised by cid and rest oragnised by name ascending order.  
						$i=0;
						if(mysql_num_rows($sqlchild)>0)
								{
									
									while($rowchild=mysql_fetch_array($sqlchild))
									{
							 ?>
						
								<li>
									<a href="category.php?sub=<?php echo $rowchild['cid']; ?>"><?php echo $rowchild['cname']; ?></a>
								</li>
								<?php
									}
								?>
						
							<?php
								}
							?>
							</ul>
						</li>
						<?php
				}
			}
			?>
					</ul>
					<div class="clearfix"> </div>
				</div>
			</nav>
			<!-- // navigation -->
		</div>
		 <main>
		<!-- //header -->