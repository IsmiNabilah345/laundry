<?php

include '../koneksi.php';

if (isset($_POST['update'])){
    $id= $_POST['id'];
    $id_role= $_POST['id_member'];
    $nama= $_POST['nama'];
    $alamat= $_POST['alamat'];
    $jk= $_POST['jenis_kelamin'];
    $telepon= $_POST['tlp'];

    $result= mysqli_query($conn, "UPDATE tb_member_ismi SET nama= '$nama', alamat= '$alamat', jenis_kelamin= '$jk', tlp= '$telepon' WHERE id_member='$id'");

    header("Location: member.php");
}
?>
<?php

$id= $_GET['id'];

$result= mysqli_query($conn, "SELECT * FROM tb_member_ismi WHERE id=$id");

while ($user_data= mysqli_fetch_array($result)) {
    $id_role= $user_data['id_member'];
    $nama= $user_data['nama'];
    $alamat= $user_data['alamat'];
    $jk= $user_data['jenis_kelamin'];
    $telepon= $user_data['tlp'];}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Data Member</title>
</head>
<body>
    <a href="member.php">Back</a><br></br>

    <form name="update_member" method="post" action="member_edit.php">
        <table border="0">
            <tr>
                <td>Id</td>
                <td><input type="text" name="id_member" value=<?php echo $id_role;?> readonly></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><select name="jenis_kelamin" value=<?php echo $jk;?>>
                <option value="1">L</option>
                <option value="2">P</option>
                </select>
                </td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td><input type="number" name="tlp"  value=<?php echo $telepon;?>></td>
                </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>