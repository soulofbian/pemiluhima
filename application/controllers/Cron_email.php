<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cron_email extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_cron');
        $this->load->model('mod_kirimemail');
        $this->load->model('mod_mahasiswa');
    }
    
    

    public function index()
    {
        $valid = $this->mod_cron->read_nosend_email();
        // echo json_encode($valid);
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
