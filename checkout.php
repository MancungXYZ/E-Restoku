<?php
session_start();

require 'koneksi.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <title>Checkout</title>
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

    <style>
      @media print {
        /* Hide every other element */
        body * {
          visibility: hidden;

        }

        /* Then Display print container */
        .print-container, .print-container * {
          visibility: visible;
        }
      }
    </style>


    <section class="print-container">
        <div class="container shadow p-5 mt-2 bg-body rounded">
           <form action="" method="post">
            <br>
            <h3 class="text-center mt-3">Checkout Menu</h3>
            <hr>

            <?php
              $Pesanan = $_GET['id_pesanan']; //set untuk mengambil data
              $sql = mysqli_query($koneksi, "Select * From pelanggan Where id_pesanan='$Pesanan'"); //mengambil data pelanggan
              $data = $sql->fetch_assoc();
              $pegawai = mysqli_query($koneksi, "Select * From pegawai Where posisi='kasir'"); //mengambil data pegawai
              $kasir = mysqli_fetch_assoc($pegawai);
              $transaksi = rand(1000, 9999);


            ?>

            <div class="row">
                <div class="col">
                  <p>Nama Pelanggan : <?php echo $data['nama_pelanggan']; ?></p>
                  <p>No Pesanan : <?php echo $data['id_pesanan']; ?></p>
                  <p>No Transaksi : <?php echo $transaksi ?></p>
                </div>
                <div class="col">
                  <p class="text-end">Tanggal Transaksi : <?php echo $tgl = date("Y-m-d"); ?></p>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php $totalHarga = 0; ?>
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
                    </tr>
                    <?php $totalHarga += $subharga; ?>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                        <tr>
                            <th colspan=4>Total Harga</th>
                            <th>Rp. <?php echo number_format($totalHarga); ?></th>
                        </tr>
                </tfoot>
            </table>
            <div class="row">
              <div class="col">
                <p>Terima Kasih telah berkunjung</p>
              </div>
              <div class="col text-end">
                <p>Hormat Kami</p>
                <br>
                <p><?php echo $kasir['nama_pegawai'] ?></p>
              </div>
            </div>

            <input type="submit" name="cetak" class="btn btn-success mt-3" value="Cetak">
            </form>
          </div>
        
        <?php
          if ( isset($_POST["cetak"])) {
            if ($koneksi->connect_errno == 0) {
              //query id_pegawai
              $Pegawai = mysqli_query($koneksi, "Select * From pegawai");
              $ttd = mysqli_fetch_assoc($Pegawai);
              $pgw = $ttd['id_pegawai'];
              //mengambil data id_pesanan
              $data = $data['id_pesanan'];
              //mengambil data nama menu
              $menu = $pecah['nama_menu'];
              //menghitung data
              // $count = count(array($no));

                $sql = array(
                  'id_transaksi' => $transaksi,
                  'id_pegawai' => $pgw,
                  'id_menu' => $id_menu,
                  'id_pesanan' => $data,
                  'nama_menu' => $menu,
                  'jumlah_menu' => $jumlah,
                  'total_bayar' => $totalHarga,
                  'tgl_transaksi' => $tgl

                );
                
                $sql = "Insert into transaksi (id_transaksi, id_pegawai, id_menu, id_pesanan, nama_menu, jumlah_menu, total_bayar, tgl_transaksi) VALUES('$transaksi', '$pgw', '$id_menu', '$data', '$menu', '$jumlah', '$totalHarga', '$tgl')";
                
                $res = mysqli_query($koneksi, $sql);
              
              if ($res) {
                if ($koneksi->affected_rows > 0) { // jika ada penambahan data
                  echo "<script>alert('Cetak dalam proses')</script>";
                  echo "<script>window.print()</script>";
                  session_destroy();
                }
                } else {
                echo "<script>alert('Cetak gagal')</script>";
                }
                } else
                echo "<script>alert('Koneksi Database gagal')</script>";
                }

                
        ?>
        
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>