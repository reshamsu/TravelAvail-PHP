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
    <title>Document</title>
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
                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'login/managebooking' ?>" style="color: #333; font-size: 15px;">Manage Bookings</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #333; font-size: 15px;">Reschedule Bookings</li>
            </ol>
            <h2 class="heading" style="padding: 0;">Reschedule my <span>Bookings</span></h2>
        </nav>

        <div class="data" style="width: 50%; padding: 10px 0;">

            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            <?php echo form_open('login/rescheduleSubmit');

            //print_r($this->session->userdata('userinfo'));
            // print_r($myprofile);
            $userId = 0;
            foreach ($managebooking as $key => $value) {
                // print_r($value->id);
                //$userId = $value->id;
                echo "<form id='loginForm' method='post'>";
                echo "<input type='hidden' name='userid' value='{$value->id}'>";
                echo "<fieldset disabled>";
                echo "<div class='form-group'>";
                echo "<input type='hidden' name='userid' value='{$value->id}'>";
                echo "<label for='userId' style='font-weight: 500; margin-right: 6px'>User ID:</label>";
                echo "<input type='text' class='form-control' id='userId' name='userId' value='$value->id' style='padding: 20px 4%; border: 2px solid #eee; border-radius: 6px;'>";
                echo "</div>";
                echo "</fieldset>";
                echo "<div class='form-group'>";
                echo "<div class='row'>";
                echo "<div class='col'>";
                echo "<label for='first_name' style='font-weight: 500;'>First Name:</label>";
                echo   "<input type='text' class='form-control' id='first_name' name='first_name' value='$value->from_location' placeholder='First name' style='padding: 20px 8%; border: 2px solid #eee; border-radius: 6px;'>";
                echo "</div>";
                echo  "<div class='col'>";
                echo   "<label for='last_name' style='font-weight: 500;'>Last Name:</label>";
                echo       "<input type='text' class='form-control' id='last_name' name='last_name' value='$value->last_name' placeholder='Last name' style='padding: 20px 8%; border: 2px solid #eee; border-radius: 6px;'>";
                echo    "</div>";
                echo "</div>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='username' style='font-weight: 500;'>Username:</label>";
                echo  "<input class='form-control' type='text' id='floatingInput' name='username' value='$value->username' placeholder='Username' style='padding: 20px 4%; border: 2px solid #eee; border-radius: 6px;'>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='username' style='font-weight: 500;'>Email Address:</label>";
                echo  "<input class='form-control' type='email' id='email' name='email' value='$value->email' placeholder='Email' style='padding: 20px 4%; border: 2px solid #eee; border-radius: 6px;'>";
                echo "</div>";

                //print_r($this->session->userdata('userinfo')['role']);
                if ($this->session->userdata('userinfo')['role'] == 'Admin') {
                    echo "<div class='form-group'>";
                    echo "<label for='role' style='font-weight: 500;'>Role:</label>";
                    echo "<select class='form-select form-select-sm' name='role' style='padding: 10px 3%; width: 100%; border: 2px solid #eee; border-radius: 6px; color: #495057;'>";
                    if ($value->role == 'User') {
                        echo "<option selected value='User'>User</option>";
                        echo "<option value='Admin'>Admin</option>";
                    } else {
                        echo "<option selected value='Admin'>Admin</option>";
                        echo "<option value='User'>User</option>";
                    }
                    echo "</select>";
                    echo "</div>";
                }

                echo "<div class='form-group'>";
                echo   "<label for='password' style='font-weight: 500;'>Password:</label>";
                echo   "<input class='form-control' type='password' id='password' name='password' value='$value->password' placeholder='Password' style='padding: 20px 4%; border: 2px solid #eee; border-radius: 6px;'>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo   "<label for='address' style='font-weight: 500;'>Address:</label>";
                echo   "<textarea class='form-control' type='text' id='address' name='address' value='' placeholder='Address' style='padding: 14px 4%; border: 2px solid #eee; border-radius: 6px;'>$value->address</textarea>";
                echo "</div>";
                echo "<fieldset disabled>";
                echo "<div class='form-group'>";
                echo "<label for='created_date' style='font-weight: 500; margin-right: 6px'>Created Date:</label>";
                echo "<input class='form-control' type='date' id='' name='created_date' value='$value->created_date' style='padding: 20px 4%; border: 2px solid #eee; border-radius: 6px;'>";
                echo "</div>";
                echo "</fieldset>";
                echo "<div class='button' style='text-align: end; padding-top: 14px;'>";
                echo "<a href='" . base_url() . "/login/manageuser' class='btn btn-light' style='margin: 0 6px; width: 24%; border-radius: 10px;';>Cancel</a>";
                echo "<input class='btn btn-dark' type='submit' name='submit' value='Update' style='width: 24%; border-radius: 10px;'>";
                echo "</div>";
                echo "</form>";
                echo "</div>";
                echo form_close();
            }
            ?>
        </div>
    </section>

    <?php
    $this->load->view('/common/footer.php');
    ?>

    <script src="<?php echo base_url() . 'script/script.js' ?>"></script>
    <script src="<?php echo base_url() . '/script/bootstrap.min.js' ?>"></script>
</body>

</html>