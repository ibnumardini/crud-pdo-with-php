<?php
include "config/db.php";
$id = $_GET["id"];
$query = "SELECT * FROM santri WHERE id_santri='$id'";
$baca = $db->query($query);
$tampil = $baca->fetch(PDO::FETCH_ASSOC);

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
        $query = "UPDATE santri SET nama = '$nama', alamat='$alamat' WHERE id_santri='$id'";
        $santri = $db->query($query);
        if ($santri) {
            header("location:index.php");
        } else {
            echo "Gagal ubah data!";
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
                    <td><input type="text" name="nama" value="<?= $tampil['nama'] ?>"></td>
                </tr>
                <tr>
                    <td>Alamat :</td>
                    <td><input type="text" name="alamat" value="<?= $tampil['alamat'] ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit">Ubah</button></td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>