<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Yeni Eğitim Ekle
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">

			<div class="widget-body">
				
				<form action="<?php echo base_url('course/save'); ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Başlık</label>
						<input type="text" class="form-control" name="title" placeholder="Eğitim Adı Giriniz">
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

					<div class="row">
						<div class="col-md-4">
							<label for="datetimepicker1">Eğitim Tarihi</label>
							<input type="hidden" name="event_date" id="datetimepicker1" data-plugin="datetimepicker" data-options="{ inline: true, viewMode: 'days', format:'YYYY-MM-DD HH:mm:ss' }"></div>
						</div>
					</div>
					
					<button type="submit" class="btn btn-success btn-md btn-outline"><i class="fa fa-check"></i> Kaydet</button>
					<a href="<?php echo base_url('course'); ?>" class="btn btn-danger btn-outline"><i class="fa fa-undo"></i> Geri</a>
				</form>
			</div><!-- .widget-body -->
		</div>
	</div>
</div>