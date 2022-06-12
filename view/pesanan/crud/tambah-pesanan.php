<?php

require('../../../functions.php');
session_start();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../../index.php?error=4");
}

$db = dbConnect();
if (isset($_POST["btnSubmit"])) {
    if ($db->connect_errno == 0) {
        $noMeja = $db->escape_string($_POST["noMeja"]);
        $statusPesanan = $db->escape_string($_POST["status_pesanan"]);
        $jumlahPemesanan = $db->escape_string($_POST["jumlah_pemesanan"]);
        $subTotal = $db->escape_string($_POST["subTotal"]);


        $sql = addPesanan($noMeja, $statusPesanan, $jumlahPemesanan, $subTotal);
        if (mysqli_query($db, $sql)) {
            if ($db->affected_rows > 0) {
                nav("Tambah Pesanan Berhasil");
?>
                <h4 align="center">Data Successfully Added.<br>
                    <a href="../view-lihat-pesanan.php">
                        <button class="btn btn-success" align="center">View Pesanan</button>
                    </a>
                <?php
            } else {
                nav("Tambah Pesanan Gagal");
                ?>
                    <h4 align="center">Data Added Failed.<br>
                        <a href="javascript:history.back()">
                            <button class="btn btn-danger">Back</button>
                        </a>
        <?php
            }
        } else {
            "ERROR GAMASUK";
        }
    } else {
    }
}
