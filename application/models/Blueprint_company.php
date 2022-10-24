<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blueprint_company extends CI_Model
{
    public function get_company()
    {
        $this->db->select('*');
        $this->db->from('company');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_dpartement()
    {
        $this->db->select('*');
        $this->db->from('dpartement');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_data_dpartement($id)
    {
        $this->db->select('meta_key,meta_value');
        $this->db->where('meta_id', $id);
        $this->db->from('dpartement_meta');
        $query = $this->db->get()->result_array();
        $data = [];
        if (isset($query)) {
            foreach ($query as $value) {
                $meta_key[] = $value['meta_key'];
                $meta_value[] = $value['meta_value'];
            }
            if (isset($meta_key) && isset($meta_value)) {
                $data[] = array_combine($meta_key, $meta_value);
            } else {
            }
        } else {
        }

        return $data;
    }
}
