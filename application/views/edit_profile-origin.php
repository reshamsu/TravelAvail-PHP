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
    <title>Travel'Avail | View Profile</title>
</head>

<body>
    <style>
        .col-3 {
            padding: 14px;
            flex: 1 1 20rem;
        }

        .card {
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 20px;
            display: flex;
            align-items: center;
            padding: 30px;
            margin-right: 46px;
            width: 22%;
            height: 22%;
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
                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'login/dashboard' ?>" style="color: #333; font-size: 15px;">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #333; font-size: 15px;">Profile</li>
            </ol>
            <h2 class="heading" style="padding: 0;">Personal <span>Info</span></h2>
        </nav>

        <div class="row">
            <div id="editprofileModal" class="modal">
                <div class="modal-content" style="height: 84vh; overflow-y: auto;">
                    <div class="">
                        <span class="close" id="closeButton"><i class="fa-solid fa-xmark"></i></span>
                        <h3 class="heading">Edit <span>Profile</span></h3>
                    </div>

                    <?php
                    if (isset($error)) {
                        echo "<div class='alert alert-danger'>";
                        echo $error;
                        echo "</div>";
                    }
                    ?>

                    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                    <?php echo form_open('login/editProfileSubmit');

                    //print_r($this->session->userdata('userinfo'));
                    // print_r($myprofile);
                    $userId = 0;
                    foreach ($myprofile as $key => $value) {
                        // print_r($value->id);
                        $userId = $value->id;
                        echo "<form id='loginForm' method='post'>";
                        echo "<input type='hidden' name='userid' value='{$value->id}'>";
                        echo "<fieldset disabled>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='userid' value='{$value->id}'>";
                        echo "<label for='userId' style='font-weight: 500; margin-right: 6px'>User ID:</label>";
                        echo "<input type='text' class='form-control' id='userId' name='userId' value='$value->id' style='padding: 20px 6%'>";
                        echo "</div>";
                        echo "</fieldset>";
                        echo "<div class='form-group'>";
                        echo "<div class='row'>";
                        echo "<div class='col'>";
                        echo "<label for='first_name' style='font-weight: 500;'>First Name:</label>";
                        echo   "<input type='text' class='form-control' id='first_name' name='first_name' value='$value->first_name' placeholder='First name' style='padding: 20px 12%'>";
                        echo "</div>";
                        echo  "<div class='col'>";
                        echo   "<label for='last_name' style='font-weight: 500;'>Last Name:</label>";
                        echo       "<input type='text' class='form-control' id='last_name' name='last_name' value='$value->last_name' placeholder='Last name' style='padding: 20px 12%'>";
                        echo    "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "<div class='form-group'>";
                        echo "<label for='username' style='font-weight: 500;'>Email Address:</label>";
                        echo  "<input class='form-control' type='email' id='email' name='email' value='$value->email' placeholder='Email' style='padding: 20px 6%'>";
                        echo "</div>";

                        //print_r($this->session->userdata('userinfo')['role']);
                        if ($this->session->userdata('userinfo')['role'] == 'Admin') {
                            echo "<div class='form-group'>";
                            echo "<label for='role' style='font-weight: 500;'>Role:</label>";
                            echo "<select class='form-select form-select-sm' name='role' style='padding: 10px 4%; width: 100%; color: #495057; border: 1px solid #ced4da; border-radius: 0.25rem;'>";
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
                        echo   "<input class='form-control' type='password' id='password' name='password' value='$value->password' placeholder='Password' style='padding: 20px 6%'>";
                        echo "</div>";
                        echo "<div class='form-group'>";
                        echo   "<label for='address' style='font-weight: 500;'>Address:</label>";
                        echo   "<textarea class='form-control' type='text' id='address' name='address' value='' placeholder='Address' style='padding: 14px 6%'>$value->address</textarea>";
                        echo "</div>";
                        echo "<fieldset disabled>";
                        echo "<div class='form-group'>";
                        echo "<label for='created_date' style='font-weight: 500; margin-right: 6px'>Created Date:</label>";
                        echo "<input class='form-control' type='date' id='' name='created_date' value='$value->created_date' style='padding: 20px 6%'>";
                        echo "</div>";
                        echo "</fieldset>";
                        echo "<div class='button' style='text-align: end; padding-top: 14px;'>";
                        echo "<input class='btn btn-dark' type='submit' name='submit' value='Save' style='margin: 0 4px; border-radius: 10px'>";
                        echo "</div>";
                        echo "</form>";
                        echo "</div>";
                        echo form_close();
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="data" style="display: flex; min-height: 50vh; padding: 20px 0;">

            <?php
            // print_r($this->session->userdata('userinfo'));
            // print_r($myprofile);

            $userId = 0;
            foreach ($myprofile as $key => $value) {
                // print_r($value->id);
                $userId = $value->id;
                echo "<div class='card'>";
                echo "<img src='" . base_url() . '/assets/profile.png' . "' class='card-img-top' alt='...' style='width: 70%; border: 2px solid #eee; border-radius: 100px;'>";
                echo "<div class='card-body' style='margin-top: 10px; padding: 0; text-align: center;'>";
                echo "<p class='card-text' style='font-size: 14px;'>$value->role</p>";
                echo "<div style='padding-top: 12px; border-top: 1px solid #eee;'>";
                echo "<h5 class='card-title'>$value->first_name $value->last_name</h5>";
                echo "<p class='card-text'>$value->email</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";

                echo "<div>";
                echo "<fieldset disabled>";
                echo "<div class='form-group'>";
                echo "<input type='hidden' name='userid' value='{$value->id}'>";
                echo "<label for='userId' style='font-weight: 600; margin-right: 6px'>User ID:</label>";
                echo "<input type='text' class='form-control' id='userId' name='userId' value='$value->id' style='padding: 20px 4%'>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<div class='row'>";
                echo "<div class='col'>";
                echo "<label for='first_name' style='font-weight: 600;'>First Name:</label>";
                echo   "<input type='text' class='form-control' id='first_name' name='first_name' value='$value->first_name' placeholder='First name' style='padding: 20px 8%'>";
                echo "</div>";
                echo   "<div class='col'>";
                echo   "<label for='last_name' style='font-weight: 600;'>Last Name:</label>";
                echo       "<input type='text' class='form-control' id='last_name' name='last_name' value='$value->last_name' placeholder='Last name' style='padding: 20px 8%'>";
                echo     "</div>";
                echo "</div>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='username' style='font-weight: 600;'>Email Address:</label>";
                echo  "<input class='form-control' type='email' id='email' name='email' value='$value->email' placeholder='Email Address' style='padding: 20px 4%'>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo   "<label for='password' style='font-weight: 600;'>Password:</label>";
                echo   "<input class='form-control' type='password' id='password' name='password' value='$value->password' placeholder='Password' style='padding: 20px 4%'>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo   "<label for='address' style='font-weight: 600;'>Address:</label>";
                echo "<textarea class='form-control' type='text' id='address' name='address' value='' placeholder='Address' style='padding: 14px 4%'>$value->address</textarea>";
                echo "</div>";
                echo "</fieldset>";
            }
            echo form_close();
            ?>

            <div class='button' style='text-align: end;'>
                <?php
                //print_r($this->session->userdata('routing'));
                if ($this->session->userdata('routing')['profile']['edit']) { ?>
                    <a href="<?php echo base_url() . '/login/editProfile/' . $userId ?>" class="" id="editprofileButton" style='border-bottom: 2px solid var(--black); font-weight: 600; color: var(--black); text-decoration: none; padding: 0 4px;'>Edit</a>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php
    $this->load->view('/common/footer.php');
    ?>

    <script src="<?php echo base_url() . 'script/script.js' ?>"></script>
    <script src="<?php echo base_url() . '/script/bootstrap.min.js' ?>"></script>
</body>

</html>