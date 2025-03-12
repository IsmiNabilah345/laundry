<?php

include '../koneksi.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $id_role = $_POST['id_outlet'];
    $nama = $_POST['nama_outlet'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['tlp'];

    $result = mysqli_query($conn, "UPDATE tb_outlet_ismi SET nama_outlet= '$nama', alamat= '$alamat', tlp= '$telepon' WHERE id_outlet='$id'");
    header("Location: outlet.php");
}
?>
<?php

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM tb_outlet_ismi WHERE id_outlet=$id");

while ($user_data = mysqli_fetch_array($result)) {
    $id_role = $user_data['id_outlet'];
    $nama = $user_data['nama_outlet'];
    $alamat = $user_data['alamat'];
    $telepon = $user_data['tlp'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <title>Edit Data Outlet</title>
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
        <h3>Update Data Outlet</h3><br><br>
        <form name="update_outlet" method="post" action="outlet_edit.php">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Nama</span>
                <input type="text" name="nama_outlet" value=<?php echo $nama; ?> class="form-control" aria-describedby="addon-wrapping">
            </div><br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Alamat</span>
                <input type="text" name="alamat" value=<?php echo $alamat; ?> class="form-control" aria-describedby="addon-wrapping">
            </div><br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Nomor Telepon</span>
                <input type="text" name="tlp" value=<?php echo $telepon; ?> class="form-control" aria-describedby="addon-wrapping">
            </div><br>
            <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
            <input style="width: 350px;" type="submit" name="update" value="Update" class="form-control" aria-describedby="addon-wrapping"><br>
            <a style="width: 350px;" href="outlet.php" class="form-control" aria-describedby="addon-wrapping">Back</a>
        </form>
    </center>
    <script src="../assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>