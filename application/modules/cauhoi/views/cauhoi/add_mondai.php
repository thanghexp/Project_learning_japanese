    
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

   <!--  <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Hình ảnh :  </label>
        <div class="col-sm-9">
            <input type="file" id="form-field-1" accept=".mp3/.jpg" value="<?php echo set_value('img'); ?>" name="img" class="col-xs-10 col-sm-5">
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('img'); ?></span>
            </span>
        </div>
    </div> -->

<!--     <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mục đích : </label>
        <div class="col-sm-9">
            <input type="checkbox" name="luyenthi" value="1"> Luyện thi
            <input type="checkbox" name="luyenthi" value="2"> Ôn tập ( Mondai )
            <input type="checkbox" name="luyenthi" value="3"> Kiểm tra
        </div>
    </div> -->

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Số đáp án :</label>
        <input type="text" name="sodapan" placeholder="Nhập số đáp án của câu hỏi này" class="col-md-4" onkeyup="load_ajax()" id="number"/>
        <span class="middle"><?php echo form_error('sodapan'); ?></span>
    </div>

    <div id="result">
        
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


<script type="text/javascript">
    function load_ajax(){
            $.ajax({
                url : "<?php echo base_url('cauhoi/dapan/show_form_ajax'); ?>",
                type : "post",
                dateType:"text",
                data : {
                     number : $('#number').val()
                },
                success : function (result){
                    $('#result').html(result);
                }
            });
        }
</script>

<script type="text/javascript">
    function checkAnswer() {
        var name = $("#dapandung1").attr("name");
        alert(name);
    }
</script>



<script>
    $(document).ready(function(){
        var name = $("#id").attr("name");
        $("#dapandung1").click(function(){
            alert();
            alert("The paragraph was clicked.");
        });
    });
</script>