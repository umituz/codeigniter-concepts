<div role="tabpanel" class="tab-pane in active fade" id="tab-1">
	<div class="form-group">
		<label>Şirket Adı</label>
		<input type="text" class="form-control" name="company_name" value="<?php echo isset($form_error) ? set_value("company_name") : '' ?>" placeholder="Şirket Adı ya da Site Adı Giriniz">
		<?php if(isset($form_error) && $form_error == true){ ?>
			<small class="pull-right input-form-error"><?php echo form_error("company_name"); ?></small>	
		<?php } ?>
	</div>

	<div class="row">
		<div class="form-group col-md-6">
			<label>Telefon 1</label>
			<input type="text" class="form-control" name="phone_1" value="<?php echo isset($form_error) ? set_value("phone_1") : '' ?>" placeholder="Telefon 1 Giriniz">
			<?php if(isset($form_error) && $form_error == true){ ?>
				<small class="pull-right input-form-error"><?php echo form_error("phone_1"); ?></small>	
			<?php } ?>
		</div>

		<div class="form-group col-md-6">
			<label>Telefon 2 (Opsiyonel)</label>
			<input type="text" class="form-control" name="phone_2" placeholder="Telefon 2 Giriniz">
			
		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-6">
			<label>Faks 1</label>
			<input type="text" class="form-control" name="fax_1" placeholder="Faks 1 Giriniz">
			
		</div>

		<div class="form-group col-md-6">
			<label>Faks 2 (Opsiyonel)</label>
			<input type="text" class="form-control" name="fax_2" placeholder="Faks 2 Giriniz">
			
		</div>
	</div>
</div>