<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Portfolyo Kategori Listesi <a href="<?php echo base_url('portfolio_category/new_form'); ?>" class="btn btn-outline btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Yeni Ekle</a>
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget p-lg">
			<?php if(empty($items)){ ?> 
				<div class="alert alert-info text-center">
					<p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url('portfolio_category/new_form'); ?>">tıklayınız</a></p>
				</div>
			<?php } else { ?>

				<table class="table table-hover table-striped table-bordered content-container">
					<thead>
						<th class="w50">#id</th>
						<th>Başlık</th>
						<th class="w100 text-center">Durumu</th>
						<th class="w180">İşlem</th>
					</thead>
					<tbody>
						<?php foreach($items as $item){ ?>
							<tr>
							<td class="text-center"><?php echo $item->id ?></td>
							<td class="text-center"><?php echo $item->title ?></td>
							<td>
								<input
								data-url="<?php echo base_url("portfolio_category/isActiveSetter/{$item->id}"); ?>"
								class="isActive" 
								type="checkbox" 
								data-switchery 
								data-color="#10c469" 
								<?php echo ($item->isActive == 1) ? 'checked' : null; ?> />
							</td>
							<td>
								<button data-url="<?php echo base_url("portfolio_category/delete/{$item->id}"); ?>" class="btn btn-outline btn-sm btn-danger remove-sweetalert">
									<i class="fa fa-trash"></i> Sil
								</button>
								<a href="<?php echo base_url("portfolio_category/update_form/{$item->id}"); ?>" class="btn btn-outline btn-sm btn-purple">
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