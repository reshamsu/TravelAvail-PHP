<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AutocompleteModel extends CI_Model {

    public function getAutocompleteData($term) {
        $this->db->like('item_name', $term);
        $query = $this->db->get('items');

        return $query->result();
    }
}
