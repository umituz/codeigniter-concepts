<div role="tabpanel" class="tab-pane fade" id="tab-3">
	<div class="form-group">
		<label>Vizyonumuz</label>
		<textarea name="vision" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo isset($form_error) ? set_value("vision") : $item->vision ?></textarea>
	</div>
</div>