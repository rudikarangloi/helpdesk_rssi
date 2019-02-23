<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

function __construct(){
        parent::__construct();
        $this->load->model('model_app');

        if(!$this->session->userdata('id_user'))
        {
			$this->session->set_flashdata("msg", 
										"<div class='alert alert-info'>
										 	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											 <strong><span class='glyphicon glyphicon-remove-sign'></span></strong> 
											 Silahkan login terlebih dahulu.
										</div>");
			redirect('login');
        }        
    }


 function kegiatan_list()
 {

 	    $data['header']  = "header/header";
        $data['navbar']  = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body']    = "body/kegiatan";

        $id_dept = trim($this->session->userdata('id_dept'));
		$id_user = trim($this->session->userdata('id_user'));
		
        //notification 

        $sql_listticket = "SELECT COUNT(id_ticket) AS jml_list_ticket FROM ticket WHERE status = 2";
        $row_listticket = $this->db->query($sql_listticket)->row();

        $data['notif_list_ticket'] = $row_listticket->jml_list_ticket;

        $sql_approvalticket = "SELECT COUNT(A.id_ticket) AS jml_approval_ticket FROM ticket A 
							LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori 
							LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
							LEFT JOIN karyawan D ON D.nik = A.reported 
							LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept 
							WHERE E.id_dept = $id_dept AND status = 1";
        $row_approvalticket = $this->db->query($sql_approvalticket)->row();

        $data['notif_approval'] = $row_approvalticket->jml_approval_ticket;

        $sql_assignmentticket = "SELECT COUNT(id_ticket) AS jml_assignment_ticket FROM ticket WHERE status = 3 AND id_teknisi='$id_user'";
        $row_assignmentticket = $this->db->query($sql_assignmentticket)->row();

        $data['notif_assignment'] = $row_assignmentticket->jml_assignment_ticket;

        //end notification

        $data['link'] = "kegiatan/hapus";

        $datakegiatan = $this->model_app->datakegiatan();
	    $data['datakegiatan'] = $datakegiatan;
        
        $this->load->view('template', $data);

 }

 function hapus()
 {
 	$id = $_POST['id'];

 	$this->db->trans_start();

 	$this->db->where('IDK', $id);
 	$this->db->delete('kegiatan');

 	$this->db->trans_complete();
	
 }

 function add()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_kegiatan";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id_user = trim($this->session->userdata('id_user'));

        //notification 

        $sql_listticket = "SELECT COUNT(id_ticket) AS jml_list_ticket FROM ticket WHERE status = 2";
        $row_listticket = $this->db->query($sql_listticket)->row();

        $data['notif_list_ticket'] = $row_listticket->jml_list_ticket;

        $sql_approvalticket = "SELECT COUNT(A.id_ticket) AS jml_approval_ticket FROM ticket A 
        LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori 
        LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
        LEFT JOIN karyawan D ON D.nik = A.reported 
        LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept WHERE E.id_dept = $id_dept AND status = 1";
        $row_approvalticket = $this->db->query($sql_approvalticket)->row();

        $data['notif_approval'] = $row_approvalticket->jml_approval_ticket;

        $sql_assignmentticket = "SELECT COUNT(id_ticket) AS jml_assignment_ticket FROM ticket WHERE status = 3 AND id_teknisi='$id_user'";
        $row_assignmentticket = $this->db->query($sql_assignmentticket)->row();

        $data['notif_assignment'] = $row_assignmentticket->jml_assignment_ticket;

		//end notification
		
					
		$data['IDK'] = "";		
		$data['Id_Kegiatan'] = "";
		$data['Nama_Kegiatan'] = "";;
		$data['Pagu_Indikatif'] = "";
		$data['Pimpinan_Kegiatan'] = "";
		$data['Jabatan_Pimkeg'] = "";
		$data['NipPPTK'] = "";
		
		$data['dd_Sumber_Dana'] = $this->model_app->dropdown_sumber_dana();
		$data['id_Sumber_Dana'] = "";

		$data['dd_kriteria_investasi'] = $this->model_app->dropdown_kriteria_investasi();
		$data['id_kriteria_investasi'] = "";

		$data['dd_sifat_kegiatan'] = $this->model_app->dropdown_sifat_kegiatan();
		$data['id_sifat_kegiatan'] = "";

		
		$data['url'] = "kegiatan/save";

		$data['flag'] = "add";
    
        $this->load->view('template', $data);

 }

 function save()
 {

 	//$getkodekaryawan = $this->model_app->getkodekaryawan();
	
	//$nik = $getkodekaryawan;

 	
	$Id_Kegiatan = strtoupper(trim($this->input->post('Id_Kegiatan')));
	$Nama_Kegiatan = trim($this->input->post('Nama_Kegiatan'));
	$Pagu_Indikatif = strtoupper(trim($this->input->post('Pagu_Indikatif')));
	$Pimpinan_Kegiatan = trim($this->input->post('Pimpinan_Kegiatan'));
    $Jabatan_Pimkeg = trim($this->input->post('Jabatan_Pimkeg'));
    $NipPPTK = strtoupper(trim($this->input->post('NipPPTK')));
	$id_Sumber_Dana = strtoupper(trim($this->input->post('id_Sumber_Dana'))); 

	$id_kriteria_investasi = trim($this->input->post('id_kriteria_investasi')); 
	$id_sifat_kegiatan = trim($this->input->post('id_sifat_kegiatan')); 	
	
	$data['Periode'] = '2018';
	$data['Id_Kegiatan'] = $Id_Kegiatan;
	$data['Nama_Kegiatan'] = $Nama_Kegiatan;
	$data['Pagu_Indikatif'] = $Pagu_Indikatif;
	$data['Pimpinan_Kegiatan'] = $Pimpinan_Kegiatan;
    $data['Jabatan_Pimkeg'] = $Jabatan_Pimkeg;
    $data['NipPPTK'] = $NipPPTK;
	$data['Sumber_Dana'] = $id_Sumber_Dana;

	$data['Kelompok_Belanja'] = $id_kriteria_investasi;
	$data['Sifat_Kegiatan'] = $id_sifat_kegiatan;


 	$this->db->trans_start();

 	$this->db->insert('kegiatan', $data);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('kegiatan/kegiatan_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
			    </div>");
				redirect('kegiatan/kegiatan_list');	
			}
		
 }

 function edit($id)
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_kegiatan";

        $sql = "SELECT * FROM kegiatan  WHERE IDK =  '$id'";
		$row = $this->db->query($sql)->row();

		$id_dept = trim($this->session->userdata('id_dept'));
        $id_user = trim($this->session->userdata('id_user'));

        //notification 

        $sql_listticket = "SELECT COUNT(id_ticket) AS jml_list_ticket FROM ticket WHERE status = 2";
        $row_listticket = $this->db->query($sql_listticket)->row();

        $data['notif_list_ticket'] = $row_listticket->jml_list_ticket;

        $sql_approvalticket = "SELECT COUNT(A.id_ticket) AS jml_approval_ticket FROM ticket A 
        LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori 
        LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
        LEFT JOIN karyawan D ON D.nik = A.reported 
        LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept WHERE E.id_dept = $id_dept AND status = 1";
        $row_approvalticket = $this->db->query($sql_approvalticket)->row();

        $data['notif_approval'] = $row_approvalticket->jml_approval_ticket;

        $sql_assignmentticket = "SELECT COUNT(id_ticket) AS jml_assignment_ticket FROM ticket WHERE status = 3 AND id_teknisi='$id_user'";
        $row_assignmentticket = $this->db->query($sql_assignmentticket)->row();

        $data['notif_assignment'] = $row_assignmentticket->jml_assignment_ticket;

        //end notification

		$data['url'] = "kegiatan/update";
			
		$data['IDK'] = $id;		
		$data['Id_Kegiatan'] = $row->Id_Kegiatan;
		$data['Nama_Kegiatan'] = $row->Nama_Kegiatan;
		$data['Pagu_Indikatif'] = $row->Pagu_Indikatif;
		$data['Pimpinan_Kegiatan'] = $row->Pimpinan_Kegiatan;
		$data['Jabatan_Pimkeg'] = $row->Jabatan_Pimkeg;
		$data['NipPPTK'] = $row->NipPPTK;
		
		$data['dd_Sumber_Dana'] = $this->model_app->dropdown_sumber_dana();
		$data['id_Sumber_Dana'] = $row->Sumber_Dana;

		$data['dd_kriteria_investasi'] = $this->model_app->dropdown_kriteria_investasi();
		$data['id_kriteria_investasi'] = $row->Kelompok_Belanja;

		$data['dd_sifat_kegiatan'] = $this->model_app->dropdown_sifat_kegiatan();
		$data['id_sifat_kegiatan'] = $row->Sifat_Kegiatan;

	
		$data['flag'] = "edit";

        $this->load->view('template', $data);

 }

 function update()
 {

 	$IDK = strtoupper(trim($this->input->post('IDK')));

 	$Id_Kegiatan = strtoupper(trim($this->input->post('Id_Kegiatan')));
 	$Nama_Kegiatan = trim($this->input->post('Nama_Kegiatan'));
 	$Pagu_Indikatif = strtoupper(trim($this->input->post('Pagu_Indikatif')));
 	$Pimpinan_Kegiatan = trim($this->input->post('Pimpinan_Kegiatan'));
	$Jabatan_Pimkeg = trim($this->input->post('Jabatan_Pimkeg'));
	$NipPPTK = strtoupper(trim($this->input->post('NipPPTK')));
	$id_Sumber_Dana = strtoupper(trim($this->input->post('id_Sumber_Dana'))); 
	
	$id_kriteria_investasi = trim($this->input->post('id_kriteria_investasi')); 
	$id_sifat_kegiatan = trim($this->input->post('id_sifat_kegiatan')); 	
 	
 	$data['Id_Kegiatan'] = $Id_Kegiatan;
 	$data['Nama_Kegiatan'] = $Nama_Kegiatan;
 	$data['Pagu_Indikatif'] = $Pagu_Indikatif;
 	$data['Pimpinan_Kegiatan'] = $Pimpinan_Kegiatan;
	$data['Jabatan_Pimkeg'] = $Jabatan_Pimkeg;
	$data['NipPPTK'] = $NipPPTK;
	$data['Sumber_Dana'] = $id_Sumber_Dana;

	$data['Kelompok_Belanja'] = $id_kriteria_investasi;
	$data['Sifat_Kegiatan'] = $id_sifat_kegiatan;
	 
	
 	$this->db->trans_start();

 	$this->db->where('IDK', $IDK);
 	$this->db->update('kegiatan', $data);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('kegiatan/kegiatan_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
			    </div>");
				redirect('kegiatan/kegiatan_list');	
			}

 }


    
}
