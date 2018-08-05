<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  	<link rel="stylesheet" type="text/css" href="<?php bs() ?>assets/css/custom.css">

  	<link rel="stylesheet" type="text/css" href="<?php bs() ?>assets/css/build.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<link rel='stylesheet' id='redux-google-fonts-g5plus_handmade_options-css' property='stylesheet' href='http://fonts.googleapis.com/css?family=Varela+Round%3A400%7CPlayfair+Display%3A400%2C700%2C900%2C400italic%2C700italic%2C900italic&amp;ver=1494995790' type='text/css' media='all' />


  	<style type="text/css">
  		ul li
  		{
   		 color: black;
		}
		.error
		{
		   color: red;
		}
		.msg
		{
			background-color:#ee4032;
			color :white;
			border:0px;
		}
		.success-msg
		{
			background-color:#049208;
			color :white;
			border:0px;
		}
		.product-validation
		{
			margin:0px 0px 0px 40em;
		}
		ul.dropdown-cart{
		    min-width:300px;
		}
		ul.dropdown-cart li .item{
		    display:block;
		    padding:3px 10px;
		    margin: 3px 0;
		}
		ul.dropdown-cart li .item:hover{
		    background-color:#f3f3f3;
		}
		ul.dropdown-cart li .item:after{
		    visibility: hidden;
		    display: block;
		    font-size: 0;
		    content: " ";
		    clear: both;
		    height: 0;
		}

		ul.dropdown-cart li .item-left{
		    float:left;
		}
		ul.dropdown-cart li .item-left img,
		ul.dropdown-cart li .item-left span.item-info{
		    float:left;
		}
		ul.dropdown-cart li .item-left span.item-info{
		    margin-left:10px;   
		}
		ul.dropdown-cart li .item-left span.item-info span{
		    display:block;
		}
		ul.dropdown-cart li .item-right{
		    float:right;
		}
		.alert-msg {
		    padding: 20px;
		    background-color: #f44336;
		    color: white;
		}

		.closebtn {
		    margin-left: 15px;
		    color: white;
		    font-weight: bold;
		    float: right;
		    font-size: 22px;
		    line-height: 20px;
		    cursor: pointer;
		    transition: 0.3s;
		}

		.closebtn:hover {
		    color: black;
		}
		/* Extra Small Devices, Phones */ 
		@media only screen and (max-width : 480px) 
		{
		   .menu-hide
		   {
		   	  display: none;
		   }
		}
  	</style>
</head>
<body>
<nav class="navbar navbar-custom">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed click-hide" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="background-color:  black;">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar glyphicon glyphicon-align-justify text-info"></span>
		        <span class="icon-bar text-info"></span>
		        <span class="icon-bar text-info"></span>
	        </button>
			<a href="<?php bs() ?>" title="">
				<img src="<?php bs() ?>assets/images/kenswag.png" width='100' alt="" style="margin-left: 1em">
			</a>	
		</div>

		<?php if (!empty($this->session->flashdata('success'))): ?>
			
			<div class="alert alert-danger col-sm-4 col-sm-offset-3 success-msg">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="fa fa-bell"></i> <?php echo $this->session->flashdata('success'); ?>
			</div>

		<?php endif ?>

		<?php if (!empty($this->session->flashdata('error'))): ?>
			
			<div class="alert alert-danger col-sm-4 col-sm-offset-3 msg">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="fa fa-bell"></i> <?php echo $this->session->flashdata('error'); ?>
				
			</div>

		<?php endif ?>
		
		<?php echo validation_errors('<div class="alert alert-danger col-sm-4 col-sm-offset-3 msg">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-bell"></i> ','</div>'); 
		?>

			<?php if (!empty($all_coupons)): ?>


				<?php foreach ($all_coupons as $all_coupon): ?>

							<?php 
								
								$current_date = date('Y-m-d');

								$date1 = new DateTime($current_date);
								$date2 = new DateTime($all_coupon->expire_date);

								$diff = $date2->diff($date1)->format("%a");
							 ?>
							 <?php if ($diff == 3): ?>

								<div class="alert-msg col-sm-5 col-sm-offset-3">
								  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
								  <strong>Notification!</strong> Your Coupons are Near to Expiry. <a href="<?php bs() ?>seller-dashboard?expir_coupon=1" title="">View Details</a>
								</div>

							<?php elseif($diff == 2): ?>

								<div class="alert-msg col-sm-5 col-sm-offset-3">
								  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
								  <strong>Notification!</strong> Your Coupons are Near to Expiry. <a href="<?php bs() ?>seller-dashboard?expir_coupon=1" title="">View Details</a>
								</div>

							<?php elseif($diff == 1): ?>

								<div class="alert-msg col-sm-5 col-sm-offset-3">
								  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
								  <strong>Notification!</strong> Your Coupons are Near to Expiry. <a href="<?php bs() ?>seller-dashboard?expir_coupon=1" title="">View Details</a>
								</div>

							<?php else: ?>

						
							 <?php endif ?>

				<?php endforeach ?>

			<?php endif; ?>	

		    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      
	      <ul class="nav text-center navbar-nav navbar-right">
	        <li>
	          	<a href="<?php bs() ?>"><font color="#54ccd6">Home</font></a>
	        </li>
			<!-- <li>
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	          		<img src="<?php bs() ?>assets/images/messages.png" alt="" width='20'>
	          </a>
	          		<span class="badge">42</span>
	        </li> -->
			<li>
				<a href="<?php bs() ?>Auth/logout">
					<i class="glyphicon glyphicon-log-out"></i>
				</a>
			</li>
	      </ul>
	    </div><!-- /.navbar-collapse -->	
	</div>
</nav>