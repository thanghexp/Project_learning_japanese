
<!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" action="" method="POST" role="form">

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tiếng nhật :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Tiếng nhật" value="<?php echo set_value('noidung_tiengnhat', $row['noidung_tiengnhat']); ?>" name="noidung_tiengnhat" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('noidung_tiengnhat'); ?></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Phát âm :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Phát âm" value="<?php echo set_value('noidung_phatam', $row['noidung_phatam']); ?>" name="noidung_phatam" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('noidung_phatam'); ?></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nghĩa :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Nghĩa" value="<?php echo set_value('noidung_nghia', $row['noidung_nghia']); ?>" name="noidung_nghia" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('noidung_nghia'); ?></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Người nói (viết bằng chữ kanji) :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Nghĩa" value="<?php echo set_value('nguoinoi_kanji', $row['nguoinoi_kanji']); ?>" name="nguoinoi_kanji" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('nguoinoi_kanji'); ?></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Người nói (viết bằng chữ hán) :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Nghĩa" value="<?php echo set_value('nguoinoi_tuhan', $row['nguoinoi_tuhan']); ?>" name="nguoinoi_tuhan" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('nguoinoi_tuhan'); ?></span>
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
