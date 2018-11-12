<?php 

/**
* 
*/
class Home extends MY_Controller
{
	
	public function index()
	{
		$data['content'] = 'page/home/index';

		if(!empty($this->session->userdata()))
		{
			$data['id'] = $this->session->userdata('id');
		}else{
			$data['id'] = NULL;
		}

		$data['merchant'] = $this->Merchant_m->getMerchant('home',6,NULL);

		$this->load->view('layout', $data);
	}

	public function admin()
	{
		if(!$this->session->userdata('id')) redirect('user/login');

		$kode = $this->session->userdata('kode');

		$data['content'] = 'page/home/admin';

		$data['activeUser'] = $this->User_m->getUser(1);

		$data['inactiveUser'] = $this->User_m->getUser();	

		$data['merchant']	= $this->User_m->getUser(1,1);

		$dataOrder = $this->Order_m->getOrders($kode);

		$data['orders'] = count($dataOrder);

		$orderStatus = $this->Order_m->getOrderStatus(1,$kode);

		$data['order_status'] = count($orderStatus);

		$uri = $this->uri->segment(2);
		
		$data['item'] = count($this->cart->contents());

		//===================count order konfirmasi pembayaran=====================
		$data['konfirmasi'] = count($this->Order_m->getOrders(NULL,NULL, $kode,8));
		//=========================================================================
		
		//===================count verifikasi pembayaran=====================
		$data['ver_pembayaran'] = count($this->Order_m->getOrders(NULL,NULL, $kode,9));
		//=========================================================================
		
		if($uri == 'admin'){
			$data['active_home'] = 'active';	
		}

		$this->load->view('layout', $data);
	}

	public function detail()
	{
		if(!$this->session->userdata('id')) redirect('user/login');

		$data['content'] = 'page/home/detail';

		$id = $this->uri->segment(3);

		$getMerchant = $this->Merchant_m->getMerchant($id);

		$data['merchant'] = (array)$getMerchant[0];

		$total_nilai = $this->Review_m->getTotal($id)[0];

		$count_nilai = $this->Review_m->getCountNilai($id);

		$data['nilai']	= $total_nilai['nilai']/$count_nilai;

		if(!empty($this->session->userdata()))
		{
			$data['id'] = $this->session->userdata('id');
		}else{
			$data['id'] = NULL;
		}

		$this->load->view('layout', $data);
	}

	public function more()
	{
		if(!$this->session->userdata('id')) redirect('user/login');

		//==========================membuat pagination=================================//
		//1. kofigurasi
		$config['base_url'] = site_url('home/more');
		$config['total_rows'] = $this->Merchant_m->get_total_rows();
		$config['per_page'] = $per_page = 9; //limit
		$config['use_page_numbers'] = TRUE;

		//cinfigurasi style
		$config['full_tag_open'] =  '<ul class="pagination" style="float: right;padding:10px;margin:10px;">';
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
		$config['next_tag_open'] = '<li style="margin-left:20px;">';
		$config['next_tag_close'] = '</li>';
		//previous page
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li style="margin-right:20px;">';
		$config['prev_tag_close'] = '</li>';
		//current Page/nomor aktif
		$config['cur_tag_open'] = '<li class="active"><a href="#" style="margin:20px;">';
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
		$data['content'] = 'page/home/more';

		$data['merchant'] = $this->Merchant_m->getMerchant(NULL,$per_page, $offset, 'more');

		if(!empty($this->session->userdata()))
		{
			$data['id'] = $this->session->userdata('id');
		}else{
			$data['id'] = NULL;
		}

		$this->load->view('layout', $data);
	}

	public function search()
	{
		if(!$this->session->userdata('id')) redirect('user/login');

		$value = $this->input->post('search');

		$data['merchant'] = $this->Search_m->search_merchant($value);
		//==========================membuat pagination=================================//
		//1. kofigurasi
		$config['base_url'] = site_url('home/more');
		$config['total_rows'] = $this->Merchant_m->get_total_rows($value);
		$config['per_page'] = $per_page = 9; //limit
		$config['use_page_numbers'] = TRUE;

		//cinfigurasi style
		$config['full_tag_open'] =  '<ul class="pagination" style="float: right;padding:10px;margin:10px;">';
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
		$config['next_tag_open'] = '<li style="margin-left:20px;">';
		$config['next_tag_close'] = '</li>';
		//previous page
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li style="margin-right:20px;">';
		$config['prev_tag_close'] = '</li>';
		//current Page/nomor aktif
		$config['cur_tag_open'] = '<li class="active"><a href="#" style="margin:20px;">';
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
		$data['content'] = 'page/home/more';
		
		$this->load->view('layout', $data);
	}
}

?>