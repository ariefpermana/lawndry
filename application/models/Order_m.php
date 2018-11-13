<?php 

/**
* 
*/
class Order_m extends CI_Model
{
	
	public function getDataLayanan($id=NULL,$jenis=NULL)
	{
		return $this->db->get_where('layanan', 
									array('id_laundry' 	 => $id,
									      'jenis_layanan' => $jenis
									))->result_array();
	}

	public function getOrders($kode = NULL, $flag = NULL, $id_order = NULL, $status = NULL)
	{
		//untuk Get Status konfirmasi pembayaran
		if($status != NULL)
		{
			$this->db->select('*, od.id as id');
			$this->db->join('order_detail as od','od.id_order = o.id','left');
			$this->db->join('status_order as s','s.id = od.id_status_order','left');
			$this->db->where('o.id_pelanggan',$id_order);
			$this->db->where('od.id_status_order', $status);
			$this->db->order_by('o.tanggal_transaksi DESC');
			$query = $this->db->get('order as o')->result();
		}
		elseif($flag == 'detail')
		{
			$this->db->select('*, od.id as id');
			$this->db->join('order_detail as od','od.id_order = o.id','left');
			$this->db->join('status_order as s','s.id = od.id_status_order','left');
			$this->db->where('od.id_status_order NOT IN ("15","2")');
			$this->db->where('od.id_order', $id_order);
			$this->db->order_by('o.tanggal_transaksi DESC');
			$query = $this->db->get('order as o')->result();
			
			if(empty($query))
			{
				$this->db->select('*, od.id as id');
				$this->db->join('order_detail as od','od.id_order = o.id','left');
				$this->db->join('status_order as s','s.id = od.id_status_order','left');
				$this->db->where('od.id_status_order NOT IN ("15","2")');
				$this->db->where('od.id', $id_order);
				$this->db->order_by('o.tanggal_transaksi DESC');
				$query = $this->db->get('order as o')->result();
			}
		}else{
			$this->db->select('*');
			$this->db->join('order_detail as od','od.id_order = o.id','left');
			$this->db->join('status_order as s','s.id = od.id_status_order','left');
			$this->db->where('o.id_pelanggan',$kode);
			$this->db->where('od.id_status_order != "15"');
			$this->db->group_by('od.id_order');// add group_by
			$this->db->order_by('o.tanggal_transaksi DESC');
			$query = $this->db->get('order as o')->result();
		}

		if(empty($query))
		{
			$this->db->select('*, od.id as id');
			$this->db->join('order_detail as od','od.id_order = o.id','left');
			$this->db->join('status_order as s','s.id = od.id_status_order','left');
			$this->db->where('od.id_laundry',$kode);
			$this->db->where('od.id_status_order != "15"');
			$this->db->order_by('o.tanggal_transaksi DESC');
			$query = $this->db->get('order as o')->result();
		}

		return $query;
	}

	public function updateOrder($data = NULL, $id_order = NULL, $flag = NULL)
	{
		if($flag == 'order')
		{
			$this->db->where('id', $id_order);
		
			return $this->db->update('order', $data);
		}elseif ($flag == 'detail') {
			$this->db->where('id', $id_order);
		
			return $this->db->update('order_detail', $data);
		}elseif ($flag == 'edit') {
			$this->db->where('id', $id_order);
		
			return $this->db->update('order_detail', $data);
		}
	}

	public function getPembayaran($id_laundry = NULL)
	{
		$this->db->select('o.tanggal_transaksi, od.*,od.id as id_detail, p.*, p.id as id_pembayaran');
		$this->db->join('order as o','od.id_order = o.id','left');
		$this->db->join('pembayaran as p','p.id = od.id_pembayaran','left');
		$this->db->where('od.id_status_order = "9"');
		$this->db->where('od.id_laundry', $id_laundry);
		$this->db->order_by('od.id DESC');
		return $query = $this->db->get('order_detail as od')->result();
	}

	public function verifyPembayaran($id_detail)
	{
		$this->db->set('id_status_order', '10');
		$this->db->where('id', $id_detail);
		
		return $this->db->update('order_detail');
	}

	public function getOrderStatus($status,$kode)
	{
		$this->db->select('*, od.id as id');
		$this->db->join('order_detail as od','od.id_order = o.id','left');
		$this->db->join('status_order as s','s.id = od.id_status_order','left');
		$this->db->where('od.id_laundry',$kode);
		$this->db->where('od.id_status_order', $status);
		$this->db->order_by('o.tanggal_transaksi DESC');
		return $query = $this->db->get('order as o')->result();
	}

	public function getDetail($id)
	{
		return $this->db->get_where('order_detail', 
									array('id' 	 => $id,
									))->row();
	}

	public function getStatus()
	{
		$this->db->select('*');
		$this->db->where('id NOT IN (1,2,3,15)');
		return $query = $this->db->get('status_order')->result();
	}

	public function updateStatus($id = NULL, $data = NULL)
	{
		$this->db->where('id', $id);
		
		return $this->db->update('order_detail', $data);
	}

	public function getHistory($status)
	{
		$this->db->select('*, od.id as id');
			$this->db->join('order_detail as od','od.id_order = o.id','left');
			$this->db->join('status_order as s','s.id = od.id_status_order','left');
			$this->db->where('od.id_status_order IN ('.$status.')');
			$this->db->order_by('o.tanggal_transaksi DESC');
			return $query = $this->db->get('order as o')->result();
	}
}

?>