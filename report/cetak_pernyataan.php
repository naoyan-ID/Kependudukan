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
<html lang="en">
<head>
	<title>Cetak Surat Pernyataan</title>
</head>
<?php
if (isset($id)) {
    $sql_tampil = "select * from tb_pdd where id_pend ='$id'";
    $query_tampil = mysqli_query($koneksi, $sql_tampil);
    if (mysqli_num_rows($query_tampil) > 0) {
        $no = 1;
        while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
            ?>
            <body>
                <center>
                    <p><b>RUKUN TETANGGA 04 RUKUN WARGA 04</b><br>
                    KELURAHAN JAGAKARSA KECAMATAN JAGAKARSA<br>
                    KOTA ADMINISTRASI JAKARTA SELATAN<br>
                    Sekretariat : Jl. Kedondong gang. Abdul Jabar No.06</p>
                    <p>________________________________________________________________________</p>
                </center>

                <center>
                    <h4>
                        <u>SURAT PERNYATAAN</u>
                    </h4>
                </center>
                <p>Yang bertanda tangan dibawah ini :</P>
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
							<td>Tempat, Tanggal Lahir</td>
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
							<td>No. KTP/KK</td>
							<td>:</td>
							<td>
								<?php echo $data['nik']; ?>
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
								<?php echo $data['alamat']; ?> RT<?php echo $data['rt']; ?> RW<?php echo $data['rw']; ?>
								Kelurahan Jagakarsa, Kecamatan Jagakarsa, Jakarta Selatan
							</td>
						</tr>
                    </tbody>
                </table>
                <p style="text-align: justify">
                    Menyatakan dengan sebenarnya dan sesungguhnya bahwa pada saat ini saya berstatus belum pernah nikah/belum 
                    kawin dengan seorang wanita/pria*) manapun.<br>
                    Apabila Surat Penyataan ini saya tidak benar, maka saya bersedia dituntut sesuai dengan hukum yang berlaku
                    tanpa melibatkan siapapun.
                </p>
                <div class="cards">
                    <div class="ttd_kosong"><br><br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        </center>
                    </div>
                    <div class="ttd_pernyataan">
                        <center>
                            Jakarta,
                            <?php echo $tgl; ?><br>
                            <br>Yang Menyatakan
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>(<?php echo $data['nama']; ?>)
                        </center>
                    </div>
                </div><br><br><br>
                <center>Mengetahui</center><br>
                <div class="cards">
                    <div class="ttd_rw">
                        Nomor : <br>
                        Tanggal : <br><br>
                        <center>Ketua RW 04<br>Kelurahan Jagakarsa
                        <br>
                        <br>
                        <br>    
                        <br>
                        <br>
                        <br>(Agus Hermawan S.Pd.I.)</center><br><br>
                    </div>
                    <div class="ttd_rt">
                        Nomor : <?php echo $data['id_pend']; ?>/04/04/<?php echo $tanggal; ?><br>
                        Tanggal : <?php echo $tgl; ?><br><br>
                        <center>Ketua RT 004/RW 04<br>Kelurahan Jagakarsa
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br><center>(Jayadi)</center>
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
            <?php
        }
    } else {
        echo "";
    }
} else {
    echo "";
}
?>