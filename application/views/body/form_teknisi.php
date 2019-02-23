			
	<section class="content-header">
			<h1>Teknisi</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Petugas</a></li>
				<li class="active">Teknisi</li>
			</ol>
	</section>
				
	<p></p>	
			
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
							<a href="#" style="text-decoration:none">Tambah Data Teknisi</a></div>
					<div class="panel-body">
						
					<div class="col-md-6">
					<form method="post" action="<?php echo base_url();?><?php echo $url;?>">

					<input type="hidden" class="form-control" name="id_teknisi" value="<?php echo $id_teknisi;?>">

					<?php if($flag=="edit")
					{}else{?>
					<div class="form-group">
						<label>Nama Karyawan</label>
						<?php echo form_dropdown('id_karyawan',$dd_karyawan, $id_karyawan, ' id="id_karyawan" required class="form-control"');?>
					</div>
					<?php }?>

					<div class="form-group">
						<label>Spesialis</label>
						<?php echo form_dropdown('id_kategori',$dd_kategori, $id_kategori, ' id="id_kategori" required class="form-control"');?>
					</div>

					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="<?php echo base_url();?>teknisi/teknisi_list"  class="btn btn-default">Batal</a>
				    </div>

				     </form>


					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
