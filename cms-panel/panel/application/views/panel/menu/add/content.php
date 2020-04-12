<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Yeni Menü Ekle
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">

			<div class="widget-body">
				
				<form action="<?php echo base_url('menu/save'); ?>" method="post" >

					<div class="form-group">
						<label>Menü Adı</label>
						<input type="text" class="form-control" name="title" placeholder="Menü Adı Giriniz">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("title"); ?></small>	
						<?php } ?>
					</div>

					<div class="form-group">
						<label class="control-label">Menü Türü</label>
						<div class="controls">
							<label>
								<input type="radio" name="type" value="1" onclick="linkok()" />
							Link Yönlendirme</label>
							<?php if(!empty($pages)){ ?>
								<label>
									<input type="radio" name="type" value="2" onclick="sayfaok()" />
								Sayfa Seçimi</label>
							<?php } ?>
						</div>
					</div>

					<div id="link" style="display:none" class="form-group">
						<label>Sayfa Dışı Link</label>
						<input type="text" class="form-control" name="another_site" value="http://" placeholder="Sayfa Dışı Linki Giriniz">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("title"); ?></small>	
						<?php } ?>
					</div>

					<?php if(!empty($pages)){ ?>
						<div id="sayfa" style="display: none" class="form-grou">
							<label>Bir Sayfa Seçin</label>
							<div>
								<select class="form-control" name="choose_page">
									<?php foreach($pages as $page){ ?>
										<option value="<?php echo $page->id; ?>"><?php echo $page->title; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<br>
					<?php } ?>
					
					<button type="submit" class="btn btn-success btn-md btn-outline"><i class="fa fa-check"></i> Kaydet</button>
					<a href="<?php echo base_url('menu'); ?>" class="btn btn-danger btn-outline"><i class="fa fa-undo"></i> Geri</a>
				</form>
			</div><!-- .widget-body -->
		</div>
	</div>
</div>
<script>
	function linkok()
	{
		$("#link").show();
		$("#sayfa").hide();
	}

	function sayfaok()
	{
		$("#sayfa").show();
		$("#link").hide();
	}
</script>