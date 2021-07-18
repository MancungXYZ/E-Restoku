<?php
include "../koneksi.php";
?>
<html>
    <head>
<!-- Datatables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css">


<!-- Datatables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
    </head>

<body>
<h2>Menu Pembelian</h2>

<table class="table table-striped table-hover table-bordered" id="mytable">
			<thead class="thead-dark text-center">
				<tr>
                    <th>Id Menu</th>
					<th>Nama Menu</th>
					<th>Harga</th>
					<th>Deskripsi</th>
					<th>Foto Menu</th>
					<th>Tindakan</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = mysqli_query($koneksi, "Select * From menu ORDER BY id_menu") or die (mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0) {
					//membuat variabel $no untuk menyimpan nomor urut
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)) {
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$data['id_menu'].'</td>
							<td>'.$data['nama_menu'].'</td>
							<td> Rp. '.$data['harga'].'</td>
							<td>'.$data['deskripsi'].'</td>
							<td>'.$data['foto_menu'].'</td>
							<td>
								<a href="menu-edit.php?Id_Menu='.$data['id_menu'].'" class="badge badge-warning">Edit</a>
								<a href="menu-delete.php?Id_Menu='.$data['id_menu'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						
					}
				//jika query menghasilkan nilai 0
				} else {
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
            
		</table>

        <a class="btn btn-primary mb-2" href="menu-tambah.php" role="button">Tambah Menu</a>

</body>
</html>