
<!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" action="" method="POST" role="form">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nội dung :  </label>
		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="Nội dung" value="<?php echo set_value('txtNoiDung', $data_row['noidung']); ?>" name="txtNoiDung" class="col-xs-10 col-sm-5">
			<span class="help-inline col-xs-12 col-sm-7">
				<span class="middle"><?php echo form_error('txtNoiDung'); ?></span>
			</span>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Chữ hán :  </label>
		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="Chữ hán" value="<?php echo set_value('txtChuHan', $data_row['chuhan']); ?>" name="txtChuHan" class="col-xs-10 col-sm-5">
			<span class="help-inline col-xs-12 col-sm-7">
				<span class="middle"><?php echo form_error('txtChuHan'); ?></span>
			</span>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nghĩa :  </label>
		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="Nghĩa" value="<?php echo set_value('txtNghia', $data_row['nghia']); ?>" name="txtNghia" class="col-xs-10 col-sm-5">
			<span class="help-inline col-xs-12 col-sm-7">
				<span class="middle"><?php echo form_error('txtNghia'); ?></span>
			</span>
		</div>
	</div>

	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<input type="submit" id="submit" name="submit" value="Submit" class="btn btn-info" style="">
			&nbsp; &nbsp; &nbsp;
			<button class="btn" type="reset">
				<i class="ace-icon fa fa-undo bigger-110"></i>
				Reset
			</button>
		</div>
	</div>
</form>
