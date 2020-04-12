<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Menü Listesi <a href="<?php echo base_url('menu/new_form'); ?>" class="btn btn-outline btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Yeni Ekle</a>
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget p-lg">
			<?php if(empty($menus)){ ?> 
				<div class="alert alert-info text-center">
					<p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url('menu/new_form'); ?>">tıklayınız</a></p>
				</div>
			<?php } else { ?>

				<table class="table table-hover table-striped table-bordered content-container">
					<thead>
						<th class="order"><i class="fa fa-reorder"></i></th>
						<th>Başlık</th>
						<th>Link</th>
						<th >Durumu</th>
						<th class="w180">İşlem</th>
					</thead>
					<tbody class="sortable" data-url="<?php echo base_url("menu/rankSetter"); ?>">
						<?php
						foreach($menus as $menu){ ?>
							<tr id="order-<?php echo $menu->id  ?>">
								<td class="order"><i class="fa fa-reorder"></i></td>
								<td><?php echo $menu->title ?></td>
								<td><?php echo $menu->url ?></td>

								<td class="text-center">
									<input
									data-url="<?php echo base_url("menu/isActiveSetter/{$menu->id}"); ?>"
									class="isActive" 
									type="checkbox" 
									data-switchery 
									data-color="#10c469" 
									<?php echo ($menu->isActive == 1) ? 'checked' : null; ?> />
								</td>
								<td>
									<button data-url="<?php echo base_url("menu/delete/{$menu->id}"); ?>" class="btn btn-outline btn-sm btn-danger remove-sweetalert">
										<i class="fa fa-trash"></i> Sil
									</button>
									<a href="<?php echo base_url("menu/update_form/{$menu->id}"); ?>" class="btn btn-outline btn-sm btn-purple">
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