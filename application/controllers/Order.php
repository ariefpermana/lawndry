<?php  

/**
* 
*/
class Order extends MY_Controller
{
	
	public function satuan()
	{
		if(!$this->session->userdata('id')) redirect('user/login');

		$data['content'] = 'page/order/satuan';

		$data['id'] = $this->session->userdata('id');

		$id_laundry = $this->uri->segment(3);

		$dataSatuan	= $this->Order_m->getDataLayanan($id_laundry,'satuan');

		foreach ($dataSatuan as $value) {
			$biaya[$value['id']] 		= $value['biaya'];
		}

		$data['satuan'] = $dataSatuan;
		
		if(isset($biaya)){
			$data['biaya'] = $biaya;
		}

		$this->form_validation->set_rules('jumlah', 'Jumlah', 'numeric|max_length[2]');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('layout', $data);
		}else{
			if($this->input->post('submit') == 'cart' || $this->input->post('submit') == 'checkout')
			{
				if($this->input->post('layanan') == 0)
				{
					$this->session->set_flashdata('failed', 'Please Select Nama Layanan.');

					redirect('order/satuan/'.$id_laundry);
				}
				
				$biaya 			= $this->input->post('biaya');
				$jumlah 		= $this->input->post('jumlah');
				$jenis_layanan 	= $this->input->post('jenis_layanan');
				$nama_layanan 	= preg_replace('/[^A-Za-z0-9\ ]/', ' ', $this->input->post('nama_layanan'));
				$id_layanan 	= $this->input->post('layanan');
				
				$data = array(
						'id'		=> $id_layanan,
						'qty'		=> $jumlah,
						'price'		=> $biaya,
						'name'		=> $nama_layanan,
						'option'	=> array('jenis_layanan' => $jenis_layanan,
											 'id_merchant'	 => $id_laundry
											)
				);

				$addtocart = $this->cart->insert($data);

				if($this->input->post('submit') == 'checkout')
				{
					redirect('order/checkout');
				}

				if($addtocart == TRUE){
					$this->session->set_flashdata('success', 'Orderan anda dimasukan ke keranjang.');

					redirect('order/satuan/'.$id_laundry);
				}else{
					$this->session->set_flashdata('failed', 'Orderan anda gagal dimasukan ke keranjang.');

					redirect('order/satuan/'.$id_laundry);
				}
			}
		}
	}

	public function kiloan()
	{
		if(!$this->session->userdata('id')) redirect('user/login');

		$data['content'] = 'page/order/kiloan';	

		$data['id'] = $this->session->userdata('id');

		$id_laundry = $this->uri->segment(3);

		$dataKiloan	= $this->Order_m->getDataLayanan($id_laundry,'kiloan');

		foreach ($dataKiloan as $value) {
			$biaya[$value['id']] 		= $value['biaya'];
		}

		$data['kiloan'] = $dataKiloan;
		$data['biaya'] = $biaya;

		$this->form_validation->set_rules('berat', 'Berat', 'numeric|max_length[2]');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('layout', $data);
		}else{
			if($this->input->post('submit') == 'cart' || $this->input->post('submit') == 'checkout')
			{
				if($this->input->post('layanan') == 0)
				{
					$this->session->set_flashdata('failed', 'Please Select Nama Layanan.');

					redirect('order/kiloan/'.$id_laundry);
				}
				
				$biaya 			= $this->input->post('biaya');
				$berat 			= $this->input->post('berat');
				$jumlah			= $this->input->post('satuan');
				$jenis_layanan 	= $this->input->post('jenis_layanan');
				$nama_layanan 	= preg_replace('/[^A-Za-z0-9\ ]/', ' ', $this->input->post('nama_layanan'));
				$id_layanan 	= $this->input->post('layanan');

				$data = array(
						'id'		=> $id_layanan,
						'qty'		=> $berat,
						'price'		=> $biaya,
						'name'		=> $nama_layanan,
						'option'	=> array('jenis_layanan' => $jenis_layanan,
											 'jumlah'	 	 => $jumlah,
											 'id_merchant'	 => $id_laundry
											)
				);

				$addtocart = $this->cart->insert($data);

				if($this->input->post('submit') == 'checkout')
				{
					redirect('order/checkout');
				}

				if($addtocart == TRUE){
					$this->session->set_flashdata('success', 'Orderan anda dimasukan ke keranjang.');

					redirect('order/kiloan/'.$id_laundry);
				}else{
					$this->session->set_flashdata('failed', 'Orderan anda gagal dimasukan ke keranjang.');

					redirect('order/kiloan/'.$id_laundry);
				}
			}
		}
	}

	public function checkout()
	{
		if(!$this->session->userdata('id')) redirect('user/login');

		$data['items'] = $this->cart->contents();

		$id_pelanggan = $this->session->userdata('kode');

		$data['order_number'] = $id_pelanggan.date('Ymd').rand(1,999);

		$data['content'] = 'page/order/checkout';

		$id_pelanggan = $this->session->userdata('kode');

		$dataPelanggan = $this->User_m->getByKode($id_pelanggan);

		if($this->input->post('submit') == 'finish')
		{
			$data_order = array(
					'id' 				=> $this->input->post('order_number'),
					'id_pelanggan'		=> $this->session->userdata('kode'),
					'total_harga'		=> $this->cart->total(),
					'alamat_penjemputan'=> $dataPelanggan->address,
					'tanggal_transaksi'	=> date('Y-m-d')
				);
			
			$insert_order = $this->db->insert('order', $data_order);

			foreach ($data['items'] as $key => $value) {

				$berat = 0;
				$jumlah = 0;

				if($value['option']['jenis_layanan'] == 'Satuan')
				{

					$jumlah = $value['qty'];
				}

				if($value['option']['jenis_layanan'] == 'Kiloan')
				{

					$berat 	= $value['qty'];
					$jumlah = $value['option']['jumlah'];
				}

				$data_detail = array(
								'id_order' 			=> $this->input->post('order_number'),
								'id_laundry'		=> $value['option']['id_merchant'],
								'jenis_layanan'		=> $value['option']['jenis_layanan'],
								'nama_layanan'		=> str_replace('  ', '', $value['name']),
								'harga'				=> $value['price'],
								'berat_cucian'		=> $berat,
								'jumlah_satuan'		=> $jumlah,
								'subtotal'			=> $value['subtotal'],
								'id_status_order' 	=> 1,
							);

				$insert_detail = $this->db->insert('order_detail', $data_detail);
			}

			if($insert_order == TRUE && $insert_detail == TRUE)
			{
				$this->cart->destroy();

				$this->session->set_flashdata('success', 'Orderan Anda Berhasil Dibuat.');

				redirect('order/checkout');
			}else{
				$this->session->set_flashdata('failed', 'Orderan Anda Gagal Dibuat.');

				redirect('order/checkout');
			}
		}

		$this->load->view('layout', $data);
	}

	public function my_orders()
	{
		if(!$this->session->userdata('id')) redirect(base_url());

		$data['content'] = 'page/order/my_orders';

		$data['my_orders'] = 'active';

		$uri = $this->uri->segment(3);

		$kode = $this->session->userdata('kode');

		if($uri == 'verified'){
			$data['orders'] = $this->Order_m->getOrderStatus(1,$kode);
		}else{
			$data['orders'] = $this->Order_m->getOrders($kode);
		}

		// if($this->input->post('submit') == 'Konfirmasi')
		// {
		// 	$id_order = $this->input->post('id_order');


		// 	redirect('order/konfirmasi_pembayaran/'.$id_order);

		// }

		$this->load->view('layout', $data);
	}

	public function konfirmasi_pembayaran()
	{
		if(!$this->session->userdata('id')) redirect(base_url());

		$data['my_orders'] = 'active';

		$id_order  = $this->uri->segment(3);
		$id_detail = $this->uri->segment(4);

		$data['id_order'] = $id_order;

		$data['content'] = 'page/order/konfirmasi_pembayaran';

		if($this->input->post('submit') == 'submit')
		{
			$nama_rek 		= $this->input->post('nama_rek');
			$id_pembayaran 	= $data['id_order'].$id_detail.rand(1,999);

			$upload = $this->Upload_m->upload_bukti();

			if(!empty($upload['error'])) 
			{
				$error = strip_tags($upload['error']);

				if(!emoty($error))
				{
					$this->session->set_flashdata('failed', $error);

					redirect(base_url('order/konfirmasi_pembayaran/'.$data['id_order']));
				}
			}

			$data = array(
						'id'				=> $id_pembayaran,
						'nama_rek_pengirim'	=> $nama_rek,
						'bukti_pembayaran'	=> $upload['file_name']
					);

			$data_detail = array(
						'id_status_order'	=> '9',
						'id_pembayaran'		=> $id_pembayaran,
					);


			$insert_pembayaran = $this->db->insert('pembayaran', $data);
			$update_detail = $this->Order_m->updateOrder($data_detail,$id_detail,'detail');

			if($insert_pembayaran == TRUE && $update_detail == TRUE)
			{
			 	$this->session->set_flashdata('success', 'Konfirmasi pembayaran Success!');

				redirect(base_url('order/my_orders'));
			}else{
			 	$this->session->set_flashdata('failed', 'Konfirmasi pembayaran Failed!');

				redirect(base_url('order/my_orders'));
			}
		}

		$this->load->view('layout', $data);
	}

	public function detail()
	{
		if(!$this->session->userdata('id')) redirect(base_url());

		$data['content'] = 'page/order/detail';

		$data['my_orders'] = 'active';

		$id_order = $this->uri->segment(3);

		//untuk detail konfirmasi pembayaran pelanggan
		$status = $this->uri->segment(4);

		$data['orders'] = $this->Order_m->getOrders(NULL,'detail', $id_order,$status);

		if($this->input->post('submit') == 'Konfirmasi')
		{	
			$id_detail = $this->input->post('id_detail');
			$id_order  = $this->input->post('id_order');

			redirect('order/konfirmasi_pembayaran/'.$id_order.'/'.$id_detail);
		}

		if($this->input->post('submit') == 'Verify Order')
		{
			$id_detail = $this->input->post('id_detail');

			$status = '3';

			$data = array('id_status_order' => $status);

			$updateStatus = $this->Order_m->updateStatus($id_detail,$data);

			if($updateStatus == TRUE)
			{
			 	$this->session->set_flashdata('success', 'Verify Order Success!');

				redirect(base_url('order/my_orders'));
			}else{
			 	$this->session->set_flashdata('failed', 'Verify Order Failed!');

				redirect(base_url('order/my_orders'));
			}

		}elseif($this->input->post('submit') == 'Cancel Order')
		{
			$id_detail = $this->input->post('id_detail');

			$status = '2';

			$data = array('id_status_order' => $status);

			$updateStatus = $this->Order_m->updateStatus($id_detail,$data);

			if($updateStatus == TRUE)
			{
			 	$this->session->set_flashdata('success', 'Cancel Order Success!');

				redirect(base_url('order/my_orders'));
			}else{
			 	$this->session->set_flashdata('failed', 'Cancel Order Failed!');

				redirect(base_url('order/my_orders'));
			}
		}

		if($this->input->post('submit') == 'Finish')
		{
			$id_detail = $this->input->post('id_detail');
			$id_order  = $this->input->post('id_order');
			$id_laundry = $this->input->post('id_laundry');

			$data_sess = array(
						'id_detail'		=> $id_detail,
						'id_order'		=> $id_order,
						'id_laundry'	=> $id_laundry
						);

			$this->session->set_userdata($data_sess);

			$status = '15';

			$data = array('id_status_order' => $status);

			$updateStatus = $this->Order_m->updateStatus($id_detail,$data);

			if($updateStatus == TRUE)
			{
			 	//$this->session->set_flashdata('success', 'Update Status Order Success!');

				redirect(base_url('review/isi_review'));
			}else{
			 	$this->session->set_flashdata('failed', 'Update Status Order Failed!');

				redirect(base_url('order/my_orders'));
			}

		}

		$this->load->view('layout', $data);
	}

	public function edit()
	{
		if(!$this->session->userdata('id')) redirect(base_url());

		$data['content'] = 'page/order/edit';

		$data['my_orders'] = 'active';

		$id_detail = $this->uri->segment(3);

		$data['order'] = $this->Order_m->getOrders(NULL,'detail', $id_detail)[0];

		if($this->input->post('submit') == 'save')
		{

			$satuan 	 = $this->input->post('jumlah_satuan');
			$total_harga = $this->input->post('total_harga');

			$data = array(
				'jumlah_satuan'		=> $satuan,
				'subtotal'			=> $total_harga
				);

			if(!empty($this->input->post('berat_cucian')))
			{
				$berat = $this->input->post('berat_cucian');
				$dataBerat = array(
					'berat_cucian' => $berat	
				);

				$data = array_merge($data,$dataBerat);
			}

			$update_detail = $this->Order_m->updateOrder($data,$id_detail, 'edit');

			if($update_detail == TRUE)
			{
			 	$this->session->set_flashdata('success', 'Edit Order Success!');

				redirect(base_url('order/detail/'.$id_detail));
			}else{
			 	$this->session->set_flashdata('failed', 'Edit Order Failed!');

				redirect(base_url('order/detail/'.$id_detail));
			}
		}
		$this->load->view('layout', $data);

	}

	public function order_history()
	{
		if(!$this->session->userdata('id')) redirect(base_url());

		$data['content'] = 'page/order/order_history';

		$data['order_history'] = 'active';

		$data['orders'] = $this->Order_m->getHistory(15);

		$this->load->view('layout', $data);
	}

	public function verifikasi()
	{
		if(!$this->session->userdata('id')) redirect(base_url());

		$data['content'] = 'page/order/verifikasi';

		$data['verifikasi'] = 'active';

		$id_laundry = $this->session->userdata('kode');

		$data['pembayaran'] = $this->Order_m->getPembayaran($id_laundry);

		$this->load->view('layout', $data);
	}

	public function update()
	{
		if(!$this->session->userdata('id')) redirect(base_url());

		$data['content'] = 'page/order/update';

		$data['my_orders'] = 'active';

		$uri = $this->uri->segment(3);

		$data['detail'] = $this->Order_m->getDetail($uri);

		$data['status'] = $this->Order_m->getStatus();

		$dataDetail = $data['detail'];

		if($this->input->post('submit') == 'submit')
		{
			$status 		= $this->input->post('status');
			$last_status 	= $dataDetail->id_status_order; 

			if($status == "0")
			{
				$this->session->set_flashdata('failed', 'Harap Pilih Status!');

				redirect(base_url('order/update/'.$uri));
			}

			if(intval($status) <= intval($last_status))
			{
				$this->session->set_flashdata('failed', 'Status Yang Dipilih tidak boleh status sebelumnya !!');

				redirect(base_url('order/update/'.$uri));
			}

			if(bcsub(intval($status), intval($last_status)) > 1)
			{
				$this->session->set_flashdata('failed', 'Status Yang Dipilih harus Berurut dari Status Sebelumnya!!');

				redirect(base_url('order/update/'.$uri));
			}

			if($last_status == '3')
			{
				$tgl_penjemputan = $this->input->post('tgl_penjemputan');

				$data_tgl = array('tanggal_penjemputan'	=> $tgl_penjemputan);

				if(strtotime($tgl_penjemputan) < strtotime(date('Y-m-d')))
				{
					$this->session->set_flashdata('failed', 'Tanggal penjemputan tidak boleh lebih kecil dari hari ini!');

					redirect(base_url('order/update/'.$uri));
				}

			}elseif($last_status == '10')
			{
				$tgl_pengembalian = $this->input->post('tgl_pengembalian');

				$data_tgl = array('tanggal_pengembalian' => $tgl_pengembalian);

				if(strtotime($tgl_pengembalian) < strtotime(date('Y-m-d')))
				{
					$this->session->set_flashdata('failed', 'Tanggal pengembalian tidak boleh lebih kecil dari hari ini!');

					redirect(base_url('order/update/'.$uri));
				}
			}

			$data = array(
						'id_status_order'			=> $status
					);

			if(isset($data_tgl)){
				$data = array_merge($data,$data_tgl);
			}

			$updateStatus = $this->Order_m->updateStatus($uri,$data);

			if($updateStatus == TRUE)
			{
			 	$this->session->set_flashdata('success', 'Update Status Order Success!');

				redirect(base_url('order/my_orders'));
			}else{
			 	$this->session->set_flashdata('failed', 'Update Status Order Failed!');

				redirect(base_url('order/my_orders'));
			}

		}

		$this->load->view('layout', $data);
	}

	public function verify()
	{
		if(!$this->session->userdata('id')) redirect(base_url());

		$id_detail = $this->uri->segment(3);

		$verify = $this->Order_m->verifyPembayaran($id_detail);

		if($verify == TRUE)
		{
		 	$this->session->set_flashdata('success', 'Verifikasi pembayaran Success!');

			redirect(base_url('order/verifikasi'));
		}else{
		 	$this->session->set_flashdata('failed', 'Verifikasi pembayaran Failed!');

			redirect(base_url('order/verifikasi'));
		}
	}

	public function delete()
	{
		if(!$this->session->userdata('id')) redirect(base_url());

		$uri = $this->uri->segment(3);

		$data = array(
			'rowid' => $uri,
			'qty'	=> 0
			);

		$delete = $this->cart->update($data);

		if($delete == TRUE)
		{
			$this->session->set_flashdata('success', 'List Order berhasil di Hapus.');

			redirect('order/checkout');
		}else{
			$this->session->set_flashdata('failed', 'List Order gagal di Hapus.');

			redirect('order/checkout');
		}
	}
}

?>