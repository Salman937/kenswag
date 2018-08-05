	<div class="container">
		<hr>
	</div>
<section>
	<div class="container">
		<div class="row">
		  <form id="upload" action="<?php bs() ?>upload-product" method="post" enctype="multipart/form-data">
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-12">
						<label for="files" class="">
                        	<img src="<?php bs() ?>assets/images/placeholder_large.png" id="main_img" height="400" style="width: 100%">
                    	</label>
                    	<input id="files" name="img[]" type="file" class="main_img visible">
					</div>
				</div> 
				<br>
				<div class="row">
					<div class="col-md-12" style="">

						<div class="col-md-3 col-sm-6 col-xs-6">
							<label for="1st_img" class="">
								<img src="<?php bs() ?>assets/images/placeholder_small.png" id="first_img" width="100" height="100">
							</label>
							<input id="1st_img" name="img[]" type="file" class="1st_img visible">
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6">
							<label for="2nd_img" class="">
							<img src="<?php bs() ?>assets/images/placeholder_small.png" id="sec_img" width="100" height="100">
							</label>
							<input id="2nd_img" name="img[]" type="file" class="2nd_img visible">

						</div>
						<div class="col-md-3 col-sm-6 col-xs-6">
							<label for="3rd_img" class="">
							<img src="<?php bs() ?>assets/images/placeholder_small.png" id="thr_img" width="100" height="100">
							</label>
							<input id="3rd_img" name="img[]" type="file" class="3rd_img visible">

						</div>
						<div class="col-md-3 col-sm-6 col-xs-6">
							<label for="4th_img" class="">
								<img src="<?php bs() ?>assets/images/placeholder_small.png" id="fourth_img" width="100" height="100">
							</label>
							<input id="4th_img" name="img[]" type="file" class="4th_img visible">
						</div>

						
					</div>
				</div>
			</div>
			<div class="col-md-6 col-md-offset-1">
					<div class="form-group">
						<div class="col-xs-12">
							<input class="form-control input-color" name="post_title" type="text" placeholder="Post title" required>
							<br>
						</div>
						<div class="col-xs-12">
							<select class="form-control input-color" name="cateogry" id="cat" required>
							<option value="">Choose category</option>
								<?php foreach ($categories as $value): ?>

									<option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>

								<?php endforeach ?>
							</select>
							<br>
						</div>
						<div class="col-xs-12 sub_cat">
						</div>

						<div class="col-xs-12">
							<input class="form-control input-color" name="price" type="number" placeholder="Price" required>
							<br>
						</div> 
						
						<div class="col-xs-12">
							<textarea class="form-control input-color" name="desc" rows="4" id="comment" placeholder="Description" required></textarea>
							<br>
						</div>	 
						
						<div class="col-xs-6 ">
							<input class="form-control input-color" name="email" type="email" placeholder="Email" required><br>
						</div>
							<div class="col-xs-6">
							<input type="text" class="form-control input-color" name="loc" placeholder="Location" required>
						</div>
							<br>
						<div class="col-xs-12">
							<input class="form-control input-color" type="number" name="phone" placeholder="Phone Number" required>
							<br>
						</div>
						<div class="col-xs-12">
							<input class="form-control input-color" type="number" name="qty" placeholder="Quantity" required>
						</div>

						<div class="col-xs-6" style="margin-left: 20%;margin-top: 22px;">
							<button type="submit" class="btn btn-color btn-custom btn-block">Submit your post</button>
						</div> 
						
						</div>
					</form>	
				</div>
			</div>
		</div>
</section>

<script>

//getting sub categories
$('body').on('change', '#cat', function(event) 
{
	event.preventDefault();
	/* Act on the event */

	var id = $('#cat').val();

	$.ajax({
		url: '<?php bs() ?>Seller_dasboard/sub_categories',
		type: 'POST',
        data: {id:id},
	})
	.done(function(success) 
	{
		$('.sub_cat').html(success);
	})
	.fail(function() {
		console.log("error");
	})
});	

function readURL(input) 
{

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#main_img').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$(".main_img").change(function() 
{
  readURL(this);
});

function first_img(input) 
{

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#first_img').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$(".1st_img").change(function() 
{
  first_img(this);
});


function second_img(input) 
{

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#sec_img').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$(".2nd_img").change(function() 
{
  second_img(this);
});

function thr_img(input) 
{

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#thr_img').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$(".3rd_img").change(function() 
{
  thr_img(this);
});

function fourth_img(input) 
{

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#fourth_img').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$(".4th_img").change(function() 
{
  fourth_img(this);
});

</script>