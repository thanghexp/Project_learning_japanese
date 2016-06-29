<?php $flag = $this->session->flashdata('message'); if($flag['type'] == 'success') { ?>	<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Thông báo:	<strong class="green"><?php echo isset($flag['message']) ? $flag['message'] : ''; ?></strong></div><?php } elseif($flag['type'] == 'error') { ?><div class="alert alert-block alert-danger">	<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-close red"></i>Thông báo:<strong class="red"><?php echo isset($flag['message']) ? $flag['message'] : ''; ?></strong></div><?php } ?>

<!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" action="" method="POST" role="form">
 	

	<div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
        <div class="col-sm-10">
            <?php echo form_dropdown('id_chucai', $dropdown, '', 'class="form-control"'); ?>
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><?php echo form_error('id_chucai'); ?></span>
            </span>
        </div>
    </div>


	<div class="form-group has-error has-feedback">
      <label class="col-sm-2 control-label" for="inputError">Đáp án 1 :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="data[noidung][]" placeholder="Đáp án 1" id="inputError" required="">
        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
      </div>
    </div>	

	<div class="form-group has-error has-feedback">
      <label class="col-sm-2 control-label" for="inputError">Đáp án 2 :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="data[noidung][]" placeholder="Đáp án 2" id="inputError" required="">
        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
      </div>
    </div>

    <div class="form-group has-error has-feedback">
      <label class="col-sm-2 control-label" for="inputError">Đáp án 3 :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="data[noidung][]" placeholder="Đáp án 3" id="inputError" required="">
        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
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








<div>
	<table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>
				<th class="hidden-480">Id</th>
				<th>Id_chucai</th>
				<th>Đáp án sai</th>
				<th class="hidden-480"></th>
				<th>
					<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
				</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
		<?php foreach($table as $key => $row) { ?>
			<tr>
				<td class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</td>

				<td class="hidden-480">
					<span class="label label-sm label-warning"><?php echo $row['id']; ?></span>
				</td>
				<td class="hidden-480"><?php echo $row['id_chucai']; ?></td>
				<td><?php echo $row['noidung']; ?></td>
				<td></td>
				<td>Feb 12</td>

				<td>
					<div class="hidden-sm hidden-xs action-buttons">

						<a class="green" href="<?php echo base_url('chucai/kiemtra/update?id_chucai='. base64_encode($this->encrypt->encode($row['id_chucai'])) .'&id='. base64_encode($this->encrypt->encode($row['id']))); ?>">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>

					</div>

					<div class="hidden-md hidden-lg">
						<div class="inline pos-rel">
							<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
								<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
							</button>

							<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
								<li>
									<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
										<span class="blue">
											<i class="ace-icon fa fa-search-plus bigger-120"></i>
										</span>
									</a>
								</li>

								<li>
									<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
										<span class="green">
											<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
										</span>
									</a>
								</li>

								<li>
									<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
										<span class="red">
											<i class="ace-icon fa fa-trash-o bigger-120"></i>
										</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
