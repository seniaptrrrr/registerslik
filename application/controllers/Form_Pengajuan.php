<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_Pengajuan extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pengajuan');
		$this->load->model('m_user');
		$this->load->model('m_jenis_kelamin');
	}
	
	public function view_pegawai()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {

			$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
			$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$this->load->view('pegawai/form_pengajuan_slik', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}

	}
	
	public function proses_cuti()
	{
	if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {

		$id_user = $this->input->post("id_user");
		$nama_lengkap_debitur = $this->input->post("nama_lengkap_debitur");
		$nik = $this->input->post("nik");
		$alamat_debitur = $this->input->post("alamat_debitur");
		$riwayat = $this->input->post("riwayat");
		$id_pengajuan = md5($id_user.$nama_lengkap_debitur.$nik);
		
		$id_status_pengajuan = 1;

		$hasil = $this->m_pengajuan->insert_data_pengajuan('cuti-'.substr($id_pengajuan, 0, 5),$id_user, $nama_lengkap_debitur, $nik, $alamat_debitur, $riwayat, $id_status_pengajuan);

		if($hasil==false){
			$this->session->set_flashdata('eror_input','eror_input');
		
		}else{
			$this->session->set_flashdata('input','input');
		}
		redirect('Form_Pengajuan/view_pegawai');

	}else{

		$this->session->set_flashdata('loggin_err','loggin_err');
		redirect('Login/index');

	}

	}
    
}