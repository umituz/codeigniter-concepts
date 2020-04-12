<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Yeni Portfolyo Ekle
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">

			<div class="widget-body">
				
				<form action="<?php echo base_url('portfolio/save'); ?>" method="post">
					
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label>Başlık</label>
								<input type="text" class="form-control" name="title" placeholder="İşi Anlatan Başlık Bilgisini Giriniz">
								<?php if(isset($form_error) && $form_error == true){ ?>
									<small class="pull-right input-form-error"><?php echo form_error("title"); ?></small>	
								<?php } ?>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Kategori</label>
								<select name="category_id" class="form-control" id="">
									<?php foreach($categories as $category){ ?>
									<option value="<?php echo $category->id ?>"><?php echo $category->title ?></option>
									<?php } ?>
								</select>
								<?php if(isset($form_error) && $form_error == true){ ?>
									<small class="pull-right input-form-error"><?php echo form_error("client"); ?></small>	
								<?php } ?>
							</div>
						</div>
					</div>					

					<div class="row">
						<div class="col-md-4">
							<label for="datetimepicker1">Bitiş Tarihi</label>
							<input type="hidden" name="finishedAt" id="datetimepicker1" data-plugin="datetimepicker" data-options="{ inline: true, viewMode: 'days', format:'YYYY-MM-DD HH:mm:ss' }">
						</div>
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Müşteri</label>
										<input type="text" class="form-control" name="client" placeholder="Müşteri Ad Soyad Giriniz">
										<?php if(isset($form_error) && $form_error == true){ ?>
											<small class="pull-right input-form-error"><?php echo form_error("client"); ?></small>	
										<?php } ?>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Yer/Mekan</label>
										<input type="text" class="form-control" name="place" placeholder="Yer/Mekan Giriniz">
										<?php if(isset($form_error) && $form_error == true){ ?>
											<small class="pull-right input-form-error"><?php echo form_error("place"); ?></small>	
										<?php } ?>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Portfolyo URL</label>
										<input type="text" class="form-control" name="portfolio_url" placeholder="Yapılan İşin URL Bilgisini Giriniz">
										<?php if(isset($form_error) && $form_error == true){ ?>
											<small class="pull-right input-form-error"><?php echo form_error("place"); ?></small>	
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label>Kısa Açıklama</label>
					<textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
				</div>				

				<button type="submit" class="btn btn-success btn-md btn-outline"><i class="fa fa-check"></i> Kaydet</button>
				<a href="<?php echo base_url('portfolio'); ?>" class="btn btn-danger btn-outline"><i class="fa fa-undo"></i> Geri</a>
			</form>
		</div><!-- .widget-body -->
	</div>
</div>
</div>