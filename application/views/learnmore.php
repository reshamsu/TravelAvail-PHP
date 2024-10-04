<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,300,0,0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() . '/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . '/css/style.css' ?>">
    <title>Travel'Avail | Learn More</title>
</head>

<body>
    <header>
        <div class="" style="display: flex; justify-content: space-between; width: 66%;">
            <a href="<?php echo base_url() . '/' ?>" style="display: flex; align-items: center; width: 30%;"><img src="<?php echo base_url() . '/assets/ta-logo-2.png' ?>" alt="logo" class="logo" style="width: 63%;"></a>
        </div>

        <span class="navbar-text" style="display: flex; align-items: center; justify-content: end; padding: 0;">
            <a href="<?php echo base_url() . '/currency' ?>" class="btn btn-light" id="" style="margin-right: 6px; background: none; border: none">USD</a>
            <a href="<?php echo base_url() . '/login/userlogin' ?>" class="btn btn-dark" id="loginButton">Sign in</a>
        </span>
    </header>

    <div class="container" style="padding: 20px 0; min-height: 82vh">
        <div class="row">
            <div class="col">
                <?php
                // Check if the 'text' parameter is set in the URL
                if (isset($_GET['book'])) {
                    $clickedText = $_GET['book'];
                    echo "<h2 class='heading'>Book Your Pathway to <span>$clickedText</span></h2>";
                } else {
                    echo "<h2 class='heading'>Book Your <span>Preferred Pathway</span></h2>";
                }
                ?>

                <?php if (isset($success)) : ?>
                    <div class="alert alert-success">
                        <?php echo $success; ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="mode" id="">
            <div class="container">
                <div class="box">
                    <img src="<?php echo base_url() . '/assets/flight4.jpg' ?>" alt="" />
                    <div class="content">
                        <h3 style="text-align: center; color: #fff; font-weight: 600;">Flights</h3>
                        <p>"Embark on a journey that defies gravity and unlocks the boundless possibilities of exploration
                            with Travel'Avail's extraordinary flights."</p>
                        <div class="button" style="text-align: center;">
                            <!--<?php print_r($_GET) ?>-->
                            <a href="<?php echo base_url('/flightController?book($_GET)'); ?>" class="btn btn-light" style="width: 30%;">Book</a>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <img src="<?php echo base_url() . '/assets/hotels.jpg' ?>" alt="" />
                    <div class="content">
                        <h3 style="text-align: center; color: #fff; font-weight: 600">Hotels</h3>
                        <p>"Discover our exceptional hotels, where every stay is a journey worth cherishing. Reservation in service. Welcome to a
                            sanctuary of hospitality".</p>
                        <div class="button" style="text-align: center;">
                            <a href="<?php echo base_url('hotelController?book($_GET)'); ?>" class="btn btn-light" style="width: 30%;">Book</a>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <img src="<?php echo base_url() . '/assets/car-rental.jpg' ?>" alt="" />
                    <div class="content">
                        <h3 style="text-align: center; color: #fff; font-weight: 600">Car Rentals</h3>
                        <p>"Travel with ease and embark on the journey of a lifetime!, knowing that Travel'avail has the perfect rental waiting for you".</p>
                        <div class="button" style="text-align: center;">
                            <a href="<?php echo base_url('carrentalController?book($_GET)'); ?>" class="btn btn-light" style="width: 30%;">Book</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $this->load->view('/common/footer.php');
    ?>

    <script src="<?php echo base_url() . 'script/script.js' ?>"></script>
    <script src="<?php echo base_url() . '/script/bootstrap.min.js' ?>"></script>
</body>

</html>