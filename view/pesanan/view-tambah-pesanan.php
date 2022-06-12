<?php
require('../../functions.php');
session_start();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../../index.php?error=4");
}

?>
<!DOCTYPE html>
<html>

<head>
    <?php nav("Tambah Pesanan"); ?>
</head>

<body>
    <form method="post" action="./crud/tambah-pesanan.php">
        <h1 align="center">Tambah Pesanan</h1>
        <table align="center" class="table-sm">
            <tr>
                <td width="25%">No Meja</td>
                <td width="25%"><input type="text" id="no_meja" name="noMeja" class="form-control" required></td>
            </tr>
            <tr>
                <td width="25%">Status Pesanan</td>
                <td width="25%">
                    <select class="form-select" id="status_pesanan" name="status_pesanan">
                        <option value="">Pilih Kondisi</option>
                        <option value="belum">Belum</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="25%">ID Pelanggan</td>
                <td width="25%">
                    <select name="id_pelanggan" class="form-select">
                        <option>Pilih ID Pelanggan</option>
                        <?php
                        $datajabatan = getListPelanggan(); // ambil data kategori, kemudian susun menjadi combobox
                        foreach ($datajabatan as $data) {
                            echo "<option value=\"" . $data["id_pelanggan"] . "\">" . $data["id_pelanggan"] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>


            <tr>
            <tr>
                <td colspan="2" align="center">Nama Menu</td>
            </tr>
            <?php
            dbConnect();
            $data = getMenu()->fetch_all(MYSQLI_ASSOC);
            foreach ($data as $row) {
            ?>
                <tr>
                    <td><?= $row["nama_menu"]; ?></td>
                    <td>
                        <input type="number" class="qty_sementara" onchange="add()">
                    </td>
                </tr>
                <tr>
                    <td><input type="number" class="subtotal_sementara" id="subtotal_sementara" readonly value="<?= $row["harga"] ?>" hidden></td>
                </tr>
            <?php
            }
            ?>
            </tr>
            <tr>
                <td>Jumlah Pemesanan</td>
                <td><input type="number" id="jumlah_pemesanan" name="jumlah_pemesanan" class="form-control" readonly></td>
            </tr>
            <tr>
                <td>Sub Total</td>
                <td><input type="number" id="subTotal" name="subTotal" class="form-control" readonly></td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <input type="reset" value="Reset" class="btn btn-danger">
                    <input type="submit" value="Submit" class="btn btn-success" name="btnSubmit" onclick="Alert">
                </td>
            </tr>
        </table>
    </form>
</body>
<script>
    function add() {
        total = 0;
        subTotal = 0;
        sum = document.getElementsByClassName("qty_sementara");
        harga = document.getElementsByClassName("subtotal_sementara");
        for (a = 0; a < sum.length; a++) {
            console.log(sum[a].value);
            console.log(harga[a].value);
            total += parseInt(sum[a].value || 0);
            subTotal += parseInt(sum[a].value || 0) * parseInt(harga[a].value || 0);
        }
        document.getElementById("jumlah_pemesanan").value = total;
        document.getElementById("subTotal").value = subTotal;
    }
</script>

</html>