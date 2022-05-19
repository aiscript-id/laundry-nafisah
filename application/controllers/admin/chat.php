<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

	class Chat extends CI_Controller{

		var $table		= 'chat';
		var $section	= 'Chat';
		var $folder		= 'chat/';

		function __construct(){
			parent::__construct();
			if($this->session->userdata('masuk') !=TRUE or $this->session->userdata('level') == 3){
	            redirect(base_url('')); 
	        };
			$this->load->model(['model','validation']);
			$this->load->library(['form_validation','encryption']);
		}

		public function index()
		{
			$data = ['content'	=> $this->folder.('view'),
					 'section'	=> $this->section,
					 'tampil'	=> $this->model->get_all_chat()->result()];
			$this->load->view('template/template', $data);
		}

		public function add()
		{
			$data = ['content'	=> $this->folder.('post'),
					 'section'	=> $this->section,
					 ];
			$this->load->view('template/template', $data);
		}

		public function save()
		{
			$post		= $this->input->post();
			$validasi 	= $this->form_validation->set_rules($this->validation->val_user());
			if($validasi->run()==false)
			{
				$data = ['content'	=> $this->folder.('post'),
						 'section'	=> $this->section,
						 ];
				$this->load->view('template/template', $data);
			}else{
				$data = [
							'id' 		=> null,
							'nama'		=> $post['nama'],
							'username'	=> $post['username'],
							'password'	=> password_hash($post['password1'], PASSWORD_DEFAULT),
							'level'		=> $post['level']
						];
				$this->model->save($this->table, $data);
				$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di simpan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('admin/user/add');
			}
		}


		public function reset($id=null)
		{
			if(!isset($id)) show_404();
			$id=str_replace(['-','_','~',],['=','+','/'], $id);
			$id=$this->encryption->decrypt($id);

			$this->model->reset_pass($this->table, 'id', $id, 'password');
			$this->session->set_flashdata('flash','<div class="alert alert-success alert-dismissible fade show" role="alert"><b>Password</b> berhasil di reset.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/user');

		}

		public function delete($id=null)
		{
			if(!isset($id)) show_404();
			$id=str_replace(['-','_','~'],['=','+','/'],$id);
			$id=$this->encryption->decrypt($id);

			$this->model->delete($this->table,'id',$id);
			$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di hapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/user');
		}

		// reply
		public function reply($id)
		{
			$data = ['content'	=> $this->folder.('reply'),
					 'section'	=> $this->section,
					 'chat'		=> $this->model->get_chat_by_id($id)->row(),
					 'messages' => $this->model->get_message_by_id($id)->result()
					];

					//  var_dump($data['chat']);
			$this->load->view('template/template', $data);
		}

		public function send_message($user_id)
		{
			$chat = $this->db->where('user_id', $user_id)->get('chat')->row();
			$data = [
				'chat_id' => $chat->id,
				'message' => $this->input->post('message'),
				'side'	  => 1,
				'created_at' => date('Y-m-d H:i:s'),
			];
			$this->db->insert('chat_message', $data);
			$this->db->where('user_id', $user_id)->update('chat', ['last_message' => date('Y-m-d H:i:s')]);

			// redirect back
			redirect('admin/chat/reply/'.$chat->id);

		}

	}
?>