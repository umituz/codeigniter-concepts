<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			<b><?php echo $gallery->title; ?></b> galerisine ait videolar <a href="<?php echo base_url("gallery/new_gallery_video_form/{$gallery->id}"); ?>" class="btn btn-outline btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Yeni Ekle</a>
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget p-lg">
			<?php if(empty($items)){ ?> 
				<div class="alert alert-info text-center">
					<p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("gallery/new_gallery_video_form/{$gallery->id}"); ?>">tıklayınız</a></p>
				</div>
			<?php } else { ?>

				<table class="table table-hover table-striped table-bordered content-container">
					<thead>
						<th class="order"><i class="fa fa-reorder"></i></th>
						<th class="w50">#id</th>
						<th>Link</th>
						<th>Görsel</th>
						<th>Durumu</th>
						<th class="w180">İşlem</th>
					</thead>
					<tbody class="sortable" data-url="<?php echo base_url("gallery/rankGalleryVideoSetter"); ?>">
						<?php foreach($items as $item){ ?>
							<tr id="order-<?php echo $item->id  ?>">
							<td class="order"><i class="fa fa-reorder"></i></td>
							<td class="text-center"><?php echo $item->id ?></td>
							<td class="w200"><?php echo $item->url ?></td>
							<td class="text-center">
								<iframe width="200" src="<?php echo $item->url; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>	
							</td>
							<td class="w50">
								<input
								data-url="<?php echo base_url("gallery/galleryVideoIsActiveSetter/{$item->id}"); ?>"
								class="isActive" 
								type="checkbox" 
								data-switchery 
								data-color="#10c469" 
								<?php echo ($item->isActive == 1) ? 'checked' : null; ?> />
							</td>
							<td>
								<button data-url="<?php echo base_url("gallery/galleryVideoDelete/{$item->id}/{$gallery->id}"); ?>" class="btn btn-outline btn-sm btn-danger remove-sweetalert">
									<i class="fa fa-trash"></i> Sil
								</button>
								<a href="<?php echo base_url("gallery/update_gallery_video_form/{$item->id}"); ?>" class="btn btn-outline btn-sm btn-purple">
									<i class="fa fa-pencil-square-o"></i> Düzenle
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