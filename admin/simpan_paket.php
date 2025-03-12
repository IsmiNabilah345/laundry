<?php

include '../koneksi.php';

if (isset($_POST['daftar'])){

    $id= $_POST['id'];
    $idoutlet= $_POST['id_outlet']; 
    $jenis= $_POST['jenis'];
    $namapaket= $_POST['nama_paket'];
    $harga= $_POST['harga'];

    $sql= "INSERT INTO tb_paket_ismi VALUES ( '$id', '$idoutlet', '$jenis', '$namapaket', '$harga')";
    $query= mysqli_query($conn, $sql);

    if($query){
      header('Location: paket.php');
    }
}
?>