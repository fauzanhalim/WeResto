<?php
require('../../functions.php');
session_start();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../../index.php?error=4");
}

nav("Lihat Data Pegawai");

dbConnect();
$db = dbConnect();
if ($db->connect_errno == 0) {
    $sql = "SELECT *
    FROM pembayaran";
    $res = $db->query($sql);
    if ($res) {
?>

        <aside class="sidebar">
            <menu>
                <ul class="menu-content">
                    <li><a href="../dasboard/dasboard-kasir.php"><i class="fa fa-shopping-basket"></i>
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
                    <h1 class="display-4">Data Pembayaran</h1>
                </div>
            </div>




            <div class="row">
                <div class="col-sm-6">
                    <div class="card" style="width: 60rem; margin-bottom: 25px">
                        <div class="card-body">
                            <h4 class="rincian-pesanan" align="center">Data Pembayaran</h4>
                            <hr class="bg-dark border-2 ">
                            <div class="card-body">
                                <table class="table" width="100%">
                                    <tr>
                                        <th>ID Pembayaran</th>
										<th>No Pesanan</th>
                                        <th>Tanggal</th>
                                        <th>Total Harga</th>



                                    </tr>
                                    <?php
                                    $data = $res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
                                    foreach ($data as $barisdata) { // telusuri satu per satu
                                    ?>
                                        <tr>
                                            <td><?php echo $barisdata["id_pembayaran"]; ?></td>
											<td><?php echo $barisdata["no_pesanan"]; ?></td>
                                            <td><?php echo $barisdata["tanggal"]; ?></td>
                                            <td><?php echo $barisdata["total_harga"]; ?></td>

                                        </tr>
                                        <tr>
                                            <td colspan="1">
                                                <form method="post" name="frm" action="proses-bayar.php">
                                            <th> Bayar </th>
                                            <td><input type="number" name="bayar"></td>
                                            <input type="hidden" name="ttl" size="20" maxlength="15" value=<?php echo $barisdata["total_harga"]; ?>>
                                        <tr>
                                            <td colspan="2">
                                            <td>
                                                <button type="submit" class=tombol_tambah name="proses">Proses</button>
                                                <input type="reset" name="" id="" value="Reset">
                                            </td>
                                            </td>
                                        </tr>
                                        </form>
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