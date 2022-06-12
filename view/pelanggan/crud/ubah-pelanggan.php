<?php

require('../../../functions.php');
session_start();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../../index.php?error=4");
}

$db = dbConnect();
if (isset($_POST["TblSimpan"])) {
    if ($db->connect_errno == 0) {
        $id_pelanggan = $db->escape_string($_POST["id_pelanggan"]);
        $nama = $db->escape_string($_POST["nama"]);


        $sql = "UPDATE pelanggan SET nama='$nama'
WHERE id_pelanggan='$id_pelanggan'";
        if (mysqli_query($db, $sql)) {
            if ($db->affected_rows > 0) {
                nav("Update pelanggan Berhasil");
?>
                <h4 align="center">Data Successfully Update.<br>
                    <a href="../view-pelanggan.php">
                        <button class="btn btn-success" align="center">View pelanggan</button>
                    </a>
                <?php
            } else {
                nav("Update pelanggan Gagal");
                ?>
                    <h4 align="center">Data Update Failed.<br>
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
