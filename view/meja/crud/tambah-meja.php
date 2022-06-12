<?php

require('../../../functions.php');
session_start();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../../index.php?error=4");
}

$db = dbConnect();
if (isset($_POST["btnSubmit"])) {
    if ($db->connect_errno == 0) {
        $no_meja = $db->escape_string($_POST["no_meja"]);
        $status = $db->escape_string($_POST["status"]);


        $sql = addMeja($no_meja, $status);
        if (mysqli_query($db, $sql)) {
            if ($db->affected_rows > 0) {
                nav("Tambah Meja Berhasil");
?>
                <h4 align="center">Data Successfully Added.<br>
                    <a href="../view-meja.php">
                        <button class="btn btn-success" align="center">View Meja</button>
                    </a>
                <?php
            } else {
                nav("Tambah Meja Gagal");
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
