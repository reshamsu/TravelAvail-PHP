<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FlightModel extends CI_Model
{
    public function searchFlights($from_location, $to_location)
    {;
        $this->db->select('*');
        $this->db->from('flight_tbl');
        $this->db->like('from_location', $from_location);
        $this->db->like('to_location', $to_location);
        $query = $this->db->get();
        //SELECT * FROM `hotel_table` WHERE from_location = 'Colombo, Sri Lanka (CMB)' AND to_location = 'Paris, France (PAR)'
        //SELECT * FROM `hotel_tbl` WHERE hotel_name LIKE '%colombo%';

        //echo $this->db->last_query();
        return $query->result();
    }

    // public function searchFlights($from_location, $to_location)
    // {
    //     $data = array(
    //         'from_location' => $from_location,
    //         'to_location' => $to_location,
    //     );
    //     // print_r($data);

    //     $condition = "from_location = '{$data['from_location']}' AND to_location = '{$data['to_location']}'";
    //     $this->db->select('*');
    //     $this->db->from('flight_tbl');
    //     $this->db->where($condition);
    //     $query = $this->db->get();
    //     //SELECT * FROM `flight_table` WHERE from_location = 'Colombo, Sri Lanka (CMB)' AND to_location = 'Paris, France (PAR)'
    //     //echo $this->db->last_query();
    //     return $query->result();
    // }

    public function addFlights($data_product)
    {
        // print_r($data);
        $query = $this->db->select('*')
            ->where('airline_title', $data_product['airline_title'])
            ->get('flight_tbl');

        // echo $query->num_rows();
        if ($query->num_rows() == 1) {
            return false;
        } else {
            $this->db->insert('flight_tbl', $data_product);
            return true;
        }
    }

   

    public function getFlights()
    {
        // Retrieve list of hotels from the database
        $query = $this->db->get('flight_table');
        return $query->result();
    }
}
