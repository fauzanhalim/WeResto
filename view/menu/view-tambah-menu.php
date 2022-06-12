<?php
require('../../functions.php');
// session_start();
// if (!isset($_SESSION["id_pegawai"])) {
//     header("Location: ../../index.php?error=4");
// }

dbConnect();

nav("Tambah Menu");
?>
<style>
    .gambar {
        max-width: 250px;
        max-height: 250px;
    }
</style>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<body>
    <div class="container-fluid mt-4" align="center">
        <h1>Tambah Menu</h1>
        <form action="crud/tambah-menu.php" method="post" class="mt-5" enctype="multipart/form-data">
            <table class="table-sm">
                <tr>
                    <td width="25%">ID Menu</td>
                    <td width="50%"><input type="text" name="idMenu" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Nama Menu</td>
                    <td><input type="text" name="nama" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" name="harga" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="number" name="stok" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Gambar</td>
                    <td><input type="file" name="gambar" class="form-control" id="file"></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="right">
                        <img align="left" class="gambar mb-3" src="default.jpg" alt="Pilih Gambar" id="gambar" onError="$(this).hide();">
                        <a href="view-menu.php" class="btn btn-secondary">Batal</a>
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