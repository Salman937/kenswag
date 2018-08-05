<style>
   /*
 *  STYLE 2
 */

#style-2::-webkit-scrollbar-track
{
   -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
   border-radius: 10px;
   background-color: white;
}

#style-2::-webkit-scrollbar
{
   width: 12px;
   background-color: #2dc2a0;
}

#style-2::-webkit-scrollbar-thumb
{
   border-radius: 10px;
   -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
   background-color: #2dc2a0;
}
/* Extra Small Devices, Phones */ 
/*@media only screen and (max-width : 480px) 
{
   .img-small
   {
      width: 90% !important;
      margin-left: 1.4em !important;
   }
   .most-recent
   {
      text-align: center;
   }
}*/
</style>
<div id="wrapper-content" class="clearfix">
<main class="site-content-page">
   <div class="site-content-page-inner ">
   <div class="page-content">
   <div id="post-28" class="post-28 page type-page status-publish hentry">
   <div class="entry-content">
   <div class="container">
      <div class="vc_row wpb_row vc_row-fluid vc_custom_1444380378888">
         <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner ">
               <div class="wpb_wrapper">
                  <div class="handmade-banner custom bot-right">
                     <div class="bg-img" style="height:450px; background-image: url(<?php bs() ?>assets/images/mainscreen_image.png);">
                     </div>
                     <div class="overlay-banner">
                        <!-- <a class="link-banner" title="" target="_self" href="#"> -->
                        <div class="content-middle">
                        </div>
                        <!-- </a> -->
                     </div>
                  </div>
               <div class="sc-product-categories-home-wrap p-color-bg style-01" style="height: 450px;margin-top: -4.3em;overflow-y: scroll;" style="margin: 0px" id="style-2">
                     <ul class="product-categories-home">

					<?php   
                    	//Select All Categories
						$Categories = $this->common_model->getAllData('products_categories','*',array('parent_id' => 0));
					?>		
                    <?php 
                    	foreach ($Categories as $key => $cat): 
                    ?>
                        <li>
                           <a href="<?php bs() ?>products/products_category/<?php echo $cat->slug ?>" title="" ><?php echo $cat->name ?> </a>
                        </li>

                    <?php
                    	endforeach 
                   	?> 	
                     </ul>
                     
                  </div>
                  <div class="modal fade" id="khan" role="dialog" >
                     <div class="modal-dialog">
                        <div class="modal-content" >
                           <div  class="sc-product-categories-home-wrap p-color-bg style-01" style="margin-left:100px">
                              <ul  class="product-categories-home" >
                              <?php   
			                    	   //Select All Categories
									      $Categories = $this->common_model->getAllData('products_categories','*',array('parent_id' => 0));
								       ?>		

			                    <?php 

			                    	$j = 1;

			                    	foreach ($Categories as $key => $cat): 
			                    	
			                    ?>

			                        <li>
			                           <a href="#" title="" >
			                           		<span id="btn-<?php echo $j ?>" data-toggle="collapse" data-target="#submenu<?php echo $j ?>" class="toggle" aria-expanded="false"> <?php echo $cat->name ?>  </span>
			                           </a>

					
			                           <?php 
			                           		$subCategories = $this->common_model->getAllData('products_categories','*',array('parent_id' => $cat->id));
			                           ?>

			                           <?php if ( ! empty($subCategories) ): ?>

				                           <ul class="nav collapse" id="submenu<?php echo $j ?>" role="menu" aria-labelledby="btn-<?php echo $j ?>">
				                           		<?php foreach ($subCategories as $subCat): ?> 	
					                              <li>
					                                 <i class="glyphicon glyphicon-asterisk" aria-hidden="true"></i> <?php echo $subCat->name ?>
					                              </li>
				                              	<?php endforeach ?>

				                           </ul>
			                           <?php endif ?>
			                        </li>

			                    <?php

			                    	$j++;

			                    	endforeach 
			                   	?>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="vc_row wpb_row vc_row-fluid margin-bottom-80">
         <div class="col-md-4 col-sm-12 sm-margin-bottom-30 					wpb_column vc_column_container vc_col-sm-4">
            <div class="vc_column-inner ">
               <div class="wpb_wrapper">
                  <div style="border-color: #eeeeee;" class="handmade-banner style1 content-center">
                     <div class="bg-img" style="height:270px; background-image: url(<?php bs() ?>assets/images/imagevector.png);">
                     </div>
                     <div class="overlay-banner">
                        <a class="link-banner" title="" target="_self" href="#">
                           <div class="content-middle">
                              <div class="content-middle-inner">
                                 <h2>Lets have a look at your favorites!</h2>
                                 <span class="sub-title">Browse Favorite</span>
                              </div>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-8 col-sm-12 wpb_column vc_column_container vc_col-sm-8">
            <div class="vc_column-inner ">
               <div class="wpb_wrapper">
                  <div class="handmade-banner style2   left only-button">
                     <div class="overflow-hidden">
                        <div class="bg-img" style="height:270px; background-image: url(<?php bs() ?>assets/images/feature_image.png);">
                        </div>
                     </div>
                     <div class="overlay-banner">
                        <a class="link-banner" title="Featured items" target="_self" href="#">
                           <div class="content-middle">
                              <div class="content-middle-inner">
                                 <a href="<?php bs() ?>featured-products" title="">
                                    <span class="handmade-button style1 button-1x">
                                       Featured items<i class="pe-7s-right-arrow"></i>
                                    </span>
                                 </div>   
                              </div>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
   <div class="vc_row wpb_row vc_row-fluid">
   <div class="wpb_column vc_column_container vc_col-sm-12">
   <div class="vc_column-inner">
   <div class="wpb_wrapper">
      <div class="vc_tta-container" data-vc-action="collapse">
         <h2 class="most-recent">Most Recent</h2>
         <div class="vc_general vc_tta vc_tta-tabs vc_tta-color-grey vc_tta-style-tab_style1 vc_tta-shape-square vc_tta-o-shape-group vc_tta-gap-20 vc_tta-o-no-fill vc_tta-tabs-position-top vc_tta-controls-align-right">
            <div class="vc_tta-panels-container">
               <div class="vc_tta-panels">
                  <div class="vc_tta-panel vc_active" id="birthday-gifts" data-vc-content=".vc_tta-panel-body">
                     <div class="vc_tta-panel-body">
                        <div class="woocommerce sc-product-wrap no-title">
                           <div class="product-listing woocommerce clearfix columns-4 img-small">

                            <?php foreach ($products as $value): ?>

                              <div class="product-item-wrap rating-visible post-2239 product type-product status-publish has-post-thumbnail product_cat-birthday-gifts first instock sale shipping-taxable product-type-grouped">
                                 <div class="product-item-inner">
                                    <div class="product-thumb">
                                       <a href="<?php bs() ?>product-detail/<?php echo $value->product_id ?>" title="">
                                          <div class="product-thumb-primary">
                                             <img width="300" height="300" src="<?php echo $value->img_url ?>" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="product-18" title="" />
                                          </div>
                                       </a>
                                       <div class="product-actions">
                                          <div class="yith-wcwl-add-to-wishlist add-to-wishlist-1569">
                                             <div class="yith-wcwl-add-button show" style="display:block"> 
                                                <a href="#" id="add_to_fav" rel="nofollow" data-product-id="<?php echo $value->product_id ?>" class="add_to_wishlist"> Add to Wishlist</a>
                                             </div>
                                             <div style="clear:both"></div>
                                             <div class="yith-wcwl-wishlistaddresponse"></div>
                                         </div>
                                          <div class="clear"></div>
                                             <a data-toggle="tooltip" data-placement="top" title="Quick view" class="product-quick-view" href="#">
                                                <i class="fa fa-search" id="qick_view" data-qick-view = "<?php echo $value->product_id ?>" data-toggle="modal" data-target="#allu"></i>
                                             </a>
                                          <div class="add-to-cart-wrap" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                             <a rel="nofollow" id="add_to_cart" data-product-id="<?php echo $value->product_id ?>" data-product-price="<?php echo $value->price ?>" data-product-img="<?php echo $value->img_url ?>" data-product-title="<?php echo $value->title; ?>" href="" data-quantity="<?php echo $value->qty ?>"  class="button product_type_grouped btn_add_to_cart">
                                             <i class="fa fa-shopping-cart"></i> 	
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="product-info">
                                       <h3 class="product-name p-font">
                                          <a href="#">
                                          <?php echo substr($value->title,0,47).'...';   ?></a>
                                       </h3>
                                       <span class="price">
                                       <span class="woocommerce-Price-amount amount">
                                       <span class="woocommerce-Price-currencySymbol">&#36;</span>
                                       <?php echo $value->price ?>
                                       </span>
                                       </span>
                                    </div>
                                 </div>
                              </div>

                              <?php endforeach ?>										

                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="container">
                     <div class="vc_row wpb_row vc_row-fluid vc_custom_1444465598651">
                        <div class="wpb_column vc_column_container vc_col-sm-12">
                           <div class="vc_column-inner ">
                              <div class="wpb_wrapper">
                                 <div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_pos_align_center vc_separator_no_text"><span class="vc_sep_holder vc_sep_holder_l"><span style="border-color:#ddbe86;" class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span style="border-color:#ddbe86;" class="vc_sep_line"></span></span></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="fullwidth">
                     <div class="vc_row wpb_row vc_row-fluid">
                        <div class="wpb_column vc_column_container vc_col-sm-12">
                           <div class="vc_column-inner ">
                              <div class="wpb_wrapper">
                                 <div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_pos_align_center vc_separator_no_text"><span class="vc_sep_holder vc_sep_holder_l"><span style="border-color:#eeeeee;" class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span style="border-color:#eeeeee;" class="vc_sep_line"></span></span></div>
                              </div>
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

