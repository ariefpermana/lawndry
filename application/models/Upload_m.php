<?php 
	class Upload_m extends CI_Model
	{
		//UNTUK MENYESUAIKAN SEPARATOR DIREKTORY OS YG DIGUNAKAN
		//const DS = DIRECTORY_SEPARATOR;
		public $image_path;
		public $bukti_path;

		public function __construct(){
			parent::__construct();
			$this->image_path = realpath(APPPATH . '../img/logo/');
			$this->bukti_path = realpath(APPPATH . '../img/bukti_transaksi/');
			//$this->watermark_path = realpath(APPPATH . '../asset/');

		}

		public function upload_image()
		{
			// upload Gambar
			//1.konfigurasi
			$config['upload_path'] = $this->image_path;
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']    = '1000';//kb
			$config['max_width'] = '400';
			$config['max_height'] = '300';

			//2. inisialisasi
			// Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
			$this->upload->initialize($config);

			//3. upload //revisi
			if($this->upload->do_upload('logo'))
			{
				$image = $this->upload->data();
				return $image;// return img data
			}else//revisi
			{
				return $error = array('error' => $this->upload->display_errors()); 
			}
		}

		public function upload_bukti()
		{
			// upload Gambar
			//1.konfigurasi
			$config['upload_path'] = $this->bukti_path;
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']    = '1000';//kb

			//2. inisialisasi
			// Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
			$this->upload->initialize($config);

			//3. upload //revisi
			if($this->upload->do_upload('bukti_pembayaran'))
			{
				$image = $this->upload->data();
				return $image;// return img data
			}else//revisi
			{
				return $error = array('error' => $this->upload->display_errors()); 
			}
		}
	}