<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="allu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> <br>
      </div>
      <div class="modal-body">
        <div class="single-product-image-wrap">
            <div class="single-product-image">
               <div class="product-flash-wrap"></div>
               <div class="single-product-image-inner">
                  <div id="sync1" class="owl-carousel manual first_img">
                     <div>
                        
                     </div>
                  </div>
                  <div class="product-thumb-wrap product-image-total-4">
                     <div id="sync2" class="owl-carousel manual second_img">
                        <div class="thumbnail-image">
                           <a href="../../wp-content/uploads/2013/06/product-18.jpg" itemprop="image" class="woocommerce-thumbnail-image" title="" data-index="0">
                              <img width="180" height="180" src="" class="attachment-shop_thumbnail size-shop_thumbnail" alt="" srcset="http://themes.g5plus.net/handmade/wp-content/uploads/2013/06/product-18-180x180.jpg 180w, http://themes.g5plus.net/handmade/wp-content/uploads/2013/06/product-18-150x150.jpg 150w, http://themes.g5plus.net/handmade/wp-content/uploads/2013/06/product-18-300x300.jpg 300w, http://themes.g5plus.net/handmade/wp-content/uploads/2013/06/product-18.jpg 600w" sizes="(max-width: 180px) 100vw, 180px" />
                           </a>
                        </div>
                        <div class="thumbnail-image">
                           <a href="../../wp-content/uploads/2013/06/product-18.jpg" itemprop="image" class="woocommerce-thumbnail-image" title="" data-index="0">
                              <img width="180" height="180" src="" class="attachment-shop_thumbnail size-shop_thumbnail" alt="" srcset="http://themes.g5plus.net/handmade/wp-content/uploads/2013/06/product-18-180x180.jpg 180w, http://themes.g5plus.net/handmade/wp-content/uploads/2013/06/product-18-150x150.jpg 150w, http://themes.g5plus.net/handmade/wp-content/uploads/2013/06/product-18-300x300.jpg 300w, http://themes.g5plus.net/handmade/wp-content/uploads/2013/06/product-18.jpg 600w" sizes="(max-width: 180px) 100vw, 180px" />
                           </a>
                        </div>
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
      </div>
    </div>
  </div>
</div>

<footer class="main-footer-wrapper light">
   <div id="wrapper-footer">
      <div class="main-footer">
         <div class="footer_inner clearfix">
            <div class="footer-top-bar-wrapper">
               <div class="footer-top-bar-inner">
                  <div class="full">
                     <div class=" sidebar">
                        <aside id="handmade-partner-carousel-4" class="widget widget-partner-carousel">
                        </aside>
                        <aside id="handmade-map-scroll-up-3" class="widget widget-map-scroll-up">
                           <div class="map-scroll-up">
                              <div class="link-wrap">
                                 <div class="map col-md-6 col-sm-6 col-xs-6"> <a href="javascript:;" class="a-map p-color-hover"> <i class="pe-7s-map-marker pe-lg pe-va"></i> <span>See map</span> </a></div>
                                 <div class="scroll-up col-md-6 col-sm-6 col-xs-6"> <a href="javascript:;" class="a-scroll-up p-color-hover"> <i class="pe-7s-up-arrow"></i> <span>Scroll up</span> </a></div>
                              </div>
                              <div class="handmade-map container">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="handmade-google-map " data-location-x="40.6700" data-location-y="-73.9400" data-marker-title="Google map" style="height:450px" data-map-zoom="12" data-map-style="none"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </aside>
                     </div>
                  </div>
               </div>
            </div>
            <div class="footer_top_holder col-4">
               <div class="container">
                  <div class="row footer-top-col-4 footer-1">
                     <div class="sidebar footer-sidebar col-md-3 col-sm-3 col-xs-12 text-center">
                        <aside id="wolverine-footer-logo-2" class="widget widget-footer-logo">
                           <div class="footer-logo">
                              <a href="http://themes.g5plus.net/handmade">
                                <h4 class="widget-title"><span>KK & M merchants</span></h4>
                              </a>
                           </div>
                        </aside>
                     </div>
                     <div class="sidebar footer-sidebar col-md-3 col-sm-4 col-xs-12 text-center">
                        <aside id="nav_menu-3" class="widget widget_nav_menu">
                           <h4 class="widget-title"><span>Information</span></h4>
                           <div class="menu-footer-information-container">
                              <ul id="menu-footer-information" class="menu">
                                 <li id="menu-item-2430" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2430">
                                  <a href="<?php bs() ?>AboutUs">About Us</a>
                                </li>
                                 <li id="menu-item-2431" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2431"><a href="<?php bs() ?>">Delivery Information</a></li>
                                 <li id="menu-item-2432" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2432"><a href="<?php bs() ?>">Privacy policy</a></li>
                                 <li id="menu-item-2433" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2433"><a href="<?php bs() ?>">Terms &#038; Conditions</a></li>
                                 <li id="menu-item-2434" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2434"><a href="<?php bs() ?>contactus">Contact Us</a></li>
                              </ul>
                           </div>
                        </aside>
                     </div>
                     <div class="sidebar footer-sidebar col-md-5 col-sm-4 col-xs-12 text-center">
                        <aside id="text-2" class="widget-title-s-font widget widget_text">
                           <h4 class="widget-title"><span>Contact us</span></h4>
                           <div class="textwidget">
                              <ul class="footer-contact-us">
                                 <li>  
                                    <span> Great Store London Oxford Street, 012 United Kingdom. </span>
                                 </li>
                                 <li>  <span> emailgreatstore@gmail.com </span></li>
                                 <li> <span> (+92) 3456 7890 </span></li>
                              </ul>
                           </div>
                        </aside>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>
