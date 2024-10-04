<?php
class HotelController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');

        $this->load->model('hotelModel');

        date_default_timezone_set("Asia/colombo");
    }

    public function index()
    {
        $this->load->view('hotel_form');
    }

    // public function processHotels()
    // {
    //     // Validate form data (you may want to add more validation)
    //     $this->form_validation->set_rules('hotel_name', 'Hotel Name or Destination', 'required');
    //     $this->form_validation->set_rules('start_date', 'Check In', 'required');
    //     $this->form_validation->set_rules('end_date', 'Check Out', 'required');
    //     $this->form_validation->set_rules('rooms', 'Rooms');
    //     $this->form_validation->set_rules('guests', 'Guests', 'required');

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('hotel_form');
    //     } else {
    //         // Get form data
    //         $hotel_name = $this->input->post('hotel_name');

    //         // Process booking
    //         $hotelDetails = $this->hotelModel->searchHotels($hotel_name);
    //         //print_r($flightsDetails);
    //         $data['hotels'] = $hotelDetails;
    //         $this->load->view('hotel_list', $data);
    //         // Display booking confirmation
    //         // $data['bookingId'] = $bookingId;
    //         //$this->load->view('booking_conf_hotel.php', $data); 
    //     }
    // }

    public function processHotels()
    {
        // Validate form data (you may want to add more validation)
        $this->form_validation->set_rules('hotel_name', 'Hotel Name or Destination', 'required');
        $this->form_validation->set_rules('start_date', 'Check In', 'required');
        $this->form_validation->set_rules('end_date', 'Check Out', 'required');
        $this->form_validation->set_rules('rooms', 'Rooms');
        $this->form_validation->set_rules('people', 'Guests', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('hotel_form');
        } else {
            // Get form data
            $hotel_name = $this->input->post('hotel_name');
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            $rooms = $this->input->post('rooms');
            $people = $this->input->post('people');

            $searchData = array(
                'hotel_name' => $hotel_name,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'rooms' => $rooms,
                'people' => $people,
            );
            
            if ($this->session->has_userdata('search_data')) {
                //echo "found session";
                $this->session->unset_userdata('search_data');
                $this->session->set_userdata('search_data', $searchData);
                $session_Data = $this->session->userdata('search_data');
            } else {
                //echo " not found session";
                $this->session->set_userdata('search_data', $searchData);
                $session_Data = $this->session->userdata('search_data');
            }
            // print_r($session_Data); 
            
            // Process booking
            $hotelDetails = $this->hotelModel->searchHotels($hotel_name);
            //print_r($flightsDetails);
            $current_date = date('Y-m-d');
            $data = array(
                'id' => NULL,
                'hotel_name' => $_POST['hotel_name'],
                'start_date' => $_POST['start_date'],
                'end_date' => $_POST['end_date'],
                'rooms' => $_POST['rooms'],
                'people' => $_POST['people'],
                'created_date' =>  $current_date
            );
            
            $data['hotels'] = $hotelDetails;
            $this->load->view('hotel_list', $data);
            // Display booking confirmation
            // $data['bookingId'] = $bookingId;
            //$this->load->view('booking_conf_hotel.php', $data); 
        }
    }

    public function uploadHotels()
    {
        $this->form_validation->set_rules('hotel_name', 'Hotel name or Destination', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('trip_fare', 'Trip Fare', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('add_booking_item/manage_hotels');
        } else {
            //echo "success";
            // print_r($_POST);
            $current_date = date('Y-m-d');
            // associative array

            // print_r($data_product);
            // pass this array to model
            // $this->load->view('formsuccess');

            //print_r($_FILES);

            $new_name = time() . $_FILES["userfile"]['name'];

            $data_product = array(
                'id' => NULL,
                'hotel_name' => $_POST['hotel_name'],
                'description' => $_POST['description'],
                'trip_fare' => $_POST['trip_fare'],
                'hotel_title' => $_POST['hotel_title'],
                'hotel_img' => $new_name,
                'created_date' =>  $current_date
            );

            $config = array(
                'upload_path' => './uploads/image/hotel',
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => TRUE,
                'max_size' => "2048000",
                'file_name' => $new_name
            );

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload()) {
                $data = array('upload_data' => $this->upload->data());
                //echo "success";
                $result = $this->hotelModel->addHotels($data_product);

                if ($result) {
                    $data_product = array(
                        'success' => 'Listing added Successfully'
                    );
                    $this->load->view('add_booking_item/manage_hotels', $data_product);
                } else {
                    $data_product = array(
                        'error' => 'Listing Already Exists. Please try again'
                    );
                    $this->load->view('add_booking_item/manage_hotels', $data_product);
                }
            } else {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            }
        }
    }

    // public function getHotels()
    // {
    //     // Get list of hotels
    //     $hotels = $this->hotelModel->getHotels();

    //     // Pass data to the view
    //     $data['hotels'] = $hotels;
    //     $this->load->view('hotel_list', $data);
    // }

    // public function bookHotels()
    // {
    //     $this->load->view('booking_conf_hotel');
    // }
}
