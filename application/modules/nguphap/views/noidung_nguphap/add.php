
<!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" action="" method="POST" role="form" enctype="multipart/form-data">

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> </label>
        <div class="col-sm-9">
            <?php echo form_dropdown('id_nguphap', $dropdown, set_value('id_nguphap'), 'class="col-xs-10 col-sm-5"'); ?>
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('id_nguphap'); ?></span>
            </span>
        </div>
    </div>

    <?php  $dropdown_location = array( 'H' => 'Tiêu đề ngữ pháp', 'C' => 'Mô tả','R' => 'Chú ý', 'E' => 'Ví dụ',  'T' => 'Nghĩa của ví dụ', ); ?>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> </label>
        <div class="col-sm-9">
            <?php echo form_dropdown('vitri', $dropdown_location, set_value('vitri'), 'class="col-xs-10 col-sm-5"'); ?>
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('vitri'); ?></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  Nội dung:  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Nội dung" value="<?php echo set_value('noidung'); ?>" name="noidung" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('noidung'); ?></span>
            </span>
        </div>
    </div>


    <!-- <img src="opt/lampp/htdocs/learn_japanese/uploads/a.jpeg" /> -->

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
