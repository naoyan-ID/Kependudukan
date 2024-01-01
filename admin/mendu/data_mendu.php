<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Kematian</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=add-mendu" class="btn btn-primary">
                    <i class="fa fa-edit"></i> Tambah Data
                </a>
            </div>
            <br>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    			<input type="hidden" name="page" value="data-mendu">
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
                        <a class="btn btn-primary" href="http://localhost/kependudukan/index.php?page=data-mendu">Refresh</a>
                    </div>
                </div>
            </form>
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Sebab</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        if (isset($_GET['dari']) && isset($_GET['ke'])) {
                            $dari = $_GET['dari'];
                            $ke = $_GET['ke'];
                            $sql = $koneksi->query("SELECT p.id_pend, p.nik, p.nama, m.tgl_mendu, m.sebab, m.id_mendu FROM tb_mendu m INNER JOIN tb_pdd p ON p.id_pend = m.id_pdd WHERE m.tgl_mendu BETWEEN '$dari' AND '$ke'");
                        } else {
                            $sql = $koneksi->query("SELECT p.id_pend, p.nik, p.nama, m.tgl_mendu, m.sebab, m.id_mendu FROM tb_mendu m INNER JOIN tb_pdd p ON p.id_pend = m.id_pdd");
                        }
                        while ($data = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['nik']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['tgl_mendu']; ?></td>
                            <td><?php echo $data['sebab']; ?></td>
                            <td>
                                <a href="?page=edit-mendu&kode=<?php echo $data['id_mendu']; ?>" title="Ubah" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="?page=del-mendu&kode=<?php echo $data['id_pend']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
