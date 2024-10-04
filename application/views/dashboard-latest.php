<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,300,0,0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url() . '/css/bootstrap.min.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url() . '/css/style.css' ?>">
  <title>Travel'Avail | Dashboard Overview</title>
</head>

<body>
  <?php
  $this->load->view('/common/lnav.php');
  ?>

  <div class="sidenav">
    <div>
      <div class="brand" style="padding: 20px 10%;">
        <a href="<?php echo base_url() . '/' ?>" style="display: flex; align-items: center; font-size: 20px; font-weight: 700; color: var(--black); text-decoration: none"><img src="<?php echo base_url() . '/assets/ta-logo.png' ?>" alt="logo" class="logo" style="width: 24%;">Travel'<span>Avail</span></a>
      </div>
      <!--<div class="image" style="display: flex; align-items: center; flex-direction: column; justify-content: center; background: #fff; margin-bottom: 16px;">
      <img src="<?php echo base_url() . '/assets/user.png' ?>" class="card-img-top" alt="..." style="width: 40%; border-radius: 100px; margin: 6px 0">
      <p style="margin: 0; font-weight: 500;">Username</p>
      <p style="font-size: 11px; margin: 0; text-align: end">Administrator/User</p>
    </div>-->
      <div class="tabs">
        <a href="<?php echo base_url() . 'login/dashboard' ?>" class="tab-active"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
        <?php if ($this->session->userdata('routing')['dashboard']) : ?>
          <?php foreach ($this->session->userdata('routing')['dashboard'] as $key => $value) : ?>
            <?php if ($key == 'myprofile' && $value == 1) : ?>
              <a href="<?php echo base_url() . 'login/profile' ?>" class="tab"><i class="fa-solid fa-user"></i> My Profile</a>
            <?php endif; ?>
            <?php if ($key == 'usermanagement' && $value == 1) : ?>
              <a href="<?php echo base_url() . 'login/usermanagement' ?>" class="tab"><i class="fa-solid fa-user-gear"></i> User Management</a>
            <?php endif; ?>
            <?php if ($key == 'bookingmanagement' && $value == 1) : ?>
              <a href="<?php echo base_url() . 'login/bookingmanagement' ?>" class="tab"><i class="fa-solid fa-check-to-slot"></i> Manage Booking</a>
            <?php endif; ?>
            <?php if ($key == 'bookinghistory' && $value == 1) : ?>
              <a href="<?php echo base_url() . 'login/bookinghistory' ?>" class="tab"><i class="fa-solid fa-clock-rotate-left"></i> Booking History</a>
            <?php endif; ?>
            <?php if ($key == 'paymenthistory' && $value == 1) : ?>
              <a href="<?php echo base_url() . 'login/paymenthistory' ?>" class="tab"><i class="fa-solid fa-money-check-dollar"></i> Payment History</a>
            <?php endif; ?>
            <?php if ($key == 'trips' && $value == 1) : ?>
              <a href="<?php echo base_url() . 'login/trips' ?>" class="tab"><i class="fa-solid fa-heart"></i> Trips</a>
            <?php endif; ?>
            <?php if ($key == 'reports' && $value == 1) : ?>
              <a href="<?php echo base_url() . 'login/reports' ?>" class="tab"><i class="fa-solid fa-flag"></i> Reports</a>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
    <div class="" style="display: flex; align-items: center; justify-content: flex-end; flex-direction: column; padding: 10px; margin: 10px; border-top: 1px solid #eee;">
      <a href="<?php echo base_url() . 'login/logout' ?>" class="btn btn-dark" style="padding: 8px 24%; border-radius: 12px; margin: 8px;"><i class="fa-solid fa-arrow-right-from-bracket" style="margin-left: 0; margin-right: 6px"></i> Log out</a>
      <span style="display: flex; justify-content: end;">
        <p style="margin: 4px; text-align: center; font-size: 12px; font-weight: 500;"><i class="bi bi-c-circle" style="margin-right: 4px;"></i>2023 Travel'Avail. All Rights Reserved.</p>
      </span>
    </div>
  </div>

  <section class="db">

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

    <h5 style="padding: 16px 0; font-size: 16px;">Welcome Admin/User,</h5>

    <div class="content">
      <div class="data">
        <p>This sidebar is of full height (100%) and always shown.</p>
        <p>Scroll down the page to see the result.</p>
        <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
        <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
        <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
        <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>