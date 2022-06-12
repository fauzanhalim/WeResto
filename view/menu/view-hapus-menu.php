<?php
require('../../functions.php');
// session_start();
// if (!isset($_SESSION["id_pegawai"])) {
//     header("Location: ../../index.php?error=4");
// }

nav("Hapus Menu");
dbConnect();
?>

<body>
    <?php
    if (isset($_GET['id_menu'])) {
        $id_menu = dbConnect()->escape_string($_GET['id_menu']);
        $dataMenu = getDataMenu($id_menu)->fetch_assoc();

        if ($dataMenu["gambar_menu"] != "") {
            unlink("images/" . $dataMenu["gambar_menu"]);
        }
        if ($dataHapus = getHapusMenu($id_menu)) {
    ?>
            <center>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Well done!</h4>
                    <p>Penghapusan selesai</p>
                    <a href="view-menu.php" class="btn btn-primary">Kembali</a>
                </div>
            </center>
    <?php
        } else {
            echo "Id produk tidak ditemukan";
        }
    } else {
        echo "Id produk tidak ada";
    }


    ?>
</body>

</html>
