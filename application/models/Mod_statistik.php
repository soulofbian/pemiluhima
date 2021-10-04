<?php
class Mod_statistik extends CI_Model
{
    public function pemilih()
    {
        $sql="SELECT (SELECT COUNT('token') FROM mahasiswa WHERE mahasiswa.token!='') as is_register,(SELECT COUNT('id') FROM mahasiswa) as jumlah_mhs, (SELECT COUNT('id') FROM vote WHERE vote.token!='') as jumlah_vote FROM mahasiswa,vote LIMIT 1";
        return  $this->db->query($sql)->result();
    }
}
