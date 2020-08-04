<?php error_reporting(0); ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMETRIS | RSKIA Rachmi Yogyakarta</title>
  <meta name="description" content="Sistem Informasi Rumah Sakit RSKIA Rachmi Yogyakarta - Pendaftaran Online">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="images/favicon.ico">
  <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://use.fontawesome.com/40a517b96a.js"></script>
  <link rel="stylesheet" type="text/css" href="vendors/sweetalert/sweetalert.css">
  <style>
    .blacktext {
      color: #272727;
  }
  .bluetext {
      color: #008cba;
  }
  .redtext {
      color: #e71414;
  }
  .navbar-rachmi{
      background-color:#e67e22;
      border-color:#d35400
  }
  .navbar-brand{
      color:#ffffff;
  }
  /* Center the loader */
  #loader {
      position: absolute;
      left: 50%;
      top: 50%;
      z-index: 1;
      width: 150px;
      height: 150px;
      margin: -75px 0 0 -75px;
      border: 16px solid #dbdbdb;
      border-radius: 50%;
      border-top: 16px solid #ffffff;
      width: 120px;
      height: 120px;
      -webkit-animation: spin 0.5s linear infinite;
      animation: spin 0.5s linear infinite;
  }

  @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
  }
  @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
  }

  /* Add animation to "page content" */
  .animate-bottom {
      position: relative;
      -webkit-animation-name: animatebottom;
      -webkit-animation-duration: 5s;
      animation-name: animatebottom;
      animation-duration: 5s
  }
  @-webkit-keyframes animatebottom {
      from { bottom:-100px; opacity:0 }
      to { bottom:0px; opacity:1 }
  }
  @keyframes animatebottom {
      from{ bottom:-100px; opacity:0 }
      to{ bottom:0; opacity:1 }
  }
  #myDiv {
      display: none;
  }
  .gallery
  {
      display: inline-block;
      margin-top: 20px;
  }
  .nav-bottom {
      position: fixed;
      bottom: 0;
      width: 100%;
      height: 55px;
      box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
      background-color: #ffffff;
      display: flex;
      overflow-x: auto;
  }
  .nav-bottom__link {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      flex-grow: 1;
      min-width: 50px;
      overflow: hidden;
      white-space: nowrap;
      font-family: sans-serif;
      font-size: 13px;
      color: #000000;
      text-decoration: none;
      -webkit-tap-highlight-color: transparent;
      transition: background-color 0.1s ease-in-out;
  }
  .nav-bottom__link:hover {
      background-color: #e0dede;
  }
  .nav-bottom__link--active {
      color: #fb7813;
  }
  .nav-bottom__icon {
      font-size: 18px;
  }
</style>
</head>
<body onload="myFunction()" style="margin:0;">
  <div id="loader"></div>
  <div style="display:none;" id="myDiv" class="animate-bottom"></div>
  <div id="right-panel" class="right-panel">
    <header id="header" class="header navbar-fixed-top">
      <div class="header-menu">
        <div class="col-sm-12">
          <div class="user-area float-left">
            <a href="https://www.pendaftaran.rskiarachmi.co.id">
              <img src="images/logo.jpg" alt="Rachmi Online">
          </a>
      </div>
  </div>
