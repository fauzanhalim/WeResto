<?php

require('../../../functions.php');
session_start();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../../index.php?error=4");
}

$db = dbConnect();
if (isset($_POST["TblSimpan"])) {
    if ($db->connect_errno == 0) {
        $no_meja = $db->escape_string($_POST["no_meja"]);
        $status = $db->escape_string($_POST["status"]);


        $sql = "UPDATE tempat SET status='$status'
WHERE no_meja='$no_meja'";
        if (mysqli_query($db, $sql)) {
            if ($db->affected_rows > 0) {
                nav("Update Meja Berhasil");
?>
                <h4 align="center">Data Successfully Update.<br>
                    <a href="../view-meja.php">
                        <button class="btn btn-success" align="center">View Meja</button>
                    </a>
                <?php
            } else {
                nav("Update Meja Gagal");
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