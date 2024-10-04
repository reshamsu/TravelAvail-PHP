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
        .card-text {
            margin: 0;
        }

        .modal {
            display: flex;
            align-items: unset;
            justify-content: center;
            min-height: 94vh;
            z-index: 1000;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .modal-content {
            padding: 6px;
            width: 100%;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.6);
        }
    </style>

    <?php
    $this->load->view('/common/lnav.php');
    ?>

    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cancel this Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to cancel this booking?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" id="closeButton">Close</button>
                    <button type="button" class="btn btn-danger">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <section>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;); display: flex; align-items: flex-start; flex-direction: column; margin: 20px 0; border: 0; padding: 0; position: relative; z-index: 1;" aria-label="breadcrumb">
            <ol class="breadcrumb" style="margin: 0; background: none; font-weight: 600; color: #333; padding: 12px 0;">
                <li class="breadcrumb-item"><a href="<?php echo base_url() . '/' ?>" style="color: #333; font-size: 15px;">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'login/dashboard' ?>" style="color: #333; font-size: 15px;">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #333; font-size: 15px;">Manage Bookings</li>
            </ol>
            <h2 class="heading" style="padding: 0;">Ongoing <span>Bookings</span></h2>
        </nav>

        <div class="data" style="display: flex; flex-direction: column; min-height: 24vh;">
            <?php if (!empty($managebooking)) { ?>
                <?php foreach ($managebooking as $key => $value) { ?>
                    <div class="card" style="border: 2px solid #eef; border-radius: 12px; margin-bottom: 20px; padding: 0 2%;">
                        <div class="card-body">
                            <div style="display: flex; justify-content: space-between;">
                                <p style="font-weight: 600;"><i class="fa-solid fa-circle" style="color: limegreen;"></i> Active Bookings</p>

                                <div>
                                    <a href="<?php echo base_url() . '/login/reschedule_Bookings/' ?>" class="" id="reschduleButton" style='border-bottom: 2px solid var(--blue); font-weight: 600; color: var(--blue); text-decoration: none; padding: 0 4px; margin-right: 6px;'>Reschedule</a>
                                    <a href="<?php echo base_url() . '/login/cancel/' ?>" class="" id="cancelButton" style='border-bottom: 2px solid red; font-weight: 600; color: red; text-decoration: none; padding: 0 4px;'>Cancel</a>
                                </div>
                            </div>
                            <!-- <p class="card-text"><?php echo $key; ?></p> -->

                            <div class="" style="display: flex; align-items: center;">
                                <p class="card-text" style="font-weight: 600;"><?php echo (isset($value[0]->from_location)) ? $value[0]->from_location : '' ?></p>
                                <i class="fa-solid fa-arrow-right-arrow-left" style="color: var(--blue); margin: 0 2%;"></i>
                                <p class="card-text" style="font-weight: 600;"><?php echo (isset($value[0]->to_location)) ? $value[0]->to_location : '' ?></p>
                            </div>
                            <p class="card-text"><?php echo (isset($value[0]->depart_date)) ? $value[0]->depart_date : '' ?></p>
                            <p class="card-text"><?php echo (isset($value[0]->return_date)) ? $value[0]->return_date : '' ?></p>
                            <p class="card-text"><?php echo (isset($value[0]->passengers)) ? $value[0]->passengers : '' ?></p>
                            <p class="card-text"><?php echo (isset($value[0]->trip_fare)) ? $value[0]->trip_fare : '' ?></p>

                            <div class="" style="display: flex;">
                                <p class="card-text"><?php echo (isset($value[0]->hotel_name)) ? $value[0]->hotel_name : '' ?></p>
                            </div>
                            <p class="card-text"><?php echo (isset($value[0]->checkin_date)) ? $value[0]->checkin_date : '' ?></p>
                            <p class="card-text"><?php echo (isset($value[0]->checkout_date)) ? $value[0]->checkout_date : '' ?></p>
                            <p class="card-text"><?php echo (isset($value[0]->rooms)) ? $value[0]->rooms : '' ?></p>

                            <div class="" style="display: flex;">
                                <p class="card-text"><?php echo (isset($value[0]->pickup_location)) ? $value[0]->pickup_location : '' ?></p>
                                <p class="card-text"><?php echo (isset($value[0]->dropoff_location)) ? $value[0]->dropoff_location : '' ?></p>
                            </div>
                            <p class="card-text"><?php echo (isset($value[0]->pickup_date)) ? $value[0]->pickup_date : '' ?></p>
                            <p class="card-text"><?php echo (isset($value[0]->dropoff_date)) ? $value[0]->dropoff_date : '' ?></p>
                            <p class="card-text"><?php echo (isset($value[0]->passengers)) ? $value[0]->passengers : '' ?></p>

                            <p class="card-text"><?php echo (isset($value[0]->status)) ? $value[0]->status : '' ?></p>
                        </div>
                    </div>
        </div>
    <?php } ?>

    <div class="" style="display: flex; align-items: center;">
        <a href="<?php echo base_url() . '/login/generate_report' ?>" class="" style='border-bottom: 2px solid var(--blue); font-weight: 600; color: var(--blue); text-decoration: none; padding: 0 4px;'> Generate Report</a>
    </div>

<?php } else { ?>
    <p style="margin: 14px;">No pending bookings yet</p>
<?php } ?>

<h2 class="heading" style="margin: 20px 0; padding: 0;">Booking <span>History</span></h2>

<div class="data" style="display: flex; align-items: center; flex-direction: column; min-height: 36vh; padding: 10px 0;">
    <!--   <table class='table'>
                <thead>
                    <tr style="font-weight: 600;">
                        <td scope='col'>Booking ID</td>
                        <td scope='col'>Booking Type</td>
                        <td scope='col'>Email</td>
                        <td scope='col'>Status</th>
                        <td scope='col'>Booked Date</td>
                        <td scope='col'>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // print_r($this->session->userdata('userinfo'));
                    // print_r($myprofile);

                    foreach ($bookinghistory as $key => $value) {
                        print_r($value);
                        $userId = $value->id;
                        echo "<tr>";
                        echo "<td scope='row'>$value->id</td>";
                        echo "<td scope='row'>$value->first_name</td>";
                        echo "<td scope='row'>$value->last_name</td>";
                        echo "<td scope='row'>$value->email</td>";
                        echo "<td scope='row'>$value->address</td>";
                        echo "<td scope='row'>$value->role</td>";
                        echo "<td scope='row'>$value->created_date</td>";
                        echo "<td scope='row'>";
                        echo "<div class='d-grid gap-2 d-md-flex justify-content-md-center'>";
                        echo "<input type='submit' class='' name='view' value='View' style='border-bottom: 2px solid var(--blue); font-weight: 600; color: var(--blue); text-decoration: none; background: none; padding: 0 4px;'>";
                        echo "</div>";
                        echo "</td>";
                        echo "</tr>";
                    } ?>
                </tbody>
            </table>
            <p style="margin: 14px;">No Bookings made until now</p>
        </div>
    </section> -->
    </section>

    <?php
    $this->load->view('/common/footer.php');
    ?>

    <script src="<?php echo base_url() . 'script/script.js' ?>"></script>
    <script src="<?php echo base_url() . '/script/bootstrap.min.js' ?>"></script>
</body>

</html>