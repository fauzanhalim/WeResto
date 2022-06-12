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
    <?php nav("Tambah pegawai"); ?>
</head>

<body>
    <form method="post" action="./crud/tambah-pegawai.php">
        <h1 align="center">Tambah Meja</h1>
        <table align="center" class="table-sm">

            <tr>
                <td width="25%">ID pegawai</td>
                <td width="25%"><input type="text" id="id_pegawai" name="id_pegawai" class="form-control" required></td>
            </tr>
            <tr>
                <td width="25%">Nama pegawai</td>
                <td width="25%"><input type="text" id="nama" name="nama" class="form-control" required></td>
            </tr>
            <tr>
                <td width="25%">Alamat</td>
                <td width="25%"><input type="text" id="alamat" name="alamat" class="form-control" required></td>
            </tr>
            <tr>
                <td width="25%">Jenis Kelamin</td>
                <td> <input type="radio" id="" name="jk" class="" value="L"> L
                    <input type="radio" id="" name="jk" class="" value="P"> P
                </td>
            </tr>
            <tr>
                <td width="25%">Jabatan</td>
                <td>
                    <select class="form-select" id="jabatan" name="jabatan">
                        <option value="">Pilih Jabatan</option>
                        <option value="pelayan">Pelayan</option>
                        <option value="kasir">Kasir</option>
                        <option value="barista">Barista</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="25%">Password</td>
                <td width="25%"><input type="text" id="password" name="password" class="form-control" required></td>
            </tr>

            <tr>
                <td>
                </td>
                <td>
                    <input type="reset" value="Reset" class="btn btn-danger">
                    <input type="submit" value="Submit" class="btn btn-success" name="btnSubmit" onclick='Alert'>
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