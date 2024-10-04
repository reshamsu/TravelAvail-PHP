<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,300,0,0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() . '/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . '/css/style.css' ?>">
    <title>Travel'Avail | User Management</title>
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

    <section>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;); display: flex; align-items: flex-start; flex-direction: column; margin: 20px 0; border: 0; padding: 0; position: relative; z-index: 1;" aria-label="breadcrumb">
            <ol class="breadcrumb" style="margin: 0; background: none; font-weight: 600; color: #333; padding: 12px 0;">
                <li class="breadcrumb-item"><a href="<?php echo base_url() . '/' ?>" style="color: #333; font-size: 15px;">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'login/dashboard' ?>" style="color: #333; font-size: 15px;">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #333; font-size: 15px;">Manage Users</li>
            </ol>
            <h2 class="heading" style="padding: 0;">Manage <span>Users</span></h2>
        </nav>

        <?php
        if (isset($success)) {
            echo "<div class='alert alert-success'>";
            echo $success;
            echo "</div>";
        }
        ?>

        <div class="" style="display: flex; align-items: center; justify-content: space-between;">
            <a href="<?php echo base_url() . '/login/addnewUser' ?>" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add New User</a>
        </div>

        <div class="data" style="padding: 20px 0; min-height: 50vh; padding: 10px 0;">

            <table class='table'>
                <thead>
                    <tr style="font-weight: 600;">
                        <td scope='col'>User ID</td>
                        <td scope='col'>Username</td>
                        <td scope='col'>First Name</td>
                        <td scope='col'>Last Name</td>
                        <td scope='col'>Email</td>
                        <td scope='col'>Role</th>
                        <td scope='col'>Status</th>
                        <td scope='col'>Registered Date</td>
                        <td scope='col'>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // print_r($this->session->userdata('userinfo'));
                    // print_r($myprofile);

                    $userId = 0;
                    foreach ($manageuser as $key => $value) {
                        // print_r($value->id);
                        $userId = $value->id;
                        echo "<tr>";
                        echo "<td scope='row'>$value->id</td>";
                        echo "<td scope='row'>$value->username</td>";
                        echo "<td scope='row'>$value->first_name</td>";
                        echo "<td scope='row'>$value->last_name</td>";
                        echo "<td scope='row'>$value->email</td>";
                        echo "<td scope='row'>$value->role</td>";
                        echo "<td scope='row'><p style='color: limegreen; font-weight: 500; margin: 0;'>$value->status</p></td>";
                        echo "<td scope='row'>$value->created_date</td>";
                        echo "<td scope='row'>";
                        echo "<div class='d-grid gap-2 d-md-flex justify-content-md-center'>";
                        //print_r($this->session->userdata('routing'));
                        if ($this->session->userdata('routing')['manageuser']['edit']) { ?>
                            <a href="<?php echo base_url() . '/login/editUsers/' . $userId ?>" class="" id="editprofileButton" style='border-bottom: 2px solid var(--black); font-weight: 600; color: var(--black); text-decoration: none; padding: 0 4px;'>Edit</a>
                    <?php }

                        echo "<input type='submit' class='' name='delete_user' value='Delete' style='color: red; border-bottom: 2px solid red; font-weight: 600; text-decoration: none; background: none; padding: 0 4px; margin-left: 6px;'>";
                        echo "</div>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo form_close();
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <?php
    $this->load->view('/common/footer.php');
    ?>

    <script src="<?php echo base_url() . 'script/script.js' ?>"></script>
    <script src="<?php echo base_url() . '/script/bootstrap.min.js' ?>"></script>
</body>

</html>