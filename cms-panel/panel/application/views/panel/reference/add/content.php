<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Yeni Referans Ekle
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">

			<div class="widget-body">
				
				<form action="<?php echo base_url('reference/save'); ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Başlık</label>
						<input type="text" class="form-control" name="title" placeholder="Referans Adı Giriniz">
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
					
					<button type="submit" class="btn btn-success btn-md btn-outline"><i class="fa fa-check"></i> Kaydet</button>
					<a href="<?php echo base_url('reference'); ?>" class="btn btn-danger btn-outline"><i class="fa fa-undo"></i> Geri</a>
				</form>
			</div><!-- .widget-body -->
		</div>
	</div>
</div>