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
    <title>Travel'Avail | Book Car Rentals</title>
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
            font-weight: 500;
        }

        .description p {
            margin: 10px;
        }

        i.fa-solid {
            font-size: 16px;
        }
    </style>

    <header>
        <div class="" style="display: flex; justify-content: space-between; width: 66%;">
            <a href="<?php echo base_url() . '/' ?>" style="display: flex; align-items: center; width: 30%;"><img src="<?php echo base_url() . '/assets/ta-logo-2.png' ?>" alt="logo" class="logo" style="width: 63%;"></a>

            <nav>
                <a href="<?php echo base_url() . '/' ?>" class="btn btn-light" style="margin-right: 6px; background: none; border: none;">Home</a>
                <a href="<?php echo base_url() . '/FlightController' ?>" class="btn btn-light" style="margin-right: 6px; background: none; border: none">Flights</a>
                <a href="<?php echo base_url() . '/HotelController' ?>" class="btn btn-light" style="margin-right: 6px; background: none; border: none;">Hotels</a>
                <a href="<?php echo base_url() . '/CarrentalController' ?>" class="btn btn-light" style="margin-right: 6px; background: #eef;"><i class="fa-solid fa-car-side" style="color: var(--blue);"></i> Car Rentals</a>
            </nav>
        </div>

        <span class="navbar-text" style="display: flex; align-items: center; justify-content: end; padding: 0;">
            <a href="<?php echo base_url() . '/currency' ?>" class="btn btn-light" id="" style="margin-right: 6px; background: none; border: none">USD</a>
            <a href="<?php echo base_url() . '/login/userlogin' ?>" class="btn btn-dark" id="loginButton">Sign in</a>
        </span>
    </header>

    <div class="container mt-4" style="display: flex; align-items: center; flex-direction: column; min-height: 77vh;">

        <?php foreach ($carrentals as $carrental) : ?>

            <div class="card" style="display: flex; align-items: center; flex-direction: row; border-radius: 12px; width: 70%; margin-bottom: 20px;">
                <div class="card-body">
                    <div class="form-group" style="display: flex; align-items: center; justify-content: space-between; flex-direction: row;">
                        <div class="group" style="display: flex; align-items: center; justify-content: center; flex-direction: column; width: 30%;">
                            <h5 style="color: black; font-weight: 500;"><?php echo $carrental->rental_title; ?></h5>
                            <img src="<?php echo base_url('uploads/image/carrental/' . $carrental->rental_img); ?>" class="card-img-top" alt="<?php echo $carrental->rental_title; ?>" style="width: 88%; border-radius: 12px;">

                        </div>
                        <div class="description">
                            <?php echo $carrental->description; ?>
                        </div>
                        <div class="group" style="display: flex; text-align: center; justify-content: space-evenly; flex-direction: column; margin: 10px;">
                            <h5 class="card-text" style="text-align: center; font-size: 20px; font-weight: 600;"><?php echo $carrental->trip_fare; ?></h5>
                            <p>Per Day</p>
                            <a href="<?php echo base_url('login/bookCarrental/' . $carrental->id); ?>" class="btn btn-primary" style="margin: 10px 0;">Select <i class="bi bi-chevron-right"></i></a>
                            <p><i class="bi bi-patch-check-fill" style="font-size: 16px; color: green; margin-right: 6px;"></i> Verified Car Rental</p>
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