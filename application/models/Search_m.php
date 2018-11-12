<?php 
    class Search_m extends CI_Model {

    public function search_merchant($value)
    {
        $query = $this->db->query('SELECT l.* FROM laundry as l LEFT JOIN user as u ON l.id = u.kode WHERE l.status = "1" AND  l.nama_laundry = "'.$value.'"  ORDER BY l.id')->result();

        if($query == NULL)
        {
             $query = $this->db->query('SELECT l.* FROM laundry as l LEFT JOIN user as u ON l.id = u.kode WHERE l.status = "1" AND  l.kelurahan = "'.$value.'"  ORDER BY l.id')->result();
        }

        return $query;
    }

}