<?php

class User_model extends CI_Model
{

// Method to register a new user
public function registerUser($data)
{
    // Check if a user with the provided email already exists
    $query = $this->db->select('*')
        ->where('email', $data['email'])
        ->get('user_tbl');
    
    // If a user with the given email is found, registration fails
    if ($query->num_rows() == 1) {
        return false; // Email already exists, return false
    } else {
        // No existing user with the email, proceed to insert the new user record
        $this->db->insert('user_tbl', $data);
        return true; // User successfully registered, return true
    }
}


    public function loginCheck($data)
    {
        $condition = "email='{$data['email']}' && password='{$data['password']}'";

        // query for database to find a user matching provided email and password
        $query = $this->db->select('*')
            ->where($condition)
            ->get('user_tbl');

        // check if the matching user was found     
        if ($query->num_rows() == 1) {
            return true; // user exists with matching information
        } else {
            return false; // user does not exist, incorrect credentials
        }
    }

    public function getUserData($data)
    {
        // Construct the condition to match the user's email
        $condition = "email='{$data['email']}'";

        // query the database to retrieve the user's data based on the email
        $query = $this->db->select('*')
            ->where($condition)
            ->get('user_tbl');

        // check if exactly one user was found
        if ($query->num_rows() == 1) {
            return $query->result(); // user found with provided email
        } else {
            return false; // no user found with provided email 
        }
    }

    public function getUserDataByID($id)
    {
        // Define the condition to search for the user with the specific ID
        $condition = "id='{$id}'";

        // Perform a query to select all columns from 'user_tbl' where the ID matches
        $query = $this->db->select('*')
            ->where($condition)
            ->get('user_tbl');

        // Check if the query returns exactly one row
        if ($query->num_rows() == 1) {
            // If exactly one row is found, return the result
            return $query->result();
        } else {
            // If no rows or more than one row is found, return false
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
        // Define the condition to identify which user record to update
        $condition = "id  ='{$data['id']}'";

        // Set the fields to be updated with new values from the $data array
        $this->db->set('username', $data['username']);
        $this->db->set('first_name', $data['first_name']);
        $this->db->set('last_name', $data['last_name']);
        $this->db->set('email', $data['email']);
        $this->db->set('password', $data['password']);
        $this->db->set('address', $data['address']);
        $this->db->set('role', $data['role']);

        // Specify the condition to match the record to be updated
        $this->db->where($condition);

        // Perform the update operation on 'user_tbl'
        $this->db->update('user_tbl');

        // Output the last executed SQL query for debugging purposes
        echo $this->db->last_query();

        // Check how many rows were affected by the update
        if ($this->db->affected_rows() == 1) {
            // Return 1 if exactly one row was updated
            return (1);
        } else if ($this->db->affected_rows() == 0) {
            // Return 0 if no rows were updated (could be due to no changes or record not found)
            return (0);
        } else {
            // Return -1 for unexpected results or errors
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

        //fetch the result set from the query execution
        $result = $query->result();

        //iterate over each record in the result set
        foreach ($result as $key => $value) {

            //extracts the flight, hotel, car rental, and booking IDs, as we ll as the booking status
            $flight_id = $value->flight_id;
            $hotel_id = $value->hotel_id;
            $carrental_id = $value->carrental_id;
            $booking_id = $value->id;
            $status = $value->status;

            //check if the booking is for a flight
            if ($flight_id != 0) {
                //retrieve flight details from the 'flight_tbl' table based on flight_id
                $query = $this->db->select('*')
                    ->where('id', $flight_id)
                    ->get('flight_tbl');
                $result_flight = $query->result();

                //store the flight details and booking status in the $managebooking array
                $managebooking[$booking_id] = array($result_flight[0], 'status' => $status);

                //check if the booking is for a hotel
            } else if ($hotel_id != 0) {
                //retrieve hotel details from the 'hotel_tbl' table based on hotel_id 
                $query = $this->db->select('*')
                    ->where('id', $hotel_id)
                    ->get('hotel_tbl');
                $result_hotel = $query->result();
                //store the hotel details and booking status in the $managebooking array
                $managebooking[$booking_id] = array($result_hotel[0], 'status' => $status);
                //check if the booking is for a car rental
            } else if ($carrental_id != 0) {
                //retrieve car rental details from the 'carrental_tbl' tabble based on carrental_id
                $query = $this->db->select('*')
                    ->where('id', $carrental_id)
                    ->get('carrental_tbl');
                $result_carrental = $query->result();
                //store the car rental details and booking status in the $managebooking array
                $managebooking[$booking_id] = array($result_carrental[0], 'status' => $status);
                //retrieve booking status from the 'booking_tbl' table
            } else if ($status != 0) {
                //retrieve booking status from the 'booking_tbl' table
                $query = $this->db->select('*')
                    ->where('id', $data)
                    ->get('booking_tbl');
                $result_status = $query->result();
                //store the booking status in the $managebooking array
                $managebooking[$booking_id] = array($result_status[0], $status);
            }
        }
        //return the array containing all managed bookings
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
