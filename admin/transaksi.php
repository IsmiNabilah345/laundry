<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
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
    <!-- <h3>Pengaturan Transaksi</h3>
    <nav>
        <h3><a href="admin.php">Home</a> || <a href="user.php">User</a> || <a href="member.php">Member</a> || <a href="outlet.php">Outlet</a> || <a href="paket.php">Paket Cucian</a></h3>
    </nav>
    <br> -->
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
    </nav><br><br>
    <?php
    include '../koneksi.php';

    $sql = "SELECT * FROM tb_transaksi_ismi as a INNER JOIN tb_outlet_ismi as b ON a.id_outlet=b.id_outlet INNER JOIN tb_member_ismi as c ON a.id_member=c.id_member INNER JOIN tb_user_ismi as d ON a.id_user=d.id_user";
    $role = mysqli_query($conn, $sql); //setting db $ table
    ?>
    <nav>
        <a href="transaksi_tambah.php" style="margin-left: 1.4rem;">[+] Tambah Transaksi</a>
    </nav>
    <br><br>
    <center>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Outlet</th>
                    <th>Kode Invoice</th>
                    <th>Id Member</th>
                    <th>Tanggal</th>
                    <th>Batas Waktu</th>
                    <th>Tanggal Bayar</th>
                    <!-- <th>Biaya Tambahan</th>
                    <th>Diskon</th>
                    <th>Pajak</th>
                    <th>Sub Total</th>
                    <th>Total</th> -->
                    <th>Status</th>
                    <th>Dibayar</th>
                    <th>Id User</th>
                    <th>Keterangan</th>
                    <th>Cetak Struk</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($role as $row) : ?>
                    <tr>
                        <td><?= $row["id"]; ?></td>
                        <td><?= $row["nama_outlet"]; ?></td>
                        <td><?= $row["kode_invoice"]; ?></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["tgl"]; ?></td>
                        <td><?= $row["batas_waktu"]; ?></td>
                        <td><?= $row["tgl_bayar"]; ?></td>
                        <!-- <td><?= $row["biaya_tambahan"]; ?></td>
                        <td><?= $row["diskon"]; ?></td>
                        <td><?= $row["pajak"]; ?></td>
                        <td><?= $row["subtotal_ismi"]; ?></td>
                        <td><?= $row["total"]; ?></td> -->
                        <td><?= $row["status"]; ?></td>
                        <td><?= $row["dibayar"]; ?></td>
                        <td><?= $row["nama_user"]; ?></td>
                        <td>
                            <a href="detail_transaksi.php?id=<?= $row['id']; ?>" class="btn btn-dark btn-sm">Detail</a>
                        </td>
                        <td>
                            <a href="../cetak_struk.php?id=<?= $row['id']; ?>" class="btn btn-dark btn-sm">Struk</a>
                        </td>
                        <!-- <td>
                        <?php
                        echo "<a href='user_edit.php?id=$row[id]'>Edit</a>";
                        ?>
                        <a href="user_hapus.php?id=<?= $row['id']; ?>" oneclick="return confirm ('yakin?');">Hapus</a>
                    </td> -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
    <script src="../assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>