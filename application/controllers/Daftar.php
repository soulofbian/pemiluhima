<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Daftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_mahasiswa');
        $this->load->model('mod_daftar');
        $this->load->model('mod_kirimemail');
        $this->load->model('mod_fitur');
    }
    
    public function dodaftar()
    {
        $nim = $_POST['nim'];
        $email = $_POST['email'];
        // cek apakah nim dan email mahasiswa adalah valid
        $valid = $this->mod_mahasiswa->valid_email($nim, $email);
        // jika nim dan email valid
        if ($valid) {
            // ambil data token pada mhs bersangkutan
            foreach ($valid as $data) {
                $nama=$data->nama;
                $token_now=$data->token;
            }
            // kalo belum punya token, maka kirim token ke emaik mhs dan kembalikan pesan "sukses"
            if ($token_now == '') {
                $token = $this->mod_daftar->create_token($nim);
                if ($this->mod_kirimemail->kirim($email, $nama, $token)) {
                    $this->mod_kirimemail->is_register($nim);
                    echo "success";
                } else {
                    // $this->mod_fitur->reset_token($nim);
                    // karena pengiriman email yang gagal akan ditangani oleh cron job maka meskipun gagal kirim email akan selalu diberikan pesan "sukses"
                    echo "success"; 

                }
            } else {
                // klo udah punya token, kembalikan pesan "has_token" sebagai penanda bahwa mhs sudah pernah mendaftar
                echo "has_token";
            }
        } else {
            // kalo nim dan atau email tidak terdapat di dbase, kembalikan pesan "ivalid"
            echo "invalid";
        }
    }
    
    // fungsi untuk mengambil nama dengan request "nim"
    public function read_nama($nim)
    {
        $nama = $this->mod_mahasiswa->read_nama_nim($nim);
        echo json_encode($nama);
    }
}
