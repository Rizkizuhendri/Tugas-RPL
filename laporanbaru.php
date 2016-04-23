<?PHP
	if(!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Laporanbaru extends CI_Controller
	{
		var $limit=10;
 		var $offset=10;
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mlaporanbaru');
			//$this->load->helper(array('form','url'));
		}
		
		public function index()
		{
			$this->load->view("vheader");
			$this->load->view("vlapor");
			$this->load->view("vfooter");
        }
		
		public function do_upload()
		{
			$config['upload_path'] = './tools/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			//$config['max_size']	= '100';
            //$config['max_width'] = '1024';
            //$config['max_height'] = '768';
	
			$this->load->library('upload', $config);
	
			if ( ! $this->upload->do_upload())
			{
				$this->mlaporanbaru->insert();
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger alert-dismissable\" id=\"alert\" >Upload gambar berhasil !!<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button></div></div>");
				redirect('laporanbaru');
			}
			else
			{
                $id = $this->id_laporan();
                $this->mlaporanbaru->set_l_idlaporan($id);
                $this->mlaporanbaru->set_l_idakun($this->session->userdata("idakun"));
				$this->mlaporanbaru->set_l_akun($this->session->userdata("nama"));
				$this->mlaporanbaru->set_l_head($this->input->post("judul"));
				$this->mlaporanbaru->set_l_ket($this->input->post("ket"));
				$this->mlaporanbaru->set_l_alamat($this->input->post("alamatrusak"));
                $this->mlaporanbaru->set_l_kecamatan($this->input->post("kec"));
                $tgl=date('Y-m-d');	
			    $this->mlaporanbaru->set_l_tanggallapor($tgl);
                date_default_timezone_set("Asia/Jakarta");
                $data = $this->upload->data("userfile");
                $uploadedPath = $data["file_name"];
                $this->mlaporanbaru->set_l_foto($uploadedPath);
                $this->mlaporanbaru->set_l_status('1');
                
				$this->mlaporanbaru->insert();
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success alert-dismissable\" id=\"alert\" >Upload gambar berhasil !!<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button></div></div>");
				redirect('laporanbaru');
			}
		}
        
        public function id_laporan()
		{
			$query = $this->mlaporanbaru->view_last_data();
			if($query->num_rows())
			{
				foreach($query->result() as $row):
					$str=substr($row->l_idlaporan,1,5);
		
					$str = $str+1;
				
					if($str<10)
					  $id = "0000".$str;
					else if ($str<100)
					  $id = "000".$str;
                    else if ($str<1000)
					  $id = "00".$str;
                    else if ($str<10000)
					  $id = "0".$str;
					else
					  $id = $str;
				
				endforeach;
				
				return "L".$id;
			}
			else
				return "L00001";
			
		}
	}
?>