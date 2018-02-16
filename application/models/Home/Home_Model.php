<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Model extends CI_Model
{
    var $tb_remontee         = 'remontee';
    var $tb_piece_jointe     = 'piece_jointe';
    var $tb_discussion       = 'discussion';

    public function get_last_ref($id)
    {
        $row = $this->get_ref_by_typo_id($id);
        $this->abreviation =  $this->session->userdata('ref').date("Ymd").'_'.$row->abreviation;

        $this->db->from($this->tb_remontee);
        $this->db->where("reference ilike '%".$this->abreviation."%'", null,false);
        $query = $this->db->get();

        $this->nombre = 1 + $query->num_rows();
        return $this->abreviation.$this->nombre;
    }

    public function get_ref_by_typo_id($id)
    {
        $query = $this->db->query("select *from typologie where id_typologie =".$id);
        $row   = $query->row();
        return $row;
    }
    public function insert_remontee($post_data)
    {
        $this->db->insert($this->tb_remontee,$post_data);
        return $this->db->insert_id();
    }
    public function insert_piece($post_data)
    {
        $this->db->insert($this->tb_piece_jointe,$post_data);
        return $this->db->insert_id();
    }
    public function insert_discussion($post_data)
    {
        $this->db->insert($this->tb_discussion,$post_data);
        return $this->db->insert_id();
    }

    public function delete_remontee($id_remontee)
    {
        $this->db->where('id', $id_remontee);
        $this->db->delete($this->tb_remontee);
    }
}