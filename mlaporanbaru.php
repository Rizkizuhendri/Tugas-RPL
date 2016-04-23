<?php

	class Mlaporanbaru extends CI_Model 
	{
    
		var $tabel = 'tlaporan';
		
		private $l_idlaporan;
        private $l_idakun;
		private $l_akun;
		private $l_head;
		private $l_ket;
		private $l_alamat;
        private $l_kecamatan;
        private $l_tanggallapor;
		private $l_foto;
        private $l_status;
        private $l_lastedit;
        private $l_konfstaff;
        private $l_kategori;
		
		
        public function set_l_idlaporan($value)
		{
			$this->l_idlaporan = $value;
		}
		
		public function get_l_idlaporan()
		{
			return $this->l_idlaporan;
		}
        
        public function set_l_idakun($value)
		{
			$this->l_idakun = $value;
		}
		
		public function get_l_idakun()
		{
			return $this->l_idakun;
		}
		
		public function set_l_akun($value)
		{
			$this->l_akun = $value;
		}
		
		public function get_l_akun()
		{
			return $this->l_akun;
		}
		
		public function set_l_head($value)
		{
			$this->l_head = $value;
		}
		
		public function get_l_head()
		{
			return $this->l_head;
		}
		
		public function set_l_ket($value)
		{
			$this->l_ket = $value;
		}
		
		public function get_l_ket()
		{
			return $this->l_ket;
		}
		
		public function set_l_alamat($value)
		{
			$this->l_alamat = $value;
		}
		
		public function get_l_alamat()
		{
			return $this->l_alamat;
		}
		
		public function set_l_foto($value)
		{
			$this->l_foto = $value;
		}
		
		public function get_l_foto()
		{
			return $this->l_foto;
		}
        
        public function set_l_kecamatan($value)
		{
			$this->l_kecamatan = $value;
		}
		
		public function get_l_kecamatan()
		{
			return $this->l_kecamatan;
		}
        
        public function set_l_tanggallapor($value)
		{
			$this->l_tanggallapor = $value;
		}
		
		public function get_l_tanggallapor()
		{
			return $this->l_tanggallapor;
		}
        
        public function set_l_status($value)
		{
			$this->l_status = $value;
		}
		
		public function get_l_status()
		{
			return $this->l_status;
		}
        
        public function set_l_lastedit($value)
		{
			$this->l_lastedit = $value;
		}
		
		public function get_l_lastedit()
		{
			return $this->l_lastedit;
		}
        
        public function set_l_konfstaff($value)
		{
			$this->l_konfstaff = $value;
		}
		
		public function get_l_konfstaff()
		{
			return $this->l_konfstaff;
		}
        
        public function set_l_kategori($value)
		{
			$this->l_kategori = $value;
		}
		
		public function get_l_kategori()
		{
			return $this->l_kategori;
		}
		
		function get_allimage() 
		{
			$this->db->from($this->tabel);
            $this->db->where('l_status','1');
            $this->db->order_by('l_idlaporan', 'desc');
            //$this->db->limit('3');
			$query = $this->db->get();
				 
			if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		}
        
        function lapor_selesai() 
		{
			$this->db->from($this->tabel);
            $this->db->where('l_status','3');
            $this->db->order_by('l_idlaporan', 'desc');
            //$this->db->limit('3');
			$query = $this->db->get();
				 
			if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		}

        function tampil_id($l_idlaporan)
        {
            $this->db->from($this->tabel);
            $this->db->where('l_idlaporan',$l_idlaporan);
            $this->db->join('tstatus', 'tstatus.id_status = tlaporan.L_status');
            $query=$this->db->get();
            if($query->num_rows() > 0) 
			{
				return $query->result();
			}
		}
        
        function cari_laporan()
        {            
            $cari = $this->input->GET('cari', TRUE);
            if($this->uri->segment(1) == 'lapor')
            $status = 1;
            else if ($this->uri->segment(1) == 'diproses')
            $status = 2; 
            else if ($this->uri->segment(1) == 'ngaspal')
            $status = 3;
            else
            $status = 99; 
            if($cari == '')
            {
                $cari = $this->input->GET('cari', FALSE);
            }
            else
            {
                $this->db->from($this->tabel);
                $where = "l_head like '%$cari%' AND l_status = $status OR l_akun like '%$cari%' AND l_status = $status";
                $this->db->where($where);
                $this->db->join('tstatus', 'tstatus.id_status = tlaporan.L_status');
                $query=$this->db->get();
                if($query->num_rows() > 0) 
                {
                    return $query->result();
                }
            }
		}
		
		public function insert()
		{
			$sql = "INSERT INTO tlaporan (l_idlaporan, l_idakun, l_akun, l_head, l_ket, l_alamat, l_kecamatan, l_tanggallapor, l_foto, l_status) VALUES ('".$this->get_l_idlaporan()."','".$this->get_l_idakun()."','".$this->get_l_akun()."','".$this->get_l_head()."','".$this->get_l_ket()."','".$this->get_l_alamat()."','".$this->get_l_kecamatan()."','".$this->get_l_tanggallapor()."','".$this->get_l_foto()."','".$this->get_l_status()."')";
					
			$this->db->query($sql);
		}
        
        public function view_last_data()
		{
			$sql = "SELECT l_idlaporan FROM tlaporan ORDER BY l_idlaporan desc LIMIT 0,1";
			
			return $this->db->query($sql);
		}
	}
?>