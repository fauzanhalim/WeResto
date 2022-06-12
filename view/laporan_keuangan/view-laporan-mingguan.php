<?php
require('../../functions.php');
session_start();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../../index.php?error=4");
}

nav("Laporan harian");
dbConnect();
$data = getLaporanHarian()->fetch_all(MYSQLI_ASSOC);
?>

<body>
<aside class="sidebar">
        <menu>
            <ul class="menu-content">

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
        </menu>
    </aside>
    <form method="post" action="./crud/tambah-pesanan.php">
        <h1 align="center">Laporan Mingguan</h1>
        <table align="center" class="table-sm">
        <tr>  
        <div class="container-fluid mt-4" align="center">
        <tr>
            
            <tr><td> Day 1</td></tr>
            <td>
            <input type="date" id="tanggal "name="tanggal">
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="inputtotalharga" class="form-control" placeholder="input total">
            </td>
        </tr>
        <tr><td> Day 2</td></tr>
        <tr>
            <td>
            <input type="date" id="tanggal "name="tanggal">
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="inputtotalharga" class="form-control" placeholder="input total">
            </td>
        </tr>
        <tr><td> Day 3</td></tr>
        <tr>
            <td>
            <input type="date" id="tanggal "name="tanggal">
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="inputtotalharga" class="form-control" placeholder="input total">
            </td>
        </tr>
        <tr><td> Day 4</td></tr>
        <tr>
            <td>
            <input type="date" id="tanggal "name="tanggal">
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="inputtotalharga" class="form-control" placeholder="input total">
            </td>
        </tr>
        <tr><td> Day 5</td></tr>
        <tr>
            <td>
            <input type="date" id="tanggal "name="tanggal">
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="inputtotalharga" class="form-control" placeholder="input total">
            </td>
        </tr>
        <tr><td> Day 6</td></tr>
        <tr>
            <td>
            <input type="date" id="tanggal "name="tanggal">
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="inputtotalharga" class="form-control" placeholder="input total">
            </td>
        </tr>
        <tr><td> Day 7</td></tr>
        <tr>
            <td>
            <input type="date" id="tanggal "name="tanggal">
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="inputtotalharga" class="form-control" placeholder="input total">
            </td>
        </tr>
        <td>
            <input type="reset" value="reset" class="btn btn-danger">
            <input type="submit" value="calculate" class="btn btn-success" name="btnSubmit" onclick="Alert">
        </td>
            </tr>
        </table>
        <hr>
        <table align="center" class="table-sm">
        <tr>
                <td>Jumlah Pemesanan</td>
                <td><input type="text" id="total_harga" name="total_harga" class="form-control"></td>
            </tr>
            <td>
            <input type="submit" value="print" class="btn btn-success" name="btnSubmit" onclick="Alert">
            </td>
        </table>

    </form>