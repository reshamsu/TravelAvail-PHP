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

    <section style="min-height: 80vh;">
        <div class="data">
            <h2 class="heading" style="padding: 24px 0;">Booking <span>Complete!</span></h2>

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

            <p><i class="fa-regular fa-circle-check" style="font-size: 18px; color: limegreen; margin-right: 4px;"></i> Your flight booking and payment is complete and confirmed.</p>
        </div>
        <div>
            <a href="<?php echo base_url() . 'login/managebooking' ?>" style="color: var(--blue); text-decoration: underline;">View your booking status</a>
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