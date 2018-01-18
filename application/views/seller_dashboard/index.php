<style>
	.image-upload > input
{
    display: none;
}
</style>
<div class="container-fluid" style="margin-top: 10px;">
		
<div class="col-md-9">
	<ul class="nav nav-pills nav-justified">
		<li class="active"><a data-toggle="pill" href="#profile"><h4>Profile</h4></a></li>
		<li><a data-toggle="pill" href="#Products"><h4>Products</h4></a></li>
		<li><a data-toggle="pill" href="#itemsold"><h4>item sold</h4></a></li>
		<li><a data-toggle="pill" href="#review"><h4>Reviews</h4></a></li>

	</ul>
</div>
<div class="col-md-12"><hr style="height: 2px; background: #dec18c;"></div>
<div class="container-fluid">
	<div class="col-md-12">
		<div class="tab-content">
			<div id="profile" class="tab-pane fade in active" >
				<div class="container-fluid" style="margin-top: 30px;">

					<?php $user = $this->ion_auth->user()->row();?>

					<div class="col-md-11">

					<form role="form" action="<?php bs() ?>Seller_dasboard/upload" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="upload">
		                <div class="image-upload">
		                <?php if (empty($users[0]->user_img)) 
		                    {
		                ?>        
		                    <label for="files" class="">
		                        <img src="<?php bs() ?>assets/images/Profile_picture.png" class="img-circle" alt="" width="150">
		                    </label>
		                    <input id="files" name="file" type="file" class="upload_pic visible">
		                    
		                <?php 
		                    } 

		                else {
		                ?>
		                    <label for="files" class="">
		                        <img src="<?php bs() ?>upload/profile_images/<?php echo $users[0]->user_img ?>" width="150" height="150" class="img-circle" alt="" style="border: 0px">
		                    </label>
		                    <input id="files" name="file" style="" type="file" class="upload_pic visible">

		                <?php    
		                    }

		                 ?>
		                </div>
		            </form>
						
						<img src="" class="img-circle" width="15%">
						<h4 style="margin: 20px; font-weight: 600;"><?php echo $user->username ?></h4>

					</div>
					<div class="col-md-1">
						<a href="" data-toggle="modal" data-target="#myModal" title="">
							<font size="5" color="#dec18c"><u>Edit </u></font>
						</a>	
					</div>
					<div class="col-md-11 icon-color" style="margin: 20px;">
						<p><span class="glyphicon glyphicon-phone">&nbsp;
						</span><?php echo $user->phone ?></p>
					</div>
					<div class="col-md-4" style="margin: 20px; text-align: justify;">
						<p><span class="glyphicon glyphicon-map-marker"></span>
						&nbsp;&nbsp;&nbsp;
						<?php if (!empty($users[0]->address)): ?>
							
							<?php echo $users[0]->address ?>

						<?php else: ?>
							
							<?php echo '' ?>

						<?php endif ?>

					</p>
					</div>
					<div class="col-md-11" style="margin: 20px; color: ">
						<p>
							<span class="glyphicon glyphicon-envelope">&nbsp;</span>
							<?php echo $user->email ?>
						</p>
					</div>
					<div class="col-md-11" style="margin: 20px; 
					">
						<u>
							<a href="<?php bs() ?>change-password" style="color: #dec18c; font-size: 18px;">Change password?</a>
						</u>
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-user"></i> Update</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php bs() ?>save">
		  <div class="form-group">
		    <label for="">Email address</label>
		    <input type="email" class="form-control" name="email" value="<?php echo $user->email ?>" placeholder="Email">
		  </div>
		  <div class="form-group">
		    <label for="">Phone</label>
		    <input type="number" class="form-control" name="phone" value="<?php echo $user->phone ?>" placeholder="Phone">
		  </div>
		  <div class="form-group">
		    <label for="">City</label>

		    <?php if (!empty($users[0]->city)): ?>

		    <input type="text" class="form-control" name="city" value="<?php echo $users[0]->city ?>">
		    
		    <?php else: ?>

		    <input type="text" class="form-control" name="city" placeholder="City">

		    <?php endif ?>

		  </div>
		  <div class="form-group">
		    <label for="">State</label>

		    <?php if (!empty($users[0]->state)): ?>

		    <input type="text" class="form-control" name="state" value="<?php echo $users[0]->state ?>" >

			<?php else: ?>

			<input type="text" class="form-control" name="state" placeholder="State">	
		    	
		    <?php endif ?>

		  </div>
		  <div class="form-group">
		    <label for="">Country</label>

		    <?php if (!empty($users[0]->country)): ?>

		    <input type="text" class="form-control" name="contry" value="<?php echo $users[0]->country ?>" placeholder="">

			<?php else: ?>
		    	
		    <input type="text" class="form-control" name="contry" value="" placeholder="Country">


		    <?php endif ?>

		  </div>
		  <div class="form-group">
		    <label for="">Postal code</label>
		    <?php if (!empty($users[0]->postal_code)): ?>
		    	
		    <input type="text" class="form-control" name="postal_code" value="<?php echo $users[0]->postal_code ?>" placeholder="Postal code">

			<?php else: ?>

			<input type="text" class="form-control" name="postal_code" placeholder="Postal code">
		    
		    <?php endif ?>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Address</label>
		    <?php if (!empty($users[0]->address)): ?>
		     <textarea name="addr" rows="4" class="form-control"><?php echo $users[0]->address ?></textarea>	
		    
		    <?php else: ?>
		     <textarea name="addr" rows="4" class="form-control"></textarea>	

		    <?php endif ?>
		    </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm" style="background-color: #2e6da4;color: white">Save changes</button>
      </div>
	</form>
    </div>
  </div>
</div>
  
<script>
  	window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);  	


$(".upload_pic").on("change", function() 
{
  $("#upload").submit();
});

</script>