<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Galeri Listesi <a href="<?php echo base_url('gallery/new_form'); ?>" class="btn btn-outline btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Yeni Ekle</a>
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget p-lg">
			<?php if(empty($items)){ ?> 
				<div class="alert alert-info text-center">
					<p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url('gallery/new_form'); ?>">tıklayınız</a></p>
				</div>
			<?php } else { ?>

				<table class="table table-hover table-striped table-bordered content-container">
					<thead>
						<th class="order"><i class="fa fa-reorder"></i></th>
						<th class="w50">#id</th>
						<th>Galeri Adı</th>
						<th>Galeri Türü</th>
						<th>Klasör Adı</th>
						<th>Durumu</th>
						<th class="w180">İşlem</th>
					</thead>
					<tbody class="sortable" data-url="<?php echo base_url("gallery/rankSetter"); ?>">
						<?php foreach($items as $item){ ?>
							<tr id="order-<?php echo $item->id  ?>">
							<td class="order"><i class="fa fa-reorder"></i></td>
							<td class="text-center"><?php echo $item->id ?></td>
							<td class="text-center w100"><?php echo $item->title ?></td>
							<?php
							 if($item->gallery_type == "image"){
							 	$button_icon = "fa-image";
							 	$button_url  = "gallery/upload_form/{$item->id}";
							 }
							 else if($item->gallery_type == "video")
							 {
							 	$button_icon = "fa-play-circle";
							 	$button_url  = "gallery/gallery_video_list/{$item->id}";
							 }
							 else if($item->gallery_type == "file")
							 {
							 	$button_icon = "fa-folder";
							 	$button_url  = "gallery/upload_form/{$item->id}";
							 }
							?>
							<td class="text-center w50"><i class="fa <?php echo $button_icon; ?>"></i></td>
							<td class="text-center w100"><?php echo $item->folder_name ?></td>
							<td class="w50">
								<input
								data-url="<?php echo base_url("gallery/isActiveSetter/{$item->id}"); ?>"
								class="isActive" 
								type="checkbox" 
								data-switchery 
								data-color="#10c469" 
								<?php echo ($item->isActive == 1) ? 'checked' : null; ?> />
							</td>
							<td class="w200">
								<button data-url="<?php echo base_url("gallery/delete/{$item->id}"); ?>" class="btn btn-outline btn-sm btn-danger remove-sweetalert">
									<i class="fa fa-trash"></i> Sil
								</button>
								

								<a href="<?php echo base_url("gallery/update_form/{$item->id}"); ?>" class="btn btn-outline btn-sm btn-purple">
									<i class="fa fa-pencil-square-o"></i> Düzenle
								</a>
								
								<a href="<?php echo base_url($button_url); ?>" class="btn btn-outline btn-sm btn-dark">
									<i class="fa fa-eye"></i> Galeriye Gözat
								</a>
							</td>
						</tr>
					  <?php } ?>
					</tbody>
				</table>

			<?php } ?>
		</div>
	</div>
</div>