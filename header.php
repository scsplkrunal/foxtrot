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

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php require_once("islogin.php"); ?>
<header>
<div class="sectionwrapper">
  <div class="container">
    <div class="headertop">
      <div class="sitelogo"><a href="home.php" title="Foxtrot"><img src="images/sitelogo.png" alt="Foxtrot" /></a></div>
      <div class="headertopright">
		<a href="#" class="userinfo"><i class="fa fa-info-circle"></i></a>
		<div class="userlogin">
			<div class="userimg"><img src="images/usericon.jpeg" alt="User Image" /></div>
			<ul class="nav navbar-nav">
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">User
                    <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="sign-out.php">Logout</a></li>
						<!--li><a href="#">Option 02</a></li-->
                    </ul>
                 </li>              
             </ul>
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
			  <li class="active menuhome"><a href="#"><i class="fa fa-home"></i></a></li>
			  <li>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Import <i class="fa fa-download"></i></a>
                
              </li>
			  <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Commissions <i class="fa fa-inr"></i></a>
                <ul class="dropdown-menu">
				  <li><a href="#">Enter Commissions</a></li>
				  <li><a href="#">Batches</a></li>
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
				  <li><a href="#">Mulit-Company Maintenance</a></li>
				  <li><a href="#">Branch Maintenance</a></li>
				  <li><a href="<?php echo SITE_URL; ?>manage_broker.php">Broker Maintenance</a></li>
                  <li><a href="product_cate.php">Product Maintenance</a></li>
                  <li><a href="client_maintenance.php">Client Maintenance</a></li>
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
				  <li><a href="user_profile.php">User Profile</a></li>
				  <li><a href="data_interface.php">Data Interface</a></li>
				  <li><a href="of_fi.php">OFAC/FINCH</a></li>
                  <li><a href="client_ress.php">client Reassignment</a></li>
				  <li><a href="account_type.php">Account Type Maintenance</a></li>
				  <li><a href="product_category_maintenance.php">Product category Maintenance</a></li>
                  <li><a href="system_config.php">System Configuration</a></li>
                  <li><a href="client_suitability.php">Client Suitability</a></li>
                  <li><a href="payroll_adjustment.php">Payroll Adjustment</a></li>
				</ul>
			  </li>
			</ul>
		  </div>
		  </div>
		</nav>
	</div>
  </div>
</div>
</header>
