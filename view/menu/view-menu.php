<?php
require('../../functions.php');
 session_start();
 if (!isset($_SESSION["id_pegawai"])) {
     header("Location: ../../index.php?error=4");
 }

nav("Lihat Menu");

dbConnect();
$data = getMenu()->fetch_all(MYSQLI_ASSOC);
?>

<aside class="sidebar">
    <menu>
        <ul class="menu-content">
        <li>
          <a href="../dasboard/dasboard_owner.php">Home</a>
        </li>
            <li>
                <a href="../menu/view-menu.php"><i class="fa fa-cube"></i> <span>Menu</span> </a>
            </li>
            <li><a href="../pesanan/view-status-pesanan.php"><i class="fa fa-shopping-basket"></i>
                    <span>Pesanan</span></a></li>

            <li>
                <a href="../login/logout.php"><i class="fa fa-cube"></i> <span>Log Out</span> </a>
            </li>
        </ul>
    </menu>
</aside>

<body>
    <div class="container">

        <div class="row mt-3">
            <div class="col">
                <h1 class="display-4">Menu</h1>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <div class="btn-tambah">
                    <a href="view-tambah-menu.php" class="btn btn-primary">Tambah</a>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <?php foreach ($data as $row) : ?>
                <div class="col-md-4">
                    <div class="card mb-4" style="width: 16rem;">
                        <?php
                        if ($row["gambar_menu"] == "") {
                            $namagambar = "default.jpg";
                        } else
                            $namagambar = $row["gambar_menu"];
                        ?>
                        <img src="../menu/images/<?php echo $namagambar; ?>" class="card-img-top" width="80" height="250">
                        <div class="card-body">
                            <center>
                                <h5 class="card-title"><?= $row["nama_menu"]; ?></h5>
                                <h5 class="card-title">Rp.<?= $row["harga"]; ?></h5>
                                <a href="view-ubah-menu.php?id_menu=<?php echo $row['id_menu']; ?>" class="btn btn-primary">Ubah</a>
                                <a href="view-hapus-menu.php?id_menu=<?php echo $row['id_menu']; ?>" class="btn btn-primary">Hapus</a>

                            </center>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
