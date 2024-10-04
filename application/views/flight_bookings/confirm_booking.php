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
    <title>Travel'Avail | Confirm Booking</title>
</head>

<body>
    <style>
        label {
            font-weight: 600;
        }

        h1 {
            margin: 4px 0;
        }

        .card p {
            margin: 0;
            font-size: 12px;
            font-weight: 600;
            color: #fff;
        }
    </style>

    <?php
    $this->load->view('/common/lnav.php');
    ?>

    <section style="display: flex; flex-direction: column; justify-content: space-between;">

        <div class="data" style="width: 46%; min-height: 60vh;">
            <h2 class="heading" style="padding: 24px 0;">Confirm your <span>Booking</span></h2>

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

            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

            <?php 
             $session_Data = $this->session->userdata('search_data');
             print_r($session_Data);

            ?>
            <?php echo form_open('login/checkoutflightpayment2') ?>
            <!-- <?php foreach ($managebooking as $key => $value)  ?> -->
            <input type="text" name="id" value="<?php echo $bookflight; ?>">
            <input type="text" name="search_type" value="<?php echo $search_type; ?>">
            <div style='display: flex; align-items: center;'>
                <div class='card' style='width: 100%; border: none; padding: 18px; border-radius: 14px;'>
                    <i class="fa-solid fa-plane-departure" style='color: var(--blue);'></i>
                    <h1 class='card-text' style="font-size: 50px; color: var(--blue); font-weight: 700; ">CMB</h1>
                    <p style="color: var(--blue);">Colombo, Sri Lanka</p>
                </div>
                <i class="fa-solid fa-arrow-right-arrow-left" style="font-size: 44px; color: var(--blue); margin: 20px;"></i>
                <div class='card' style='width: 100%; border: none; padding: 18px; border-radius: 14px; display: flex; align-items: end;'>
                    <i class="fa-solid fa-plane-arrival" style='color: var(--blue);'></i>
                    <h1 class='card-text' style="font-size: 50px; color: var(--blue); font-weight: 700;">DXB</h1>
                    <p style="color: var(--blue);">Dubai, United Arab Emirates</p>
                </div>
            </div>

            <div style="display: flex; justify-content: space-between; padding: 20px 0;">
                <div class="form-group" style="display: flex; flex-direction: column; margin: 0;">
                    <label for="depart_date">Depart</label>
                    <input type="date" name="start_date" class="date" style='padding: 12px 10%; border: 3px solid #eef; border-radius: 10px; width: 226px;' required>
                </div>
                <div class="form-group" style="display: flex; flex-direction: column; margin: 0;">
                    <label for="depart_date">Arrival</label>
                    <input type="date" name="end_date" class="date" style='padding: 12px 10%; border: 3px solid #eef; border-radius: 10px; width: 226px;' required>
                </div>
            </div>

            <div style="display: flex; justify-content: space-between; padding-bottom: 10px;">
                <div class="form-group" style="display: flex; flex-direction: column;">
                    <label for="passengers">Children</label>
                    <select class="form-select form-select-sm" name="passengers" aria-label="Small select example" style='padding: 12px 11%; border: 3px solid #eef; border-radius: 10px; width: 144px;' required>
                        <option selected>None</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6+</option>
                    </select>
                </div>
                <div class="form-group" style="display: flex; flex-direction: column;">
                    <label for="passengers">Infants</label>
                    <select class="form-select form-select-sm" name="passengers" aria-label="Small select example" style='padding: 12px 11%; border: 3px solid #eef; border-radius: 10px; width: 144px;' required>
                        <option selected>None</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6+</option>
                    </select>
                </div>
                <div class="form-group" style="display: flex; flex-direction: column;">
                    <label for="passengers">Adults</label>
                    <select class="form-select form-select-sm" name="passengers" aria-label="Small select example" style='padding: 12px 11%; border: 3px solid #eef; border-radius: 10px; width: 144px;' required>
                        <option selected>Select</option>
                        <option value="1">1 Person</option>
                        <option value="2">2 People</option>
                        <option value="3">3 People</option>
                        <option value="4">4 People</option>
                        <option value="5">5 People</option>
                        <option value="6">6+ People</option>
                    </select>
                </div>
            </div>

            <div class="form-group" style="display: flex; flex-direction: column;">
                <label for="passengers">Flight Class</label>
                <select class="form-select form-select-sm" name="class" aria-label="Small select example" style='padding: 12px 4%; border: 3px solid #eef; border-radius: 10px;' required>
                    <option selected>Economy</option>
                    <option value="1">Business</option>
                    <option value="2">First Class</option>
                </select>
            </div>
            <div>
                <input class="btn btn-primary" type="submit" name="submit" value="Continue" style="width: 100%; margin: 10px 0; border-radius: 10px;">
                <a href=" <?php echo base_url() . 'login/dashboard' ?>" style="color: var(--black); text-decoration: underline;">Return to Dashboard</a>
            </div>
        </div>

        <?php echo form_close(); ?>
    </section>

    <?php
    $this->load->view('/common/footer.php');
    ?>

    <script src="<?php echo base_url() . 'script/script.js' ?>"></script>
    <script src="<?php echo base_url() . '/script/bootstrap.min.js' ?>"></script>
</body>

</html>