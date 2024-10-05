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
    <title>Payments</title>
</head>

<body>
    <?php
    $this->load->view('/common/lnav.php');
    ?>

    <section style="display: flex; justify-content: space-between; min-height: 80vh;">

        <div class="data" style="width: 50%; min-height: 60vh;">
            <h2 class="heading" style="padding: 24px 0;">Proceed with <span>Card Payment</span></h2>

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
            <?php echo form_open('login/bookingcompleteSubmit') ?>


            <?php if (isset($bookflight)) : ?>
                <input type="text" name="id" value="<?php //echo $bookflight; ?>">
            <?php endif; ?>

            <?php if (isset($bookhotel)) : ?>
                <input type="text" name="id" value="<?php echo $bookhotel; ?>">
            <?php endif; ?>

            <?php if (isset($bookcarrental)) : ?>
                <input type="text" name="id" value="<?php echo $bookcarrental; ?>">
            <?php endif; ?>

            <input type="text" name="search_type" value="<?php //echo $search_type; ?>">
            <?php
            //  print_r($bookflight); 

            // print_r($search_type); 
            // $session_Data = $this->session->userdata('search_data');
            //              print_r($session_Data);

            ?>
            <p style="padding-bottom: 16px; border-bottom: 2px solid #eee;">You can make the payment through Credit / Debit Card.</p>

            <div class='form-group'>
                <div class="row">
                    <div class="col" style="margin-bottom: 18px;">
                        <label for="input" style="font-weight: 600;">Card number:</label>
                        <input type="text" class="form-control" id='card_number' name='transaction_number' value='' placeholder="Eg: 1234 5678 9012 3456" style='padding: 20px 4%' required>
                    </div>
                </div>
                <div class=" row">
                    <div class="col">
                        <label for="edate" style="font-weight: 600;">Expiry Date:</label>
                        <input type="date" class="form-control" id="edate" name="expiry_date" style="padding: 20px 8%;" reqiured>
                    </div>
                    <div class="col">
                        <label for="security_code" style="font-weight: 600;">Security code:</label>
                        <input type="text" class="form-control" id="code" name="security_code" placeholder="CVV" style="padding: 20px 8%" required>
                    </div>
                </div>
            </div>
            <div>
                <input class="btn btn-primary" type="submit" name="submit" value="Confirm" style="width: 100%; margin: 10px 0; border-radius: 10px;">
                <a href=" <?php echo base_url() . 'login/checkoutflightpayment' ?>" style="color: var(--blue); text-decoration: underline;">Pay with Bank Transfer</a>
            </div>
        </div>

        <?php echo form_close(); ?>
        </div>


        <?php echo form_close(); ?>

        <!-- <div class="data" style="width: 50%; min-height: 60vh;">

            <div class="needful" style="padding: 24px 8%; background: #fff; border-radius: 20px;">
                <?php
                // print_r($this->session->userdata('userinfo'));
                // print_r($myprofile);

                echo form_open('login/confirm_flight_Booking');

                echo "<div style='display: flex; align-items: center; justify-content: space-between;'>";
                echo "<p style='padding: 2px 10px; border: 2px solid lawngreen; color: lawngreen; border-radius: 20px; font-weight: 600;'>Economy</p>";
                echo "<p style='color: var(--black); font-weight: 600; font-size: 16px;'>CMB <i class='fa-solid fa-plane' style='margin: 0 6px; color: var(--blue);'></i> PAR</p>";
                echo "</div>";
                echo "<div style='margin-bottom: 24px;'>";
                echo "<h4 style='font-weight: 700;'>2 Flight Tickets</h4>";
                echo "</div>";

                echo "<form style='padding: 20px 0;'>";
                echo "<form class='form-group'>";
                echo "<div class='row'>";
                echo "<div class='col' style='margin-bottom: 10px;'>";
                echo "<label for='first_name' style=''>Passengers</label>";
                echo   "<p style='color: black; font-weight: 500;'>Drew L.</p>";
                echo "</div>";
                echo  "<div class='col'>";
                echo "<label for='first_name' style=''>Date</label>";
                echo   "<p style='color: black; font-weight: 500;'>Sat, 18 Tue.</p>";
                echo "</div>";
                echo "</div>";

                echo "<form class='form-group'>";
                echo "<div class='row'>";
                echo "<div class='col' style='margin-bottom: 10px;'>";
                echo "<label for='first_name' style=''>Flight</label>";
                echo   "<p style='color: black; font-weight: 500;'>2A4B053</p>";
                echo "</div>";
                echo  "<div class='col'>";
                echo "<label for='first_name' style=''>Gate</label>";
                echo   "<p style='color: black; font-weight: 500;'>77B</p>";
                echo "</div>";
                echo "</div>";

                echo "<form class='form-group'>";
                echo "<div class='row'>";
                echo "<div class='col' style='margin-bottom: 10px;'>";
                echo "<label for='first_name' style=''>Class</label>";
                echo   "<p style='color: black; font-weight: 500;'>Economy</p>";
                echo "</div>";
                echo  "<div class='col'>";
                echo "<label for='first_name' style=''>Seat</label>";
                echo   "<p style='color: black; font-weight: 500;'>21B</p>";
                echo "</div>";
                echo "</div>";


                echo "</form>";
                echo form_close();
                ?>
            </div>
        </div> -->
    </section>

    <?php
    $this->load->view('/common/footer.php');
    ?>

    <script src="<?php echo base_url() . 'script/script.js' ?>"></script>
    <script src="<?php echo base_url() . '/script/bootstrap.min.js' ?>"></script>
</body>

</html>