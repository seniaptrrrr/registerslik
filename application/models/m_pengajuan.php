<?php

class M_pengajuan extends CI_Model
{

    public function get_all_pengajuan() 
    {
        $hasil = $this->db->query('SELECT * FROM pengajuan JOIN user ON pengajuan.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail ORDER BY user_detail.nama_lengkap ASC');
        return $hasil;
    }

    public function get_all_pengajuan_by_id_user($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM pengajuan JOIN user ON pengajuan.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE pengajuan.id_user='$id_user'");
        return $hasil;
    }

    public function get_all_pengajuan_first_by_id_user($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM pengajuan JOIN user ON pengajuan.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE pengajuan.id_user='$id_user' AND pengajuan.id_status_pengajuan='2' ORDER BY pengajuan.tgl_diajukan DESC LIMIT 1");
        return $hasil;
    }

    public function get_all_pengajuan_by_id_pengajuan($id_pengajuan)
    {
        $hasil = $this->db->query("SELECT * FROM pengajuan JOIN user ON pengajuan.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE pengajuan.id_pengajuan='$id_pengajuan'");
        return $hasil;
    }

    public function insert_data_pengajuan($id_pengajuan, $id_user, $nama_lengkap_debitur, $nik, $alamat_debitur, $riwayat, $id_status_pengajuan)
    {
        $this->db->trans_start();
        $this->db->query("INSERT INTO pengajuan(id_pengajuan, id_user, nama_lengkap_debitur, tgl_diajukan, nik, alamat_debitur, riwayat, id_status_pengajuan) VALUES ('$id_pengajuan','$id_user','$nama_lengkap_debitur',NOW(),'$nik', '$alamat_debitur', '$riwayat', '$id_status_pengajuan')");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function delete_pengajuan($id_pengajuan)
    {
        $this->db->trans_start();
        $this->db->query("DELETE FROM pengajuan WHERE id_pengajuan='$id_pengajuan'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function update_pengajuan($nama_lengkap_debitur, $tgl_diajukan, $nik, $alamat_debitur, $riwayat, $id_pengajuan)
    {
        $this->db->trans_start();
        $this->db->query("UPDATE pengajuan SET nama_lengkap_debitur='$nama_lengkap_debitur', tgl_diajukan='$tgl_diajukan', nik='$nik', alamat_debitur='$alamat_debitur', riwayat='$riwayat' WHERE id_pengajuan='$id_pengajuan'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function confirm_pengajuan($id_pengajuan, $id_status_pengajuan, $alasan_verifikasi)
    {
        $this->db->trans_start();
        $this->db->query("UPDATE pengajuan SET id_status_pengajuan='$id_status_pengajuan', alasan_verifikasi='$alasan_verifikasi' WHERE id_pengajuan='$id_pengajuan'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

   
    public function count_all_pengajuan()
    {
        $hasil = $this->db->query('SELECT COUNT(id_pengajuan) as total_pengajuan FROM pengajuan JOIN user ON pengajuan.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail');
        return $hasil;
    }

    public function count_all_pengajuan_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_pengajuan) as total_pengajuan FROM pengajuan JOIN user ON pengajuan.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE pengajuan.id_user='$id_user'");
        return $hasil;
    }

    public function count_all_pengajuan_acc()
    {
        $hasil = $this->db->query('SELECT COUNT(id_pengajuan) as total_pengajuan FROM pengajuan JOIN user ON pengajuan.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_pengajuan=2');
        return $hasil;
    }

    public function count_all_pengajuan_acc_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_pengajuan) as total_pengajuan FROM pengajuan JOIN user ON pengajuan.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_pengajuan=2 AND pengajuan.id_user='$id_user'");
        return $hasil;
    }

    public function count_all_pengajuan_confirm()
    {
        $hasil = $this->db->query('SELECT COUNT(id_pengajuan) as total_pengajuan FROM pengajuan JOIN user ON pengajuan.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_pengajuan=1');
        return $hasil;
    }

    public function count_all_pengajuan_confirm_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_pengajuan) as total_pengajuan FROM pengajuan JOIN user ON pengajuan.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_pengajuan=1 AND pengajuan.id_user='$id_user'");
        return $hasil;
    }

    public function count_all_pengajuan_reject()
    {
        $hasil = $this->db->query('SELECT COUNT(id_pengajuan) as total_pengajuan FROM pengajuan JOIN user ON pengajuan.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_pengajuan=3');
        return $hasil;
    }

    public function count_all_pengajuan_reject_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_pengajuan) as total_pengajuan FROM pengajuan JOIN user ON pengajuan.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_pengajuan=3 AND pengajuan.id_user='$id_user'");
        return $hasil;
    }


}