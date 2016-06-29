
<!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" action="" method="POST" role="form" enctype="multipart/form-data">

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nội dung :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Nội dung" value="<?php echo set_value('noidung_vidu'); ?>" name="noidung_vidu" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('noidung_vidu'); ?></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tiếng nhật :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Tiếng nhật" value="<?php echo set_value('noidung_tiengnhat'); ?>" name="noidung_tiengnhat" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('noidung_tiengnhat'); ?></span>
            </span>
        </div>
    </div>

     <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nghĩa :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Nghĩa" value="<?php echo set_value('nghia'); ?>" name="nghia" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('nghia'); ?></span>
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
