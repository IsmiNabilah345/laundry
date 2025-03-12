<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data detail transaksi</title>
    <style>
        body {
            background-color: #EDDBC7;
        }

        #card {
            background: #EDDBC7;
            border-radius: 8px;
            box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
            height: 380px;
            width: 300px;
            margin-top: 75px;
        }
    </style>
</head>

<body>
    <center>
        <h1>Tambah Data Detail Transaksi</h1>
        <div id='card'>
            <form method="post" action="simpan_transaksi.php">

                <table>
                <tr>
                    <td>Id</td>
                        <td><input type="number" name="id_detail" value="<?php echo $id ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Id Transaksi</td>
                        <td><select name="id_transaksi">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Id Paket</td>
                        <td><select name="nama_paket">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td><input type="number" name="gty"></td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td><input type="text" name="tgl"></td>
                    </tr>
                    <td><input type="submit" name="daftar" value="Simpan"></td>
                    </tr>
                </table>
                <a href="detail_transaksi.php">Back</a>
            </form>
    </center>
    </div>
</body>

</html> -->

<div id="section">

    <?php
    include "../koneksi.php";

    //$LastID=FormatNoTrans(OtomatisID());
    ?>
    <?php
    session_start();
    if((empty($_GET["destroy"])==FALSE)){
        session_destroy();
    }
    ?>
        <style>
        body {
            background-color: #EDDBC7;
            color: #3C2A21;
        }
/* 
        #card {
            background: #EDDBC7;
            border-radius: 8px;
            box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
            height: 380px;
            width: 300px;
            margin-top: 75px;
        } */
       h2{
            text-align:center;
        }
        h4{
            text-align:center;
            color: #3C2A21;
        }
    </style><center>
            <h2> Detail transaksi </h2>
    <h4><a href="detail_transaksi.php">Back</a><br></br></h4>
    <form name="f" method="post" action="detail_transaksi_tambah.php">
        <table>
            <td>Id</td>
            <td>:</td>
                <td><input type="number" name="id_detail" value="<?php echo $id ?>" disabled></td>
            </tr>
            <tr>
                <td>Id Transaksi</td>
                <td>:</td>
                <td><input type="number" name="id_transaksi" disabled></td>
                <!-- <td><select name="id_transaksi">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                </td> -->
            </tr>
            <tr>
            <tr>
                <td>Id Paket</td>
                <td>:</td>
                <td> <select name="nama_paket" required><?php
                for($i=1;$i<=3;$i++){
                    echo"<option value='$i'>$i</option>";
                }
            
                ?></select></td>
            </tr>
            <tr>
                <td>Jenis</td>
                <td>:</td>
                <td>
                    <select name="jenis">
                            <?php
                                include '../koneksi.php';
                                $query = "SELECT * FROM tb_paket_ismi";
                                $exec = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($exec)) {
                                    $jenis = $row["jenis"];
                                    echo "<option value='".$row['id_paket']."'>".$row['jenis']."</option>";
                                }
                            ?>
                        </select>
                </td>
            </tr>
            <tr>
                <td>Nama Paket</td>
                <td>:</td>
                <td>
                    <select name="nama_paket">
                            <?php
                                include '../koneksi.php';
                                $query = "SELECT * FROM tb_paket_ismi";
                                $exec = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($exec)) {
                                    $nama_paket = $row["nama_paket"];
                                    echo "<option value='".$row['id_paket']."'>".$row['nama_paket']."</option>";
                                }
                            ?>
                        </select>
                </td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td>:</td>
                <td><input type="number" name="qty" ></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td><input type="text" name="keterangan"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" name="button" value="Tambah"/>
                </td>
            </tr>
        </table>
    </form>

        <form action="aksi_detail.php" method="post">

        <table>
            <tr style="background-color:#3C2A21; color:#EDDBC7;">

            <th style="text-align:center">No</th>
            <th style="text-align:center">Jenis</th>
            <th style="text-align:center">Harga</th>
            <th style="text-align:center">Quantity</th>
            <th style="text-align:center">Sub total</th>
            <!-- <th style="text-align:center" hidden>Kode Barang</th> -->
    <?php
            $awal=1;$sub=0;$total=0;
            if(@$_POST["jenis"]!=''){
                if(empty($_SESSION["isi"])==TRUE){
                    $_SESSION["isi"]=1;
                }else{
                    $_SESSION["isi"]++;
                }
            
                @$jenis=$_POST['jenis'];
                $tampil=mysqli_fetch_array(mysqli_query($conn, "SELECT jenis, harga from tb_paket_ismi where id_paket='$jenis'"));
                
                @$id_paket=$_POST['id_paket'];
                @$jenis=$_POST['jenis'];
                @$harga=$tampil["harga"];
                @$qty=trim($_POST["qty"]);
                @$sub=$harga*$qty;
                
                $_SESSION["akhir"][$_SESSION["isi"]]=array($jenis,$harga,$qty,$sub);
                $_SESSION["jenis"]=$jenis;
            }

                @$awal=$_SESSION["isi"];
            
                for ($i=0;$i<=$awal;$i++){
                    if(@$_SESSION['akhir'][$i][0]!=''){?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo @$_SESSION['akhir'][$i][0] ?></td>
                        <td><?php echo @$_SESSION['akhir'][$i][1] ?></td>
                        <td><?php echo @$_SESSION['akhir'][$i][2] ?></td>
                        <td><?php echo @$_SESSION['akhir'][$i][3] ?></td>
                        <td hidden><?php echo @$_SESSION['akhir'][$i][4] ?></td>
                    </tr>
                   <?php }
                   $total=@$_SESSION['akhir'][$i][3]+$total;
                   @$_SESSION['total']=$total;
                }?>
                <tr>
                    <tr>
                        <td colspan=4>
                            <?php echo "Grand Bayar";?>
                        </td>
                        <td>
                        <?php echo "Rp. $total";?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=6>
                            <input type='submit' value="Save" name="Simpan"/>
                        </td>
                    </tr>
                </tr>
            </tr>
        </table>
    </form></center>
</div>