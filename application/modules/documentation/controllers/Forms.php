<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forms extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //check_not_login();
        $this->load->model('Blueprint_system');
        $this->load->library('form_validation');
    }

    // Function Index adalah function yang pertama kali di load
    // Berikut adalah Config untuk page pertama
    public function index()
    {
        $data = array(
            'title' => 'DOC - FORMS', // Optional | Data berisi Judul Page
            'theme' => 'veltrix', // Required | Data berisi thema yang akan di pakai 
            'data'  => '', // Optional | Berisi Data yang mau di olah
            'data_page' => array( // Required //
                array(
                    'id'                => '', // Optional
                    'class'             => 'rounded', // optional untuk penambahan class
                    'form_action'       => '', // Optional untuk mengarahkan action ke function mana
                    'size_page'         => 'col-12', // Optional untuk menyeting lebar page 
                    'content_title'     => 'Data Superuser', // Optional | Judul Page
                    'content_header'    => '', // Optional 
                    'content'           => $this->config_form(), // Optional | bisa dikasih form bisa table atau lain sebagainya
                    'content_footer'    => '', // Optional
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
                        'title'         => 'Form Input Text', // Optional
                        'type_form'     => 'default', // Required
                        'placeholder'   => 'This Input Text', // Optional
                        'note'          => 'This Input Text', // Optional
                        'input_type'    => 'text', // Required
                        'id'            => 'id_data', // Optional
                        'name'          => 'id_data', // Optional
                        'value'         =>  '', // Optional
                        'readonly'      => 'true' // Optional | 'true' or 'false' or ''
                    ),
                    array(
                        'title'         => 'Textarea', // Optional
                        'type_form'     => 'default', // Required
                        'placeholder'   => 'This Textarea', // Optional
                        'note'          => 'This Textarea', // Optional
                        'input_type'    => 'textarea', // Required 
                        'id'            => '', // Optional
                        'name'          => '', // Optional
                        'value'         => '', // Optional
                        'readonly'      => '' // Optional | 'true' or 'false' or ''
                    ),
                    array(
                        'title'         => 'Select Option', // Optional
                        'type_form'     => 'default', // Required
                        'place_holder'  => '', // Optional
                        'note'          => 'This Option', // Optional
                        'input_type'    => 'select', // Required
                        'id'            => '', // Optional
                        'name'          => '', // Optional
                        'data'          => '', // Optional | untuk menampung data yang ingin di tampilkan di select
                        'value'         => '', // Optional
                        'content_id'    => '', // Optional
                        'content'       => '', // Optional
                    ),
                    array(
                        'title'         => 'Checkbox', // Optional
                        'type_form'     => 'default', // Required
                        'note'          => 'This Checkbox', // Optional
                        'input_type'    => 'checkbox', // Required
                        'id'            => 'checkbox', // optional
                        'name'          => 'checkbox', // optional
                        'value'         => '', // optional
                        'readonly'      => '' // Optional | 'true' or 'false' or ''
                    ),
                    array(
                        'title'         => 'input Group', // Optional
                        'type_form'     => 'default', // Required
                        'note'          => 'bla bla', // Optional
                        'input_type'    => 'input-group', // Required
                        'id'            => '', // optional
                        'name'          => '', // optional
                        'content'       => '$', // optional
                        'value'         => '', // optional
                        'placeholder'   => '', // optional
                        'readonly'      => '' // Optional | 'true' or 'false' or ''
                    ),

                    array(
                        'title'   => 'Upload Foto',
                        'place_holder'  => 'Upload Foto disini !',
                        'data'          => '',
                        'validation'    =>  'false',
                        'input_type'     => 'dropzone',
                        'note'          => 'Upload Foto Maksimal 4 file masing" kurang dari 100kb',
                    ),
                ),
            ),
        );
        return form_theme($data);
    }
}
