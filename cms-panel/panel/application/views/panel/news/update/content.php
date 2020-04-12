<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			<?php echo "<b>{$item->title}</b> kaydı düzenliyorsunuz" ?> 
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">

			<div class="widget-body">
				
				<form action="<?php echo base_url("news/update/{$item->id}"); ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Başlık</label>
						<input type="text" class="form-control" name="title" value="<?php echo $item->title; ?>">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("title"); ?></small>	
						<?php } ?>
					</div>
					<div class="form-group">
						<label>Kısa Açıklama</label>
						<textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->description; ?></textarea>
					</div>

					<div class="form-group">
						<label>Haber Türü</label>
						<div>
							<?php if(isset($form_error)){ ?>
								<select class="form-control news_type_select_container" name="news_type">
									<option <?php echo ($news_type == "image") ? "selected" : null; ?> value="image">Resim
									</option>
									<option <?php echo ($news_type == "video") ? "selected" : null; ?> value="video">Video
									</option>
								</select>
							<?php }else{ ?>
								<select class="form-control news_type_select_container" name="news_type">
									<option <?php echo ($item->news_type == "image") ? "selected" : null; ?> value="image">Resim
									</option>
									<option <?php echo ($item->news_type == "video") ? "selected" : null; ?> value="video">Video
									</option>
								</select>
							<?php } ?>
						</div>
					</div>

					<?php if(isset($form_error)){ ?>
					<div class="form-group image_upload_container" style="display: <?php echo ($news_type == "image") ? "block" : "none"; ?>">
						<label>Görsel Seçiniz</label>
						<input type="file" name="img_url" class="form-control">
					</div>

					<div class="form-group video_url_container" style="display: <?php echo ($news_type == "video") ? "block" : "none"; ?>">
						<label>Video Link</label>
						<input type="text" class="form-control" name="video_url" placeholder="Video Bağlantısını Buraya Yapıştırınız">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("video_url"); ?></small>	
						<?php } ?>
					</div>
					<?php }else{ ?>

					<div class="row ">
						<div class="col-md-1 image_upload_container">
							<img width="100" height="50" src="<?php echo get_picture($viewFolder,$item->img_url,"513x289"); ?>" alt="" class="img-responsive">
						</div>
						<div class="image_upload_container col-md-9 form-group " style="display: <?php echo ($item->news_type == "image") ? "block" : "none"; ?>">
							<label>Görsel Seçiniz</label>
							<input type="file" name="img_url" class="form-control">
						</div>
					</div>

					<div class="form-group video_url_container" style="display: <?php echo ($item->news_type == "video") ? "block" : "none"; ?>">
						<label>Video Link</label>
						<input type="text" class="form-control" name="video_url" value="<?php echo $item->video_url ?>">
					</div>
					<?php } ?>
					
					
					<button type="submit" class="btn btn-primary btn-md btn-outline"><i class="fa fa-check"></i> Güncelle</button>
					<a href="<?php echo base_url('news'); ?>" class="btn btn-danger btn-outline"><i class="fa fa-undo"></i> Geri</a>
				</form>
			</div><!-- .widget-body -->
		</div>
	</div>
</div>