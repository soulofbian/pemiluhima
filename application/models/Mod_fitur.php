<?php
class Mod_fitur extends CI_Model
{
    public function reset_token($nim)
    {
        if ($nim=='0all') {
            $this->db->where('token !=', '');
            $this->db->update('mahasiswa', array('token'=>''));
        } else {
            $this->db->where('token !=', '');
            $this->db->where('nim', $nim);
            $this->db->update('mahasiswa', array('token'=>'','is_register'=>'0'));
        }
    }

    public function reset_vote()
    {
        $this->db->truncate('vote');
    }

    public function add_candidate($nim)
    {
        $data = array("id"=>0,"nim"=>'0','pic'=>"0.jpg");
        $this->db->insert("kandidat",$data);
    }

    public function del_candidate($nim)
    {
        $this->db->where("nim",$nim);
        $this->db->delete('kandidat');
        
    }
}
