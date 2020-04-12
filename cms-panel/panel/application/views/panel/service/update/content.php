<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			<?php echo "<b>{$item->title}</b> kaydı düzenliyorsunuz" ?> 
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">

			<div class="widget-body">
				
				<form action="<?php echo base_url("service/update/{$item->id}"); ?>" method="post" enctype="multipart/form-data">
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

					

					

					<div class="row ">
						<div class="col-md-1 image_upload_container">
							<img width="100" height="50" src="<?php echo get_picture($viewFolder,$item->img_url,"350x217"); ?>" alt="" class="img-responsive">
						</div>
						<div class="image_upload_container col-md-9 form-group " >
							<label>Görsel Seçiniz</label>
							<input type="file" name="img_url" class="form-control">
						</div>
					</div>
					
					
					
					<button type="submit" class="btn btn-primary btn-md btn-outline"><i class="fa fa-check"></i> Güncelle</button>
					<a href="<?php echo base_url('service'); ?>" class="btn btn-danger btn-outline"><i class="fa fa-undo"></i> Geri</a>
				</form>
			</div><!-- .widget-body -->
		</div>
	</div>
</div>