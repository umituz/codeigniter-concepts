<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Portfolyo Listesi <a href="<?php echo base_url('portfolio/new_form'); ?>" class="btn btn-outline btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Yeni Ekle</a>
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget p-lg">
			<?php if(empty($items)){ ?> 
				<div class="alert alert-info text-center">
					<p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url('portfolio/new_form'); ?>">tıklayınız</a></p>
				</div>
			<?php } else { ?>

				<table class="table table-hover table-striped table-bordered content-container">
					<thead>
						<th class="order"><i class="fa fa-reorder"></i></th>
						<th>Başlık</th>
						<th>Kategori</th>
						<th>Müşteri</th>
						<th>Bitiş Tarihi</th>
						<th>Durumu</th>
						<th>İşlem</th>
					</thead>
					<tbody class="sortable" data-url="<?php echo base_url("portfolio/rankSetter"); ?>">
						<?php foreach($items as $item){ ?>
							<tr id="order-<?php echo $item->id  ?>">
							<td class="order"><i class="fa fa-reorder"></i></td>
							<td class="w100 text-center"><?php echo $item->title ?></td>
							<td class="w100 text-center"><?php echo get_category_title($item->category_id); ?></td>
							<td class="w100 text-center"><?php echo $item->client ?></td>
							<td class="w100 text-center"><?php echo get_readable_date($item->finishedAt); ?></td>
							<td class="w50">
								<input
								data-url="<?php echo base_url("portfolio/isActiveSetter/{$item->id}"); ?>"
								class="isActive" 
								type="checkbox" 
								data-switchery 
								data-color="#10c469" 
								<?php echo ($item->isActive == 1) ? 'checked' : null; ?> />
							</td>
							<td class="w200" width="250">
								<button data-url="<?php echo base_url("portfolio/delete/{$item->id}"); ?>" class="btn btn-outline btn-sm btn-danger remove-sweetalert">
									<i class="fa fa-trash"></i> Sil
								</button>
								<a href="<?php echo base_url("portfolio/update_form/{$item->id}"); ?>" class="btn btn-outline btn-sm btn-purple">
									<i class="fa fa-pencil-square-o"></i> Düzenle
								</a>
								<a href="<?php echo base_url("portfolio/image_form/{$item->id}"); ?>" class="btn btn-outline btn-sm btn-dark">
									<i class="fa fa-image"></i> Resimler
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