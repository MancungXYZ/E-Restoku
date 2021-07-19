<?php
require 'koneksi.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/style.css" type="text/css">

    <!-- Sweetalert -->
    <script src="sweat/dist/sweetalert2.all.min.js"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/IconWeb.ico" type="image/x-icon">
    <title>E-Restoku</title>
  </head>
  <body>

    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">E-Restoku</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
              <a class="nav-link" aria-current="page" href="#">Home</a>
              <a class="nav-link" href="#about">About Us</a>
              <a class="nav-link" href="#menu">Menu</a>
              <a class="nav-link" href="#location">Location</a>
              <a class="btn btn-primary" href="login.php" role="button">Login</a>
            </div>
          </div>
        </div>
      </nav>
    <!-- End NavBar -->

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Welcome to E-Restoku<br>Where Taste Combine <br> With Moments.</h1>
        </div>
    </div>
    <!-- End Jumbotron -->

    <!-- About Us -->
<section id="about">
  <div class="container">
    <div class="row text-center">
      <div class="col">
        <h1>About Us</h1>
      </div>
      <div class="row justify-content-center fs-5 text-center mt-5">
        <div class="col-md-6 my-auto mx-auto">
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolore ipsam quibusdam, quos sit excepturi maiores nihil asperiores nemo natus qui reiciendis dolorum minima quaerat reprehenderit, commodi nisi consequatur voluptatibus amet? Amet, reprehenderit. Nostrum voluptatibus quia quae illo fugiat quasi ad veniam officia aut, ipsa corrupti optio ea saepe dignissimos ratione.</p>
        </div>
      <div class="col-md-6 my-auto mx-auto">
        <img src="Chef-cartoon-logo-vector-PNG.png" alt="Logo" width="250">
        </div>
      </div>
    </div>
  </div>
</section>


    <!-- End About Us -->

    <!-- Menu -->
    <section id="menu">
      <div class="container">
        <div class="row text-center">
            <div class="col">
              <h1>Menu</h1>
            </div>
        </div>
        <div class="row text-center">
          <div class="col mb-3">
            <a href="#makanan" class="link-dark">Makanan</a>
            <a href="#minuman" class="link-dark">Minuman</a>
            <a href="#" class="link-dark">Cemilan</a>
          </div>

        <div class="row ">
        <?php $ambil = $koneksi->query("Select * From menu"); ?>
        <?php while($permenu = $ambil->fetch_assoc()) { ?>

          <div class="col-md-4 mb-3 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
              <img src="<?php echo $permenu['foto_menu']; ?>" class="card-img-top" alt="Ayam Goreng">
              <div class="card-body">
                <h5 class="card-title"><?php echo $permenu['nama_menu']; ?></h5>
                <p class="card-text">Rp. <?php echo number_format($permenu['harga']); ?></p>
                <a href="beli.php?id=<?php echo $permenu['id_menu']; ?>" type="button" class="btn btn-primary">Beli</a>
              </div>
            </div>
          </div>
          <?php } ?>
      
      </div>
    </section>

    <!-- End Menu -->

    <!-- Location -->
    <section id="location"> 
      <div class="container mb-3">
        <div class="row">
          <div class="col text-center">
            <h1>Location</h1>
          </div>
          <div class="row">
            <div class="col text-center">
              <p>Jalan Sekeloa Utara No.6a, Lebakgede, Kota Bandung, Jawa Barat</p>
            </div>
          </div>
          <div class="row">
            <div class="col d-flex justify-content-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1980.509815333739!2d107.61821765786505!3d-6.888251735904831!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e65511dca1c1%3A0x2a97b2681d782f2b!2sJl.%20Sekeloa%20Utara%20No.6%2C%20Sekeloa%2C%20Kecamatan%20Coblong%2C%20Kota%20Bandung%2C%20Jawa%20Barat%2040134!5e0!3m2!1sid!2sid!4v1621505864246!5m2!1sid!2sid" width="1080" height="720" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- End Location -->

    <!-- Footer -->
      <?php
        require 'footer.php';
      ?>
    <!-- End Footer -->
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    
  </body>
</html>