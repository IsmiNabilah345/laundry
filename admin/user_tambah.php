<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data pengguna</title>
    <style>
        body {
            background-color: #B2B2B2;
        }

        h3 {
            margin-top: 2.5rem;
        }

        .input-group {
            width: 350px;
        }
    </style>
</head>

<body>
    <center>
        <h3>Tambah Data User</h3><br><br>
        <form method="post" action="simpan_user.php">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Nama</span>
                <input type="text" name="nama_user" class="form-control" aria-describedby="addon-wrapping">
            </div><br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Username</span>
                <input type="text" name="username" class="form-control" aria-describedby="addon-wrapping">
            </div><br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Password</span>
                <input type="password" name="password" class="form-control" aria-describedby="addon-wrapping">
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
            <input style="width: 350px;" type="submit" name="daftar" value="Simpan" class="form-control" aria-describedby="addon-wrapping"><br>
            <a style="width: 350px;" href="user.php" class="form-control" aria-describedby="addon-wrapping">Back</a>
        </form>
    </center>
    <script src="../assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>