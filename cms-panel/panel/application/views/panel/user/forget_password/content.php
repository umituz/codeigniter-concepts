<div class="simple-page-wrap">
	<div class="simple-page-logo animated swing">
		<a href="index.html">
			<span><i class="fa fa-gg"></i></span>
			<span>ÜmitUZ</span>
		</a>
	</div>
	<div class="simple-page-form animated flipInY" id="reset-password-form">
		<h4 class="form-title m-b-xl text-center">Şifrenizi Mi Unuttunuz ?</h4>

		<form action="<?php echo base_url("reset-password"); ?>" method="post">
			<div class="form-group">
				<input 
				type="email" 
				class="form-control" 
				name="email" 
				placeholder="E-mail Adresinizi Giriniz"
				value="<?php echo isset($form_error) ? set_value('email') : '' ?>" 
				>
				<?php if(isset($form_error) && $form_error == true){ ?>
					<small class="pull-right input-form-error"><?php echo form_error("email"); ?></small>	
				<?php } ?>
			</div>
			<input type="submit" class="btn btn-primary" value="Şifremi Sıfırla">
		</form>
	</div>

</div>