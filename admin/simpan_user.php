<?php

include '../koneksi.php';

if (isset($_POST['daftar'])){

    $id= $_POST['id_user'];
    $nama= $_POST['nama_user'];
    $username= $_POST['username'];
    $password= $_POST['password'];
    $idoutlet= $_POST['id_outlet']; 
    $role= $_POST['role'];

    $sql= "INSERT INTO tb_user_ismi VALUES ( '$id', '$nama', '$username', '$password', '$idoutlet', '$role')";
    $query= mysqli_query($conn, $sql);

    if($query){
      header('Location: user.php');
    }
}
?>