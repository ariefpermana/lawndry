<?php 

/**
* 
*/
class Merchant_m extends CI_Model
{
	
	public function getMerchant($kode = NULL, $per_page = 0, $offset = 0, $flag = NULL)
	{
		if($kode == 'home')//untuk tampilan di home
		{
			return $query = $this->db->query('SELECT l.* FROM laundry as l LEFT JOIN user as u ON l.id = u.kode WHERE u.status = "1" AND l.status = "1" ORDER BY l.id LIMIT '.$per_page.$offset)->result();
		}

		if($flag == 'more')
		{
			return $query = $this->db->query('SELECT l.* FROM laundry as l LEFT JOIN user as u ON l.id = u.kode WHERE l.status = "1" ORDER BY l.id LIMIT '.$per_page.$offset)->result();
		}
		elseif($kode == NULL)//untuk tampilan di profile
		{
			return $query = $this->db->query('SELECT l.* FROM laundry as l LEFT JOIN user as u ON l.id = u.kode WHERE u.status = "1" ORDER BY l.id LIMIT '.$per_page.$offset)->result();
		}else{
			return $this->db->get_where('laundry', array('id' => $kode))->result();
		}
	}

	public function get_total_rows($value = NULL)
	{	
		if($value == NULL)
		{
			$query = $this->db->get('laundry')->num_rows();//dapatkan total data dalam table laundry
		}else{
			$query = $this->db->get_where('laundry', array('nama_laundry' => $value))->num_rows();//dapatkan total data dalam table laundry sesuai value

			if($query == 0)
			{
				$query = $this->db->get_where('laundry', array('kelurahan' => $value))->num_rows();
			}
		}

		return $query;
	}

	public function updateData($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('laundry', $data);
	}

	public function getLayanan($value=NULL,$id)
	{
		return $query = $this->db->query('SELECT l.nama_laundry, ly.* FROM laundry as l LEFT JOIN layanan as ly ON l.id = ly.id_laundry WHERE l.id = "'.$id.'" AND ly.jenis_layanan = "'.$value.'"')->result();
	}

	public function getDetail($id = NULL)
	{
		return $this->db->get_where('layanan', array('id' => $id))->row();
	}

	public function updateLayanan($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('layanan', $data);
	}
}

?>