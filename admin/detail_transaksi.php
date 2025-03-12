<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Detail Transaksi</title>
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
    <!-- <nav>
        <h3><a href="admin.php">Home</a> || <a href="user.php">User</a> || <a href="member.php">Member</a> || <a href="outlet.php">Outlet</a> || <a href="paket.php">Paket Cucian</a> || <a href="detail_transaksi.php">Detail Transaksi</a> || <a href="transaksi.php">Transaksi</a></h3>
    </nav>
    <h3>Pengaturan Detail Transaksi</h3>
    <br> -->
    <?php
    include '../koneksi.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_detail_transaksi_ismi as a INNER JOIN tb_paket_ismi as b ON a.id_paket = b.id_paket AND id_transaksi=$id";
    $role = mysqli_query($conn, $sql); //setting db $ table
    ?>
    <!-- <nav>
        <a href="detail_transaksi_tambah.php">[+] Tambah Detail Transaksi</a>
    </nav> -->
    <br>
    <center>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Id Transaksi</th>
                    <th>Id Paket</th>
                    <th>Qty</th>
                    <th>Keterangan</th>
                    <!-- <th>Aksi</th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($role as $row) : ?>
                    <tr>
                        <td><?= $row["id_detail"]; ?></td>
                        <td><?= $row["id_transaksi"]; ?></td>
                        <td><?= $row["nama_paket"]; ?></td>
                        <td><?= $row["qty"]; ?></td>
                        <td><?= $row["keterangan"]; ?></td>
                        <!-- <td>
                        <?php
                        echo "<a href='user_edit.php?id=$row[id]'>Edit</a>";
                        ?>
                        <a href="user_hapus.php?id=<?= $row['id']; ?>" oneclick="return confirm ('yakin?');">Hapus</a>
                    </td> -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <!-- <a href="transaksi.php">Back</a> -->
        </table>
        <a href="transaksi.php" class="form-control" aria-describedby="addon-wrapping">Back</a>
    </center>
    <script src="../assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>