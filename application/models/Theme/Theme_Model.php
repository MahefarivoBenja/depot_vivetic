<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Theme_Model extends CI_Model
{
    var $table = 'theme';
    public function get_theme()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            return $query->result();
        }
    }
}