</div>
</header><br><br><br><br>
<?php include 'controller/connection.php';
include 'controller/date-format.php'; ?>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <div class="form-group text-center">
                                    <img src="images/logo-rachmi-akreditasi-kars.png" alt="Rachmi Online">
                                </div>
                                <div class="card-title">
                                    <h4 class="text-center">Skrining COVID-19</h4>
                                </div>
                                <hr>
                                <?php
                                if(isset($_POST['diagnosa'])){
                                    $A1 = $_POST['a1'];
                                    $A2 = $_POST['a2'];
                                    $A3 = $_POST['a3'];
                                    $B1 = $_POST['b1'];
                                    $C1 = $_POST['c1'];
                                    $C2 = $_POST['c2'];
                                    $C3 = $_POST['c3'];

                                    if($A1==1 && $A2==1 && $A3==1 && $B1==1 && $C1==1 ||
                                      $A1==1 && $A2==1 && $A3==1 && $B1==1 && $C2==1 ||
                                      $A1==1 && $A2==1 && $B1==1 && $C1==1 ||
                                      $A1==1 && $A2==1 && $B1==1 && $C2==1 ||
                                      $A1==1 && $A2==1 && $A3==1 && $C3==1 ||
                                      $A1==1 && $A2==1 && $A3==1 && $B1==1 ||
                                      $A1==1 && $A2==1 && $C3==1 ||
                                      $A1==1 && $C3==1 ||
                                      $A2==1 && $C3==1){
                                      echo "<script>
                                      setTimeout(function() {
                                        swal({
                                          title: 'P.D.P',
                                          text: 'Curiga Pasien Dalam Pengawasan',
                                          type: 'error'
                                          }, function() {
                                            window.location = 'covid-skrining';
                                            });
                                            }, 10);
                                            </script>";
                                        }elseif($A1==1 && $B1==1 && $C1==1 ||
                                            $A2==1 && $B1==1 && $C1==1 ||
                                            $A1==1 && $B1==1 && $C2==1 ||
                                            $A2==1 && $B1==1 && $C2==1){
                                            echo "<script>
                                            setTimeout(function() {
                                              swal({
                                                title: 'O.D.P',
                                                text: 'Curiga Orang Dalam Pengawasan',
                                                type: 'warning'
                                                }, function() {
                                                  window.location = 'covid-skrining';
                                                  });
                                                  }, 10);
                                                  </script>";
                                              }elseif($C1==1 && $C2==1 && $C3==1){
                                                  echo "<script>
                                                  setTimeout(function() {
                                                    swal({
                                                      title: 'O.T.G',
                                                      text: 'Curiga Orang Tanpa Gejala',
                                                      type: 'warning'
                                                      }, function() {
                                                        window.location = 'covid-skrining';
                                                        });
                                                        }, 10);
                                                        </script>";
                                                    }else{
                                                        echo "<script>
                                                        setTimeout(function() {
                                                          swal({
                                                            title: 'Sehat',
                                                            text: 'Pasien Aman',
                                                            type: 'success'
                                                            }, function() {
                                                                window.location = 'registration';
                                                                });
                                                                }, 10);
                                                                </script>";
                                                            }
                                                        }
                                                        ?>
                                                        <form method="post" action="" role="form">
                                                            <p class="bluetext"><b>A. Gejala</b></p>
                                                            <ol>
                                                              <div class="form-group">
                                                                <label><li></li></label> Apakah pasien (termasuk pendamping) merasa demam >38&deg;C / riwayat demam <14 hari?
                                                                <select class="form-control" type="text" name="a1">
                                                                  <option disabled selected>Pilih</option>
                                                                  <option value='1'>Ya</option>
                                                                  <option value='0'>Tidak</option>"
                                                              </select>
                                                          </div>
                                                          <div class="form-group">
                                                            <label><li></li></label> Apakah pasien (termasuk pendamping) merasa batuk / pilek / sakit tenggorokan / sesak nafas <14 hari?
                                                            <select class="form-control" type="text" name="a2">
                                                              <option disabled selected>Pilih</option>
                                                              <option value='1'>Ya</option>
                                                              <option value='0'>Tidak</option>"
                                                          </select>
                                                      </div>
                                                      <div class="form-group">
                                                        <label><li></li></label> Apakah pasien (termasuk pendamping) merasakan nafas cepat / terasa berat <14 hari?<br>
                                                          <select class="form-control" type="text" name="a3">
                                                            <option disabled selected>Pilih</option>
                                                            <option value='1'>Ya</option>
                                                            <option value='0'>Tidak</option>"
                                                        </select>
                                                    </div>
                                                </ol><br>
                                                <p class="bluetext"><b>B. Penyebab (Evaluasi DPJP)</b></p>
                                                <ol>
                                                    <div class="form-group">
                                                      <label><li></li></label> Tidak ada penyebab lain berdasarkan gambaran klinis yang meyakinkan
                                                      <select class="form-control" type="text" name="b1">
                                                        <option value='1' selected >Ya (Otomatis)</option>
                                                    </select>
                                                </div>
                                            </ol><br>
                                            <p class="bluetext"><b>C. Faktor Risiko</b></p>
                                            <ol>
                                                <div class="form-group">
                                                  <label><li></li></label> Apakah pasien (termasuk pendamping) memiliki riwayat perjalanan / tinggal di luar negeri dalam waktu 14 hari sebelum timbul gejala?
                                                  <select class="form-control" type="text" name="c1">
                                                    <option disabled selected>Pilih</option>
                                                    <option value='1'>Ya</option>
                                                    <option value='0'>Tidak</option>"
                                                </select>
                                            </div>
                                            <div class="form-group">
                                              <label><li></li></label> Apakah pasien (termasuk pendamping) memiliki riwayat bepergian dari area transmisi lokal di Indonesia / dari luar kota Yogyakarta / Indogrosir Yogyakarta, dalam waktu 14 hari sebelum timbul gejala?
                                              <select class="form-control" type="text" name="c2">
                                                <option disabled selected>Pilih</option>
                                                <option value='1'>Ya</option>
                                                <option value='0'>Tidak</option>"
                                            </select>
                                        </div>
                                        <div class="form-group">
                                          <label><li></li></label> Apakah pasien (termasuk pendamping) memiliki riwayat kontak erat dengan pasien yang diduga maupun yang positif COVID-19?<br>
                                          <select class="form-control" type="text" name="c3">
                                            <option disabled selected>Pilih</option>
                                            <option value='1'>Ya</option>
                                            <option value='0'>Tidak</option>"
                                        </select>
                                    </div><br>
                                    <div>
                                        <button id="diagnosa" name="diagnosa" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="search-schedule-amount">Diagnosis</span>
                                            <span id="search-schedule-sending" style="display:none;">Sending…</span>
                                        </button>
                                    </div>
                                </ol>
                            </form><br>
                        </div>
                    </div>
                </div><!-- .card -->
            </div><!--/.col-->
        </div><!--/.row-->
    </div>
