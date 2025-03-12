<?php

include '../koneksi.php';

if (isset($_POST['daftar'])){

    $id= $_POST['id'];
    $nama= $_POST['nama_outlet'];
    $alamat= $_POST['alamat'];
    $telepon= $_POST['tlp'];

    $sql= "INSERT INTO tb_outlet_ismi VALUES ( '$id', '$nama', '$alamat', '$telepon')";
    $query= mysqli_query($conn, $sql);

    if($query){
      header('Location: outlet.php');
    }
}
?>