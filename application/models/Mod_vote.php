<?php
class Mod_vote extends CI_Model
{
    public function cek_token($token)
    {
        //    cek token
        $this->db->select('token');
        $this->db->where('token', $token);
        $this->db->from('mahasiswa');
        $sql_token = $this->db->get();
        $res_token = $sql_token->row();
        $res_token->token==''?$has_token=false:$has_token=true;
        // cek apakah sudah vote
        $this->db->select('token');
        $this->db->where('token', $token);
        $this->db->from('vote');
        $sql_vote = $this->db->get();
        $res_vote = $sql_vote->row();
        $res_vote->token =='' ?$has_vote=false:$has_vote=true;
        // MULAI VOTE
        if (!$has_token or $has_vote) {
            return false;
        } elseif ($has_token and !$has_vote) {
            return true;
        }
    }
    
    public function dovote($token, $nim)
    {
        //    cek token
        $this->db->select('token');
        $this->db->where('token', $token);
        $this->db->from('mahasiswa');
        $sql_token = $this->db->get();
        $res_token = $sql_token->row();
        $res_token->token==''?$has_token=false:$has_token=true;
        // cek apakah sudah vote
        $this->db->select('token');
        $this->db->where('token', $token);
        $this->db->from('vote');
        $sql_vote = $this->db->get();
        $res_vote = $sql_vote->row();
        $res_vote->token =='' ?$has_vote=false:$has_vote=true;
        // MULAI VOTE
        if (!$has_token or $has_vote) {
            return false;
        } elseif ($has_token and !$has_vote) {
            $data=array('token'=>$token,'vote'=>$nim);
            $this->db->insert('vote', $data);
            return true;
        }
    }
}
