<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Pendatang</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=add-datang" class="btn btn-primary">
                    <i class="fa fa-edit"></i> Tambah Data</a>
            </div>
            <br>
            <form action="?page=data-datang" method="get">
                <input type="hidden" name="page" value="data-datang">
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
                        <a class="btn btn-primary" href="http://localhost/kependudukan/index.php?page=data-datang">Refresh</a>
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
                        <th>Jenis Kelamin</th>
                        <th>Tanggal</th>
                        <th>Pelapor</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if (isset($_GET['dari']) && isset($_GET['ke'])) {
                        $dari = $_GET['dari'];
                        $ke = $_GET['ke'];
                        $sql = $koneksi->query("SELECT d.id_datang, d.nik, d.nama_datang, d.jekel, d.tgl_datang, p.nama from tb_datang d inner join tb_pdd p on d.pelapor=p.id_pend WHERE d.tgl_datang BETWEEN '$dari' AND '$ke'");
                    } else {
                        $sql = $koneksi->query("SELECT d.id_datang, d.nik, d.nama_datang, d.jekel, d.tgl_datang, p.nama from tb_datang d inner join tb_pdd p on d.pelapor=p.id_pend");
                    }
                    while ($data = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['nik']; ?></td>
                            <td><?php echo $data['nama_datang']; ?></td>
                            <td><?php echo $data['jekel']; ?></td>
                            <td><?php echo $data['tgl_datang']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td>
                                <a href="?page=edit-datang&kode=<?php echo $data['id_datang']; ?>" title="Ubah" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="?page=del-datang&kode=<?php echo $data['id_datang']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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
