<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sobad_models extends CI_Model
{
    public function get_inquiry()
    {
        $this->db->select('*');
        $this->db->where('var', 'inquiry');
        $this->db->from('sbd-post');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_data($data, $where, $table)
    {
        $this->db->select($data);
        $this->db->where($where);
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
