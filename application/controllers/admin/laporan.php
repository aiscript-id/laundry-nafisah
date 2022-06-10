<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	var $folder 	= 'laporan/';
	var $section 	= 'Transaksi';
	var $table		= 'transaksi';


	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE or $this->session->userdata('level') == 3){
            redirect(base_url('')); 
        };
		$this->load->model(['model']);
	}


	public function index()
	{
		$data = [
					'content'	=> $this->folder.'keuangan',
					'section'	=> $this->section,
					'tampil'	=> $this->model->get_all_transaksi($this->table)->result(),
					'biaya'		=> $this->model->get_all_biaya('biaya')->result(),
				];
		$this->load->view('template/template', $data);
	}

	public function print_keuangan($awal, $akhir)
	{
		$data = [
			'tampil'	=> $this->model->get_all_transaksi($this->table)->result(),
			'biaya'		=> $this->model->get_all_biaya('biaya')->result(),
			'print'	=> true,	
		];
		$this->load->view($this->folder.'keuangan', $data);
	}

}

/* End of file laporan.php */
/* Location: ./application/controllers/admin/laporan.php */