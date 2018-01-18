<div class="col-md-12"><hr style="height: 2px; background: #dec18c;"></div>
<div class="container">
   <div class="row">   
      <div class="col-sm-5 col-sm-offset-3">
            
            <h1 class="text-center" style="margin-bottom: 1em" >
                  <?php echo lang('change_password_heading');?>
            </h1>

            <?php echo form_open("auth/change_password", array('id' => 'change_pass'));?>

                  <p>
                        <?php echo lang('change_password_old_password_label', 'old_password');?> <br />
                        <?php echo form_input($old_password);?>
                  </p>

                  <p>
                        <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
                        <?php echo form_input($new_password);?>
                  </p>

                  <p>
                        <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
                        <?php echo form_input($new_password_confirm);?>
                  </p>

                  <?php echo form_input($user_id);?>
                  <p><?php echo form_submit('submit', lang('change_password_submit_btn'),"class='btn'");?></p>

            <?php echo form_close();?>
      </div>
      <div class="col-sm-4">
            <?php if (!empty($message)): ?> 
                              
            <div class="alert alert-danger" style="background-color:#ab2e2b;color :white;border:0px">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <br><span>
                        <?php echo $message; ?>
                  </span>
            </div>
            <?php endif; ?>
      </div>
   </div>   
</div>
