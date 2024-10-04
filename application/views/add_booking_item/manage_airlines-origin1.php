<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,300,0,0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() . '/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . '/css/style.css' ?>">
    <title>Travel'Avail | Booking Management</title>
</head>

<body>
    <style>
        .card {
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.1);
            border: none;
            display: flex;
            align-items: center;
            flex-direction: row;
            border-radius: 12px;
            width: 32%;
        }
    </style>

    <?php
    $this->load->view('/common/lnav.php');
    ?>

    <section>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;); display: flex; align-items: flex-start; flex-direction: column; margin: 20px 0; border: 0; padding: 0; position: relative; z-index: 1;" aria-label="breadcrumb">
            <ol class="breadcrumb" style="margin: 0; background: none; font-weight: 600; color: #333; padding: 12px 0;">
                <li class="breadcrumb-item"><a href="<?php echo base_url() . '/' ?>" style="color: #333; font-size: 15px;">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'login/dashboard' ?>" style="color: #333; font-size: 15px;">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'login/bookinglistings' ?>" style="color: #333; font-size: 15px;">Booking Listings</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #333; font-size: 15px;">Add Flight</li>
            </ol>
            <h2 class="heading" style="padding: 0;">Manage <span>Bookings</span></h2>
        </nav>

        <?php
        if (isset($success)) {
            echo "<div class='alert alert-success'>";
            echo $success;
            echo "</div>";
        }
        if (isset($error)) {
            echo "<div class='alert alert-danger'>";
            echo $error;
            echo "</div>";
        }
        ?>

        <div class="row">
            <div class="col">
                <div id="editprofileModal" class="modal">
                    <div class="modal-content" style="height: 70vh; width: 50%; overflow-y: auto;">
                        <!--<span class="close" id="closeButton"><i class="fa-solid fa-xmark"></i></span>-->

                        <h3 style="padding: 20px 0; font-weight: 800;">Add <span>Airlines</span></h3>

                        <?php
                        if (isset($error)) {
                            echo "<div class='alert alert-danger'>";
                            echo $error;
                            echo "</div>";
                        }
                        ?>

                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                        <?php echo form_open('login/editProfileSubmit');

                        //print_r($this->session->userdata('userinfo'));
                        // print_r($myprofile);
                        $userId = 0;
                        foreach ($manageairlines as $key => $value) {
                            // print_r($value->id);
                            $userId = $value->id;
                            echo "<form id='loginForm' method='post'>";
                            echo "<div style='display: flex; justify-content: space-around; padding-top: 10px;'>";
                            echo "<div style='display: flex; flex-direction: column; width: 44%;'>";
                            echo "<input type='hidden' name='userid' value='{$value->id}'>";
                            echo "<fieldset disabled>";
                            echo "<div class='form-group'>";
                            echo "<input type='hidden' name='userid' value='{$value->id}'>";
                            echo "<label for='userId' style='font-weight: 500; margin-right: 6px'>User ID:</label>";
                            echo "<input type='text' class='form-control' id='userId' name='userId' value='$value->id' style='padding: 20px 6%'>";
                            echo "</div>";
                            echo "</fieldset>";
                            echo "<div class='form-group'>";
                            echo "<div class='row'>";
                            echo "<div class='col'>";
                            echo "<label for='first_name' style='font-weight: 500;'>First Name:</label>";
                            echo   "<input type='text' class='form-control' id='first_name' name='first_name' value='$value->first_name' placeholder='First name' style='padding: 20px 12%'>";
                            echo "</div>";
                            echo  "<div class='col'>";
                            echo   "<label for='last_name' style='font-weight: 500;'>Last Name:</label>";
                            echo       "<input type='text' class='form-control' id='last_name' name='last_name' value='$value->last_name' placeholder='Last name' style='padding: 20px 12%'>";
                            echo    "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class='form-group'>";
                            echo "<label for='username' style='font-weight: 500;'>Email Address:</label>";
                            echo  "<input class='form-control' type='email' id='email' name='email' value='$value->email' placeholder='Email' style='padding: 20px 6%'>";
                            echo "</div>";
                            echo "<div class='form-group'>";
                            echo "<label for='last_name' style='font-weight: 500;'>Role:</label>";
                            echo "<select class='form-select form-select-sm' name='role' style='padding: 10px 4%; width: 100%; color: #495057; border: 1px solid #ced4da; border-radius: 0.25rem;'>";
                            if ($value->role == 'User') {
                                echo "<option selected value='User'>User</option>";
                                echo "<option value='Admin'>Admin</option>";
                            } else {
                                echo "<option selected value='Admin'>Admin</option>";
                                echo "<option value='User'>User</option>";
                            }
                            echo "</select>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div style='display: flex; flex-direction: column; width: 44%;''>";
                            echo "<div class='form-group'>";
                            echo   "<label for='password' style='font-weight: 500;'>Password:</label>";
                            echo   "<input class='form-control' type='password' id='password' name='password' value='$value->password' placeholder='Password' style='padding: 20px 6%'>";
                            echo "</div>";
                            echo "<div class='form-group'>";
                            echo   "<label for='address' style='font-weight: 500;'>Address:</label>";
                            echo   "<textarea class='form-control' type='text' id='address' name='address' value='' placeholder='Address' style='padding: 14px 6%'>$value->address</textarea>";
                            echo "</div>";
                            echo "<fieldset disabled>";
                            echo "<div class='form-group'>";
                            echo "<label for='created_date' style='font-weight: 500; margin-right: 6px'>Created Date:</label>";
                            echo "<input class='form-control' type='date' id='' name='created_date' value='$value->created_date' style='padding: 20px 4%'>";
                            echo "</div>";
                            echo "</fieldset>";
                            echo "<div class='button' style='text-align: end; padding-top: 30px;'>";
                            echo "<a href='" . base_url() . "/login/profile/{$value->id}' class='btn btn-light' style='margin: 4px; border-radius: 10px'>Cancel</a>";
                            echo "<input class='btn btn-dark' type='submit' name='submit' value='Save' style='margin: 0 4px; border-radius: 10px'>";
                            echo "</div>";
                            echo "</form>";
                            echo "</div>";
                            echo form_close();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="data" style="display: flex; justify-content: space-between; padding: 10px 0;">
            <div class="card">
                <div class="card-body">
                    <div class="form-group" style="display: flex; justify-content: space-between; flex-direction: column; margin: 6px;">
                        <img src="<?php echo base_url() . '/assets/ta-logo.png' ?>" class="logo" alt="">
                        <div class="group" style="margin: 14px 0;">
                            <h4 style="font-weight: 600;">Flights</h4>
                            <p class="card-text" style="color: #333; font-size: 14px; font-weight: 4600;">"Embark on a journey that defies gravity and unlocks the boundless possibilities of exploration
                                with Travel'Avail's extraordinary flights."</p>
                        </div>
                        <div class="group" style="display: flex;">
                            <a href="<?php echo base_url() . 'flightController/uploadFlights' ?>" class="" style="margin: 2px; border-bottom: 2px solid #333; font-weight: 500; color: #333; text-decoration: none;">Add New Item</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group" style="display: flex; justify-content: space-between; flex-direction: column; margin: 6px;">
                        <img src="<?php echo base_url() . '/assets/ta-logo.png' ?>" class="logo" alt="">
                        <div class="group" style="margin: 14px 0;">
                            <h4 style="font-weight: 600;">Car Rentals</h4>
                            <p class="card-text" style="color: #333; font-size: 14px; font-weight: 400;">"Travel with ease and peace of mind and and embark on the journey of a lifetime!, knowing that
                                Travel'avail has the perfect rental waiting for you."</p>
                        </div>
                        <div class="group" style="display: flex;">
                            <a href="<?php echo base_url() . 'carrentalController/uploadRentals' ?>" class="" style="margin: 2px; border-bottom: 2px solid #333; font-weight: 500; color: #333; text-decoration: none;">Add New Item</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group" style="display: flex; justify-content: space-between; flex-direction: column; margin: 6px;">
                        <img src="<?php echo base_url() . '/assets/ta-logo.png' ?>" class="logo" alt="">
                        <div class="group" style="margin: 14px 0;">
                            <h4 style="font-weight: 600;">Hotels</h4>
                            <p class="card-text" style="color: #333; font-size: 14px; font-weight: 400;">"Discover our exceptional hotels, where every stay is a journey worth cherishing. Reservation in service. Welcome to a
                                sanctuary of hospitality".</p>
                        </div>
                        <div class="group" style="display: flex;">
                            <a href="<?php echo base_url() . 'hotelController/uploadHotels' ?>" class="" style="margin: 2px; border-bottom: 2px solid #333; font-weight: 500; color: #333; text-decoration: none;">Add New Item</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="heading" style="padding: 20px 0;">Traveller's <span>Bookings</span></h2>

        <div class="data" style="display: flex; align-items: center; flex-direction: column; min-height: 50vh;">
            <table class='table'>
                <thead>
                    <tr style="font-weight: 600;">
                        <td scope='col'>User ID</td>
                        <td scope='col'>Booking Type</td>
                        <td scope='col'>Email</td>
                        <td scope='col'>Status</th>
                        <td scope='col'>Booked Date</td>
                        <td scope='col'>Action</td>
                    </tr>
                </thead>
                <!--<tbody>
                        <?php foreach ($bookinghistory as $key => $value) { ?>
                            <tr>
                                <td scope='row'><?php echo $value->id; ?></td>
                                <td scope='row'><?php echo $value->booking_type; ?></td>
                                <td scope='row'><?php echo $value->email; ?></td>
                                <td scope='row'><?php echo $value->status; ?></td>
                                <td scope='row'><?php echo $value->created_date; ?></td>
                                <td scope='row'><?php echo $value->action; ?></td>
                                <td scope='row'>
                                    <div class='d-grid gap-2 d-md-flex justify-content-md-center'>
                                        <input type='submit' class='btn btn-light' name='edit' value='Edit' style='color: var(--blue); font-weight: 500; background: #eef; border-radius: 10px'>
                                        <input type='submit' class='btn btn-light' name='Delete' value='Delete' style='color: red; font-weight: 500; background: #eef;  margin: 0 6px; border-radius: 10px'>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>-->
            </table>
            <p style="margin: 14px;">No User Bookings yet</p>
        </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="f2">
                <div class="cl">
                    <h6>Support</h6>
                    <ul>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Safety Regulations</a></li>
                        <li><a href="#">Disability Support</a></li>
                        <li><a href="#">Help with Booking</a></li>
                    </ul>
                </div>
                <div class="cl">
                    <h6>Explore</h6>
                    <ul>
                        <li><a href="#">Write a review</a></li>
                        <li><a href="#">Community Forum</a></li>
                        <li><a href="#">Assisting Resources</a></li>
                        <li><a href="#">Travelers's Choice</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                <div class="cl">
                    <h6>Travel'Avail</h6>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Resource and Policy</a></li>
                        <li><a href="#">Carrers</a></li>
                        <li><a href="#">Trust and Safety</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>

            <div class="f3">
                <div class="content">
                    <i class="bi bi-c-circle" style="font-size: 12px;"></i>
                    <p>2024 Travel'Avail. All Rights Reserved.</p>
                </div>
                <ul>
                    <a href="https://web.facebook.com/?_rdc=1&_rdr"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.pinterest.com/"><i class="bi bi-pinterest"></i></a>
                    <a href="https://www.twitter.com/"><i class="bi bi-twitter"></i></a>
                    <a href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a>
                </ul>
            </div>
        </div>
    </footer>

    <script src="<?php echo base_url() . 'script/script.js' ?>"></script>
    <script src="<?php echo base_url() . '/script/bootstrap.min.js' ?>"></script>
</body>

</html>