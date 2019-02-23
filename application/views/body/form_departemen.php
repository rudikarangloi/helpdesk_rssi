			
	<section class="content-header">
			<h1>Departemen</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-pie-chart"></i> Settings</a></li>
				<li class="active">Departemen</li>
			</ol>
	</section>
				
	<p></p>	
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="#" style="text-decoration:none">Tambah Data Departemen</a></div>
					<div class="panel-body">
						
					<div class="col-md-6">
					<form method="post" action="<?php echo base_url();?><?php echo $url;?>">

					<input type="hidden" class="form-control" name="id_dept" value="<?php echo $id_departemen;?>">

					<div class="form-group">
						<label>Nama Departemen</label>
						<input class="form-control" name="nama_dept" placeholder="Nama Departemen" value="<?php echo $nama_departemen;?>" required>
					</div>

					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="<?php echo base_url();?>departemen/departemen_list"  class="btn btn-default">Batal</a>
				    </div>

				     </form>


					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
