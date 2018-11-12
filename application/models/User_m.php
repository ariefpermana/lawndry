<?php 

	Class User_m extends CI_Model {

		public function check_account($username = '', $password = '')
		{
			//dump(hashpassword($password));die;
			
			$db = $this->db->get_where('user', 
				array(
					'username' 	=> $username, 
					'password' 	=> hashpassword($password)
					)
				)->row();


			return $db;
		}

		public function user_exists($key)
		{
			 $query = $this->db->get_where('user', array('username' => $key)); 

                if ($query->num_rows() > 0 )
                {
                        return FALSE;
                }
                else
                {
                   	return TRUE;
                }
		}

		public function check_active($key)
		{
			 $query = $this->db->get_where('user', 
			 								array('username' => $key,
			 									  'status' => '1'
			 									 )
			 								); 

                if ($query->num_rows() == 0 )
                {
                    return FALSE;
                }
                else
                {
                   	return TRUE;
                }
		}

		public function getUser($status = NULL,$kategori = NULL)
		{
			if(empty($status))
			{
				$db = $this->db->get_where('user', 
					array(
						'status' 	=> 0, 
						'kategori'	=> 2
						)
					)->num_rows();

			}else{
				if (!empty($kategori)) {
					$db = $this->db->get_where('user', 
					array(
						'status' 	=> $status, 
						'kategori'	=> $kategori
						)
					)->num_rows();

				}else{
					$db = $this->db->get_where('user', 
						array(
							'status' 	=> $status, 
							'kategori'	=> 2
							)
						)->num_rows();

				}
			}

			return $db;
		}

		public function reset($new = NULL, $kode =  null, $username = NULL)
		{	
			if(!empty($new))
			{
				$count = $this->db->query('SELECT update_password FROM user WHERE kode = "'.$kode.'"')->row();
				
				$totUpdate = intval($count->update_password);

				$cek = $this->db->set(array(
					'password' => hashpassword($new),
					'update_password' => $totUpdate+1
					));

			}else{
				$this->db->set(array(
					'password' => hashpassword($new),
					'update_password' => 0
					));
			}
			
			$this->db->where('kode', $kode);
			
			return $this->db->update('user');
		}

		public function getAllUser($kategori, $status = NULL)
		{
			if($status != NULL){
				return $this->db->get_where('user', 
					array('kategori' => $kategori,
						  'status'	 => $status
						 )
					)->result(); 
			}else{
			 	return $this->db->get_where('user', 
					array('kategori' => $kategori,
						 )
					)->result(); 
			}
		}

		public function updateStatus($kode, $bool)
		{
			if($bool == TRUE)
			{
				$this->db->set('status', '1');
				$this->db->where('kode', $kode);
			}else{
				$this->db->set('status', '0');
				$this->db->where('kode', $kode);				
			}

			return $this->db->update('user');
		}

		public function deleteUser($kode,$uri)
		{
			$this->db->where('kode', $kode);
			
      		$deleteUser =  $this->db->delete('user'); 

      		if($uri == 'merchant')
      		{
      			$this->db->where('id', $kode);
			
      			$deleteLaundry =  $this->db->delete('laundry');

      			if($deleteUser == TRUE && $deleteLaundry == TRUE)
      			{
      				return TRUE;
      			}else{
      				return FALSE;
      			}
      		}else{
      			if($deleteUser == TRUE)
      			{
      				return TRUE;
      			}else{
      				return FALSE;
      			}
      		}
		}

		public function getByKode($kode = NULL)
		{
			$db = $this->db->get_where('user', 
				array(
					'kode' 	=> $kode
					)
				)->row();


			return $db;
		}

		public function updateUser($kode, $data, $flag)
		{
			if($flag == 'user')
			{
				$this->db->where('kode', $kode);				

				return $this->db->update('user', $data);
			}elseif($flag == 'laundry'){
				$this->db->where('id', $kode);				

				return $this->db->update('laundry', $data);
			}
		}
	}
 ?>