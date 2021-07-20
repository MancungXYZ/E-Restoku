<?php
session_start();

require 'koneksi.php';


if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang anda masih kosong');</script>";
    echo "<script>location='index.php';</script>";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <title>Keranjang Belanja E-Restoku</title>
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
              <a class="nav-link active" aria-current="page" href="#">Home</a>
              <a class="nav-link" href="#about">About Us</a>
              <a class="nav-link" href="#menu">Menu</a>
              <a class="nav-link" href="#location">Location</a>
              <a class="btn btn-primary" href="login.php" role="button">Login</a>
            </div>
          </div>
        </div>
      </nav>
    <!-- End NavBar -->

    <section>
        <div class="container">
        <br>
            <h2 class="text-center mt-5">Keranjang Menu</h2>
            <hr>
            <form action="" method="post">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">No Pesanan</label>
                <div class="col-sm-3">
                  <input type="number" value="" name="id_pesanan" class="form-control" size="4" required>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label mt-3">Nama Pelanggan</label>
                <div class="col-sm-3 mt-3">
                  <input type="text" value="" name="nama_pelanggan" class="form-control" size="4" required>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label mt-3">No Meja</label>
                <div class="col-sm-3 mt-3">
                  <input type="number" value="" name="no_meja" min="1" max="15" class="form-control" size="4" required>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label mt-3">Jumlah Pelanggan</label>
                <div class="col-sm-3 mt-3">
                  <input type="number" value="" name="jumlah_pelanggan" min="1" max="10" class="form-control" size="4" required>
                </div>
              </div>
              <a href="checkout.php">
              <input type="submit" name="check" class="btn btn-success fas-fa-print mt-3" value="Checkout">
              </a>
            </div>
        
        <?php
          if (isset($_POST["check"])) {
            if ($koneksi->connect_errno == 0) {
            // Bersihkan data
                $Pesanan = $_POST["id_pesanan"];
                $Pelanggan = $_POST["nama_pelanggan"];
                $Meja = $_POST["no_meja"];
                $Jumlah = $_POST["jumlah_pelanggan"];
                //Menyusun SQL
                $sql = "INSERT INTO pelanggan(id_pesanan, nama_pelanggan, no_meja, jumlah_pelanggan) VALUES('$Pesanan','$Pelanggan','$Meja', '$Jumlah')" or die (mysqli_error($sql));
                $res = $koneksi->query($sql);
                if ($res) {
                  if ($koneksi->affected_rows > 0) { // jika ada penambahan data
                    header("Location: checkout.php?id_pesanan=$Pesanan");
                  }
                  } else {
                  echo "<script>alert('Transaksi gagal')</script>";
                  }
                  } else
                  echo "<script>alert('Koneksi Database gagal')</script>";
                  } 
        ?>
        <br>

        <div class="container shadow">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php foreach ($_SESSION["keranjang"] as $id_menu => $jumlah): ?>
                    <?php
                        $ambil = $koneksi->query("Select * From menu Where id_menu=$id_menu");
                        $pecah = $ambil->fetch_assoc();
                        $subharga = $pecah['harga']*$jumlah;
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $pecah['nama_menu'] ?></td>
                        <td>Rp. <?php echo number_format($pecah['harga']) ?></td>
                        <td><?php echo $jumlah ?></td>
                        <td>Rp. <?php echo number_format($subharga) ?></td>
                        <td>
                            <a href="hapuskeranjang.php?id=<?php echo $id_menu ?>" class="btn btn-danger btn-xn">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <a href="index.php#menu" class="btn btn-primary">Lanjut Belanja</a>
        </div>
    </section>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!-- Datatables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script>
      $(document).ready( function () {
       $('#myTable').DataTable({
         "paging": false,
         "ordering": false,
         "info": false
       });
      });
    </script>
  </body>
</html>