<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SIMETRIS | SDM</title>
  <!-- Login page CSS -->
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/style.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/bootstrap.css">
  <!-- Add custom CSS here -->
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sb-admin.css">
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sweetalert.css">
</head>
<body>
  <?php
  if (isset($_POST['login'])){
    session_start();
    include '../../config/connect.php';
    $nama_user = $_POST['nama_user'];
    $password = md5($_POST['password']);

    $a = mysqli_query($koneksi,"SELECT *
      FROM admin
      WHERE username='$nama_user'
      AND password='$password'
      AND id_unit='34'");
    while($b = mysqli_fetch_array($a)){
      $nama_login   = $b['nama'];
    }

    $cek = mysqli_num_rows($a);
    if($cek > 0){
      $_SESSION['sdm_username'] = $nama_user;
      $_SESSION['sdm_nama_login'] = $nama_login;
      $_SESSION['sdm_status'] = "Admin";
      echo "<script>
      setTimeout(function() {
        swal({
          title: 'Sukses',
          text: 'Selamat Datang $nama_login',
          type: 'success'
          }, function() {
            window.location = 'dashboard.php';
            });
            }, 10);
            </script>";
          }else{
           echo "<script>
           setTimeout(function() {
            swal({
              title: 'Stop',
              text: 'Anda Tidak Memiliki Akses',
              type: 'error'
              }, function() {
                window.location = 'javascript: history.back()';
                });
                }, 10);
                </script>";
              }
            }
            ?>
            <div class="kotak_login">
              <div align="center"><i class="fa fa-user-circle-o fa-3x"></i></div><br>
              <form method="post">
                <!-- <label>Username</label> -->
                <input type="text" name="nama_user" class="form_login" placeholder="Username" required>
                <!-- <label>Password</label> -->
                <input type="password" name="password" class="form_login" placeholder="Password" required>
                <input type="submit" class="tombol_login" name="login" value="Submit">
                <br><br>      
              </form>
              <a href="../../dashboard.php"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <?php include "../../system/copyright.php";?>
            <!-- JavaScript -->
            <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/font-awesome.js"></script>
            <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/jquery-1.10.2.js"></script>
            <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/bootstrap.js"></script>
            <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/sweetalert.min.js"></script>
            <!-- Page Specific Plugins -->
            <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/chartjs/Chart.js"></script>
            <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/morris/chart-data-morris.js"></script>
            <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/tablesorter/jquery.tablesorter.js"></script>
            <script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/tablesorter/tables.js"></script>
          </body>
          </html>