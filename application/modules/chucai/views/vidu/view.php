<?php $flag = $this->session->flashdata('message'); if($flag['type'] == 'success') { ?>	<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Thông báo:	<strong class="green"><?php echo isset($flag['message']) ? $flag['message'] : ''; ?></strong></div><?php } elseif($flag['type'] == 'error') { ?><div class="alert alert-block alert-danger">	<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-close red"></i>Thông báo:<strong class="red"><?php echo isset($flag['message']) ? $flag['message'] : ''; ?></strong></div><?php } ?>
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
				<th>Nội dung</th>
				<th>Nghĩa</th>
				<th class="hidden-480">Chữ hán</th>

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

				<td><?php echo $row['noidung']; ?></td>
				<td><?php echo $row['chuhan']; ?></td>
				<td class="hidden-480"><?php echo $row['nghia']; ?></td>
				<td>Feb 12</td>

				<td>
					<div class="hidden-sm hidden-xs action-buttons">

						<a class="green" href="<?php echo base_url('chucai/vidu/edit?id_chucai='. base64_encode($this->encrypt->encode($row['id_chucai'])) .'&id='. base64_encode($this->encrypt->encode($row['id']))); ?>">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>

						<a class="red" href="<?php echo base_url('chucai/vidu/delete?id_chucai='. base64_encode($this->encrypt->encode($row['id_chucai'])) .'&id='. base64_encode($this->encrypt->encode($row['id']))); ?>">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
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

<div class="clearfix form-actions">
	<div class=" col-md-9">
		<a href="<?php echo base_url('chucai/vidu/add?id=' .  base64_encode($this->encrypt->encode($id_chucai))); ?>" class="btn btn-success" style="font-weight:bold;"> Thêm mới ví dụ</a>
		<a href="" class="btn" style="font-weight:bold;"> <i class="ace-icon fa fa-undo bigger-110"></i> Quay lại</a>
	</div>

</div>
