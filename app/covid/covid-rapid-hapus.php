<?php 
include '../../config/connect.php';
$id_rapidtest = $_GET['id'];
$hapus=mysqli_query($koneksi,"DELETE FROM rapidtest WHERE id_rapidtest='$id_rapidtest'");
if($hapus){
	echo "<script>alert('Berhasil Dihapus!!!');document.location='dashboard.php'</script>";
}else{
	echo "<script>alert('Gagal Hapus!!!');document.location='dashboard.php'</script>";
}
?>