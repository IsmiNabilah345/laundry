<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data transaksi</title>
    <?php
    session_start();
    if ((empty($_GET["destroy"]) == FALSE)) {
        session_destroy();
    }
    ?>
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
        <h3>Tambah Data Transaksi</h3><br><br>
        <form name="f" method="post" action="transaksi_tambah.php">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Nama Paket</span>
                <!-- <input type="text" name="id_outlet" class="form-control" aria-describedby="addon-wrapping"> -->
                <select name="nama_paket" class="form-control" aria-describedby="addon-wrapping">
                    <?php
                    include '../koneksi.php';
                    $query = "SELECT * FROM tb_paket_ismi";
                    $exec = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($exec)) {
                        echo "<option value='" . $row['id_paket'] . "'>" . $row['nama_paket'] . "</option>";
                    }
                    ?>
                </select>
            </div><br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Quantity</span>
                <input type="text" name="qty" class="form-control" aria-describedby="addon-wrapping">
            </div><br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Keterangan</span>
                <input type="number" name="keterangan" class="form-control" aria-describedby="addon-wrapping">
            </div><br>
            <input style="width: 350px;" type="submit" name="button" value="Simpan" class="form-control" aria-describedby="addon-wrapping"><br>
            <br>
        </form>
    </center>
    <center>
        <form method="post" action="simpan_transaksi.php">
            <table class="table3">
                <tr style="background-color:white; color:black;">

                    <th style="text-align:center">No</th>
                    <th style="text-align:center">Nama Paket</th>
                    <th style="text-align:center">Harga</th>
                    <th style="text-align:center">Quantity</th>
                    <th style="text-align:center">Keterangan</th>
                    <th style="text-align:center">Sub total</th>
                    <!-- <th style="text-align:center" hidden>Kode Barang</th> -->


                    <?php
                    $awal = 1;
                    $sub = 0;
                    $total = 0;
                    if (@$_POST["nama_paket"] != '') {
                        if (empty($_SESSION["isi"]) == TRUE) {
                            $_SESSION["isi"] = 1;
                        } else {
                            $_SESSION["isi"]++;
                        }

                        @$id_paket = $_POST['nama_paket'];
                        $tampil = mysqli_fetch_array(mysqli_query($conn, "SELECT nama_paket, harga from tb_paket_ismi where id_paket='$id_paket'"));
                        @$nama_paket = $tampil['nama_paket'];
                        @$harga = $tampil["harga"];
                        @$keterangan = $_POST["keterangan"];
                        @$qty = trim($_POST["qty"]);
                        @$sub = $harga * $qty;

                        $_SESSION["akhir"][$_SESSION["isi"]] = array($nama_paket, $harga, $qty, $keterangan, $sub, $id_paket);
                        // $_SESSION["jenis"]=$jenis;
                    }

                    @$awal = $_SESSION["isi"];

                    for ($i = 0; $i <= $awal; $i++) {
                        if (@$_SESSION['akhir'][$i][0] != '') { ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo @$_SESSION['akhir'][$i][0] ?></td>
                    <td><?php echo @$_SESSION['akhir'][$i][1] ?></td>
                    <td><?php echo @$_SESSION['akhir'][$i][2] ?></td>
                    <td><?php echo @$_SESSION['akhir'][$i][3] ?></td>
                    <td><?php echo @$_SESSION['akhir'][$i][4] ?></td>
                    <td hidden><?php echo @$_SESSION['akhir'][$i][5] ?></td>
                </tr>
        <?php }
                        $total = @$_SESSION['akhir'][$i][4] + $total;
                        @$_SESSION['total'] = $total;
                    } ?>

        <tr>
        <tr>
            <td colspan=4>
                <?php echo "Grand Bayar"; ?>
            </td>
            <td>

            </td>
            <td>
                <?php echo "Rp. $total"; ?>
            </td>
        </tr>
        <tr>
            <td colspan=5>
                <input type='submit' value="Save" name="Simpan" />
            </td>
        </tr>
        </tr>
        </tr>
            </table>
            <br>
            <table>
                <tr>
                    <td>Id</td>
                    <td><input type="number" name="id" value="<?php echo $id ?>" disabled></td>
                </tr>
                <tr>
                    <td>Nama Outlet</td>
                    <td><select name="nama_outlet"><?php
                                                    include '../koneksi.php';
                                                    $query = "SELECT * FROM tb_outlet_ismi";
                                                    $exec = mysqli_query($conn, $query);
                                                    while ($row = mysqli_fetch_assoc($exec)) {
                                                        $jenis = $row["nama_outlet"];
                                                        echo "<option value='" . $row['id_outlet'] . "'>" . $row['nama_outlet'] . "</option>";
                                                    }
                                                    ?>
                        </select>
                    </td>
                </tr>
                <!-- <tr>
                        <td>Kode Invoice</td>
                        <td><input type="text" name="kode_invoice"></td>
                    </tr> -->
                <tr>
                    <td>Member</td>
                    <td><select name="nama"><?php
                                            include '../koneksi.php';
                                            $query = "SELECT * FROM tb_member_ismi";
                                            $exec = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_assoc($exec)) {
                                                $jenis = $row["nama"];
                                                echo "<option value='" . $row['id_member'] . "'>" . $row['nama'] . "</option>";
                                            }
                                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>
                        <input type="text" name="tgl" disabled value="<?php date_default_timezone_set("Asia/Jakarta");
                                                                        echo date("Y-m-d"); ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Batas Waktu</td>
                    <td><input type="date" name="batas_waktu"></td>
                </tr>
                <tr>
                    <td>Tanggal Bayar</td>
                    <td><input type="date" name="tgl_bayar"></td>
                </tr>
                <tr>
                    <td>Biaya Tambahan</td>
                    <td><input type="number" name="biaya_tambahan"></td>
                </tr>
                <tr>
                    <td>Diskon</td>
                    <td><input type="number" name="diskon"></td>
                </tr>
                <tr>
                    <td>Pajak</td>
                    <td><input type="number" name="pajak" value="15" readonly></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><select name="status">
                            <option value="baru">Baru</option>
                            <option value="proses">Proses</option>
                            <option value="selesai">Selesai</option>
                            <option value="diambil">Diambil</option>
                        </select>
                </tr>
                <tr>
                    <td>Dibayar</td>
                    <td><select name="dibayar">
                            <option value="dibayar">Dibayar</option>
                            <option value="belum_dibayar">Belum Dibayar</option>
                        </select>
                </tr>
                <tr>
                    <td>User</td>
                    <td><select name="nama_user"><?php
                                                    include '../koneksi.php';
                                                    $query = "SELECT * FROM tb_user_ismi";
                                                    $exec = mysqli_query($conn, $query);
                                                    while ($row = mysqli_fetch_assoc($exec)) {
                                                        $jenis = $row["nama_user"];
                                                        echo "<option value='" . $row['id_user'] . "'>" . $row['nama_user'] . "</option>";
                                                    }
                                                    ?>
                        </select>
                    </td>
                </tr>
                <!-- <tr>
                        <td><input type="submit" name="Simpan" value="Simpan"></td>
                    </tr> -->
            </table><br>
            <a style="width: 350px;" href="transaksi.php" class="form-control" aria-describedby="addon-wrapping">Back</a>
        </form>
    </center>
    <script src="../assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>