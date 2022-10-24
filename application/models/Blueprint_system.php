<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blueprint_system extends CI_Model
{
    public function get_user_menu($is_active)
    {
        $this->db->select('*');
        $this->db->where('is_active', $is_active);
        $this->db->from('user_menu');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_sub_menu($is_active, $id)
    {
        $this->db->select('*');
        $this->db->where('is_active', $is_active);
        $this->db->where('menu_id', $id);
        $this->db->from('user_sub_menu');
        $query = $this->db->get();
        return $query->result_array();
    }
}
