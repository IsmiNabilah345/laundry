<?php

include '../koneksi.php';

if (isset($_POST['daftar'])){

    $id= $_POST['id_member'];
    $nama= $_POST['nama'];
    $alamat= $_POST['alamat'];
    $jk= $_POST['jenis_kelamin'];
    $telepon= $_POST['tlp'];

    $sql= "INSERT INTO tb_member_ismi VALUES ( '$id', '$nama', '$alamat', '$jk', '$telepon')";
    $query= mysqli_query($conn, $sql);

    if($query){
      header('Location: member.php');
    }
}
?>