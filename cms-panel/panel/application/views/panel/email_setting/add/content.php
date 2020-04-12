<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Yeni E-posta Ekle
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">

			<div class="widget-body">
				
				<form action="<?php echo base_url('emailsetting/save'); ?>" method="post">
					
					<div class="form-group">
						<label>Protokol</label>
						<input type="text" class="form-control" name="protocol" value="<?php echo isset($form_error) ? set_value("protocol") : '' ?>" placeholder="Protokol Giriniz">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("protocol"); ?></small>	
						<?php } ?>
					</div>

					<div class="form-group">
						<label>E-posta Sunucu Bilgisi</label>
						<input type="text" class="form-control" value="<?php echo isset($form_error) ? set_value("host") : '' ?>" name="host" placeholder="E-posta Sunucu Adını Giriniz">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("host"); ?></small>	
						<?php } ?>
					</div>

					<div class="form-group">
						<label>Port Numarası</label>
						<input type="text" class="form-control" value="<?php echo isset($form_error) ? set_value("port") : '' ?>" name="port" placeholder="Port Numarasını Giriniz">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("port"); ?></small>	
						<?php } ?>
					</div>

					<div class="form-group">
						<label>E-posta Adresi</label>
						<input type="email" class="form-control" value="<?php echo isset($form_error) ? set_value("user") : '' ?>" name="user" placeholder="Port Numarasını Giriniz">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("user"); ?></small>	
						<?php } ?>
					</div>

					<div class="form-group">
						<label>E-posta Adresine Ait Şifre</label>
						<input type="password" class="form-control" name="password" placeholder="Şifre Giriniz">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("password"); ?></small>	
						<?php } ?>
					</div>

					<div class="form-group">
						<label>Kimden Gidecek (from)</label>
						<input type="text" class="form-control" value="<?php echo isset($form_error) ? set_value("from") : '' ?>" name="from" placeholder="">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("from"); ?></small>	
						<?php } ?>
					</div>

					<div class="form-group">
						<label>Kime Gidecek (to)</label>
						<input type="text" class="form-control" value="<?php echo isset($form_error) ? set_value("to") : '' ?>" name="to" placeholder="">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("to"); ?></small>	
						<?php } ?>
					</div>

					<div class="form-group">
						<label>E-posta'da Gözükecek Başlık</label>
						<input type="text" class="form-control" value="<?php echo isset($form_error) ? set_value("user_name") : '' ?>" name="user_name" placeholder="E-posta Başlığını Giriniz">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("user_name"); ?></small>	
						<?php } ?>
					</div>
					
					<button type="submit" class="btn btn-success btn-md btn-outline"><i class="fa fa-check"></i> Kaydet</button>
					<a href="<?php echo base_url('emailsetting'); ?>" class="btn btn-danger btn-outline"><i class="fa fa-undo"></i> Geri</a>
				</form>
			</div>
		</div>
	</div>
</div>