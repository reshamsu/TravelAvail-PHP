<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,300,0,0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() . '/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . '/css/style.css' ?>">
    <title>Travel'Avail | Flight Booking</title>
</head>

<body>
    <style>
        body {
            background-color: #eee;
        }

        .card p {
            margin: 0;
            color: #888;
            font-size: 13px;
        }

        .container form .form-group input {
            padding: 8px 14px;
            border-radius: 6px;
            color: var(--black);
            border: 2px solid #eef;
            font-weight: 600;
        }

        .container form .form-group input:hover {
            border: 2px solid #333;
        }

        .container form .form-group select {
            padding: 8px 14px;
            background: none;
            border-radius: 6px;
            color: var(--black);
            border: 2px solid #eef;
            font-weight: 600;
        }

        .container form .form-group select:hover {
            border: 2px solid var(--blue);
        }

        label {
            display: flex;
            align-items: center;
            font-weight: 600;
            color: var(--black);
        }

        label i {
            margin-right: 6px;
            font-size: 17px;
        }

        form {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4px 6%;
            background: #fff;
            border-radius: 25px;
            margin-bottom: 20px;
        }
    </style>

    <header>
        <div class="" style="display: flex; justify-content: space-between; width: 66%;">
            <a href="<?php echo base_url() . '/' ?>" style="display: flex; align-items: center; width: 30%;"><img src="<?php echo base_url() . '/assets/ta-logo-2.png' ?>" alt="logo" class="logo" style="width: 63%;"></a>

            <nav>
                <a href="<?php echo base_url() . '/' ?>" class="btn btn-light" style="margin-right: 6px; background: none; border: none;">Home</a>
                <a href="<?php echo base_url() . '/FlightController' ?>" class="btn btn-light" style="margin-right: 6px; background: #eef;"><i class="fa-solid fa-plane" style="color: var(--blue);"></i> Flights</a>
                <a href="<?php echo base_url() . '/HotelController' ?>" class="btn btn-light" style="margin-right: 6px; background: none; border: none;">Hotels</a>
                <a href="<?php echo base_url() . '/CarrentalController' ?>" class="btn btn-light" style="margin-right: 6px; background: none; border: none">Car Rentals</a>
            </nav>
        </div>

        <span class="navbar-text" style="display: flex; align-items: center; justify-content: end; padding: 0;">
            <a href="<?php echo base_url() . '/currency' ?>" class="btn btn-light" id="" style="margin-right: 6px; background: none; border: none">USD</a>
            <a href="<?php echo base_url() . '/login/userlogin' ?>" class="btn btn-dark" id="loginButton">Sign in</a>
        </span>
    </header>

    <div class="container mt-4" style="display: flex; align-items: center; flex-direction: column; min-height: 77vh;">

        <h4 class='heading'><span>Your Next Flight from</span> <?php echo $from_location; ?> <i class='fa-solid fa-arrow-right-arrow-left' style="font-size: 22px; margin: 0 10px; color: var(--blue);"></i> <?php echo $to_location; ?></h4>

        <?php foreach ($flights as $flight) : ?>
            <div class="card" style="display: flex; flex-direction: row; border-radius: 12px; width: 80%;">
                <div class="card-body" style="display: flex; align-items: center; justify-content: space-between;">
                    <div class="form-group" style="margin: 0; width: 64%;">
                        <div class="group" style="display: flex; align-items: center; justify-content: space-between; padding: 10px 6%;">
                            <img src="<?php echo base_url() . "/uploads/image/flight/" . $flight->airline_img1; ?>" class="card-img-top" alt="<?php echo $flight->airline_title; ?>" style="width: 12%;">
                            <div class="group">
                                <h5 class="card-text" style="font-weight: 500;"><?php echo $flight->airline_time1; ?></h5>
                                <p><?php echo $flight->flight_detail1; ?></p>
                            </div>
                            <div class="group">
                                <h6 class="card-text" style="font-weight: 500;"><?php echo $flight->no_of_hours1; ?></h6>
                                <p><?php echo $flight->flight_info; ?></p>
                            </div>
                        </div>
                        <div class="group" style="display: flex; align-items: center; justify-content: space-between; padding: 10px 6%;">
                            <img src="<?php echo base_url() . "/uploads/image/flight/" . $flight->airline_img2; ?>" class="card-img-top" alt="<?php echo $flight->airline_title; ?>" style="width: 12%;">
                            <div class="group">
                                <h5 class="card-text" style="font-weight: 500;"><?php echo $flight->airline_time2; ?></h5>
                                <p><?php echo $flight->flight_detail2; ?></p>
                            </div>
                            <div class="group">
                                <h6 class="card-text" style="font-weight: 500;"><?php echo $flight->no_of_hours2; ?></h6>
                                <p><?php echo $flight->flight_info; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="group" style="display: flex; text-align: center; justify-content: space-evenly; flex-direction: column; margin: 10px;">
                        <h5 class="card-text" style="text-align: center; font-size: 20px; font-weight: 600;"><?php echo $flight->trip_fare; ?></h5>
                        <p>Airline Services</p>
                        <a href="<?php echo base_url('login/bookFlight/' . $flight->id); ?>" class="btn btn-primary" style="margin: 10px 0;">Select <i class="bi bi-chevron-right"></i></a>
                        <p><i class="bi bi-patch-check-fill" style="font-size: 14px; color: green; margin-right: 6px;"></i> Verified Flight</p>
                    </div>
                </div>
            </div>
            <br>
        <?php endforeach; ?>
    </div>
    </div>

    <?php
    $this->load->view('/common/footer.php');
    ?>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>