<?php
session_start();
include '../koneksi.php';

$query = mysqli_query($conn, "SELECT max(id) as kode_invoice FROM tb_transaksi_ismi");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kode_invoice'];
$urutan = (int) substr($kodeBarang, 3, 3);
$urutan++;

$huruf = "BRG";
$kodeBarang = $huruf . sprintf("%03s", $urutan);

// $query = mysqli_query($conn, "SELECT max(id) as kode_invoice FROM tb_transaksi_ismi");
// $data = mysqli_fetch_array($query);
// $kodeBarang = $data['kode_invoice'];
// $urutan = (int) substr($kodeBarang, 3, 3);
// $urutan++;

// $huruf = "INV-";
// $kodeBarang = $huruf . sprintf("%03s", $urutan);

//$id= $_POST['id'];
$idoutlet = $_POST['nama_outlet'];
$kodeinvoice = $kodeBarang;
$nama = $_POST['nama'];
date_default_timezone_set("Asia/Jakarta");
$tgl = date("y-m-d");
$bataswaktu = $_POST['batas_waktu'];
$tglbayar = $_POST['tgl_bayar'];
$biayatambahan = $_POST['biaya_tambahan'];
$diskon = $_POST['diskon'];
$pajak = 15;
$status = $_POST['status'];
$dibayar = $_POST['dibayar'];
$id_user = $_POST['nama_user'];

$sub = @$_SESSION['total'];
$pajakk = $sub * 0.15;
$total = $sub + $pajakk + $biayatambahan - $diskon;

// var_dump($idoutlet, $kodeinvoice, $nama, $tgl, $bataswaktu, $tglbayar, $biayatambahan, $diskon, $pajak, $status, $dibayar, $id_user);
// die;
$sql = mysqli_query($conn, "INSERT INTO tb_transaksi_ismi (`id_outlet`, `kode_invoice`, `id_member`, `tgl`, `batas_waktu`, `tgl_bayar`, `biaya_tambahan`, `diskon`, `pajak`, `subtotal_ismi`, `total`, `status`, `dibayar`, `id_user`) VALUES ($idoutlet, '$kodeinvoice', $nama, $tgl, $bataswaktu, $tglbayar, $biayatambahan, $diskon, $pajak, $sub, $total, '$status', '$dibayar', $id_user)");
$id_transaksi = mysqli_query($conn, "SELECT id from tb_transaksi_ismi ORDER BY id DESC");
$baris_ismi = mysqli_fetch_array($id_transaksi);
$id_trans = $baris_ismi['id'];

$awal = $_SESSION['isi'];
$j = 0;
while ($j <= $awal) {

    $id_paket = @$_SESSION['akhir'][$j][5];
    $qty = @$_SESSION['akhir'][$j][2];
    $keterangan = @$_SESSION['akhir'][$j][3];

    if ($sql) {
        $query2 = mysqli_query($conn, "INSERT INTO `tb_detail_transaksi_ismi`(`id_transaksi`, `id_paket`, `qty`, `keterangan`) values ('$id_trans','$id_paket','$qty', '$keterangan')");
    }
    $j++;
}
echo "<script type='text/javascript'>alert('Data berhasil disimpan')</script>";
echo "<script>document.location.href='transaksi.php';</script>";
unset($_SESSION['isi']);
unset($_SESSION['total']);
// echo "" . mysqli_error($query);
    
    //     if($query){
    //       header('Location: transaksi.php');
    // }
