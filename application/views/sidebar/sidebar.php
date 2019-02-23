<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
			<div class="pull-left" style="color:#FFF">				
				<p><h3>Sistem Informasi <br>Pemeliharaan </h3></p>
			</div>
		
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

	 		 <li><a href="<?php echo base_url();?>home"><i class="fa fa-dashboard"></i> Dashboard</a></li>			

	  <?php 
	  	if($this->session->userdata('level')=="ADMIN")
		{?>
			<li class="header">TASK</li>			

			<li class="treeview">
				<a href="#">
					<i class="fa fa-laptop"></i> <span>Tickets</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">			
					<li><a href="<?php echo base_url();?>ticket/add"><i class="fa fa-circle-o"></i> New Ticket</a></li>
					<li><a href="<?php echo base_url();?>list_ticket/ticket_list"><i class="fa fa-circle-o"></i> List Ticket (<?php if(empty($notif_list_ticket)) { echo "0"; }else{ echo $notif_list_ticket;} ?>)</a></li>
					<li><a href="<?php echo base_url();?>approval/approval_list"><i class="fa fa-circle-o"></i> Aprroval Ticket (<?php if(empty($notif_approval)) { echo "0"; }else{ echo $notif_approval;} ?>)</a></li>
					<li><a href="<?php echo base_url();?>myticket/myticket_list"><i class="fa fa-circle-o"></i> My Ticket</a></li>
					<li><a href="<?php echo base_url();?>myassignment/myassignment_list"><i class="fa fa-circle-o"></i> Assigment Ticket (<?php if(empty($notif_assignment)) { echo "0"; }else{ echo $notif_assignment;} ?>)</a></li>
				</ul>
			</li>

			
			<li class="header">PETUGAS</li>
			<li><a href="<?php echo base_url();?>karyawan/karyawan_list"><i class="fa fa-circle-o text-yellow"></i> <span>Karyawan</span></a></li>
			<li><a href="<?php echo base_url();?>teknisi/teknisi_list"><i class="fa fa-circle-o text-yellow"></i> <span>Teknisi</span></a></li>
			<li><a href="<?php echo base_url();?>dashboard_teknisi/teknisi_view"><i class="fa fa-circle-o text-yellow"></i> <span>Laporan Teknisi</span></a></li>
			<li><a href="<?php echo base_url();?>user/user_list"><i class="fa fa-circle-o text-yellow"></i> <span>User</span></a></li>
			
			<li class="header">SETTING</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-pie-chart"></i>
					<span>MASTER DATA</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">

					<li><a href="<?php echo base_url();?>jabatan/jabatan_list"><i class="fa fa-circle-o"></i> Jabatan</a></li>
					<li><a href="<?php echo base_url();?>departemen/departemen_list"><i class="fa fa-circle-o"></i> Departemen</a></li>
					<li><a href="<?php echo base_url();?>bagian_departemen/bagian_departemen_list"><i class="fa fa-circle-o"></i> Bagian Departemen</a></li>
					<li><a href="<?php echo base_url();?>kategori/kategori_list"><i class="fa fa-circle-o"></i> Kategori</a></li>
					<li><a href="<?php echo base_url();?>sub_kategori/sub_kategori_list"><i class="fa fa-circle-o"></i> Sub Kategori</a></li>
					<li><a href="<?php echo base_url();?>kondisi/kondisi_list"><i class="fa fa-circle-o"></i> Kondisi</a></li>
					<li><a href="<?php echo base_url();?>informasi/informasi_list"><i class="fa fa-circle-o text-aqua"></i> <span>Informasi</span></a></li>
				
				</ul>
			</li>
			
			
		<?php 
		}else if($this->session->userdata('level')=="TEKNISI"){?>

			<li><a href="<?php echo base_url();?>myassignment/myassignment_list"><i class="fa fa-circle-o"></i> My Assigment Ticket (<?php if(empty($notif_assignment)) { echo "0"; }else{ echo $notif_assignment;} ?>)</a></li>
			
		<?php 
			// Jabatan : Kepala Regu atau Operator
		} else if($this->session->userdata('level')=="USER" AND ($this->session->userdata('id_jabatan')==3 OR $this->session->userdata('id_jabatan')==4)){?>

			<li><a href="<?php echo base_url();?>ticket/add"><i class="fa fa-circle-o"></i> New Ticket</a></li>
			<li><a href="<?php echo base_url();?>myticket/myticket_list"><i class="fa fa-circle-o"></i> My Ticket</a></li>
			
		<?php 
			// jabatan : Kepala Departemen
		} else if($this->session->userdata('level')=="USER" AND $this->session->userdata('id_jabatan')==2){?>

			<li><a href="<?php echo base_url();?>approval/approval_list"><i class="fa fa-circle-o"></i> Aprroval Ticket (<?php if(empty($notif_approval)) { echo "0"; }else{ echo $notif_approval;} ?>)</a></li>
			<li><a href="<?php echo base_url();?>dashboard_teknisi/teknisi_view"><i class="fa fa-circle-o text-yellow"></i> <span>Laporan Teknisi</span></a></li>
		
		<?php 
			// jabatan : Kepala Bagian
		} else if($this->session->userdata('level')=="USER" AND $this->session->userdata('id_jabatan')==1){?>

			<li><a href="<?php echo base_url();?>list_ticket/ticket_list"><i class="fa fa-circle-o"></i> List Ticket (<?php if(empty($notif_list_ticket)) { echo "0"; }else{ echo $notif_list_ticket;} ?>)</a></li>
			
		<?php 
		}
		?>

			<li><a href="<?php echo base_url();?>informasi_view"><i class="fa fa-book"></i> <span>News </span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>