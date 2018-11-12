<?php 
	
/**
* 
*/
class Review_m extends CI_Model
{
	
	public function getDataReview($nama = NULL)
	{
		$this->db->select('k.*, l.nama_laundry');
		$this->db->join('laundry as l','l.id = k.id_laundry','left');
		$this->db->where('k.nama_pelanggan', $nama);
		$this->db->order_by('k.tanggal_komentar DESC');
		
		return $query = $this->db->get('komentar as k')->result();
	}

	public function getTotal($id = NULL)
	{
		return $query = $this->db->query('SELECT sum(nilai) as nilai FROM komentar WHERE id_laundry ="'.$id.'"')->result_array();
	}

	public function getCountNilai($id = NULL)
	{
		return $query = $this->db->query('SELECT nilai FROM komentar WHERE id_laundry ="'.$id.'"')->num_rows();
	}

	public function getReview($id_laundry = NULL)
	{
		return $query = $this->db->query('SELECT * FROM komentar WHERE id_laundry ="'.$id_laundry.'"')->result();
	}
}

 ?>