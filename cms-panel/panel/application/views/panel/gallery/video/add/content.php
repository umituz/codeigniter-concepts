<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Yeni Video Ekle
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">

			<div class="widget-body">
				
				<form action="<?php echo base_url("gallery/gallery_video_save/{$gallery_id}"); ?>" method="post">
					<div class="form-group">
						<label>Video Link</label>
						<input type="text" class="form-control" name="url" value="https://www.youtube.com/embed/" placeholder="Video Bağlantısını Buraya Yapıştırınız">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("url"); ?></small>
						<?php } ?>
					</div>			
					
					<button type="submit" class="btn btn-success btn-md btn-outline"><i class="fa fa-check"></i> Kaydet</button>
					<a href="<?php echo base_url("gallery/gallery_video_list/{$gallery_id}"); ?>" class="btn btn-danger btn-outline"><i class="fa fa-undo"></i> Geri</a>
				</form>
			</div><!-- .widget-body -->
		</div>
	</div>
</div>