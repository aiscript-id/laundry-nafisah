<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

	class Status extends CI_Controller{

		var $folder 	= 'proses/';
		var $section 	= 'Proses';
		var $table		= 'transaksi';

		function __construct(){
			parent::__construct();
			if($this->session->userdata('masuk') !=TRUE or $this->session->userdata('level') == 3){
	            redirect(base_url('')); 
	        };
			$this->load->model(['model']);
		}


		public function proses()
		{
			$data = [
						'content'	=> $this->folder.('proses'),
						'section'	=> 'Proses Laundry',
						'tampil'	=> $this->model->proses()
					];

			$this->load->view('template/template', $data);
		}

		public function selesai()
		{
			$data = [
						'content'	=> $this->folder.('selesai'),
						'section'	=> 'Transaksi Selesai',
						'tampil'	=> $this->model->get_by($this->table, 'status', 1)->result()
					];

			$this->load->view('template/template', $data);
		}

		public function kering()
		{
			$where = $this->uri->segment(4);
			$data = [
						'kering' => '1' ,
					];

			$this->model->update('transaksi_status','id_transaksi_s',$where, $data);
			redirect('admin/status/proses');
		}

		public function strika()
		{
			$where = $this->uri->segment(4);
			$data = [
						'strika' => '1' ,
					];

			$this->model->update('transaksi_status','id_transaksi_s',$where, $data);
			redirect('admin/status/proses');
		}

		public function siap()
		{
			$where = $this->uri->segment(4);
			$data = [
						'siap' => '1' ,
					];

			$this->model->update('transaksi_status','id_transaksi_s',$where, $data);
			
			$transaksi = $this->model->get_by('transaksi', 'id_transaksi', $where)->row();
			$user = $this->model->get_by('user', 'id', $transaksi->id_user)->row();
			$msg = 'Hi, '.$user->nama.'. Kami dari Laundry Napisah. Order No. '.$transaksi->id_transaksi.'('.$transaksi->paket_transaksi.') telah siap. Pakaian kamu sudah selesai dicuci nih, silahkan ambil ke tempat kami ya. Terima Kasih';
			$this->model->kirimNotifikasi2($user->whatsapp, $msg);

			redirect('admin/status/proses');
		}


		public function status_selesai()
		{
			date_default_timezone_set('Asia/Jakarta');
			$where = $this->uri->segment(4);
			$data = [
						'selesai' 	=> '1' ,
						'tgl_ambil'	=> date('Y-m-d H:i:s'),
					];

			// save status
			$this->model->update('transaksi_status','id_transaksi_s',$where, $data);

			// save transaksi selesai
			$dati = [
						'status' 	=> 1
					];
			$this->model->update($this->table, 'id_transaksi', $where, $dati);

			redirect('admin/status/proses');
		}
	}
 ?>


