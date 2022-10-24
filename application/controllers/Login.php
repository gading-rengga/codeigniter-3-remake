<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //check_not_login();
        $this->load->model('Blueprint_auth');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('theme/veltrix/login');
        } else {
            $this->login();
        }
    }

    private function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $check_data = $this->Blueprint_auth->get_user($username, $password);
        $id = isset($check_data[0]['ID']) ? $check_data[0]['ID'] : '';
        $data_user = $this->Blueprint_auth->all_data($id);
        $all_data = array_merge($check_data[0], $data_user[0]);
        if (!empty($check_data) && $check_data[0]['divisi'] == 0) {
            $data = [
                'data_session' => $all_data,
            ];
            $this->session->set_userdata($data);
            redirect('Dpartement');
        } else {
            $this->session->set_flashdata('message', '<div class="d-flex flex-row-reverse"><div class="alert alert-danger animated fadeInDown mr-5 position-absolute">
                        Username & Password salah!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        </div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('data_session');
        $this->session->set_flashdata('message', '<div class="d-flex flex-row-reverse"><div class="alert alert-danger animated fadeInDown  position-absolute mr-5">
            Kamu Telah Logout!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            </div>');
        redirect('login');
    }
}
