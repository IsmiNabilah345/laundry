<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Paket</title>
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
    <!-- <h3>Pengaturan Produk/Paket Cucian</h3> -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="user.php">User</a>
                    <a class="nav-link" href="member.php">Member</a>
                    <a class="nav-link" href="outlet.php">Outlet</a>
                    <a class="nav-link active" href="paket.php">Paket Cucian</a>
                    <a class="nav-link" href="transaksi.php">Transaksi</a>
                    <a class="nav-link" href="../logout.php">Logout</a>
                    <!-- <a class="nav-link disabled">Disabled</a> -->
                </div>
            </div>
        </div>
    </nav><br>
    <br>
    <?php
    include '../koneksi.php';

    $sql = "SELECT * FROM tb_paket_ismi";
    $role = mysqli_query($conn, $sql);
    ?>
    <nav>
        <a href="paket_tambah.php" style="margin-left: 1.4rem;">[+] Tambah Paket</a>
    </nav>
    <br><br>
    <center>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Id Outlet</th>
                    <th>Jenis</th>
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($role as $row) : ?>
                    <tr>
                        <td><?= $row["id_paket"]; ?></td>
                        <td><?= $row["id_outlet"]; ?></td>
                        <td><?= $row["jenis"]; ?></td>
                        <td><?= $row["nama_paket"]; ?></td>
                        <td><?= $row["harga"]; ?></td>
                        <td>
                            <a href="paket_edit.php?id=<?= $row['id_paket']; ?>" class="btn btn-dark btn-sm" title="Update">Edit</a>
                            <a href="paket_hapus.php?id=<?= $row['id_paket']; ?>" class="btn btn-dark btn-sm" oneclick="return confirm ('yakin?');"> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
    <script src="../assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>