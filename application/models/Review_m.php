<?php 
	
/**
* 
*/
class Review_m extends CI_Model
{
	
	public function getDataReview($nama = NULL)
	{
		$this->db->select('r.*, l.nama_laundry');
		$this->db->join('laundry as l','l.id = r.id_laundry','left');
		$this->db->where('r.nama_pelanggan', $nama);
		$this->db->order_by('r.tanggal_komentar DESC');
		
		return $query = $this->db->get('review as r')->result();
	}

	public function getTotal($id = NULL)
	{
		return $query = $this->db->query('SELECT sum(nilai) as nilai FROM review WHERE id_laundry ="'.$id.'"')->result_array();
	}

	public function getCountNilai($id = NULL)
	{
		return $query = $this->db->query('SELECT nilai FROM review WHERE id_laundry ="'.$id.'"')->num_rows();
	}

	public function getReview($id_laundry = NULL)
	{
		return $query = $this->db->query('SELECT * FROM review WHERE id_laundry ="'.$id_laundry.'"')->result();
	}
}

 ?>