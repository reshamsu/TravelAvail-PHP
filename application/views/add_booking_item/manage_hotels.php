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
    <title>Airline Page</title>
</head>

<body>
    <?php
    $this->load->view('/common/lnav.php');
    ?>

    <section>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;); display: flex; align-items: flex-start; flex-direction: column; margin: 20px 0; border: 0; padding: 0; position: relative; z-index: 1;" aria-label="breadcrumb">
            <ol class="breadcrumb" style="margin: 0; background: none; font-weight: 600; color: #333; padding: 12px 0;">
                <li class="breadcrumb-item"><a href="<?php echo base_url() . '/' ?>" style="color: #333; font-size: 15px;">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'login/dashboard' ?>" style="color: #333; font-size: 15px;">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'login/bookinglistings' ?>" style="color: #333; font-size: 15px;">Booking Listings</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #333; font-size: 15px;">Add Hotel</li>
            </ol>
            <h2 class="heading" style="padding: 0;">Add a listing for <span>Hotels</span></h2>
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

        <div class="data" style="width: 50%; padding: 10px 0;">

            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

            <?php echo form_open_multipart('hotelController/uploadHotels'); ?>

            <div class="form-group">
                <div class="row">
                    <div class="col" style="margin-bottom: 18px;">
                        <label for="hotel_name" style="font-weight: 600;">Hotel name or Destination:</label>
                        <input type="text" class="form-control" name="hotel_name" placeholder="Enter a hotel name" style="padding: 20px 3%; border: 2px solid #eee; border-radius: 6px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="margin-bottom: 18px;">
                        <label for="description" style="font-weight: 600;">Description:</label>
                        <textarea type="text" class="form-control" name="description" placeholder="Add a description" style="padding: 14px 3%; border: 2px solid #eee; border-radius: 6px;"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="margin-bottom: 18px;">
                        <label for="trip_fare" style="font-weight: 600;">Trip Fare:</label>
                        <input type="text" class="form-control" name="trip_fare" placeholder="Set a price" style="padding: 20px 3%; border: 2px solid #eee; border-radius: 6px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="margin-bottom: 18px;">
                        <label for="hotel_title" style="font-weight: 600;">Hotel Title:</label>
                        <input type="text" class="form-control" name="hotel_title" placeholder="Hotel header" style="padding: 20px 3%; border: 2px solid #eee; border-radius: 6px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="margin-top: 18px;">
                        <label for="airline_img" style="font-weight: 600;">Airline Image:</label>
                        <?php echo "<input type='file' class='form control' name='userfile' size='20'"; ?>
                    </div>
                </div>
            </div>
            <div class="button" style="padding: 16px 0;">
                <input class="btn btn-dark" type="submit" name="submit" value="Add" style="width: 24%; border-radius: 10px;">
                <a href="<?php echo base_url() . '/login/bookinglistings' ?>" class="btn btn-light" style='margin: 0 6px; width: 24%; border-radius: 10px;'>Cancel</a>
            </div>
            <?php echo form_close(); ?>
        </div>

        <!--<div class="container">
        <div class="row">
            <div class="col">
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
                <h1>Airline Page</h1>
                <?php echo form_open_multipart('product/addNewCategory'); ?>
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <?php echo "<input type='file' class='form control' name='userfile' size='20'"; ?>
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="Upload">
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>-->
    </section>

    <?php
    $this->load->view('/common/footer.php');
    ?>

</body>

</html>