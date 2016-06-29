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
				<th class="hidden-480">Thể loại</th>
				<th>Tên bài / chủ đề</th>
				<th>File Audio</th>
				<th><i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i></th>
				<th></th>
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

				<td class="">
					<span class="label label-sm label-success"><?php echo $row['tentheloai']; ?></span>
				</td>

				<td>
					<span class="label label-sm label-primary"><?php echo $row['ten']; ?></span>
				</td>
				<td><?php echo $row['audio']; ?></td>
				<td></td>

				<!-- <td class="hidden-480">
					<span class="label label-sm label-warning">Expiring</span>
				</td> -->
				<td></td>
				<td>
					<div class="hidden-sm hidden-xs action-buttons">
						<a class="red" href="<?php echo base_url('audio/delete?id_bai=' . base64_encode($this->encrypt->encode($row['id_bai'])). '&id_theloai='. base64_encode($this->encrypt->encode($row['id_theloai']))); ?>">
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
									<a href="" class="tooltip-success" data-rel="tooltip" title="Edit">
										<span class="green">
											<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
										</span>
									</a>
								</li>

								<li>
									<a href="" class="tooltip-error" data-rel="tooltip" title="Delete">
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
