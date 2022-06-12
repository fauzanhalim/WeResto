<?php
require('../../functions.php');
session_start();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../../index.php?error=4");
}


if (isset($_GET["id_pelanggan"])) {
    $db = dbConnect();
    $id_pelanggan = $db->escape_string($_GET["id_pelanggan"]);
    if ($datapegawai = getDataPelanggan($id_pelanggan)) {
?>
        <!DOCTYPE html>
        <html>

        <head>
            <?php nav("Ubah Pelanggan"); ?>

        </head>

        <body>
            <div class="container-fluid mt-4" align="center">
                <h1>Ubah Data Pelanggan</h1>
                <form method="post" action="crud/ubah-pelanggan.php">
                    <input type="hidden" name="id_pelanggan" value="<?= $datapegawai["id_pelanggan"]; ?>">
                    <table class="table-sm mt-5">
                        <tr>
                            <td>Nama Pelanggan</td>
                            <td>
                                <input type="text" name="nama" value="<?= $datapegawai["nama"]; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <input type="reset" value="Reset" class="btn btn-danger">
                                <input type="submit" value="Submit" class="btn btn-success" name="TblSimpan">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        <?php
    } else
        echo "menu dengan Id : $id_menu tidak ada. Pengeditan dibatalkan";
        ?>
    <?php
} else
    echo "ID menu tidak ada. Pengeditan dibatalkan.";
    ?>
        </body>

        </html>