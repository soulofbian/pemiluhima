<?php
class Mod_mahasiswa extends CI_Model
{
    // baca nama mahasiswa dari nik
    public function read_nama_nim($nim)
    {
        $sql = "SELECT nama FROM mahasiswa WHERE nim='$nim'";
        return  $this->db->query($sql)->result();
    }
    // baca mahasiswa dari nik
    public function read_all_nim($nim)
    {
        $sql = "SELECT * FROM mahasiswa WHERE nim='$nim'";
        return  $this->db->query($sql)->result();
    }
    // validasi nim dan email
    public function valid_email($nim, $email)
    {
        $sql = "SELECT * FROM mahasiswa WHERE nim='$nim' AND email='$email'";
        return  $this->db->query($sql)->result();
    }
    // baca nama mahasiswa berdasar token
    public function readby_token($token)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('token', $token);
        return $this->db->get()->result();
    }

    // baca mahasiswa yg daftar tapi belum nyoblos
    public function read_belum_vote()
    {
        $sql = "SELECT * FROM register_belum_vote";
        return  $this->db->query($sql)->result();
    }
}
