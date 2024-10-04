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
    <title>Travel'Avail | Dashboard Overview</title>
</head>

<body>
    <style>
        .col-3 {
            padding: 8px;
            flex: 1 1 20rem;
            max-width: 33%;
        }

        .card {
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 10px;
            margin: 10px;
            box-sizing: border-box;
        }

        .row a:hover {
            text-decoration: none;
        }

        i.fa-solid {
            font-size: 24px;
            color: black;
            margin: 4px;
            margin-bottom: 14px;
        }

        h5 {
            color: black;
        }
    </style>

    <?php
    $this->load->view('/common/lnav.php');
    ?>

    <section>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;); display: flex; align-items: flex-start; flex-direction: column; margin: 20px 0; border: 0; padding: 0; position: relative; z-index: 1;" aria-label="breadcrumb">
            <ol class="breadcrumb" style="margin: 0; background: none; font-weight: 600; color: #333; padding: 12px 0;">
                <li class="breadcrumb-item"><a href="<?php echo base_url() . '/' ?>" style="color: #333; font-size: 15px;">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #333; font-size: 15px;">Dashboard</li>
            </ol>
            <h2 class="heading" style="padding: 0;">Dashboard</h2>
        </nav>


        <div class="row" style="display: flex; align-items: center; justify-content: space-between; margin: 0;">
            <?php
            // print_r($this->session->userdata('userinfo'));
            // print_r($myprofile);

            $userId = 0;
            foreach ($dashboard as $key => $value) {
                // print_r($value->id);
                $userId = $value->id;

                echo "<div>";
                echo "<h5 style='padding: 10px 0; font-size: 16px; margin: 0; text-transform: capitalize;'>Welcome $value->first_name $value->last_name,</h5>";
                echo "</div>";
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

            <div>
                <a href="<?php echo base_url() . 'login/logout' ?>" class="btn btn-light" style="border-radius: 12px;"><i class="fa-solid fa-arrow-right-from-bracket" style="margin-left: 0; margin-right: 6px; margin-bottom: 0; font-size: 14px;"></i> Log out</a>
            </div>
        </div>

        <div class="row" style="margin: 20px 0;">
            <?php if ($this->session->userdata('routing')['dashboard']) : ?>
                <?php foreach ($this->session->userdata('routing')['dashboard'] as $key => $value) : ?>
                    <?php if ($key == 'myprofile' && $value == 1) : ?>
                        <div class="col-3">
                            <a href="<?php echo base_url() . '/login/profile/' ?>">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="fa-solid fa-id-card" style="color: var(--blue);"></i>
                                        <h5 class="card-title">Personal Info</h5>
                                        <p class="card-text">Secure your details here so we can assist you</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php endif; ?>

                    <?php if ($key == 'manageuser' && $value == 1) : ?>
                        <div class="col-3">
                            <a href="<?php echo base_url() . 'login/manageuser' ?>" style="width: 100%;">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="fa-solid fa-user-group" style="color: blueviolet;"></i>
                                        <h5 class="card-title">Manage Users</h5>
                                        <p class="card-text">Access all signed in users from across the world</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if ($key == 'managebooking' && $value == 1) : ?>
                        <div class="col-3">
                            <a href="<?php echo base_url() . 'login/managebooking' ?>" style="width: 100%;">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="fa-solid fa-check-to-slot" style="color: gold;"></i>
                                        <h5 class="card-title">Manage Bookings</h5>
                                        <p class="card-text">View and manage all booked flights, hotels and rentals made</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if ($key == 'bookinglistings' && $value == 1) : ?>
                        <div class="col-3">
                            <a href="<?php echo base_url() . 'login/bookinglistings' ?>" style="width: 100%;">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="fa-solid fa-list-ul" style="color: coral;"></i>
                                        <h5 class="card-title">Booking Listing</h5>
                                        <p class="card-text">View and manage all booked flights, hotels and rentals made</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if ($key == 'paymenthistory' && $value == 1) : ?>
                        <div class="col-3">
                            <a href="<?php echo base_url() . 'login/paymenthistory' ?>" style="width: 100%;">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="fa-solid fa-money-check-dollar" style="color: limegreen;"></i>
                                        <h5 class="card-title">Payment History</h5>
                                        <p class="card-text">View upto date transactions of bookings made</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if ($key == 'trips' && $value == 1) : ?>
                        <div class="col-3">
                            <a href="<?php echo base_url() . 'login/trips' ?>" style="width: 100%;">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="fa-solid fa-heart" style="color: crimson"></i>
                                        <h5 class="card-title">Saved Trips</h5>
                                        <p class="card-text">Find all your list of favourite destinations are here</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <?php
    $this->load->view('/common/footer.php');
    ?>

    <script src="<?php echo base_url('script/bootstrap.js'); ?>"></script>
</body>

</html>