<?php
require('../../functions.php');
 session_start();
 if (!isset($_SESSION["id_pegawai"])) {
     header("Location: ../../index.php?error=4");
 }

nav("Lihat Pesanan");

dbConnect();
$data = getPesanan()->fetch_all(MYSQLI_ASSOC);
?>

<aside class="sidebar">
    <menu>
        <ul class="menu-content">
            <li>
                <a href="../menu/view-lihat-menu.php"><i class="fa fa-cube"></i> <span>Menu</span> </a>
            </li>
            <li><a href="../pesanan/view-lihat-pesanan.php"><i class="fa fa-shopping-basket"></i> <span>Pesanan</span></a></li>
			<li><a href="../dasboard/dasboard_pelayan.php"><i class="fa fa-shopping-basket"></i>
                    <span>Home</span></a></li>
            <li>
                <a href="../login/logout.php"><i class="fa fa-cube"></i> <span>Log Out</span> </a>
            </li>
        </ul>
    </menu>
</aside>

<div class="container">
    <div class="row mt-3">
        <div class="col">
            <h1 class="display-4">Pesanan</h1>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <div class="btn-tambah" style="margin-bottom: 20px">
                
            </div>
        </div>
    </div>

    <div class="row">
        <?php foreach ($data as $barisdata) { ?>
            <div class="col-sm-6">
                <div class="card" style="width: 25rem; margin-bottom: 25px">
                    <div class="card-body">
                        <h4 class="rincian-pesanan" align="center">Detail Pesanan</h4>
                        <hr class="bg-dark border-2 ">
                        <div class="card-body">
                            <table class="table-sm" width="100%">
                                <tr>
                                    <td>
                                        <h5>No Pesanan</h5>
                                    </td>
                                    <td>
                                        <h5 align="right"><?php echo $barisdata["no_pesanan"] ?></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>No Meja</h5>
                                    </td>
                                    <td>
                                        <h5 align="right"> <?php echo $barisdata["no_meja"] ?></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Status Pesanan</h5>
                                    </td>
                                    <td>
                                        <h5 align="right"><?php echo $barisdata["status_pesanan"] ?> </h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Jumlah Pesanan</h5>
                                    </td>
                                    <td>
                                        <h5 align="right"><?php echo $barisdata["jumlah_pesanan"] ?></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Sub Total</h5>
                                    </td>
                                    <td>
                                        <h5 align="right"><?php echo $barisdata["sub_total"] ?></h5>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="btn-ubah" align="right">
                            <a href="view-ubah-pesanan.php?no_pesanan=<?php echo $barisdata["no_pesanan"]; ?>" class="btn btn-primary">Ubah</a>
							<a href="view-hapus-pesanan.php?no_pesanan=<?php echo $barisdata["no_pesanan"]; ?>" class="btn btn-primary">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
</body>

</html>
