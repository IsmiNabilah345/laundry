<?php

include '../koneksi.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $id_role = $_POST['id_paket'];
    $idoutlet = $_POST['id_outlet'];
    $jenis = $_POST['jenis'];
    $nama_paket = $_POST['nama_paket'];
    $harga = $_POST['harga'];

    $result = mysqli_query($conn, "UPDATE tb_paket_ismi SET id_outlet= '$idoutlet', jenis= '$jenis', nama_paket= '$nama_paket', harga= '$harga' WHERE id_paket='$id'");
    header("Location: paket.php");
    var_dump($result);
    die;
}
?>
<?php

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM tb_paket_ismi WHERE id_paket=$id");

while ($user_data = mysqli_fetch_array($result)) {
    $id_role = $user_data['id_paket'];
    $idoutlet = $user_data['id_outlet'];
    $jenis = $user_data['jenis'];
    $nama_paket = $user_data['nama_paket'];
    $harga = $user_data['harga'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <title>Edit Data Paket</title>
    <style>
        body {
            background-color: #B2B2B2;
        }

        .input-group {
            width: 350px;
        }

        h3 {
            margin-top: 2rem;
        }
    </style>
</head>

<body>
    <center>
        <h3>Update Data Paket</h3><br><br>
        <form name="update_outlet" method="post" action="paket_edit.php">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Nama Outlet</span>
                <!-- <input type="text" name="id_outlet" class="form-control" aria-describedby="addon-wrapping"> -->
                <select name="id_outlet" value=<?php echo $idoutlet; ?> class="form-control" aria-describedby="addon-wrapping">
                    <?php
                    include '../koneksi.php';
                    $query = "SELECT * FROM tb_outlet_ismi";
                    $exec = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($exec)) {
                        // $outlet = $row["nama_outlet"];
                        echo "<option value='" . $row['id_outlet'] . "'>" . $row['nama_outlet'] . "</option>";
                    }
                    ?>
                </select>
            </div><br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Jenis</span>
                <select name="jenis" class="form-control" aria-describedby="addon-wrapping">
                    <option value="kiloan">Kiloan</option>
                    <option value="selimut">Selimut</option>
                    <option value="bed_cover">Bed Cover</option>
                    <option value="kaos">Kaos</option>
                    <option value="lain">Lain</option>
                </select>
            </div><br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Nama Paket</span>
                <input type="text" name="nama_paket" value=<?php echo $nama_paket; ?> class="form-control" aria-describedby="addon-wrapping">
            </div><br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Harga</span>
                <input type="number" name="harga" value=<?php echo $harga; ?> class="form-control" aria-describedby="addon-wrapping">
            </div><br>
            <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
            <input style="width: 350px;" type="submit" name="update" value="Update" class="form-control" aria-describedby="addon-wrapping"><br>
            <a style="width: 350px;" href="paket.php" class="form-control" aria-describedby="addon-wrapping">Back</a>
        </form>
    </center>
    <script src="../assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>