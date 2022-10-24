<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dpartement extends CI_Controller
{
    // Function Index adalah function yang pertama kali di load
    // Berikut adalah Config untuk page pertama
    public function index()
    {
        $table =  $this->config_table();
        $button_add = array(
            'title' => 'Tambah Data',
            'type'  => 'link',
            'link'  => '#',
            'color' => 'primary',
            'size'  => 'sm'
        );
        $button_pdf = array(
            'title' => 'Print PDF',
            'type'  => 'link',
            'link'  => '#',
            'color' => 'danger',
            'size'  => 'sm'
        );
        $button_add = button_bootstrap($button_add);
        $button_pdf = button_bootstrap($button_pdf);
        $header = array(
            $button_add,
            $button_pdf
        );
        $content = array(
            $table
        );
        $data = array(
            'title' => 'DOC - Table', // Optional | Data berisi Judul Page
            'theme' => 'veltrix', // Required | Data berisi thema yang akan di pakai 
            'data'  => '', // Optional | Berisi Data yang mau di olah
            'data_page' => array( // Required //
                array(
                    'id'                => '', // Optional
                    'class'             => 'rounded', // optional untuk penambahan class
                    'form_action'       => '', // Optional untuk mengarahkan action ke function mana
                    'size_page'         => 'col-12', // Optional untuk menyeting lebar page 
                    'content_title'     => 'Data Superuser', // Optional | Judul Page
                    'content_header'    => $header, // Optional 
                    'content'           => $content, // Optional | bisa dikasih form bisa table atau lain sebagainya
                    'content_footer'    => '', // Optional
                ),
            ),
        );
        return layout_primary($data);
    }

    public function config_table()
    {
        $perpage  = 5;
        $start = $this->uri->segment(4);
        $data_table = $this->Blueprint_models->get_data_table($perpage, $start, 'dpartement');


        $config_pagination = $this->config_pagination();
        $this->pagination->initialize($config_pagination);
        $config['table'] = array(
            'table_type'   => 'table-hover table-bordered',
        );
        $config['t_head'] = array(
            array(
                'class'     => 'text-center w-25',
                'scope'     => '',
                'colspan'   => '',
                'rowspan'   => '',
                'data'      => 'No',
            ),
            array(
                'class' => 'text-center w-50',
                'scope' => '',
                'data'  => 'Nama',
            ),
        );
        foreach ($data_table as $index => $val) {

            $config['t_body'][$index] = array(
                array(
                    'class' => 'text-center w-5',
                    'scope'     => '',
                    'colspan'   => '',
                    'rowspan'   => '',
                    'data'  =>  ++$start,
                ),
                array(
                    'class' => 'text-center w-50',
                    'scope' => '',
                    'data'  => $val['dpartement_name'],
                ),
            );
        }


        return table_bootstrap($config);
    }

    public function config_pagination()
    {
        $total_row = $this->Blueprint_models->count_data('dpartement');
        $data = array(
            array(
                'func'   => 'Admin/Dpartement/index/',
                'total_rows' => $total_row,
                'per_page'  => 5,
            ),
        );
        return pagination($data);
    }
}
