
<!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" action="" method="POST" role="form">

     <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Tên" value="<?php echo set_value('ten', $data_row['ten']); ?>" name="ten" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('ten'); ?></span>
            </span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Thể loại :  </label>
        <div class="col-sm-9">
            <select class="form-control col-xs-10 col-sm-5" name="loai" style="width:334px;">
                <option value="0">--- Chọn thể loại --- </option>
                <option value="1">Mina</option>
                <option value="2">Kanji cơ bản</option>
                <option value="3">Kanji nâng cao</option>
                <option value="4">Kiểm tra jlpt</option>
            </select>
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
