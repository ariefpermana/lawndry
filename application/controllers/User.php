<?php  

/**
* 
*/
class User extends MY_Controller
{
	
	public function login()
	{
		$data['content'] = 'page/user/login';

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($this->input->post('submit') == 'signin') {
			$cekuser = $this->User_m->check_account($username,$password);

			$cekActive = $this->User_m->check_active($username);

			if($cekActive == FALSE)
			{
				$this->session->set_flashdata('failed', 'Your Account Not Verified. Please wait until your data approve.');

				redirect(base_url('user/login'));
			}

			if(!empty($cekuser))
			{

				$data_sess = array(
							'id'	   => $cekuser->id,
							'username' => $cekuser->username,
							'nama'	   => $cekuser->nama,
							'kode'	   => $cekuser->kode,
							'kategori' => $cekuser->kategori,
							'status'   => $cekuser->status,
							);

				$this->session->set_userdata($data_sess);

				//cek apabila kategori admin atau merchant laundry
				if($cekuser->kategori == '0' || $cekuser->kategori == '1')
				{
					redirect('home/admin');
				}else{
					redirect(base_url());
				}

			}else{
				//Buat Pesan gagal Login
				$this->session->set_flashdata('failed', 'Username or Password invalid, please fill correctly.');

				redirect(base_url('user/login'));

			}
		}

		$this->load->view('layout', $data);
	}