</div>
<nav class="nav-bottom">
  <a href="help" class="nav-bottom__link">
    <i class="material-icons nav-bottom__icon">help_outline</i>
    <span class="nav-bottom__text">Help</span>
</a>
<a href="https://pendaftaran.rskiarachmi.co.id/" class="nav-bottom__link nav-bottom__link--active">
    <i class="material-icons nav__icon">dashboard</i>
    <span class="nav-bottom__text">Home</span>
</a>
<a href="https://pendaftaran.rskiarachmi.co.id/" class="nav-bottom__link">
    <i class="material-icons nav-bottom__icon">arrow_back</i>
    <span class="nav-bottom__text">Back</span>
</a>
</nav>
<!--
  Name        : SIMETRIS
  Description : Sistem Informasi Rumah Sakit.
  Date        : 2019
  Developer   : Ardi Tri Heru
  Phone/WA    : 0896-2967-1717
  Email       : arditriheruh@gmail.com
  Website     : https://www.arditriheru.com
-->
<div align="center"><small>&#169;<script type='text/javascript'>var creditsyear = new Date();document.write(creditsyear.getFullYear());</script><a expr:href='data:blog.homepageUrl'><data:blog.title/></a> <a class="blacktext" href="https://instagram.com/arditriheru">IT RSKIA Rachmi</a><br>v1.0.Beta</p></small></div><br><br>
</div><!-- Right Panel -->
<!-- footer -->
<script>
      // Loading Page
      var myVar;
      function myFunction() {
        myVar = setTimeout(showPage, 500);
    }
    function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("myDiv").style.display = "block";
    }
    $(document).ready(function(){
        $(".fancybox").fancybox({
          openEffect: "none",
          closeEffect: "none"
      });
    });

</script>
<script src="vendors/sweetalert/sweetalert.min.js"></script>
<script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/dashboard.js"></script>
</body>
</html>