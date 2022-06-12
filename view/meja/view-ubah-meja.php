<?php
require('../../functions.php');
session_start();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../../index.php?error=4");
}


if (isset($_GET["no_meja"])) {
    $db = dbConnect();
    $no_meja = $db->escape_string($_GET["no_meja"]);
    if ($datapegawai = getDataMeja($no_meja)) {
?>
        <!DOCTYPE html>
        <html>

        <head>
            <?php nav("Ubah Pesanan"); ?>

        </head>

        <body>
            <div class="container-fluid mt-4" align="center">
                <h1>Ubah Data Meja</h1>
                <form method="post" action="crud/ubah-meja.php">
                    <input type="hidden" name="no_meja" value="<?= $datapegawai["no_meja"]; ?>">
                    <table class="table-sm mt-5">
                        <tr>
                            <td width="20%">No Meja</td>
                            <td width="40%"><input type="text" id="no_meja" name="no_meja" class="form-control" value="<?= $datapegawai["no_meja"]; ?>"></td>
                        </tr>
                        <tr>
                            <td>Status Meja</td>
                            <td>
                                <select class="form-select" name="status">
                                    <option value="" hidden><?= $datapegawai["status"] ?></option>
                                    <option value="tersedia">tersedia</option>
                                    <option value="tidak tersedia">Tidak Tersedia</option>
                                </select>
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