<?php
require('../../functions.php');
session_start();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../../index.php?error=4");
}

nav("Koki");

dbConnect();
$data = getPesananBarista()->fetch_all(MYSQLI_ASSOC);
?>

<body>
    <aside class="sidebar">
        <menu>
            <ul class="menu-content">
                <li>
          <a href="../dasboard/dasboard-owner.php">Home</a>
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
    <section class="jumbotron">
        <h1 class="display-4">Koki</h1>
        <hr>
        <div class="row px-4">


        </div>
    </section>
</body>