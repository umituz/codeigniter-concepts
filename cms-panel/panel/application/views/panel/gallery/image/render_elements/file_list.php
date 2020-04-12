<?php if(empty($items)){ ?> 
<div class="alert alert-info text-center">
	<p>Burada herhangi bir dosya bulunmamaktadır.</p>
</div>
<?php } else { ?>
<table class="table table-bordered table-striped table-hover">
	<thead>
		<th class="order"><i class="fa fa-reorder"></i></th>
		<th class="w50 text-center">#id</th>
		<th class="w100 text-center">Görsel</th>
		<th>Dosya Yolu/Adı</th>
		<th class="w100 text-center">Durumu</th>
		<th class="w100 text-center">İşlem</th>
	</thead>
	<tbody class="sortable" data-url="<?php echo base_url("gallery/fileRankSetter/{$gallery_type}"); ?>">
		<?php foreach($items as $item){ ?>
		<tr id="order-<?php echo $item->id  ?>">
			<td class="order"><i class="fa fa-reorder"></i></td>
			<td class="text-center"><?php echo $item->id ?></td>
			<td class="text-center">
				<?php if($gallery_type == "image"){ ?>
					<img 
					width="100" 
					src="<?php echo get_picture("gallery/image/$folder_name",$item->url,"252x156"); ?>" 
					class="img-responsive" />
				<?php }else{ ?>
					<i class="fa fa-folder fa-2x"></i>
				<?php } ?>
			</td>
			<td><?php echo $item->url ?></td>
			<td class="text-center">
				<input
				data-url="<?php echo base_url("gallery/fileIsActiveSetter/{$item->id}/{$gallery_type}"); ?>"
				class="isActive" 
				type="checkbox" 
				data-switchery 
				data-color="#10c469" 
				<?php echo ($item->isActive == 1) ? 'checked' : null; ?>
				 />
			</td>
			<td class="text-center">
				<button data-url="<?php echo base_url("gallery/fileDelete/{$item->id}/{$item->gallery_id}/{$gallery_type}"); ?>" class="btn btn-outline btn-sm btn-danger btn-block remove-sweetalert">
					<i class="fa fa-trash"></i> Sil
				</button>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php } ?>