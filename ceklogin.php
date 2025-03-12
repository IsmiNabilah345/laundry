<?php
session_start();

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$data = "SELECT * from  tb_user_ismi where username= '$username' and password= '$password'";
$cek = mysqli_query($conn, $data);

if (mysqli_num_rows($cek) != 0) {
    $login = mysqli_fetch_array($cek);
    $_SESSION['username'] = $login['username'];
    $_SESSION['password'] = $login['password'];
    if ($login['role'] == 'admin') {
        $_SESSION['LOGIN'] = 'LOGIN';
        header('location:admin/user.php');
    } elseif ($login['role'] == 'kasir') {
        $_SESSION['LOGIN'] = 'LOGIN';
        header('location:kasir/kasir.php');
    } elseif ($login['role'] == 'owner') {
        $_SESSION['LOGIN'] == 'LOGIN';
        header('location:owner/owner.php');
    }
} else {
    header("location:login.php?pesan=gagal");
    header("location:index.php");
}
