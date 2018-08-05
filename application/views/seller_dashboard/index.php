<style>
.image-upload > input
{
	display: none;
}
.visit-tile
{
   background-color: #55d9ea;
}
.past-visit
{
   background-color: #b14061;
}

</style>

<div class="container" style="margin-top: 10px;">
	
	<div class="col-md-12 col-sm-6 show-menu menu-hide">
		<ul class="nav nav-pills nav-justified">
			<li class="remove active">
				<a data-toggle="pill" class="hide-menu" href="#profile">
					<h4>Profile</h4>
				</a>
			</li>
			<li>
				<a data-toggle="pill" class="hide-menu" href="#Products">
					<h4>Products</h4>
				</a>
			</li>
			<li class="order">
				<a data-toggle="pill" class="hide-menu" href="#Orders">
					<h4>Orders</h4>
				</a>
			</li>
			<li class="activate">
				<a data-toggle="pill" class="hide-menu" href="#messages">
					<h4>Messages</h4>
				</a>
			</li>
			<li>
				<a data-toggle="pill" class="hide-menu" href="#itemsold">
					<h4>Sold Items</h4>
				</a>
			</li>
			<li>
				<a data-toggle="pill" class="hide-menu" href="#review">
				<h4>Reviews</h4></a></li>
			<li>
				<a data-toggle="pill" class="hide-menu" href="#contact">
					<h4>Contact Admin</h4>
				</a>
			</li>
			<li><a data-toggle="pill" class="hide-menu" href="#coupons"><h4>Coupons</h4></a></li>
			<li><a data-toggle="pill" class="hide-menu" href="#coupon_expiry"><h4>Expired Coupons</h4></a></li>
			<li><a data-toggle="pill" class="hide-menu" href="#product_visits"><h4>Product Views</h4></a></li>
		</ul>
	</div>
	<div class="col-md-12 col-sm-12"><hr style="height: 2px; background: #dec18c;"></div>
	<div class="container-fluid">
		<div class="col-md-12 col-sm-12">
			<div class="tab-content">
				<div id="profile" class="tab-pane fade remove in active" >
					<div class="container-fluid" style="margin-top: 30px;">

						<?php $user = $this->ion_auth->user()->row();?>

						<div class="col-md-11 col-sm-11 col-xs-9">

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
						<div class="col-md-1 col-sm-11 col-xs-3">
							<a href="" data-toggle="modal" data-target="#myModal" title="">
								<font size="5" color="#dec18c"><u>Edit </u></font>
							</a>	
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11 icon-color" style="margin: 20px;">
							<p><span class="glyphicon glyphicon-phone">&nbsp;
							</span><?php echo $user->phone ?></p>
						</div>
						<div class="col-md-4 col-sm-11 col-xs-11 " style="margin: 20px; text-align: justify;">
							<p><span class="glyphicon glyphicon-map-marker"></span>
								&nbsp;&nbsp;&nbsp;
								<?php if (!empty($users[0]->address)): ?>
									
									<?php echo $users[0]->address ?>

								<?php else: ?>
									
									<?php echo '' ?>

								<?php endif ?>

							</p>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11 " style="margin: 20px; color: ">
							<p>
								<span class="glyphicon glyphicon-envelope">&nbsp;</span>
								<?php echo $user->email ?>
							</p>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11 " style="margin: 20px; 
						">
						<u>
							<a href="<?php bs() ?>change-password" style="color: #dec18c; font-size: 18px;">Change password?</a>
						</u>
					</div>
				</div>
			</div>
			<div id="Products" class="tab-pane fade">

				<?php if (!empty($products)): ?>

					<?php foreach ($products as $seller_products): ?>
						
						<div class="col-md-10" style="margin-top: 30px;">
							<a href="<?php bs() ?>edit-product/<?php echo $seller_products->products_id ?> " class="pull-right">
								<u>
									<h4>Edit</h4>
								</u>
							</a>
							<div class="col-md-3 ">
								<img src="<?php echo $seller_products->url ?>" alt="" height="200">
							</div>
							<div class="col-md-7 col-md-offset-1">
								<h3><?php echo $seller_products->title ?></h3>
								<h4>Price: $<?php echo $seller_products->price ?></h4>
								<p>Qty:<?php echo $seller_products->quantity ?></p>
								<p><?php echo $seller_products->description ?>.</p>
							</div>
						</div>
						<div class="col-md-12"><hr style="height: 2px; background: #dec18c;">
						</div>

					<?php endforeach ?>

				<?php else: ?>

					<div class="col-md-10" style="margin-top: 30px;">
						<h2 class="text-center text-danger">
							You have no products.	
						</h2>
					</div>

				<?php endif ?>	
			</div>
			<div id="Orders" class="tab-pane fade in order">
				<?php  
					$user = $this->session->userdata('user_id');
					$select = 'orders.order_status,orders.order_date,orders.payment_date,orders.total_price,orders_items.products_id,orders.id as orderid,users.first_name,users.last_name,users.phone';
					$orders = $this->common_model->DJoin(
								$select,
								'orders',
								'orders_items',
								'orders.id = orders_items.orders_id',
								array(
								 		'users' => 'orders.users_id = users.id ',
								 	   ),
								array('orders.seller_id' => $user),
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
							<th>Buyer Name</th>
							<th>Buyer Phone</th>
							<th>Total Price</th>
							<th>Order Date</th>
							<th>Payment Date</th>
							<th>Order Status</th>
							<th>Change Status</th>
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
								<?php if($orderss->order_status == 3): ?>
									Order Completed
								<?php else: ?>
								<select name="status" id="status" class="form-control" onchange="ChangeStatus(<?php echo $orderss->orderid;?>,$(this).val())">
									<option> Change Status</option>
									<option value="0">Pending</option>
									<option value="1">In Progress</option>
									<option value="2">Dispatched</option>
									<option value="3">Completed</option>
								</select>
								<?php endif; ?>
							</td>
							<td><a href="<?php echo bs();?>Seller_dasboard/viewOrderDetails/<?php echo $orderss->orderid; ?>" class="btn btn-xs">View Details</a></td>
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
			<div id="messages" class="tab-pane fade in activate">
				<div class="row">
					<div class="col-sm-8">
						<div class="table-responsive">
							
						<table class="table table-striped">
							<tbody>
								<?php foreach ($messages as $key => $msg): ?>

								<tr>
									<td><span class="glyphicon glyphicon-comment"></span> <?php echo $msg->messages ?></td>
								</tr>

								<?php endforeach ?>

							</tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
			<div id="itemsold" class="tab-pane fade">
				<?php  
					$sold = $this->common_model->getAllData('orders','id,total_price',array('orders.seller_id' => $user,'orders.order_status' => 3));
					$totalprice = [];
					$count  = [];
					foreach ($sold as $total) {
						$get = $this->common_model->getAllData('orders_items','',array('orders_id' => $total->id));
						
						$count[] = count($get);
						$totalprice[] = $total->total_price;
					}
				?>
				<div class="col-sm-2 text-center" style="margin-top: 2px;">

					<button type="button" class="btn btn-lg" style="background-color: #5e5e5e;">
						<p style="color: white;"> Item Sold</p>
						<h3 class="" style="color: white;">
							<?php if (!empty($sold)): ?>
								<?php echo array_sum($count); ?>

							<?php else: ?>
							
									0	

							<?php endif ?>
						</h3>	
					</button>
					<!-- <div class="well well-lg text-center" >
						

						
					</div> -->
				</div>
				<div class="col-md-2 text-center" style="margin-top: 2px;">
					<button type="button" class="btn btn-lg" style="background-color: #d2b889;">
						<p> Total Earning</p>
						<h3>
							<?php if (!empty($sold)): ?>
								<?php echo '$'.array_sum($totalprice); ?>

							<?php else: ?>
							
									0	
							<?php endif ?>
						</h3>
					</button>
				</div>
				<!-- <div class="col-md-6 col-md-offset-2">
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
				</div> -->
				<?php  
					$user = $this->session->userdata('user_id');
					$select = 'orders.order_status,orders.order_date,orders.payment_date,orders.total_price,orders_items.products_id,orders.id as orderid,products.title,products.price,count(orders_items.products_id) as total';
					$soldItems = $this->common_model->DJoin(
								$select,
								'orders',
								'orders_items',
								'orders.id = orders_items.orders_id',
								array(
								 		'products' => 'orders_items.products_id = products.id',
								 	 ),
								array('products.users_id' => $user,'orders.order_status' => 3),
								'orders.id',
								'orders_items.products_id,orders_items.orders_id'
							);
				?>
				<?php if (!empty($soldItems)): ?>
					<?php foreach ($soldItems as $items): ?>
						<div class="col-md-12" style="margin-top: 50px;">
							<div class="col-md-3 ">
								<?php $image = $this->common_model->getAllData('products_resources','url',array('products_id' => $items->products_id),'',1); 
								?>
								<img src="<?php echo $image[0]->url; ?>" alt="" width="100%">
							</div>
							<div class="col-md-7 col-md-offset-1">
								<h3><?php echo $items->title; ?></h3>
								<h4>$<?php echo $items->price; ?></h4>
								<p>Qty:<?php echo $items->total; ?></p>
								
							</div>
						</div>
						<div class="col-md-12"><hr style="height: 2px; background: #dec18c;"></div>
					<?php endforeach ?>
				<?php endif ?>
				
			</div>
			<div id="review" class="tab-pane fade">
				
				<?php if (!empty($reviews)): ?>

					<?php foreach ($reviews as $review): ?>
						
						<div class="col-md-10" style="margin-top: 30px;">
						
							<div class="col-md-3 ">
								<img src="<?php echo $review->url ?>" alt="" height="200">
							</div>
							<div class="col-md-7 col-md-offset-1">
								<h3><?php echo $review->title ?></h3>
								<h4>Ratings:
										<?php if ($review->rating == 5 ) { ?>

										<img src="<?php bs() ?>assets/images/star.svg" width="20" alt="">
		                                <img src="<?php bs() ?>assets/images/star.svg" width="20" alt="">
		                                <img src="<?php bs() ?>assets/images/star.svg" width="20" alt="">
		                                <img src="<?php bs() ?>assets/images/star.svg" width="20" alt="">
		                                <img src="<?php bs() ?>assets/images/star.svg" width="20" alt="">

		                              <?php  } elseif ($review->rating == 4) { ?>

		                                <img src="<?php bs() ?>assets/images/star.svg" width="20" alt="">
		                                <img src="<?php bs() ?>assets/images/star.svg" width="20" alt="">
		                                <img src="<?php bs() ?>assets/images/star.svg" width="20" alt="">
		                                <img src="<?php bs() ?>assets/images/star.svg" width="20" alt="">
		                                <img src="<?php bs() ?>assets/images/empty_star.jpeg" width="20" alt="">

		                              <?php  } elseif ($review->rating == 3) { ?>

		                                <img src="<?php bs() ?>assets/images/star.svg" width="20" alt="">
		                                <img src="<?php bs() ?>assets/images/star.svg" width="20" alt="">
		                                <img src="<?php bs() ?>assets/images/star.svg" width="20" alt="">
		                                <img src="<?php bs() ?>assets/images/empty_star.jpeg" width="20" alt="">
		                                <img src="<?php bs() ?>assets/images/empty_star.jpeg" width="20" alt="">
		                                
		                              <?php  } elseif ($review->rating == 2) { ?>

		                                <img src="<?php bs() ?>assets/images/star.svg" width="20" alt="">
		                                <img src="<?php bs() ?>assets/images/star.svg" width="20" alt="">
		                                <img src="<?php bs() ?>assets/images/empty_star.jpeg" width="20" alt="">
		                                <img src="<?php bs() ?>assets/images/empty_star.jpeg" width="20" alt="">
		                                <img src="<?php bs() ?>assets/images/empty_star.jpeg" width="20" alt="">

		                              <?php  } else { ?>
		                                  <img src="<?php bs() ?>assets/images/star.svg" width="20" alt="">
		                                  <img src="<?php bs() ?>assets/images/empty_star.jpeg" width="20" alt="">
		                                  <img src="<?php bs() ?>assets/images/empty_star.jpeg" width="20" alt="">
		                                  <img src="<?php bs() ?>assets/images/empty_star.jpeg" width="20" alt="">
		                                  <img src="<?php bs() ?>assets/images/empty_star.jpeg" width="20" alt="">
		                              <?php  } ?>
										 
								</h4>
								<p>username: <?php echo $review->username ?></p>
							</div>
						</div>
						<div class="col-md-12"><hr style="height: 2px; background: #dec18c;">
						</div>

					<?php endforeach ?>

				<?php else: ?>

					<div class="col-md-10" style="margin-top: 30px;">
						<h2 class="text-center text-danger">
							Reviews Not Recived Yet.	
						</h2>
					</div>

				<?php endif ?>

			</div>
			<div id="contact" class="tab-pane fade">
				<div class="row">
					<div class="col-sm-6">
						<form action="<?php bs() ?>seller_dasboard/contact" method="post">
						  <div class="form-group">
						    <label for="exampleInputEmail1">Name</label>
						    <input type="text" class="form-control" name="name" placeholder="Email">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Email</label>
						    <input type="email" class="form-control" name="email" placeholder="Password">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Message</label>
						    <textarea name="message" rows="6" class="form-control"></textarea>
						  </div>
						  <button type="submit" class="btn btn-default">Submit</button>
						</form>	
					</div>
				</div>
			</div>

			<div id="coupons" class="tab-pane fade">

				<?php if (!empty($products)): ?>

					<form action="<?php bs() ?>seller_dasboard/apply_coupon" method="post" accept-charset="utf-8">

						<div class="text-center">
							
							<input type="checkbox" onClick="toggle(this)" "> Check All

							<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#coupon" style="padding: 4px 5px;color: rgb(84, 204, 214);" >Apply coupon</button>
						</div>

						

						<?php foreach ($products as $seller_products): ?>
							
							<div class="col-md-10" style="margin-top: 30px;">
								
								<span class="pull-right" style="padding-top: 2em">
									<input type="checkbox" name="product_id[]" value="<?php echo $seller_products->products_id ?>">
								</span>

								<div class="col-md-3 ">
									<img src="<?php echo $seller_products->url ?>" alt="" height="200">
								</div>
								<div class="col-md-7 col-md-offset-1">
									<h3><?php echo $seller_products->title ?></h3>
									<h4>Price: $<?php echo $seller_products->price ?></h4>
									<p>Qty:<?php echo $seller_products->quantity ?></p>
									<p><?php echo $seller_products->description ?>.</p>
								</div>
							</div>
							<div class="col-md-12"><hr style="height: 2px; background: #dec18c;">
							</div>

						<?php endforeach ?>

						<!-- Modal -->
						<div class="modal fade" id="coupon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Add Coupon Details</h4>
						      </div>
						      <div class="modal-body">
								  <div class="form-group">
								    <label for="exampleInputEmail1">Coupon Code</label>
								    <input type="text" class="form-control" name="coupon_code" placeholder="Enter Coupon Code">
								  </div>
								  <div class="form-group">
								    <label for="exampleInputPassword1">Quantity</label>
								    <input type="number" class="form-control" name="qty" placeholder="Enter Quantity">
								  </div>
								  <div class="form-group">
								    <label for="exampleInputPassword1">Expire Date</label>
								    <input type="date" class="form-control" name="date">
								  </div>
								  <div class="form-group">
								    <label for="exampleInputPassword1">Discount Value</label>
								    <input type="number" class="form-control" name="discount_val" placeholder="Enter Discount Value">
								  </div>
								  <div class="form-group">
								    <label for="exampleInputPassword1">Discount Type</label>
								    <select name="discount_type" class="form-control">
								    	<option>%</option>
								    </select>
								  </div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        <button type="submit" class="btn btn-default">Save changes</button>
						      </div>
						    </div>
						  </div>
						</div>

					</form>

				<?php else: ?>

					<div class="col-md-10" style="margin-top: 30px;">
						<h2 class="text-center text-danger">
							You have no products.	
						</h2>
					</div>

				<?php endif ?>	
			</div>

			<div id="coupon_expiry" class="tab-pane fade in coupon_expire">

				<?php if (!empty($all_coupons)): ?>

						<div class="col-md-12" style="margin-top: 30px;">
							<div class="table-responsive">
								
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Coupon Code</th>
										<th>Quantity</th>
										<th>Expiration Date</th>
										<th>Discount Value</th>
										<th>Discount Type</th>
										<th>Expiry Left</th>
									</tr>
								</thead>
								<tbody>

								<?php foreach ($all_coupons as $all_coupon): ?>

									<tr>
										<td><?php echo $all_coupon->coupon_code ?></td>
										<td><?php echo $all_coupon->quantity ?></td>
										<td><?php echo $all_coupon->expire_date ?></td>
										<td><?php echo $all_coupon->discount_value ?></td>
										<td><?php echo $all_coupon->discount_type ?></td>
										<td>
											<?php 
												
												$current_date = date('Y-m-d');

												$date1 = new DateTime($current_date);
												$date2 = new DateTime($all_coupon->expire_date);

												$diff = $date2->diff($date1)->format("%a");
											 ?>
											 <?php if ($diff == 3): ?>

												<button class="btn-danger">
													<h4>3 days Left to Expiry</h4>
												</button>

											<?php elseif($diff == 2): ?>

												<button class="btn-danger">
													<h4>2 days Left to Expiry</h4>
												</button>

											<?php elseif($diff == 1): ?>

												<button class="btn-danger">
													<h4>1 day Left to Expiry</h4>
												</button>

											<?php else: ?>

												<button class="btn-danger">
													<h4>Expired</h4>
												</button>

											 <?php endif ?>

										</td>
									</tr>

								<?php endforeach ?>

								</tbody>
							</table>

							</div>

						</div>

				<?php else: ?>

					<div class="col-md-10" style="margin-top: 30px;">
						<h2 class="text-center text-danger">
							You have not Applied Any Coupon Code on Your Products.	
						</h2>
					</div>

				<?php endif ?>	
			</div>

			<div id="product_visits" class="tab-pane fade">

				<?php if (!empty($product_views)): ?>

					<?php foreach ($product_views as $product_view): ?>
						
						<div class="col-md-12" style="margin-top: 30px;">
							<a href="<?php bs() ?>edit-product/<?php echo $seller_products->products_id ?> " class="pull-right">
								<div class="panel panel-danger past-visit">
							  		<div class="panel-body">
							  			<b> <font color="white"> Today's Visitors </font></b>

							  			<?php if ($product_view->created_at == date('Y-m-d')): ?>
							  					
							  				<?php echo "<h4 class='text-center'><font color='white'>$product_view->views</font></h4>"; ?>	

							  			<?php endif ?>
							  		</div>
								</div>
								<div class="panel panel-danger visit-tile">
							  		<div class="panel-body">
							  			<b> <font color="white"> Past Vists </font></b>
										<?php 
								  			$current_date = date('Y-m-d');

								  			$date = strtotime("+7 day");
											$upcomming_days = date('Y-m-d', $date);

											if ($product_view->created_at == date("Y-m-d") || $current_date <= $product_view->updated_at) 
											{
												echo "<h4 class='text-center'><font color='white'>$product_view->views</font></h4>";	
											}
								  		 ?>
							  		</div>
								</div>
							</a>
							<div class="col-md-3">
								<img src="<?php echo $product_view->url ?>" alt="" height="200">
							</div>
							<div class="col-md-7">
								<h3><?php echo $product_view->title ?></h3>
								<h4>Price: $<?php echo $product_view->price ?></h4>
								<p>Qty:<?php echo $product_view->quantity ?></p>
								<p><?php echo $product_view->description ?>.</p>
							</div>
						</div>
						<div class="col-md-12"><hr style="height: 2px; background: #dec18c;">
						</div>

					<?php endforeach ?>

				<?php else: ?>

					<div class="col-md-10" style="margin-top: 30px;">
						<h2 class="text-center text-danger">
							Your Product have No Vistis.	
						</h2>
					</div>

				<?php endif ?>		
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
			<div class="col-md-3 col-sm-4 text-center footer-item">
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
	// Changing Status

	function ChangeStatus(id,val)
	{
		console.log(val);

		if (confirm('Are you sure to update status')) 
		{
			$.post('<?php echo base_url('Seller_dasboard/UpdateStatus') ?>', {id:id,val:val}, function(data, textStatus, xhr) 
			{
				window.location = '<?php bs() ?>seller-dashboard?orders=1';
				// location.reload();
				// switch(val) {
				//     case '0':
				//         $('#ChangeStatus').text('Pending');
				//         break;
				//     case '1':
				//         $('#ChangeStatus').text('In-Progress');
				//         break;
				//     case '2':
				//         $('#ChangeStatus').text('Dispatched');
				//         break;

				//     case '3':
				//         $('#ChangeStatus').text('Completed');
				//         break;
				//     default:
				//         $('#ChangeStatus').text('Un-Known');
				// }
			});
		}
	}
</script>


<script>
	var msg = <?php echo $this->input->get('messages') ?>;

	if (msg == 1)
	{
       $(".remove").removeClass("active");
       $(".activate").addClass("active");

       $.ajax({
		       	url: '<?php bs() ?>Seller_dasboard/read_messages',
		       })
       .done(function(success) 
       {
       	console.log(success);
       })
       .always(function() {
       	console.log("complete");
       });
       
	}
</script>


<script>
	var msg = <?php echo $this->input->get('orders') ?>;

	if (msg == 1)
	{
       $(".remove").removeClass("active");
       $(".order").addClass("active");
	}
</script>

<script>
	var msg = <?php echo $this->input->get('expir_coupon') ?>;

	if (msg == 1)
	{
       $(".remove").removeClass("active");
       $(".coupon_expire").addClass("active");
	}
</script>

<script>

function toggle(source) 
{
  checkboxes = document.getElementsByName('product_id[]');

  for(var i=0, n=checkboxes.length;i<n;i++) 
  {
    checkboxes[i].checked = source.checked;
  }
}

</script>