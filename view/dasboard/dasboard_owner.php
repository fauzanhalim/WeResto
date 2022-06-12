<?php
require('../../functions.php');
session_start();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../../index.php?error=4");
}

nav("Owner");

dbConnect();
$data = getPesananBarista()->fetch_all(MYSQLI_ASSOC);
?>

<body>
    <aside class="sidebar">
        <menu>
            <ul class="menu-content">
            <li>
                    <a href="../menu/view-menu.php"><i class="fa fa-cube"></i> <span>Menu</span> </a>
                </li>
                <li><a href="../meja/view-meja.php"><i class="fa fa-shopping-basket"></i>
                        <span>Meja</span></a></li>
                <li><a href="../pelanggan/view-pelanggan.php"><i class="fa fa-shopping-basket"></i>
                        <span>Pelanggan</span></a></li>
                <li><a href="../pegawai/view-pegawai.php"><i class="fa fa-shopping-basket"></i>
                        <span>Pegawai</span></a></li>
                <li>
                <li><a href="../pesanan/view-detail-pesanan.php"><i class="fa fa-shopping-basket"></i> <span>Pesanan</span></a></li>
             <li><a href="../laporan_keuangan/laporan.php"><i class="fa fa-shopping-basket"></i> <span>Laporan</span></a></li>
             <li><a href="../pembayaran/view-pembayaran.php"><i class="fa fa-shopping-basket"></i>
            <span>Pembayaran</span></a></li>
                <li> <a href="../login/logout.php"><i class="fa fa-cube"></i> <span>Log Out</span> </a>
                </li>
            </ul>
        </menu>
    </aside>
    <section class="jumbotron">
        <h1 class="display-4">Owner</h1>
        <hr>
        <div class="row px-4">


        </div>
    </section>
</body>