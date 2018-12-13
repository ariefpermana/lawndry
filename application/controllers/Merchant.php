<?php 
	
/**
* 
*/
class Merchant extends MY_Controller
{
	protected $_status;
	protected $_data_status;

	function __construct()
	{
		parent::__construct();

		$kode = $this->session->userdata('kode');

		//====================Status Order ====================
		if(!empty($this->Order_m->getStatusHistory($kode)))
		{
		 	$tot_status = count($this->Order_m->getStatusHistory($kode)); 
		 	$data_status = $this->Order_m->getStatusHistory($kode);
		}else{
			$tot_status = "0";
		}

		if(isset($data_status)){
			$this->_data_status = $data_status;
		}else{
			$this->_data_status = NULL;
		}

		$this->_status = $tot_status;
	}
	
	public function profile()
	{
		if(!$this->session->userdata('id')) redirect('user/login');

		//==========================membuat pagination=================================//
		//1. kofigurasi
		$config['base_url'] = site_url('merchant/profile');
		$config['total_rows'] = $this->Merchant_m->get_total_rows();
		$config['per_page'] = $per_page = 3; //limit
		$config['use_page_numbers'] = TRUE;

		//cinfigurasi style
		$config['full_tag_open'] =  '<ul class="pagination" style="float: right;">';
		$config['full_tag_close'] = '</ul>';
		//first
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		//last
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		//next page
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		//previous page
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//current Page/nomor aktif
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		//nomor tidak aktif
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		//2. initialisasi
		$this->pagination->initialize($config);

		//3. buat link pagination
		$data['pagination'] = $this->pagination->create_links();
		// kalau nomor halaman yang dibutuhkan tidak tampil pada url, di set 0
		$offset = $this->uri->segment(3) ? ','.$this->uri->segment (3) : '';
		//========================== End Pagination =======================================//

		$data['content'] = 'page/merchant/profile';

		$data['profile'] = 'active';

		$kategori = $this->session->userdata('kategori');

		$data['count_status'] = $this->_status;
		$data['status_history'] = $this->_data_status;

		if($kategori == '0')
		{
			$data['merchant'] = $this->Merchant_m->getMerchant(NULL,$per_page, $offset);
		}elseif ($kategori == 1) {
			$kode = $this->session->userdata('kode');
			
			$data['merchant'] = $this->Merchant_m->getMerchant($kode);
		}

		if($this->input->post('submit') == 'Edit')
		{
			$id = $this->input->post('id');

			$data_sess = array(
						'id'	=> $id,
						'uri'	=> $this->uri->segment(2),
				);

			$this->session->set_userdata($data_sess);

			redirect('merchant/edit');
		}

		$this->load->view('layout', $data);
	}

