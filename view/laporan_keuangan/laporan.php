<?php
require('../../functions.php');
 session_start();
 if (!isset($_SESSION["id_pegawai"])) {
     header("Location: ../../index.php?error=4");
 }

nav("Barista");
?>
<!DOCTYPE html>
<html lang="en">

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
      </ul>
    </menu>
  </aside>
  <section class="jumbotron">
    <h1 class="display-4">Laporan</h1>
    <hr>
    <div class="row px-4">

  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  </div>
  </section>
  </div>

</body>

</html>