<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mod_cron extends CI_Model
{
    public function read_nosend_email()
    {
        $this->db->select('*');
        $this->db->where('is_register','0');
        return $this->db->get('mail_not_send')->result();
    }
}

/* End of file ModelName.php */
