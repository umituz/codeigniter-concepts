<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			<?php echo "<b>{$item->title}</b> kaydı düzenliyorsunuz" ?> 
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">

			<div class="widget-body">
				
				<form action="<?php echo base_url("menu/update/{$item->id}"); ?>" method="post" enctype="multipart/form-data">
					


					<div class="form-group">
						<label>Menü Hiyerarşi</label>
						<div>
							<select class="form-control news_type_select_container" name="top">
								
								<?php foreach($menus as $menu){ ?>
								<option value="<?php echo $menu->id; ?>" <?php echo ($menu->id == $item->top) ? 'selected' : null; ?>><?php echo $menu->title; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label>Menü Adı</label>
						<input type="text" class="form-control" name="title" value="<?php echo $item->title ?>">
						<?php if(isset($form_error) && $form_error == true){ ?>
							<small class="pull-right input-form-error"><?php echo form_error("title"); ?></small>	
						<?php } ?>
					</div>
					
					
					
					<button type="submit" class="btn btn-primary btn-md btn-outline"><i class="fa fa-check"></i> Güncelle</button>
					<a href="<?php echo base_url('menu'); ?>" class="btn btn-danger btn-outline"><i class="fa fa-undo"></i> Geri</a>
				</form>
			</div><!-- .widget-body -->
		</div>
	</div>
</div>