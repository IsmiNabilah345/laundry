<?php

    include '../koneksi.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM tb_member_ismi WHERE id_member='$id'";
    $hapus = mysqli_query($conn, $sql);

    if($hapus){
        echo "
            <script>
                alert('data berhasil dihapus');
            </script>
        ";
            header('Location: member.php');
    }else{
        echo "
        <script>
            alert('data gagal dihapus');
        </script>
        ";
    header('Location: member.php');
    }

?>