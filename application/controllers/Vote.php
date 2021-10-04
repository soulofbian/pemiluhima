<?php
// SET DULU TIMEZONE DI SERVER AGAR TER SET KE JAKARTA (WIB)
date_default_timezone_set('Asia/Jakarta');
defined('BASEPATH') or exit('No direct script access allowed');
class Vote extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_mahasiswa');
        $this->load->model('mod_kandidat');
        $this->load->model('mod_vote');
    }
    
    // Fungsi saat mhs klik link pada undangan 
    public function sign($token)
    {
        $hari_ini = date('Y-m-d');
        // Jika hari ini belum tanggal 20 Sept 21 maka buka halaman "belumbuka"
        if ($hari_ini < '2021-09-20') {
            $this->load->view('belumbuka');
        } else if ($hari_ini >= '2021-09-25') {
            // Jika hari ini sama dengan atau lebih dari tgl 25 Sept 21 maka buka halaman "voteclosed"
            $this->load->view('voteclosed');
        } else {
            // Kalo tanggal hari ini sudah masuk masa pemilu dan belum berakhir masa pemilu maka jalanin script dibawah
            // Lihat status vote dari mhs tersebut, kalo belum pernah voate maka jalanin script dibawah ini (buat tampilin kartu suara)
            $status_vote=$this->mod_vote->cek_token($token);
            if ($status_vote) {
                $data['mahasiswa'] = $this->mod_mahasiswa->readby_token($token);
                $data['kandidat'] = $this->mod_kandidat->list();
                $this->load->view('vote', $data);
            } else {
            // Klo udah pernah melakukan vote maka alihkan ke "front" dan kasih pesan kalo udah pernah voting
                $this->session->set_flashdata('msg', "$.confirm({
                title: 'Sudah Vote',
                content: 'Anda sudah melakukan voting',
                type: 'green',
                typeAnimated: true,
                buttons: {
                    Tutup: {
                        btnClass: 'btn-success',
                        action: function() {}
                    },
                }
            });");
                redirect('front');
            }
        }
    }
    
    // Fungsi ketika mhs submit vote pada kartu suara (coblosan coy..)
    public function dovote($token, $nim)
    {
        $this->load->model('mod_vote');
        $status_vote = $this->mod_vote->dovote($token, $nim);
        if ($status_vote) {
            $this->session->set_flashdata('msg', "$.confirm({
                title: 'Vote Berhasil',
                content: 'Terimakasih atas pastisipasinya dalam pemilu HIMA Informatika UNSIA',
                type: 'green',
                typeAnimated: true,
                buttons: {
                    Tutup: {
                        btnClass: 'btn-success',
                        action: function() {}
                    },
                }
            });");
        } else {
            $this->session->set_flashdata('msg', "$.confirm({
                title: 'Tindakan Ilegal',
                content: 'Anda sudah pernah melakukan vote, atau anda tidak memiliki token',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    Tutup: {
                        btnClass: 'btn-error',
                        action: function() {}
                    },
                }
            });");
        }
        redirect('front');
    }
}
/* eof */