	public function register()
	{
		$data['content'] = 'page/user/register';

		$this->form_validation->set_rules('username', 'Username', 'callback_checkUserExist');
		$this->form_validation->set_rules('handphone', 'No. Handphone', 'numeric|min_length[10]|max_length[13]');
		$this->form_validation->set_rules('password', 'Password', 'min_length[5]');
		$this->form_validation->set_rules('repassword', 'Retype Password', 'min_length[5]|matches[password]');
			
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('layout', $data);
		}
		else
		{
			$data = array(
					'username' 	 => $this->input->post('username'),
					'nama'	   	 => $this->input->post('name'),
					'password'	 => hashpassword($this->input->post('password')),
					'email'		 => $this->input->post('email'),
					'handphone'	 => $this->input->post('handphone'),
					'address'	 => $this->input->post('address'),
					'kode'		 => rand(100,999),
					'kategori'	 => '2',
					'status'	 => '0',
				);
			$insertData = $this->db->insert('user', $data);

			if($insertData == TRUE)
			{
				$this->session->set_flashdata('success', 'Register Success! Thanks for register. Wait for our verify your data.');

				redirect(base_url('user/login'));
			}else{
				$this->session->set_flashdata('failed', 'Register your data failed.');

				redirect(base_url('user/register'));
			}
		}
	}

	//Check username agar tidak dobel
	public function checkUserExist($key)
	{
		$checking = $this->User_m->user_exists($key);

		if($checking == FALSE)
		{
			$this->form_validation->set_message('checkUserExist', 'Username already exist!');
			return FALSE;
		}
	}

	public function pelanggan()
	{
		if(!$this->session->userdata('id')) redirect('user/login');

		$data['content'] = 'page/user/pelanggan';

		$data['active_pelanggan'] = 'active';

		$uri = $this->uri->segment(3);

		if($uri == 'register')
		{
			$data['user'] = $this->User_m->getAllUser(2,'0');
		}elseif($uri == 'active')
		{
			$data['user'] = $this->User_m->getAllUser(2,'1');
		}else{
			$data['user'] = $this->User_m->getAllUser(2);
		}

		$kode = $this->input->post('kode');

		if($this->input->post('submit') == 'Verified')
		{
			$update = $this->User_m->updateStatus($kode, TRUE);

			if($update == TRUE)
			{
				$this->session->set_flashdata('success', 'Verified Data Success');

				redirect(base_url('user/pelanggan'));
			}else{
				$this->session->set_flashdata('failed', 'Verified Data Failed');

				redirect(base_url('user/pelanggan'));
			}
		}elseif($this->input->post('submit') == 'Inactivated'){
			$update = $this->User_m->updateStatus($kode, FALSE);

			if($update == TRUE)
			{
				$this->session->set_flashdata('success', 'Inactivated Data Success');

				redirect(base_url('user/pelanggan'));
			}else{
				$this->session->set_flashdata('failed', 'Inactivated Data Failed');

				redirect(base_url('user/pelanggan'));
			}
		}elseif($this->input->post('submit') == 'Edit') {
			$kode = $this->input->post('kode');

			$data_sess = array(
						'kode'	=> $kode,
						'uri'	=> $this->uri->segment(2),
				);

			$this->session->set_userdata($data_sess);

			redirect('user/edit');
		}

		$this->load->view('layout', $data);
	}

	public function merchant()
	{
		if(!$this->session->userdata('id')) redirect('user/login');

		$data['content'] = 'page/user/merchant';

		$data['active_merchant'] = 'active';

		$data['user'] = $this->User_m->getAllUser(1);

		$kode = $this->input->post('kode');

		if($this->input->post('submit') == 'Verified')
		{
			$update = $this->User_m->updateStatus($kode, TRUE);

			if($update == TRUE)
			{
				$this->session->set_flashdata('success', 'Verified Data Success');

				redirect(base_url('user/merchant'));
			}else{
				$this->session->set_flashdata('failed', 'Verified Data Failed');

				redirect(base_url('user/merchant'));
			}
		}elseif($this->input->post('submit') == 'Inactivated'){
			$update = $this->User_m->updateStatus($kode, FALSE);

			if($update == TRUE)
			{
				$this->session->set_flashdata('success', 'Inactivated Data Success');

				redirect(base_url('user/merchant'));
			}else{
				$this->session->set_flashdata('failed', 'Inactivated Data Failed');

				redirect(base_url('user/merchant'));
			}
		}elseif($this->input->post('submit') == 'Edit') {
			$kode = $this->input->post('kode');

			$data_sess = array(
						'kode'	=> $kode,
						'uri'	=> $this->uri->segment(2),
				);

			$this->session->set_userdata($data_sess);

			redirect('user/edit');
		}

		$this->load->view('layout', $data);
	}

	public function add_merchant()
	{
		if(!$this->session->userdata('id')) redirect('user/login');

		$data['content'] = 'page/user/add_merchant';	
		
		$this->form_validation->set_rules('username','Username','min_length[5]|max_length[50]');
		$this->form_validation->set_rules('nama','Nama','min_length[7]|max_length[50]');
		$this->form_validation->set_rules('hp','No. Handphone','min_length[10]|max_length[13]');
		$this->form_validation->set_rules('alamat','Alamat','min_length[10]|max_length[150]');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('layout', $data);
		}else{
			$username 	= $this->input->post('username');
			$nama 		= $this->input->post('nama');
			$email 		= $this->input->post('email');
			$hp 		= $this->input->post('hp');
			$alamat 	= $this->input->post('alamat');
			$kode 		= rand(1, 999);

			if(strlen($kode) == 1)
			{
				$kode = '00'.rand(1,9);
			}
			elseif(strlen($kode) == 2)
			{
				$kode = '0'.rand(10,99);
			}

			$data = array(
					'username' => $username,
					'nama'		=> $nama,
					'password'	=> hashpassword($username),
					'email'		=> $email,
					'handphone'	=> $hp,
					'address'	=> $alamat,
					'kode'		=> $kode,
					'kategori'	=> '1',
					'status'	=> '0'
				);

			$data_laundry = array(
							'id'				 => $kode,
							'nama_administrator' => $nama,
							'email'				 => $email,
							'nama_laundry'		 => $nama,
							'alamat'			 => $alamat,
							'no_hp'				 => $hp
						);

			$insertLaundry = $this->db->insert('laundry', $data_laundry);			
			
			$insertData = $this->db->insert('user', $data);

			if($insertData == TRUE && $insertLaundry == TRUE)
			{
				$this->session->set_flashdata('success', 'Adding User Merchant Success.');

				redirect('user/merchant');
			}else{
				$this->session->set_flashdata('failed', 'Adding User Merchant Failed.');

				redirect('user/add_merchant');
			}
		}
	}

	public function edit()
	{
		if(!$this->session->userdata('id')) redirect('user/login');

		$data['content'] = 'page/user/edit';	

		$data['user'] = $this->User_m->getByKode($this->session->userdata('kode'));
		$uri = $this->session->userdata('uri');
		
		$this->form_validation->set_rules('username','Username','min_length[5]|max_length[50]');
		$this->form_validation->set_rules('nama','Nama','min_length[7]|max_length[50]');
		$this->form_validation->set_rules('hp','No. Handphone','min_length[10]|max_length[13]');
		$this->form_validation->set_rules('alamat','Alamat','min_length[10]|max_length[150]');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('layout', $data);
		}else{
			$username 	= $this->input->post('username');
			$nama 		= $this->input->post('nama');
			$email 		= $this->input->post('email');
			$hp 		= $this->input->post('hp');
			$alamat 	= $this->input->post('alamat');
			$kode 		= $this->session->userdata('kode');

			$data = array(
					'nama'		=> $nama,
					'email'		=> $email,
					'handphone'	=> $hp,
					'address'	=> $alamat,
				);

			$data_laundry = array(
							'nama_administrator' => $nama,
							'email'				 => $email,
							'nama_laundry'		 => $nama,
							'alamat'			 => $alamat,
							'no_hp'				 => $hp
						);

			$insertLaundry = $this->User_m->updateUser($kode, $data, 'user');			
			
			$insertData = $this->User_m->updateUser($kode, $data_laundry, 'laundry');

			if($insertData == TRUE && $insertLaundry == TRUE)
			{
				$this->session->set_flashdata('success', 'Editing User Success.');

				redirect('user/'.$uri);
			}else{
				$this->session->set_flashdata('failed', 'Editing User Failed.');

				redirect('user/'.$uri);
			}
		}
	}

	public function reset_password()
	{
		if(!$this->session->userdata('id')) redirect('user/login');

		$data['content'] = 'page/user/reset_password';

		$this->form_validation->set_rules('newpassword','New Password','min_length[6]|max_length[12]');
		$this->form_validation->set_rules('repassword','Confirm Password','matches[newpassword]');


		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('layout', $data);
		}else{
			$newpassword = $this->input->post('newpassword');
			$kode		 = $this->session->userdata('kode');

			$resetPass = $this->User_m->reset($newpassword,$kode);

			if($resetPass == TRUE)
			{
				$this->session->set_flashdata('success', 'Password User Change Success.');

				redirect('home/admin');
			}else{
				$this->session->set_flashdata('failed', 'Password User Change Faile.');

				redirect('user/change_password');
			}

		}
	}

	public function delete()
	{
		if(!$this->session->userdata('id')) redirect(base_url());

		
		$uri = $this->session->userdata('uri');

		$kode = $this->session->userdata('kode');

		$delete = $this->User_m->deleteUser($kode,$uri);

		if($delete == TRUE)
		{
			$this->session->set_flashdata('success', 'User berhasil di Hapus.');

			redirect('user/'.$uri);
			
		}else{
			$this->session->set_flashdata('failed', 'User gagal di Hapus.');

			redirect('user/edit');
		}

	}

	public function logout()
	{	
		$this->session->sess_destroy();

		redirect(base_url());
	}	
}

?>