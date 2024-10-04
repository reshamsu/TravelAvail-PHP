<?php
class CarrentalController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');

        $this->load->model('carrentalModel');

        date_default_timezone_set("Asia/colombo");
    }

    public function index()
    {
        $this->load->view('carrental_form');
    }

    public function processCarrentals()
    {
        // Validate form data (you may want to add more validation)
        $this->form_validation->set_rules('pickup_location', 'Pick Up Location', 'required');
        $this->form_validation->set_rules('pickup_location', 'Drop off Location', 'required');
        $this->form_validation->set_rules('start_date', 'Pick Up', 'required');
        $this->form_validation->set_rules('end_date', 'Drop Off', 'required');
        $this->form_validation->set_rules('people', 'Passengers', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('carrental_form');
        } else {
            // Get form data
            $pickup_location = $this->input->post('pickup_location');
            $dropoff_location = $this->input->post('dropoff_location');
            $people = $this->input->post('people');
            
            // Process booking
            $carrentalDetails = $this->carrentalModel->searchCarrentals( $pickup_location, $dropoff_location, $people);
            //print_r($flightsDetails);
            $data['carrentals'] = $carrentalDetails;
            $this->load->view('carrental_list', $data);
            // Display booking confirmation
            // $data['bookingId'] = $bookingId;
            //$this->load->view('booking_conf_hotel.php', $data); 
        }
    }

    // public function processCarrentals()
    // {
    //     // Validate form data (you may want to add more validation)
    //     $this->form_validation->set_rules('pickup_location', 'Pick Up Location', 'required');
    //     $this->form_validation->set_rules('dropoff_location', 'Pick Up Location', 'required');
    //     $this->form_validation->set_rules('start_date', 'Pick Up Date', 'required');
    //     $this->form_validation->set_rules('end_date', 'Drop Off Date', 'required');
    //     $this->form_validation->set_rules('people', 'Passengers');

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('carrental_form');
    //     } else {
    //         // Get form data
    //         $pickup_location = $this->input->post('pickup_location');
    //         $dropoff_location = $this->input->post('dropoff_location');
    //         $people = $this->input->post('people');

    //         // Process booking
    //         $rentalDetails = $this->carrentalModel->searchCarrentals($people);
    //         //print_r($flightsDetails);

    //         $current_date = date('Y-m-d');
    //         $data = array(
    //             'id' => NULL,
    //             'pickup_location' => $_POST['pickup_location'],
    //             'dropoff_location' => $_POST['dropoff_location'],
    //             'start_date' => $_POST['start_date'],
    //             'end_date' => $_POST['end_date'],
    //             'created_date' =>  $current_date
    //         );
    //         $data['carrentals'] = $rentalDetails;
    //         $this->load->view('carrental_list', $data);
    //         // Display booking confirmation
    //         // $data['bookingId'] = $bookingId;
    //         //$this->load->view('booking_conf_rental.php', $data); 
    //     }
    // }

    public function uploadRentals()
    {
        $this->form_validation->set_rules('pickup_location', 'Pick-up Location', 'required');
        $this->form_validation->set_rules('dropoff_location', 'Drop-off Location', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        // $this->form_validation->set_rules('description2', 'Description', 'required');
        $this->form_validation->set_rules('people', 'No. of Seats', 'required');
        $this->form_validation->set_rules('trip_fare', 'Trip Fare', 'required');
        $this->form_validation->set_rules('rental_title', 'Car Rental Title', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('add_booking_item/manage_rentals');
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
                'pickup_location' => $_POST['pickup_location'],
                'dropoff_location' => $_POST['dropoff_location'],
                'description' => $_POST['description'],
                // 'description2' => $_POST['description2'],
                'people' => $_POST['people'],
                'trip_fare' => $_POST['trip_fare'],
                'rental_title' => $_POST['rental_title'],
                'rental_img' => $new_name,
                'created_date' =>  $current_date
            );

            $config = array(
                'upload_path' => './uploads/image/carrental',
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
                $result = $this->carrentalModel->addRentals($data_product);

                if ($result) {
                    $data_product = array(
                        'success' => 'Car Rental added Successfully'
                    );
                    $this->load->view('add_booking_item/manage_rentals', $data_product);
                } else {
                    $data_product = array(
                        'error' => 'Car Rental Already Exists. Please try again'
                    );
                    $this->load->view('add_booking_item/manage_rentals', $data_product);
                }
            } else {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            }
        }
    }

    // public function getCarrentals()
    // {
    //     // Get list of carrentals
    //     $carrentals = $this->carrentalModel->getCarrentals();

    //     // Pass data to the view
    //     $data['carrentals'] = $carrentals;
    //     $this->load->view('carrental_list', $data);
    // }
}
