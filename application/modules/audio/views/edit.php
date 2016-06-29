
<!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" action="" method="POST" role="form" enctype="multipart/form-data">

   
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> File audio :  </label>
        <div class="col-sm-9">
            <input type="file" id="form-field-1" name="file" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo isset($error) ? $error : ''; ?></span>
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
