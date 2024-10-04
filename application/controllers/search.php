<?php
class search extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('home');
    }

    public function search_bookings()
    {
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $data = [];
        if (!empty($success)) {
            $data['success'] = $success;
        }
        if (!empty($error)) {
            $data['error'] = $error;
        }
        $sessionData = $this->session->userdata('userinfo');
        // print_r($sessionData);
        if ($this->checkSessionExist()) {

            $result = $this->user_model->getUserDataByID($sessionData['id']);
            if ($result) {
                $data['dashboard'] = $result;
                $this->load->view('dashboard', $data);
            }
        }
    }   
}

