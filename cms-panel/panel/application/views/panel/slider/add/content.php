	<div class="row">
		<div class="col-md-12">
			<h4 class="m-b-lg">
				Yeni Slayt Ekle
			</h4>
		</div>
		<div class="col-md-12">
			<div class="widget">

				<div class="widget-body">
					
					<form action="<?php echo base_url('slider/save'); ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Slayt Adı</label>
							<input type="text" class="form-control" name="title" placeholder="Slayt Adı Giriniz">
							<?php if(isset($form_error) && $form_error == true){ ?>
								<small class="pull-right input-form-error"><?php echo form_error("title"); ?></small>	
							<?php } ?>
						</div>
						<div class="form-group">
							<label>Kısa Açıklama</label>
							<textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
						</div>

						
						<div class="form-group image_upload_container">
							<label>Görsel Seçiniz</label>
							<input type="file" name="img_url" class="form-control">
						</div>

						<div class="form-group">
							<label >Buton Kullanımı</label><br>
							<input
							class="button_usage" 
							type="checkbox" 
							name="allowButton"
							data-switchery 
							data-color="#10c469" 
							/>
						</div>

						<div class="button-information-container">
							<div class="form-group">
								<label>Buton Başlığı</label>
								<input type="text" class="form-control" name="button_caption" placeholder="Butonun Üzerindeki Yazıyı Giriniz">
								<?php if(isset($form_error) && $form_error == true){ ?>
									<small class="pull-right input-form-error"><?php echo form_error("button_caption"); ?></small>	
								<?php } ?>
							</div>
							<div class="form-group">
								<label>URL Bilgisi</label>
								<input type="text" class="form-control" name="button_url" placeholder="URL Bilgisi(Butona basıldığında gidilecek link) Giriniz">
								<?php if(isset($form_error) && $form_error == true){ ?>
									<small class="pull-right input-form-error"><?php echo form_error("button_url"); ?></small>	
								<?php } ?>
							</div>
						</div>
						
						
						
						<button type="submit" class="btn btn-success btn-md btn-outline"><i class="fa fa-check"></i> Kaydet</button>
						<a href="<?php echo base_url('slider'); ?>" class="btn btn-danger btn-outline"><i class="fa fa-undo"></i> Geri</a>
					</form>
				</div><!-- .widget-body -->
			</div>
		</div>
	</div>