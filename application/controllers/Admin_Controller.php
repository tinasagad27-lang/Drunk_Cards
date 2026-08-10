<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Shuffle_game_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function authenticate() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->Admin_model->check_login($username, $password);

        if ($admin) {
            $this->session->set_userdata('admin_logged_in', true);
            redirect('admin_controller/dashboard');
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('login');
        }
    }

    public function dashboard() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }

        $data['cards'] = $this->Shuffle_game_model->getAllCards(); 

        $this->load->view('admin/dashboard', $data);
    }

    public function login() {
        $this->load->view('admin/login');
    }

    public function logout() {
        $this->session->unset_userdata('admin_logged_in');
        redirect('shuffle_game_controller/index');
    }
}
