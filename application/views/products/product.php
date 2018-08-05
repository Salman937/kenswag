<div id="wrapper-content" class="clearfix">
   <div class="section-page-title single-product-title-margin container">
      <section class="breadcrumb-wrap s-color">
         <div class="container">
            <ul class="breadcrumbs">
               <li>
                  <a rel="v:url" href="<?php bs() ?>" class="home">Home</a>
               </li>
               <li>
                  <span>Shop</span>
               </li>
               <li>
                  <span>Product details</span>
               </li>
            </ul>
         </div>
      </section>
   </div>
   <main class="single-product-wrap">
      <div class="container clearfix">
         <div class="row clearfix">
            <div class="site-content-single-product col-md-12">
               <div class="single-product-inner">
                  <div id="product-2239" class="post-2239 product type-product status-publish has-post-thumbnail product_cat-birthday-gifts first instock sale shipping-taxable product-type-grouped">
                     <div class="single-product-info clearfix">
                        <div class="single-product-image-wrap">
                           <div class="single-product-image">
                              <div class="product-flash-wrap"></div>
                              <div class="single-product-image-inner">
                                 <div id="sync1" class="owl-carousel manual">

                                <?php foreach ($product_detail as $value): ?>
                                 		
                                    <div>
                                       <a href="#" itemprop="image" class="woocommerce-main-image" title="" data-rel="prettyPhoto[product-gallery]" data-index="0">
                                       <img width="600" height="600" src="<?php echo $value->url ?>" alt="" srcset="" sizes="(max-width: 600px) 100vw, 600px" />
                                       </a>
                                    </div>

                                <?php endforeach ?> 	

                                 </div>
                                 <div class="product-thumb-wrap product-image-total-4">
                                    <div id="sync2" class="owl-carousel manual">

                                    <?php foreach ($product_detail as $value): ?>
                                    		
                                       <div class="thumbnail-image">
                                          <img width="180" height="180" src="<?php echo $value->url ?>" class="attachment-shop_thumbnail size-shop_thumbnail" alt="" srcset="" sizes="(max-width: 180px) 100vw, 180px" />
                                         
                                       </div>

                                    <?php endforeach ?>	

                                    </div>
                                 </div>
                              </div>
                              <script type="text/javascript">(function($) {
                                 "use strict";
                                 $(document).ready(function() {
                                 
                                 	var sync1 = $("#sync1",".single-product-image-inner");
                                 	var sync2 = $("#sync2",".single-product-image-inner");
                                 	sync1.owlCarousel({
                                 		singleItem : true,
                                 		slideSpeed : 100,
                                 		navigation: true,
                                 		pagination:false,
                                 		navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
                                 		afterAction : syncPosition,
                                 		responsiveRefreshRate : 200
                                 	});
                                 
                                 	sync2.owlCarousel({
                                 		items : 4,
                                 		itemsDesktop: [1199, 4],
                                 		itemsDesktopSmall: [980, 3],
                                 		itemsTablet: [768, 3],
                                 		itemsTabletSmall: false,
                                 		itemsMobile: [479, 2],
                                 		pagination:false,
                                 		responsiveRefreshRate : 100,
                                 		navigation: false,
                                 		navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
                                 		afterInit : function(el){
                                 			el.find(".owl-item").eq(0).addClass("synced");
                                 		}
                                 	});
                                 
                                 	function syncPosition(el){
                                 		var current = this.currentItem;
                                 		$("#sync2")
                                 			.find(".owl-item")
                                 			.removeClass("synced")
                                 			.eq(current)
                                 			.addClass("synced");
                                 		if($("#sync2").data("owlCarousel") !== undefined){
                                 			center(current);
                                 		}
                                 	}
                                 
                                 	$("#sync2").on("click", ".owl-item", function(e){
                                 		e.preventDefault();
                                 		var number = $(this).data("owlItem");
                                 		sync1.trigger("owl.goTo",number);
                                 	});
                                 
                                 	function center(number){
                                 		var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
                                 		var num = number;
                                 		var found = false;
                                 		for(var i in sync2visible){
                                 			if(num === sync2visible[i]){
                                 				var found = true;
                                 			}
                                 		}
                                 
                                 		if(found===false){
                                 			if(num>sync2visible[sync2visible.length-1]){
                                 				sync2.trigger("owl.goTo", num - sync2visible.length+2)
                                 			}else{
                                 				if(num - 1 === -1){
                                 					num = 0;
                                 				}
                                 				sync2.trigger("owl.goTo", num);
                                 			}
                                 		} else if(num === sync2visible[sync2visible.length-1]){
                                 			sync2.trigger("owl.goTo", sync2visible[1])
                                 		} else if(num === sync2visible[0]){
                                 			sync2.trigger("owl.goTo", num-1)
                                 		}
                                 	}
                                 
                                 
                                 	$(document).on('found_variation',function(event,variation){
                                 		var $product = $(event.target).closest('.product');
                                 		if ((typeof variation !== 'undefined') && (typeof variation.variation_id !== 'undefined')) {
                                 			var $stock    = $product.find( '.product_meta' ).find( '.product_stock' );
                                 			// Display SKU
                                 			if ( variation.availability_html ) {
                                 				$stock.wc_set_content( $(variation.availability_html).text() );
                                 			} else {
                                 				$stock.wc_reset_content();
                                 			}
                                 
                                 
                                 			var variation_id = variation.variation_id,
                                 				$mainImage = $product.find('#sync1');
                                 			var index = parseInt($('a[data-variation_id*="|'+variation_id+'|"]',$mainImage).data('index'),10) ;
                                 			if (!isNaN(index) ) {
                                 				sync1.trigger("owl.goTo",index);
                                 			}
                                 		}
                                 	});
                                 
                                 	$(document).on('reset_data',function(event){
                                 		var $product = $(event.target).closest('.product');
                                 		$product.find( '.product_meta' ).find( '.product_stock').wc_reset_content();
                                 		sync1.trigger("owl.goTo",0);
                                 	});
                                 
                                 });
                                 })(jQuery);
                              </script> 
                           </div>
                        </div>
                        <div class="summary-product-wrap">
                           <div class="summary-product entry-summary">
                              <h2 itemprop="name" class="product_title entry-title p-font"><?php echo $product_detail[0]->title ?></h2>
                              <p class="price">
                                 <span class="woocommerce-Price-amount amount">
                                 <span class="woocommerce-Price-currencySymbol">&#36;</span><?php echo $product_detail[0]->price ?></span>
                              </p>
                              <div class="product-single-short-description" itemprop="description">
                                 <p>
                                 	<?php echo $product_detail[0]->description ?>.
                                 </p>
                              </div>
                              <!-- Image loader -->
                                 <!-- <div id='loader' style='display: none;'>
                                   <img src='<?php bs() ?>assets/images/loading-icon.gif' width='32px' height='32px'>
                                 </div> -->
                                 <!-- Image loader -->
                              <form class="cart" method="" enctype='multipart/form-data'>
                                 <table cellspacing="0" class="group_table">
                                    <tbody>
                                       <tr id="product-1555" class="post-1555 product type-product status-publish has-post-thumbnail product_cat-birthday-gifts product_cat-illumination product_cat-romantic product_cat-special-goods product_tag-birthday product_tag-illumination product_tag-romatic product_tag-special-goods  instock shipping-taxable purchasable product-type-simple">
                                          <td>
                                             <div class="quantity">
                                                <div class="quantity-inner"> 
                                                   <button class="btn-number" data-type="minus"> 
                                                   <i class="pe-7s-less"></i> 
                                                   </button> 
                                                   <input type="text" step="1" min="0" name="qty" value="0" title="Qty" class="input-text qty text" size="4" /> 
                                                   <button class="btn-number" data-type="plus"> 
                                                   <i class="pe-7s-plus"></i> 
                                                   </button>
                                                </div>
                                             </div>
                                          </td>
                                       </tr>
                                       
                                    </tbody>
                                 </table>
                                 <input type="hidden" name="id" value="<?php echo $product_detail[0]->product_id ?>" /> 
                                 <input type="hidden" name="price" value="<?php echo $product_detail[0]->price ?>" /> 
                                 <input type="hidden" name="title" value="<?php echo $product_detail[0]->title ?>" /> 
                                 <input type="hidden" name="img" value="<?php echo $product_detail[0]->url ?>" />
                                 
                                 <button type="submit" class="single_add_to_cart_button button alt">Add to cart</button>

                              </form>
                              
                              <div class="product_meta"> 
                                 <span class="product-stock-status-wrapper"><label>Availability:</label> 
                                    <span class="product_stock">

                                    <?php if ($product_detail[0]->quantity == 0): ?>
                                          
                                       <span class="product-stock-status in-stock"><font color="red">This Product Not Availabe in Stock</font></span>

                                    <?php else: ?>
                                    
                                       <span class="product-stock-status in-stock">In stock</span>

                                    <?php endif ?>   

                                    </span> 
                                 </span>
                                 <span class="product-stock-status-wrapper"><label>Quantity Available In Stock:</label> 
                                    <span class="product_stock">
                                    <span class="product-stock-status in-stock"><?php echo $product_detail[0]->quantity ?></span>
                                    </span> 
                                 </span>
                                 <span>
                                 <label>Size:</label>
                                 <span class="product_dimensions"> N/A</span>
                                 </span>
                                 <span class="posted_in">
                                 <label>Category:</label> 
                                 <a href="../../product-category/birthday-gifts/index.html" rel="tag"><?php echo $product_detail[0]->cat_name ?></a>.
                                 </span>
                              </div>
                              <div class="social-share-wrap">
                                 <label>Share:</label>
                                 <ul class="social-share">
                                    <li> 
                                       <a onclick="window.open('https://www.facebook.com/sharer.php?s=100&amp;p[url]=http%3A%2F%2Fthemes.g5plus.net%2Fhandmade%2Fproduct%2Fbirthday-gifts-products%2F','sharer', 'toolbar=0,status=0,width=620,height=280');" href="javascript:;"> <i class="fa fa-facebook"></i> 
                                       </a>
                                    </li>
                                    <li> 
                                       <a onclick="popUp=window.open('http://twitter.com/home?status=Birthday+Gifts+Grouped%20http%3A%2F%2Fthemes.g5plus.net%2Fhandmade%2Fproduct%2Fbirthday-gifts-products%2F','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;"> <i class="fa fa-twitter"></i> 
                                       </a>
                                    </li>
                                    <li> 
                                       <a href="javascript:;" onclick="popUp=window.open('https://plus.google.com/share?url=http%3A%2F%2Fthemes.g5plus.net%2Fhandmade%2Fproduct%2Fbirthday-gifts-products%2F','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;"> <i class="fa fa-google-plus"></i> 
                                       </a>
                                    </li>
                                    <li> 
                                       <a onclick="popUp=window.open('http://linkedin.com/shareArticle?mini=true&amp;url=http%3A%2F%2Fthemes.g5plus.net%2Fhandmade%2Fproduct%2Fbirthday-gifts-products%2F&amp;title=Birthday+Gifts+Grouped','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;"> <i class="fa fa-linkedin"></i> 
                                       </a>
                                    </li>
                                    <li> 
                                       <a onclick="popUp=window.open('http://www.tumblr.com/share/link?url=http%3A%2F%2Fthemes.g5plus.net%2Fhandmade%2Fproduct%2Fbirthday-gifts-products%2F&amp;name=Birthday+Gifts+Grouped&amp;description=Pellentesque+habitant+morbi+tristique+senectus+et+netus+et+malesuada+fames+ac+turpis+egestas.+Vestibulum+tortor+quam%2C+feugiat+vitae%2C+ultricies+eget%2C+tempor+sit+amet%2C+ante.+Donec+eu+libero+sit+amet+quam+egestas+semper.+Aenean+ultricies+mi+vitae+est.+Mauris+placerat+eleifend+leo+2.','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;"> <i class="fa fa-tumblr"></i> 
                                       </a>
                                    </li>
                                    <li>
                                       <a onclick="popUp=window.open('../../../../pinterest.com/pin/create/button/indexf2a3.html?url=http%3A%2F%2Fthemes.g5plus.net%2Fhandmade%2Fproduct%2Fbirthday-gifts-products%2F&amp;description=Birthday+Gifts+Grouped&amp;media=http://themes.g5plus.net/handmade/wp-content/uploads/2013/06/product-18.jpg','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;"> <i class="fa fa-pinterest"></i> 
                                       </a>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                     <div class="related products">
                        <h4 class="widget-title">
                           <span>Related Products</span>
                        </h4>
                        <div class="product-listing woocommerce clearfix product-slider">
                           <div class="owl-carousel" data-plugin-options='{"items" :4,"pagination" : false, "navigation" : true,"itemsDesktop" : [1199,4], "itemsDesktopSmall" : [980,3], "itemsTablet" : [768, 3], "itemsTabletSmall": [600, 2]}'>

                           <?php foreach ($related_products as $key => $product): ?>
                                 
                              <div class="product-item-wrap rating-visible post-1555 product type-product status-publish has-post-thumbnail product_cat-birthday-gifts product_cat-illumination product_cat-romantic product_cat-special-goods product_tag-birthday product_tag-illumination product_tag-romatic product_tag-special-goods first instock shipping-taxable purchasable product-type-simple">
                                 <div class="product-item-inner">
                                    <div class="product-thumb">
                                       <div class="product-thumb-primary"> 
                                          <a href="<?php bs() ?>product-detail/<?php echo $product->product_id ?>" title="">
                                             <img width="300" height="300" src="<?php echo $product->url ?>" class=" attachment-shop_catalog size-shop_catalog wp-post-image" alt="Click to View" title="Click to View" />
                                          </a>
                                       </div>
                                       <div class="product-actions">
                                          <div class="yith-wcwl-add-to-wishlist add-to-wishlist-1555">
                                             <div style="clear:both"></div>
                                             <div class="yith-wcwl-wishlistaddresponse"></div>
                                          </div>
                                          <div class="clear"></div>
                                          <a data-toggle="tooltip" data-placement="top" title="Quick view" class="product-quick-view" data-product_id="" href="#"><i class="fa fa-search"></i></a>
                                          <div class="add-to-cart-wrap" data-toggle="tooltip" data-placement="top" title="Add to cart">
                                             <a rel="nofollow" id="add_to_cart" data-product-id="<?php echo $product->product_id ?>" data-product-price="<?php echo $product->price ?>" data-product-img="<?php echo $product->url ?>" data-product-title="<?php echo $value->title; ?>" href="" class="button product_type_grouped btn_add_to_cart">
                                                <i class="fa fa-shopping-cart"></i> Add to cart
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           
                           <?php endforeach ?>   
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>
</div>