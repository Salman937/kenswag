<style>
.image-upload > input
{
    display: none;
}
</style>
<div class="container" style="margin-top: 10px;">
		
<div class="col-md-9">
	<ul class="nav nav-pills nav-justified">
		<li class="active"><a data-toggle="pill" href="#profile"><h4>Profile</h4></a></li>
		<li><a data-toggle="pill" href="#Products"><h4>Purchases</h4></a></li>
		<li><a data-toggle="pill" href="#fav"><h4>Favourites</h4></a></li>

	</ul>
</div>
<div class="col-md-12"><hr style="height: 2px; background: #dec18c;"></div>
<div class="container">
	<div class="col-md-12">
		<div class="tab-content">
			<div id="profile" class="tab-pane fade in active" >
				<div class="container-fluid" style="margin-top: 30px;">

					<?php 

						$user = $this->ion_auth->user()->row();

					?>

					<div class="col-md-11 col-sm-9 col-xs-9">

					<form role="form" action="<?php bs() ?>Buyer_dashboard/upload" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="upload">
		                <div class="image-upload">
		                <?php if (empty($user->user_img)) 
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
		                        <img src="<?php bs() ?>upload/profile_images/<?php echo $user->user_img ?>" width="150" height="150" class="img-circle" alt="" style="border: 0px">
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
					<div class="col-md-1 col-sm-3 col-xs-3">
						<a href="" data-toggle="modal" data-target="#myModal" title="">
							<font size="5" color="#dec18c"><u>Edit </u></font>
						</a>	
					</div>
					<div class="col-md-11 col-sm-9 col-xs-9 icon-color" style="margin: 20px;">
						<p><span class="glyphicon glyphicon-phone">&nbsp;
						</span><?php echo $user->phone ?></p>
					</div>
					<div class="col-md-4 col-sm-9 col-xs-9" style="margin: 20px; text-align: justify;">
						<p><span class="glyphicon glyphicon-map-marker"></span>
						&nbsp;&nbsp;&nbsp;
						<?php if (!empty($user->address)): ?>
							
							<?php echo $user->address ?>

						<?php else: ?>
							
							<?php echo '' ?>

						<?php endif ?>

					</p>
					</div>
					<div class="col-md-11 col-sm-9 col-xs-9" style="margin: 20px; color: ">
						<p>
							<span class="glyphicon glyphicon-envelope">&nbsp;</span>
							<?php echo $user->email ?>
						</p>
					</div>
					<div class="col-md-11 col-sm-9 col-xs-9" style="margin: 20px; 
					">
						<u>
							<a href="<?php bs() ?>change-password" style="color: #dec18c; font-size: 18px;">Change password?</a>
						</u>
					</div>

				</div>
				
				</div>
				<div id="Products" class="tab-pane fade">
				<?php  
					$user = $this->session->userdata('user_id');

					$select = 'orders.order_status,orders.order_date,orders.payment_date,orders.total_price,orders_items.products_id,orders.id as orderid,users.first_name,users.last_name,users.phone';

					$orders = $this->common_model->DJoin(
								$select,
								'orders',
								'orders_items',
								'orders.id = orders_items.orders_id',
								array(
								 		'users' => 'orders.seller_id = users.id ',
								 	   ),
								array('orders.users_id' => $user),
								'orders.id',
								'orders_items.orders_id'
							);
				?>
				<div class="col-md-12">
				<?php if (!empty($orders)): ?>
					<div class="table-responsive">
						
					<table class="table table-condensed table-hover table-striped">
						<tr>
							<th>#</th>
							<th>Seller Name</th>
							<th>Seller Phone</th>
							<th>Total Price</th>
							<th>Order Date</th>
							<th>Payment Date</th>
							<th>Order Status</th>
							<th>Action</th>
						</tr>
						<?php $i = 1; foreach ($orders as $orderss): ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $orderss->first_name.' '.$orderss->last_name;?></td>
							<td><?php echo $orderss->phone; ?></td>
							<td><?php echo '$'.$orderss->total_price ?></td>
							<td><?php echo $orderss->order_date; ?></td>
							<td><?php echo $orderss->payment_date; ?></td>
							
							<td id="ChangeStatus">
								<?php 
									switch ($orderss->order_status) {
							            case '0':
							                echo "Pending";
							                break;
							            
							            case '1':
							                echo "In Progress";
							                break;

							            case '2':
							                echo "Dispatched";
							                break;

							            case '3':
							                echo "Completed";
							                break;

							            default:
							                echo "Un-Known";
							                break;
							        }
							    ?>
							</td>
							<td>
								<a href="<?php echo bs();?>buyer_dashboard/viewOrderDetails/<?php echo $orderss->orderid; ?>" class="btn btn-xs">View Details / Review</a>
							</td>
						</tr>	
						<?php $i++; endforeach ?>
					</table>
					</div>

				<?php else: ?>
					<div class="col-md-10" style="margin-top: 30px;">
						<h2 class="text-center text-danger">
							You have no products.	
						</h2>
					</div>
				<?php endif ?>	
				</div>
			</div>
				<div id="fav" class="tab-pane fade">

					<?php if (!empty($favort_items)): ?>

						<?php foreach ($favort_items as $favourites): ?>
							
							<div class="col-md-10" style="margin-top: 30px;">
								
								<div class="col-md-3 ">
									<img src="<?php echo $favourites->url ?>" alt="" height="200">
								</div>
								<div class="col-md-7 col-md-offset-1">
									<h3><?php echo $favourites->title ?></h3>
									<h4>Price: $<?php echo $favourites->price ?></h4>
								</div>
							</div>
							<div class="col-md-12"><hr style="height: 2px; background: #dec18c;">
							</div>

						<?php endforeach ?>

					<?php else: ?>

						<div class="col-md-10" style="margin-top: 30px;">
							<h2 class="text-center text-danger">
								You have no Favourite Items.	
							</h2>
						</div>

					<?php endif ?>	
				</div>
				<div id="review" class="tab-pane fade">
					<h3>Review</h3>
					<p>Some content in menu 2.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
					<hr style="height: 2px; background: #dec18c;">
				</div>
	<section class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-4 text-center">
					<div class="footer-logo text-center footer-item">
						<a href=""><h3>KK & M merchants</h3></a>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center footer-item">
					<h3>Information</h3>
					<div class="footer-list">
						<ul>
							<li><a href="<?php bs() ?>AboutUs">About Us</a></li>
							<li><a href="">Delivery information</a></li>
							<li><a href="">Privacy Policy</a></li>
							<li><a href="">Term & Condtions</a></li>
							<li><a href="<?php bs() ?>contactus">Contact Us</a></li>
						</ul>
					</div>
					
				</div>
				<div class="col-md-4 col-sm-4 text-center footer-item">
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
        <form method="post" action="<?php bs() ?>Buyer_dashboard/edit_profile">
		  <div class="form-group">
		    <label for="">Email address</label>
		    <input type="email" class="form-control" name="email" value="<?php if(!empty($user)) { echo $user->email; } ?>" placeholder="Email">
		  </div>
		  <div class="form-group">
		    <label for="">Phone</label>
		    <input type="number" class="form-control" name="phone" value="<?php if(!empty($user)) { echo $user->phone; } ?>" placeholder="Phone">
		  </div>
		  <div class="form-group">
		    <label for="">City</label>

		    <?php if (!empty($user->city)): ?>

		    <input type="text" class="form-control" name="city" value="<?php echo $user->city ?>">
		    
		    <?php else: ?>

		    <input type="text" class="form-control" name="city" placeholder="City">

		    <?php endif ?>

		  </div>
		  <div class="form-group">
		    <label for="">State</label>

		    <?php if (!empty($user->state)): ?>

		    <input type="text" class="form-control" name="state" value="<?php echo $user->state ?>" >

			<?php else: ?>

			<input type="text" class="form-control" name="state" placeholder="State">	
		    	
		    <?php endif ?>

		  </div>
		  <div class="form-group">
		    <label for="">Country</label>

		    <?php if (!empty($user->country)): ?>

		    <input type="text" class="form-control" name="contry" value="<?php echo $user->country ?>" placeholder="">

			<?php else: ?>
		    	
		    <input type="text" class="form-control" name="contry" value="" placeholder="Country">


		    <?php endif ?>

		  </div>
		  <div class="form-group">
		    <label for="">Postal code</label>
		    <?php if (!empty($user->postal_code)): ?>
		    	
		    <input type="text" class="form-control" name="postal_code" value="<?php echo $user->postal_code ?>" placeholder="Postal code">

			<?php else: ?>

			<input type="text" class="form-control" name="postal_code" placeholder="Postal code">
		    
		    <?php endif ?>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Address</label>
		    <?php if (!empty($user->address)): ?>
		     <textarea name="addr" rows="4" class="form-control"><?php echo $user->address ?></textarea>	
		    
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