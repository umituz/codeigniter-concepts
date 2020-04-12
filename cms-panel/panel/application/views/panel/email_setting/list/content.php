<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			E-posta Listesi <a href="<?php echo base_url('emailsetting/new_form'); ?>" class="btn btn-outline btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Yeni Ekle</a>
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget p-lg">
			<?php if(empty($items)){ ?> 
				<div class="alert alert-info text-center">
					<p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url('emailsetting/new_form'); ?>">tıklayınız</a></p>
				</div>
			<?php } else { ?>

				<table class="table table-hover table-striped table-bordered content-container">
					<thead>
						<th>Başlık</th>
						<th>Sunucu Adı</th>
						<th>Protokol</th>
						<th>Port</th>
						<th>E-posta</th>
						<th>Durumu</th>
						<th class="w180">İşlem</th>
					</thead>
					<tbody>
						<?php foreach($items as $item){ ?>
							<tr>
							<td class="w100"><?php echo $item->user_name ?></td>
							<td class="w100"><?php echo $item->host ?></td>
							<td class="w50"><?php echo $item->protocol ?></td>
							<td class="w100"><?php echo $item->port ?></td>
							<td class="w100"><?php echo $item->user ?></td>
							<td class="w50">
								<input
								data-url="<?php echo base_url("emailsetting/isActiveSetter/{$item->id}"); ?>"
								class="isActive" 
								type="checkbox" 
								data-switchery 
								data-color="#10c469" 
								<?php echo ($item->isActive == 1) ? 'checked' : null; ?> />
							</td>
							<td width="180">
								<button data-url="<?php echo base_url("emailsetting/delete/{$item->id}"); ?>" class="btn btn-outline btn-sm btn-danger remove-sweetalert">
									<i class="fa fa-trash"></i> Sil
								</button>
								<a href="<?php echo base_url("emailsetting/update_form/{$item->id}"); ?>" class="btn btn-outline btn-sm btn-purple">
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