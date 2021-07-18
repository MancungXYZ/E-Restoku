<?php
include "../koneksi.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tambah Menu</title>
  </head>
  <body>
  <div class="container" style="margin-top:20px">
		<h2>Tambah Menu</h2>
		
		<hr>
		
		<form action="" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Menu</label>
				<div class="col-sm-10 mt-3">
					<input type="text" name="nama_menu" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Harga</label>
				<div class="col-sm-10 mt-3">
					<input type="text" name="harga" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Deskripsi</label>
				<div class="col-sm-10 mt-3">
					<input type="text" name="deskripsi" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Link Foto</label>
				<div class="col-sm-10 mt-3">
                <textarea class="form-control" name="foto_menu" placeholder="Masukan disini" id="floatingTextarea2" style="height: 100px"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10 mt-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<input type="button" onClick="javascript:history.back()" class="btn btn-primary" value="Kembali">
				</div>
			</div>
		</form>
		
	</div>

    <?php
        if (isset($_POST["submit"])) {
                if ($koneksi->connect_errno == 0) {
                // Bersihkan data
                    $Nama_Menu = $koneksi->escape_string($_POST["nama_menu"]);
                    $Harga = $koneksi->escape_string($_POST["harga"]);
                    $Deskripsi = $koneksi->escape_string($_POST["deskripsi"]);
                    $Link = $koneksi->escape_string($_POST["foto_menu"]);
                    //Menyusun SQL
                    $sql = "INSERT INTO menu(nama_menu, harga, deskripsi, foto_menu) VALUES('$Nama_Menu','$Harga','$Deskripsi', '$Link')";
                    $res = $koneksi->query($sql);
                    if ($res) {
                      if ($koneksi->affected_rows > 0) { // jika ada penambahan data
                        echo "<script>alert('Data Berhasil disimpan')</script>";
                        echo "<script>location='../admin/pembelian.php';</script>";
                      }
                      } else {
                      echo "<script>alert('Data gagal tersimpan')</script>";
                      echo "<script>location='../admin/pembelian.php';</script>";
                      }
                      } else
                      echo "<script>alert('Koneksi Database gagal')</script>";
                      echo "<script>location='../admin/index.php';</script>";
                      } 
  ?>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>