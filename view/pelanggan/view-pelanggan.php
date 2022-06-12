<?php
require('../../functions.php');
session_start();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../../index.php?error=4");
}

nav("Lihat Pesanan");

dbConnect();
$db = dbConnect();
if ($db->connect_errno == 0) {
    $sql = "SELECT *
    FROM pelanggan";
    $res = $db->query($sql);
    if ($res) {
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
                    <h1 class="display-4">Data Pelanggan</h1>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <div class="btn-tambah">
                        <a href="../pelanggan/view-tambah-pelanggan.php" class="btn btn-primary">Tambah</a>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <div class="btn-tambah" style="margin-bottom: 20px">

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card" style="width: 35rem; margin-bottom: 25px">
                        <div class="card-body">
                            <h4 class="rincian-pesanan" align="center">Data Pelanggan</h4>
                            <hr class="bg-dark border-2 ">
                            <div class="card-body">
                                <table class="table" width="100%">
                                    <tr>
                                        <th>ID Pelanggan</th>
                                        <th>Nama Pelanggan</th>

                                        <th align="center">Aksi</th>
                                    </tr>
                                    <?php
                                    $data = $res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
                                    foreach ($data as $barisdata) { // telusuri satu per satu
                                    ?>
                                        <tr>
                                            <td><?php echo $barisdata["id_pelanggan"]; ?></td>
                                            <td><?php echo $barisdata["nama"]; ?></td>


                                            <td>
                                                <a href="view-ubah-pelanggan.php?id_pelanggan=<?php echo $barisdata["id_pelanggan"]; ?>" class="btn btn-primary">Ubah</a>
                                                <a href="view-hapus-pelanggan.php?id_pelanggan=<?php echo $barisdata["id_pelanggan"]; ?>" class="btn btn-primary" onClick="return confirm('Hapus Data yang Dipilih?')">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
        $res->free();
    } else
        echo "Gagal Eksekusi SQL" . (DEVELOPMENT ? " : " . $db->error : "") . "<br>";
} else
    echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
?>
</body>

</html>