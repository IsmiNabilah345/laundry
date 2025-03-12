<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <style>
        body {
            background-color: #B2B2B2;
            color: #3C2A21;
        }

        nav a {
            text-decoration: none;
            color: #3C2A21;
        }

        table {
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- <h3 style="border:1px; padding:15px; display:block; background: rgba(255, 255, 255, 0.2); text-align:center;">Pengaturan Penggguna</h3> -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="user.php">User</a>
                    <a class="nav-link" href="member.php">Member</a>
                    <a class="nav-link" href="outlet.php">Outlet</a>
                    <a class="nav-link" href="paket.php">Paket Cucian</a>
                    <a class="nav-link" href="transaksi.php">Transaksi</a>
                    <a class="nav-link" href="../logout.php">Logout</a>
                    <!-- <a class="nav-link disabled">Disabled</a> -->
                </div>
            </div>
        </div>
    </nav><br>

    <!-- <nav>
        <h3><a href="admin.php">Home</a> || <a href="member.php">Member</a> || <a href="outlet.php">Outlet</a> || <a href="paket.php">Paket Cucian</a> || <a href="transaksi.php">Transaksi</a> || <a href="../logout.php">Logout</a></h3>
    </nav> -->
    <br>
    <?php
    include '../koneksi.php';

    $sql = "SELECT * FROM tb_user_ismi as a INNER JOIN tb_outlet_ismi as b ON a.id_outlet=b.id_outlet";
    $role = mysqli_query($conn, $sql); //setting db $ 

    ?>
    <nav>
        <a href="user_tambah.php" style="margin-left: 1.4rem;">[+] Tambah Pengguna</a>
    </nav>
    <br><br>
    <center>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <!-- <th>Password</th> -->
                    <th>Nama Outlet</th>
                    <th>Role</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($role as $row) : ?>
                    <tr>
                        <td><?= $row["id_user"]; ?></td>
                        <td><?= $row["nama_user"]; ?></td>
                        <td><?= $row["username"]; ?></td>
                        <!-- <td><?= $row["password"]; ?></td> -->
                        <td><?= $row["nama_outlet"]; ?></td>
                        <td><?= $row["role"]; ?></td>
                        <td>
                            <a href="user_edit.php?id=<?= $row['id_user']; ?>" class="btn btn-dark btn-sm" title="Update">Edit</a>
                            <a href="user_hapus.php?id=<?= $row['id_user']; ?>" class="btn btn-dark btn-sm" oneclick="return confirm ('yakin?');"> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
    <script src="../assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>