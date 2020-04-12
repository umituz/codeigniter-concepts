<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			<b>Video</b> kaydı düzenliyorsunuz
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">

			<div class="widget-body">
				
				<form action="<?php echo base_url("gallery/update_gallery_video/{$item->id}/{$item->gallery_id}"); ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Video Link</label>
						<input type="text" class="form-control" name="url" value="<?php echo $item->url ?>" placeholder="Video Bağlantısını Buraya Yapıştırınız">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("url"); ?></small>
						<?php } ?>
					</div>
					
					
					<button type="submit" class="btn btn-primary btn-md btn-outline"><i class="fa fa-check"></i> Güncelle</button>
					<a href="<?php echo base_url("gallery/gallery_video_list/{$item->gallery_id}"); ?>" class="btn btn-danger btn-outline"><i class="fa fa-undo"></i> Geri</a>
				</form>
			</div><!-- .widget-body -->
		</div>
	</div>
</div>