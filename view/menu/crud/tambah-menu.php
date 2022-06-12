<?php
require("../../../functions.php");
session_start();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../../index.php?error=4");
}

nav("Tambah Menu");

if (isset($_POST["TblSimpan"])) {
    $db = dbConnect();
    $idMenu = $db->escape_string($_POST['idMenu']);
    $namaMenu = $db->escape_string($_POST['nama']);
    $harga = $db->escape_string($_POST['harga']);
    $stok = $db->escape_string($_POST['stok']);
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    if ($gambar == "") {
        $gambarbaru = "";
    } else
        $gambarbaru = "KopiHub Image" . date(' d-m-y ') . $gambar;

    // path folder gambar
    $path = "../images/" . $gambarbaru;

    $sql = "INSERT INTO menu
            VALUES ('$idMenu','$namaMenu','$harga','$stok','$gambarbaru')";

    $res = $db->query($sql);
    move_uploaded_file($tmp, $path);

    if ($db->affected_rows > 0) {

        echo '<div class="alert alert-success" role="alert" align="center">
                    <h4 class="alert-heading">Well done!</h4>
                    <p>Berhasil Tambah Menu</p>
                    <a href="../view-menu.php" class="btn btn-primary">Kembali</a>
                </div>';
    } else {
        echo '<div class="alert alert-danger" role="alert" align="center">
                <h4 class="alert-heading">Warning!</h4>
                <p>Gagal Tambah Menu, Cek Kembali ID Menu</p>
                <a href="javascript:history.back()" class="btn btn-danger">Kembali</a>
               </div>';
    }
}
