<?php $flag = $this->session->flashdata('message'); if($flag['type'] == 'success') { ?> <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Thông báo: <strong class="green"><?php echo isset($flag['message']) ? $flag['message'] : ''; ?></strong></div><?php } elseif($flag['type'] == 'error') { ?><div class="alert alert-block alert-danger">    <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-close red"></i>Thông báo:<strong class="red"><?php echo isset($flag['message']) ? $flag['message'] : ''; ?></strong></div><?php } ?>    
<!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" action="" method="POST" role="form">

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> </label>
        <div class="col-sm-9">
            <?php echo form_dropdown('id_bai', $dropdown, set_value('id_bai'), 'class="col-xs-10 col-sm-5"'); ?>
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('id_bai'); ?></span>
            </span> 
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nội dung :  </label>
        <div class="col-sm-9">
            <input type="text" id="content" placeholder="Nội dung" value="<?php echo set_value('noidung'); ?>" name="noidung" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('noidung'); ?></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Đáp án 1 :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Đáp án 1" name="dapan[1]" value="<?php echo set_value('dapan[1]'); ?>" class="col-xs-10 col-sm-5" required>
            <input type="checkbox" id="dapandung" value="1" name="dapandung[1][]" />
            <span class="help-inline col-xs-12 col-sm-7">
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Đáp án 2 :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Đáp án 2" name="dapan[2]" value="<?php echo set_value('dapan[2]'); ?>" class="col-xs-10 col-sm-5" required>
            <input type="checkbox" id="dapandung" value="1" name="dapandung[2][]" />
            <span class="help-inline col-xs-12 col-sm-7">
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Đáp án 3 :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Đáp án 3" name="dapan[3]" value="<?php echo set_value('dapan[3]'); ?>" class="col-xs-10 col-sm-5" required>
            <input type="checkbox" id="dapandung" value="1" name="dapandung[3][]" />
            <span class="help-inline col-xs-12 col-sm-7">
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Đáp án 4 :  </label>
        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Đáp án 4" name="dapan[4]" value="<?php echo set_value('dapan[4]'); ?>" class="col-xs-10 col-sm-5" required>
            <input type="checkbox" id="dapandung" value="1" name="dapandung[4][]" />
            <span class="help-inline col-xs-12 col-sm-7">
            </span>
        </div>
    </div>


    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <input type="submit" id="submit" name="submit" value="Submit" onClick="checkAnswer()" class="btn btn-info" style="">
            &nbsp; &nbsp; &nbsp;
            <button class="btn" type="reset">
                <i class="ace-icon fa fa-undo bigger-110"></i>
                Reset
            </button>   
        </div>
    </div>

</form>

