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

    <title>Tambah Pegawai</title>
  </head>
  <body>
  <div class="container" style="margin-top:20px">
		<h2>Tambah Pegawai</h2>
		
		<hr>
		
		<form action="" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pegawai</label>
				<div class="col-sm-10 mt-3">
					<input type="text" name="nama_pegawai" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10 mt-3">
					<input type="text" name="password" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-10 mt-3">
          <select name="jenis_kelamin" id="" class="form-control" required>
            <option value="null">- Pilih Jenis Kelamin -</option>
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
          </select>
				</div>
			</div>
      <div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10 mt-3">
					<input type="text" name="alamat" class="form-control" required>
				</div>
			</div>
      <div class="form-group row">
				<label class="col-sm-2 col-form-label">No HP</label>
				<div class="col-sm-10 mt-3">
					<input type="text" name="no_hp" class="form-control" required>
				</div>
			</div>
      <div class="form-group row">
				<label class="col-sm-2 col-form-label">Posisi</label>
				<div class="col-sm-10 mt-3">
					<input type="text" name="posisi" class="form-control" required>
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
                    $Nama_Pegawai = $koneksi->escape_string($_POST["nama_pegawai"]);
                    $Password = $koneksi->escape_string($_POST["password"]);
                    $Jenis_Kelamin = $koneksi->escape_string($_POST["jenis_kelamin"]);
                    $Alamat = $koneksi->escape_string($_POST["alamat"]);
                    $No_Hp = $koneksi->escape_string($_POST["no_hp"]);
                    $Posisi = $koneksi->escape_string($_POST["posisi"]);
                    // Menyusun SQL
                    $sql = "INSERT INTO pegawai(nama_pegawai, password, jenis_kelamin, alamat, no_hp, posisi) VALUES('$Nama_Pegawai','$Password','$Jenis_Kelamin', '$Alamat','$No_Hp','$Posisi')";
                    $res = $koneksi->query($sql);
                    if ($res) {
                      if ($koneksi->affected_rows > 0) { // jika ada penambahan data
                        echo "<script>alert('Data Berhasil disimpan!')</script>";
                        echo "<script>location='../admin/pembelian.php';</script>";
                      }
                      } else {
                      echo "<script>alert('Data gagal tersimpan!')</script>";
                      echo "<script>location='../admin/pembelian.php';</script>";
                      }
                      } else
                      echo "<script>alert('Koneksi Database gagal!')</script>";
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