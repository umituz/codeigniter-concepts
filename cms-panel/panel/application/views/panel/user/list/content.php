<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Kullanıcı Listesi <a href="<?php echo base_url('user/new_form'); ?>" class="btn btn-outline btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Yeni Ekle</a>
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget p-lg">
			<?php if(empty($items)){ ?> 
				<div class="alert alert-info text-center">
					<p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url('user/new_form'); ?>">tıklayınız</a></p>
				</div>
			<?php } else { ?>

				<table class="table table-hover table-striped table-bordered content-container">
					<thead>
						<th class="w50">#id</th>
						<th>Kullanıcı Adı</th>
						<th>Ad Soyad</th>
						<th>Mail Adresi</th>
						<th>Durumu</th>
						<th class="w180">İşlem</th>
					</thead>
					<tbody>
						<?php foreach($items as $item){ ?>
							<tr>
							<td class="text-center"><?php echo $item->id ?></td>
							<td class="w100"><?php echo $item->user_name ?></td>
							<td class="w100"><?php echo $item->full_name ?></td>
							<td class="w100"><?php echo $item->email ?></td>
							<td class="w50">
								<input
								data-url="<?php echo base_url("user/isActiveSetter/{$item->id}"); ?>"
								class="isActive" 
								type="checkbox" 
								data-switchery 
								data-color="#10c469" 
								<?php echo ($item->isActive == 1) ? 'checked' : null; ?> />
							</td>
							<td width="250">
								<button data-url="<?php echo base_url("user/delete/{$item->id}"); ?>" class="btn btn-outline btn-sm btn-danger remove-sweetalert">
									<i class="fa fa-trash"></i> Sil
								</button>
								<a href="<?php echo base_url("user/update_form/{$item->id}"); ?>" class="btn btn-outline btn-sm btn-purple">
									<i class="fa fa-pencil-square-o"></i> Düzenle
								</a>
								<a href="<?php echo base_url("user/update_password_form/{$item->id}"); ?>" class="btn btn-outline btn-sm btn-primary">
									<i class="fa fa-key"></i> Şifre Değiştir
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