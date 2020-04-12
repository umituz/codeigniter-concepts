<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Site Ayarları <a href="<?php echo base_url('setting/new_form'); ?>" class="btn btn-outline btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Yeni Ekle</a>
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget p-lg">
			<?php if(empty($items)){ ?> 
				<div class="alert alert-info text-center">
					<p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url('setting/new_form'); ?>">tıklayınız</a></p>
				</div>
			<?php } ?>
		</div>
	</div>
</div>