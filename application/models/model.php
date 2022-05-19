<?php 

class Model extends CI_Model{


	public function get_all($table)
	{
		return $this->db->get($table);
	}

	public function get_order_by($table, $order, $by)
	{
		return $this->db->order_by($order, $by)->get($table);
	}

	public function get_by($table,$id, $where)
	{
		return $this->db->get_where($table, [$id=>$where]);
	}

	public function get_by_desc($table,$id, $where)
	{
		return $this->db->where([$id=>$where])->order_by('id', 'desc')->get($table);
	}

	public function get_login_user($user)
	{
		return $this->db->where('level', 3)->where('username', $user)->get('user');
	}

	public function save($table,$data)
	{
		$this->db->insert($table, $data);
	}

	public function delete($table,$pk, $where)
	{
		$this->db->delete($table, [$pk=>$where]);
	}

	public function update($table, $id, $where, $data)
	{
		$this->db->update($table, $data , [$id=>$where]);
	}

	public function reset_pass($table, $id, $where, $field)
	{
		$pass = '$2y$10$NuJpueDsXtO2jre2Dq5TXucFV8hEnOV4CLUnMAgvCpO5o2wIe6wOG';
		$data = [$field=>$pass];
		$this->db->update($table, $data, [$id=>$where]);
	}


	public function proses()
	{
		$this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('transaksi_status','transaksi.id_transaksi=transaksi_status.id_transaksi_s');
        $this->db->where('transaksi_status.selesai=0');
        $query = $this->db->get();

        return $query->result();
	}

	function kirimNotifikasi($phone,$msg)
    {
            $link  =  "https://pati.wablas.com/api/send-message";
            $data = [
            'phone' => $phone,
            'message' => $msg,
            ];
            
            
            $curl = curl_init();
            $token =  "haUygOF57uityN1AoGVvxpT3AXVdmbG1kzhRsP9pia0bAVGJ7Ob4St46pMmoPH6t";
    
            curl_setopt($curl, CURLOPT_HTTPHEADER,
                array(
                    "Authorization: $token",
                )
            );
            curl_setopt($curl, CURLOPT_URL, $link);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data)); 
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl); 
            return $result;
    }

	// get all chat
	public function get_all_chat()
	{
		$this->db->select('chat.*, nama, username');
		$this->db->from('chat');
		$this->db->join('user','chat.user_id = user.id');
		$this->db->order_by('last_message','desc');
		$query = $this->db->get();
		return $query;
	}

	// get_chat_by_id
	public function get_chat_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('chat');
		$this->db->join('user','chat.user_id = user.id');
		$this->db->where('chat.id',$id);
		$query = $this->db->get();
		return $query;
	}

	// get message by id
	public function get_message_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('chat_message');
		$this->db->where('chat_id', $id);
		$query = $this->db->get();
		return $query;
	}


}
 ?>