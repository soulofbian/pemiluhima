<?php
class Mod_daftar extends CI_Model
{
    // cek klo punya token
    public function has_token($nim)    
    {
        $this->db->select('token');
        $this->db->where('nim', $nim);
        $this->db->from('mahasiswa');
        $sql = $this->db->get();
        $ret = $sql->row();
        $ret->token==''?$status=FALSE:$status=TRUE;
        return $status;
    }
    // bikin token baru
    public function create_token($nim)
    {
        $token = random_string('sha1');
        $this->db->set('token', $token);
        $this->db->where('nim', $nim);
        $this->db->update('mahasiswa');
        return $token;
    } 
    
}
