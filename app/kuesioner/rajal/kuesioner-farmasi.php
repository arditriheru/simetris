<?php include "views/header.php"; ?>
<?php
if(isset($_POST['submitfarmasi'])){
  $bagian     = $_POST['bagian'];
  $skor       = $_POST['skor'];
  $simpan=mysqli_query($koneksi,"INSERT INTO kuesioner(id_kuesioner, nama, kontak, id_dokter, id_petugas, pelayanan, poliklinik, bagian, skor, tanggal, jam)
    VALUES('','$getNama','$getKontak','$null','$null','$getPelayanan','$getJenisPoli','$bagian','$skor','$tanggalsekarang','$jamsekarang')");
  
  if($simpan){
    header("location:kuesioner-kasir");
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
    <h7><b>7. PELAYANAN</b></h7><br>
     <h8><b>PETUGAS FARMASI</b></h8><br><br>
   </div>
   <div class="col-lg-2"><br>
    <a href="kuesioner-kasir">
     <img src="../images/kuesioner-next.png" class="rounded float-right" width="100px">
   </a>
 </div>
 <form method="post" action="" role="form">
  <div class="col-lg-4">
    <div align="center">
     <input class="form-control" type="hidden" name="bagian" value="farmasi">
     <input class="form-control" type="hidden" name="skor" value="1">
     <button type="submit" name="submitfarmasi" class="btn">
      <img src="../images/a.png" class="rounded float-right" width="400px">
    </div>
    <h2>Sangat Puas</h2>
  </div>
</form>
<form method="post" action="" role="form">
  <div class="col-lg-4">
    <div align="center">
      <input class="form-control" type="hidden" name="bagian" value="farmasi">
      <input class="form-control" type="hidden" name="skor" value="2">
      <button type="submit" name="submitfarmasi" class="btn">
        <img src="../images/b.png" class="rounded float-right" width="400px">
      </div>
      <h2>Cukup Puas</h2>
    </div>
  </form>
  <form method="post" action="" role="form">
    <div class="col-lg-4">
      <div align="center">
        <input class="form-control" type="hidden" name="bagian" value="farmasi">
        <input class="form-control" type="hidden" name="skor" value="3">
        <button type="submit" name="submitfarmasi" class="btn">
          <img src="../images/d.png" class="rounded float-right" width="400px">
        </div>
        <h2>Tidak Puas</h2>
      </div>
    </form>
  </div>
</div><br>
<?php include "views/footer.php"; ?>