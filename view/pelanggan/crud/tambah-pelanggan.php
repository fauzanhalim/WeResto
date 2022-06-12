<?php

require('../../../functions.php');
session_start();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../../index.php?error=4");
}

$db = dbConnect();
if (isset($_POST["btnSubmit"])) {
    if ($db->connect_errno == 0) {
        $id_pelanggan = $db->escape_string($_POST["id_pelanggan"]);
        $nama = $db->escape_string($_POST["nama"]);


        $sql = "INSERT INTO pelanggan(id_pelanggan,nama)
VALUES('$id_pelanggan','$nama')";
        if (mysqli_query($db, $sql)) {
            if ($db->affected_rows > 0) {
                nav("Tambah Pelanggan Berhasil");
?>
                <h4 align="center">Data Successfully Added.<br>
                    <a href="../view-Pelanggan.php">
                        <button class="btn btn-success" align="center">View Pelanggan</button>
                    </a>
                <?php
            } else {
                nav("Tambah Pelanggan Gagal");
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
