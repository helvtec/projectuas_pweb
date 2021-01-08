<?php

session_start();
// memanggil file koneksi.php untuk membuat koneksi
include 'konfig.php';
include 'cek.php';

// mengecek apakah di url ada nilai GET id
if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM buku WHERE ID='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Error: ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');
          window.location='buku.php';</script>";
       }
} else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');
    window.location='buku.php';</script>";
}         
?>

<!doctype html>
<html lang="en">


<head>
    <title>Admin | Sistem Administrasi Penjualan Buku</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../assets/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon.png">
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="index.html"><img src="../assets/img/sunbook-logo.png" alt="Logo" class="img-responsive logo"></a>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>

                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo $_SESSION['nama']  ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
                                <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
                                <li><a href="logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                        <!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li><a href="index.html" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="buku.php" class=""><i class="lnr lnr-file-empty"></i> <span>Buku</span></a></li>
                        <li><a href="transaksi.php" class=""><i class="lnr lnr-file-empty"></i> <span>Transaksi</span></a></li>
                        <li><a href="logout.php" class=""><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <h3 class="page-title">Edit Buku</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- TABLE HOVER -->
                            <div class="panel">
                                <!-- cek login -->

                                <div class="panel-heading">
                                    <h3 class="panel-title">Edit data <?php echo $data['judul']; ?></h3>
                                </div>
                                <div class="panel-body">
                                    <form class="form-auth-small" action="proses_ubah.php" method="post" enctype="multipart/form-data">
                                        <input name="id" value="<?php echo $data['ID']; ?>"  hidden />
                                        <div class="form-group">
                                            <label for="Judul" class="control-label sr-only">Penerbit</label>
                                            <input type="text" id="Judul" class="form-control" name="judul" placeholder="Judul" value="<?php echo $data['judul']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="penerbit" class="control-label sr-only">Penerbit</label>
                                            <input type="text" id="penerbit" class="form-control" name="penerbit" placeholder="Penerbit" value="<?php echo $data['penerbit']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="pengarang" class="control-label sr-only">Pengarang</label>
                                            <input type="text" id="pengarang" class="form-control" name="pengarang" placeholder="Pengarang" value="<?php echo $data['pengarang']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="tahun" class="control-label sr-only">Tahun</label>
                                            <input type="text" id="tahun" class="form-control" name="tahun" placeholder="Tahun" value="<?php echo $data['tahun_terbit']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="harga" class="control-label sr-only">Harga</label>
                                            <input type="text" id="harga" class="form-control" name="harga" placeholder="Harga" value="<?php echo $data['harga']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="stok" class="control-label sr-only">Stok</label>
                                            <input type="text" id="stok" class="form-control" name="stok" placeholder="Stok" value="<?php echo $data['stok']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Gambar Produk</label>
                                            <img src="../gambar/<?php echo $data['gambar']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          
                                            <input type="file" name="gambar_produk" /><br>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Ubah</button>
                                    </form>
                                </div>
                            </div>
                            <!-- END TABLE HOVER -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
        <div class="clearfix"></div>
        <footer>
            <div class="container-fluid">
                <p class="copyright">Shared by <i class="fa fa-love"></i><a href="https://bootstrapthemes.co">BootstrapThemes</a>
                </p>
            </div>
        </footer>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../assets/scripts/klorofil-common.js"></script>
    
</body>
</html>