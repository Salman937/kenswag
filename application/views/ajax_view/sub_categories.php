<select class="form-control input-color" name="sub_cat" required>
	<option value="">Choose Sub Category</option>

	<?php foreach ($sub_cat as $value): ?>

		<option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>

	<?php endforeach ?>
</select>
<br>
