<?php include "views/header.php"; ?>
<?php
if(isset($_POST['submitrekomendasi'])){
  $bagian     = $_POST['bagian'];
  $skor       = $_POST['skor'];
  $simpan=mysqli_query($koneksi,"INSERT INTO kuesioner(id_kuesioner, nama, kontak, id_dokter, id_petugas, pelayanan, poliklinik, bagian, skor, tanggal, jam)
    VALUES('','$getNama','$getKontak','$null','$null','$getPelayanan','$getJenisPoli','$bagian','$skor','$tanggalsekarang','$jamsekarang')");
  
  if($simpan){
    session_destroy();
    echo "<script>
    setTimeout(function() {
      swal({
        title: 'Terimakasih',
        text: 'Atas Partisipasi Anda',
        type: 'success',
        showConfirmButton: false,
        timer: 1500
        }, function() {
          window.location = '../index';
          });
          }, 10);
          </script>";
        }
      }
      ?>
      <div class="col-lg-12">
        <div align="center" class="row">
          <div class="col-lg-2"><br>
            <a href="javascript:window.history.go(-1);">
             <img src="../images/kuesioner-previous.png" class="rounded float-right" width="100px">
           </a>
         </div>
         <div class="col-lg-8">
          <h1><b>9. SEBERAPA INGIN MEREKOMENDASIKAN</b></h1>
          <h8><b>RSKIA RACHMI?</b></h8><br><br>
        </div>
        <div class="col-lg-2"><br>
          <a href="#">
           <img src="../images/kuesioner-next.png" class="rounded float-right" width="100px">
         </a>
       </div>
       <form method="post" action="" role="form">
        <div class="col-lg-4">
          <div align="center">
           <input class="form-control" type="hidden" name="bagian" value="rekomendasi">
           <input class="form-control" type="hidden" name="skor" value="4">
           <button type="submit" name="submitrekomendasi" class="btn">
            <img src="../images/a.png" class="rounded float-right" width="400px">
          </div>
          <h2>Sangat Ingin</h2>
        </div>
      </form>
      <form method="post" action="" role="form">
        <div class="col-lg-4">
          <div align="center">
            <input class="form-control" type="hidden" name="bagian" value="rekomendasi">
            <input class="form-control" type="hidden" name="skor" value="5">
            <button type="submit" name="submitrekomendasi" class="btn">
              <img src="../images/b.png" class="rounded float-right" width="400px">
            </div>
            <h2>Cukup Ingin</h2>
          </div>
        </form>
        <form method="post" action="" role="form">
          <div class="col-lg-4">
            <div align="center">
              <input class="form-control" type="hidden" name="bagian" value="rekomendasi">
              <input class="form-control" type="hidden" name="skor" value="6">
              <button type="submit" name="submitrekomendasi" class="btn">
                <img src="../images/d.png" class="rounded float-right" width="400px">
              </div>
              <h2>Tidak Ingin</h2>
            </div>
          </form>
        </div>
      </div><br>
      <?php include "views/footer.php"; ?>