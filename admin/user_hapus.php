<?php

    include '../koneksi.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM tb_user_ismi WHERE id_user='$id'";
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
    header('Location: user.php');
    }

?>