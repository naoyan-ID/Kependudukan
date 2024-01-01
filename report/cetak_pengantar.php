<?php
	include "../inc/koneksi.php";
	require __DIR__ . '/../vendor/autoload.php';
	use Carbon\Carbon;
	use Carbon\CarbonInterface;
	if (isset($_POST['btnCetak'])){
		$id = $_POST['id_pend'];
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
<html>
<head>
	<title>Cetak Surat Pengantar</title>
</head>
<body>
	<center>
		<p><b>RUKUN TETANGGA 04 RUKUN WARGA 04</b><br>
		KELURAHAN JAGAKARSA KECAMATAN JAGAKARSA<br>
		KOTA ADMINISTRASI JAKARTA SELATAN<br>
		Sekretariat : Jl. Kedondong gang. Abdul Jabar No.06</p>
		<p>________________________________________________________________________</p>
		<?php
			$sql_tampil = "select * from tb_pdd
			where id_pend ='$id'";
			
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
		?>
	</center>

	<center>
		<h4>
			<u>SURAT PENGANTAR</u>
		</h4>
		<h4>
			NOMOR : <?php echo $data['id_pend']; ?>/04/04/<?php echo $tanggal; ?>
		</h4>
	</center>
	<p>Yang bertanda tangan dibawah ini. Pengurus RT. 004 RW 04 Kelurahan Kagakarsa Kecamatan Jagakarsa 
		dengan ini menerangkan bahwa :
	</P>
	<table>
		<tbody>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<?php echo $data['nama']; ?>
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
				<td>Tempat/Tgl. Lahir</td>
				<td>:</td>
				<td>
					<?php echo $data['tempat_lh']; ?>,
					<?php echo $data['tgl_lh']; ?>
				</td>
			</tr>
			<tr>
				<td>Pekerjaan</td>
				<td>:</td>
				<td>
					<?php echo $data['pekerjaan']; ?>
				</td>
			</tr>
			<tr>
				<tr>
				<td>No. KTP/KK</td>
				<td>:</td>
				<td>
					<?php echo $data['nik']; ?>
				</td>
			</tr>
			<tr>
				<td>Kewarganegaraan</td>
				<td>:</td>
				<td>Indonesia</td>
			</tr>
			<tr>
				<td>Pendidikan</td>
				<td>:</td>
				<td>
					<?php echo $data['pendidikan']; ?>
				</td>
			</tr>
			<tr>
				<td>Agama</td>
				<td>:</td>
				<td>
					<?php echo $data['agama']; ?>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>
					<?php echo $data['alamat']; ?> RT<?php echo $data['rt']; ?>/RW<?php echo $data['rw']; ?>
				</td>
			</tr>
			<tr>
				<td>Maksud/Keperluan</td>
				<td>:</td>
				<td>
					1. Membuat KTP<br>
					2. Memperpanjang KTP<br>
					3. Membuat Akte Kelahiran<br>
					4. Surat Keterangan<br>
					5. Surat Kematian<br>
					6. Surat Pengantar Nikah<br>
					7. Membuat SKCK<br>
					8. Membuat Kartu Keluarga<br>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<br>
	<div class="cards">
		<div class="ttd_rw"><br><br>
			<center>Mengetahui<br>Pengurus RW 04
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>(Agus Hermawan S.Pd.I)
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