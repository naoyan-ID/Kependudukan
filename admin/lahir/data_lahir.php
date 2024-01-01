<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Kelahiran</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=add-lahir" class="btn btn-primary">
                    <i class="fa fa-edit"></i> Tambah Data
				</a>
            </div>
            <br>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    			<input type="hidden" name="page" value="data-lahir">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label class="col-form-label">Periode</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control" name="dari" required>
                    </div>
                    <div class="col-auto">
                        -
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control" name="ke" required>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
					<div class="col-auto">
                        <a class="btn btn-primary" href="http://localhost/kependudukan/index.php?page=data-lahir">Refresh</a>
                    </div>
                </div>
            </form>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Tempat</th>
						<th>Tanggal Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Keluarga</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 1;
						if (isset($_GET['dari']) && isset($_GET['ke'])) {
							$dari = $_GET['dari'];
							$ke = $_GET['ke'];
							$sql = $koneksi->query("SELECT l.id_lahir, l.nama, l.tempat_lh, l.tgl_lh, l.jekel, k.no_kk, k.kepala FROM tb_lahir l INNER JOIN tb_kk k ON k.id_kk = l.id_kk WHERE l.tgl_lh BETWEEN '$dari' AND '$ke'");
						} else {
							$sql = $koneksi->query("SELECT l.id_lahir, l.nama, l.tempat_lh, l.tgl_lh, l.jekel, k.no_kk, k.kepala FROM tb_lahir l INNER JOIN tb_kk k ON k.id_kk = l.id_kk");
						}
						while ($data = $sql->fetch_assoc()) {
            		?>
					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
						</td>
						<td>
							<?php echo $data['tempat_lh']; ?>
						</td>
						<td>
							<?php echo $data['tgl_lh']; ?>
						</td>
						<td>
							<?php echo $data['jekel']; ?>
						</td>
						<td>
							<?php echo $data['no_kk']; ?> -
							<?php echo $data['kepala']; ?>
						</td>
						<td>
							<a href="?page=edit-lahir&kode=<?php echo $data['id_lahir']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-lahir&kode=<?php echo $data['id_lahir']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
								</>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
