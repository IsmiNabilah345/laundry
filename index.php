<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM LOGIN</title>
    <style>
        body {
            background-image: url(laundry.jpg);
            font-family: 'Segoe UI';
        }

        #card {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            backdrop-filter: blur(14px);
            box-shadow: #fffaed;
            height: 450px;
            width: 400px;
            margin-top: 5.5rem;
            margin-left: 7.5rem;
        }

        button {
            width: 200px;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 2px;
            margin-top: 5px;
        }

        button:hover {
            background-color: #fffaed;
            color: black;
        }

        form input {
            Border: none;
            Background: none;
            border-bottom: 2px solid;
            border-radius: 1px;
        }

        /* h1 {
            margin-left: 17.5rem;
            margin-top: 2.6rem;
        } */
    </style>
</head>

<body>

    <br>
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "Login gagal! username dan password salah";
        } elseif ($_GET['pesan'] == "logout") {
            echo "Anda telah berhasil logout";
        } else {
            echo "Anda harus login untuk mengakses halaman admin";
        }
    }
    ?>
    <!-- <h1>Welcome To MinaLaundry</h1> -->
    <div id='card'>
        <center>
            <form method="post" action="ceklogin.php"><br>
                <h2 style="border:1px; padding:10px; display:block; background: rgba(255, 255, 255, 0.2); text-align:center;">Welcome To MinaLaundry</h2><br>
                <!-- <table> -->
                <!-- <tr> -->
                <!-- <td>Username</td>
                        <td>:</td> -->
                <h2>Username</h2>
                <input type="username" name="username"><br>
                <!-- </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td> -->
                <h2>Password</h2>
                <input type="password" name="password"><br><br><br>
                <!-- </tr> -->
                <!-- </table><br> -->
                <button type="submit" style="font-family: cursive; border-radius:3px;">LOGIN</button>
                <br>

            </form>
        </center>
    </div>
</body>

</html>