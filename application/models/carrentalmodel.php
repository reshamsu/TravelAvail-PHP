<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CarrentalModel extends CI_Model
{
    public function searchCarrentals($pickup_location, $dropoff_location, $people)
    {
        $this->db->select('*');
        $this->db->from('carrental_tbl');
        $this->db->like('pickup_location', $pickup_location);
        $this->db->like('dropoff_location', $dropoff_location);
        $this->db->like('people', $people);
        $query = $this->db->get();

        // echo $this->db->last_query(); // Uncomment this line for debugging purposes

        return $query->result();
    }

    // public function searchRentals($pickup_location, $dropoff_location, $passengers)
    // {
    //     $data = array(
    //         'pickup_location' => $pickup_location,
    //         'dropoff_location' => $dropoff_location,
    //         'passengers' => $passengers,
    //     );
    //     // print_r($data);

    //     $condition = "pickup_location = '{$data['pickup_location']}' AND dropoff_location = '{$data['dropoff_location']}'";
    //     $this->db->select('*');
    //     $this->db->from('carrental_tbl');
    //     $this->db->where($condition);
    //     $query = $this->db->get();
    //     //SELECT * FROM `carrental_table` WHERE pickuplocation = 'Colombo, Sri Lanka' AND dropofflocation = 'Galle, Sri Lanka'
    //     //echo $this->db->last_query();
    //     return $query->result();
    // }

    public function addRentals($data_product)
    {
        // print_r($data);
        $query = $this->db->select('*')
            ->where('rental_title', $data_product['rental_title'])
            ->get('carrental_tbl');

        // echo $query->num_rows();
        if ($query->num_rows() == 1) {
            return false;
        } else {
            $this->db->insert('carrental_tbl', $data_product);
            return true;
        }
    }

    public function getCarrentals()
    {
        // Retrieve list of hotels from the database
        $query = $this->db->get('carrental_tbl');
        return $query->result();
    }
}
