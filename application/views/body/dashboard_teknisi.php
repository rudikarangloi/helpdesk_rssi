		

	<section class="content-header">
			<h1>Dashboard Teknisi</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Petugas</a></li>
				<li class="active">Dashboard Teknisi</li>
			</ol>
	</section>
				
	<p></p>	

	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>REPORT</strong> <em>TEKNISI JOBS</em>
					</div>
					<div class="panel-body">

						<div class="icon-grid">

							<?php $no = 0; foreach($datateknisi as $row) : $no++;?>

							<a href="<?php echo base_url();?>dashboard_teknisi/report_teknisi/<?php echo $row->id_teknisi;?>"><div class="col-lg-3 col-md-4 col-sm-6">
							
								<b><?php echo $row->nama;?></b>
								<br>
								<b><?php echo $row->point;?> POINT</b>
							</div>

						</a>

						<?php endforeach;?>

						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->	