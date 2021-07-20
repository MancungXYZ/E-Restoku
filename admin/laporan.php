<?php
include "../koneksi.php";
require "validasi.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>.:: Laporan ::.</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

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
                <a class="navbar-brand" href="index.html">E-Restoku</a> 
            </div>
  <div style="color: white;
              padding: 15px 50px 5px 50px;
              float: right;
              font-size: 16px;"> Last access : <?php echo date("d M Y"); ?> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
                    <li>
                        <a  href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                   <li>
                        <a  href="pembelian.php"><i class="fa fa-shopping-cart"></i> Pembelian</a>
                    </li>
                    <li>
                        <a class="active-menu"  href="laporan.php"><i class="fa fa-table"></i> Laporan</a>
                    </li>
                    <li  >
                        <a  href="../admin/logout.php"><i class="fa fa-sign-out"></i> Logout </a>
                    </li>				
					
					                   
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Laporan Transaksi</h2>   
                        <h5>Berikut adalah data laporan transaksi pelanggan</h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Laporan E-Restoku
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead class="thead-dark text-center">
				<tr>
                    <th>No</th>
                    <th>Id Transaksi</th>
					<th>Id Pegawai</th>
					<th>Id Menu</th>
					<th>Id Pesanan</th>
					<th>Nama Pelanggan</th>
					<th>No Meja</th>
                    <th>Total Bayar</th>
                    <th>Tanggal Transaksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = mysqli_query($koneksi, "SELECT transaksi.id_transaksi, transaksi.id_pegawai, transaksi.id_menu, transaksi.id_pesanan, pelanggan.nama_pelanggan, pelanggan.no_meja, transaksi.total_bayar, transaksi.tgl_transaksi FROM transaksi JOIN pelanggan ON transaksi.id_pesanan=pelanggan.id_pesanan") or die (mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0) {
					//membuat variabel $no untuk menyimpan nomor urut
					//melakukan perulangan while dengan dari dari query $sql
                    $no=1;
					while($data = mysqli_fetch_assoc($sql)) {
						//menampilkan data perulangan
						echo '
						<tr>
                            <td>'.$no.'</td>
							<td>'.$data['id_transaksi'].'</td>
							<td>'.$data['id_pegawai'].'</td>
                            <td>'.$data['id_menu'].'</td>
                            <td>'.$data['id_pesanan'].'</td>
                            <td>'.$data['nama_pelanggan'].'</td>
                            <td>'.$data['no_meja'].'</td>
							<td> Rp. '.$data['total_bayar'].'</td>
							<td>'.$data['tgl_transaksi'].'</td>
						</tr>
						';
						$no++;
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

                <?php
                    $sql = mysqli_query($koneksi, "Select SUM(total_bayar) AS laba From transaksi");
                    $pendapatan = $sql->fetch_object()->laba;
                ?>
                <tfoot>
                    <tr>
                        <td colspan="8">Total Pendapatan</td>
                        <td>Rp. <?php echo number_format ($pendapatan) ?></td>
                    </tr>
                </tfoot>
                                </table>
                            </div>
                            <button class="btn btn-success mt-2" onclick=" window.open('report.php','_blank')"> Google</button>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
