
<!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" action="" method="POST" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> </label>
        <div class="col-sm-9">
            <?php echo form_dropdown('id_bai', $dropdown, set_value('id_bai', $row['id_bai']), 'class="col-xs-10 col-sm-5"'); ?>
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('id_bai'); ?></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Hình ảnh :</label>
        <div class="col-sm-9">
            <input type="file" id="form-field-1" value="<?php echo set_value('hinhanh', $row['hinhanh']); ?>" name="hinhanh" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo isset($error) ? $error : ''; ?></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kunyomi :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Kunyomi" value="<?php echo set_value('kunyomi', $row['kunyomi']); ?>" name="kunyomi" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('kunyomi'); ?></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Onyomi :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Onyomi" value="<?php echo set_value('onyomi', $row['onyomi']); ?>" name="onyomi" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('onyomi'); ?></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nghĩa :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Nghĩa" value="<?php echo set_value('nghia', $row['nghia']); ?>" name="nghia" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('nghia'); ?></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Âm hán :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Âm hán" value="<?php echo set_value('amhan', $row['amhan']); ?>" name="amhan" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('amhan'); ?></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Cách viết :  </label>
        <div class="col-sm-9">
            <input type="file" id="form-field-1" value="<?php echo set_value('cachviet', $row['cachviet']); ?>" name="cachviet" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo isset($error) ? $error : ''; ?></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Từ kanji :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Từ kanji" value="<?php echo set_value('tu_kanji', $row['tu_kanji']); ?>" name="tu_kanji" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('tu_kanji'); ?></span>
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
