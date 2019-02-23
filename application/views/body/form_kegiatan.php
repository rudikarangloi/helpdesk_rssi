<script language="javascript" type="text/javascript">
    
	$(document).ready(function() {

		$("#id_departemen").change(function(){
	 		// Put an animated GIF image insight of content
		
			var data = {id_departemen:$("#id_departemen").val()};
			$.ajax({
					type: "POST",
					url : "<?php echo base_url().'select/select_bagian_departemen'?>",				
					data: data,
					success: function(msg){
						$('#div-order').html(msg);
					}
			});
		});   

	});

</script>			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Kegiatan</li>
			</ol>
		</div><!--/.row-->
		
	<br>
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<svg class="glyph stroked male user ">
						<use xlink:href="#stroked-male-user"/></svg>
						<a href="#" style="text-decoration:none">Tambah Data Kegiatan</a></div>
					<div class="panel-body">
						
					<div class="col-md-6">
					<form method="post" action="<?php echo base_url();?><?php echo $url;?>">

					<input type="hidden" class="form-control" name="IDK" value="<?php echo $IDK;?>">

					<div class="form-group">
						<label>ID Kegiatan</label>
						<input class="form-control" name="Id_Kegiatan" placeholder="Id Kegiatan" value="<?php echo $Id_Kegiatan;?>" required>
					</div>

					<div class="form-group">
						<label>Nama Kegiatan</label>
						<input class="form-control" name="Nama_Kegiatan" placeholder="Nama Kegiatan" value="<?php echo $Nama_Kegiatan;?>" required>
					</div>

					<div class="form-group">
						<label>Pagu Indikatif</label>
						<input class="form-control" name="Pagu_Indikatif" placeholder="Pagu Indikatif" value="<?php echo $Pagu_Indikatif;?>" required>
					</div>

					<div class="form-group">
						<label>Pimpinan Kegiatan</label>
						<input class="form-control" name="Pimpinan_Kegiatan" placeholder="Pimpinan Kegiatan" value="<?php echo $Pimpinan_Kegiatan;?>" required>
					</div>

					<div class="form-group">
						<label>Jabatan Pimpinan Kegiatan</label>
						<input class="form-control" name="Jabatan_Pimkeg" placeholder="Jabatan Pimpinan Kegiatan" value="<?php echo $Jabatan_Pimkeg;?>" required>
					</div>

					<div class="form-group">
						<label>Nip PPTK</label>
						<input class="form-control" name="NipPPTK" placeholder="Nip PPTK" value="<?php echo $NipPPTK;?>" required>
					</div>

					<div class="form-group">
						<label>Sumber Dana</label>
						<?php echo form_dropdown('id_Sumber_Dana',$dd_Sumber_Dana, $id_Sumber_Dana, ' id="id_Sumber_Dana" required class="form-control"');?>
					</div>

					<div class="form-group">
						<label>Kriteria Investasi</label>
						<?php echo form_dropdown('id_kriteria_investasi',$dd_kriteria_investasi, $id_kriteria_investasi, ' id="id_kriteria_investasi" required class="form-control"');?>
					</div>

					<div class="form-group">
						<label>Sifat kegiatan</label>
						<?php echo form_dropdown('id_sifat_kegiatan',$dd_sifat_kegiatan, $id_sifat_kegiatan, ' id="id_sifat_kegiatan" required class="form-control"');?>
					</div>

					

					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="<?php echo base_url();?>kegiatan/kegiatan_list"  class="btn btn-default">Batal</a>
				    </div>

				     </form>


					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
