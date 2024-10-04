<?php

class Search extends CI_Model
{
    public function Search_bookings($data)
    {
        // print_r($data);
        $Search_bookings = array();
        $query = $this->db->select('*')
            ->where('user_id', $data)
            ->get('booking_history_tbl');
        // echo $this->db->last_query();
        $result = $query->result();
        // print_r($result);
        foreach ($result as $key => $value) {

            // print_r($value);
            $flight_id = $value->flight_id;
            $hotel_id = $value->hotel_id;
            $rental_id = $value->rental_id;
            $booking_id = $value->id;

            //echo $flight_id;
            if ($flight_id != 0) { //MUST CHANGE BACK TO ZERO (0) REMEMBER...

                $query = $this->db->select('*')
                    ->where('id', $flight_id)
                    ->get('flight_tbl');
                $result_flight = $query->result();
                // print_r($result_flight);

                $Search_bookings[$booking_id] = array($result_flight[0]);
                //print_r($manage_booking);

            } else if ($hotel_id != 0) {

                $query = $this->db->select('*')
                    ->where('id', $hotel_id)
                    ->get('hotel_tbl');
                $result_hotel = $query->result();
                // print_r($result_hotel);

                $Search_bookings[$booking_id] = array($result_hotel[0]);
                //print_r($manage_booking);

            } else if ($rental_id != 0) {

                $query = $this->db->select('*')
                    ->where('id', $rental_id)
                    ->get('carrental_tbl');
                $result_rental = $query->result();
                // print_r($result_hotel);

                $Search_bookings[$booking_id] = array($result_rental[0]);
                //print_r($manage_booking);
            }
        }
        // print_r($managebooking);
        return $Search_bookings;
    }
}
