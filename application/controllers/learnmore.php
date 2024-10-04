<?php
class Learnmore extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('learnmore');
    }
    // userlogin method

    public function viewcriteria()
    {
    }
}
