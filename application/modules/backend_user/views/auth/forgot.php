<div id="forgot-box" class="forgot-box widget-box visible no-border">
	<div class="widget-body">
		<div class="widget-main">
			<h4 class="header red lighter bigger">
				<i class="ace-icon fa fa-key"></i>
				Retrieve Password
			</h4>

			<div class="space-6"></div>
			<p>
				Enter your email and to receive instructions
			</p>

			<form>
				<fieldset>
					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
							<input type="email" class="form-control" name="txtEmail" placeholder="Email" />
							<i class="ace-icon fa fa-envelope"></i>
						</span>
					</label>

					<div class="clearfix">
						<button type="button" id="forgot" class="width-35 pull-right btn btn-sm btn-danger">
							<i class="ace-icon fa fa-lightbulb-o"></i>
							<span class="bigger-110">Send Me!</span>
						</button>
						<input type="submit" id="sub_forgot" value="OK_forgot" style="display:none">
					</div>
				</fieldset>
			</form>
		</div><!-- /.widget-main -->

		<div class="toolbar center">
			<a href="<?php echo base_url('backend_user/auth/login'); ?>" data-target="#login-box" class="back-to-login-link">
				Back to login
				<i class="ace-icon fa fa-arrow-right"></i>
			</a>
		</div>
	</div><!-- /.widget-body -->
</div><!-- /.forgot-box -->