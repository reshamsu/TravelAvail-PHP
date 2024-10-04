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
        body {
            background-color: #eee;
        }

        .form-group {
            display: flex;
            justify-content: space-around;
            flex-direction: column;
            margin: 0;
        }

        .card p {
            margin: 0;
            color: var(--black);
            font-size: 12px;
        }
    </style>

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
            <a href="<?php echo base_url() . '/login/userlogin' ?>" class="btn btn-dark" id="loginButton">Sign in</a>
        </span>
    </header>

    <div class="container mt-4" style="display: flex; align-items: center; flex-direction: column; min-height: 77vh;">

        <!--<?php
            // Check if the 'text' parameter is set in the URL
            if (isset($_GET['book'])) {
                $clickedText = $_GET['book'];
                echo "<h2 class='heading'>Book a Hotel for <span>$clickedText</span></h2>";
            } else {
                echo "<h2>Book a <span>Hotel</span></h2>";
            }
            ?>-->

        <?php foreach ($hotels as $hotel) : ?>
            <div class="card" style="display: flex; align-items: center; flex-direction: row; border-radius: 12px; width: 90%; margin-bottom: 20px;">
                <div class="card-body" style="display: flex; justify-content: space-between; padding: 0;">
                    <div class="form-group" style="display: flex; align-items: center; justify-content: space-between; flex-direction: row;">
                        <img src="<?php echo base_url() . "/uploads/image/hotel/" . $hotel->hotel_img; ?>" class="card-img-top" alt="<?php echo $hotel->hotel_name; ?>" style="width: 28%; border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                        <div class="group" style="margin: 10px; width: 48%;">
                            <h5 style="color: black;"><?php echo $hotel->hotel_name; ?></h5>
                            <p class="card-text"><?php echo $hotel->description; ?></p>
                        </div>
                        <div class="group" style="display: flex; text-align: center; justify-content: space-evenly; flex-direction: column; margin-right: 30px;">
                            <h5 class="card-text" style="text-align: center; font-size: 18px; font-weight: 600;"><?php echo $hotel->trip_fare; ?></h5>
                            <p>Per Person / Per Night</p>
                            <a href="<?php echo base_url('login/bookHotel/' . $hotel->id); ?>" class="btn btn-primary" style="margin: 10px 0;">Select <i class="bi bi-chevron-right"></i></a>
                            <p><i class="bi bi-patch-check-fill" style="font-size: 16px; color: green; margin-right: 6px;"></i> Verified Hotel</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
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