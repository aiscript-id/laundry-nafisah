<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	var $folder 	= 'users/';
	var $table 		= 'user';
	var $section 	= 'Login';
	var $layout = 'users/layout';


	function __construct()
	{
		parent::__construct();
		$this->load->model(['model','validation']);
		$this->load->library(['form_validation','encryption']);
	}


	public function register(){
		$data = ['content'=> $this->folder.('register')];
		$this->load->view($this->layout, $data);
	}

	public function save()
	{
		$post		= $this->input->post();
		$validasi 	= $this->form_validation->set_rules($this->validation->val_user());
		if($validasi->run()==false)
		{
			$data = ['content'	=> $this->folder.('register'),
					 'section'	=> $this->section,
					 ];
			$this->load->view($this->layout, $data);
		}else{
			$data = [
						'id' 		=> null,
						'nama'		=> $post['nama'],
						'username'	=> $post['username'],
						'password'	=> password_hash($post['password1'], PASSWORD_DEFAULT),
						'whatsapp'  => $post['whatsapp'],
						'level'		=> 3
					];
			$this->model->save($this->table, $data);
			// $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di simpan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			// redirect('admin/user/add');

		$user 	= $post['username'];
		$pass	= $post['password1'];
		$cek 	= $this->model->get_by($this->table, 'username' ,$user)->row_array();
		if($cek){
			if(password_verify($pass, $cek['password'])){
				$data = [
						'masuk'		=>true,
						'id'		=>$cek['id'],
						'username'	=>$cek['username'],
						'nama'		=>$cek['nama'],
						'level'		=>$cek['level']
						];
				$this->session->set_userdata($data);
				redirect('dashboard');
			}else{
				$data = ['content' 	=> $this->folder.('register'),
						 'section'	=> $this->section,
						];
				$this->session->set_flashdata('flash','<div class="alert alert-danger" role="alert">Password yang anda masukkan salah! </div>' );
				$this->load->view($this->folder.('register'), $data);
			}
		}else{
			$data = ['content' 	=> $this->folder.('register'),
					 'section'	=> $this->section,
					];
			$this->session->set_flashdata('flash','<div class="alert alert-danger" role="alert">Username tidak ada! </div>' );
			$this->load->view($this->folder.('register'), $data);
		}
		}
	}

	public function login()
	{

		$post 	= $this->input->post();
		$user 	= $post['username'];
		$pass	= $post['password'];
		$cek 	= $this->model->get_login_user($user)->row_array();
		$validasi = $this->form_validation->set_rules($this->validation->val_login());
		
		if($validasi->run()==false)
		{
			$data = ['content' 	=> $this->folder.('login'),
					 'section'	=> $this->section,
					];
			$this->load->view($this->layout, $data);
		}else{
			if($cek){
				if(password_verify($pass, $cek['password'])){
					$data = [
							'masuk'		=>true,
							'id'		=>$cek['id'],
							'username'	=>$cek['username'],
							'nama'		=>$cek['nama'],
							'level'		=>$cek['level']
							];
					$this->session->set_userdata($data);
					redirect('dashboard');
				}else{
					$data = ['content' 	=> $this->folder.('login'),
							 'section'	=> $this->section,
							];
					$this->session->set_flashdata('flash','<div class="alert alert-danger" role="alert">Password yang anda masukkan salah! </div>' );
					$this->load->view($this->layout, $data);
				}
			}else{
				$data = ['content' 	=> $this->folder.('login'),
						 'section'	=> $this->section,
						];
				$this->session->set_flashdata('flash','<div class="alert alert-danger" role="alert">Username tidak ada! </div>' );
				$this->load->view($this->layout, $data);
			}
		};
	}
	

	public function logout()
	{
		session_destroy();
		redirect('auth');
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/admin/auth.php */