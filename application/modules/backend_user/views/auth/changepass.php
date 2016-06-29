

<!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" action="" method="POST" role="form">

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tài khoản :</label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" value="<?php echo set_value('taikhoan', $taikhoan); ?>" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('taikhoan'); ?></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mật khẩu :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Mật khẩu" value="<?php echo set_value('matkhau'); ?>" name="matkhau" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('matkhau'); ?></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mật khẩu mới :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Mật khẩu mới" value="<?php echo set_value('matkhau_new'); ?>" name="matkhau_new" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('matkhau_new'); ?></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nhập lại mật khẩu :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Nhập lại mật khẩu" value="<?php echo set_value('matkhau_repeat'); ?>" name="matkhau_repeat" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('matkhau_repeat'); ?></span>
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
