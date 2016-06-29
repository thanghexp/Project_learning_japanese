
<div id="signup-box" class="signup-box visible widget-box no-border">
	<div class="widget-body">
		<div class="widget-main">
			<h4 class="header green lighter bigger">
				<i class="ace-icon fa fa-users blue"></i>
				New User Registration
			</h4>

			<div class="space-6"></div>
			<p> Enter your details to begin: </p>

			<form action="" method="POST">
				<fieldset>
					<?php echo form_error('txtEmail'); ?>
					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
							<input type="email" class="form-control" name="txtEmail" value="<?php echo set_value('txtEmail'); ?>" placeholder="Email" />
							<i class="ace-icon fa fa-envelope"></i>
						</span>
					</label>
					
					<?php echo form_error('txtFullName'); ?>
					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
							<input type="text" class="form-control" name="txtFullName" value="<?php echo set_value('txtFullName'); ?>" placeholder="Full Name" />
							<i class="ace-icon fa fa-pencil"></i>
						</span>
					</label>
					
					<?php echo form_error('txtDob'); ?>
					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
							<input type="date" class="form-control" name="txtDob" value="<?php echo set_value('txtDob'); ?>" placeholder="Dob" />
							<i class="ace-icon fa fa-calendar"></i>
						</span>
					</label>
					
					<?php echo form_error('txtUsername'); ?>
					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
							<input type="text" class="form-control" name="txtUsername" value="<?php echo set_value('txtUsername'); ?>" placeholder="Username" />
							<i class="ace-icon fa fa-user"></i>
						</span>
					</label>
					
					<?php echo form_error('txtPassword'); ?>
					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
							<input type="password" class="form-control" name="txtPassword" value="<?php echo set_value('txtPassword'); ?>" placeholder="Password" />
							<i class="ace-icon fa fa-lock"></i>
						</span>
					</label>
					
					<?php echo form_error('txtPassword_repeat'); ?>
					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
							<input type="password" class="form-control" name="txtPassword_repeat" value="<?php echo set_value('txtPassword_repeat'); ?>" placeholder="Repeat password" />
							<i class="ace-icon fa fa-retweet"></i>
						</span>
					</label>
					

					<label class="block">
						<input type="checkbox" class="ace" name ="checked"/>
						<span class="lbl">
							I accept the
							<a href="#">User Agreement</a>
						</span>
					</label>

					<div class="space-24"></div>

					<div class="clearfix">
						<button type="reset" class="width-30 pull-left btn btn-sm">
							<i class="ace-icon fa fa-refresh"></i>
							<span class="bigger-110">Reset</span>
						</button>

						<button type="button" id="register" class="width-65 pull-right btn btn-sm btn-success">
							<span class="bigger-110">Register</span>
							<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
						</button>
						<input type="submit" value="OK_Resgister" name="register" id="sub_register" style="display:none">
					</div>
				</fieldset>
			</form>
		</div>

		<div class="toolbar center">
			<a href="<?php echo base_url('backend_user/auth/login'); ?>" data-target="#login-box" class="back-to-login-link">
				<i class="ace-icon fa fa-arrow-left"></i>
				Back to login
			</a>
		</div>
	</div><!-- /.widget-body -->
</div><!-- /.signup-box -->	

<script type="text/javascript">
	$(document).load(function(){
		$('#register').click(function() {
			alert();
		});
	}); 
		
	
</script>