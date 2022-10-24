<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blueprint_models extends CI_Model
{
    public function get_data($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_where_data($table, $where)
    {
        $this->db->select('*');
        $this->db->where($where);
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_data_table($perpage, $start, $table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->limit($perpage, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_keyword($keyword, $perpage, $start, $dpartement)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->limit($perpage, $start);
        $this->db->like('product_name', $keyword);
        $this->db->or_like('product_code', $keyword);
        $this->db->or_like('price', $keyword);
        return $this->db->get();
    }


    public function get_where_meta($id, $table)
    {
        $this->db->select('meta_key,meta_value');
        $this->db->where('meta_id', $id);
        $this->db->from($table);
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

    public function count_data($table)
    {
        $this->db->from($table);
        $query = $this->db->get();
        return $query->num_rows();
    }
}
