<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AutocompleteController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AutocompleteModel');
    }

    public function index() {
        $this->load->view('autocomplete_form');
    }

    public function getAutocomplete() {
        $term = $this->input->get('term');
        $data = $this->AutocompleteModel->getAutocompleteData($term);
        echo json_encode($data);
    }
}
