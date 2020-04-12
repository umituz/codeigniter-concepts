<div role="tabpanel" class="tab-pane fade" id="tab-5">
	
	<div class="form-group">
		<label>E-posta Adresiniz</label>
		<input type="text" class="form-control" name="email" value="<?php echo isset($form_error) ? set_value("email") : $item->email ?>" placeholder="Şirketinize Ait E-posta Adresini Giriniz">
		<?php if(isset($form_error) && $form_error == true){ ?>
			<small class="pull-right input-form-error"><?php echo form_error("email"); ?></small>	
		<?php } ?>
	</div>

	<div class="row">
		<div class="form-group col-md-6">
			<label>Facebook</label>
			<input type="text" class="form-control" name="facebook" value="<?php echo isset($form_error) ? set_value("facebook") : $item->facebook ?>" placeholder="Facebook Adresini Giriniz">
			
		</div>

		<div class="form-group col-md-6">
			<label>Twitter</label>
			<input type="text" class="form-control" name="twitter" value="<?php echo isset($form_error) ? set_value("twitter") : $item->twitter ?>" placeholder="Twitter Adresini Giriniz">
			
		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-6">
			<label>Instagram</label>
			<input type="text" class="form-control" name="instagram" value="<?php echo isset($form_error) ? set_value("instagram") : $item->instagram ?>" placeholder="Instagram Adresini Giriniz">
			
		</div>

		<div class="form-group col-md-6">
			<label>Linkedin</label>
			<input type="text" class="form-control" name="linkedin" value="<?php echo isset($form_error) ? set_value("linkedin") : $item->linkedin ?>" placeholder="Linkedin Adresini Giriniz">
			
		</div>
	</div>
</div>