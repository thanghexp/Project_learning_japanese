<?php $flag = $this->session->flashdata('message'); if($flag['type'] == 'success') { ?>	<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Thông báo:	<strong class="green"><?php echo isset($flag['message']) ? $flag['message'] : ''; ?></strong></div><?php } elseif($flag['type'] == 'error') { ?><div class="alert alert-block alert-danger">	<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-close red"></i>Thông báo:<strong class="red"><?php echo isset($flag['message']) ? $flag['message'] : ''; ?></strong></div><?php } ?>
<style>
	.btn-app {
		margin: 20px 10px !important;
		width: 107px !important;
		/*height: 85px !important;*/
	}
</style>


<!-- <hr/><hr/><hr/>	
<div class="center">
	<span class="btn btn-app btn-sm btn-light no-hover">
		<span class="line-height-1  bigger-170 blue"> <?php echo isset($count_chucai) ? $count_chucai : ''; ?> </span><br>
		<span class="line-height-1  lgaller-90"> Chữ cái </span>
	</span>

	<span class="btn btn-app btn-sm btn-yellow no-hover">
		<span class="line-height-1  bigger-170"> <?php echo isset($count_auth) ? $count_auth : ''; ?>  </span>

		<br>
		<span class="line-height-1  lgaller-90"> Thành viên </span>
	</span>

	<span class="btn btn-app btn-sm btn-pink no-hover">
		<span class="line-height-1  bigger-170"> <?php echo isset($count_question) ? $count_question : '';  ?> </span>

		<br>
		<span class="line-height-1  lgaller-90"> Câu hỏi </span>
	</span>

	<span class="btn btn-app btn-sm btn-grey no-hover">
		<span class="line-height-1  bigger-170"> <?php echo isset($count_tuvung) ? $count_tuvung : ''; ?>  </span>

		<br>
		<span class="line-height-1  lgaller-90"> Từ vựng </span>
	</span>

	<span class="btn btn-app btn-sm btn-success no-hover">
		<span class="line-height-1  bigger-170"> <?php echo isset($count_kaiwa) ? $count_kaiwa : ''; ?> </span>

		<br>
		<span class="line-height-1 lgaller-90"> Kaiwa </span>
	</span>

	<span class="btn btn-app btn-sm btn-primary no-hover">
		<span class="line-height-1  bigger-170"> <?php echo isset($count_nguphap) ? $count_nguphap : ''; ?> </span>

		<br>
		<span class="line-height-1 lgaller-90"> Ngữ pháp </span>
	</span>
</div>

<hr/><hr/><hr/>
<div class="center">
	<span class="btn btn-app btn-sm btn-light no-hover">
		<span class="line-height-1  bigger-170 blue"> <?php echo isset($count_viduchucai) ? $count_viduchucai : ''; ?> </span><br>
		<span class="line-height-1 lgaller-90"> Ví dụ chữ cái </span>
	</span>

	<span class="btn btn-app btn-sm btn-yellow no-hover">
		<span class="line-height-1  bigger-170"><?php echo isset($count_tumoi) ? $count_tumoi : 0; ?>   </span>

		<br>
		<span class="line-height-1 lgaller-90"> Từ mới </span>
	</span>

	<span class="btn btn-app btn-sm btn-pink no-hover">
		<span class="line-height-1  bigger-170"> <?php echo isset($count_dapan) ? $count_dapan : 0; ?> </span>

		<br>
		<span class="line-height-1 lgaller-90"> Đáp án </span>
	</span>

	<span class="btn btn-app btn-sm btn-grey no-hover">
		<span class="line-height-1  bigger-170"> <?php echo isset($count_vidu_tuvung) ? $count_vidu_tuvung : ''; ?>  </span>

		<br>
		<span class="line-height-1 lgaller-90"> Ví dụ từ vựng </span>
	</span>

	<span class="btn btn-app btn-sm btn-success no-hover">
		<span class="line-height-1  bigger-170"> <?php echo isset($count_kiemtra) ? $count_kiemtra : ''; ?> </span>

		<br>
		<span class="line-height-1 lgaller-90"> Kiểm tra </span>
	</span>

	<span class="btn btn-app btn-sm btn-primary no-hover">
		<span class="line-height-1  bigger-170"> <?php echo isset($count_chude) ? $count_chude : ''; ?> </span><br>
		<span class="line-height-1 lgaller-90"> Bài </span>
	</span>
</div>

<hr/><hr/><hr/> -->

<div class="panel-body">
    <div class="col-md-9 panel-body">
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>
</div>

<script type="text/javascript">

    var ctx = document.getElementById("myChart");
    var data = {
        labels: <?php echo $labels; ?>,
        datasets: [
            {
                label: 'Qty record in each table',
                fill: false,
                lineTension: 0.1,
                backgroundColor: "rgba(75,192,192,0.4)",
                borderColor: "rgba(75,192,192,1)",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(75,192,192,1)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(75,192,192,1)",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: <?php echo $data_chart; ?>
            }

        ]
    };
    
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });

</script>