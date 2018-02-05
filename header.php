<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Foxtrot</title>

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<!-- font-awesome -->
<link href="css/font-awesome.min.css" rel="stylesheet" />
<!-- font-awesome -->
<!--<link href="css/nifty.min.css" rel="stylesheet" />-->
<!-- common-styles -->
<link href="css/style.css" rel="stylesheet" />
<!-- Fevicon -->
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
<link href="<?php echo SITE_CSS; ?>bootstrap-datepicker.min.css" rel="stylesheet"/>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery.min.js"></script>
<script src="<?php echo SITE_JS; ?>bootstrap-datepicker.min.js"></script>

<script src="<?php echo SITE_JS; ?>validator.js"></script>
 <script src="<?php echo SITE_JS; ?>multipleselection.js"></script>
<script src="<?php echo SITE_JS; ?>custom.js"></script>
<script src="<?php echo SITE_PLUGINS; ?>bootbox/bootbox.min.js"></script>
<script src="<?php echo SITE_PLUGINS; ?>masked-input/jquery.maskedinput.min.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php 
require_once("include/config.php"); 
require_once("islogin.php"); 
$instance_header = new header_class();
?>
<header>
<div class="sectionwrapper">
  <div class="container">
    <div class="headertop">
      <div class="sitelogo"><a href="home.php" title="Foxtrot"><img src="images/sitelogo.png" alt="Foxtrot" /></a></div>
      <div class="headertopright">
		<a href="#" class="userinfo"><img src="images/Help-desk.png" alt="Chat/Help" title="Chat/Help" height="30" width="50" /></a>
                
		<div class="userlogin">
			<ul class="nav navbar-nav">
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user_name']." ";?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="sign-out.php">Logout</a></li>
						<!--li><a href="#">Option 02</a></li-->
                    </ul>
                 </li>              
             </ul>
             <a href="<?php echo SITE_URL; ?>user_profile.php?action=edit&id=<?php echo $_SESSION['user_id'];?>" class="dropdown-toggle" >User Profile
                    
             <?php $user_header_image = $instance_header->get_user_image($_SESSION['user_id']); ?>
             <div class="userimg"><img src="<?php echo SITE_URL."upload/".$user_header_image['image'];?>" height="30" width="50" /></div>
		</div>
	  </div>
    </div>
	<div class="headermenu">
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
			  <li class="active menuhome"><a href="home.php"><i class="fa fa-home"></i></a></li>
			  <?php  
					
					$menu = $instance_header->menu_select();
					//echo '<pre>';print_r($menu);exit;
			  ?>
			  <?php 
                        foreach($menu as $menukey=>$menudata)
                        { 
                    ?>   	<li class="dropdown"> 
								<a <?php if(!empty($menudata['submenu'])){  ?> class="dropdown-toggle"  data-toggle="dropdown"  <?php } ?>href="<?php echo $menudata['link_page']; ?>"><?php echo $menudata['link_text']; ?> <i class="<?php echo $menudata['class']; ?>"></i></a>
								<?php if(!empty($menudata['submenu'])){  ?>
									<ul class="dropdown-menu">
									<?php 
										foreach($menudata['submenu'] as $subkey=>$subdata)
										{ 
										  if($subdata['link_id'] == 11){?>
										    <li><a href="<?php echo $subdata['link_page'] ?>" target="_blank"><?php echo $subdata['link_text']; ?></a></li>
										<?php } else { ?>    
											<li><a href="<?php echo $subdata['link_page'] ?>"><?php echo $subdata['link_text']; ?></a></li>
										<?php }
                                        } 
										?>
									</ul>
								<?php } 
									?>
							</li>
                    <?php }?>
			  <!--li>
                <a class="dropdown-toggle" href="<?php echo SITE_URL; ?>import.php">Import <i class="fa fa-download"></i></a>
              </li>
			  <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Commissions <i class="fa fa-inr"></i></a>
                <ul class="dropdown-menu">
				  <li><a href="<?php echo SITE_URL; ?>transaction.php">Enter Commissions</a></li>
				  <li><a href="<?php echo SITE_URL; ?>batches.php">Batches</a></li>
				  <li><a href="#">Post Commission</a></li>
                  <li><a href="#">Report</a></li>
				</ul>
              </li>
			  <li>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Payroll <i class="fa fa-list-alt"></i></a>
                <ul class="dropdown-menu">
				  <li><a href="#">Upload</a></li>
				  <li><a href="#">Calculate</a></li>
				  <li><a href="#">Review</a></li>
                  <li><a href="#">Publish</a></li>
                  <li><a href="#">Closed Out</a></li>
				</ul>
              </li>
			  
			  <li>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reporting <i class="fa fa-comments-o"></i></a>
                <ul class="dropdown-menu">
				  <li><a href="#">Sales Reporting</a></li>
				  <li><a href="#">Transaction History</a></li>
				  <li><a href="#">Reporting Designer</a></li>
				</ul>
              </li>	
              <li>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Administration <i class="fa fa-user-plus"></i></a>
                <ul class="dropdown-menu">
				  <li><a href="<?php echo SITE_URL; ?>manage_multicompany.php">Mulit-Company Maintenance</a></li>
				  <li><a href="<?php echo SITE_URL; ?>branch_maintenance.php">Branch Maintenance</a></li>
				  <li><a href="<?php echo SITE_URL; ?>manage_broker.php">Broker Maintenance</a></li>
                  <li><a href="<?php echo SITE_URL; ?>manage_sponsor.php">Sponsor Maintenance</a></li>
                  <li><a href="<?php echo SITE_URL; ?>product_cate.php">Product Maintenance</a></li>
                  <li><a href="<?php echo SITE_URL; ?>client_maintenance.php">Client Maintenance</a></li>
				</ul>
              </li>		  
			  <li>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Compilance <i class="fa fa-file-code-o"></i></a>
                <ul class="dropdown-menu">
				  <li><a href="#">Rules Engine</a></li>
				  <li><a href="#">Licensing</a></li>
				  <li><a href="#">Report</a></li>
				</ul>
              </li>
			  <li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">Supervisor
				<i class="fa fa-angle-down"></i></a>
				<ul class="dropdown-menu">
				  <li><a href="<?php echo SITE_URL; ?>user_profile.php">User Profiles</a></li>
				  <li><a href="<?php echo SITE_URL; ?>data_interface.php">Data Interfaces</a></li>
				  <li><a href="<?php echo SITE_URL; ?>of_fi.php">OFAC / FINCEN</a></li>
                  <li><a href="<?php echo SITE_URL; ?>client_ress.php">Client Reassignment</a></li>
                  <li><a href="<?php echo SITE_URL; ?>client_suitability.php">Client Suitability</a></li>
				  <li><a href="<?php echo SITE_URL; ?>account_type.php">Account Type Maintenance</a></li>
				  <li><a href="<?php echo SITE_URL; ?>product_category_maintenance.php">Product Category Maintenance</a></li>
                  <li><a href="<?php echo SITE_URL; ?>payroll_adjustment.php">Payroll Adjustment Category Maintenance</a></li>
                  <li><a href="<?php echo SITE_URL; ?>system_config.php">System Configuration</a></li>
				</ul>
			  </li>-->
			</ul>
		  </div>
		  </div>
		</nav>
	</div>
  </div>
</div>
</header>
<script type="text/javascript">
$(document).ready(function() {
    $('input:text:visible:first', this).focus();
});
</script>
