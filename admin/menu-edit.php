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

    <title>Edit Menu</title>
  </head>
  <body>
	<div class="container" style="margin-top:20px">
		<h2>Edit Data Menu</h2>
		
		<hr>
		
			<?php
			if ( isset($_GET["id_menu"])) {
			$id_menu = $_GET["id_menu"];
				if ($dataMenu = mysqli_query($koneksi, "Select * From menu WHERE id_menu='$id_menu'")) {
				// cari data produk, kalau ada simpan di $databuku
			?>

			<form action="" method="">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Menu</label>
				<div class="col-sm-10">
					<input type="text" value="<?php echo $dataMenu["nama_menu"];?>" name="nama_menu" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Harga</label>
				<div class="col-sm-10">
					<input type="text" value="<?php echo $dataMenu["harga"];?>" name="harga" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Deskripsi</label>
				<div class="col-sm-10">
					<input type="text" value="<?php echo $dataMenu["deskripsi"];?>" name="deskripsi" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Menu</label>
				<div class="col-sm-10">
					<input type="text" value="<?php echo $dataMenu["foto_menu"];?>" name="foto_menu" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="update" class="btn btn-primary" value="Update">
				</div>
			</div>
		</form>
			<?php
			} else
				echo "Menu dengan Kode : $id_menu tidak ada. Edit data dibatalkan";
			?>

		<?php
		} else
			echo "Id Menu tidak valid, Edit dibatalkan";
		?>
	</div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>