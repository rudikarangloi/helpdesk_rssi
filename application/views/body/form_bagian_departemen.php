	<section class="content-header">
			<h1>Bagian Departemen</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-pie-chart"></i> Settings</a></li>
				<li class="active">Bagian Departemen</li>
			</ol>
	</section>
				
	<p></p>	
			
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="#" style="text-decoration:none">Tambah Data Bagian Departemen</a></div>
					<div class="panel-body">
						
					<div class="col-md-6">
					<form method="post" action="<?php echo base_url();?><?php echo $url;?>">

					<input type="hidden" class="form-control" name="id_bagian_dept" value="<?php echo $id_bagian_dept;?>">

					<div class="form-group">
						<label>Nama Bagian Departemen</label>
						<input class="form-control" name="nama_bagian_dept" value="<?php echo $nama_bagian_dept;?>" placeholder="Nama Bagian Departemen" required>
					</div>

					<div class="form-group">
						<label>Nama Departemen</label>
						<?php echo form_dropdown('id_departemen',$dd_departemen, $id_departemen, 'class="form-control"');?>
					</div>

					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="<?php echo base_url();?>bagian_departemen/bagian_departemen_list"  class="btn btn-default">Batal</a>
				    </div>

				     </form>


					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
