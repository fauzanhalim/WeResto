<?php
require('../../functions.php');
session_start();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../../index.php?error=4");
}

dbConnect();

$id_menu = $_GET['id_menu'];
$data = getDataMenu($id_menu)->fetch_assoc();

nav("Ubah Menu");
?>

<style>
    .gambar {
        max-width: 250px;
        max-height: 250px;
    }
</style>

<!--BODY-->
<body>
    <div class="mt-4" align="center">
        <h1>Ubah Menu</h1>
        <form action="crud/ubah-menu.php" method="post" class="mt-5" runat="server" enctype="multipart/form-data">
            <table class="table-sm">
                <tr>
                    <td width="25%">ID Menu</td>
                    <td width="50%"><input type="text" name="idMenu" class="form-control" readonly value="<?= $data["id_menu"]; ?>"></td>
                </tr>
                <tr>
                    <td>Nama Menu</td>
                    <td><input type="text" name="nama" class="form-control" required value="<?= $data["nama_menu"]; ?>"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" name="harga" class="form-control" required value="<?= $data["harga"]; ?>"></td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="number" name="stok" class="form-control" required value="<?= $data["stok"]; ?>"></td>
                </tr>
                <tr>
                    <td>Gambar</td>
                    <td><input type="file" name="gambar" class="form-control" id="file" value="<?= $data["gambar_menu"]; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="right">
                        <img align="left" class="gambar mb-3" src="images/<?= $data['gambar_menu']; ?>" alt="Pilih Gambar" id="gambar" onError="$(this).hide();">
                        <a href="view-menu.php" class="btn btn-outline-secondary">Batal</a>
                        <input type="submit" name="TblSimpan" value="Simpan" class="btn btn-success">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#gambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#file").change(function() {
        $('#gambar').show();
        readURL(this);
    });
</script>