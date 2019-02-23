<!DOCTYPE html>
<html lang="en">
<head>
	<!--load view header -->
 <?php
 	$this->load->view($header);
 ?>
 <!--/header-->
</head>

<body class="hold-transition skin-blue sidebar-mini">


	<?php $this->load->view($navbar); ?>	

 	<?php $this->load->view($sidebar); ?>	

	
	<!--mainbar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<?php $this->load->view($body); ?>	
	</div>


 	<!--/mainbar-->

	

	<footer class="main-footer">
		<div class="pull-right hidden-xs">
		<b>Version</b> 1.0.0
		</div>
		<strong>RSUD Imanuddin</strong> - Pangkalan Bun

		<h3 class="check_kirim_email">		
			<span class="glyphicon glyphicon-book"></span>
		</h3>
	</footer> 

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Create the tabs -->
		<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
		<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
		<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
		<!-- Home tab content -->
		<div class="tab-pane" id="control-sidebar-home-tab">
			<h3 class="control-sidebar-heading">Recent Activity</h3>
			<ul class="control-sidebar-menu">
			<li>
				<a href="javascript:void(0)">
				<i class="menu-icon fa fa-birthday-cake bg-red"></i>

				<div class="menu-info">
					<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

					<p>Will be 23 on April 24th</p>
				</div>
				</a>
			</li>
			<li>
				<a href="javascript:void(0)">
				<i class="menu-icon fa fa-user bg-yellow"></i>

				<div class="menu-info">
					<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

					<p>New phone +1(800)555-1234</p>
				</div>
				</a>
			</li>
			<li>
				<a href="javascript:void(0)">
				<i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

				<div class="menu-info">
					<h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

					<p>nora@example.com</p>
				</div>
				</a>
			</li>
			<li>
				<a href="javascript:void(0)">
				<i class="menu-icon fa fa-file-code-o bg-green"></i>

				<div class="menu-info">
					<h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

					<p>Execution time 5 seconds</p>
				</div>
				</a>
			</li>
			</ul>
			<!-- /.control-sidebar-menu -->

			<h3 class="control-sidebar-heading">Tasks Progress</h3>
			<ul class="control-sidebar-menu">
			<li>
				<a href="javascript:void(0)">
				<h4 class="control-sidebar-subheading">
					Custom Template Design
					<span class="label label-danger pull-right">70%</span>
				</h4>

				<div class="progress progress-xxs">
					<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
				</div>
				</a>
			</li>
			<li>
				<a href="javascript:void(0)">
				<h4 class="control-sidebar-subheading">
					Update Resume
					<span class="label label-success pull-right">95%</span>
				</h4>

				<div class="progress progress-xxs">
					<div class="progress-bar progress-bar-success" style="width: 95%"></div>
				</div>
				</a>
			</li>
			<li>
				<a href="javascript:void(0)">
				<h4 class="control-sidebar-subheading">
					Laravel Integration
					<span class="label label-warning pull-right">50%</span>
				</h4>

				<div class="progress progress-xxs">
					<div class="progress-bar progress-bar-warning" style="width: 50%"></div>
				</div>
				</a>
			</li>
			<li>
				<a href="javascript:void(0)">
				<h4 class="control-sidebar-subheading">
					Back End Framework
					<span class="label label-primary pull-right">68%</span>
				</h4>

				<div class="progress progress-xxs">
					<div class="progress-bar progress-bar-primary" style="width: 68%"></div>
				</div>
				</a>
			</li>
			</ul>
			<!-- /.control-sidebar-menu -->

		</div>
		<!-- /.tab-pane -->

		<!-- Settings tab content -->
		<div class="tab-pane" id="control-sidebar-settings-tab">
			<form method="post">
			<h3 class="control-sidebar-heading">General Settings</h3>

			<div class="form-group">
				<label class="control-sidebar-subheading">
				Report panel usage
				<input type="checkbox" class="pull-right" checked>
				</label>

				<p>
				Some information about this general settings option
				</p>
			</div>
			<!-- /.form-group -->

			<div class="form-group">
				<label class="control-sidebar-subheading">
				Allow mail redirect
				<input type="checkbox" class="pull-right" checked>
				</label>

				<p>
				Other sets of options are available
				</p>
			</div>
			<!-- /.form-group -->

			<div class="form-group">
				<label class="control-sidebar-subheading">
				Expose author name in posts
				<input type="checkbox" class="pull-right" checked>
				</label>

				<p>
				Allow the user to show his name in blog posts
				</p>
			</div>
			<!-- /.form-group -->

			<h3 class="control-sidebar-heading">Chat Settings</h3>

			<div class="form-group">
				<label class="control-sidebar-subheading">
				Show me as online
				<input type="checkbox" class="pull-right" checked>
				</label>
			</div>
			<!-- /.form-group -->

			<div class="form-group">
				<label class="control-sidebar-subheading">
				Turn off notifications
				<input type="checkbox" class="pull-right">
				</label>
			</div>
			<!-- /.form-group -->

			<div class="form-group">
				<label class="control-sidebar-subheading">
				Delete chat history
				<a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
				</label>
			</div>
			<!-- /.form-group -->
			</form>
		</div>
		<!-- /.tab-pane -->
		</div>
	</aside>

 	<div class="control-sidebar-bg"></div>

</body>
</html>

<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/morris.js/morris.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/pages/dashboard.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>


<script type="text/javascript">
	$("document").ready(function(){

		$(".check_kirim_email").html('hello World');	
		var tipe_petugas = 0;
		
		setInterval(function() {
					 
			$.post( "<?php echo base_url();?>home/check_task_to_email", {"tipe_petugas": tipe_petugas}, function( data ) {
				$(".check_kirim_email").html(data['result']);		

				if(data['result'] == 2){

					$(".check_kirim_email").html(JSON.stringify(data['chk_email_send']));				

				}else{
					$(".check_kirim_email").html('Tidak kirim Email');
				}	

			},"json");

		}, 10000);


		
		
	});

	</script>