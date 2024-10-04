<?php

class Hotels extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');

        date_default_timezone_set("Asia/colombo");

        $this->load->library('upload');
    }

    public function index()
    {
        $this->load->view('hotels');
    }

    public function hotels()
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
        if (isset($data['error']) || isset($data['success'])) {
            $this->load->view('hotels', $data);
        } else {
            if ($this->checkSessionExist()) {
                $this->load->view('dashboard');
            } else {
                $this->load->view('dashboard', $data);
            }
        }
    }

    public function hotelSubmit()
    {
        {
            print_r($_POST);
            $this->form_validation->set_rules('hotel/destination', 'Hotel/Destination', 'required');
            $this->form_validation->set_rules('checkin-date', 'Checkin-Date', 'required');
            $this->form_validation->set_rules('checkout-date', 'Checkout-Date', 'required');
            $this->form_validation->set_rules('guests', 'Guests', 'required');
            $this->form_validation->set_rules('rooms', 'Rooms', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('hotels');
            } else {
                $data = array(
                    'hotel/destination' => $_POST['hotel/destination'],
                    'checkin-date' => $_POST['checkin-date'],
                    'checkout-date' => $_POST['checkout-date'],
                    'guests' => $_POST['guests'],
                    'rooms' => $_POST['rooms'],
                );
                $result = $this->user_model->loginCheck($data);
                if ($result) {
                    // set session 
                    $resutlUserData = $this->user_model->getUserData($data);
                    print_r($resutlUserData);
                    $session_user = array(
                        'id' => $resutlUserData[0]->id,
                        'login' => true,
                        'name' => $resutlUserData[0]->name
                    );
    
                    // update session object with new session data
                    $this->session->set_userdata('userinfo', $session_user);
                    $this->session->set_userdata('routing', $actions);
                    redirect('');
                } else {
                    // $data = array(
                    //     'error'=>'Email or password incorrect. Please check'
                    // );
                    // $this->load->view('login',$data);
                    $this->session->set_flashdata('error', 'Email or password Invalid. Please Try again');
                    redirect('');
                }
            }
        }
    }
}