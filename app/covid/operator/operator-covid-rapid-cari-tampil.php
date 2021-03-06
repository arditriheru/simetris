<?php
include "operator-session-start.php";
include "../views/header.php";
?>
<nav>
  <div id="wrapper">
    <?php include "operator-menu.php"; ?>   
  </div><!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <?php $id_catatan_medik = $_POST['id_catatan_medik']; ?>
      <h1>Pencarian <small>"<?php echo $id_catatan_medik; ?>"</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="booking-tambah"><i class="fa fa-plus"></i> Tambah</a></li>
        <li class="active"><i class="fa fa-list"></i> List</li>
      </ol>
      <?php include "../../../system/welcome.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <div class="row">
          <form method="post" action="operator-covid-rapid-cari-tampil" role="form">
            <div class="col-lg-4">
              <div class="form-group input-group">
                <input type="text" class="form-control" name="id_catatan_medik" value="<?php echo $id_catatan_medik; ?>">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                </span>
              </div>
            </div>
          </form>
          <div class="col-lg-8">
            <button name="next" type="submit" 
            class="btn btn-primary" onClick="window.location.reload()">Refresh</button>
          </div>
          <div align="right" class="col-lg-12">
            <?php
            $m = 31;
            $n = 7;
            $nextN = mktime(0, 0, 0, date("m"), date("d") + $m, date("Y"));
            $prevN = mktime(0, 0, 0, date("m"), date("d") - $n, date("Y"));
            $mak   = date("Y-m-d", $nextN);
            $min   = date("Y-m-d", $prevN);

            $data = mysqli_query($koneksi,
              "SELECT COUNT(id_rapidtest) AS total
              FROM rapidtest
              WHERE id_catatan_medik='$id_catatan_medik';");
            while($d = mysqli_fetch_array($data)){
              $total = $d['total'];
              ?>
              <h1><small>Total <?php echo $total; }?> Pasien</small></h1>
            </div>
          </div>
          <?php
          if($total<1){
            echo "<script>
            setTimeout(function() {
              swal({
                title: 'Tidak Ditemukan',
                text: 'Pasien Belum Terdaftar',
                type: 'error'
                }, function() {
                  window.location = 'operator-dashboard';
                  });
                  }, 10);
                  </script>";
                }else{
                  $no=1;
                  $data = mysqli_query($koneksi,
                    "SELECT *, mr_dokter.nama_dokter,
                    CASE
                    WHEN rapidtest.igm='0' THEN 'Non Reaktif'
                    WHEN rapidtest.igm='1' THEN 'Reaktif'
                    WHEN rapidtest.igm='3' THEN 'On Process'
                    END AS nama_igm,
                    CASE
                    WHEN rapidtest.igg='0' THEN 'Non Reaktif'
                    WHEN rapidtest.igg='1' THEN 'Reaktif'
                    WHEN rapidtest.igg='3' THEN 'On Process'
                    END AS nama_igg
                    FROM rapidtest, mr_dokter
                    WHERE rapidtest.id_dokter=mr_dokter.id_dokter
                    AND rapidtest.id_catatan_medik='$id_catatan_medik'
                    ORDER BY rapidtest.id_rapidtest DESC;");
                  while($d = mysqli_fetch_array($data)){
                    $tgl_periksa  = $d['tgl_periksa'];
                    $tanggal      = $d['tanggal'];
                    $lahir        = new DateTime($d['tgl_lahir']);
                    $today        = new DateTime();
                    $umur         = $today->diff($lahir);

                    ?>
                    <div align="right" class="col-lg-12">
                    </div>
                    <table class="table table-bordered table-hover table-striped tablesorter">
                      <thead>
                        <tr>
                         <th><center>#</center></th>
                         <th><center>No. RM</center></th>
                         <th><center>Nama Pasien</center></th>
                         <th><center>Dokter</center></th>
                         <th><center>IgM</center></th>
                         <th><center>IgG</center></th>
                         <th><center>Registrasi</center></th>
                       </tr>
                     </thead>
                     <tbody>
                      <tr>
                        <td><center><?php echo $no++; ?></center></td>
                        <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
                        <td><center><?php echo $d['nama']; ?></center></td>
                        <td><center><?php echo $d['nama_dokter']; ?></center></td>
                        <td><center>
                          <?php
                          if($d['igm']==1){
                            ?>
                            <font class="redtext"><?php echo $d['nama_igm']; ?></font>
                            <?php
                          }elseif($d['igm']==0){
                            ?>
                            <font class="greentext"><?php echo $d['nama_igm']; ?></font>
                            <?php
                          }else{
                            ?>
                            <font class="blacktext"><?php echo $d['nama_igm']; ?></font>
                            <?php
                          }
                          ?>
                        </center></td>
                        <td><center>
                          <?php
                          if($d['igg']==1){
                            ?>
                            <font class="redtext"><?php echo $d['nama_igg']; ?></font>
                            <?php
                          }elseif($d['igg']==0){
                            ?>
                            <font class="greentext"><?php echo $d['nama_igg']; ?></font>
                            <?php
                          }else{
                            ?>
                            <font class="blacktext"><?php echo $d['nama_igg']; ?></font>
                            <?php
                          }
                          ?>
                        </center></td>
                        <td><center><?php echo $d['tanggal'].' / '.$d['jam']; ?></center></td>
                        </tr><?php }} ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div><!-- /.row -->
            </div><!-- /#wrapper -->
            <?php include "../views/footer.php"; ?>