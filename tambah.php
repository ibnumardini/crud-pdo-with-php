<?php
include "config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];

    if (empty($nama)) {
        echo "<div>Nama tidak boleh kosong</div>";
    }
    if (empty($alamat)) {
        echo "<div>Alamat tidak boleh kosong</div>";
    }
    if (!empty($nama && $alamat)) {
        $query = "INSERT INTO santri(nama,alamat) VALUES('$nama','$alamat')";
        $santri = $db->query($query);
        echo $santri->rowCount() . "<div>Data berhasil di tambahkan!</div>";
        if ($santri) {
            header("location:index.php");
        } else {
            echo "Data gagal di tambahkan!";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Santri</title>
</head>

<body>
    <center>
        <h2>Tambah Santri</h2>
        <a href="index.php">Kembali ke beranda</a>
        <br><br>
        <form action="" method="post">
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>Nama :</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Alamat :</td>
                    <td><input type="text" name="alamat"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit">Tambah</button></td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>