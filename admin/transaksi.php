<!doctype html>
<html lang="en">
<?php
session_start();
include 'konfig.php';
include 'cek.php';

function format_ribuan($nilai)
{
	return number_format($nilai, 0, ',', '.');
}

?>

<head>
	<title>Tables | Klorofil - Free Bootstrap Dashboard Template</title>
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
	<!-- <link rel="stylesheet" href="assets/css/demo.css"> -->
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.php"><img src="../assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
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
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->

		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="index.php" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="buku.php" class=""><i class="lnr lnr-book"></i> <span>Buku</span></a></li>
						<li><a href="transaksi.php" class=""><i class="lnr lnr-cart"></i> <span>Transaksi</span></a></li>
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
					<h3 class="page-title">Transaksi</h3>

					<div class="row">
						<div class="col-md-12">
							<!-- TABEL -->
							<div class="panel">

								<div class="panel-heading">
									<h3 class="panel-title">Silahkan isi data</h3>
								</div>
								<div class="bg-transparent" style="margin:15px;">
									<form class="form-auth-small" method="post">
										<?php
										$query = "SELECT max(no_transaksi) as maxKode FROM head_transaksi";
										$hasil = mysqli_query($koneksi, $query);
										$data = mysqli_fetch_array($hasil);
										$notrans = $data['maxKode'];
										$noUrut = (int) substr($notrans, 3, 3);
										$noUrut++;
										$char = "TRS";
										$noTransaksi = $char . sprintf("%03s", $noUrut);
										?>

										<!-- input -->

										<div class="form-group col-lg-6">
											<label>No Transaski</label>
											<input type="text" class="form-control" name="notransaksi" value="<?php echo $noTransaksi; ?>" readonly>
										</div>
										<div class="form-group col-lg-6">
											<label>Tanggal</label>
											<input type="text" class="form-control" name="tanggal" value="<?php echo date("Y-m-d"); ?>" readonly>
										</div>

										<div class="form-group col-lg-6">
											<label>Judul Buku</label>
											<select class="form-control" name="id_buku" onchange="changeValue(this.value)">
												<?php
												//Perintah sql untuk menampilkan semua data pada tabel jdul
												$queryJudul = "select * from buku ORDER BY judul asc";

												$hasilJudul = mysqli_query($koneksi, $queryJudul);
												$jsArray = "var dataBuku = new Array();\n";
												$nomorJudul = 0;
												while ($data = mysqli_fetch_array($hasilJudul)) {
													$nomorJudul++;
													$jsArray .= "dataBuku['" . $data['ID'] . "'] = {pengarang:'" . addslashes($data['pengarang']) . "',penerbit:'" . addslashes($data['penerbit']) . "',harga:'" . addslashes($data['harga']) . "',ID:'" . addslashes($data['ID']) . "'};\n";
												?>
													<option value="<?php echo $data['ID']; ?>"><?php echo $data['judul']; ?></option>
												<?php
												}
												?>
											</select>
										</div>
										<script type="text/javascript">
											<?php echo $jsArray; ?>

											function changeValue(ID) {
												document.getElementById('pengarang').value = dataBuku[ID].pengarang;
												document.getElementById('penerbit').value = dataBuku[ID].penerbit;
												document.getElementById('harga').value = dataBuku[ID].harga;
											};
										</script>
										<div class="form-group col-lg-6">
											<label>Pengarang</label>
											<input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Pengarang" readonly>
										</div>
										<div class="form-group col-lg-6">
											<label>Penerbit</label>
											<input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit" readonly>
										</div>
										<div class="form-group col-lg-6">
											<label>Harga</label>
											<input type="text" id="harga" class="form-control" name="harga" onkeyup="sum();" placeholder="harga" readonly>
										</div>

										
										<div class="form-group col-lg-6">
											<label>QTY</label>
											<input type="text" id="qty" class="form-control" name="qty" placeholder="0" onkeyup="sum();">
										</div>

										<script>
											function sum() {
												var dataQty = document.getElementById('qty').value;
												var dataHarga = document.getElementById('harga').value;
												var result = parseInt(dataQty) * parseInt(dataHarga);
												if (!isNaN(result)) {
													document.getElementById('subtotal').value = result;
												} else {
													document.getElementById('subtotal').value = "";
												}
												
											}
										</script>

										<div class="form-group col-lg-6">
											<label>Sub-total</label>
											<input type="text" class="form-control" id="subtotal" name="subtotal" placeholder="subtotal" readonly>
										</div>
												
										<!-- akhir Inputan -->

										<div class="form-group col-lg-12">
											<button id="tambah" type="submit" class="btn btn-dark btn-lg">Tambah</button>
										</div>

										<div class="panel">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>Judul Buku</th>
														<th>QTY</th>
														<th>Subtotal</th>
														<th style="width: 70px; text-align:center;">Aksi</th>
													</tr>
												</thead>
												<?php
												$queryData = "SELECT detail_transaksi.ID_buku as id, buku.judul as dataBuku, detail_transaksi.jumlah_beli as dataQty, detail_transaksi.subtotal as dataSubtotal from detail_transaksi INNER JOIN buku on detail_transaksi.ID_buku = buku.ID WHERE no_transaksi='$noTransaksi' ";
												$resultData = mysqli_query($koneksi, $queryData);
												while ($barisTabel = mysqli_fetch_array($resultData)) { 
													
												?>

													<tbody>
														<tr>
															<td><?php echo $barisTabel['dataBuku']; ?></td>
															<td><?php echo $barisTabel['dataQty']; ?></td>
															<td><?php echo $barisTabel['dataSubtotal']; ?></td>
															<td style="width: 70px; text-align:center;">
																<a id="hps" class="btn btn-danger" href="proses_hapus_beli.php?id=<?php echo $barisTabel['id']; ?>" 
																onclick="return confirm('Anda yakin membatalkan pembelian <?php echo $barisTabel['id']; ?>?')">Batal</a>
															</td>
														</tr>
														</tbody>
												<?php } ?>
												
											</table>
										</div>
										<div class="row" style="margin:15px;">

											<div class="form-group col-lg-8 col-md-8">
												<button id="simpan" type="submit" class="btn btn-primary btn-lg btn-block">Simpan</button>
											</div>
											<!-- <div class="form-group col-lg-4 col-md-4 text-center">
												<div class="form-group">
													<input class="form-control" type="text" name="total" placeholder="total" readonly>

												</div> -->
											</div>
										</div>
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
				<p class="copyright">Theme by <i class="fa fa-love"></i><a href="https://bootstrapthemes.co">BootstrapThemes</a>
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
	<script type="text/javascript">
		$(document).ready(function() {
			$("#tambah").click(function() {
				var data = $('.form-auth-small').serialize();
				$.ajax({
					type: 'POST',
					url: "proses_simpan_beli.php",
					data: data,
					success: function() {;
					}
				});
			});
			$("#simpan").click(function() {
				var data = $('.form-auth-small').serialize();
				$.ajax({
					type: 'POST',
					url: "proses_simpan_data.php",
					data: data,
					success: function() {
						// $('.dataBeli').load("tampil_data.php");
					}
				});
			});
		});
	</script>
</body>

</html>