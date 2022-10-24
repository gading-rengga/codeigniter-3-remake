<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //check_not_login();
        $this->load->model('Blueprint_system');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'title' => 'Superuser',
            'theme' => 'veltrix',
            'data'  => '',
            'data_page' => array(
                array(
                    'id'                => '',
                    'class'             => 'rounded',
                    'form_action'       => '',
                    'size_page'         => 'col-12',
                    'content_title'     => 'Data Superuser',
                    'content_header'    => '',
                    'content'           => $this->config_form(),
                    'content_footer'    => '',
                ),
            ),
        );
        layout_primary($data);
    }

    public function config_form()
    {
        $data = array(
            array(
                'size_page'    => 'col-12',
                'form' => array(
                    array(
                        'title'         => '', // Judul Form
                        'type_form'     => 'default',
                        'placeholder'   => '', // Isi PlaceHolder
                        'note'          => 'bla bla', // Note form
                        'input_type'    => 'text',
                        'id'            => 'id_data',
                        'name'          => 'id_data',
                        'value'         =>  '',
                        'readonly'      => 'true'
                    ),
                    array(
                        'title'         => 'ID Packet', // Judul Form,
                        'type_form'     => 'default',
                        'placeholder'   => 'Silahkan isi ID Packet', // Isi PlaceHolder
                        'note'          => '', // Note form
                        'input_type'    => 'textarea',
                        'id'            => 'id_packet',
                        'name'          => 'id_packet',
                        'value'         =>  '',
                        'readonly'      => ''
                    ),
                    array(
                        'title'         => 'Kecamatan',
                        'type_form'     => 'default',
                        'place_holder'  => '',
                        'note'          => 'bla bla',
                        'input_type'    => 'select',
                        'id'            => 'kecamatan',
                        'name'          => 'kecamatan',
                        'data'          => '',
                        'value'         => '',
                        'content_id'    => '',
                        'content'       => '',
                    ),
                    array(
                        'title'         => 'Checkbox',
                        'type_form'     => 'default',
                        'place_holder'  => '',
                        'note'          => 'bla bla',
                        'input_type'    => 'checkbox',
                        'id'            => 'checkbox',
                        'name'          => 'checkbox',
                        'value'         => '',
                        'readonly'      => ''
                    ),
                    array(
                        'title'         => 'input Group',
                        'type_form'     => 'default',
                        'note'          => 'bla bla',
                        'input_type'    => 'input-group',
                        'id'            => 'checkbox',
                        'name'          => 'checkbox',
                        'value'         => '',
                        'place_holder'  => '',
                        'readonly'      => ''
                    ),
                ),
            ),
        );
        return form_bootstrap($data);
    }
}
