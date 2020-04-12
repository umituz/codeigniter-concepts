<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Resim Yükle
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">

			<div class="widget-body">
				
				<form data-url="<?php echo base_url("gallery/refresh_file_list/{$item->id}/{$item->gallery_type}/{$item->folder_name}"); ?>" action="<?php echo base_url("gallery/file_upload/{$item->id}/{$item->gallery_type}/{$item->folder_name}"); ?>" id="dropzone" class="dropzone" data-plugin="dropzone" data-options="{ url: '<?php echo base_url("gallery/file_upload/{$item->id}/{$item->gallery_type}/{$item->folder_name}"); ?>'}">
					<div class="dz-message">
						<h3 class="m-h-lg">Dosya Yükle</h3>
						<p class="m-b-lg text-muted">Yüklemek istediğiniz dosya veya dosyaları seçip yükleyebilirsiniz</p>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			<b><?php echo $item->title ?></b> kaydına ait veriler..
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">

			<div class="widget-body image_list_container">
				
				<?php $this->load->view("panel/{$viewFolder}/{$subViewFolder}/render_elements/file_list"); ?>

			</div>
		</div>
	</div>
</div>