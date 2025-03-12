<?php

    include '../koneksi.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM tb_paket_ismi WHERE id_paket='$id'";
    $hapus = mysqli_query($conn, $sql);

    if($hapus){
        echo "
            <script>
                alert('data berhasil dihapus');
            </script>
        ";
            header('Location: user.php');
    }else{
        echo "
        <script>
            alert('data gagal dihapus');
        </script>
        ";
    header('Location: paket.php');
    }

?>