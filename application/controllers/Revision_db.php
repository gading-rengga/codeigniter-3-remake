<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Revision_db extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sobad_models');
    }

    public function index()
    {
        $inquiry = $this->Sobad_models->get_inquiry();


        foreach ($inquiry as $val) {

            $update_purchase = array(
                'reff_note' => $val['ID']
            );
            $where_purchase = array(
                'ID' => $val['reff']
            );
            $this->Sobad_models->update_data($where_purchase, $update_purchase, 'sbd-post');
        }
    }

    public function inquiry()
    {
        $update_inquiry = array(
            'reff' => 0
        );
        $where_inquiry = array(
            'var' => 'inquiry'
        );
        $this->Sobad_models->update_data($where_inquiry, $update_inquiry, 'sbd-post');
    }

    public function meta()
    {
        $data = '*';
        $where_purchase = array(
            'var'   => 'purchase'
        );
        $table = 'sbd-post';
        $purchase = $this->Sobad_models->get_data($data, $where_purchase, $table);

        foreach ($purchase as $val) {
            $data_meta = '*';
            $where_purchase_meta = array(
                'meta_id'   => $val['reff']
            );
            $table = 'sbd-post-meta';
            $purchase_meta = $this->Sobad_models->get_data($data_meta, $where_purchase_meta, $table);
            foreach ($purchase_meta as $key) {
                var_dump($key);
            }
        }
    }
}