</div>

<a class="back-to-top" href="javascript:;"> 
<i class="fa fa-angle-up"></i> 
</a>
<script type="text/javascript">var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
   (function(){
   var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
   s1.async=true;
   s1.src='https://embed.tawk.to/58d49c44f97dd14875f59da4/default';
   s1.charset='UTF-8';
   s1.setAttribute('crossorigin','*');
   s0.parentNode.insertBefore(s1,s0);
   })();
</script> 
<script type="text/javascript">
   function ChangeColor() {
              var lableText = document.getElementById('rad2');
              lableText.style.color = "red";
          }
</script>

<script type="text/javascript">
   $("#myModal").modal()
</script>
<script type='text/javascript'>/*  */
   var g5plus_framework_constant = {"product_compare":"Compare","product_wishList":"WishList"};
   var g5plus_framework_ajax_url = "index.html\/\/themes.g5plus.net\/handmade\/wp-admin\/admin-ajax.php?activate-multi=true";
   var g5plus_framework_theme_url = "index.html\/\/themes.g5plus.net\/handmade\/wp-content\/themes\/handmade\/";
   var g5plus_framework_site_url = "index.html\/\/themes.g5plus.net\/handmade";
   /*  */
</script> 
<script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?key=AIzaSyCSyxJHoDq9Ug4Y6CtYNbgLFAW-OacttnQ&amp;ver=4.7.8'></script> 
<script type='text/javascript'>/*  */
   var xmenu_meta = {"setting-responsive-breakpoint":"991"};
   var xmenu_meta_custom = [];
   /*  */
</script> 
<script>jQuery("style#g5plus_custom_style").append("@media screen and (min-width: 992px) {#menu-item-mobile-2475 > ul.x-sub-menu{background-image:url('../wp-content/uploads/2015/10/bg-mega-menu.png');background-attachment:scroll;background-position:bottom right;background-repeat:no-repeat;background-size:auto;}}");</script>
<script>jQuery("style#g5plus_custom_style").append("@media screen and (min-width: 992px) {#menu-item-2475 > ul.x-sub-menu{background-image:url('../wp-content/uploads/2015/10/bg-mega-menu.png');background-attachment:scroll;background-position:bottom right;background-repeat:no-repeat;background-size:auto;}}");</script>
<script src="<?php bs() ?>assets/wp-content/cache/min/1/2c2fc06dfa084e4f97927116527c1130.js" data-minify="1"></script>
</body>
<!-- Mirrored from themes.g5plus.net/handmade/home-01/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Jan 2018 08:13:39 GMT -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src='https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js'></script>

