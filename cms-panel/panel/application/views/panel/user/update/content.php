<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			<?php echo "<b>{$item->user_name}</b> kaydı düzenliyorsunuz" ?> 
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">

			<div class="widget-body">
				
				<form action="<?php echo base_url("user/update/{$item->id}"); ?>" method="post">
					<div class="form-group">
						<label>Kullanıcı Adı</label>
						<input type="text" class="form-control" name="user_name" value="<?php echo isset($form_error) ? set_value("user_name") : $item->user_name ?>" placeholder="Kullanıcı Adı Giriniz">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("user_name"); ?></small>	
						<?php } ?>
					</div>

					<div class="form-group">
						<label>Ad Soyad</label>
						<input type="text" class="form-control" value="<?php echo isset($form_error) ? set_value("full_name") : $item->full_name ?>" name="full_name" placeholder="Ad Soyad Giriniz">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("full_name"); ?></small>	
						<?php } ?>
					</div>

					<div class="form-group">
						<label>E-posta Adresi</label>
						<input type="text" class="form-control" value="<?php echo isset($form_error) ? set_value("email") : $item->email ?>" name="email" placeholder="E-posta Giriniz">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("email"); ?></small>	
						<?php } ?>
					</div>

					
					
					
					
					<button type="submit" class="btn btn-primary btn-md btn-outline"><i class="fa fa-check"></i> Güncelle</button>
					<a href="<?php echo base_url('user'); ?>" class="btn btn-danger btn-outline"><i class="fa fa-undo"></i> Geri</a>
				</form>
			</div><!-- .widget-body -->
		</div>
	</div>
</div>