<?php
require('../../functions.php');
session_start();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../../index.php?error=4");
}


if (isset($_GET["id_pegawai"])) {
    $db = dbConnect();
    $id_pegawai = $db->escape_string($_GET["id_pegawai"]);
    if ($datapegawai = getDataPegawai($id_pegawai)) {
?>
        <!DOCTYPE html>
        <html>

        <head>
            <?php nav("Ubah Pegawai"); ?>

        </head>

        <body>
            <div class="container-fluid mt-4" align="center">
                <h1>Ubah Data pegawai</h1>
                <form method="post" action="crud/ubah-pegawai.php">

                    <table class="table-sm mt-5">
                        <tr>
                        <tr>
                            <td>ID Pegawai</td>
                            <td>
                                <input type="text" name="id_pegawai" value="<?= $datapegawai["id_pegawai"]; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Pegawai</td>
                            <td>
                                <input type="text" name="nama" value="<?= $datapegawai["nama"]; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat Pegawai</td>
                            <td>
                                <input type="text" name="alamat" value="<?= $datapegawai["alamat"]; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                <input type="radio" name="jk" value="L" <?php if ($datapegawai['jk'] == 'L') echo 'checked' ?>>P
                                <input type="radio" name="jk" value="P" <?php if ($datapegawai['jk'] == 'P') echo 'checked' ?>>L
                            </td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td>
                                <select class="form-select" name="jabatan">
                                    <option value="" hidden><?= $datapegawai["jabatan"] ?></option>
                                    <option value="pelayan">Pelayan</option>
                                    <option value="kasir">Kasir</option>
                                    <option value="barista">Barista</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                        <td>Password</td>
                        <td>
                            <input type="text" name="password" value="<?= $datapegawai["password"]; ?>">
                        </td>
                        </tr>

                        <tr>
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