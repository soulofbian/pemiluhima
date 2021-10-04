<?php
class Mod_kandidat extends CI_Model
{
    // Daftar Kandidat
    public function list()
    {
       $this->db->select('mahasiswa.nama,kandidat.nim,kandidat.id');
       $this->db->from("kandidat");
       $this->db->join('mahasiswa','kandidat.nim=mahasiswa.nim');
       $this->db->order_by('kandidat.id', 'asc');
       
    return $this->db->get()->result();
        
    }
    
}
