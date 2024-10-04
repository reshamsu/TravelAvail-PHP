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
        td {
            font-size: 14px;
        }
    </style>

    <?php
    $this->load->view('/common/lnav.php');
    ?>

    <section style="min-height: 80vh;">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;); display: flex; align-items: flex-start; flex-direction: column; margin: 20px 0; border: 0; padding: 0; position: relative; z-index: 1;" aria-label="breadcrumb">
            <ol class="breadcrumb" style="margin: 0; background: none; font-weight: 600; color: #333; padding: 12px 0;">
                <li class="breadcrumb-item"><a href="<?php echo base_url() . '/' ?>" style="color: #333; font-size: 15px;">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'login/dashboard' ?>" style="color: #333; font-size: 15px;">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #333; font-size: 15px;">Payment History</li>
            </ol>
            <h2 class="heading" style="padding: 0;">Payment <span>History</span></h2>
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

        <a href="<?php echo base_url() . '/login/generatepaymentreport' ?>" class="btn btn-dark"> Generate Report</a>

        <div class="data" style="display: flex; align-items: center; flex-direction: column; min-height: 50vh; padding: 10px 0;">
            <table class='table'>
                <thead>
                    <tr style="font-weight: 600;">
                        <td scope='col'>Payment ID</td>
                        <td scope='col'>Transaction Number</td>
                        <td scope='col'>Payment Date</td>
                        <td scope='col'>User ID</td>
                        <td scope='col'>Status</td>
                        <td scope='col'>Amount</td>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($managebooking)) : ?>
                        <tr>
                            <td colspan="6" style="text-align: center;">No pending transactions until now</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($managebooking as $value) : ?>
                            <tr>
                                <td scope='row'><?php echo (isset($value->id)) ? $value->id : ''; ?></td>
                                <td scope='row'><?php echo (isset($value->transaction_number)) ? $value->transaction_number : ''; ?></td>
                                <td scope='row'><?php echo (isset($value->transaction_date)) ? $value->transaction_date : ''; ?></td>
                                <td scope='row'><?php echo (isset($value->user_id)) ? $value->user_id : ''; ?></td>
                                <td scope='row'>
                                    <p style='color: limegreen;'><?php echo (isset($value->status)) ? $value->status : ''; ?></p>
                                </td>
                                <td scope='row'><?php echo (isset($value->trip_fare)) ? $value->trip_fare : ''; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <?php if (empty($managebooking)) {
                echo "<p style='margin: 14px;'>No pending Transactions until now</p>";
            } ?>
        </div>
    </section>


    <?php
    $this->load->view('/common/footer.php');
    ?>

    <script src="<?php echo base_url() . 'script/script.js' ?>"></script>
    <script src="<?php echo base_url() . '/script/bootstrap.min.js' ?>"></script>
</body>

</html>