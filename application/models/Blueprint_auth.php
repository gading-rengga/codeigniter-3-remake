<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blueprint_auth extends CI_Model
{
    public function get_user($username, $password)
    {
        $this->db->select('*');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function all_data($id)
    {
        $this->db->select('meta_key,meta_value');
        $this->db->where('meta_id', $id);
        $this->db->from('user_meta');
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
