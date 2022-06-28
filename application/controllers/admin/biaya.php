<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

	class Biaya extends CI_Controller{

		var $table		= 'biaya';
		var $section	= 'Biaya';
		var $folder		= 'biaya/';

		function __construct(){
			parent::__construct();
			if($this->session->userdata('masuk') !=TRUE or $this->session->userdata('level') == 3){
	            redirect(base_url('')); 
	        };
			$this->load->model('my_model', 'model');
			$this->load->model('my_validation', 'validation');
			$this->load->library(['form_validation','encryption']);
		}

		public function index()
		{
			$data = ['content'	=> $this->folder.('view'),
					 'section'	=> $this->section,
					 'tampil'	=> $this->model->get_all_biaya($this->table)->result()];
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
			$validasi 	= $this->form_validation->set_rules($this->validation->val_biaya());
			if($validasi->run()==false)
			{
				$data = ['content'	=> $this->folder.('post'),
						 'section'	=> $this->section,
						 ];
				$this->load->view('template/template', $data);
			}else{
				$total = $post['harga'] * $post['qty'];
				$data = [
							'id' 		=> null,
							'nama_pengeluaran'		=> $post['nama_pengeluaran'],
							'tanggal'	=> $post['tanggal'],
							'qty' 		=> $post['qty'],
							'harga' 	=> $post['harga'],
							'keterangan' 	=> $post['keterangan'],
							'jenis'	=> $post['jenis'],
							'total_harga' 	=> $total,
						];
				$this->model->save($this->table, $data);
				$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di simpan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('admin/biaya');
			}
		}

		public function update()
		{
			$cek 	= $this->model->get_by($this->table, 'id', $this->input->post('id'))->result_array();
			$post 	= $this->input->post();
			$id	= $post['id'];


			$this->form_validation->set_rules('nama_pengeluaran', 'Nama', 'required|rtrim',['required' 	=> 'Form <b>%s</b> tidak boleh kosong']);

			if($this->form_validation->run()==false)
			{
				$data = [
					'content'	=> $this->folder.('edit'),
					'section'	=> $this->section,
					'tampil'	=> $this->model->get_by($this->table, 'id', $id)->row()
				];

				$this->load->view('template/template', $data);
			}else{
				$total = $post['harga'] * $post['qty'];
				$data = [
							'nama_pengeluaran'		=> $post['nama_pengeluaran'],
							'tanggal'	=> $post['tanggal'],
							'qty' 		=> $post['qty'],
							'harga' 	=> $post['harga'],
							'keterangan' 	=> $post['keterangan'],
							'jenis'	=> $post['jenis'],
							'total_harga' 	=> $total,
						];
				// $this->model->save($this->table, $data);
				$this->model->update($this->table, 'id', $id, $data);
				$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di simpan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('admin/biaya');
			}
		}


		public function edit($id=null)
		{
			if(!isset($id)) show_404();
			// $id = str_replace(['-','_','~'],['=','+','/'],$id);
			// $id = $this->encryption->decrypt($id);

			$data = [
						'content'	=> $this->folder.('edit'),
						'section'	=> $this->section,
						'tampil'	=> $this->model->get_by($this->table, 'id', $id)->row()
					];

			$this->load->view('template/template', $data);
		}

		public function delete($id=null)
		{
			if(!isset($id)) show_404();
			$id=str_replace(['-','_','~'],['=','+','/'],$id);
			$id=$this->encryption->decrypt($id);

			$this->model->delete($this->table,'id',$id);
			$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di hapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/biaya');
		}

	}
?>