<!DOCTYPE html>
<html>
<head>
	<title>Seller Dashboard</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="<?php bs() ?>assets/css/custom.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


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
			background-color:#ab2e2b;
			color :white;
			border:0px;
		}
		.success-msg
		{
			background-color:#049208;
			color :white;
			border:0px;
		}
  	</style>
</head>
<body>
<nav class="navbar navbar-custom">
	<div class="container-fluid">
		<div class="navbar-header">
			
			<img src="<?php bs() ?>assets/images/kenswag.png" width='100' alt="" style="margin-left: 1em">
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
		
		<ul class="nav navbar-nav navbar-right">

			<li><a href="#"><span class="glyphicon glyphicon-user"></span> </a></li>
			<li><a href="<?php bs() ?>Auth/logout"><span class="glyphicon glyphicon-log-in"></span> </a></li>
		</ul>
	</div>
</nav>