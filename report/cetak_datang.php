<?php
	include "../inc/koneksi.php";
	require __DIR__ . '/../vendor/autoload.php';
	use Carbon\Carbon;
	use Carbon\CarbonInterface;
	if (isset($_POST['Cetak'])){
		$id = $_POST['id_datang'];
	}
	Carbon::setLocale('id');
	function angkaKeRomawi($angka) {
		$romawi = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
		return $romawi[$angka - 1];
	}
	$bulanNumerik = Carbon::now()->format('m');
	$bulanRomawi = angkaKeRomawi($bulanNumerik);
	$tahun = Carbon::now()->format('Y');

	$tanggal = $bulanRomawi . '/' . $tahun;
	$tgl = Carbon::now()->translatedFormat('l d F Y');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cetak Surat Pendatang</title>
</head>
<body>
	<center>
		<p><b>RUKUN TETANGGA 04 RUKUN WARGA 04</b><br>
		KELURAHAN JAGAKARSA KECAMATAN JAGAKARSA<br>
		KOTA ADMINISTRASI JAKARTA SELATAN<br>
		Sekretariat : Jl. Kedondong gang. Abdul Jabar No.06</p>
		<p>________________________________________________________________________</p>

		<?php
			$sql_tampil = "select * from tb_datang
			where id_datang ='$id'";
			
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
		?>
	</center>

	<center>
		<h4>
			<u>SURAT KETERANGAN PENDATANG</u>
		</h4>
		<h4>
			No Surat : <?php echo $data['id_datang']; ?>/Ket.Datang/04/04/<?php echo $tanggal; ?>
		</h4>
	</center>
	<p>Yang bertandatangan dibawah ini Ketua RT 004, Kelurahan Jagakarsa, Kecamatan Jagakarsa, dengan ini menerangkan
		bahawa :</P>
	<table>
		<tbody>
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>
					<?php echo $data['nik']; ?>
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<?php echo $data['nama_datang']; ?>
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td>
					<?php echo $data['jekel']; ?>
				</td>
			</tr>
			<tr>
				<td>Tanggal Datang</td>
				<td>:</td>
				<td>
					<?php echo $data['tgl_datang']; ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<p>Benar telah datang dan berencana untuk tinggal di wilayah RT004 Kelurahan Jagakarsa, Kecamatan Jagakarsa, Jakarta Selatan.<br>
	Demikian Surat ini dibuat, agar dapat digunakan sebagaimana mestinya.</P>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div class="cards">
		<div class="ttd_rw"><br><br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
			</center>
		</div>
		<div class="ttd_rt">
			<center>
				Jakarta,
				<?php echo $tgl; ?><br>
				<br>Pengurus RT 004 / RW04<br>K e t u a
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>(Jayadi)
			</center>
		</div>
	</div>
	<style type="text/css">
		.cards {
  			display: flex;
  			justify-content: space-between;
		}
	</style>
	<script>
		window.print();
	</script>
</body>
</html>