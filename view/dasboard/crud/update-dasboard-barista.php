<?php
require "../../../functions.php";
nav("");

$db = dbConnect();

if (isset($_GET["no_pesanan"])) {
    $no_pesanan = $db->escape_string($_GET["no_pesanan"]);
    $status_pesanan = "selesai";
    $ubahPesanan = updatePesanan($no_pesanan, $status_pesanan);
    if (mysqli_query($db, $ubahPesanan)) {
        if ($db ->affected_rows > 0) {
            ?>
            <center>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Well done!</h4>
                    <p>Update selesai</p>
                    <a href="../dasboard_barista.php" class="btn btn-primary">Kembali</a>
                </div>
            </center>
        <?php
        } else {
            echo "No Pesanan tidak ditemukan";
        }
    } else {
        echo  "No Pesanan Tidak ada";
    }
}
