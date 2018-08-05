<?php 

$count = 0;

foreach ($this->cart->contents() as $items): 

$count++;

?>
<ul class="cart_list product_list_widget ps-container" style="max-height: 200px;" data-ps-id="79426383-3312-8817-3a6f-9d5d0b101164">
		
	<li>
		<div class="cart-left">
			<a href="">
				<img width="180" height="180" src="<?php echo $items['options']['img'] ?>" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt=""  >
			</a>
		</div>
		<div class="cart-right">
			<a href="">
				<?php echo substr($items['name'],0,18).'...';   ?>
			</a>
					
		<span class="quantity"><?php echo $items['qty'] ?> × 
			<span class="woocommerce-Price-amount amount">
				<span class="woocommerce-Price-currencySymbol">$<?php echo $items['price'] ?></span>
			</span>
		</span>
			<a href="" data-product-rowid="<?php echo $items['rowid'] ?>" id="remove" class="mini-cart-remove" title="Remove this item">
				<i class="pe-7s-close-circle"></i>
			</a>						
		</div>
	</li>
	<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; display: block;">
		<div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
	</div>
	<div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; display: block;">
		<div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div>
	</div>
</ul>

<?php endforeach ?>

<?php if (!empty($this->cart->total())): ?>
	
<div class="cart-total">
<p class="total">
	<strong>Total:</strong> 
	<span class="woocommerce-Price-amount amount">
		<span class="woocommerce-Price-currencySymbol">$</span><?php echo $this->cart->total() ?>
	</span>
</p>
<p class="buttons both-buttons">
	<a href="<?php bs() ?>cart" class="button wc-forward">View Cart</a>
	<a href="<?php bs() ?>checkout" class="button checkout wc-forward">Checkout</a>
</p>
</div>

<?php endif ?>

<?php if ($count == 0): ?>
	
<ul class="cart_list product_list_widget ">
	<li class="empty"><h4>An empty cart</h4><p>You have no item in your shopping cart</p>
	</li>
</ul>

<?php endif ?>
