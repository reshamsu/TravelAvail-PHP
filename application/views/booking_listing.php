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

    <section style="min-height: 82vh;">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;); display: flex; align-items: flex-start; flex-direction: column; margin: 20px 0; border: 0; padding: 0; position: relative; z-index: 1;" aria-label="breadcrumb">
            <ol class="breadcrumb" style="margin: 0; background: none; font-weight: 600; color: #333; padding: 12px 0;">
                <li class="breadcrumb-item"><a href="<?php echo base_url() . '/' ?>" style="color: #333; font-size: 15px;">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'login/dashboard' ?>" style="color: #333; font-size: 15px;">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #333; font-size: 15px;">Booking Listings</li>
            </ol>
            <h2 class="heading" style="padding: 0;">Add a New Booking <span>Listing</span></h2>
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

        <div class="data" style="display: flex; justify-content: space-between; padding: 10px 0;">
            <div class="card">
                <div class="card-body">
                    <div class="form-group" style="display: flex; justify-content: space-between; flex-direction: column; margin: 6px;">
                        <img src="<?php echo base_url() . '/assets/ta-logo.png' ?>" class="logo" alt="">
                        <div class="group" style="margin: 14px 0;">
                            <h4 style="font-weight: 600;">Flights</h4>
                            <p class="card-text" style="font-size: 14px;">"Embark on a journey that defies gravity and unlocks the boundless possibilities of exploration
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
                            <h4 style="font-weight: 600;">Hotels</h4>
                            <p class="card-text" style="font-size: 14px;">"Discover our exceptional hotels, where every stay is a journey worth cherishing. Reservation in service. Welcome to a
                                sanctuary of hospitality".</p>
                        </div>
                        <div class="group" style="display: flex;">
                            <a href="<?php echo base_url() . 'hotelController/uploadHotels' ?>" class="" style="margin: 2px; border-bottom: 2px solid #333; font-weight: 500; color: #333; text-decoration: none;">Add New Item</a>
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
                            <p class="card-text" style="font-size: 14px;">"Travel with ease and peace of mind and and embark on the journey of a lifetime!, knowing that
                                Travel'avail has the perfect rental waiting for you."</p>
                        </div>
                        <div class="group" style="display: flex;">
                            <a href="<?php echo base_url() . 'carrentalController/uploadRentals' ?>" class="" style="margin: 2px; border-bottom: 2px solid #333; font-weight: 500; color: #333; text-decoration: none;">Add New Item</a>
                        </div>
                    </div>
                </div>
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