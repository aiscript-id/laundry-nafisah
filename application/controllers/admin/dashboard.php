<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends CI_Controller{

		function __construct(){
			parent::__construct();
			if($this->session->userdata('masuk') !=TRUE or $this->session->userdata('level') == 3){
	            redirect(base_url('')); 
	        };
		}

		var $section = 'Dashboard';
		public function index()
		{
			// pendapatan group by month to array
			$pendapatan = $this->db->query("SELECT SUM(total_transaksi) as total, MONTH(tgl_transaksi) as bulan FROM transaksi GROUP BY MONTH(tgl_transaksi)")->result();
			$pendapatan_month = '';
			$pendapatan_total = '';
			foreach ($pendapatan as $key => $value) {
				// parse value->month to bulan indo
				$bulan = date('F', mktime(0, 0, 0, $value->bulan, 10));
				$pendapatan_month = $pendapatan_month . '"' . $bulan . '",';
				$pendapatan_total = $pendapatan_total . '"' . $value->total . '",';
			}
			$data = ['content'=>'admin/dashboard',
					 'section'=>$this->section,
					 'month'=>$pendapatan_month,
					 'total_pendapatan'=>$pendapatan_total,];
			$this->load->view('template/template', $data);
		}

	}
 ?>