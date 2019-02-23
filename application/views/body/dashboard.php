
		

		<section class="content-header">
			<h1>Dashboard</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Dashboard  <?php echo $this->session->userdata('id_jabatan');?></li>
			</ol>
		</section>
	
		<p></p>
		<div class="row">
			
			
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-aqua">
					<div class="inner"><h3><?php echo $jml_ticket;?></h3>		
						<p>Total Tickets</p>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>

			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner"><h3><?php echo $jml_karyawan;?></h3>		
						<p>Total Karyawan</p>
					</div>
					<div class="icon">
						<i class="ion ion-pie-graph"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>

			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-green">
					<div class="inner"><h3><?php echo $jml_user;?></h3>		
						<p>Total Users</p>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>

		
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-yellow">
					<div class="inner"><h3><?php echo $jml_teknisi;?></h3>		
						<p>Total Teknisi</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		
		</div><!--/.row-->
		
	
		
		<div class="row">

			<div class="col-xs-6 col-md-3">
				<div class="info-box bg-green">
					<span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

					<div class="info-box-content">
					<span class="info-box-text"><h4>Tickets<br>Solved</h4></span>				

					<div class="progress">
						<div class="progress-bar" style="width: <?php echo ceil($jml_ticket_solved);?>%"></div>
					</div>
					<span class="progress-description">
						<?php echo ceil($jml_ticket_solved);?> %
						</span>
					</div>					
				</div>
			</div>

			<div class="col-xs-6 col-md-3">
				<div class="info-box bg-yellow">
					<span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
					<div class="info-box-content">
					<span class="info-box-text">
						<h4>Tickets On<br>Process</h4>
					</span>	
					<div class="progress">
						<div class="progress-bar" style="width: <?php echo ceil($jml_ticket_process);?>%"></div>
					</div>
					<span class="progress-description">
						<?php echo ceil($jml_ticket_process);?> %
						</span>
					</div>					
				</div>
			</div>

			<div class="col-xs-6 col-md-3">
				<div class="info-box bg-blue">
					<span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
					<div class="info-box-content">
					<span class="info-box-text">
						<h5>Tickets Waiting <br>Approval Internal</h5>
					</span>	
					<div class="progress">
						<div class="progress-bar" style="width: <?php echo ceil($jml_ticket_app_int);?>%"></div>
					</div>
					<span class="progress-description">
						<?php echo ceil($jml_ticket_app_int);?> %
						</span>
					</div>					
				</div>
			</div>

			<div class="col-xs-6 col-md-3">
				<div class="info-box bg-red">
					<span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
					<div class="info-box-content">
					<span class="info-box-text">
						<h5>Tickets Waiting <br>Approval Technition</h5>
					</span>	
					<div class="progress">
						<div class="progress-bar" style="width: <?php echo ceil($jml_ticket_app_tek);?>%"></div>
					</div>
					<span class="progress-description">
						<?php echo ceil($jml_ticket_app_tek);?> %
						</span>
					</div>					
				</div>
			</div>

			
			
		</div><!--/.row-->


		<div class="row">




			<div class="col-xs-6 col-md-6">			


				<div class="info-box bg-green">
					<span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

					<div class="info-box-content">
					<span class="info-box-text">Feedback Positiv</span>
					<span class="info-box-number">
						<?php echo ceil($feedback_positiv);?>
						dari 
						<?php echo ceil($jumlah_feedback);?>
					</span>

					<div class="progress">
						<div class="progress-bar" style="width: <?php echo ceil($jml_feedback_positiv);?>%"></div>
					</div>
					<span class="progress-description">
							<?php echo ceil($jml_feedback_positiv);?>%
						</span>
					</div>
					<!-- /.info-box-content -->
				</div>

			</div>


			<div class="col-xs-6 col-md-6">
				

				<div class="info-box bg-yellow">
					<span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

					<div class="info-box-content">
					<span class="info-box-text">Feedback Negativ</span>
					<span class="info-box-number">
						<?php echo ceil($feedback_negativ);?>
						dari 
						<?php echo ceil($jumlah_feedback);?>
					</span>

					<div class="progress">
						<div class="progress-bar" style="width: <?php echo ceil($jml_feedback_negativ);?>%"></div>
					</div>
					<span class="progress-description">
							<?php echo ceil($jml_feedback_negativ);?>%
						</span>
					</div>
					<!-- /.info-box-content -->
				</div>


			

			</div>



			

		</div><!--/.row-->
								
		
								
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->