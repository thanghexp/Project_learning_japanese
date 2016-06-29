

<!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" action="" method="POST" role="form">

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tài khoản :</label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" value="<?php echo set_value('taikhoan', $row['taikhoan']); ?>" name="taikhoan" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('taikhoan'); ?></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Họ tên :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Họ tên" value="<?php echo set_value('fullname', $row['fullname']); ?>" name="fullname" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('fullname'); ?></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ngày sinh :  </label>
        <div class="col-sm-9">
            <input type="date" id="form-field-1" placeholder="Ngày sinh" value="<?php echo set_value('dob', $row['dob']); ?>" name="dob" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('dob'); ?></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Email" value="<?php echo set_value('email', $row['email']); ?>" name="email" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('email'); ?></span>
            </span>
        </div>
    </div>

    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <input type="submit" id="submit" name="submit" value="Update" class="btn btn-info" style="">
            &nbsp; &nbsp; &nbsp;
            <button class="btn" type="reset">
                <i class="ace-icon fa fa-undo bigger-110"></i>
                Reset
            </button>
        </div>
    </div>
</form>
