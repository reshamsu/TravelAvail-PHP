<?php
class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->load->model('flightModel');
        $this->load->library('session');
        $this->load->library("pagination");
    }

    public function index()
    {
        $this->load->view('home');
    }
    // userlogin method

    public function userlogin()
    {
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $data = [];
        if (!empty($success)) {
            $data['success'] = $success;
        }
        if (!empty($error)) {
            $data['error'] = $error;
        }
        if (isset($data['error']) || isset($data['success'])) {
            $this->load->view('login', $data);
        } else {
            if ($this->checkSessionExist()) {
                $this->load->view('dashboard');
            } else {
                $this->load->view('dashboard', $data);
            }
        }
    }

    public function registerSubmit()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            $current_date = date('Y-m-d');
            $data = array(
                'id' => NULL,
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'password' => sha1($_POST['password']),
                'created_date' =>  $current_date
            );
            $result = $this->user_model->registerUser($data);
            if ($result) {
                $data = array(
                    'success' => 'User Registered Successfully'
                );
                $this->load->view('login', $data);
            } else {
                $data = array(
                    'error' => 'User Exist with this Email. Please try again'
                );
                $this->load->view('register', $data);
            }
        }
    }

    public function loginSubmit()
    {
        //validation checks
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $data = array(
                'email' => $_POST['email'],
                'password' => sha1($_POST['password']),
            );
            $result = $this->user_model->loginCheck($data);
            if ($result) {
                // set session 
                $resutlUserData = $this->user_model->getUserData($data);
                print_r($resutlUserData);
                $session_user = array(
                    'id' => $resutlUserData[0]->id,
                    'login' => true,
                    'role' => $resutlUserData[0]->role
                );
                if ($resutlUserData[0]->role == 'Admin') {
                    $actions = array(
                        'dashboard' => [
                            'myprofile' => true,
                            'manageuser' => true,
                            'managebooking' => true,
                            'bookinglistings' => true,
                            'bookinghistory' => true,
                            'paymenthistory' => true,
                            'trips' => true,
                            'reports' => true
                        ],
                        'profile' => [
                            'view' => true,
                            'edit' => true,
                            'delete' => true,
                            'role' == 'Admin' => true
                        ],
                        'manageuser' => [
                            'view' => true,
                            'edit' => true,
                            'delete' => true
                        ],
                        'managebooking' => [
                            'view' => true,
                            'edit' => true,
                            'delete' => true
                        ],
                        'bookinglistings' => [
                            'view' => true,
                            'edit' => true,
                            'delete' => true
                        ],
                        'bookinghistory' => [
                            'view' => true,
                            'edit' => true,
                            'delete' => true
                        ],
                        'paymenthistory' => [
                            'view' => true,
                            'edit' => true,
                            'delete' => true
                        ],
                        'trips' => [
                            'view' => true,
                            'edit' => true,
                            'delete' => true
                        ],
                        'reports' => [
                            'view' => true,
                            'edit' => true,
                            'delete' => true
                        ],
                    );
                } elseif ($resutlUserData[0]->role == 'User') {
                    $actions = array(
                        'dashboard' => [
                            'myprofile' => true,
                            'manageuser' => false,
                            'managebooking' => true,
                            'bookinglistings' => false,
                            'bookinghistory' => true,
                            'paymenthistory' => true,
                            'trips' => true,
                            'reports' => true
                        ],
                        'profile' => [
                            'view' => true,
                            'edit' => true,
                            'delete' => false,
                            'role' == 'User' => false
                        ],
                        'manageuser' => [
                            'view' => false,
                            'edit' => false,
                            'delete' => false,
                            'role' == 'User' => false
                        ],
                        'managebooking' => [
                            'view' => true,
                            'edit' => true,
                            'delete' => true
                        ],
                        'bookinglistings' => [
                            'view' => false,
                            'edit' => false,
                            'delete' => false
                        ],
                        'bookinghistory' => [
                            'view' => true,
                            'edit' => true,
                            'delete' => true
                        ],
                        'paymenthistory' => [
                            'view' => true,
                            'edit' => true,
                            'delete' => false
                        ],
                        'trips' => [
                            'view' => true,
                            'edit' => false,
                            'delete' => false
                        ],
                        'reports' => [
                            'view' => false,
                            'edit' => false,
                            'delete' => false
                        ],
                    );
                }

                $this->session->set_userdata('userinfo', $session_user);
                $this->session->set_userdata('routing', $actions);
                redirect('/login/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Email or password Invalid. Please Try again');
                redirect('login/userlogin');
            }
        }
    }

    public function dashboard()
    {
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $data = [];
        if (!empty($success)) {
            $data['success'] = $success;
        }
        if (!empty($error)) {
            $data['error'] = $error;
        }
        $sessionData = $this->session->userdata('userinfo');
        // print_r($sessionData);
        if ($this->checkSessionExist()) {

            $result = $this->user_model->getUserDataByID($sessionData['id']);
            if ($result) {
                $data['dashboard'] = $result;
                $this->load->view('dashboard', $data);
            }
        }
    }

    public function profile()
    {
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $data = [];
        if (!empty($success)) {
            $data['success'] = $success;
        }
        $sessionData = $this->session->userdata('userinfo');
        // print_r($sessionData);
        if ($this->checkSessionExist()) {

            $result = $this->user_model->getUserDataByID($sessionData['id']);
            if ($result) {
                $data['myprofile'] = $result;
                $this->load->view('profile', $data);
            }
        }
    }

    public function editProfile($id)
    {
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $data = [];
        if (!empty($error)) {
            $data['error'] = $error;
        }
        if ($this->checkSessionExist()) {

            $result = $this->user_model->getUserDataByID($id);
            if ($result) {
                $data['myprofile'] = $result;
                $this->load->view('edit_profile', $data);
            }
        }
    }

    public function editProfileSubmit()
    {
        $this->form_validation->set_rules('username', 'Useranem', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Form details cannot be empty');
            redirect("/login/editProfile/{$_POST['userid']}");
        } else {
            //print_r($_POST);
            $data = array(
                'id' => $_POST['userid'],
                'username' => $_POST['username'],
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'address' => $_POST['address'],
                'role' => $_POST['role']
            );
            print_r($data);
            $result = $this->user_model->updateProfile($data);
            if ($result == 1) {
                $this->session->set_flashdata('success', 'Profile Information Updated Successfully');
                redirect("/login/profile/");
            } elseif ($result == 0) {
                $this->session->set_flashdata('success', 'Profile Information Up-to Date');
                redirect("/login/profile/");
            } else {
                $this->session->set_flashdata('error', 'Error occured Please try again');
                redirect("/login/editProfile/{$_POST['userid']}");
            }
        }
    }

    public function manageUser()
    {
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $data = [];
        if (!empty($success)) {
            $data['success'] = $success;
        }
        if (!empty($error)) {
            $data['error'] = $error;
        }
        $sessionData = $this->session->userdata('userinfo');
        // print_r($sessionData);
        if ($this->checkSessionExist()) {

            $result = $this->user_model->getAllUsers($data);
            if ($result) {
                $data['manageuser'] = $result;
                $this->load->view('manage_users', $data);
            }
        }
    }

    public function addnewUser()
    {
        $result = $this->user_model->getAllUsers();
        if ($result) {
            $data['manageuser'] = $result;
        }
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('add_users');
        } else {
            $current_date = date('Y-m-d');
            $data = array(
                'id' => NULL,
                'username' => $_POST['username'],
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'password' => sha1($_POST['password']),
                'address' => $_POST['address'],
                'created_date' =>  $current_date
            );
            $result = $this->user_model->registerUser($data);
            if ($result) {
                $data = array(
                    'success' => 'User Added Successfully'
                );
                $this->load->view('manage_users', $data);
            } else {
                $data = array(
                    'error' => 'User Exist with this Email. Please try again'
                );
                $this->load->view('add_users', $data);
            }
        }
    }

    public function editUsers($id)
    {
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $data = [];
        if (!empty($success)) {
            $data['success'] = $success;
        }
        if (!empty($error)) {
            $data['error'] = $error;
        }
        if ($this->checkSessionExist()) {

            $result = $this->user_model->getUserDataByID($id);
            if ($result) {
                $data['manageuser'] = $result;
                $this->load->view('edit_users', $data);
            }
        }
    }

    // public function delete_user($id)
    // {
    //     $this->user_model->delete_user($id);
    //     redirect('/login/edit_manageusers');
    // }

    public function edituserSubmit()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Form details cannot be empty');
            redirect("/login/editUsers/{$_POST['userid']}");
        } else {
            //print_r($_POST);
            $data = array(
                'id' => $_POST['userid'],
                'username' => $_POST['username'],
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'password' => sha1($_POST['password']),
                'address' => $_POST['address'],
                'role' => $_POST['role']
            );
            print_r($data);
            $result = $this->user_model->Updateusers($data);
            if ($result == 1) {
                $this->session->set_flashdata('success', 'User Information Updated Successfully');
                redirect("/login/manageUser/");
            } elseif ($result == 0) {
                $this->session->set_flashdata('success', 'User Information Up-to Date');
                redirect("/login/manageUser/");
            } else {
                $this->session->set_flashdata('error', 'Error occured Please try again');
                redirect("/login/editUsers/{$_POST['userid']}");
            }
        }
    }

    public function adduserSubmit()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Form details cannot be empty');
            redirect("/login/addnewUser/{$_POST['userid']}");
        } else {
            //print_r($_POST);

            $current_date = date('Y-m-d');

            $data = array(
                'id' => $_POST['userid'],
                'username' => $_POST['username'],
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'password' => sha1($_POST['password']),
                'address' => $_POST['address'],
                'role' => $_POST['role'],
                'created_date' =>  $current_date
            );
            print_r($data);
            $result = $this->user_model->registerUser($data);
            if ($result == 1) {
                $this->session->set_flashdata('success', 'User Information Updated Successfully');
                redirect("/login/manageUser/");
            } elseif ($result == 0) {
                $this->session->set_flashdata('success', 'User Information Up-to Date');
                redirect("/login/manageUser/");
            } else {
                $this->session->set_flashdata('error', 'Error occured Please try again');
                redirect("/login/addnewUser/{$_POST['userid']}");
            }
        }
    }

    public function generatebookingreport()
    {
        $result = $this->user_model->manageBooking();

        $html = "<table width='100%'><tr><td><h3 style='margin-bottom:0;padding-bottom:0;'>Travel'<span style='var(--blue)'>Avail</span></h3><p style='margin:0;'>Discover. Explore. Experience. Adventure Awaits!</p><p style='margin-top:0;padding-top:0;'>Phone: +94764354222 | Email: info@travelavail.com</p></td><td align='right'>Date Issued<br>";

        $html .= date("F j, Y");
        $html .= "</td></tr></table> <hr>";

        $html .= "<table border='1' style='width:100%;border:1px #333 solid; border-collapse: collapse; margin-bottom:50px;'><tr><th style='padding:10px;' >First Name</th><th style='padding:10px;'>Last Name</th><th style='padding:10px;'>Email</th></tr>";

        foreach ($result as $key => $value) {
            $html .= "<tr><td style='padding:10px;'>{$value->flight_id}</td><td style='padding:10px;text-align:center'>{$value->hotel_id}</td><td style='padding:10px;text-align:center'>{$value->carrental_id}</td></tr>";
        }

        $html .= "</table>";

        $customePaper = array(0, 0, 500, 500);
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper($customePaper, 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("TravelAvail-BookingList.pdf", array("Attachment" => 0));
    }

    public function generatepaymentreport()
    {
        $result = $this->user_model->getAllpayment();
        $html = "<table width='100%'><tr><td><h3 style='margin-bottom:0;padding-bottom:0;'>Travel'Avail</h3><p style='margin-top:0;padding-top:0;'>Phone: +94764354222 | Email: travelavail.lk</p></td><td align='right'>Date Issued<br>";
        $html .= date("F j, Y");
        $html .= "</td></tr></table> <hr>";

        $html .= "<table border='1' style='width:100%;border:1px black solid;border-collapse: collapse;margin-bottom:50px;'><tr><th style='padding:10px;' >Transaction Number</th><th style='padding:10px;'>Expiry Date</th><th style='padding:10px;'>User ID</th><th style='padding:10px;'>Transaction_date</th><th style='padding:10px;'>Status</th></tr>";
        foreach ($result as $key => $value) {
            $html .= "<tr><td style='padding:10px;'>{$value->transaction_number}</td><td style='padding:10px;text-align:center'>{$value->expiry_date}</td><td style='padding:10px;text-align:center'>{$value->user_id}</td><td style='padding:10px;text-align:center'>{$value->transaction_date}</td><td style='padding:10px;text-align:center'>{$value->status}</td></tr>";
        };
        $html .= "</table>";

        $customePaper = array(0, 0, 500, 500);
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html); // load all html and css contents in view
        // $this->dompdf->setPaper('A4', 'landscape');
        // $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->setPaper($customePaper, 'landscape'); // set pdf paper size and orientation
        $this->dompdf->render(); // its convert all html & css elements to pdf
        $this->dompdf->stream("Travel'Avail UserList.pdf", array("Attachment" => 0)); //used to output generated in broswer and its automatically download the pdf
    }

    public function managebooking()
    {
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $data = [];
        if (!empty($success)) {
            $data['success'] = $success;
        }
        if (!empty($error)) {
            $data['error'] = $error;
        }
        $sessionData = $this->session->userdata('userinfo');
        // print_r($sessionData);
        if ($this->checkSessionExist()) {

            $result = $this->user_model->manageBooking($sessionData['id']);
            // print_r($result);
            if ($result) {
                $data['managebooking'] = $result;
                $this->load->view('managebooking', $data);
            }
        }
    }

    public function reschedule_Booking($id)
    {
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $data = [];
        if (!empty($success)) {
            $data['success'] = $success;
        }
        if (!empty($error)) {
            $data['error'] = $error;
        }
        if ($this->checkSessionExist()) {

            $result = $this->user_model->getUserDataByID($id);
            if ($result) {
                $data['managebooking'] = $result;
                $this->load->view('reschedule', $data);
            }
        }
    }

    public function rescheduleSubmit()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Form details cannot be empty');
            redirect("/login/editUsers/{$_POST['userid']}");
        } else {
            //print_r($_POST);
            $data = array(
                'id' => $_POST['userid'],
                'username' => $_POST['username'],
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'password' => sha1($_POST['password']),
                'address' => $_POST['address'],
                'role' => $_POST['role']
            );
            print_r($data);
            $result = $this->user_model->Updateusers($data);
            if ($result == 1) {
                $this->session->set_flashdata('success', 'User Information Updated Successfully');
                redirect("/login/manageUser/");
            } elseif ($result == 0) {
                $this->session->set_flashdata('success', 'User Information Up-to Date');
                redirect("/login/manageUser/");
            } else {
                $this->session->set_flashdata('error', 'Error occured Please try again');
                redirect("/login/editUsers/{$_POST['userid']}");
            }
        }
    }

    public function cancel()
    {
        $booking_id = $_POST['id']; // Assuming 'id' is the booking ID

        // Call the user_model to cancel the booking
        $result = $this->user_model->cancelBooking($booking_id);

        if ($result) {
            $this->session->set_flashdata('success', 'Your booking is successfully canceled');
        } else {
            $this->session->set_flashdata('error', 'An error occurred. Please try again');
        }

        redirect("/login/managebooking/");
    }

    public function bookinglistings()
    {
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $data = [];
        if (!empty($success)) {
            $data['success'] = $success;
        }
        if (!empty($error)) {
            $data['error'] = $error;
        }
        $sessionData = $this->session->userdata('userinfo');
        // print_r($sessionData);
        if ($this->checkSessionExist()) {

            $result = $this->user_model->bookinglistings($sessionData['id']);
            if ($result) {
                $data['bookinglisting'] = $result;
                $this->load->view('booking_listing', $data);
            }
        }
    }

    public function addairlines()
    {
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $data = [];
        if (!empty($success)) {
            $data['success'] = $success;
        }
        if (!empty($error)) {
            $data['error'] = $error;
        }
        $sessionData = $this->session->userdata('userinfo');
        // print_r($sessionData);
        if ($this->checkSessionExist()) {
            print_r($data);
            $result = $this->user_model->addAirlines($sessionData['id']);
            if ($result) {
                $data['manageairlines'] = $result;
                //$this->load->view('manage_airlines', $data);
            }
        }
    }

    public function bookinghistory($data)
    {
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $data = [];
        if (!empty($success)) {
            $data['success'] = $success;
        }
        if (!empty($error)) {
            $data['error'] = $error;
        }
        if ($this->checkSessionExist()) {

            $result = $this->user_model->bookinghistory($data);
            if ($result) {
                $data['bookinghistory'] = $result;
                $this->load->view('managebooking', $data);
            }
        }
    }

    public function paymenthistory()
    {
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $data = [];
        if (!empty($success)) {
            $data['success'] = $success;
        }
        if (!empty($error)) {
            $data['error'] = $error;
        }
        $sessionData = $this->session->userdata('userinfo');
        //print_r($sessionData);


        $result = $this->user_model->viewPayments($sessionData['id']);
        //print_r($result);
        if ($result) {
            $data['managebooking'] = $result;
            $this->load->view('payment_history', $data);
        }
    }

    public function Allpaymenthistory()
    {
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $data = [];
        if (!empty($success)) {
            $data['success'] = $success;
        }
        if (!empty($error)) {
            $data['error'] = $error;
        }
        $sessionData = $this->session->userdata('userinfo');
        print_r($sessionData);


        $result = $this->user_model->viewPayments($sessionData['id']);
        print_r($result);
        // if ($result) {
        //     $data['paymenthistory'] = $result;
        //     $this->load->view('payment_history', $data);
        // }
    }

    public function bookFlight($id)
    {
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $data = [];
        if (!empty($success)) {
            $data['success'] = $success;
        }
        if (!empty($error)) {
            $data['error'] = $error;
        }
        if ($this->checkSessionExist()) {

            $result = $this->user_model-- > ($id);
            //print_r($result);
            if ($result) {
                $data['bookflight'] = $result;
                $data['search_type'] = 'flight';


                $this->load->view('flight_bookings/checkout_payment2', $data);
            }
        }
    }

    public function bookHotel($id)
    {
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $data = [];
        if (!empty($success)) {
            $data['success'] = $success;
        }
        if (!empty($error)) {
            $data['error'] = $error;
        }
        if ($this->checkSessionExist()) {

            $result = $this->user_model-- > ($id);
            print_r($result);
            if ($result) {
                $data['bookhotel'] = $result;
                $data['search_type'] = 'hotel';


                $this->load->view('flight_bookings/checkout_payment2', $data);
            }
        }
    }

    public function comfirmflightBooking()
    {
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $data = [];
        if (!empty($success)) {
            $data['success'] = $success;
        }
        if (!empty($error)) {
            $data['error'] = $error;
        }
        $sessionData = $this->session->userdata('userinfo');
        // print_r($sessionData);
        if ($this->checkSessionExist()) {

            $result = $this->user_model->getUserDataByID($sessionData['id']);
            if ($result) {
                $data['confirm_booking'] = $result;
                $this->load->view('flight_bookings/confirm_booking', $data);
            } else {
                $this->load->view('flight_bookings/confirm_booking');
            }
        }
    }

    public function checkoutflightPayment()
    {
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $data = [];
        if (!empty($success)) {
            $data['success'] = $success;
        }
        if (!empty($error)) {
            $data['error'] = $error;
        }
        $sessionData = $this->session->userdata('userinfo');
        // print_r($sessionData);
        if ($this->checkSessionExist()) {

            $result = $this->user_model->getUserDataByID($sessionData['id']);
            if ($result) {
                $data['payment'] = $result;
                $this->load->view('flight_bookings/checkout_payment', $data);
            } else {
                $this->load->view('flight_bookings/checkout_payment');
            }
        }
    }

    public function checkoutflightPayment2()
    {

        print_r($_POST);
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $data = [];
        if (!empty($success)) {
            $data['success'] = $success;
        }
        if (!empty($error)) {
            $data['error'] = $error;
        }
        $sessionData = $this->session->userdata('userinfo');
        // print_r($sessionData);
        if ($this->checkSessionExist()) {

            $result = $this->user_model->getUserDataByID($sessionData['id']);
            if ($result) {
                $data['payment'] = $result;
                $data['post_data'] = $_POST;
                $this->load->view('flight_bookings/checkout_payment2', $data);
            } else {
                $this->load->view('flight_bookings/checkout_payment2');
            }
        }
    }

    public function bookingcomplete()
    {
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $data = [];
        if (!empty($success)) {
            $data['success'] = $success;
        }
        if (!empty($error)) {
            $data['error'] = $error;
        }
        $sessionData = $this->session->userdata('userinfo');
        // print_r($sessionData);
        if ($this->checkSessionExist()) {

            $result = $this->user_model->getUserDataByID($sessionData['id']);
            if ($result) {
                $data['payment'] = $result;
                $this->load->view('flight_bookings/booking_complete', $data);
            } else {
                $this->load->view('flight_bookings/booking_complete');
            }
        }
    }

    public function bookingcompleteSubmit()
    {
        //print_r($_POST);

        $session_searchdata = $this->session->userdata('search_data');
        //print_r($session_searchdata);

        $sessionData = $this->session->userdata('userinfo');
        $this->form_validation->set_rules('transaction_number', 'Card Number', 'required');
        $this->form_validation->set_rules('expiry_date', 'Expiration Date', 'required');
        $this->form_validation->set_rules('security_code', 'Security Code', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('flight_bookings/checkout_payment2');
        } else {
            $current_date = date('Y-m-d');

            $data = array(
                'id' => NULL,
                'transaction_number' => $_POST['transaction_number'],
                'expiry_date' => $_POST['expiry_date'],
                'security_code' => $_POST['security_code'],
                'transaction_date' =>  $current_date,
                'status' => 'Complete',
                'user_id' => $sessionData['id'],
            );
            $paymentID = $this->user_model->processPayment($data);
            $data_bookingtbl = array(
                'id' => NULL,
                'flight_id' => ($_POST['search_type'] == 'flight') ? $_POST['id'] : 0,
                'hotel_id' => ($_POST['search_type'] == 'hotel') ? $_POST['id'] : 0,
                'carrental_id' => ($_POST['search_type'] == 'carrental') ? $_POST['id'] : 0,
                'user_id' => $sessionData['id'],
                'payment_id' => $paymentID,
                'start_date' =>  $session_searchdata['start_date'],
                'end_date' => $session_searchdata['end_date'],
                'created_date' => $current_date,
                'status' => 'Active',
                'people' => $session_searchdata['people'],
            );
            //print_r($data);
            $result = $this->user_model->insertBookingTable($data_bookingtbl);
            $sessionData = $this->session->userdata('userinfo');

            $result = $this->user_model->viewPayments($sessionData['id']);
            if ($result) {
                $data['payment'] = $result;
                $this->load->view('flight_bookings/booking_complete', $data);
            } else {
                $this->load->view('flight_bookings/booking_complete');
            }
        }



        // if ($result) {
        //     $data = array(
        //         'success' => 'Payment Successful'
        //     );
        //     $this->load->view('flight_bookings/booking_complete', $data);
        // } else {
        //     $data = array(
        //         'error' => 'Payment Details Invalid. Please try again'
        //     );
        //     $this->load->view('flight_bookings/checkout_payment2', $data);
        // }
    }
    public function checkSessionExist()
    {
        if (!$this->session->has_userdata('userinfo')) {
            $this->session->set_flashdata('error', 'Please login first to access the page');
            redirect('login/userlogin');
        } else {
            return true;
        }
        if (!$this->session->has_userdata('userinfo')) {
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('userinfo');
        $this->session->set_flashdata('success', 'Logout Success');
        redirect('login/userlogin');
    }
}
