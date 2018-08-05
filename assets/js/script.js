// change password page validation
$("#change_pass").validate({
    rules: {
       new : {
                 minlength : 8
              },
      new_confirm: {
        minlength : 8,
        equalTo: "#new"
      }
    },
});

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
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
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
            $('.shopping_cart').html(response);
            update_cart();
        });
    }
    else
    {
      alert("This product is not available stock");
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
        });

  });

function update_cart() 
{
  $('.shopping_cart').load('<?php bs() ?>Cart/view_cart');
  $('.total_value_item').load('<?php bs() ?>Cart/update_itme_value');
    $('.cart_product_amount').load('<?php bs() ?>Cart/update_total_price');
}

