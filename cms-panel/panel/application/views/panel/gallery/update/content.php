<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			<?php echo "<b>{$item->title}</b> kaydı düzenliyorsunuz" ?> 
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">

			<div class="widget-body">
				
				<form action="<?php echo base_url("gallery/update/{$item->id}/{$item->gallery_type}/{$item->folder_name}"); ?>" method="post">
					<div class="form-group">
						<label>Galeri Adı</label>
						<input type="text" class="form-control" name="title" value="<?php echo $item->title; ?>">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("title"); ?></small>	
						<?php } ?>
					</div>			
					
					<button type="submit" class="btn btn-primary btn-md btn-outline"><i class="fa fa-pencil	"></i> Güncelle</button>
					<a href="<?php echo base_url('gallery'); ?>" class="btn btn-danger btn-outline"><i class="fa fa-undo"></i> Geri</a>
				</form>
			</div><!-- .widget-body -->
		</div>
	</div>
</div>