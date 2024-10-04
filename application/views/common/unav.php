<nav style="justify-content: space-around;">
  <div class="brand">
    <a href="<?php echo base_url() . '/' ?>" style="display: flex; align-items: center; font-size: 20px; font-weight: 700; color: var(--black); text-decoration: none"><img src="<?php echo base_url() . '/assets/ta-logo.png' ?>" alt="logo" class="logo" style="width: 14%;">Travel'<span>Avail</span></a>
  </div>

  <span style="display: flex; align-items: center; text-align: end; justify-content: end;">
    <div class="notify" style="display: flex; align-items: center; padding: 10px; margin: 10px; border-radius: 20px;">
      <i class="fa-solid fa-bell" style="color: var(--black); font-size: 18px; margin: 0;"></i>
    </div>

    <!--
    <?php
    // print_r($this->session->userdata('userinfo'));
    // print_r($myprofile);

    $userId = 0;
    foreach ($creds as $key => $value) {
      // print_r($value->id);
      $userId = $value->id;

      echo "<div class='navbar-text'>";
      echo "<!--<i class='fa-regular fa-bell' style='font-size: 17px; color: black;'></i>-->";
      echo "<p style='margin: 0; font-weight: 800;'>$value->first_name $value->last_name</p>";
      echo "<p style='font-size: 12px; margin: 0; text-align: end'>$value->role</p>";
      echo "</div>";
    }
    ?>-->

    <div class='navbar-text'>
      <!--<i class='fa-regular fa-bell' style='font-size: 17px; color: black;'></i>-->
      <p style='margin: 0; font-weight: 800;'>TA Admin</p>
      <p style='font-size: 12px; margin: 0; text-align: end'>Admin/User</p>
    </div>

    <img src="<?php echo base_url() . '/assets/profile.png' ?>" alt="logo" style="width: 12%; height: 12%; margin-left: 12px; border-radius: 24px;">
  </span>
</nav>