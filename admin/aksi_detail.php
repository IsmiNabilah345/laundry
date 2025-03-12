<?php

session_start();
include "../koneksi.php";

$querycount="SELECT max(id) as LastID FROM `tb_transaksi_ismi`";
$result=mysqli_query($conn, $querycount) or die(mysql_error($conn));
$row=mysqli_fetch_array($result, MYSQLI_ASSOC);

$LastID=$row['LastID']+1;
$qty=$_SESSION['qty'];
@$jenis=$_POST['jenis'];
@$harga=$tampil["harga"];

$status="Belum selesai";
$id_user=$_SESSION['id_role'];

$sql=mysqli_query($conn, "INSERT INTO `tb_transaksi_ismi` (id, jenis, harga, keterangan_bila, status_order_bila, id_user_bila) values ('$LastID', '$jenis', '$harga', '$total', '$id_user')");

$awal=$_SESSION['isi'];
    $j=0;
    while($j<=$awal) {
        $id_masakan=@$_SESSION['akhir'][$j][4];
        $Stock=@$_SESSION['akhir'][$j][2];
        $sub=@$_SESSION['akhir'][$j][3];

        if($LastID!="" and $idMasakan!="" and $Stock!=""){
            $query = mysqli_query($conn, "INSERT INTO detail_transaksi_ismi(id_detail, qty) values ('$LastID', '$qty', 'Belum Selesai')");
        }
        $j++;
    }
    echo "<script type='text/javascript'>alert('Data berjasil disimpan')</script>";
    echo "<script>document.location.href='detail_transaksi.php';</script>";
    unset($_SESSION['isi']);
    unset($_SESSION['total']);
    unset($_SESSION['jenis']);
    echo"".mysql_error();
?>