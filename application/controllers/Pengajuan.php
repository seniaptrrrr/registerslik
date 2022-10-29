<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pengajuan');
		$this->load->model('m_user');
		$this->load->model('m_jenis_kelamin');
	}
	

    public function view_super_admin()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {

			$data['pengajuan'] = $this->m_pengajuan->get_all_pengajuan()->result_array();
			$this->load->view('super_admin/pengajuan', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
    }
    
	public function view_ideb()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {

			$data['pengajuan'] = $this->m_pengajuan->get_all_pengajuan()->result_array();
			$this->load->view('ideb/pengajuan', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err'); 
			redirect('Login/index');

		}

	}
	
	public function view_pegawai($id_user)
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {

		$data['pengajuan'] = $this->m_pengajuan->get_all_pengajuan_by_id_user($id_user)->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$this->load->view('pegawai/pengajuan', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
	}
	
	public function hapus_pengajuan()
	{

		$id_pengajuan = $this->input->post("id_pengajuan");
		$id_user = $this->input->post("id_user");

		$hasil = $this->m_pengajuan->delete_pengajuan($id_pengajuan);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_hapus','eror_hapus');
		}else{
			$this->session->set_flashdata('hapus','hapus');
		}

		redirect('Pengajuan/view_pegawai/'.$id_user);
	}

	public function hapus_pengajuan_admin()
	{

		$id_pengajuan = $this->input->post("id_pengajuan");
		$id_user = $this->input->post("id_user");

		$hasil = $this->m_pengajuan->delete_pengajuan($id_pengajuan);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_hapus','eror_hapus');
		}else{
			$this->session->set_flashdata('hapus','hapus');
		}

		redirect('Pengajuan/view_super_admin');
	}

	public function edit_pengajuan_admin()
	{
		$id_pengajuan = $this->input->post("id_pengajuan");
		$nama_lengkap_debitur = $this->input->post("nama_lengkap_debitur");
		$tgl_diajukan = $this->input->post("tgl_diajukan");
		$nik = $this->input->post("nik");
		$alamat_debitur = $this->input->post("alamat_debitur");
		$riwayat = $this->input->post("riwayat");


		$hasil = $this->m_pengajuan->update_pengajuan($nama_lengkap_debitur, $tgl_diajukan, $nik, $alamat_debitur, $riwayat, $id_pengajuan);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_edit','eror_edit');
		}else{
			$this->session->set_flashdata('edit','edit');
		}

		redirect('Pengajuan/view_super_admin');
	}

	public function edit_pengajuan_pegawai()
	{
		$id_pengajuan = $this->input->post("id_pengajuan");
		$nama_lengkap_debitur = $this->input->post("nama_lengkap_debitur");
		$tgl_diajukan = $this->input->post("tgl_diajukan");
		$nik = $this->input->post("nik");
		$alamat_debitur = $this->input->post("alamat_debitur");
		$riwayat = $this->input->post("riwayat");


		$hasil = $this->m_pengajuan->update_pengajuan($nama_lengkap_debitur, $tgl_diajukan, $nik, $alamat_debitur, $riwayat, $id_pengajuan);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_edit','eror_edit');
		}else{
			$this->session->set_flashdata('edit','edit');
		}

		redirect('Pengajuan/view_pegawai');
	}

	public function acc_pengajuan_ideb($id_status_pengajuan)
	{

		$id_pengajuan = $this->input->post("id_pengajuan");
		$id_user = $this->input->post("id_user");
		$alasan_verifikasi = $this->input->post("alasan_verifikasi");

		$hasil = $this->m_pengajuan->confirm_pengajuan($id_pengajuan, $id_status_pengajuan, $alasan_verifikasi);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_input','eror_input');
		}else{
			$this->session->set_flashdata('input','input');
		}

		redirect('Pengajuan/view_ideb/'.$id_user);
	}

	public function acc_cuti_super_admin($id_status_cuti)
	{

		$id_pengajuan = $this->input->post("id_pengajuan");
		$id_user = $this->input->post("id_user");
		$alasan_verifikasi = $this->input->post("alasan_verifikasi");

		$hasil = $this->m_cuti->confirm_cuti($id_pengajuan, $id_status_cuti, $alasan_verifikasi);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_input','eror_input');
		}else{
			$this->session->set_flashdata('input','input');
		}

		redirect('Pengajuan/view_super_admin/'.$id_user);
	}
    
}