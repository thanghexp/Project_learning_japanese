
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Đáp án <?php echo $tam; ?>  :  </label>
		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="Đáp án <?php echo $tam; ?>" name="dapan[]" value="<?php echo set_value('dapan'); ?>" class="col-xs-10 col-sm-5" required>
			<input type="checkbox" id="dapandung<?php echo $tam; ?>" value="1" name="dapandung[<?php echo $tam; ?>][]" />
			<span class="help-inline col-xs-12 col-sm-7">
			</span>
		</div>
	</div>

	<hr/>
	<!-- <div class="col-xs-12">
		<label class="ace-file-input"><input type="file" ><span class="ace-file-container" data-title="Choose"><span class="ace-file-name" data-title="No File ..."><i class=" ace-icon fa fa-upload"></i></span></span><i class=" ace-icon fa fa-times"></i></a></label>
	</div> -->