<script src="<?= base_url('assets/js/bootstrap-notify.js') ?>"></script>

<script type="text/javascript" src="<?php bs() ?>assets/js/creditCardValidator.js"></script>


</html>

<!-- <script>
  var slider = document.getElementById("myRange");
  var output = document.getElementById("demo");
  output.innerHTML = slider.value;

  slider.oninput = function() 
  {
    output.innerHTML = this.value;
  }
</script> -->

<script>

/*Index script start */

$("#signup").validate({
  rules: {
    field: {
      required: true,
      minlength: 3,
    },
    phone:{
      number: true
    }
  }
});

window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 4000);

$('#login-form').validate();

update_cart();

  $('body').on('click', '#add_to_cart', function(event) 
  {
    event.preventDefault();
    /* Act on the event */
    
    var id    = $(this).attr('data-product-id');
    var price = $(this).attr('data-product-price');
    var title = $(this).attr('data-product-title');
    var img   = $(this).attr('data-product-img');
    var qty   = 1;

    if (qty != "" && qty > 0)
    {
      $.ajax({
              url: '<?php bs('Cart/add_to_cart')?>',
              type: 'POST',
              data: {id:id,price:price,title:title,qty:qty,img:img},
          })
        .done(function(response) 
        {
            // console.log(response);
            if (response == 'sold_out') 
            {
              error_alert('This Item is Sold Out');
            }
            else
            {
              $('.shopping_cart').html(response);
              update_cart();
              success_alert('Item Added Successfully to Cart');
            }
        });
    }
    else
    {
      error_alert('This Item is Not Available in Stock');
    }

  });

  $('body').on('click', '#remove', function(event) 
  {
    event.preventDefault();
    /* Act on the event */
  
  var id = $(this).attr('data-product-rowid');

  $.ajax({
              url: '<?php bs('Cart/remove_cart_item')?>',
              type: 'POST',
              data: {id:id},
          })
        .done(function(response) 
        {

            // console.log(response);
            $('.shopping_cart').html(response);
            update_cart();
            success_alert('Item Successfully Remove from Cart');
        });

  });

function update_cart() 
{
  $('.show_cart').load('<?php bs() ?>Cart/cart');
  $('.shopping_cart').load('<?php bs() ?>Cart/view_cart');
  $('.total_value_item').load('<?php bs() ?>Cart/update_itme_value');
  $('.cart_product_amount').load('<?php bs() ?>Cart/update_total_price');
}

/*Script index Ends */


/*Cart Page script start */

$(".require").validate();

$('body').on('click', '.adds', function add() 
{
    /* Act on the event */

    var num = $(this).attr('data-num');
    var $rooms = $("#noOfRoom" + num);
    var a = $rooms.val();
    
    a++;
    $("#subs").prop("disabled", !a);
    $rooms.val(a);
});
$(".subs").prop("disabled", !$("#noOfRoom").val());

$('body').on('click', '.subs', function subst() 
{
    var num = $(this).attr('data-num');
    var $rooms = $("#noOfRoom" + num);
    var b = $rooms.val();
    if (b >= 1) {
        b--;
        $rooms.val(b);
    }
    else {
        $("#subs").prop("disabled", true);
    }
});


//remove item from cart
$('body').on('click', '#clear', function(event) 
  {
    event.preventDefault();
    /* Act on the event */
    
    $.ajax({
            url: '<?php bs('Cart/clear_cart')?>',
            })
    .done(function(response) 
    {
        update_cart();
        success_alert('Cart is Successfully Clear');
    });

  });

