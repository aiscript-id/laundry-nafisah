<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class chat extends CI_Controller {

	var $folder = 'chat/';
	var $layout = 'chat/layout';

	function __construct(){
		parent::__construct();
		$this->load->model(['model', 'validation']);
		$this->load->library(['form_validation']);
	}

	public function index()
	{
		$data = ['content'=> $this->folder.('index')];
		$this->load->view($this->layout, $data);
	}

	public function create_chat()
	{
		$chat = $this->db->where('user_id', $this->session->userdata('id'))->get('chat')->row();
		if (!@$chat) {
			$data = [
				'user_id' => $this->session->userdata('id'),
				'last_message' => date('Y-m-d H:i:s'),
			];
			$this->db->insert('chat', $data);
			$chat = $this->db->where('user_id', $this->session->userdata('id'))->get('chat')->row();
		}

		$messages = $this->db->where('chat_id', $chat->id)->order_by('created_at', 'asc')->get('chat_message')->result();
		$data = [
			'content'=> $this->folder.('index'),
			'chat' => $chat,
			'messages' => $messages,
		];
		$this->load->view($this->layout, $data);
	}

	public function send_message()
	{
		$chat = $this->db->where('user_id', $this->session->userdata('id'))->get('chat')->row();
		$data = [
			'chat_id' => $chat->id,
			'message' => $this->input->post('message'),
			'side'	  => 2,
			'created_at' => date('Y-m-d H:i:s'),
		];
		$this->db->insert('chat_message', $data);
		$this->db->where('user_id', $this->session->userdata('id'))->update('chat', ['last_message' => date('Y-m-d H:i:s')]);

		// redirect back
		redirect('chat/create_chat');

	}

	// from admin
	// reply chat
	

	

}

/* End of file UserController.php */
/* Location: ./application/controllers/UserController.php */