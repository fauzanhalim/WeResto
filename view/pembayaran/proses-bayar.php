<html>
<script src="../dist/sweetalert2.all.min.js"></script>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="style.css">
<?php
session_start();

if (isset($_POST['proses'])) {
    $bayar = $_POST['bayar'];
    $total = $_POST['ttl'];
    $pajak = 0.1;
    $totalq = $total * $pajak;
	$totalx = $total + $totalq;
    $kembalian = $bayar - $totalx;
    $pesan = "Total Pembayaran 
    " . $totalq . "Pembayaran Selesai " . $kembalian;
}
?>
<br>
<script>
    var totalq = <?php echo $totalq ?>;
    var kembalian = <?php echo $kembalian ?>;
    var number_string = kembalian.toString(),
        sisa = number_string.length % 3,
        rupiah = number_string.substr(0, sisa),
        ribuan = number_string.substr(sisa).match(/\d{3}/g);
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    var pesan = "Pembayaran Selesai Kembalian = Rp." + rupiah + ",-";

    function infobayar() {
        /* alert untuk username dan password salah */
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'Informasi',
                text: pesan,
                textColor: '000000',
                confirmButtonText: '<a href="view-pembayaran.php">OK</a>',
                confirmButtonColor: 'pink'

            })
        });
    }
</script>
<?php echo '<script type="text/javascript">', 'infobayar();', '</script>'; ?>
<h4 align="center">Data Successfully Added.<br>
    <a href="../pembayaran/view-pembayaran.php">
        <button class="btn btn-success" align="center">View Pembayaran</button>
    </a>

</html>