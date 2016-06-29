<br/>
<input type="text" value="" placeholder="Nhập số ví dụ bảng chữ cái" id="number"/>
<input type="button" name="clickme" id="clickme" onclick="load_ajax()" value="Click Me"/>


<!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" action="" method="POST" role="form">
	<div id="result">
	    
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





<script type="text/javascript">
	function load_ajax(){
            $.ajax({
                url : "<?php echo base_url('chucai/vidu/show_form_ajax'); ?>",
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