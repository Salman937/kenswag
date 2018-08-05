<style>
    /* Extra Small Devices, Phones */ 
@media only screen and (max-width : 480px) 
{
    .btn-custom
    {
        margin-top: 10px;
    }
}
</style>

<div class="container">
    <div class="row">

        <?php if (!empty($this->cart->contents())): ?>
            
            
        <div class="col-sm-12 col-md-10 col-md-offset-1">

            <!-- <button class="btn btn-sm btn-custom" id="clear" style=" border-radius: 0; background-color: #000000; color: white;"><i class="fa fa-times" aria-hidden="true"></i> 
            </button> -->

            
        <?php echo br(2) ?>    
        
        <form action="<?php bs() ?>cart/update_cart" method="post" accept-charset="utf-8" class="submit_cart">
            
        <div class="table-responsive">
            <table class="table table-hover" style="border:2px solid #ccc;">
                <thead>
                    <tr>
                        <th></th>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Sub Total</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                     $i = 1;

                     foreach ($this->cart->contents() as $items): ?>
                                
                        <tr>
                            
                            <td>
                                <a href="" title="">    
                                    <button type="button" data-product-rowid="<?php echo $items['rowid'] ?>" id="remove" class="btn">x</button>
                                </a>    
                            </td>
                            <td class="col-sm-1 col-md-2">
                            <div class="media">
                                <a class="thumbnail pull-left" href="#"> 
                                    <img class="media-object" src="<?php echo $items['options']['img'] ?>" style="width: 65px; height: 60px;"> 
                                </a>
                            </div>
                        </td>
                        <td class="col-sm-1 col-md-3">
                            <?php echo $items['name'],0,18   ?> 

                        </td>
                            <td class="col-sm-1 col-md-2" style="text-align: center">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-number subs" data-num="<?php echo $i; ?>"  data-type="minus" data-field="quant[2]">
                                            <span class="glyphicon glyphicon-minus"></span>
                                        </button>
                                    </span>
                                    <input type="text" name="qty[]" class="form-control input-number qty" value="<?php echo $items['qty'] ?>" min="1" id="noOfRoom<?php echo $i; ?>" max="100" style="height:35px;">

                                    <input type="hidden" name="id[]" value="<?php echo $items['rowid'] ?>">

                                    <input type="hidden" name="product_id[]" id="pro_id" value="<?php echo $items['id'] ?>">


                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-number adds" data-num="<?php echo $i; ?>" data-type="plus" data-field="quant[2]">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                    </span>
                                </div>
                            </td>

                            <td class="col-sm-1 col-md-2 text-center"><strong>$<?php echo $items['price'] ?></strong>
                            </td>

                            <td class="col-sm-1 col-md-3 text-center"><strong>$ <?php echo $this->cart->format_number($items['subtotal']) ?></strong></td>
                            
                        </tr>

                    <?php 
                        $i++;
                    endforeach; 
                    ?> 
                   
                </tbody>
            </table>
          </div>
        </div>
        <div class="row">
            <div class="col-md-11 col-md-offset-1 col-sm-12 col-xs-12">
                <div class="col-md-5 col-sm-5 col-xs-6">
                    <input type="text" class="form-control" name="coupon" id="coupon_code" placeholder="Enter Coupon" class="input" style="background-color: #dddddd;height: 46px">
                    <span id="required" style="color: red;margin-left: 18em"></span>
                    <br>
                    <button class="btn btn-custom" id="coupon" style="border-radius: 0px; background-color: #2dc2bb; color: white;">Apply Cuppon</button>
                </div>
                
                <div class="col-md-5 col-md-offset-2 col-sm-5 col-sm-offset-2 col-xs-6">
                    <button type="submit" class="btn update_cart btn-custom" style="border-radius: 0; background-color: black; color: white;">Update Cart</button>

                <a href="<?php bs() ?>checkout" title="">
                    <button class="btn btn-custom" style="border-radius: 0; background-color: #2dc2bb; color: white;">Proceed to checkout</button>
                </a>

                </div>
                

            </div>
        </div>
</form>

    </div>

</div>
<div class="container" style="margin-top: 4em;">
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <!-- <h2 class="text-center">Calulate Shipping</h2>
            <form action="/action_page.php" style="margin-top: 30px;">
                <div class="form-group">
                    
                    <select class="form-control" id="sel1" style="border-radius: 0; height: 42px; background-color: #f5f5f5;">
                        <option></option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
                <div class="form-group">
                    
                    <select class="form-control" id="sel1" style="border-radius: 0; height: 42px; background-color: #f5f5f5;">
                        <option></option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
                <div class="form-group">
                    
                    <input type="text" class="form-control" id="usr" style="border-radius: 0;">
                </div>
                
                <button type="submit" class="btn btn-default btn-block" style="background-color: #dec18c; border-radius: 0; height: 42px;">Submit</button>
            </form> -->
        </div>
        <div class="col-md-5">
            <h2 class="text-center">Cart Total</h2>
            <table class="table" style="margin-top: 30px;">
                
                <tbody>
                    <!-- <tr>
                        <td>Shipping</td>
                        <td><div class="radio">
                            <label><input type="radio" name="optradio" checked>Flat rate: $ 35.55</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="optradio">Free Shipping</label>
                        </div>

                       </td>
                    

                    </tr> -->
                    <tr>
                        <td>Total</td>
                        <td>$ <?php echo $this->cart->format_number($this->cart->total()) ?></td>
                    </tr>
                    <tr class="hide">
                        <td>Discount</td>
                        <td id="dis_val">%</td>
                    </tr>
                    <tr class="hide">
                        <td>After Discount</td>
                        <td id="per_val"></td>
                    </tr>
                </tbody>
            </table>
            
        </div>

        <?php else: ?>

            <div class="col-sm-5 col-sm-offset-5" style="margin-bottom: 2em">
                <table class="table table-hover" style="border:2px solid #ccc;">
                    <tbody>
                        <tr>
                            <ul class="cart_list product_list_widget ">
                                <li class="empty"><h4>An empty cart</h4><p>You have no item in your shopping cart</p>
                                </li>
                            </ul>
                        </tr>
                        <br>
                        <tr>
                            <a href="<?php bs() ?>" title="">
                                <button class="btn btn-custom" style="padding: 13px 25px;min-width: 140px; border-radius: 0; background-color: #2dc2bb; color: white;">Return to Shop</button>
                            </a>    
                        </tr>
                    </tbody>
                </table>
            </div>

        <?php endif ?>
        
    </div>
   