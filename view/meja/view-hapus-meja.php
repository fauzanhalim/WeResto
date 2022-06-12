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
  
</head>
    <?php
$db = dbConnect();
    if ($db->connect_errno == 0) {

        $no_meja = $db->escape_string($_GET["no_meja"]);


        $sql = "DELETE FROM tempat WHERE no_meja='$no_meja'";
        if (mysqli_query($db, $sql)) {
            if ($db->affected_rows > 0) {
                nav("Hapus Meja Berhasil");
?>
                <h4 align="center">Data Successfully Delete.<br>
                    <a href="view-meja.php">
                        <button class="btn btn-success" align="center">View Meja</button>
                    </a>
                <?php
            } else {
                nav("Tambah Meja Gagal");
                ?>
                    <h4 align="center">Data Delete Failed.<br>
                        <a href="javascript:history.back()">
                            <button class="btn btn-danger">Back</button>
                        </a>
        <?php
            }
        } else {
            "ERROR GAMASUK";
        }
    } else {
    }


?>
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