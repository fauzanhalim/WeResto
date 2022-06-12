<?php
require('../../functions.php');
// session_start();
// if (!isset($_SESSION["id_pegawai"])) {
//     header("Location: ../../index.php?error=4");
// }

nav("Hapus Pesanan");
dbConnect();
?>

<body>
    <?php
    if (isset($_GET['no_pesanan'])) {
        $no_pesanan = dbConnect()->escape_string($_GET['no_pesanan']);
        $dataPesanan = getDataPesanan($no_pesanan)->fetch_assoc();

        if ($dataHapus = getHapusPesanan($no_pesanan)) {
    ?>
            <center>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Well done!</h4>
                    <p>Penghapusan selesai</p>
                    <a href="view-lihat-pesanan.php" class="btn btn-primary">Kembali</a>
                </div>
            </center>
    <?php
        } else {
            echo "No Pesanan tidak ditemukan";
        }
    } else {
        echo "No Pesana tidak ada";
    }


    ?>
</body>

</html>
