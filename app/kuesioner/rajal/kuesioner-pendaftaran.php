<?php include "views/header.php"; ?>
<?php
if(isset($_POST['submitpendaftaran'])){
  $bagian     = $_POST['bagian'];
  $skor       = $_POST['skor'];
  $simpan=mysqli_query($koneksi,"INSERT INTO kuesioner(id_kuesioner, nama, kontak, id_dokter, id_petugas, pelayanan, poliklinik, bagian, skor, tanggal, jam)
    VALUES('','$getNama','$getKontak','$null','$null','$getPelayanan','$getJenisPoli','$bagian','$skor','$tanggalsekarang','$jamsekarang')");
  
  if($simpan){
    header("location:kuesioner-poliklinik");
  }
}
?>
<div class="col-lg-12">
  <div align="center" class="row">
    <h3><b>PELAYANAN</b></h3>
    <h1><b>PETUGAS PENDAFTARAN</b></h1><br><br>
    <form method="post" action="" role="form">
      <div class="col-lg-4">
        <div align="center">
         <input class="form-control" type="hidden" name="bagian" value="pendaftaran">
         <input class="form-control" type="hidden" name="skor" value="1">
         <button type="submit" name="submitpendaftaran" class="btn">
          <img src="../images/a.png" class="rounded float-right" width="200px">
        </div>
        <h2>Sangat Puas</h2>
      </div>
    </form>
    <form method="post" action="" role="form">
      <div class="col-lg-4">
        <div align="center">
          <input class="form-control" type="hidden" name="bagian" value="pendaftaran">
          <input class="form-control" type="hidden" name="skor" value="2">
          <button type="submit" name="submitpendaftaran" class="btn">
            <img src="../images/b.png" class="rounded float-right" width="200px">
          </div>
          <h2>Cukup Puas</h2>
        </div>
      </form>
      <form method="post" action="" role="form">
        <div class="col-lg-4">
          <div align="center">
            <input class="form-control" type="hidden" name="bagian" value="pendaftaran">
            <input class="form-control" type="hidden" name="skor" value="3">
            <button type="submit" name="submitpendaftaran" class="btn">
              <img src="../images/d.png" class="rounded float-right" width="200px">
            </div>
            <h2>Tidak Puas</h2>
          </div>
        </form>
      </div>
    </div><br>
    <?php include "views/footer.php"; ?>