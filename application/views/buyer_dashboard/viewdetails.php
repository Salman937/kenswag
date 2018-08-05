<style>
	.image-upload > input
{
    display: none;
}
.rating 
{
  unicode-bidi: bidi-override;
  direction: rtl;
}
.rating > span 
{
  display: inline-block;
  position: relative;
  width: 1.1em;
}
.rating > span:hover:before,
.rating > span:hover ~ span:before 
{
   color: #ffd633;
   content: "\2605";
   position: absolute;
}
.rating .review
{
	color: #ffd633;
}
</style>
<div class="container" style="margin-top: 10px;">
<div class="container">
	<div class="col-md-12"><hr style="height: 2px; background: #dec18c;"></div>
	<?php if (!empty($order)): ?>
		<?php foreach ($order as $view): ?>
		<?php $getuser = $this->common_model->getAllData('users','',array('id' => $view->seller_id)); ?>
		<?php $getProducts = $this->common_model->DJoin('*','orders_items','products','orders_items.products_id = products.id','',array('orders_items.orders_id' => $view->id)); ?>
				<div class="col-md-12">
					<h4>Order Details</h4>
					<div class="table-responsive">
						<table class="table table-striped">
							<tr>
								<th>Order Date</th>
								<td><?php echo $view->order_date; ?></td>
								<th>Payment Date</th>
								<td><?php echo $view->payment_date; ?></td>
								<th>Total Price</th>
								<td>$<?php echo $view->total_price; ?></td>
							</tr>
							<tr>
								<th>Seller Name</th>
								<td><?php echo $getuser[0]->first_name.' '.$getuser[0]->last_name; ?></td>
								<th>Seller Email</th>
								<td><?php echo $getuser[0]->email; ?></td>
								<th>Seller Phone</th>
								<td><?php echo $getuser[0]->phone; ?></td>
							</tr>
						</table>
					</div>

					<h4>Shipment Address</h4>
					<div class="table-responsive">
						<table class="table table-striped">
							<tr>
								<th>Address</th>
								<td><?php echo $view->address; ?></td>
								<th>City</th>
								<td><?php echo $view->city; ?></td>
								<th>State</th>
								<td><?php echo $view->state; ?></td>
								<th>Country</th>
								<td><?php echo $view->country; ?></td>
								<th>Postal Code</th>
								<td><?php echo $view->postal_code; ?></td>
							</tr>
						</table>
					</div>	
					<h4>Order Items</h4>
					<div class="table-responsive">
						<table class="table table-striped">
							<tr>
								<th>#</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Review</th>
								
							</tr>
							<?php $i=1; foreach ($getProducts as $order): ?>
							<tr>
								<th><?php echo $i; ?></th>
								<th><?php echo $order->title; ?></th>
								<th><?php echo $order->price; ?></th>
								<th>1</th>
								<th>
									<?php $get_reviews = $this->common_model->getAllData('products_ratings','products_id,rating',array('products_id' => $order->products_id));
									?> 

									<?php if (!empty($get_reviews)): ?>

									<?php foreach ($get_reviews as $review): ?>

										<?php if ($review->rating == 5 ) { ?>

			                            <div class="rating">
											<span class="new_rate review" data-star="5" data-product-id="<?php echo $review->products_id ?>">☆</span>
											<span class="new_rate review" data-star="4" data-product-id="<?php echo $review->products_id ?>">☆</span>
											<span class="new_rate review" data-star="3" data-product-id="<?php echo $review->products_id ?>">☆</span>
											<span class="new_rate review" data-star="2" data-product-id="<?php echo $review->products_id ?>">☆</span>
											<span class="new_rate review" data-star="1" data-product-id="<?php echo $review->products_id ?>">☆</span>
										</div>

			                              <?php  } elseif ($review->rating == 4) { ?>
										<div class="rating">
											<span class="new_rate" data-star="5" data-product-id="<?php echo $review->products_id ?>">☆</span>
											<span class="new_rate review" data-star="4" data-product-id="<?php echo $review->products_id ?>">☆</span>
											<span class="new_rate review" data-star="3" data-product-id="<?php echo $review->products_id ?>">☆</span>
											<span class="new_rate review" data-star="2" data-product-id="<?php echo $review->products_id ?>">☆</span>
											<span class="new_rate review" data-star="1" data-product-id="<?php echo $review->products_id ?>">☆</span>
										</div>

			                              <?php  } elseif ($review->rating == 3) { ?>

			                            <div class="rating">
											<span class="new_rate" data-star="5" data-product-id="<?php echo $review->products_id ?>">☆</span>
											<span class="new_rate" data-star="4" data-product-id="<?php echo $review->products_id ?>">☆</span>
											<span class="new_rate review" data-star="3" data-product-id="<?php echo $review->products_id ?>">☆</span>
											<span class="new_rate review" data-star="2" data-product-id="<?php echo $review->products_id ?>">☆</span>
											<span class="new_rate review" data-star="1" data-product-id="<?php echo $review->products_id ?>">☆</span>
										</div>

			                              <?php  } elseif ($review->rating == 2) { ?>

			                            <div class="rating">
											<span class="new_rate" data-star="5" data-product-id="<?php echo $review->products_id ?>">☆</span>
											<span class="new_rate" data-star="4" data-product-id="<?php echo $review->products_id ?>">☆</span>
											<span class="new_rate" data-star="3" data-product-id="<?php echo $review->products_id ?>">☆</span>
											<span class="new_rate review" data-star="2" data-product-id="<?php echo $review->products_id ?>">☆</span>
											<span class="new_rate review" data-star="1" data-product-id="<?php echo $review->products_id ?>">☆</span>
										</div>  

			                              <?php  } else { ?>

			                            <div class="rating">
											<span class="new_rate" data-star="5" data-product-id="<?php echo $review->products_id ?>">☆</span>
											<span class="new_rate" data-star="4" data-product-id="<?php echo $review->products_id ?>">☆</span>
											<span class="new_rate" data-star="3" data-product-id="<?php echo $review->products_id ?>">☆</span>
											<span class="new_rate" data-star="2" data-product-id="<?php echo $review->products_id ?>">☆</span>
											<span class="new_rate review" data-star="1" data-product-id="<?php echo $review->products_id ?>">☆</span>
										</div>

			                              <?php  } ?>

									<?php endforeach ?>

									<?php else: ?>

									<div class="rating">
										<span class="rate" data-star="5" data-product-id="<?php echo $order->products_id ?>">☆</span>
										<span class="rate" data-star="4" data-product-id="<?php echo $order->products_id ?>">☆</span>
										<span class="rate" data-star="3" data-product-id="<?php echo $order->products_id ?>">☆</span>
										<span class="rate" data-star="2" data-product-id="<?php echo $order->products_id ?>">☆</span>
										<span class="rate" data-star="1" data-product-id="<?php echo $order->products_id ?>">☆</span>
									</div>

									<?php endif ?>

								</th>
							</tr>
							<?php $i++; endforeach ?>
						</table>
					</div>	
				</div>
		<?php endforeach ?>
	<?php endif ?>
	<div class="col-md-12"><hr style="height: 2px; background: #dec18c;"></div>
	
	<section class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3 text-center footer-item">
					<div class="footer-logo">
						<a href=""><h3>KK & M merchants</h3></a>
					</div>
				</div>
				<div class="col-md-4 text-center footer-item">
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
				<div class="col-md-4 text-center footer-item">
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

<script>

$(document).ready(function() 
{
	$('body').on('click','.rate', function(event) 
	{
		event.preventDefault();
		/* Act on the event */

		var stars   = $(this).attr('data-star');
		var pro_id  = $(this).attr('data-product-id');

		$.ajax({
			url: '<?php bs() ?>Buyer_dashboard/ratings',
			type: 'POST',
			dataType: 'html',
			data: {stars: stars,product_id: pro_id},
		})
		.done(function(success) 
		{
			alert("You give " + success + " Star Review");
			location.reload();
		})
	});
});

$(document).ready(function() 
{
	$('body').on('click','.new_rate', function(event) 
	{
		event.preventDefault();
		/* Act on the event */

		var stars   = $(this).attr('data-star');
		var pro_id  = $(this).attr('data-product-id');


		$.ajax({
			url: '<?php bs() ?>Buyer_dashboard/update_ratings',
			type: 'POST',
			dataType: 'html',
			data: {stars: stars,product_id: pro_id},
		})
		.done(function(success) 
		{
			alert("You Review is Updated");
			location.reload();
		})
	});
});
	
</script>