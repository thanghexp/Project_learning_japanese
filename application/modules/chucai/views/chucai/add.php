
<!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" action="" method="POST" role="form" enctype="multipart/form-data">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Chữ cái hiragana :  </label>
		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="Hiragana" value="<?php echo set_value('txtHiragana'); ?>" name="txtHiragana" class="col-xs-10 col-sm-5">
			<span class="help-inline col-xs-12 col-sm-7">
				<span class="middle"><?php echo form_error('txtHiragana'); ?></span>
			</span>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Chữ cái katakana :  </label>
		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="Katakana" value="<?php echo set_value('txtKatakana'); ?>" name="txtKatakana" class="col-xs-10 col-sm-5">
			<span class="help-inline col-xs-12 col-sm-7">
				<span class="middle"><?php echo form_error('txtKatakana'); ?></span>
			</span>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Phát âm :  </label>
		<div class="col-sm-9">
			<input type="text" name="phatam" placeholder="Phát âm" value="<?php echo set_value('phatam'); ?>" class="col-xs-10 col-sm-5">
			<span class="help-inline col-xs-12 col-sm-7">
				<span class="middle"><?php echo form_error('phatam'); ?></span>
			</span>
		</div>
	</div>

	<div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Phát âm audio :  </label>
        <div class="col-sm-9">
            <input type="file" id="form-field-1" name="file_audio" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo isset($error) ? $error : ''; ?></span>
            </span>
        </div>
    </div>

	<div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Hình ảnh cách viết Hira :  </label>
        <div class="col-sm-9">
            <input type="file" id="form-field-1" name="file_image" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo isset($error) ? $error : ''; ?></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Hình ảnh cách viết Kata :  </label>
        <div class="col-sm-9">
            <input type="file" id="form-field-1" name="file_image3" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo isset($error) ? $error : ''; ?></span>
            </span>
        </div>
    </div>

	<!-- <div class="col-xs-12">
		<label class="ace-file-input"><input type="file" ><span class="ace-file-container" data-title="Choose"><span class="ace-file-name" data-title="No File ..."><i class=" ace-icon fa fa-upload"></i></span></span><i class=" ace-icon fa fa-times"></i></a></label>
	</div> -->

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
