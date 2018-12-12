<?php 
	
/**
* 
*/
class Review extends MY_Controller
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

		$this->_data_status = $data_status;
		$this->_status = $tot_status;
	}
	
	public function isi_review()
	{
		if(!$this->session->userdata('id')) redirect(base_url());

		$data['content'] = 'page/review/isi_review';
		$data['count_status'] = $this->_status;
		$data['status_history'] = $this->_data_status;

		$data['review'] = 'active';

		$id_laundry = $this->session->userdata('id_laundry');

		$data['laundry'] = $this->Merchant_m->getMerchant($id_laundry)[0];

		if($this->input->post('submit') == 'Submit')
		{
			$nama_pelanggan = $this->session->userdata('nama');
			$id_laundry = $this->session->userdata('id_laundry');
			$komentar 		= $this->input->post('komentar');
			$nilai			= $this->input->post('star');
			$tanggal		= date('Y-m-d');

			$data = array(
						'id_laundry'		=> $id_laundry,
						'tanggal_komentar'	=> $tanggal,
						'komentar'			=> $komentar,
						'nilai'				=> $nilai,
						'nama_pelanggan'	=> $nama_pelanggan	
					);

			$insert = $this->db->insert('komentar', $data);

			if($insert == TRUE)
			{
				$this->session->set_flashdata('success', 'Terimakasih sudah memberikan Ulasan.');

				redirect(base_url('home/admin'));
			}else{
				$this->session->set_flashdata('failed', 'Ulasan Gagal Dibuat!');

				redirect(base_url('review/isi_review'));
			}
		}

		$this->load->view('layout', $data);
	}

	public function history()
	{
		if(!$this->session->userdata('id')) redirect(base_url());

		$data['content'] = 'page/review/history';
		$data['count_status'] = $this->_status;
		$data['status_history'] = $this->_data_status;

		$data['history'] = 'active';

		$nama_pelanggan = $this->session->userdata('nama');

		$data['review'] = $this->Review_m->getDataReview($nama_pelanggan);

		$this->load->view('layout', $data);
	}

	public function detail()
	{
		if(!$this->session->userdata('id')) redirect(base_url());

		$data['content'] = 'page/review/detail';
		$data['count_status'] = $this->_status;
		$data['status_history'] = $this->_data_status;

		$id_laundry = $this->uri->segment(3);

		$data['review']	= $this->Review_m->getReview($id_laundry);

		$this->load->view('layout', $data);
	}
}

 ?>