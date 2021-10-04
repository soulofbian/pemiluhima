<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mod_kirimemail extends CI_Model
{
    public function kirim($email, $nama, $token)
    {
		// Sesuaikan setting emailmu
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'host_email_anda',
            'smtp_user' => 'user_email', 
            'smtp_pass'   => 'password_email', 
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('panitia@pemiluhima.scriptnesia.com', 'Panitia Pemilu Hima');

        // Email penerima
        $this->email->to($email);

        

        // Subject email
        $this->email->subject('Undangan Pemilu Hima Informatika Unsia 2021');

        // Isi email
        $html='
        <table style="background-color: #5544aa; width: 388.5px;">
<tbody>
<tr style="height: 85px;">
<td style="width: 387.5px; height: 85px; background-color: #555555; text-align: center; vertical-align: middle;" scope="col"><span style="color: #ffffff;"><img style="margin: 10px;" src="'.base_url().'assets/images/logo_putih.png" alt="" width="136" height="42" /></span></td>
</tr>
<tr style="height: 16px;">
<td style="width: 387.5px; height: 16px; vertical-align: middle; padding-left: 15px;" scope="col">
<h4><span style="color: #ffffff;">Halo '.$nama.',</span></h4>
</td>
</tr>
<tr style="height: 28px;">
<td style="width: 387.5px; height: 28px; padding-left: 15px;"><span style="color: #ffffff;">Bersama surel ini, kami mengundang anda untuk dapat memberikan suaranya pada</span></td>
</tr>
<tr style="height: 63.5px;">
<td style="width: 387.5px; height: 63.5px; padding-left: 15px;">
<blockquote><span style="color: #ffffff;">"Pemilihan Ketua HIMA Informatika UNSIA 2021"</span></blockquote>
</td>
</tr>
<tr style="height: 21px;">
<td style="width: 387.5px; height: 21px; padding-left: 15px;">
<p><span style="color: #ffffff;">voting akan dibuka pada tanggal&nbsp;&nbsp;</span><span style="color: #ffffff;">20 September 2021 sampai 27 September 2021 <sup>*)ketentuan berlaku</sup></span></p>
</td>
</tr>
<tr style="height: 21px;">
<td style="width: 387.5px; height: 21px; padding-top: 15px;">
<p style="text-align: center;"><em><span style="color: #ffffff;">klik tombol dibawah ini untuk melakukan voting</span></em></p>
<h3 style="text-align: center;"><a href="'.base_url('vote/sign/'.$token).'" target="_blank" rel="noopener"><button style="background-color: yellow; color: black;">MULAI VOTE </button></a></h3>
</td>
</tr>
<tr style="height: 21px;">
<td style="width: 387.5px; height: 21px; background-color: #333333;padding-top:15px">
<p style="text-align: center;"><span style="color: #ffffff;">Salam hangat dalam jabat erat!<br />Panitia Pemilu HIMA Informatika UNSIA 2021</span></p>
</td>
</tr>
</tbody>
</table>';
        $this->email->message($html);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function kirim_generate($email, $nama, $token)
    {
  
        // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'pemiluhima.scriptnesia.com',
            'smtp_user' => 'panitia@pemiluhima.scriptnesia.com',  // Email gmail
            'smtp_pass'   => 'hima2020informatika2021unsia',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('panitia@pemiluhima.scriptnesia.com', 'Panitia Pemilu Hima');

        // Email penerima
        $this->email->to($email);

        

        // Subject email
        $this->email->subject('Undangan Pemilu Hima Informatika Unsia 2021');

        // Isi email
        $html='
        <table style="background-color: #5544aa; width: 388.5px;">
<tbody>
<tr style="height: 85px;">
<td style="width: 387.5px; height: 85px; background-color: #555555; text-align: center; vertical-align: middle;" scope="col"><span style="color: #ffffff;"><img style="margin: 10px;" src="'.base_url().'assets/images/logo_putih.png" alt="" width="136" height="42" /></span></td>
</tr>
<tr style="height: 16px;">
<td style="width: 387.5px; height: 16px; vertical-align: middle; padding-left: 15px;" scope="col">
<h4><span style="color: #ffffff;">Halo '.$nama.',</span></h4>
</td>
</tr>
<tr style="height: 28px;">
<td style="width: 387.5px; height: 28px; padding-left: 15px;"><span style="color: #ffffff;">Bersama surel ini, kami mengundang anda untuk dapat memberikan suaranya pada</span></td>
</tr>
<tr style="height: 63.5px;">
<td style="width: 387.5px; height: 63.5px; padding-left: 15px;">
<blockquote><span style="color: #ffffff;">"Pemilihan Ketua HIMA Informatika UNSIA 2021"</span></blockquote>
</td>
</tr>
<tr style="height: 21px;">
<td style="width: 387.5px; height: 21px; padding-left: 15px;">
<p><span style="color: #ffffff;">voting akan dibuka pada tanggal&nbsp;&nbsp;</span><span style="color: #ffffff;">20 September 2021 sampai 27 September 2021 <sup>*)ketentuan berlaku</sup></span></p>
</td>
</tr>
<tr style="height: 21px;">
<td style="width: 387.5px; height: 21px; padding-top: 15px;">
<p style="text-align: center;"><em><span style="color: #ffffff;">klik tombol dibawah ini untuk melakukan voting</span></em></p>
<h3 style="text-align: center;"><a href="'.base_url('vote/sign/'.$token).'" target="_blank" rel="noopener"><button style="background-color: yellow; color: black;">MULAI VOTE </button></a></h3>
</td>
</tr>
<tr style="height: 21px;">
<td style="width: 387.5px; height: 21px; background-color: #333333;padding-top:15px">
<p style="text-align: center;"><span style="color: #ffffff;">Salam hangat dalam jabat erat!<br />Panitia Pemilu HIMA Informatika UNSIA 2021</span></p>
</td>
</tr>
</tbody>
</table>';
        $this->email->message($html);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function is_register($nim)
    {
        $this->db->where('nim', $nim);
        $this->db->update("mahasiswa", array('is_register'=>'1'));
    }
}

/* End of file ModelName.php */
