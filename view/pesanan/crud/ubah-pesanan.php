<?php
require("../../../functions.php");
session_start();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../../index.php?error=4");
}

nav("Ubah Pesanan");

if (isset($_POST["TblSimpan"])) {
    $db = dbConnect();
    $noPesanan = $db->escape_string($_POST['no_pesanan']);
    $noMeja = $db->escape_string($_POST["noMeja"]);
    $statusPesanan = $db->escape_string($_POST["status_pesanan"]);
    $jumlahPemesanan = $db->escape_string($_POST["jumlah_pemesanan"]);
    $subTotal = $db->escape_string($_POST["sub_total"]);


    $sql = "UPDATE pesanan SET no_pesanan='$noPesanan',no_meja='$noMeja',status_pesanan='$statusPesanan',jumlah_pesanan='$jumlahPemesanan',sub_total='$subTotal' WHERE no_pesanan ='$noPesanan'";

    $res = $db->query($sql);

    if ($db->affected_rows > 0) {

        echo '<div class="alert alert-success" role="alert" align="center">
                    <h4 class="alert-heading">Well done!</h4>
                    <p>Berhasil Ubah Pesanan</p>
                    <a href="../view-lihat-pesanan.php" class="btn btn-primary">Kembali</a>
                </div>';
    } else {
        echo '<div class="alert alert-danger" role="alert" align="center">
                <h4 class="alert-heading">Warning!</h4>
                <p>Gagal Ubah Pesanan</p>
                <a href="javascript:history.back()" class="btn btn-danger">Kembali</a>
               </div>';
    }
}