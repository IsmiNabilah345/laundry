<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data produk/paket</title>
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
        <h3>Tambah Data Paket</h3><br><br>
        <form method="post" action="simpan_paket.php">
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
                <span class="input-group-text" id="addon-wrapping">Jenis</span>
                <input type="text" name="jenis" class="form-control" aria-describedby="addon-wrapping">
            </div><br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Nama Paket</span>
                <input type="text" name="nama_paket" class="form-control" aria-describedby="addon-wrapping">
            </div><br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Harga</span>
                <input type="number" name="harga" class="form-control" aria-describedby="addon-wrapping">
            </div><br>
            <input style="width: 350px;" type="submit" name="daftar" value="Simpan" class="form-control" aria-describedby="addon-wrapping"><br>
            <a style="width: 350px;" href="paket.php" class="form-control" aria-describedby="addon-wrapping">Back</a>
        </form>
    </center>
    <script src="../assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>