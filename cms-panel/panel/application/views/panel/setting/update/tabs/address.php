<div role="tabpanel" class="tab-pane fade" id="tab-6">
	<div class="form-group">
		<label>Adres</label>
		<textarea name="address" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo isset($form_error) ? set_value("address") : $item->address ?></textarea>
	</div>
</div>