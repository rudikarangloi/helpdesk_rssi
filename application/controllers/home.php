<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	function __construct(){
		parent::__construct();    		  
		$this->load->model('model_app');
        if(!$this->session->userdata('id_user'))
        {
			$this->session->set_flashdata("msg", "<div class='alert alert-info'>
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										<strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Silahkan login terlebih dahulu.
										</div>");
			redirect('login');
        }        
    }

    
function index()
    {
        $data['header']   = "header/header";
        $data['navbar']   = "navbar/navbar";
        $data['sidebar']  = "sidebar/sidebar";
        $data['body']     = "body/dashboard";

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

        $sql_ticket = "SELECT COUNT(id_ticket) AS jml_ticket FROM ticket";
		$row_ticket = $this->db->query($sql_ticket)->row();

		$sql_user = "SELECT COUNT(id_user) AS jml_user FROM user";
		$row_user = $this->db->query($sql_user)->row();

		$sql_karyawan = "SELECT COUNT(nik) AS jml_karyawan FROM karyawan";
		$row_karyawan = $this->db->query($sql_karyawan)->row();

		$sql_teknisi = "SELECT COUNT(id_teknisi) AS jml_teknisi FROM teknisi";
		$row_teknisi = $this->db->query($sql_teknisi)->row();


		$sql_ticket_solved = "SELECT COUNT(id_ticket) AS jml_ticket_solved FROM ticket where status = 6";
		$row_ticket_solved = $this->db->query($sql_ticket_solved)->row();

		$sql_ticket_process = "SELECT COUNT(id_ticket) AS jml_ticket_process FROM ticket where status = 4";
		$row_ticket_process = $this->db->query($sql_ticket_process)->row();


        $sql_ticket_app_int = "SELECT COUNT(id_ticket) AS jml_ticket_app_int FROM ticket where status = 1";
		$row_ticket_app_int = $this->db->query($sql_ticket_app_int)->row();

		$sql_ticket_app_tek = "SELECT COUNT(id_ticket) AS jml_ticket_app_tek FROM ticket where status = 3";
		$row_ticket_app_tek = $this->db->query($sql_ticket_app_tek)->row();

		//KEPUASAN USER

		

			
		$data['jml_ticket'] = $row_ticket->jml_ticket;
		$data['jml_user'] = $row_user->jml_user;
		$data['jml_karyawan'] = $row_karyawan->jml_karyawan;
		$data['jml_teknisi'] = $row_teknisi->jml_teknisi;


		$precent_ticket_solved = $row_ticket_solved->jml_ticket_solved / $row_ticket->jml_ticket * 100;

		$precent_ticket_process = $row_ticket_process->jml_ticket_process / $row_ticket->jml_ticket * 100;

		$precent_ticket_app_int = $row_ticket_app_int->jml_ticket_app_int / $row_ticket->jml_ticket * 100;

		$precent_ticket_app_tek = $row_ticket_app_tek->jml_ticket_app_tek / $row_ticket->jml_ticket * 100;

		$data['jml_ticket_solved'] = $precent_ticket_solved;
		$data['jml_ticket_process'] = $precent_ticket_process;	
		$data['jml_ticket_app_int'] = $precent_ticket_app_int;
		$data['jml_ticket_app_tek'] = $precent_ticket_app_tek;


		$precent_ticket_app_tek = $row_ticket_app_tek->jml_ticket_app_tek / $row_ticket->jml_ticket * 100;


		$sql_feedback = "SELECT COUNT(id_feedback) AS jml_feedback FROM history_feedback";
		$row_feedback = $this->db->query($sql_feedback)->row();

		$sql_feedback_positiv = "SELECT COUNT(id_feedback) AS jml_feedback_positiv FROM history_feedback WHERE feedback =1";
		$row_feedback_positiv = $this->db->query($sql_feedback_positiv)->row();

		$sql_feedback_negativ = "SELECT COUNT(id_feedback) AS jml_feedback_negativ FROM history_feedback WHERE feedback =0";
		$row_feedback_negativ = $this->db->query($sql_feedback_negativ)->row();

		$data['jumlah_feedback'] =  $row_feedback->jml_feedback;

		if($row_feedback_positiv->jml_feedback_positiv == 0)
		{
			$data['jml_feedback_positiv'] = 0;
			$data['feedback_positiv'] = 0;
		}
		else
		{
			$data['jml_feedback_positiv'] = $row_feedback_positiv->jml_feedback_positiv / $row_feedback->jml_feedback * 100;	
			$data['feedback_positiv'] = $row_feedback_positiv->jml_feedback_positiv;
		}	

		

		if($row_feedback_negativ->jml_feedback_negativ == 0)
		{
			$data['jml_feedback_negativ'] = 0;
			$data['feedback_negativ'] = 0;
		}
		else
		{
			$data['jml_feedback_negativ'] = $row_feedback_negativ->jml_feedback_negativ / $row_feedback->jml_feedback * 100;	
			$data['feedback_negativ'] = $row_feedback_negativ->jml_feedback_negativ;
		}	
       

        $this->load->view('template', $data);
	}
	
	public function check_task_to_email(){
       
		$txt_cURL = 'Init cURL';
		$cek_cURL = 'Init Boy';
		$result = 0;

		$my_apikey = "CMBNUAG4G0KTLBPIFN2U"; 
		$destination = "6281286884129"; 

		$api_url = "http://panel.apiwha.com/send_message.php"; 
		$api_url .= "?apikey=". urlencode ($my_apikey); 
		$api_url .= "&number=". urlencode ($destination); 		

		$chk_email_send = $this->model_app->check_task_to_email($_POST['tipe_petugas']);

		if( $chk_email_send['kirim_email'] == 1 ) {
			$message = "Test lagi : Permintaan pemeliharaan belum selesai dalam satu bulan atau lebih ....."; 
			$message = "Test lagi : Bapah Ahmad Suyadi yang terhormat ....."; 
			$api_url .= "&text=". urlencode ($message); 
				
			$query = $this->db->query('SELECT *  FROM email_send WHERE STATUS=1 AND counter=6 AND DATE(waktu) = CURDATE()');
			if( $query->num_rows()  > 0 ) {
				//do nothing
			}else{
				$data = array('waktu' => date("Y-m-d H:i:s") ,'counter' => '6' ,'status' => '1','nomor_tujuan' => $destination );				 
				 $this->db->insert('email_send', $data); 
				 //$my_result_object = json_decode(file_get_contents($api_url, false)); 
				 $result = 2;
			}			
		}

		if( $chk_email_send['kirim_email_approval'] == 1 ) {
			$message = "Permintaan pemeliharaan belum di Approve dalam satu bulan atau lebih"; 
			$api_url .= "&text=". urlencode ($message); 
						
			$query = $this->db->query('SELECT *  FROM email_send WHERE STATUS=1 AND counter=1 AND DATE(waktu) = CURDATE()');
			if( $query->num_rows()  > 0 ) {
				//do nothing
			}else{
				$data = array('waktu' => date("Y-m-d H:i:s") ,'counter' => '1' ,'status' => '1','nomor_tujuan' => $destination );				 
				 $this->db->insert('email_send', $data); 
				 //$my_result_object = json_decode(file_get_contents($api_url, false)); 
				 $result = 2;
			}	
		}

		if( $chk_email_send['kirim_email_pilih_teknisi'] == 1 ) {
			$message = "Permintaan pemeliharaan belum di pilihkan teknisi dalam satu bulan atau lebih"; 
			$api_url .= "&text=". urlencode ($message); 
						
			$query = $this->db->query('SELECT *  FROM email_send WHERE STATUS=1 AND counter=2 AND DATE(waktu) = CURDATE()');
			if( $query->num_rows()  > 0 ) {
				//do nothing
			}else{
				$data = array('waktu' => date("Y-m-d H:i:s") ,'counter' => '2' ,'status' => '1','nomor_tujuan' => $destination );				 
				 $this->db->insert('email_send', $data); 
				 //$my_result_object = json_decode(file_get_contents($api_url, false)); 
				 $result = 2;
			}	
		}

		if( $chk_email_send['kirim_email_aksi_teknisi'] == 1 ) {
			$message = "Permintaan pemeliharaan belum ada aksi oleh teknisi dalam satu bulan atau lebih"; 
			$api_url .= "&text=". urlencode ($message); 
			
			$query = $this->db->query('SELECT *  FROM email_send WHERE STATUS=1 AND counter=3 AND DATE(waktu) = CURDATE()');
			if( $query->num_rows()  > 0 ) {
				//do nothing
			}else{
				$data = array('waktu' => date("Y-m-d H:i:s") ,'counter' => '3' ,'status' => '1','nomor_tujuan' => $destination );				 
				 $this->db->insert('email_send', $data); 
				 //$my_result_object = json_decode(file_get_contents($api_url, false)); 
				 $result = 2;
			}	
		}

		if( $chk_email_send['kirim_email_proses_by_teknisi'] == 1 ) {
			$message = "Permintaan pemeliharaan pengerjaan masih dibawah 100 % oleh teknisi dalam satu bulan atau lebih"; 
			$api_url .= "&text=". urlencode ($message); 
			
			$query = $this->db->query('SELECT *  FROM email_send WHERE STATUS=1 AND counter=4 AND DATE(waktu) = CURDATE()');
			if( $query->num_rows()  > 0 ) {
				//do nothing
			}else{
				$data = array('waktu' => date("Y-m-d H:i:s") ,'counter' => '4' ,'status' => '1','nomor_tujuan' => $destination );				 
				 $this->db->insert('email_send', $data); 
				 //$my_result_object = json_decode(file_get_contents($api_url, false)); 
				 $result = 2;
			}	
		}

		if( $chk_email_send['kirim_email_pending_by_teknisi'] == 1 ) {
			$message = "Permintaan pemeliharaan di pending oleh teknisi dalam satu bulan atau lebih"; 			
			$api_url .= "&text=". urlencode ($message); 
			
			$query = $this->db->query('SELECT *  FROM email_send WHERE STATUS=1 AND counter=5 AND DATE(waktu) = CURDATE()');
			if( $query->num_rows()  > 0 ) {
				//do nothing
			}else{
				$data = array('waktu' => date("Y-m-d H:i:s") ,'counter' => '5' ,'status' => '1','nomor_tujuan' => $destination );				 
				 $this->db->insert('email_send', $data); 
				 //$my_result_object = json_decode(file_get_contents($api_url, false)); 
				 $result = 2;
			}	
		}

		// $chk_task = $this->model_app->check_task_to_email($_POST['tipe_petugas']);
		// if ($chk_task == 1){

		// 	$result = 2;
		// 	$my_apikey = "CMBNUAG4G0KTLBPIFN2U"; 
		// 	$destination = "6285323872882"; 
		// 	$message = "Jakarta Ibukota Nagara Indonesia, sok janten palanggan banjir, kusabab masih seueur wargi nu miceun sampah sambarangan"; 
		// 	$api_url = "http://panel.apiwha.com/send_message.php"; 
		// 	$api_url .= "?apikey=". urlencode ($my_apikey); 
		// 	$api_url .= "&number=". urlencode ($destination); 
		// 	$api_url .= "&text=". urlencode ($message); 
		// 	$my_result_object = json_decode(file_get_contents($api_url, false)); 

		// 	$cek_cURL =  $my_result_object->success; 
		// 	$cek_cURL = $cek_cURL .'<br>'. $my_result_object->description; 
		// 	$cek_cURL = $cek_cURL .'<br>'. $my_result_object->result_code; 

		// }
	
		$response = array(		
			'chk_email_send' => $chk_email_send,
			'result' => $result,	
			'ci_version' => CI_VERSION,
			'content' => $this->model_app->datajabatan(),
			'totalPages' => "12"
		);
	  
		$this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response, JSON_PRETTY_PRINT))
				->_display();
		exit;
    }
 

    
}