	public function edit()
	{
		if(!$this->session->userdata('id')) redirect('user/login');
		$data['count_status'] = $this->_status;
		$data['status_history'] = $this->_data_status;

		if($this->session->userdata('uri') != 'profile')
		{
			$data['content'] = 'page/merchant/add';

			$data[$this->session->jenis_layanan] = 'active';

			$jenis_layanan = $this->session->userdata('jenis_layanan');
			$id 		   = $this->session->userdata('id_layanan');

			$data['detail_layanan'] = $this->Merchant_m->getDetail($id);

			$this->form_validation->set_rules('nama_layanan', 'Nama Layanan', 'min_length[5]|max_length[50]');
			$this->form_validation->set_rules('biaya', 'Biaya', 'numeric');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layout', $data);
			}else{

				if($this->input->post('submit') == 'add')
				{
					if($jenis_layanan == 'kiloan')
					{
						$data = array(
									'nama_layanan'	=> $this->input->post('nama_layanan'),
									'biaya'			=> $this->input->post('biaya'),
								);

						$update = $this->Merchant_m->updateLayanan($id, $data);

						if($update == TRUE)
						{
							$this->session->set_flashdata('success', 'Insert Data Layanan Success!');

							redirect(base_url('merchant/kiloan'));
						}else{
							$this->session->set_flashdata('failed', 'Insert Data Layanan Failed!');

							redirect(base_url('merchant/kiloan'));
						}

					}

					if($jenis_layanan == 'satuan')
					{
						$data = array(
									'nama_layanan'	=> $this->input->post('nama_layanan'),
									'biaya'			=> $this->input->post('biaya'),
								);

						$update = $this->Merchant_m->updateLayanan($id, $data);

						if($update == TRUE)
						{
							$this->session->set_flashdata('success', 'Insert Data Layanan Success!');

							redirect(base_url('merchant/satuan'));
						}else{
							$this->session->set_flashdata('failed', 'Insert Data Layanan Failed!');

							redirect(base_url('merchant/satuan'));
						}
					}
				}
			}
		}else{
			$data['profile'] = 'active';

			$data['content'] = 'page/merchant/edit';

			$kode = $this->session->userdata('id');
			
			$datatest = $this->Merchant_m->getMerchant($kode);

			$data['merchant'] = $datatest[0];	

			$this->form_validation->set_rules('handphone', 'No. Handphone', 'numeric|min_length[10]|max_length[13]');
			$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'min_length[30]|max_length[150]');
			$this->form_validation->set_rules('syarat_ketentuan', 'Syarat & Ketentuan', 'min_length[30]|max_length[2000]');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layout', $data);
			}else{
				$id					= $this->session->userdata('id');
				$nama_laundry 		= $this->input->post('nama_laundry');
				$email		  		= $this->input->post('email');
				$handphone 	  		= $this->input->post('handphone');
				$alamat		  		= $this->input->post('alamat');
				$deskripsi 	  		= $this->input->post('deskripsi');
				$no_rek 	  		= $this->input->post('no_rek');
				$kelurahan 	  		= $this->input->post('kelurahan');
				$syarat_ketentuan 	= $this->input->post('syarat_ketentuan');
				
				$upload = $this->Upload_m->upload_image();

				if(!empty($upload['error'])) 
				{
					$error = strip_tags($upload['error']);


					if($error != 'You did not select a file to upload.')
					{
						$this->session->set_flashdata('failed', $error);

						redirect(base_url('merchant/edit'));
					}else{
						$upload['file_name']	= $this->input->post('temp_logo');

						if($upload['file_name'] == NULL)
						{
							$this->session->set_flashdata('failed', 'Please upload the Logo!');

							redirect(base_url('merchant/edit'));
						}
					}
				}

				$data = array(
						'nama_laundry'		=> $nama_laundry,
						'email'				=> $email,
						'alamat'			=> $alamat,
						'kelurahan'			=> $kelurahan,
						'no_hp'				=> $handphone,
						'no_rek'			=> $no_rek,
						'deskripsi'			=> $deskripsi,
						'syarat_ketentuan'	=> $syarat_ketentuan,
						'logo'				=> $upload['file_name'],
						'status'			=> '1'
					);

				$update = $this->Merchant_m->updateData($id, $data);

				 if($update == TRUE)
				 {
				 	$this->session->set_flashdata('success', 'Insert Data Profile Success!');

					redirect(base_url('merchant/profile'));
				 }else{
				 	$this->session->set_flashdata('failed', 'Insert Data Profile Failed!');

					redirect(base_url('merchant/profile'));
				 }
			}
		}
	}

	public function kiloan()
	{
		if(!$this->session->userdata('id')) redirect('user/login');

		$data['content'] = 'page/merchant/kiloan';
		$data['count_status'] = $this->_status;
		$data['status_history'] = $this->_data_status;

		$data['kiloan'] = 'active';

		$id = $this->session->userdata('kode');

		$data['data_kiloan'] = $this->Merchant_m->getLayanan('kiloan', $id);

		if($this->input->post('submit') == 'add')
		{
			$data_sess = array(
						'id_laundry' 	=> $id,
						'jenis_layanan'	=> 'kiloan',
						'uri'			=> $this->uri->segment(2)
						);

			$this->session->set_userdata($data_sess);

			redirect('merchant/add');
		}

		if($this->input->post('submit') == 'Edit')
		{
			$data_sess = array(
						'id_layanan'	=> $this->input->post('kode'),
						'id_laundry' 	=> $id,
						'jenis_layanan'	=> 'kiloan',
						'uri'			=> $this->uri->segment(2)
						);

			$this->session->set_userdata($data_sess);

			redirect('merchant/edit');
		}

		$this->load->view('layout', $data);
	}

	public function satuan()
	{
		if(!$this->session->userdata('id')) redirect('user/login');

		$data['content'] = 'page/merchant/satuan';
		$data['count_status'] = $this->_status;
		$data['status_history'] = $this->_data_status;

		$data['satuan'] = 'active';

		$id = $this->session->userdata('kode');

		$data['data_satuan'] = $this->Merchant_m->getLayanan('satuan', $id);

		if($this->input->post('submit') == 'add')
		{
			$data_sess = array(
						'id_laundry' 	=> $id,
						'jenis_layanan'	=> 'satuan',
						'uri'			=> $this->uri->segment(2)
						);
			
			$this->session->set_userdata($data_sess);

			redirect('merchant/add');
		}

		if($this->input->post('submit') == 'Edit')
		{
			$data_sess = array(
						'id_layanan'	=> $this->input->post('kode'),
						'id_laundry' 	=> $id,
						'jenis_layanan'	=> 'satuan',
						'uri'			=> $this->uri->segment(2)
						);

			$this->session->set_userdata($data_sess);

			redirect('merchant/edit');
		}

		$this->load->view('layout', $data);
	}

	public function add()
	{
		if(!$this->session->userdata('id')) redirect('user/login');

		$data['content'] = 'page/merchant/add';
		$data['count_status'] = $this->_status;
		$data['status_history'] = $this->_data_status;

		$data[$this->session->jenis_layanan] = 'active';

		$jenis_layanan = $this->session->userdata('jenis_layanan');

		$this->form_validation->set_rules('nama_layanan', 'Nama Layanan', 'min_length[5]|max_length[50]');
		$this->form_validation->set_rules('biaya', 'Biaya', 'numeric');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('layout', $data);
		}else{

			if($this->input->post('submit') == 'add')
			{
				if($jenis_layanan == 'kiloan')
				{
					$data = array(
								'id_laundry'	=> $this->session->userdata('id_laundry'),
								'jenis_layanan' => 'Kiloan',
								'nama_layanan'	=> $this->input->post('nama_layanan'),
								'biaya'			=> $this->input->post('biaya'),
							);

					$insert = $this->db->insert('layanan', $data);

					if($insert == TRUE)
					{
						$this->session->set_flashdata('success', 'Insert Data Layanan Success!');

						redirect(base_url('merchant/kiloan'));
					}else{
						$this->session->set_flashdata('failed', 'Insert Data Layanan Failed!');

						redirect(base_url('merchant/kiloan'));
					}

				}

				if($jenis_layanan == 'satuan')
				{
					$data = array(
								'id_laundry'	=> $this->session->userdata('id_laundry'),
								'jenis_layanan' => 'Satuan',
								'nama_layanan'	=> $this->input->post('nama_layanan'),
								'biaya'			=> $this->input->post('biaya'),
							);

					$insert = $this->db->insert('layanan', $data);

					if($insert == TRUE)
					{
						$this->session->set_flashdata('success', 'Insert Data Layanan Success!');

						redirect(base_url('merchant/satuan'));
					}else{
						$this->session->set_flashdata('failed', 'Insert Data Layanan Failed!');

						redirect(base_url('merchant/satuan'));
					}
				}
			}
		}
	}
}

?>