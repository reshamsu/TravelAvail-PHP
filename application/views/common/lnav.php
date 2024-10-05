<style>
    a.info:hover {
        background: #eee;
    }
</style>

<header>
    <a href="<?php echo base_url() . '/' ?>" style="display: flex; align-items: center; width: 30%;"><img src="<?php echo base_url() . '/assets/ta-logo-2.png' ?>" alt="logo" class="logo" style="width: 42%;"></a>

    <span class="navbar-text" style="display: flex; align-items: center; justify-content: end; padding: 0;">
        <a href="<?php echo base_url() . '/notifications' ?>" class="info" id="" style="padding: 8px 1%; border-radius: 20px; text-align: center; margin-right: 20px;"><i class="fa-solid fa-bell" style="color: var(--black); font-size: 18px; margin: 0; border-radius: 20px;"></i></a>

        <!--<i class='fa-regular fa-bell' style='font-size: 17px; color: black;'></i>-->

        <!-- <?php
        $userId = 0;
        foreach ($dashboard as $key => $value) {
            // print_r($value->id);
            $userId = $value->id;
            echo "<div class=''>";
            echo "<p style='margin: 0; font-weight: 600;'>$value->first_name $value->last_name</p>";
            echo "<p style='font-size: 12px; margin: 0; text-align: end'>$value->role</p>";
            echo "</div>";
        }
        ?> -->

        <!-- <div class=''>
            <p style='margin: 0; font-weight: 800;'>TA Admin</p>
            <p style='font-size: 12px; margin: 0; text-align: end'>Admin</p>
        </div> -->

        <div class=''>
            <p style='margin: 0; font-weight: 600;'>John Doe</p>
            <p style='font-size: 12px; margin: 0; text-align: end'>User</p>
        </div>

        <img src="<?php echo base_url() . '/assets/profile.png' ?>" alt="logo" style="width: 11%; margin-left: 10px; border-radius: 24px;">
    </span>
</header>