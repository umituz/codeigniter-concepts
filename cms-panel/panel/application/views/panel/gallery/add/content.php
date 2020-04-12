<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Yeni Galeri Ekle
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">

			<div class="widget-body">
				
				<form action="<?php echo base_url('gallery/save'); ?>" method="post">
					<div class="form-group">
						<label>Galeri Adı</label>
						<input type="text" class="form-control" name="title" placeholder="Galeri Adı Giriniz">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("title"); ?></small>	
						<?php } ?>
					</div>
					
					<div class="form-group">
						<label>Galeri Türü</label>
						<div>
							<select class="form-control news_type_select_container" name="gallery_type">
								<option <?php echo (isset($gallery_type) && $gallery_type == "image") ? "selected" : null; ?> value="image">Resim</option>
								<option <?php echo (isset($gallery_type) && $gallery_type == "video") ? "selected" : null; ?> value="video">Video</option>
								<option <?php echo (isset($gallery_type) && $gallery_type == "file") ? "selected" : null; ?> value="file">Dosya</option>
							</select>
						</div>
					</div>					
					
					<button type="submit" class="btn btn-success btn-md btn-outline"><i class="fa fa-check"></i> Kaydet</button>
					<a href="<?php echo base_url('gallery'); ?>" class="btn btn-danger btn-outline"><i class="fa fa-undo"></i> Geri</a>
				</form>
			</div><!-- .widget-body -->
		</div>
	</div>
</div>