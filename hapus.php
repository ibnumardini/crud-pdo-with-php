<?php
include "config/db.php";
$id = $_GET["id"];
$query = "DELETE FROM santri WHERE id_santri ='$id'";
$santri = $db->query($query);
if ($santri) {
    header("location:index.php");
} else {
    echo "Data gagal di hapus!";
}
