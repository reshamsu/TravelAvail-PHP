<?php
class FlightController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');

        $this->load->model('flightModel');
        $this->load->model('user_model');

        date_default_timezone_set("Asia/colombo");

        $this->load->library('upload');
    }

    public function index()
    {
        $this->load->view('flight_form');
    }

    public function processFlights()
    {
        // Validate form data (you may want to add more validation)
        $this->form_validation->set_rules('from_location', 'From Location', 'required');
        $this->form_validation->set_rules('to_location', 'To Location', 'required');
        $this->form_validation->set_rules('start_date', 'Departure Date', 'required');
        $this->form_validation->set_rules('end_date', 'Return Date', 'required');
        $this->form_validation->set_rules('people', 'Passengers', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('flight_form');
        } else {
            // Get form data
            $from_location = $this->input->post('from_location');
            $to_location = $this->input->post('to_location');
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            $people = $this->input->post('peoplpe');

            $searchData = array(
                'from_location' => $from_location,
                'to_location' => $to_location,
                'start_date' => $start_date,
                'end_date' => $end_date,
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
            $flightsDetails = $this->flightModel->searchFlights($from_location, $to_location, $people);
            //print_r($flightsDetails);

            $current_date = date('Y-m-d');
            $data = array(
                'id' => NULL,
                'from_location' => $_POST['from_location'],
                'to_location' => $_POST['to_location'],
                'start_date' => $_POST['start_date'],
                'end_date' => $_POST['end_date'],
                'created_date' =>  $current_date
            );
            $data['flights'] = $flightsDetails;
            $this->load->view('flight_list', $data);
            // Display booking confirmation
            // $data['bookingId'] = $bookingId;
            //$this->load->view('booking_conf_flight.php', $data); 
        }
    }

    public function uploadFlights()
    {
        $this->form_validation->set_rules('from_location', 'From Location', 'required');
        $this->form_validation->set_rules('to_location', 'To Location', 'required');
        $this->form_validation->set_rules('location_code1', 'Location Code 1', 'required');
        $this->form_validation->set_rules('location_code2', 'Location Code 2', 'required');
        $this->form_validation->set_rules('flight_detail1', 'Flight Detail 1', 'required');
        $this->form_validation->set_rules('flight_detail2', 'Flight Detail 2', 'required');
        $this->form_validation->set_rules('airline_time1', 'Airline Timings', 'required');
        $this->form_validation->set_rules('airline_time2', 'Airline Timings', 'required');
        $this->form_validation->set_rules('no_of_hours1', 'No. of Hours', 'required');
        $this->form_validation->set_rules('no_of_hours2', 'No. of Hours', 'required');
        $this->form_validation->set_rules('flight_info', 'Flight Info', 'required');
        $this->form_validation->set_rules('trip_fare', 'Trip Fare', 'required');
        $this->form_validation->set_rules('location_info', 'Location Info', 'required');
        $this->form_validation->set_rules('airline_title', 'Airline Title', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('add_booking_item/manage_airlines.php');
        } else {
            $current_date = date('Y-m-d');
            // print_r($_FILES);
            $files[] = $_FILES["userfile1"];
            $files[] = $_FILES["userfile2"];

            $new_name[] = time() . $_FILES["userfile1"]['name'];
            $new_name[] = time() . $_FILES["userfile2"]['name'];

            // print_r($new_name);
            $fileSelector = 0;
            foreach ($files as $key => $file) {

                // print_r($file);
                $_FILES['file']['name']     = $file['name'];
                $_FILES['file']['type']     = $file['type'];
                $_FILES['file']['tmp_name'] = $file['tmp_name'];
                $_FILES['file']['error']     = $file['error'];
                $_FILES['file']['size']     = $file['size'];

                // print_r($_FILES);
                // echo $fileNewName;
                $config = array(
                    'upload_path' => './uploads/image/flight',
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,
                    'max_size' => "2048000",
                    'file_name' => $new_name[$fileSelector],

                );
                $fileSelector++;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file')) {
                    $data = array('upload_data' => $this->upload->data());

                    //print_r($data);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = array(
                'id' => NULL,
                'from_location' => $_POST['from_location'],
                'to_location' => $_POST['to_location'],
                'location_code1' => $_POST['location_code1'],
                'location_code2' => $_POST['location_code2'],
                'flight_detail1' => $_POST['flight_detail1'],
                'flight_detail2' => $_POST['flight_detail2'],
                'airline_time1' => $_POST['airline_time1'],
                'airline_time2' => $_POST['airline_time2'],
                'no_of_hours1' => $_POST['no_of_hours1'],
                'no_of_hours2' => $_POST['no_of_hours2'],
                'flight_info' => $_POST['flight_info'],
                'trip_fare' => $_POST['trip_fare'],
                'location_info' => $_POST['location_info'],
                'airline_title' => $_POST['airline_title'],
                'airline_img1' => $new_name[0],
                'airline_img2' => $new_name[1],
                'created_date' =>  $current_date
            );

            $result = $this->user_model->addAirlines($data);
            if ($result) {
                $data = array(
                    'success' => 'Airline added Successfully'
                );
                $this->load->view('add_booking_item/manage_airlines', $data);
                } else {
                    $data = array(
                        'error' => 'Airline Exist. Please try again'
                    );
                    $this->load->view('add_booking_item/manage_airlines', $data);
            }

            // $this->load->library('upload', $config);
            // $this->upload->initialize($config);

            // if ($this->upload->do_upload('userfile1')) {
            //     if ($this->upload->do_upload('userfile2')) {
            //         // Both files uploaded successfully

            //         $data = array(
            //             'flight_id' => NULL,
            //             'from_location' => $_POST['from_location'],
            //             'to_location' => $_POST['to_location'],
            //             'from_info' => $_POST['from_info'],
            //             'to_info' => $_POST['to_info'],
            //             'destination_date' => $_POST['destination_date'],
            //             'no_of_hours' => $_POST['no_of_hours'],
            //             'trip_fare' => $_POST['trip_fare'],
            //             'airline_title' => $_POST['airline_title'],
            //             'airline_img1' => $new_name1,
            //             'airline_img2' => $new_name2,
            //             'created_date' =>  $current_date
            //         );

            //         $result = $this->user_model->addAirlines($data);

            //         if ($result) {
            //             $data = array(
            //                 'success' => 'Airline added Successfully'
            //             );
            //             $this->load->view('add_booking_item/manage_airlines', $data);
            //         } else {
            //             $data = array(
            //                 'error' => 'Airline Exist. Please try again'
            //             );
            //             $this->load->view('add_booking_item/manage_airlines', $data);
            //         }
            //     } else {
            //         $error = array('error' => $this->upload->display_errors());
            //         print_r($error);
            //     }
            // }
        }
    }
}
