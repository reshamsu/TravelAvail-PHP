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
    <title>Travel'Avail | Hotel Booking</title>
</head>

<body>
    <style>
        .card p {
            margin: 0;
            color: var(--black);
            font-size: 12px;
            font-weight: 500;
        }

        .container form .form-group input {
            padding: 2px 2%;
            background: none;
            border-radius: 6px;
            color: var(--black);
            font-weight: 500;
        }

        .container form .form-group select {
            padding: 2px 2%;
            background: none;
            border-radius: 6px;
            color: var(--black);
            font-weight: 500;
            width: 100px;
        }

        label {
            display: flex;
            align-items: center;
            font-weight: 600;
            color: var(--black);
            margin: 0;
        }

        label i {
            margin-right: 6px;
            font-size: 17px;
        }

        form {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px 12%;
            background: whitesmoke;
            border-radius: 20px;
        }

        .form-group {
            margin: 4px;
            background: #eee;
            border-radius: 10px;
            padding: 10px 2%;
            border: 2.4px solid #ddd;
        }

        nav a.btn.btn-light {
            display: flex;
            align-items: center;
        }
    </style>

    <img src="<?php echo base_url() . '/assets/hotels.jpg' ?>" class="background" alt="">

    <header>
        <div class="" style="display: flex; justify-content: space-between; width: 66%;">
            <a href="<?php echo base_url() . '/' ?>" style="display: flex; align-items: center; width: 30%;"><img src="<?php echo base_url() . '/assets/ta-logo-2.png' ?>" alt="logo" class="logo" style="width: 63%;"></a>

            <nav>
                <a href="<?php echo base_url() . '/' ?>" class="btn btn-light" style="margin-right: 6px; background: none; border: none;">Home</a>
                <a href="<?php echo base_url() . '/flightController' ?>" class="btn btn-light" style="margin-right: 6px; background: none; border: none">Flights</a>
                <a href="<?php echo base_url() . '/hotelController' ?>" class="btn btn-light" style="margin-right: 6px; background: #eef;"><i class="fa-solid fa-bed" style="color: var(--blue);"></i> Hotels</a>
                <a href="<?php echo base_url() . '/carrentalController' ?>" class="btn btn-light" style="margin-right: 6px; background: none; border: none;">Car Rentals</a>
            </nav>
        </div>

        <span class="navbar-text" style="display: flex; align-items: center; justify-content: end; padding: 0;">
            <a href="<?php echo base_url() . '/currency' ?>" class="btn btn-light" id="" style="margin-right: 6px; background: none; border: none">USD</a>
            <a href="<?php echo base_url() . '/login/userlogin' ?>" class="btn btn-primary" id="loginButton">Sign in</a>
        </span>
    </header>

    <div class="container" style="min-height: 70vh; display: flex; align-items: center; justify-content: center; flex-direction: column;">

        <?php
        // Check if the 'text' parameter is set in the URL
        if (isset($_GET['book'])) {
            $clickedText = $_GET['book'];
            echo "<h1 class='heading' style='font-size: 50px; color: var(--white); text-transform: capitalize;'>Book your next stay in <span>$clickedText</span></h1>";
        } else {
            echo "<h1 class='heading' style='font-size: 50px; color: var(--white); text-transform: capitalize;'>Plan your next stay</h1>";
        }
        ?>

        <?php echo validation_errors(); ?>

        <form action="<?php echo base_url('hotelController/processHotels'); ?>" method="post">
            <div class="form-group">
                <label for="hotel_name"><i class="bi bi-geo-alt-fill"></i> Hotel</label>
                <input type="text" name="hotel_name" placeholder="Hotel name or Destination" required>
            </div>
            <div class="form-group">
                <label for="checkin_date"><i class="bi bi-calendar3"></i> Check-In</label>
                <input type="date" name="start_date" class="date" required><br>
            </div>
            <div class="form-group">
                <label for="checkout_date"><i class="bi bi-calendar3"></i> Check-Out</label>
                <input type="date" name="end_date" class="date" required><br>
            </div>
            <div class="form-group">
                <label for="rooms"><i class="bi bi-people-fill"></i> Rooms</label>
                <select class="form-select form-select-sm" name="rooms" aria-label="Small select example">
                    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4+</option>
                </select>
            </div>
            <div class="form-group">
                <label for="guests"><i class="bi bi-people-fill"></i> Guests</label>
                <select class="form-select form-select-sm" name="people" aria-label="Small select example">
                    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6+</option>
                </select>
            </div>

            <input type="submit" value="Search Hotels" class="btn btn-primary" style="padding: 14px 4%; margin-left: 10px; border-radius: 14px; font-size: 16px;">
        </form>
    </div>

    <section class="s5" id="services">
        <div class="box-container">
            <div class="box" style="display: flex; align-items: center; flex-direction: column; justify-content: center;">
                <h3>Travel Partner Guarenteed</h3>
                <img src="assets/support.png" alt="" style="width: 36%; margin: 10px;">
            </div>
            <div class="box" style="display: flex; align-items: center; flex-direction: column; justify-content: center;">
                <h3>Affordable Price Ranges</h3>
                <img src="assets/affordable_price.png" alt="" style="width: 36%; margin: 10px;">
            </div>
            <div class="box" style="display: flex; align-items: center; flex-direction: column; justify-content: center;">
                <h3>Best Booking Score</h3>
                <img src="assets/score.png" alt="" style="width: 36%; margin: 10px;">
            </div>
        </div>
    </section>

    <?php
    $this->load->view('/common/footer.php');
    ?>

    <script src="<?php echo base_url() . 'script/script.js' ?>"></script>
    <script src="<?php echo base_url() . '/script/bootstrap.min.js' ?>"></script>
</body>

</html>