<style>

.card-payment {
    height: 476px;
    margin: 0 auto;
    position: relative;
    width: 100%;
}
h3 {
    font-size: 30px;
    line-height: 50px;
    margin: 0 0 28px;
   text-align: center;
}
ol, ul {
    list-style: outside none none;
}
ul, h4{
    border: 0 none;
    font: inherit;
    margin: 0;
    padding: 0;
    vertical-align: baseline;
}
.payment-form {
    float: none;
}
.payment-form, #orderInfo {
    background-color: #f9f9f7;
    border: 1px solid #fff;
    border-radius: 5px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
    left: 0;
    margin: 0 auto;
    padding: 10px 10px;
    max-width: 500px;
}
form li {
    margin: 8px 0;
}
form label {
    color: #555;
    display: block;
    font-size: 14px;
    font-weight: 400;
}
form #card_number {
    background-image: url("<?php bs() ?>assets/images/images.png"), url("<?php bs() ?>assets/images/images.png");
    background-position: 2px -121px, 260px -61px;
    background-repeat: no-repeat;
    background-size: 120px 361px, 120px 361px;
    padding-left: 54px;
    width: 400px;
}
form input {
    background-color: #fff;
    border: 1px solid #e5e5e5;
    box-sizing: content-box;
    color: #333;
    display: block;
    font-size: 18px;
    /*height: 32px;*/
    /*padding: 0 5px;*/
    /*width: 275px;*/
   outline: none;
}
form input::-moz-placeholder {
    color: #ddd;
    opacity: 1;
}
.payment-btn {
    width: 50%;
    height: 34px;
    padding: 0;
    font-weight: bold;
    color: white;
    text-align: center;
    cursor: pointer;
    text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.2);
    border: 1px solid;
    border-color: #005fb3;
    background: #0092d1;
    border-radius: 4px;
}
.payment-btn:disabled{opacity: 0.2;}
.vertical {
    overflow: hidden;
}
.vertical li {
    float: left;
    width: 95px;
}
.vertical input {
    width: 250px;
}
.required{border: 1px solid #EA4335;}
#orderInfo p span{color: #FB4314;}
   
</style>

<div id="wrapper-content" class="clearfix">
<div class="section-page-title page-title-margin container">
   <section class="page-title-wrap page-title-height page-title-wrap-bg page-title-center" style="background-image: url(../../../dev.g5plus.net/handmade/wp-content/themes/handmade/assets/images/bg-page-title.jpg)">
      <div class="page-title-overlay"></div>
      <div class="container">
         <div class="page-title-inner block-center">
            <div class="block-center-inner">
               <h1>Checkout</h1>
            </div>
         </div>
      </div>
   </section>
   <section class="breadcrumb-wrap s-color">
      <div class="container">
         <ul class="breadcrumbs">
            <li><a rel="v:url" href="<?php bs() ?>" class="home">Home</a></li>
            <li><span>cart</span></li>
            <li><span>checkout</span></li>
         </ul>
      </div>
   </section>
</div>
<main class="site-content-page">
   <div class="container clearfix">
      <div class="row clearfix">
         <div class="site-content-page-inner col-md-12">
            <div class="page-content">
               <div id="post-1572" class="post-1572 page type-page status-publish hentry">
                  <div class="entry-content">
                     <div class="woocommerce">
                        <!-- checkout -->
                        <div class="container">
                           <div class="col-md-12 col-sm-12">
                              <h2 class="text-center" style="margin-top: 2em;">Your Order</h2>
                              <table class="table table-condensed text-center">
                                 <thead >
                                    <th class="text-center">PRODUCT</th>
                                    <th class="text-center">QUANTITY</th>
                                    <th class="text-center">PRICE</th>
                                 </thead>
                                 <tbody>
                                 <?php foreach ($this->cart->contents() as $items): ?>
                                      
                                    <tr>
                                       <td><?php echo $items['name'],0,50;   ?></td>
                                       <td><?php echo $items['qty'] ?> ×</td>
                                       <td>$<?php echo $this->cart->format_number($items['price']); ?></td>
                                    </tr>
                                 <?php endforeach ?>  
                                    
                                    <!-- <tr>
                                       <td>Shipping</td>
                                       <td>
                                          <div class="radio">
                                             <label><input type="radio" name="optradio" checked>Flat rate: $ 35.55</label>
                                          </div>
                                          <div class="radio">
                                             <label><input type="radio" name="optradio">Free Shipping</label>
                                          </div>
                                       </td>
                                    </tr> -->
                                    <tr>
                                       <td><b>Total</b></td>
                                       <td colspan="2"><span class="text-center">$<?php echo $this->cart->format_number($this->cart->total()); ?></span></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <div class="container">
                           <div class="col-md-12 col-sm-12">
                              <button class="btn btn-block" style="padding: 10px 12px;
                                 border-radius: 0; background-color: #dec18c; "> 
                              <input id="id_radio1" type="radio" name="name_radio1" value="value_radio3" checked />&nbsp; Pay with PayPal </button>
                                 
                                 <div class="card-payment" style="margin-bottom: 34em">  

                                     <h3>Complete Your Transaction with Paypal</h3>
                                     <div id="paymentSection">
                                         <form method="post" class="payment-form" id="paymentForm">
                                            <h4 class="text-center">Payable amount: $<?php echo $this->cart->format_number($this->cart->total()); ?>  USD</h4>
                                             <ul>
                                                 <!-- <li>
                                                   <p style="background-color: #dec18c;border-radius: 5px;" class="text-center">Personal Info</p>
                                                 </li> -->
                                                 <li>
                                                     <label>First Name</label>
                                                     <input type="text" class="form-control" name="first_name" style="max-width: 92%">
                                                     <input type="hidden" name="total_amount" value="<?php echo $this->cart->format_number($this->cart->total()); ?>">
                                                 </li>
                                                 <li>
                                                     <label>Last Name</label>
                                                     <input type="text" class="form-control" name="last_name" style="max-width: 92%">
                                                 </li>
                                                 <li>
                                                     <label>Address</label>
                                                     <input type="text" class="form-control" name="address" style="max-width: 92%">
                                                 </li>
                                                 <li>
                                                     <label>Country</label>
                                                     <input type="text" class="form-control" name="country" style="max-width: 92%">
                                                 </li>
                                                 <li>
                                                     <label>State</label>
                                                     <input type="text" class="form-control" name="state" style="max-width: 92%">
                                                 </li>
                                                 <li>
                                                     <label>City</label>
                                                     <input type="text" class="form-control" name="city" style="max-width: 92%">
                                                 </li>
                                                 <!-- <li>
                                                     <label>Zip Code</label>
                                                     <input type="text" placeholder="Enter Zip Code" class="form-control" name="zip_code" style="max-width: 92%">
                                                 </li>
                                                 <li>
                                                     <label>Country Code</label>
                                                     <input type="text" placeholder="Enter Country Code" class="form-control" name="country_code" style="max-width: 92%">
                                                 </li> -->

                                                 <li>
                                                   <p style="background-color: #dec18c;border-radius: 5px;" class="text-center">Paypal Info</p>
                                                 </li>

                                                 <li>
                                                     <label for="card_number">Card number</label>
                                                     <input type="text" placeholder="1234 5678 9012 3456" id="card_number" name="card_number" style="max-width: 78%">
                                                 </li>
                                     
                                                 <li class="vertical">
                                                     <ul>
                                                         <li>
                                                             <label for="expiry_month">Expiry month</label>
                                                             <input type="text" placeholder="MM" maxlength="5" id="expiry_month" name="expiry_month">
                                                         </li>
                                                         <li>
                                                             <label for="expiry_year">Expiry year</label>
                                                             <input type="text" placeholder="YYYY" maxlength="5" id="expiry_year" name="expiry_year">
                                                         </li>
                                                         <li>
                                                             <label for="cvv">CVV</label>
                                                             <input type="text" placeholder="123" maxlength="3" id="cvv" name="cvv">
                                                         </li>
                                                     </ul>
                                                 </li>
                                                 <!-- <li>
                                                     <label for="name_on_card">Name on card</label>
                                                     <input type="text" placeholder="Card Name" id="name_on_card" name="name_on_card">
                                                 </li> -->
                                                 <li>
                                                     <input type="hidden" name="card_type" id="card_type" value=""/>
                                                     <input type="button" name="card_submit" id="cardSubmitBtn" value="Proceed" class="payment-btn" disabled="true" >
                                                 </li>
                                             </ul>
                                         </form>
                                     </div>
                                     <div id="orderInfo" style="display: none;"></div>
                                 </div>
                                 <br>
                              <button class="btn btn-block" style="padding: 10px 12px;
                                 border-radius: 0; background-color: #dec18c; ">
                              <input id="id_radio2" type="radio" name="name_radio1" value="value_radio2" />&nbsp; Pay with Credit Card</button>
                              <p id="div2" style="display: none;">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                              <br>
                              
                              <div class="text-center">
                                
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
