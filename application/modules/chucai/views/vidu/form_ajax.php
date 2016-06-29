<h3><?php echo 'Ví dụ '. $tam . ' :'; ?></h3>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nội dung :  </label>
		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="Hiragana" name="txtNoiDung[]" value="<?php echo set_value('txtNoiDung[]'); ?>" class="col-xs-10 col-sm-5">
			<span class="help-inline col-xs-12 col-sm-7">
				<span class="middle"><?php echo form_error('txtNoiDung[]'); ?></span>
			</span>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Chữ Hán :  </label>
		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="Chữ Hán" name="txtChuHan[]" value="<?php echo set_value('txtChuHan[]'); ?>" class="col-xs-10 col-sm-5">
			<span class="help-inline col-xs-12 col-sm-7">
				<span class="middle"><?php echo form_error('txtChuHan[]'); ?></span>
			</span>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nghĩa :  </label>
		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="Nghĩa" name="txtNghia[]" value="<?php echo set_value('txtNghia[]'); ?>" class="col-xs-10 col-sm-5">
			<span class="help-inline col-xs-12 col-sm-7">
				<span class="middle"><?php echo form_error('txtNghia[]'); ?></span>
			</span>
		</div>
	</div>
	<hr/>
	<!-- <div class="col-xs-12">
		<label class="ace-file-input"><input type="file" ><span class="ace-file-container" data-title="Choose"><span class="ace-file-name" data-title="No File ..."><i class=" ace-icon fa fa-upload"></i></span></span><i class=" ace-icon fa fa-times"></i></a></label>
	</div> -->

