<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Yeni Ayar Ekle
		</h4>
	</div>

	<div class="col-md-12">
		<form action="<?php echo base_url('setting/save'); ?>" method="post" enctype="multipart/form-data">
		<div class="widget">
			<div class="m-b-lg nav-tabs-horizontal">
				<!-- tabs list -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#tab-1" aria-controls="tab-3" role="tab" data-toggle="tab">Site Bilgileri</a></li>
					<li role="presentation"><a href="#tab-6" aria-controls="tab-5" role="tab" data-toggle="tab">Adres Bilgileri</a></li>
					<li role="presentation"><a href="#tab-2" aria-controls="tab-1" role="tab" data-toggle="tab">Hakkımızda</a></li>
					<li role="presentation"><a href="#tab-3" aria-controls="tab-2" role="tab" data-toggle="tab">Vizyon</a></li>
					<li role="presentation"><a href="#tab-4"  aria-controls="tab-3" role="tab" data-toggle="tab">Misyon</a></li>
					<li role="presentation"><a href="#tab-5"  aria-controls="tab-4" role="tab" data-toggle="tab">Sosyal Medya</a></li>
					<li role="presentation"><a href="#tab-7"  aria-controls="tab-6" role="tab" data-toggle="tab">Logo</a></li>
				</ul>

				<div class="tab-content p-md">

					<?php $this->load->view("panel/{$viewFolder}/{$subViewFolder}/tabs/site_info"); ?>
					<?php $this->load->view("panel/{$viewFolder}/{$subViewFolder}/tabs/address"); ?>
					<?php $this->load->view("panel/{$viewFolder}/{$subViewFolder}/tabs/about_us"); ?>
					<?php $this->load->view("panel/{$viewFolder}/{$subViewFolder}/tabs/vision"); ?>
					<?php $this->load->view("panel/{$viewFolder}/{$subViewFolder}/tabs/mission"); ?>
					<?php $this->load->view("panel/{$viewFolder}/{$subViewFolder}/tabs/social_media"); ?>
					<?php $this->load->view("panel/{$viewFolder}/{$subViewFolder}/tabs/logo"); ?>

				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-success btn-md"><i class="fa fa-check"></i> Kaydet</button>
		<a href="<?php echo base_url('user'); ?>" class="btn btn-danger"><i class="fa fa-undo"></i> Geri</a>
		</form>
	</div>

</div>