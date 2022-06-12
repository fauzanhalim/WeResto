<?php

require('../../../functions.php');
session_start();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../../index.php?error=4");
}

$db = dbConnect();
if (isset($_POST["btnSubmit"])) {
    if ($db->connect_errno == 0) {
        $id_pegawai = $db->escape_string($_POST["id_pegawai"]);
        $nama = $db->escape_string($_POST["nama"]);
        $alamat = $db->escape_string($_POST["alamat"]);
        $jk = $db->escape_string($_POST["jk"]);
        $jabatan = $db->escape_string($_POST["jabatan"]);
        $password = $db->escape_string($_POST["password"]);


        $sql = "INSERT INTO pegawai(id_pegawai,nama,alamat,jk,jabatan,password)
VALUES('$id_pegawai','$nama','$alamat','$jk','$jabatan',md5('$password'))";
        if (mysqli_query($db, $sql)) {
            if ($db->affected_rows > 0) {
                nav("Tambah pegawai Berhasil");
?>
                <h4 align="center">Data Successfully Added.<br>
                    <a href="../view-pegawai.php">
                        <button class="btn btn-success" align="center">View Pegawai</button>
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
