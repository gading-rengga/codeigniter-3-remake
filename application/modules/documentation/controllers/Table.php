<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Table extends CI_Controller
{
    // Function Index adalah function yang pertama kali di load
    // Berikut adalah Config untuk page pertama
    public function index()
    {
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
                    'content_header'    => '', // Optional 
                    'content'           => $this->config_table(), // Optional | bisa dikasih form bisa table atau lain sebagainya
                    'content_footer'    => '', // Optional
                ),
            ),
        );
        return layout_primary($data);
    }

    public function config_table()
    {

        $manipulation = array(
            array(
                'no' => 1,
                'nama'  => 'Gading'
            ),
            array(
                'no' => 2,
                'nama'  => 'Ryan'
            ),
            array(
                'no' => 3,
                'nama'  => 'Yusuf'
            ),
        );
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
        foreach ($manipulation as $index => $val) {
            $config['t_body'][$index] = array(
                array(
                    'class' => 'text-center w-50',
                    'scope'     => '',
                    'colspan'   => '',
                    'rowspan'   => '',
                    'data'  => $val['no'],
                ),
                array(
                    'class' => 'text-center w-50',
                    'scope' => '',
                    'data'  => $val['nama'],
                ),
            );
        }

        return table_bootstrap($config);
    }

    public function config_pagination()
    {
        $total_row = 3;
        $data = array(
            array(
                'base_url'   => base_url('Table/index'),
                'total_rows' => $total_row,
                'per_page'  => 1,
            ),
        );
        return pagination($data);
    }
}
