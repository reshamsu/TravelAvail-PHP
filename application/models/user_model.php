<?php

class User_model extends CI_Model
{

    // method to register user
    public function registerUser($data)
    {
        $query = $this->db->select('*')
            ->where('email', $data['email'])
            ->get('user_tbl');
        if ($query->num_rows() == 1) {
            return false;
        } else {
            $this->db->insert('user_tbl', $data);
            return true;
        }
    }

    public function loginCheck($data)
    {
        $condition = "email='{$data['email']}' && password='{$data['password']}'";
        $query = $this->db->select('*')
            ->where($condition)
            ->get('user_tbl');
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserData($data)
    {
        $condition = "email='{$data['email']}'";
        $query = $this->db->select('*')
            ->where($condition)
            ->get('user_tbl');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getUserDataByID($id)
    {
        $condition = "id='{$id}'";
        $query = $this->db->select('*')
            ->where($condition)
            ->get('user_tbl');
        //echo $this->db->last_query();
        // return $query->result();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function updateProfile($data)
    {
        $condition = "id  ='{$data['id']}'";
        $this->db->set('username', $data['username']);
        $this->db->set('first_name', $data['first_name']);
        $this->db->set('last_name', $data['last_name']);
        $this->db->set('email', $data['email']);
        $this->db->set('password', $data['password']);
        $this->db->set('address', $data['address']);
        $this->db->set('role', $data['role']);
        $this->db->where($condition);
        $this->db->update('user_tbl');
        echo $this->db->last_query();
        if ($this->db->affected_rows() == 1) {
            return (1);
        } else if ($this->db->affected_rows() == 0) {
            return (0);
        } else {
            return (-1);
        }
    }

    public function Updateusers($data)
    {
        $condition = "id  ='{$data['id']}'";
        $this->db->set('username', $data['username']);
        $this->db->set('first_name', $data['first_name']);
        $this->db->set('last_name', $data['last_name']);
        $this->db->set('email', $data['email']);
        $this->db->set('password', $data['password']);
        $this->db->set('address', $data['address']);
        $this->db->set('role', $data['role']);
        $this->db->where($condition);
        $this->db->update('user_tbl');
        echo $this->db->last_query();
        if ($this->db->affected_rows() == 1) {
            return (1);
        } else if ($this->db->affected_rows() == 0) {
            return (0);
        } else {
            return (-1);
        }
    }

    public function getAllUsers()
    {
        $query = $this->db->select('*')
            ->get('user_tbl');
        return $query->result();
    }

    public function getAllpayment()
    {
        $query = $this->db->select('*')
            ->get('payment_tbl');
        return $query->result();
    }

    // public function getuserBookings()
    // {
    //     $condition = "from_location='{$data['from_location']}' && to_location='{$data['to_location']}'";

    //     $query = $this->db->select('*')
    //         ->where($condition)
    //         ->get('flight_tbl');
    //     //echo $this->db->last_query();
    //     // return $query->result();
    //     if ($query->num_rows() == 1) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public function processPayment($data)
    {
        $this->db->insert('payment_tbl', $data);
        return $this->db->insert_id();
    }

    public function viewPayments($data)
    {
        //print_r($data);
        $condition = "user_id='{$data}'";
        $query = $this->db->select('*')
            ->where($condition)
            ->get('payment_tbl');
        $result = $query->result();

        return $result;


        //$user_id = $data['user_id'];

        //$this->db->where('user_id', $user_id);
        //$this->db->update('payment_tbl', array('status' => 'Complete'));
    }

    public function viewallPayments()
    {
        //print_r($data);
        $query = $this->db->select('*')
            ->get('payment_tbl');
        $result = $query->result();

        return $result;


        //$user_id = $data['user_id'];

        //$this->db->where('user_id', $user_id);
        //$this->db->update('payment_tbl', array('status' => 'Complete'));
    }

    public function addAirlines($data)
    {
        $query = $this->db->get('flight_tbl', array('airline_title' => $data['airline_title']));

        if ($query->num_rows() == 0) {
            // Airline already exists, return false
            return false;
        } else {
            // Airline doesn't exist, insert the data
            $this->db->insert('flight_tbl', $data);
            return true;
        }
    }

    public function insertBookingTable($data)
    {
        //print_r($data);
        $this->db->insert('booking_tbl', $data);
    }

    public function manageBooking($data)
    {
        $managebooking = array();
        $query = $this->db->select('*')
            ->where('user_id', $data)
            ->get('booking_tbl');
        $result = $query->result();
        foreach ($result as $key => $value) {

            $flight_id = $value->flight_id;
            $hotel_id = $value->hotel_id;
            $carrental_id = $value->carrental_id;
            $booking_id = $value->id;
            $status = $value->status;

            if ($flight_id != 0) { 
                $query = $this->db->select('*')
                    ->where('id', $flight_id)
                    ->get('flight_tbl');
                $result_flight = $query->result();
                $managebooking[$booking_id] = array($result_flight[0], 'status' => $status);

            } else if ($hotel_id != 0) {
                $query = $this->db->select('*')
                    ->where('id', $hotel_id)
                    ->get('hotel_tbl');
                $result_hotel = $query->result();
                $managebooking[$booking_id] = array($result_hotel[0], 'status' => $status);

            } else if ($carrental_id != 0) {
                $query = $this->db->select('*')
                    ->where('id', $carrental_id)
                    ->get('carrental_tbl');
                $result_carrental = $query->result();
                $managebooking[$booking_id] = array($result_carrental[0], 'status' => $status);

            } else if ($status != 0) {
                $query = $this->db->select('*')
                    ->where('id', $data)
                    ->get('booking_tbl');
                $result_status = $query->result();
                $managebooking[$booking_id] = array($result_status[0], $status);
            }
        }
        return $managebooking;
    }

    public function cancelBooking($booking_id)
    {
        // Check if the booking with the given ID exists
        $query = $this->db->get_where('booking_tbl', array('id' => $booking_id));

        if ($query->num_rows() == 1) {
            // Update the status to 'Inactive'
            $this->db->where('id', $booking_id)
                ->update('booking_tbl', array('status' => 'Inactive'));

            return true; // Booking successfully canceled
        }

        return false; // Booking not found
    }


    public function bookinghistory()
    {
        $query = $this->db->select('*')
            ->get('booking_tbl');
        //echo $this->db->last_query();
        // return $query->result();
        return $query->result();
    }

    public function flightBookings($data)
    {
        // print_r($data);
        $query = $this->db->select('*')
            ->where('user_id', $data['user_id'])
            ->get('booking_tbl');

        // echo $query->num_rows();
        if ($query->num_rows() == 1) {
            return false;
        } else {
            $this->db->insert('booking_tbl', $data);
            return true;
        }
    }

    public function bookinglistings()
    {
        $query = $this->db->select('*')
            ->get('booking_tbl');
        //echo $this->db->last_query();
        // return $query->result();
        return $query->result();
    }
}
