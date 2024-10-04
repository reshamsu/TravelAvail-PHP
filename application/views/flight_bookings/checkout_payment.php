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
            <h2 class="heading" style="padding: 24px 0;">Proceed with <span>Payment</span></h2>

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
            <?php echo form_open('login/bookingcomplete') ?>

            <p style="padding-bottom: 16px; border-bottom: 2px solid #eee;">You can make the payment directly to our bank account mentioned below.</p>

            <label for="input" style="font-weight: 600;">Account Name:</label>
            <p>Travel'Avail Bank</p>
            <label for="input" style="font-weight: 600;">Account number:</label>
            <p>1234 5678 9101-24</p>
            <label for="input" style="font-weight: 600;">Bank:</label>
            <p>HSBC Private Limited.</p>
            <label for="input" style="font-weight: 600;">Branch:</label>
            <p>Colombo</p>

            <div style="display: flex; flex-direction: column; margin: 6px 0; padding: 14px 0; border-top: 2px solid #eee; border-bottom: 2px solid #eee;">
                <label for="payment_recielt" style="font-weight: 600;">Upload Bank Reciept:</label>
                <?php echo "<input type='file' class='form control' name='userfile' size='20'"; ?>
            </div>
        </div>

        <div>
            <input class="btn btn-primary" type="submit" name="submit" value="Confirm" style="margin: 10px 0; border-radius: 10px;">
            <a href=" <?php echo base_url() . 'login/bookFlight' ?>" class="btn btn-light" style="border-radius: 10px;">Cancel</a>
        </div>
        <a href=" <?php echo base_url() . 'login/checkoutflightpayment2' ?>" style="color: var(--blue); text-decoration: underline;">Pay with Credit/Debit Card</a>
        <?php echo form_close(); ?>
        </div>

        <!-- <div class='form-group'>
                <div class="row">
                    <div class="col" style="margin-bottom: 18px;">
                        <label for="input" style="font-weight: 600;">Card number:</label>
                        <input type="text" class="form-control" id='card_number' name='card_number' value='' placeholder="1234 5678 9012 3456" style='padding: 20px 4%'>
                    </div>
                </div>
                <div class=" row">
                    <div class="col">
                        <label for="edate" style="font-weight: 600;">Expiry Date:</label>
                        <input type="date" class="form-control" id="edate" name="expiry_date" style="padding: 20px 8%;">
                    </div>
                    <div class="col">
                        <label for="security_code" style="font-weight: 600;">Security code:</label>
                        <input type="text" class="form-control" id="code" name="security_code" placeholder="CVV" style="padding: 20px 8%">
                    </div>
                </div>
            </div>
            <div>
                <a href="<?php echo base_url() . 'login/dashboard' ?>" style="color: var(--black); text-decoration: underline;">Return to Dashboard</a>
            </div>
        </div>
        <?php echo form_close(); ?> -->
    </section>

    <?php
    $this->load->view('/common/footer.php');
    ?>

    <script src="<?php echo base_url() . 'script/script.js' ?>"></script>
    <script src="<?php echo base_url() . '/script/bootstrap.min.js' ?>"></script>
</body>

</html>