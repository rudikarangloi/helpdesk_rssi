
	<section class="content-header">
			<h1>Informasi</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-pie-chart"></i> Settings</a></li>
				<li class="active">Informasi</li>
			</ol>
	</section>
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="#" style="text-decoration:none">Tambah Data Informasi</a></div>
					<div class="panel-body">
						
					<div class="col-md-6">
					<form method="post" action="<?php echo base_url();?><?php echo $url;?>">

					<input type="hidden" class="form-control" name="id_informasi" value="<?php echo $id_informasi;?>">

					<div class="form-group">
						<label>Subject</label>
						<input class="form-control" name="subject" placeholder="Subject" value="<?php echo $subject;?>" required>
						
					</div>

					<div class="form-group">
					<textarea class="form-control" name="pesan"><?php echo $pesan;?></textarea>
				    </div>

					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="<?php echo base_url();?>informasi/informasi_list"  class="btn btn-default">Batal</a>
				    </div>

				     </form>


					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
