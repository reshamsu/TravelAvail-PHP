<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HotelModel extends CI_Model
{
    public function searchHotels($hotel_name)
    {;
        $this->db->select('*');
        $this->db->from('hotel_tbl');
        $this->db->like('hotel_name', $hotel_name);
        $query = $this->db->get();
        //SELECT * FROM `hotel_table` WHERE from_location = 'Colombo, Sri Lanka (CMB)' AND to_location = 'Paris, France (PAR)'
        //SELECT * FROM `hotel_tbl` WHERE hotel_name LIKE '%colombo%';

        //echo $this->db->last_query();
        return $query->result();
    }

    public function addHotels($data_product)
    {
        // print_r($data);
        $query = $this->db->select('*')
            ->where('hotel_title', $data_product['hotel_title'])
            ->get('hotel_tbl');

        // echo $query->num_rows();
        if ($query->num_rows() == 1) {
            return false;
        } else {
            $this->db->insert('hotel_tbl', $data_product);
            return true;
        }
    }

    // public function getHotels()
    // {
    //     // Retrieve list of hotels from the database
    //     $query = $this->db->get('hotel_tbl');
    //     return $query->result();
    // }
}
