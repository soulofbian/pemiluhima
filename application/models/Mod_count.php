<?php
class Mod_count extends CI_Model
{
    public function hitung()
    {
        $sql="SELECT kandidat.nim,mahasiswa.nama,(SELECT COUNT(*) FROM vote WHERE vote.vote=kandidat.nim) as hasil, (SELECT COUNT(*) FROM vote WHERE vote.vote!='') as jumlah_suara, (SELECT COUNT(*) FROM mahasiswa WHERE mahasiswa.token!='') as pendaftar FROM kandidat left join vote ON kandidat.nim=vote.vote JOIN mahasiswa ON kandidat.nim=mahasiswa.nim GROUP BY kandidat.nim ORDER BY kandidat.id ASC";
        return  $this->db->query($sql)->result();
    }
}
