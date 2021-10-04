<?php
defined('BASEPATH') or exit('No direct script access allowed');
// PERHATIAN! FITUR INI DIBIKIN HANYA BUAT ADMIN WEB AJA. BUKAN UNTUK UMUM!!
// FITUR YANG SAYA TANDAI SEBAGAI "DEV" ADALAH FITUR PADA LEVEL DEVELOPMENT, BUKAN PRODUCTION

class Fitur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_fitur');
        $this->load->model('mod_kirimemail');
        $this->load->model('mod_mahasiswa');
    }
    
    // *DEV
    public function reset_token($nim)
    {
        $this->mod_fitur->reset_token($nim);
    }
    
    // *DEV
    public function reset_vote()
    {
        $this->mod_fitur->reset_vote();
    }
    // *DEV
    public function add_candidate($nim)
    {
        $this->mod_fitur->add_candidate($nim);
    }
    // *DEV
    public function del_candidate($nim)
    {
        $this->mod_fitur->del_candidate($nim);
    }
    // BUAT KIRIM EMAIL KETIKA TERJADI EMAIL GAGAL KIRIM, SYARATNYA MAHASISWA UDAH DAFTAR
    public function generate_email($nim)
    {
        $valid = $this->mod_mahasiswa->read_all_nim($nim);
        foreach ($valid as $data) {
            $nama=$data->nama;
            $token_now=$data->token;
            $email=$data->email;
            if ($this->mod_kirimemail->kirim_generate($email, $nama, $token_now)) {
                echo "sukses";
                $this->mod_kirimemail->is_register($nim);
            } else {
                echo "gagal";
            }
        }
    }
    
    // BUAT KIRIM EMAIL SEMUA EMAIL YG GAGAL TERKIRIM
    public function generate_email_error()
    {
        $valid = $this->mod_mahasiswa->read_belum_vote();
        foreach ($valid as $data) {
            $nama=$data->nama;
            $token_now=$data->token;
            $email=$data->email;
            $nim = $data->nim;
            if ($this->mod_kirimemail->kirim_generate($email, $nama, $token_now)) {
                echo "sukses";
                $this->mod_kirimemail->is_register($nim);
            } else {
                echo "gagal";
            }
        }
    }
}
