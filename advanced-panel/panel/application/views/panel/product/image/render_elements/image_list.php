	<?php if(empty($item_images)){ ?> 
	<div class="alert alert-info text-center">
		<p>Burada herhangi bir resim bulunmamaktadır.</p>
	</div>
	<?php } else { ?>
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<th class="w100 text-center">#id</th>
			<th class="w100 text-center">Görsel</th>
			<th>Resim Adı</th>
			<th class="w100 text-center">Durumu</th>
			<th class="w100 text-center">Kapak</th>
			<th class="w100 text-center">İşlem</th>
		</thead>
		<tbody>
			<?php foreach($item_images as $image){ ?>
			<tr>
				<td class="text-center"><?php echo $image->id ?></td>
				<td>
					<img width="100" src="<?php echo base_url("uploads/{$viewFolder}/{$image->img_url}"); ?>" class="img-responsive"></img>
				</td>
				<td><?php echo $image->img_url ?></td>
				<td class="text-center">
					<input
					data-url="<?php echo base_url("product/imageIsActiveSetter/{$image->id}"); ?>"
					class="isActive" 
					type="checkbox" 
					data-switchery 
					data-color="#10c469" 
					<?php echo ($image->isActive == 1) ? 'checked' : null; ?>
					 />
				</td>
				<td class="text-center">
					<input
					data-url="<?php echo base_url("product/isCoverSetter/{$image->id}/{$image->product_id}"); ?>"
					class="isCover" 
					type="checkbox" 
					data-switchery 
					data-color="#ff5b5b" 
					<?php echo ($image->isCover == 1) ? 'checked' : null; ?>
					 />
				</td>
				<td class="text-center">
					<button data-url="<?php echo base_url("product/delete/1"); ?>" class="btn btn-outline btn-sm btn-danger btn-block remove-sweetalert">
						<i class="fa fa-trash"></i> Sil
					</button>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<?php } ?>