<?php include "../koneksi.php"; 
//jika benar mendapatkan GET id dari URL
if ( isset($_GET['id_pegawai'])) {
	//membuat variabel
	$id_pegawai = $_GET['id_pegawai'];
	
	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai'");
	
	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM pegawai WHERE id_pegawai='$id_pegawai'");
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php";</script>';
		}
	}else{
		echo '<script>alert("ID Pegawai tidak ditemukan di database."); document.location="index.php";</script>';
	}
}else {
	echo '<script>alert("Koneksi database gagal."); document.location="index.php";</script>';
}
 
?>