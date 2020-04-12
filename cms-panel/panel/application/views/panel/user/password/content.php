<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			<?php echo "<b>{$item->user_name}</b> kaydının şifresini düzenliyorsunuz" ?> 
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">

			<div class="widget-body">
				
				<form action="<?php echo base_url("user/update_password/{$item->id}"); ?>" method="post">
					
					<div class="form-group">
						<label>Şifre</label>
						<input type="password" class="form-control" name="password" placeholder="Şifre Giriniz">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("password"); ?></small>	
						<?php } ?>
					</div>

					<div class="form-group">
						<label>Şifre Tekrarı</label>
						<input type="password" class="form-control" name="re_password" placeholder="Şifre Tekrarı Giriniz">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("re_password"); ?></small>	
						<?php } ?>
					</div>					
					
					<button type="submit" class="btn btn-primary btn-md btn-outline"><i class="fa fa-check"></i> Güncelle</button>
					<a href="<?php echo base_url('user'); ?>" class="btn btn-danger btn-outline"><i class="fa fa-undo"></i> Geri</a>
				</form>
			</div><!-- .widget-body -->
		</div>
	</div>
</div>