<?php

include "../koneksi.php";
require_once '../dompdf/autoload.inc.php';


        use Dompdf\Dompdf;
        $dompdf = new Dompdf();

        $sql = mysqli_query($koneksi, "SELECT transaksi.id_transaksi, transaksi.id_pegawai, transaksi.id_menu, transaksi.id_pesanan, pelanggan.nama_pelanggan, pelanggan.no_meja, transaksi.total_bayar, transaksi.tgl_transaksi FROM transaksi JOIN pelanggan ON transaksi.id_pesanan=pelanggan.id_pesanan") or die (mysqli_error($koneksi));
        $html = '<center><h2>Laporan Penghasilan E-Restoku</h2></center><hr/><br/>';
        
        $html .= '<table border="1" width="100%">
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
				</tr>';
                $no=1;
                while($data = mysqli_fetch_assoc($sql)) {
                    //menampilkan data perulangan
                    $html .= '<tr>
                    <td>'.$no.'</td>
                    <td>'.$data['id_transaksi'].'</td>
                    <td>'.$data['id_pegawai'].'</td>
                    <td>'.$data['id_menu'].'</td>
                    <td>'.$data['id_pesanan'].'</td>
                    <td>'.$data['nama_pelanggan'].'</td>
                    <td>'.$data['no_meja'].'</td>
                    <td> Rp. '.$data['total_bayar'].'</td>
                    <td>'.$data['tgl_transaksi'].'</td>
                            </tr>';
                    $no++;
                }
                $sql = mysqli_query($koneksi, "Select SUM(total_bayar) AS laba From transaksi");
                $pendapatan = $sql->fetch_object()->laba;

                $html .= '<tr>
                        <td colspan="8">Total Pendapatan</td>
                        <td>Rp. '.$pendapatan.'</td>
                    </tr>';

                $html .= "</html>";
                $dompdf->loadHtml($html);
                // Setting ukuran dan orientasi kertas
                $dompdf->setPaper('A4', 'potrait');
                // Rendering dari HTML Ke PDF
                $dompdf->render();
                // Melakukan output file Pdf
                $dompdf->stream('Laporan_Erestoku.pdf');
    
        header("Location: laporan.php");
?>