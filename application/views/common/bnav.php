<style>
  .tab:hover {
    background-color: rgba(255, 255, 255, 0.2);
    text-decoration: none;
  }
</style>

<header>
  <div class="" style="display: flex;">
    <a href="<?php echo base_url() . '/' ?>" style="display: flex; align-items: center; font-size: 22px; font-weight: 800; color: #333; text-decoration: none"><img src="<?php echo base_url() . '/assets/ta-logo.png' ?>" alt="logo" class="logo" style="width: 14%;">Travel'<span>Avail</span></a>


    <!--<div class="form" style="border: 1px solid #ddd; padding: 6px 8px; border-radius: 24px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.1);">
    <input type="submit" value="Booking" style="padding: 2px 20px; background: none; color: var(--black); font-weight: 500; border-right: 2px solid #eee;">
    <input type="submit" value="Destination" style="padding: 2px 20px; background: none; color: var(--black); font-weight: 500; border-right: 2px solid #eee;">
    <a class="btn btn-primary" href="" style="padding: 6px 10px; margin-left: 10px;"><i class="fa-solid fa-magnifying-glass" style="margin: 0;"></i></a>
  </div>-->
  </div>

  <span class="navbar-text" style="display: flex; align-items: center; justify-content: end; padding: 0;">
    <a href="<?php echo base_url() . '/currency' ?>" class="tab" id="" style="margin-right: 12px; font-size: 16px; color: #222; font-weight: 600; padding: 8px 16px; border-radius: 10px;">USD</a>
    <a href="<?php echo base_url() . '/login/userlogin' . $userId ?>" class="btn btn-primary" id="loginButton" style="border-radius: 10px;">Sign in</a>
  </span>
</header>