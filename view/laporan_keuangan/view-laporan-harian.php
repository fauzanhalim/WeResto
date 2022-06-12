<?php
require('../../functions.php');
session_start();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../../index.php?error=4");
}

nav("Laporan harian");
dbConnect();
$db = dbConnect();
if ($db->connect_errno == 0) {
?>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan pendapatan harian</title>
    </head>

    <body>
        <!--SIDEBAR-->
        <aside class="sidebar">
            <menu>
                <ul class="menu-content dropdown">
                    <li>
          <a href="../dasboard/dasboard-kasir.php">Home</a>
        </li>
        <li>
          <a href="view-laporan-harian.php"><i class="fa fa-cube"></i> <span>Laporan Harian</span> </a>
        </li>
		<li>
          <a href="view-laporan-mingguan.php"><i class="fa fa-cube"></i> <span>Laporan mingguan</span> </a>
        </li>
        <li><a href="view-laporan-bulanan.php"><i class="fa fa-shopping-basket"></i> <span>laporan bulanan</span></a></li>

        <li>
          <a href="../login/logout.php"><i class="fa fa-cube"></i> <span>Log Out</span> </a>
        </li>
                </ul>
            </menu>
        </aside>
        <!--BODY-->
        <section class="jumbotron">
            <!--    FILTER LAPORAN-->
            <div class="filter-laporan">
                <form method="get">
                    <dd>Silahkan Pilih tanggal untuk memfilter data.</dd>
                    <p>&nbsp;
                        Tanggal : <input type="date" name="tanggal">
                    </p>
                    <div class="btn_cari" style="margin-left: 210px">
                        <button class="btn btn-primary" id="toggleVisibilityButton" name="btn_cari">Cari!</button>
                    </div>
                </form>
                <hr>

                <!--        TAMPILAN LAPORAN-->
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <?php
                        if (isset($_POST['btn_cari'])) {
                            $tanggal = $db->escape_string($_GET['tanggal']);
                            $no = 1;
                            echo "Hasil : " . $tanggal . "<br>";


                        ?>
                        <?php } ?>
                        <div class="tampilan-tabel">
                            <table class="table table-responsive" id="displaytable" style=" width: 100%; visibility: <?= $display ?>">
                                <tr>
                                    <th>ID Pembayaran</th>
                                    <th>Tanggal</th>
                                    <th>Total Harga</th>
                                </tr>
                                <?php
                                if (isset($_GET['btn_cari'])) {
                                    $tanggal = $_GET['tanggal'];
                                    $data = mysqli_query($db, "select * from pembayaran where tanggal like '%" . $tanggal . "%'");
                                } else {
                                    $data = mysqli_query($db, "select * from pembayaran");
                                }
                                $no = 1;
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <td><?php echo $d['id_pembayaran']; ?></td>
                                        <td><?php echo $d['tanggal']; ?></td>
                                        <td><?php echo $d['total_harga']; ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>

                    </div>
                </div>
        </section>
    <?php

} else
    echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
    ?>
    </body>

    </html>