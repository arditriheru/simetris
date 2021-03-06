<!-- Sidebar -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand">SIMETRIS</a>
  </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
      <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="agama-cari.php"><i class="fa fa-check-square-o"></i> Agama</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-check-square-o"></i> Demografi <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="propinsi-cari.php"><i class="fa fa-check-square-o"></i> Propinsi</a></li>
            <li><a href="kabupaten-cari.php"><i class="fa fa-check-square-o"></i> Kabupaten</a></li>
            <li><a href="kecamatan-cari.php"><i class="fa fa-check-square-o"></i> Kecamatan</a></li>
          </ul>
        </li>
        <li><a href="diagnosa-cari.php"><i class="fa fa-check-square-o"></i> Diagnosa</a></li>
        <li><a href="bor-filter.php"><i class="fa fa-check-square-o"></i> Indikator Mutu</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-check-square-o"></i> Obat <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="obat-jenis-cari.php">Stok Jenis Obat</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-check-square-o"></i> Pembelian Obat <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="pembelian-obat-rajal-cari.php">Rawat Jalan</a></li>
                <li><a href="pembelian-obat-ranap-cari.php">Rawat Inap</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-check-square-o"></i> Penjualan Obat <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="penjualan-obat-rajal-cari.php">Rawat Jalan</a></li>
                  <li><a href="penjualan-obat-ranap-cari.php">Rawat Inap</a></li>
                </ul>
              </li>
              <li><a href="pendidikan-cari.php"><i class="fa fa-check-square-o"></i> Pendidikan</a></li>
              <li><a href="kuesioner-cari.php"><i class="fa fa-check-square-o"></i> Kuesioner</a></li>
              <li><a href="tarif-semua.php"><i class="fa fa-check-square-o"></i> Daftar Tarif</a></li>
              <li><a href="laborat-tarif-tampil.php"><i class="fa fa-check-square-o"></i> Tarif Laboratorium</a></li>
              <li><a href="manual-export.php"><i class="fa fa-check-square-o"></i> Manual Export</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right navbar-user">
              <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-circle"></i> <?php echo $nama_login;?>&nbsp;<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="divider"></li>
                  <li>
                    <a href="logout.php"><i class="fa fa-power-off">
                    </i> Log Out</a>
                  </li>
                </ul>
              </li>
            </ul>