//remove item from cart
$('body').on('click', '#coupon', function(event) 
  {
    event.preventDefault();
    /* Act on the event */
    
    var coupon = $('#coupon_code').val();

    if(coupon == '') 
    {
      $('#required').text('Coupon Code is Required');
      return false;
    }

    $('#required').remove();

    var myarray = []; //  new Array()

    $('input[name^="product_id"]').each(function() 
    {
        myarray.push($(this).val());
    });

    $.ajax({
                url: '<?php bs('Cart/apply_coupon')?>',
                type: 'POST',
                dataType : 'JSON',
                data: {coupon:coupon,pro_id:myarray},
            })
    .done(function(response) 
    {
        if (response.failed == 'failed')
        {
            error_alert(response.msg); 
        }
        else
        {
            $("tr").removeClass("hide");
            $('#dis_val').text(response.dis_value);
            $('#per_val').text(response.per_value);

            success_alert('Your Coupon is Successfully Applied to Cart'); 
        }
    });

  });   

/*Cart page Ends*/


/*Product page script */

$('body').on('click', '.single_add_to_cart_button', function(event) 
{
  event.preventDefault();
  /* Act on the event */

  var form_data = $('.cart').serialize();
  var qty       = $("input[name=qty]").val();

  if (qty != "" && qty > 0)
  {
    $.ajax({
            url: '<?php bs('Cart/single_product_add_to_cart')?>',
            type: 'POST',
            data: form_data,
            beforeSend: function()
            {
            // Show image container
              $("#loader").delay(5000).show();
           },
           success: function(response)
           {
              if (response == 'max_qty')
              {
                error_alert("The Inserted Quantity is Greater than Stock Quantity");
              }
              else if(response == 'already_exist')
              {
                error_alert("This Item Already Exist in Cart"); 
              }
              else
              {
                $('.shopping_cart').html(response);
                update_cart();
                success_alert('Item Added Successfully to Cart');
              }
           },
           complete:function(data)
           {
              // Hide image container
              $("#loader").delay(800).hide();
           }
        });
  }
  else
  {
    error_alert('Product Quantity must be greater than ZERO');
  }

});

/*Product page script Ends */

/*Update Cart script Start */

$('body').on('click', '.update_cart', function(event) 
{
  event.preventDefault();
  /* Act on the event */
  $(".submit_cart").submit();

});

/*Update Cart script Ends */


/* Quick View */

$("body").on('click','#qick_view',function(event) 
{
    event.preventDefault();
    // body...

    var id = $(this).attr('data-qick-view');

    $.ajax({
        url : "<?php bs('Products/quick_view') ?>/"+id,
        
        success :function (success) 
        {
          $("i").removeClass("fa-spinner fa-spin");

          $("i").addClass('fa fa-search');

          var obj = $.parseJSON(success);

          jQuery('.first_img').html('');

          jQuery('.second_img').html('');

           // console.log();
          $.each(obj, function(key,val) 
          {
            $('.first_img').append('<div><a href="" itemprop="image" class="woocommerce-main-image" title="" data-rel="prettyPhoto[product-gallery]" data-index="0"><img width="600" height="200" src="'+val.url+'" class="attachment-shop_single size-shop_single" alt="" srcset="" sizes="(max-width: 600px) 100vw, 600px" /></a></div> '); 

            return false; //Equivalent to break;
            // console.log();            
                   
          }); 
          var dataHtml = '<div class="thumbnail-image">';
          $.each(obj, function(key,val) 
          {
            dataHtml += '<a href="#" itemprop="image" class="woocommerce-thumbnail-image" title="" data-index="0"><img width="180" height="180" src="'+val.url+'" class="attachment-shop_thumbnail size-shop_thumbnail" alt="" srcset="" sizes="(max-width: 180px) 100vw, 180px" /></a>';      
          });
          $('.second_img').append(dataHtml); 
          dataHtml += '</div>';
        }

    });
});

$('body').on('click', '#add_to_fav', function(event) 
{
  event.preventDefault();
  /* Act on the event */

  var product_id = $(this).attr('data-product-id');

  $.ajax({
    url: '<?php bs() ?>Products/add_wishlist/'+product_id,
    type: 'post',

  })
  .done(function(response) 
  {
      if (response == 'not_loign')
      {
        error_alert("Please Login to Add this Item to WishList");
      }
      else if(response == 'already_in_wishlist')
      {
        error_alert("This Item Already Exists in Your WishList"); 
      }
      else if(response == 'successfull_added')
      {
        success_alert("This Item Added to Your WishList"); 
      }
      else
      {
        error_alert("This is System error"); 
      }
  })
  

});

