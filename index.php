<!DOCTYPE html>
<html lang="en">

<head>
    <title>document</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- <link rel="stylesheet" href="assets/css/demo.css"> -->
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

	<!-- custom css -->
	<link rel="stylesheet" href="assets/css/login.css">

	<!-- Koneksi -->
	<?php

	// koneksi ke database
	include 'admin/konfig.php';
	
	?>
</head>

<body>
    
  <!-- login -->
  <section id="login">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="row">
            <div class="col-sm-3"> </div>

            <div class="col-sm-6">
              <div class="card card-login">
				<div class="header text-center">
						<h2>Sistem Administrasi Penjualan Buku</h2>				  		
						<p class="lead">Silahkan masukkan username dan password</p>
						<hr class="garis">
						
				</div>
                <form class="login-form text-center" action="cek_login.php" method="POST">

				  	
                  
                  <?php if (isset($_GET['pesan'])) : ?>
                    <div class="alert alert-danger font-italic" role="alert">
                      Username / Password Wrong !
                    </div>
                  <?php endif; ?>
                  <div class="form-group">
                    <input type="text" name="username" for="username" class="form-control form-control-lg" autofocus autocomplete="off" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" for="password" class="form-control form-control-lg" placeholder="Password" required>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">
                    Login
				  </button>
				  
				  

				</form>
				
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
