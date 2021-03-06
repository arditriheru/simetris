<?php error_reporting(0); ?>
<?php include "views/header.php"; ?>
<body>
	<script>
		window.print();
	</script>
	<?php
	$id_rapidtest = $_GET['id'];
	include '../../config/connect.php';
	$data = mysqli_query($koneksi,
		"SELECT *, rapidtest.tanggal, mr_pasien.nama AS nama2, mr_pasien.alamat AS alamat2, mr_pasien.tgl_lahir AS tgl_lahir2, mr_dokter.nama_dokter, mr_unit.nama_unit,
		IF(mr_pasien.sex='1', 'Laki-laki', 'Perempuan') AS nama_sex2,
		CASE
		WHEN rapidtest.igm='0' THEN 'Non Reaktif'
		WHEN rapidtest.igm='1' THEN 'Reaktif'
		WHEN rapidtest.igm='3' THEN 'On Process'
		END AS nama_igm,
		CASE
		WHEN rapidtest.igg='0' THEN 'Non Reaktif'
		WHEN rapidtest.igg='1' THEN 'Reaktif'
		WHEN rapidtest.igg='3' THEN 'On Process'
		END AS nama_igg,
		IF(rapidtest.nilai_rujukan='1', 'Reaktif', 'Non Reaktif') AS nama_nilai_rujukan
		FROM rapidtest, mr_pasien, mr_dokter, mr_unit
		WHERE rapidtest.id_dokter=mr_dokter.id_dokter
		AND rapidtest.id_catatan_medik=mr_pasien.id_catatan_medik
		AND rapidtest.id_unit=mr_unit.id_unit
		AND rapidtest.id_rapidtest='$id_rapidtest';");
	while($d = mysqli_fetch_array($data)){
		$tgl_periksa  		= $d['tgl_periksa'];
		$tanggal      		= $d['tanggal'];
		$lahir        		= new DateTime($d['tgl_lahir2']);
		$today        		= new DateTime();
		$umur         		= $today->diff($lahir);
		$sub_nama     		= substr($d['nama2'],0, -2);
		$sub_nama_dokter 	= substr($d['nama_dokter'],0, -4);

		function format_tgl_periksa($tgl_periksa)
		{
			$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
			$split = explode('-', $tgl_periksa);
			return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
		}
		function format_tanggal($tanggal)
		{
			$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
			$split = explode('-', $tanggal);
			return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
		}
		?>
		<div id="page-wrapper">
			<div class="col-lg-12">
				<div class="row">
					<div class="container">
						<div class="container">
							<div class="noprint">
								<a href="dashboard.php"><button type="button" class="btn btn-success">Dashboard</button></a>
							</div>
							<br><br><br>
							<center>
								<div class="row">
									<img class="img-responsive" src="../../images/Kop Surat Laboratorium.jpg" width="100%" alt="Kop Surat Laboratorium">
								</div>
							</center><br>
							<table class="table table-bordered">
								<tbody>
									<tr>
										<td><b>No.RM</b></td>
										<td><?php echo $d['id_catatan_medik']; ?></td>
										<td><b>Dokter</b></td>
										<td><?php echo "dr. ".$sub_nama_dokter; ?></td>
									</tr>
									<tr>
										<td><b>Nama</b></td>
										<td><?php echo $sub_nama; ?></td>
										<td><b>Asal</b></td>
										<td><?php echo $d['nama_unit']; ?></td>
									</tr>
									<tr>
										<td><b>Umur</b></td>
										<td><?php echo $umur->y; echo " Tahun, "; echo $umur->m; echo " Bulan, dan "; echo $umur->d; echo " Hari"; ?></td>
										<td><b>Tgl Periksa</b></td>
										<td><?php echo format_tgl_periksa($d['tgl_periksa']); ?></td>
									</tr>
									<tr>
										<td><b>Gender</b></td>
										<td><?php echo $d['nama_sex2']; ?></td>
										<td><b>Jam Periksa</b></td>
										<td><?php echo $d['jam_periksa']; ?></td>
									</tr>
									<tr>
										<td><b>Alamat</b></td>
										<td><?php echo $d['alamat2']; ?></td>
										<td><b>Sampel</b></td>
										<td><?php echo $d['sampel']; ?></td>
									</tr>
								</tbody>
							</table>
							<table class="table table-bordered table-hover table-striped tablesorter">
								<thead>
									<tr>
										<th><center>Pemeriksaan</center></th>
										<th><center>Hasil</center></th>
										<th><center>Nilai Rujukan</center></th>
										<th><center>Metode</center></th>
									</tr>
									<tr><td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $d['pemeriksaan']; ?></td></tr>
								</thead>
								<tbody>
									<tr>
										<td><center>(IgM)</center></td>
										<td><center><?php echo $d['nama_igm']; ?></center></td>
										<td><center><?php echo $d['nama_nilai_rujukan']; ?></center></td>
										<td><center><?php echo $d['metode']; ?></center></td>
									</tr>
									<tr>
										<td><center>(IgG)</center></td>
										<td><center><?php echo $d['nama_igg']; ?></center></td>
										<td><center><?php echo $d['nama_nilai_rujukan']; ?></center></td>
										<td><center><?php echo $d['metode']; ?></center></td>
									</tr>
								</tbody>
							</table>
							<div align="right">
								<small>Printed : <?php include "../../system/date-time.php";?> / <?php echo $jamsekarang;?></small>
							</div>
							<table>
								<tbody>
									<tr>
										<?php
										if( $d['igm']==1 || $d['igg']==1){ ?>
											<td><left><p>
												<strong>Catatan :</strong><br>
												1. Pemeriksaan Rapid ke 1<br>
												2. Hasil Rapid Test Antibody Reaktif belum dapat memastikan adanya Infeksi SARS Cov-2<br>
												3. Pemeriksaan Konfirmasi dengan pemeriksaan <b>RT PCR</b><br>
												4. Lakukan karantina mandiri  dengan menerapkan PHBS (Perilaku Hidup Bersih dan Sehat : Mencuci tangan, menerapkan etika batuk, menggunakan masker), dan menjaga Physical Distancing<br>
												5. Bila muncul gejala atau gejala memberat selama isolasi segera menuju ke RS Rujukan Covid-19<br>
											</p></letf></td>
										<?php }else{ ?>
											<td><left><p>
												<strong>Catatan :</strong><br>
												1. Pemeriksaan Rapid ke 1<br>
												2. Hasil Non reaktif tidak menyingkirkan kemungkinan infeksi SARS CoV-2<br>
												3. Hasil Non Reaktif dapat terjadi pada kondisi :<br>
												&nbsp; &nbsp; - Sesorang belum / tidak terinfeksi<br>
												&nbsp; &nbsp; - Window Period (Terinfeksi namun antibody belum terbentuk)<br>
												&nbsp; &nbsp; - Immunocompromised<br>
												4. Saran :<br>
												&nbsp; &nbsp; - Ulangi pemeriksaan rapid test antibody 7-10 hari kemudian<br>
												&nbsp; &nbsp; - Pertahankan perilaku hidup bersih dan physical distancing<br><br><br>
											</p></letf></td>
										<?php } ?>
									</tr>
								</table>
							</tbody><br>
							<div align="right">
								<table>
									<tbody>
										<tr>
											<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
											<td><center><strong>Petugas,</strong><br><br><br><br><br><br>
												<?php echo $d['pemeriksa']; ?></center></td>
												<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
												<td><center>Yogyakarta, <?php echo format_tanggal($d['tanggal']); ?><br><strong>Penanggung jawab,</strong><br><br><br><br><br>
												dr. Indah Ajeng Ebtasari, M.Sc.,Sp.PK.</center></td>
											</tr>
										</tbody>
										</table><?php } ?>
									</div>
									<!-- <div class="footer">
										<small><?php echo $actual_link; ?></small>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</body>
			</html>


