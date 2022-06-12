<?php

include("../../functions.php");

$db = dbConnect();
if ($db->connect_errno == 0) {
    if (isset($_POST['TblLogin'])) {
        $userid = $db->escape_string($_POST["userid"]);
        $password = $db->escape_string($_POST["pass"]);

        $sql = "SELECT id_pegawai,nama,jabatan FROM pegawai
                WHERE id_pegawai = '$userid' and 
                      password = md5('$password')";

        $res = $db->query($sql);
        if ($res->num_rows == 1) {
            $data = $res->fetch_assoc();

            session_start();
            $_SESSION["id_pegawai"] = $data["id_pegawai"];
            $_SESSION["nama"] = $data["nama"];
            $_SESSION["jabatan"] = $data["jabatan"];

            if ($_SESSION["jabatan"] == "pelayan") {
                header("Location: ../dasboard/dasboard_pelayan.php");
            } else if ($_SESSION["jabatan"] == "kasir") {
                header("Location: ../dasboard/dasboard-kasir.php");
            } else if ($_SESSION["jabatan"] == "koki") {
                header("Location: ../dasboard/dasboard_koki.php");
            } else if ($_SESSION["jabatan"] == "owner") {
                header("Location: ../dasboard/dasboard_owner.php");
            }
        } else
            header("Location: ../../index.php?error=1");
    }
} else
    header("Location: ../../index.php?error=3");