// Notification Script

function success_alert(msg) 
{
  // body...
  $.notify({
      
      icon: '',
      title: '<b><i class="fa fa-exclamation-circle"></i> Notification</b><br>',
      message: msg,
  },
  {
      
      
      type: "success success-noty col-md-3",
      allow_dismiss: true,
      placement: {
          from: "top",
          align: "right"
      },
      offset: 20,
      spacing: 10,
      z_index: 1431,
      delay: 5000,
      timer: 1000,
      animate: {
          enter: 'animated bounceInDown',
          exit: 'animated bounceOutUp'
      }
  });
}

function error_alert(msg) 
{
  $.notify({
          
          icon: '',
          title: '<b><i class="fa fa-info-circle"></i> Notification</b><br>',
          message: msg,
      },{
          type: "danger error-noty col-md-3",
          allow_dismiss: true,
          placement: {
              from: "top",
              align: "right"
          },
          offset: 20,
          spacing: 10,
          z_index: 1431,
          delay: 5000,
          timer: 1000,
          animate: {
              enter: 'animated fadeInDown',
              exit: 'animated fadeOutUp'
          }
      });
}
 
</script>


<script type="text/javascript">
    $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").show(1000);
            } else {
                $("#dvPassport").hide(1000);
            }
        });
    });
</script>

<script type="text/javascript">
$(document).ready(function () {

    $('#id_radio1').click(function () {
        $('#div2').hide(500);
        $('.card-payment').show(500);

    });
    $('#id_radio2').click(function () {
        $('.card-payment').hide(500);
        $('#div2').show(500);
    });
});
</script>

<script>
<?php

  if (!empty($this->session->flashdata('success_msg')))
   {
?>
 $.notify({
      
      icon: '',
      title: '<b><i class="fa fa-exclamation-circle"></i> Notification</b><br>',
      message: '<?php echo $this->session->flashdata('success_msg') ?>',
  },
  {
      
      
      type: "success success-noty col-md-3",
      allow_dismiss: true,
      placement: {
          from: "top",
          align: "right"
      },
      offset: 20,
      spacing: 10,
      z_index: 1431,
      delay: 5000,
      timer: 1000,
      animate: {
          enter: 'animated bounceInDown',
          exit: 'animated bounceOutUp'
      }
  });
<?php

  } 
  if (!empty($this->session->flashdata('error_msg')))
   {
?>
 $.notify({
          
          icon: '',
          title: '<b><i class="fa fa-info-circle"></i> Notification</b><br>',
          message: "<?php echo $this->session->flashdata('error_msg') ?>",
      },{
          
          
          type: "danger error-noty col-md-3",
          allow_dismiss: true,
          placement: {
              from: "top",
              align: "right"
          },
          offset: 20,
          spacing: 10,
          z_index: 1431,
          delay: 5000,
          timer: 1000,
          animate: {
              enter: 'animated fadeInDown',
              exit: 'animated fadeOutUp'
          }
      });
 <?php            
   }
  ?>

</script>

<!-- PayPal payment process -->

<!-- PayPal Form Validation -->

