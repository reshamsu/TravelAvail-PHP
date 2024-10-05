<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,300,0,0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eBqE/51Dm8M2Q9eDkLJRPqj7J5Z2w+5zjHdF7flzQnjsxsFpQEa0J04FfDl/6jWX" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?php echo base_url() . '/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . '/css/style.css' ?>">
    <title>Travel'Avail | Flight, Hotel, Car Rental Booking</title>
</head>

<body>

<style>
    header {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
  overflow: hidden;
  box-sizing: border-box;
  padding: 12px 6%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: none;
  box-shadow: none;
}

    .tab:hover {
        background-color: rgba(255, 255, 255, 0.2);
        text-decoration: none;
    }

    nav a.btn.btn-dark {
        display: flex;
        background: none;
        align-items: center;
    }
</style>

<body>
    <header>
        <div class="" style="display: flex; justify-content: space-between; width: 66%;">
            <a href="<?php echo base_url() . '/' ?>" style="display: flex; align-items: center; width: 30%;"><img src="<?php echo base_url() . '/assets/ta-logo-4.png' ?>" alt="logo" class="logo" style="width: 80%;"></a>

            <nav>
                <a href="<?php echo base_url() . '/' ?>" class="btn btn-dark" style="margin-right: 6px; border: none; border-bottom: 2px solid var(--blue); border-radius: 2.6px;"><i class="fa-solid fa-compass" style="color: var(--blue);"></i> Home</a>
                <a href="<?php echo base_url() . '/flightController' ?>" class="btn btn-dark" style="margin-right: 6px; background: none; border: none">Flights</a>
                <a href="<?php echo base_url() . '/hotelController' ?>" class="btn btn-dark" style="margin-right: 6px; background: none; border: none;">Hotels</a>
                <a href="<?php echo base_url() . '/carrentalController' ?>" class="btn btn-dark" style="margin-right: 6px; background: none; border: none;">Car Rentals</a>
            </nav>
        </div>

        <span class="navbar-text" style="display: flex; align-items: center; justify-content: end; padding: 0;">
            <a href="<?php echo base_url() . '/currency' ?>" class="btn btn-dark" id="" style="margin-right: 6px; background: none; border: none">USD</a>
            <a href="<?php echo base_url() . '/login/userlogin' ?>" class="btn btn-primary" id="loginButton">Sign in</a>
        </span>
    </header>

    <div class="container">
        <div class="row">
            <div class="col">
                <div id="loginModal" class="modal">
                    <div class="modal-content">
                        <span class="close" id="closeButton"><i class="fa-solid fa-xmark"></i></span>
                        <a href="<?php echo base_url() . '/' ?>"><img src="<?php echo base_url() . '/assets/ta-logo.png' ?>" alt="logo" class="logo"></a>

                        <h3 class="heading">Welcome back!</h3>

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

                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                        <?php echo form_open('login/loginSubmit') ?>

                        <form id="loginForm" method="post">
                            <div class="form-floating mb-3">
                                <label for="floatingInput" style="font-weight: 500;">Email address</label>
                                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="Email" style="padding: 20px 4%; border: 2px solid #eee; border-radius: 6px;">
                            </div>
                            <div class="form-floating">
                                <label for="floatingPassword" style="font-weight: 500;">Password</label>
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" style="padding: 20px 4%; border: 2px solid #eee; border-radius: 6px;">
                            </div>
                            <div class="form-group" style="display: flex; align-items: center; flex-direction: column; margin: 16px;">
                                <input class="btn btn-primary" type="submit" name="submit" value="Continue" style="width: 100%; border-radius: 12px;">
                                <p style="text-align: center; border-top: 2px solid #eee; font-weight: 500; padding-top: 14px; margin-top: 14px; margin-bottom: 0;"><a href="<?php echo base_url() . 'login/registerSubmit' ?>" style="font-weight: 500; color: var(--blue);">Sign Up</a> to Explore the Best of Travel'Avail</p>
                            </div>
                            <?php echo form_close(); ?>
                        </form>
                        <p style="font-size: 12px; text-align: center; color: var(--black); margin: 0 4%;">By proceeding, you agree to our <a href="" style="color: var(--black); text-decoration: underline;">Terms of Use</a> and confirm you have read our <a href="" style="color: var(--black); text-decoration: underline;">Privacy and Cookie Statement</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="hi">
        <div class="content">
            <h1 class="heading" style="color: #fff; font-size: 50px; text-align: center; margin: 0;">Make your journey worth an experience. Adventure awaits</h1>
            <p style="color: #fff; width: 70%; text-align: center; margin-bottom: 20px;">Travel the world with us.. Adventure awaits - "Embrace the rhythm of Travel'Avail as you dance across the globe, for in each step, you
                discover the symphony of cultures and the melody of endless possibilities."</p>
                <div class="form">
                <div style="margin-left: 14px; width: 100%;">
                    <i class="fa-solid fa-magnifying-glass" style="color: #666;"></i>
                    <input type="text" placeholder="Search for flights, hotels, and more">
                </div>
                <a class="btn btn-primary" href="" style="border-radius: 30px;">Search</a>
            </div>
        </div>
        <div class="video-container">
            <video id="video-player" autoplay muted loop>
                <source src="assets/video1.mp4" type="video/mp4" />
                <source src="assets/video2.mp4" type="video/mp4" />
                <source src="assets/video3.mp4" type="video/mp4" />
                <source src="assets/video4.mp4" type="video/mp4" />
                <source src="assets/video5.mp4" type="video/mp4" />
                <source src="assets/video6.mp4" type="video/mp4" />
                <source src="assets/video7.mp4" type="video/mp4" />
                <source src="assets/video8.mp4" type="video/mp4" />
                <source src="assets/video9.mp4" type="video/mp4" />
                <source src="assets/video10.mp4" type="video/mp4" />
                <source src="assets/video11.mp4" type="video/mp4" />
            </video>
        </div>
    </section>

    <section class="lm" id="">
        <h2 class="heading">Popular <span>Destinations</span></h2>

        <div class="container">
            <div class="box">
                <img src="assets/france.png" alt="" />
                <div class="content">
                    <div class="info">
                        <p><i class="bi bi-geo-alt-fill"></i>paris, france</p>
                        <a href="<?php echo base_url() . '/login/trip' ?>" class=""><i class="fa-regular fa-heart"></i></a>
                    </div>
                    <div class="button">
                        <a href="<?php echo base_url('/learnmore?book=France'); ?>" class="btn btn-light">Learn more</a>
                    </div>
                </div>
            </div>

            <div class="box">
                <img src="assets/uk.jpg" alt="" />
                <div class="content">
                    <div class="info">
                        <p><i class="bi bi-geo-alt-fill"></i>London, United Kingdom</p>
                        <a href="<?php echo base_url() . '/login/trip' ?>" class=""><i class="fa-regular fa-heart"></i></a>
                    </div>
                    <div class="button">
                        <a href="<?php echo base_url('/learnmore?book=United Kingdom'); ?>" class="btn btn-light">Learn more</a>
                    </div>
                </div>
            </div>

            <div class="box">
                <img src="assets/greece.jpg" alt="" />
                <div class="content">
                    <div class="info">
                        <p><i class="bi bi-geo-alt-fill"></i>greece, santorini</p>
                        <a href="<?php echo base_url() . '/login/trip' ?>" class=""><i class="fa-regular fa-heart"></i></a>
                    </div>
                    <div class="button">
                        <a href="<?php echo base_url('/learnmore?book=Greece'); ?>" class="btn btn-light">Learn more</a>
                    </div>
                </div>
            </div>

            <div class="box">
                <img src="assets/italy.jpg" alt="" />
                <div class="content">
                    <div class="info">
                        <p><i class="bi bi-geo-alt-fill"></i>italy, rome</p>
                        <a href="<?php echo base_url() . '/login/trip' ?>" class=""><i class="fa-regular fa-heart"></i></a>
                    </div>
                    <div class="button">
                        <a href="<?php echo base_url('/learnmore?book=Italy'); ?>" class="btn btn-light">Learn more</a>
                    </div>
                </div>
            </div>

            <div class="box">
                <img src="assets/canada.jpg" alt="" />
                <div class="content">
                    <div class="info">
                        <p><i class="bi bi-geo-alt-fill"></i>Toronto, Canada</p>
                        <a href="<?php echo base_url() . '/login/trip' ?>" class=""><i class="fa-regular fa-heart"></i></a>
                    </div>
                    <div class="button">
                        <a href="<?php echo base_url('/learnmore?book=Canada'); ?>" class="btn btn-light">Learn more</a>
                    </div>
                </div>
            </div>

            <div class="box">
                <img src="assets/australia.jpg" alt="" />
                <div class="content">
                    <div class="info">
                        <p><i class="bi bi-geo-alt-fill"></i>sydney, australia</p>
                        <a href="<?php echo base_url() . '/login/trip' ?>" class=""><i class="fa-regular fa-heart"></i></a>
                    </div>
                    <div class="button">
                        <a href="<?php echo base_url('/learnmore?book=Australia'); ?>" class="btn btn-light">Learn more</a>
                    </div>
                </div>
            </div>

            <div class="box">
                <img src="assets/spain.jpg" alt="" />
                <div class="content">
                    <div class="info">
                        <p><i class="bi bi-geo-alt-fill"></i>madrid, spain</p>
                        <a href="<?php echo base_url() . '/login/trip' ?>" class=""><i class="fa-regular fa-heart"></i></a>
                    </div>
                    <div class="button">
                        <a href="<?php echo base_url('/learnmore?book=Spain'); ?>" class="btn btn-light">Learn more</a>
                    </div>
                </div>
            </div>

            <div class="box">
                <img src="assets/new-zealand.jpg" alt="" />
                <div class="content">
                    <div class="info">
                        <p><i class="bi bi-geo-alt-fill"></i>Queenstown, New Zealand</p>
                        <a href="<?php echo base_url() . '/login/trip' ?>" class=""><i class="fa-regular fa-heart"></i></a>
                    </div>
                    <div class="button">
                        <a href="<?php echo base_url('/learnmore?book=New Zealand'); ?>" class="btn btn-light">Learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="au" id="">
        <img src="assets/about.jpg" alt="" />

        <div class="content">
            <h2 class="heading">About <span>Us</span></h2>

            <p>Travel'Avail unveils a captivating world of endless possibilties, where dreams, taking flights,
                to hotels and rental experiences to come about. Unlocking a world of adventure and discovery
                with just a few clicks. You hold the key to a seamless and exhilarating travel experience.
            </p>
            <p>
                Uncover off-the-beaten-path destinations and unearth untold stories, creating memories that will
                stay etched in your heart forever.
            </p>
            <p>Let Travel'Avail be your trusted companion on the adventure of a lifetime. Join us today and unlock
                a world of possibilities. Your extraordinary journey awaits!
            </p>
        </div>
    </section>

    <section class="lm" id="">
        <h2 class="heading">Explore <span>Asia</span></h2>

        <div class="container">
            <div class="box">
                <img src="assets/sri-lanka.jpg" alt="" />
                <div class="content">
                    <div class="info">
                        <p><i class="bi bi-geo-alt-fill"></i>sigiriya, sri lanka</p>
                        <a href="<?php echo base_url() . '/login/trip' ?>" class=""><i class="fa-regular fa-heart"></i></a>
                    </div>
                    <div class="button">
                        <a href="<?php echo base_url('/learnmore?book=Sri Lanka'); ?>" class="btn btn-light">Learn more</a>
                    </div>
                </div>
            </div>
            <div class="box">
                <img src="assets/qatar.jpg" alt="" />
                <div class="content">
                    <div class="info">
                        <p><i class="bi bi-geo-alt-fill"></i>doha, qatar</p>
                        <a href="<?php echo base_url() . '/login/trip' ?>" class=""><i class="fa-regular fa-heart"></i></a>
                    </div>
                    <div class="button">
                        <a href="<?php echo base_url('/learnmore?book=Qatar'); ?>" class="btn btn-light">Learn more</a>
                    </div>
                </div>
            </div>
            <div class="box">
                <img src="assets/thailand.png" alt="" />
                <div class="content">
                    <div class="info">
                        <p><i class="bi bi-geo-alt-fill"></i>bangkok, thailand</p>
                        <a href="<?php echo base_url() . '/login/trip' ?>" class=""><i class="fa-regular fa-heart"></i></a>
                    </div>
                    <div class="button">
                        <a href="<?php echo base_url('/learnmore?book=Thailand'); ?>" class="btn btn-light">Learn more</a>
                    </div>
                </div>
            </div>
            <div class="box">
                <img src="assets/uae.jpg" alt="" />
                <div class="content">
                    <div class="info">
                        <p><i class="bi bi-geo-alt-fill"></i>dubai, united arab emirates</p>
                        <a href="<?php echo base_url() . '/login/trip' ?>" class=""><i class="fa-regular fa-heart"></i></a>
                    </div>
                    <div class="button">
                        <a href="<?php echo base_url('/learnmore?book=United Arab Emirates'); ?>" class="btn btn-light">Learn more</a>
                    </div>
                </div>
            </div>
            <div class="box">
                <img src="assets/maldives.jpg" alt="" />
                <div class="content">
                    <div class="info">
                        <p><i class="bi bi-geo-alt-fill"></i>male, maldives</p>
                        <a href="<?php echo base_url() . '/login/trip' ?>" class=""><i class="fa-regular fa-heart"></i></a>
                    </div>
                    <div class="button">
                        <a href="<?php echo base_url('/learnmore?book=Maldives'); ?>" class="btn btn-light">Learn more</a>
                    </div>
                </div>
            </div>
            <div class="box">
                <img src="assets/japan.jpg" alt="" />
                <div class="content">
                    <div class="info">
                        <p><i class="bi bi-geo-alt-fill"></i>tokyo, japan</p>
                        <a href="<?php echo base_url() . '/login/trip' ?>" class=""><i class="fa-regular fa-heart"></i></a>
                    </div>
                    <div class="button">
                        <a href="<?php echo base_url('/learnmore?book=Japan'); ?>" class="btn btn-light">Learn more</a>
                    </div>
                </div>
            </div>
            <div class="box">
                <img src="assets/south-korea.jpeg" alt="" />
                <div class="content">
                    <div class="info">
                        <p><i class="bi bi-geo-alt-fill"></i>Seoul, South Korea</p>
                        <a href="<?php echo base_url() . '/login/trip' ?>" class=""><i class="fa-regular fa-heart"></i></a>
                    </div>
                    <div class="button">
                        <a href="<?php echo base_url('/learnmore?book=South Korea'); ?>" class="btn btn-light">Learn more</a>
                    </div>
                </div>
            </div>
            <div class="box">
                <img src="assets/china.png" alt="" />
                <div class="content">
                    <div class="info">
                        <p><i class="bi bi-geo-alt-fill"></i>beijing, china</p>
                        <a href="<?php echo base_url() . '/login/trip' ?>" class=""><i class="fa-regular fa-heart"></i></a>
                    </div>
                    <div class="button">
                        <a href="<?php echo base_url('/learnmore?book=China'); ?>" class="btn btn-light">Learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="s5" id="">

        <h2 class="heading">Our <span>Services</span></h2>

        <div class="box-container">
            <div class="box">
                <i class="fa-solid fa-plane"></i>
                <h3>Flights</h3>
                <p>"Embark on a journey that defies gravity and unlocks the boundless possibilities of exploration
                    with Travel'Avail's extraordinary flights."</p>
            </div>
            <div class="box">
                <i class="fa-solid fa-car-side"></i>
                <h3>Rentals</h3>
                <p>"Travel with ease and peace of mind and and embark on the journey of a lifetime!, knowing that
                    Travel'avail has the perfect rental waiting for you."</p>
            </div>
            <div class="box">
                <i class="fa-solid fa-bed"></i>
                <h3>Hotels</h3>
                <p>"Discover our exceptional hotels, where every stay is a journey worth cherishing. Reservation in service. Welcome to a
                    sanctuary of hospitality".</p>
            </div>
            <div class="box">
                <i class="fa-solid fa-map"></i>
                <h3>Around the world</h3>
                <p>"Embrace the rhythm of Travel'Avail as you dance across the globe, for in each step, you
                    discover the symphony of cultures and the melody of endless possibilities."</p>
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
<?php ?>