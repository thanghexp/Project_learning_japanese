<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="http://localhost:81/learn_japanese/" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page - Ace Admin</title>
		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/assets/font-awesome/4.2.0/css/font-awesome.min.css" />
		<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/assets/fonts/fonts.googleapis.com.css" /> -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/assets/css/ace-rtl.min.css" />
		<style type="text/css">
			.error { color:red; font-weight: bold;}
		</style>
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">Ace</span>
									<span class="white" id="id-text2">Application</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; Company Name</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<?php echo $this->load->view(isset($template) ? $template : ''); ?>
							</div><!-- /.position-relative -->

							<div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<a id="btn-login-dark" href="#">Dark</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-blur" href="#">Blur</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-light" href="#">Light</a>
								&nbsp; &nbsp; &nbsp;
							</div>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->
		<script src="<?php echo base_url(); ?>public/backend/assets/js/jquery.2.1.1.min.js"></script>
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url(); ?>public/backend/assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url(); ?>public/backend/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">

			jQuery(function($) {
			 $('#login').on('click', function(e) {
				e.preventDefault();
				$('#sub_login').click();
			 });
			 $('#forgot').on('click', function(e) {
				e.preventDefault();
				$('#sub_forgot').click();
			 });
			 $('#register').on('click', function(e) {
				e.preventDefault();
				$('#sub_register').click();
			 });
			});	


			// jQuery(function($) {
			//  $(document).on('click', '.toolbar a[data-target]', function(e) {
			// 	e.preventDefault();
			// 	var target = $(this).data('target');
			// 	$('.widget-box.visible').removeClass('visible');//hide others
			// 	$(target).addClass('visible');//show target
			//  });
			// });	
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 }); 
			 
			});
		</script>
	</body>
</html>
