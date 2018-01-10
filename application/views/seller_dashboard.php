<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="<?php bs() ?>assets/css/custom.css">
  	<style type="text/css">
  		ul li{
   		 color: black;
		}
  	</style>
</head>
<body>
	<nav class="navbar navbar-custom">
		<div class="container-fluid">
			<div class="navbar-header">
				
				<a class="navbar-brand" href="#"><h3>KENSWAG</h3></a>
			</div>
			
			<ul class="nav navbar-nav navbar-right">

				<li><a href="#"><span class="glyphicon glyphicon-user"></span> </a></li>
				<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> </a></li>
			</ul>
		</div>
	</nav>



	<div class="container-fluid" style="margin-top: 10px;">
		
		<div class="col-md-9">
			<ul class="nav nav-pills nav-justified">
				<li class="active"><a data-toggle="pill" href="#profile"><h4>Profile</h4></a></li>
				<li><a data-toggle="pill" href="#Products"><h4>Products</h4></a></li>
				<li><a data-toggle="pill" href="#itemsold"><h4>item sold</h4></a></li>
				<li><a data-toggle="pill" href="#review"><h4>Reviews</h4></a></li>

			</ul>
		</div>
		<div class="col-md-3"></div>	
		<div class="col-md-12"><hr style="height: 2px; background: #dec18c;"></div>
		<div class="container-fluid">
			<div class="col-md-11">
				<div class="tab-content">
					<div id="profile" class="tab-pane fade in active" >
						<div class="container-fluid" style="margin-top: 30px;">
							<div class="col-md-11">
								<img src="Capture.JPG" class="img-circle" width="15%">
								<h4 style="margin: 20px; font-weight: 600;">USER NAME</h4>

							</div>
							<div class="col-md-11 icon-color" style="margin: 20px;">
								<p><span class="glyphicon glyphicon-phone">&nbsp;
								</span>+333333 </p>
							</div>
							<div class="col-md-4" style="margin: 20px; text-align: justify;">
								<p><span class="glyphicon glyphicon-map-marker">
									
								</span>&nbsp;&nbsp;&nbsp;Great Store LondonOxford Street,<br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; United Kingdom.</p>
							</div>
							<div class="col-md-11" style="margin: 20px; color: ">
								<p><span class="glyphicon glyphicon-envelope">&nbsp;</span>abc@gmail.com</p>
							</div>
							<div class="col-md-11" style="margin: 20px; 
							">
								<u ><a href="" style="color: #dec18c; font-size: 18px;">Change password?</a></u>
							</div>

						</div>
						<div class="col-md-12">
							<hr style="height: 2px; background: #dec18c;">
						</div>
						</div>
						<div id="Products" class="tab-pane fade">
							<div class="col-md-10" style="margin-top: 30px;">
								<a href="#" class="pull-right"><u><h4>Edit</h4></u></a>
								<div class="col-md-3 " style="height: 200px; background-color: gray;">
									
								</div>
								<div class="col-md-7 col-md-offset-1">
									<h3>Birthday Gift Grouped</h3>
									<h4>$35.00</h4>
									<p>Qty:10</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris.</p>
										
									
								</div>
							</div>
								<div class="col-md-12"><hr style="height: 2px; background: #dec18c;">
								</div>
								<div class="col-md-10" style="margin-top: 30px;">
									<div class="col-md-3 " style="height: 200px; background-color: gray;">
										
									</div>
									<div class="col-md-7 col-md-offset-1 col-sm-offset-1">
										<h3>Birthday Gift Grouped</h3>
										<h4>$35.00</h4>
										<p>Qty:10</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris.</p>
										
										
									</div>
								</div>
								<div class="col-md-12"> <hr style="height: 2px; background: #dec18c;">
								</div>
								<div class="col-md-10" style="margin-top: 30px;">
									<div class="col-md-3 " style="height: 200px; background-color: gray;">
										
									</div>
									<div class="col-md-7 col-md-offset-1">
										<h3>Birthday Gift Grouped</h3>
										<h4>$35.00</h4>
										<p>Qty:10</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris.</p>
										
									</div>
								</div>
								<div class="col-md-12"><hr style="height: 2px; background: #dec18c;">
								</div>
						</div>
						<div id="itemsold" class="tab-pane fade">
							<div class="col-md-2 " style="margin-top: 2px;">
								<div class="panel1" style="background-color: #5e5e5e;">
									<div class="panel-body" >
										<p style="color: white;"> item sold</p>
									</div>
									<div class="panel-body text-center">
										<h3 style="color: white;">23</h3>	
									</div>
								</div>
							</div>
							<div class="col-md-2 " style="margin-top: 2px;">
								<div class="panel1" style="background-color: #d2b889;">
									<div class="panel-body" >
										<p> Total Earning</p>
									</div>
									<div class="panel-body text-center">
										<h3>$1023</h3>	
									</div>
								</div>
							</div>
							<div class="col-md-6 col-md-offset-2">
								<form class="" role="search">
									<div class="input-group input-group-design">
										<div class="input-group-btn">
											<button type="button" class="btn btn-search btn-default dropdown-toggle" data-toggle="dropdown">
												<span class="glyphicon glyphicon-list"></span>
											</button>
										</div>
										<input type="text" class="form-control">
										<div class="input-group-btn">
											<button type="button" class="btn btn-search btn-default" style="border-left: none;">
												<span class="caret"></span>
											</button>
										</div>
									</div>  
	            				</form>   
							</div>
							<div class="col-md-10" style="margin-top: 50px;">
								<div class="col-md-2 " style="height: 150px; background-color: #bbbaba;">
								</div>
								<div class="col-md-7 col-md-offset-1">
									<h3>Birthday Gift Grouped</h3>
									<h4>$35.00</h4>
									<p>Qty:10</p>
									
								</div>
							</div>
							<div class="col-md-12"><hr style="height: 2px; background: #dec18c;"></div>
							<div class="col-md-10" style="margin-top: 30px;">
								<div class="col-md-2 " style="height: 150px; background-color: #bbbaba;">
								</div>
								<div class="col-md-7 col-md-offset-1 col-sm-offset-1">
									<h3>Birthday Gift Grouped</h3>
									<h4>$35.00</h4>
									<p>Qty:10</p>
								</div>
							</div>
							<div class="col-md-12"> <hr></div>
						</div>
						<div id="review" class="tab-pane fade">
							<h3>Review</h3>
							<p>Some content in menu 2.</p>
						</div>
					</div>
				</div>
			</div>
			<section class="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="footer-logo">
								<a href=""><h3>KENSWAG</h3></a>
							</div>
						</div>
						<div class="col-md-4 footer-item">
							<h3>Information</h3>
							<div class="footer-list">
								<ul>
									<li><a href="">About Us</a></li>
									<li><a href="">Delivery information</a></li>
									<li><a href="">Privacy Policy</a></li>
									<li><a href="">Term & Condtions</a></li>
									<li><a href="">Contact Us</a></li>
								</ul>
							</div>
							
						</div>
						<div class="col-md-4 footer-item">
							<h3>Contact Us</h3>
							<div>
								<p>Great Store London Oxford Street,<br>
									012 United Kingdom. <br>
									emailgreatstore$gmail.com <br>
								(+92)34567890</p>
							</div>
							
						</div>
						

					</div>
				</div>
				
			</section>

			

</body>
</html>