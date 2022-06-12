<?php
define("DEVELOPMENT", TRUE);
function dbConnect()
{
  $db = new mysqli("localhost", "root", "", "weresto");
  return $db;
}

// Query update Pesanan
function updatePesanan($no_pesanan, $status_pesanan)
{
  return "UPDATE pesanan SET pesanan.status_pesanan= '$status_pesanan' WHERE pesanan.no_pesanan = '$no_pesanan'";
}

// Query Tambah Pesanan
function addPesanan($noMeja, $statusPesanan, $jumlahPesanan, $subTotal)
{
  return "INSERT INTO pesanan(no_meja, status_pesanan, jumlah_pesanan, sub_total) VALUES ('$noMeja', '$statusPesanan', '$jumlahPesanan', '$subTotal')";
}

function getHapusPesanan($no_pesanan)
{
  $db = dbConnect();

  $sql = "DELETE FROM pesanan WHERE no_pesanan = '$no_pesanan'";
  return $delete = $db->query($sql);


  if ($delete) {
    mysqli_close($db);
    header("location: view-lihat-pesanan.php");
    exit;
  } else {
    echo "Penghapusan pesanan gagal";
  }
}

function addMeja($no_meja, $status)
{
  return "INSERT INTO tempat(no_meja, status) VALUES ('$no_meja', '$status')";
}

// Query Lihat Pesanan Khusus Dashboard Barista
function getPesananBarista()
{
  $db = dbConnect();
  $sql = "SELECT * FROM pesanan WHERE status_pesanan='belum'";
  return $db->query($sql);
}

// Query Lihat Pesanan
function getPesanan()
{
  $db = dbConnect();
  $sql = "SELECT * FROM pesanan";
  return $db->query($sql);
}

function getDataPesanan($no_pesanan)
{
  $db = dbConnect();
  $sql = "SELECT * FROM pesanan WHERE no_pesanan = $no_pesanan";
  return $db->query($sql);
}

function getListMeja()
{
  $db = dbConnect();
  if ($db->connect_errno == 0) {
    $res = $db->query("SELECT * FROM tempat ORDER BY no_meja");
    if ($res) {
      $data = $res->fetch_all(MYSQLI_ASSOC);
      $res->free();
      return $data;
    } else
      return FALSE;
  } else
    return FALSE;
}

function getListPelanggan()
{
  $db = dbConnect();
  if ($db->connect_errno == 0) {
    $res = $db->query("SELECT * FROM pelanggan ORDER BY id_pelanggan");
    if ($res) {
      $data = $res->fetch_all(MYSQLI_ASSOC);
      $res->free();
      return $data;
    } else
      return FALSE;
  } else
    return FALSE;
}

// function getMeja()
// {
//   $db = dbConnect();
//   $sql = "SELECT * FROM meja";
//   return $db->query($sql);
// }

function getDataMeja($no_meja)
{
  $db = dbConnect();
  if ($db->connect_errno == 0) {
    $res = $db->query("SELECT * FROM tempat WHERE no_meja='$no_meja'");
    if ($res) {
      if ($res->num_rows > 0) {
        $data = $res->fetch_assoc();
        $res->free();
        return $data;
      } else
      return FALSE;
    } else
    return FALSE;
  } else
  return FALSE;
}

function getDataPelanggan($id_pelanggan)
{
  $db = dbConnect();
  if ($db->connect_errno == 0) {
    $res = $db->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
    if ($res) {
      if ($res->num_rows > 0) {
        $data = $res->fetch_assoc();
        $res->free();
        return $data;
      } else
        return FALSE;
    } else
      return FALSE;
  } else
    return FALSE;
}
function getDataPegawai($id_pegawai)
{
  $db = dbConnect();
  if ($db->connect_errno == 0) {
    $res = $db->query("SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai'");
    if ($res) {
      if ($res->num_rows > 0) {
        $data = $res->fetch_assoc();
        $res->free();
        return $data;
      } else
        return FALSE;
    } else
      return FALSE;
  } else
    return FALSE;
}


function getMenu()
{
  $db = dbConnect();
  $sql = "SELECT * FROM menu";
  return $db->query($sql);
}

function getDataMenu($id_menu)
{
  $db = dbConnect();
  $sql = "SELECT * FROM menu WHERE id_menu = '$id_menu'";
  return $db->query($sql);
}
function getLaporanHarian()
{
  $db = dbConnect();
  $sql = "SELECT id_pembayaran, total_harga, tanggal FROM pembayaran";
  return $db->query($sql);
}

function getTotalHarian()
{
  $db = dbConnect();
  $sql = "SELECT tanggal, SUM(total_harga) FROM pembayaran GROUP BY tanggal";
  return $result = $db->query($sql);
}

function getHapusMenu($id_menu)
{
  $db = dbConnect();

  $sql = "DELETE FROM menu WHERE id_menu = '$id_menu'";
  return $delete = $db->query($sql);


  if ($delete) {
    mysqli_close($db);
    header("location: view-lihat-menu.php");
    exit;
  } else {
    echo "Penghapusan menu gagal";
  }
}

function nav($title)
{
?>
  <!DOCTYPE html>
  <html>

  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style.css">

    <title><?php echo $title ?></title>
  </head>

  <nav class="navbar navbar-dark sticky-top" style="background-color: #0f77df">
    <div class="container-fluid">
      <a class="navbar-brand">WeRestoAPP</a>
      <!-- <h5 style="color: white;">Halo, <?= $_SESSION["nama"]; ?></h5> -->
    </div>
  </nav>
<?php
}

function showError($message)
{
?>
  <div style="background-color:#0f77df; padding:10px; border:1px solid red;" class="mt-3 ml-3 mr-3">
    <?php echo $message ?>
  </div>
<?php
}
?>