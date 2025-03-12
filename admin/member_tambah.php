<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data member</title>
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
        <h3>Tambah Data Pengguna</h3><br><br>
        <form method="post" action="simpan_member.php">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Nama</span>
                <input type="text" name="nama" class="form-control" aria-describedby="addon-wrapping">
            </div><br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Alamat</span>
                <input type="text" name="alamat" class="form-control" aria-describedby="addon-wrapping">
            </div><br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Jenis Kelamin</span>
                <select name="jenis_kelamin" class="form-control" aria-describedby="addon-wrapping">
                    <option value="1">L</option>
                    <option value="2">P</option>
                </select>
            </div><br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Nomor Telepon</span>
                <input type="number" name="tlp" class="form-control" aria-describedby="addon-wrapping">
            </div><br>
            <input style="width: 350px;" type="submit" name="daftar" value="Simpan" class="form-control" aria-describedby="addon-wrapping"><br>
            <a style="width: 350px;" href="member.php" class="form-control" aria-describedby="addon-wrapping">Back</a>
        </form>
    </center>
    <script src="../assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>