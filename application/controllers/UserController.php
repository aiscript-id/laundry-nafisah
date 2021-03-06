<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

	var $folder = 'users/';
	var $layout = 'users/layout';

	function __construct(){
		parent::__construct();
		$this->load->model(['my_model', 'validation_model']);
		$this->load->library(['form_validation']);
	}

	public function index()
	{
		$data = ['content'=> $this->folder.('home')];
		$this->load->view($this->layout, $data);
	}

	public function listHarga(){
		$data = [
			'content'	=> $this->folder.('tarif'),
			'data'		=> $this->my_model->get_order_by('tarif', 'jenis_tarif', 'asc')->result()
		];
		$this->load->view($this->layout, $data);
	}

	public function lacak($id=null){
		$id = $this->input->get('idOrder');
		if(!$id){
			$data = [
				'content'	=> $this->folder.('lacak'),
				'tampil' 	=> null,
				'id'		=> ''
			];
		}else{
			$cek = $this->my_model->get_by('transaksi_status', 'id_transaksi_s', $id)->result_array();
			$jum =count($cek);

			if($jum<1){
				$data = [
					'content'	=> $this->folder.('lacak'),
					'tampil'	=> 'noData',
					'id'		=> $id
				];
			}else{
				$data = [
					'content'	=> $this->folder.('lacak'),
					'tampil' 	=> 1,
					'data'		=> $cek,
					'id'		=> $id
				];
			}
		}
		$this->load->view($this->layout, $data);
	}
	public function kontak(){
		$data = ['content'=> $this->folder.('contact')];
		$this->load->view($this->layout, $data);
	}

	public function auth()
	{
		$data = ['content'=> $this->folder.('login')];
		$this->load->view($this->layout, $data);
	}	


	public function dashboard()
	{
		// verify login
		$this->verify_login();
		$data = [
			'content'=> $this->folder.('dashboard'),
			'transaksi'=> $this->my_model->get_by_desc('transaksi', 'id_user', $this->session->userdata('id'))->result()
		];
		$this->load->view($this->layout, $data);

		
	}

	public function verify_login()
	{
		if(!$this->session->userdata('masuk')){
			redirect('user/auth');
		}
	}

}

/* End of file UserController.php */
/* Location: ./application/controllers/UserController.php */