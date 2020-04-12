<div class="simple-page-wrap">
	<div class="simple-page-logo animated swing">
		<a href="index.html">
			<span><i class="fa fa-gg"></i></span>
			<span>ÜmitUZ</span>
		</a>
	</div>
	<div class="simple-page-form animated flipInY" id="login-form">
		<h4 class="form-title m-b-xl text-center">Bilgilerinizle Sisteme Giriş Yapın</h4>
		<form action="<?php echo base_url("useroperation/do_login"); ?>" method="post">
			<div class="form-group">
				<input id="sign-in-email" type="email" class="form-control" placeholder="Mail Adresi" name="user_email">
				<?php if(isset($form_error) && $form_error == true){ ?>
					<small class="pull-right input-form-error"><?php echo form_error("user_email"); ?></small>	
				<?php } ?>
			</div>

			<div class="form-group">
				<input id="sign-in-password" type="password" class="form-control" placeholder="Şifre" name="user_password">
				<?php if(isset($form_error) && $form_error == true){ ?>
					<small class="pull-right input-form-error"><?php echo form_error("user_password"); ?></small>
				<?php } ?>
			</div>

			<input type="submit" class="btn btn-primary" value="Giriş Yap">
		</form>
	</div>
<!--
	<div class="simple-page-footer">
		<p><a href="<?php echo base_url("sifremi-unuttum"); ?>">Şifremi Unuttum</a></p>

	</div>
-->
	</div>