<script>
function cardFormValidate(){
    var cardValid = 0;
      
    //card number validation
    $('#card_number').validateCreditCard(function(result) {
        var cardType = (result.card_type == null)?'':result.card_type.name;
        if(cardType == 'Visa'){
            var backPosition = result.valid?'2px -163px, 260px -87px':'2px -163px, 260px -61px';
        }else if(cardType == 'MasterCard'){
            var backPosition = result.valid?'2px -247px, 260px -87px':'2px -247px, 260px -61px';
        }else if(cardType == 'Maestro'){
            var backPosition = result.valid?'2px -289px, 260px -87px':'2px -289px, 260px -61px';
        }else if(cardType == 'Discover'){
            var backPosition = result.valid?'2px -331px, 260px -87px':'2px -331px, 260px -61px';
        }else if(cardType == 'Amex'){
            var backPosition = result.valid?'2px -121px, 260px -87px':'2px -121px, 260px -61px';
        }else{
            var backPosition = result.valid?'2px -121px, 260px -87px':'2px -121px, 260px -61px';
        }
        $('#card_number').css("background-position", backPosition);
        if(result.valid){
            $("#card_type").val(cardType);
            $("#card_number").removeClass('required');
            cardValid = 1;
        }else{
            $("#card_type").val('');
            $("#card_number").addClass('required');
            cardValid = 0;
        }
    });
      
    //card details validation
    var cardName = $("#name_on_card").val();
    var expMonth = $("#expiry_month").val();
    var expYear = $("#expiry_year").val();
    var cvv = $("#cvv").val();
    var regName = /^[a-z ,.'-]+$/i;
    var regMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
    var regYear = /^2017|2018|2019|2020|2021|2022|2023|2024|2025|2026|2027|2028|2029|2030|2031$/;
    var regCVV = /^[0-9]{3,3}$/;
    if(cardValid == 0){
        $("#card_number").addClass('required');
        // $("#card_number").focus();
        return false;
    }else if(!regMonth.test(expMonth)){
        $("#card_number").removeClass('required');
        $("#expiry_month").addClass('required');
        $("#expiry_month").focus();
        return false;
    }else if(!regYear.test(expYear)){
        $("#card_number").removeClass('required');
        $("#expiry_month").removeClass('required');
        $("#expiry_year").addClass('required');
        $("#expiry_year").focus();
        return false;
    }else if(!regCVV.test(cvv)){
        $("#card_number").removeClass('required');
        $("#expiry_month").removeClass('required');
        $("#expiry_year").removeClass('required');
        $("#cvv").addClass('required');
        $("#cvv").focus();
        return false;
    }else if(!regName.test(cardName)){
        $("#card_number").removeClass('required');
        $("#expiry_month").removeClass('required');
        $("#expiry_year").removeClass('required');
        $("#cvv").removeClass('required');
        $("#name_on_card").addClass('required');
        $("#name_on_card").focus();
        return false;
    }else{
        $("#card_number").removeClass('required');
        $("#expiry_month").removeClass('required');
        $("#expiry_year").removeClass('required');
        $("#cvv").removeClass('required');
        $("#name_on_card").removeClass('required');
        $('#cardSubmitBtn').prop('disabled', false);  
        return true;
    }
}
    
$(document).ready(function(){
    //initiate validation on input fields
    $('#paymentForm input[type=text]').on('keyup',function()
    {
        cardFormValidate();
    });
    
    //submit card form
    $("#cardSubmitBtn").on('click',function()
    {
        
        if (cardFormValidate()) 
        {
            var formData = $('#paymentForm').serialize();
           
            $.ajax({
                type:'POST',
                url:'<?php bs() ?>Cart/paypal_transaction',
                dataType: "json",
                data:formData,
                beforeSend: function(){  
                    $("#cardSubmitBtn").val('Processing....');
                },
                success:function(data)
                {
                    if (data == 'not_login') 
                    {
                        error_alert("Please Login to Continue");
                        $("#cardSubmitBtn").val('Proceed');
                    }
                    else if(data.status == 1)
                    {
                        // $('#orderInfo').html('<p>The transaction was successful. Order ID: <span>'+data.orderID+'</span></p>');
                        // $('#paymentSection').slideUp('slow');
                        // $('#orderInfo').slideDown('slow');
                        // location.reload();

                        // similar behavior as clicking on a link
                        window.location.href = "<?php bs() ?>";
                        success_alert("Your Transaction Completed Successfully");
                    }
                    else{
                        $('#orderInfo').html('<p>Transaction has been failed, please try again.</p>');
                        $('#paymentSection').slideUp('slow');
                        $('#orderInfo').slideDown('slow');
                    }
                }
            });
        }
    });
});
</script>