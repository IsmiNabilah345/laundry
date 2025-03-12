<?php

include '../koneksi.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $id_role = $_POST['id_user'];
    $nama = $_POST['nama_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $idoutlet = $_POST['id_outlet'];
    $role = $_POST['role'];

    $result = mysqli_query($conn, "UPDATE tb_user_ismi SET nama_user= '$nama', username= '$username', password= '$password', id_outlet= '$idoutlet', role= '$role' WHERE id_user='$id'");
    header("Location: user.php");
}
?>
<?php

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM tb_user_ismi WHERE id_user=$id");

while ($user_data = mysqli_fetch_array($result)) {
    $id_role = $user_data['id_user'];
    $nama = $user_data['nama_user'];
    $username = $user_data['username'];
    $password = $user_data['password'];
    $idoutlet = $user_data['id_outlet'];
    $role = $user_data['role'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <title>Edit Data User</title>
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
        <h3>Update Data User</h3><br><br>
        <form name="update_user" method="post" action="user_edit.php">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Nama</span>
                <input type="text" name="nama_user" value=<?php echo $nama; ?> class="form-control" aria-describedby="addon-wrapping">
            </div><br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Username</span>
                <input type="text" name="username" value=<?php echo $username; ?> class="form-control" aria-describedby="addon-wrapping">
            </div><br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Password</span>
                <input type="password" name="password" value=<?php echo $password; ?> class="form-control" aria-describedby="addon-wrapping">
            </div><br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Nama Outlet</span>
                <!-- <input type="text" name="id_outlet" class="form-control" aria-describedby="addon-wrapping"> -->
                <select name="id_outlet" class="form-control" aria-describedby="addon-wrapping">
                    <?php
                    include '../koneksi.php';
                    $query = "SELECT * FROM tb_outlet_ismi";
                    $exec = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($exec)) {
                        $jenis = $row["nama_outlet"];
                        echo "<option value='" . $row['id_outlet'] . "'>" . $row['nama_outlet'] . "</option>";
                    }
                    ?>
                </select>
            </div><br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Role</span>
                <!-- <input type="text" name="role" class="form-control" aria-describedby="addon-wrapping"> -->
                <select name="role" class="form-control" aria-describedby="addon-wrapping">
                    <option value="1">admin</option>
                    <option value="2">kasir</option>
                    <option value="3">owner</option>
                </select>
            </div><br>
            <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
            <input style="width: 350px;" type="submit" name="update" value="Update" class="form-control" aria-describedby="addon-wrapping"><br>
            <a style="width: 350px;" href="user.php" class="form-control" aria-describedby="addon-wrapping">Back</a>
        </form>
    </center>
    <script src="../assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>