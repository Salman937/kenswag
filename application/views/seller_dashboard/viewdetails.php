<style>
	.image-upload > input
{
    display: none;
}
</style>
<div class="container" style="margin-top: 10px;">
<div class="container">
	<div class="col-md-12"><hr style="height: 2px; background: #dec18c;"></div>
	<?php if (!empty($order)): ?>
		<?php foreach ($order as $view): ?>
		<?php $getuser = $this->common_model->getAllData('users','',array('id' => $view->users_id));?>
		<?php $getProducts = $this->common_model->DJoin('*','orders_items','products','orders_items.products_id = products.id','',array('orders_items.orders_id' => $view->id)); ?>
				<div class="col-md-12">
					<h4>Order Details</h4>
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
							<th>Buyer Name</th>
							<td><?php echo $getuser[0]->first_name.' '.$getuser[0]->last_name; ?></td>
							<th>Buyer Email</th>
							<td><?php echo $getuser[0]->email; ?></td>
							<th>Buyer Phone</th>
							<td><?php echo $getuser[0]->phone; ?></td>
						</tr>
					</table>
					<h4>Shipment Address</h4>
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
					<h4>Order Items</h4>
					<table class="table table-striped">
						<tr>
							<th>#</th>
							<th>Product Name</th>
							<th>Price</th>
							<th>Quantity</th>
							
						</tr>
						<?php $i=1; foreach ($getProducts as $order): ?>
						<tr>
							<th><?php echo $i; ?></th>
							<th><?php echo $order->title; ?></th>
							<th>$<?php echo $order->price; ?></th>
							<th>1</th>
						</tr>
						<?php $i++; endforeach ?>
					</table>
				</div>
		<?php endforeach ?>
	<?php endif ?>
	<div class="col-md-12"><hr style="height: 2px; background: #dec18c;"></div>
	
	<section class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3 footer-item">
					<div class="footer-logo">
						<a href=""><h3>KK & M merchants</h3></a>
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