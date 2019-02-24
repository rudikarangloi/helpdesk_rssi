<?php

class Model_app extends CI_Model{
    function __construct(){
        parent::__construct();
       
    }

    //  ================= AUTOMATIC CODE ==================
    public function getkodeticket()
    {
        $query = $this->db->query("select max(id_ticket) as max_code FROM ticket");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 9, 4);

        $max_nik = $max_fix + 1;

        $tanggal = $time = date("d");
        $bulan = $time = date("m");
        $tahun = $time = date("Y");

        $nik = "T".$tahun.$bulan.$tanggal.sprintf("%04s", $max_nik);
        return $nik;
    }
  
    public function getkodekaryawan()
    {
        $query = $this->db->query("select max(nik) as max_code FROM karyawan");

        $row = $query->row_array();

        $max_id = $row['max_code'];
		$max_fix = (int) substr($max_id, 2, 3);
        //$max_fix = (int) substr($max_id, 1, 4);
		//RS001
		//$max_fix = 

        $max_nik = $max_fix + 1;

        //$nik = "RSSI".sprintf("%04s", $max_nik);
		$nik = "RS".sprintf("%03s", $max_nik);
        return $nik;
    }

     public function getkodeteknisi()
    {
        $query = $this->db->query("select max(id_teknisi) as max_code FROM teknisi");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 1, 4);

        $max_id_teknisi = $max_fix + 1;

        $id_teknisi = "T".sprintf("%04s", $max_id_teknisi);
        return $id_teknisi;
    }

     public function getkodeuser()
    {
        $query = $this->db->query("select max(id_user) as max_code FROM user");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 1, 4);

        $max_id_user = $max_fix + 1;

        $id_user = "U".sprintf("%04s", $max_id_user);
        return $id_user;
    }
    
    public function datajabatan()
    {
    $query = $this->db->query('SELECT * FROM jabatan');
    return $query->result();
    }

    public function datakaryawan()
    {
		$query = $this->db->query('SELECT A.nama, A.nik, A.alamat, A.jk, C.nama_bagian_dept, B.nama_jabatan, D.nama_dept
								   FROM karyawan A LEFT JOIN jabatan B ON B.id_jabatan = A.id_jabatan
												   LEFT JOIN bagian_departemen C ON C.id_bagian_dept = A.id_bagian_dept
												   LEFT JOIN departemen D ON D.id_dept = C.id_dept');
		return $query->result();
    }
	
	 public function datakegiatan()
    {
		$query = $this->db->query("SELECT * FROM kegiatan  WHERE periode = 2018 AND perubahan = 0 AND id_kegiatan LIKE '1.01.1.01.01.%' ORDER BY id_kegiatan");
		return $query->result();
    }

    public function datalist_ticket()
    {

        $query = $this->db->query("SELECT D.nama, F.nama_dept, A.status, A.id_ticket, A.tanggal, B.nama_sub_kategori, C.nama_kategori
                                   FROM ticket A 
                                   LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
                                   LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
                                   LEFT JOIN karyawan D ON D.nik = A.reported
                                   LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept
                                   LEFT JOIN departemen F ON F.id_dept = E.id_dept
                                   WHERE A.status IN (2,3,4,5,6)");
        return $query->result();

    }

    public function data_trackingticket($id)
    {

        $query = $this->db->query("SELECT A.tanggal, A.status, A.deskripsi, B.nama
                                   FROM tracking A 
                                   LEFT JOIN karyawan B ON B.nik = A.id_user
                                   WHERE A.id_ticket ='$id'");
        return $query->result();

    }


    public function datainformasi()
    {

        $query = $this->db->query("SELECT A.tanggal, A.subject, A.pesan, C.nama, A.id_informasi
                                   FROM informasi A 
                                   LEFT JOIN karyawan C ON C.nik =  A.id_user
                                   WHERE A.status = 1");
        return $query->result();

    }

    public function datamyticket($id)
    {
        $query = $this->db->query("SELECT A.progress, A.tanggal_proses, A.tanggal_solved, A.id_teknisi, D.feedback, A.status, A.id_ticket, A.tanggal, B.nama_sub_kategori, C.nama_kategori
                                   FROM ticket A 
                                   LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
                                   LEFT JOIN kategori C ON C.id_kategori = B.id_kategori 
                                   LEFT JOIN history_feedback D ON D.id_ticket = A.id_ticket
                                   WHERE A.reported = '$id' ");
    return $query->result();
    }


    public function datamyassignment($id)
    {
        $query = $this->db->query("SELECT A.progress, A.status, A.id_ticket, A.reported, A.tanggal, B.nama_sub_kategori, C.nama_kategori
                                   FROM ticket A 
                                   LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
                                   LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
                                   LEFT JOIN karyawan D ON D.nik = A.reported
                                   LEFT JOIN teknisi E ON E.id_teknisi = A.id_teknisi
                                   LEFT JOIN karyawan F ON F.nik = E.nik
                                   WHERE F.nik = '$id'
                                   AND A.status IN (3,4,5,6)
                                   ");
        return $query->result();
    }

     public function dataapproval($id)
    {
    $query = $this->db->query("SELECT A.status, D.nama ,A.status, A.id_ticket, A.tanggal, B.nama_sub_kategori, C.nama_kategori 
        FROM ticket A 
        LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori 
        LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
        LEFT JOIN karyawan D ON D.nik = A.reported 
        LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept WHERE E.id_dept = $id AND A.status = 1 OR  A.status= 0");
    return $query->result();
    }

     public function datadepartemen()
    {
    $query = $this->db->query('SELECT * FROM departemen');
    return $query->result();
    }

     public function databagiandepartemen()
    {
    $query = $this->db->query('SELECT * FROM bagian_departemen A LEFT JOIN departemen B ON B.id_dept = A.id_dept ');
    return $query->result();
    }

    public function datakondisi()
    {
    $query = $this->db->query('SELECT * FROM kondisi');
    return $query->result();
    }

    public function datateknisi()
    {
    $query = $this->db->query('SELECT A.point, A.id_teknisi, B.nama, B.jk, C.nama_kategori, A.status, A.point FROM teknisi A 
                                LEFT JOIN karyawan B ON B.nik = A.nik
                                LEFT JOIN kategori C ON C.id_kategori = A.id_kategori
                                
                                 ');
    return $query->result();
    }


    public function datareportteknisi($id)
    {
     $query = $this->db->query("SELECT A.progress, A.tanggal_proses, A.status, A.problem_summary, B.nama, D.nama_kategori, F.nama_dept  FROM ticket A 
                                LEFT JOIN karyawan B ON B.nik = A.reported
                                LEFT JOIN sub_kategori C ON C.id_sub_kategori = A.id_sub_kategori
                                LEFT JOIN kategori D ON D.id_kategori = C.id_kategori
                                LEFT JOIN bagian_departemen E ON E.id_bagian_dept = B.id_bagian_dept
                                LEFT JOIN departemen F ON F.id_dept = E.id_dept
                                WHERE id_teknisi = '$id'"                        
                                 );
    return $query->result();
    }


    public function datauser()
    {
         $query = $this->db->query('SELECT A.username, A.level, A.id_user, B.nik, B.nama, A.password, C.id_dept, D.nama_dept 
            FROM user A LEFT JOIN karyawan B ON B.nik = A.username 
            LEFT JOIN bagian_departemen C ON C.id_bagian_dept = B.id_bagian_dept 
            LEFT JOIN departemen D ON D.id_dept = C.id_dept
                                 ');

         return $query->result();

    }

    public function datakategori()
    {
    $query = $this->db->query('SELECT * FROM kategori');
    return $query->result();
    }

    public function dataassigment($id)
    {
    $query = $this->db->query('SELECT A.status, D.nama, C.id_kategori, A.id_ticket, A.tanggal, B.nama_sub_kategori, C.nama_kategori
                FROM ticket A 
                LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
                LEFT JOIN kategori C ON C.id_kategori = B.id_kategori 
                LEFT JOIN karyawan D ON D.nik = A.reported 
                WHERE A.id_teknisi = "$id"');
    return $query->result();
    }

    public function datasubkategori()
    {
    $query = $this->db->query('SELECT * FROM sub_kategori A LEFT JOIN kategori B ON B.id_kategori = A.id_kategori ');
    return $query->result();
    }


    public function dropdown_departemen()
    {
        $sql = "SELECT * FROM Departemen ORDER BY nama_dept";
            $query = $this->db->query($sql);
            
            $value[''] = '-- PILIH --';
            foreach ($query->result() as $row){
                $value[$row->id_dept] = $row->nama_dept;
            }
            return $value;
    }

    public function dropdown_kategori()
    {
        $sql = "SELECT * FROM kategori ORDER BY nama_kategori";
        $query = $this->db->query($sql);
            
            $value[''] = '-- PILIH --';
            foreach ($query->result() as $row){
                $value[$row->id_kategori] = $row->nama_kategori;
            }
            return $value;
    }

    public function dropdown_karyawan()
    {
        $sql = "SELECT A.nama, A.nik FROM karyawan A 
                LEFT JOIN bagian_departemen B ON B.id_bagian_dept = A.id_bagian_dept
                LEFT JOIN departemen C ON C.id_dept = b.id_dept 
                ORDER BY nama";
        $query = $this->db->query($sql);
            
            $value[''] = '-- PILIH --';
            foreach ($query->result() as $row){
                $value[$row->nik] = $row->nama;
            }
            return $value;
    }

    public function dropdown_jabatan()
    {
        $sql = "SELECT * FROM jabatan ORDER BY nama_jabatan";
        $query = $this->db->query($sql);
            
        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->id_jabatan] = $row->nama_jabatan;
        }
        return $value;
    }

    public function dropdown_kondisi()
    {
        $sql = "SELECT * FROM kondisi ORDER BY nama_kondisi";
        $query = $this->db->query($sql);
            
        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->id_kondisi] = $row->nama_kondisi."  -  (TARGET PROSES ".$row->waktu_respon." "."HARI)";
        }
        return $value;
    }

    public function dropdown_bagian_departemen($id_departemen)
    {
        $sql = "SELECT * FROM bagian_departemen where id_dept ='$id_departemen' ORDER BY nama_bagian_dept";
        $query = $this->db->query($sql);
            
        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->id_bagian_dept] = $row->nama_bagian_dept;
        }
        return $value;
    }

    public function dropdown_sub_kategori($id_kategori)
    {
        $sql = "SELECT * FROM sub_kategori where id_kategori ='$id_kategori' ORDER BY nama_sub_kategori";
        $query = $this->db->query($sql);
            
        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->id_sub_kategori] = $row->nama_sub_kategori;
        }
        return $value;
    }

    function dropdown_teknisi($id_kategori)
    {

        $sql = "SELECT A.id_teknisi, B.nama, B.jk, C.nama_kategori, A.status, A.point FROM teknisi A 
                                LEFT JOIN karyawan B ON B.nik = A.nik
                                LEFT JOIN kategori C ON C.id_kategori = A.id_kategori
                                WHERE A.id_kategori ='$id_kategori'";
        $query = $this->db->query($sql);
            
        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->id_teknisi] = $row->nama;
        }
        return $value;

    }


    public function dropdown_sumber_dana()
    {
        $value[''] = '--PILIH--';            
        $value['1'] = 'APBD';
        $value['2'] = 'DAK'; 
		$value['3'] = 'DAU'; 
		$value['4'] = 'BANTUAN PROPINSI'; 
            
        return $value;
    }
	
	public function dropdown_kriteria_investasi()
    {
        $value[''] = '--PILIH--';            
        $value['NI'] = 'Non Investasi';
        $value['IF'] = 'Investasi Fisik'; 
		$value['INF'] = 'Investasi Non Fisik'; 		
		
        return $value;
    }
	
	public function dropdown_sifat_kegiatan()
    {
        $value[''] = '--PILIH--';            
        $value['Baru'] = 'Baru';
        $value['Lanjutan'] = 'Lanjutan'; 
		$value['Penyempurnaan'] = 'Penyempurnaan'; 		
		
        return $value;

    }
	
	 public function dropdown_jk()
    {
        $value[''] = '--PILIH--';            
        $value['LAKI-LAKI'] = 'LAKI-LAKI';
        $value['PEREMPUAN'] = 'PEREMPUAN';           
            
        return $value;
    }

    public function dropdown_level()
    {
        $value[''] = '--PILIH--';            
        $value['ADMIN'] = 'ADMIN';
        $value['TEKNISI'] = 'TEKNISI';
        $value['USER'] = 'USER';           
            
        return $value;
    }


    public function check_task_to_email($tipe_petugas){
       
        $exipired_date = '30';

        //Ticket yang dalam 30 hari tidak dikerjakan 100 %
        //status < 6 = dibawah 100 %
        $this->db->select('count(*)');
        $this->db->where('status !=', '6'); 
        $this->db->where('DATEDIFF(CURDATE(),tanggal_proses) >', $exipired_date);     
        $query = $this->db->get('ticket');
        $cnt = $query->row_array();
        $diff_days =  $cnt['count(*)'];

        $kirim_email = 0;                               //Kirm email
        $kirim_email_approval = 0;                      //Tiket belum di approve
        $kirim_email_pilih_teknisi = 0;                 //Tiket sudah di approve tapi belum di pilih teknisi yg menghandel
        $kirim_email_aksi_teknisi = 0;                  //Teknisi sudah si pilih tapi belum ada aksi dari teknisi
        $kirim_email_proses_by_teknisi = 0;             //Tiket sudah dikerjakan teknisi tapi masih di bawah 100 %
        $kirim_email_pending_by_teknisi = 0;            //Tiket di pending oleh teknisi

        if ($diff_days > 0) {

            $kirim_email = 1;  

            //Cek Status=1 yang dalam 30 hari statusnya tidak dirubah
            //Sudah di Buat ticket dan belum dilanjutkan dengan approval / status = 2
            $this->db->select('count(*)');
            $this->db->where('status =', '1'); 
            $this->db->where('DATEDIFF(CURDATE(),tanggal) >', $exipired_date);     
            $query = $this->db->get('ticket');
            $cnt = $query->row_array();
            $diff_days =  $cnt['count(*)'];

            if ($diff_days > 0) {
                //Kirim pengaduan Approval
                $kirim_email_approval = 1;
            }     
			
			
			//Cek Status=2 yang dalam 30 hari statusnya tidak dirubah
			//Sudah di approve dan belum dilanjutkan dengan memilih teknisi / status = 3
            $this->db->select('count(*)');
            $this->db->where('status =', '2'); 
            $this->db->where('DATEDIFF(CURDATE(),tanggal) >', $exipired_date);     
            $query = $this->db->get('ticket');
            $cnt = $query->row_array();
            $diff_days =  $cnt['count(*)'];

            if ($diff_days > 0) {
                //Kirim pengaduan Pilihan teknisi
                $kirim_email_pilih_teknisi = 1;
			}
			
		
			//Cek Status=3 yang dalam 30 hari statusnya tidak dirubah
            //Sudah di pilih teknisi dan belum dilanjutkan dengan aksi dari teknisi / status = 4/5/6
            $this->db->select('count(*)');
            $this->db->where('status =', '3'); 
            $this->db->where('DATEDIFF(CURDATE(),tanggal) >', $exipired_date);     
            $query = $this->db->get('ticket');
            $cnt = $query->row_array();
            $diff_days =  $cnt['count(*)'];
    
            if ($diff_days > 0) {    
                //Kirim pengaduan teknisi belum memberi aksi
                $kirim_email_aksi_teknisi = 1;
			}
			
			
			//Cek Status=4 yang dalam 30 hari statusnya tidak dirubah
            //Sudah diberi aksi oleh teknisi namun pengerjaan masih dibawah 100 %
            $this->db->select('count(*)');
            $this->db->where('status =', '4'); 
            $this->db->where('DATEDIFF(CURDATE(),tanggal_proses) >', $exipired_date);     
            $query = $this->db->get('ticket');
            $cnt = $query->row_array();
            $diff_days =  $cnt['count(*)'];
        
            if ($diff_days > 0) {        
                //Kirim pengaduan task belum selesai 100 %
                $kirim_email_proses_by_teknisi = 1;
            } 

			
			//Cek Status=5 yang dalam 30 hari statusnya tidak dirubah
            //Teknisi mem pending pekerjaan
            $this->db->select('count(*)');
            $this->db->where('status =', '5'); 
            $this->db->where('DATEDIFF(CURDATE(),tanggal_proses) >', $exipired_date);     
            $query = $this->db->get('ticket');
            $cnt = $query->row_array();
            $diff_days =  $cnt['count(*)'];
            
            if ($diff_days > 0) {            
                //Kirim pengaduan teknisi mem pending pekerjaan
                $kirim_email_pending_by_teknisi = 1;            
            } 

        }

        $email_send = array("kirim_email"=>$kirim_email, 
                            "kirim_email_approval"=>$kirim_email_approval,
                            "kirim_email_pilih_teknisi"=>$kirim_email_pilih_teknisi,
                            "kirim_email_aksi_teknisi"=>$kirim_email_aksi_teknisi,
                            "kirim_email_proses_by_teknisi"=>$kirim_email_proses_by_teknisi,
                            "kirim_email_pending_by_teknisi"=>$kirim_email_pending_by_teknisi
                        );


        return $email_send;
       
    }

   
 



   

   

}