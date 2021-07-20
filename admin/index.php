<?php
    include "../koneksi.php";
    include "validasi.php";
    
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>.:: Dashboard ::.</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">E-Restoku</a> 
            </div>
  <div style="color: white;
              padding: 15px 50px 5px 50px;
              float: right;
              font-size: 16px;"> Last access : <?php echo date("d M Y"); ?> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Log Out</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
					
                    <li>
                        <a class="active-menu"  href="index.php"><i class="fa fa-dashboard"></i> Pegawai</a>
                    </li>
                     <li>
                        <a  href="pembelian.php"><i class="fa fa-shopping-cart"></i> Pembelian</a>
                    </li>
                      <li  >
                        <a  href="laporan.php"><i class="fa fa-table"></i> Laporan</a>
                    </li>
                    <li  >
                        <a  href="../admin/logout.php"><i class="fa fa-sign-out"></i> Log Out </a>
                    </li>			                 	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Dashboard Pegawai</h2>
                        <h5>Dibawah ini merupakan dashboard pegawai E-Restoku</h5>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered" id="mytable">
			<thead class="thead-dark text-center">
				<tr>
                    <th>Id Pegawai</th>
					<th>Nama Pegawai</th>
					<th>Password</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>No HP</th>
                    <th>Posisi</th>
                    <th>Tindakan</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = mysqli_query($koneksi, "SELECT * FROM pegawai ORDER BY id_pegawai") or die (mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0) {
					//membuat variabel $no untuk menyimpan nomor urut
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)) {
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$data['id_pegawai'].'</td>
							<td>'.$data['nama_pegawai'].'</td>
							<td>'.$data['password'].'</td>
							<td>'.$data['jenis_kelamin'].'</td>
                            <td>'.$data['alamat'].'</td>
                            <td>'.$data['no_hp'].'</td>
                            <td>'.$data['posisi'].'</td>
							<td>
								<a href="pegawai-edit.php?id_pegawai='.$data['id_pegawai'].'" class="badge badge-warning">Edit</a>
								<a href="pegawai-delete.php?id_pegawai='.$data['id_pegawai'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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
        <a class="btn btn-primary mb-2" href="pegawai-tambah.php" role="button">Tambah Pegawai</a> 
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
