<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Santri Qodr - PDO</title>
</head>

<body>
    <center>
        <h1>Santri Qodr : PDO</h1>
        <a href="tambah.php">Tambah santri</a>
        </br></br>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Action</th>
            </tr>
            <?php
            include "config/db.php";
            $query = "SELECT * FROM santri ORDER BY id_santri DESC";
            $data = $db->query($query);
            $i = 1;
            while ($santri = $data->fetch(PDO::FETCH_ASSOC)) :
                ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $santri["nama"]; ?></td>
                    <td><?= $santri["alamat"]; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $santri["id_santri"]; ?>">Ubah</a> |
                        <a onclick="return confirm(' Yakin? ')" href="hapus.php?id=<?= $santri["id_santri"]; ?>">Hapus</a>
                    </td>
                </tr>
                <?php $i++;
            endwhile; ?>
        </table>
    </center>
</body>

</html>