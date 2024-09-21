<?php 
include_once('templates/header.php');
?>

<!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Laporan Tamu</h1>
<div class="row mx-auto d-flex justify-content-center">

<div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahModal">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text"> Data User </span>
            </button>
            <div class="card-body">
            <div class="table-responsive">
                    <table class="table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Tamu</th>
                                <th>Alamat</th>
                                <th>No. Telp/HP</th>
                                <th>Bertemu Dengan</th>
                                <th>Kepentingan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if (isset($_POST['tampilkan'])) { 
                                    $p_awal = $_POST['p_awal'];
                                    $p_akhir = $_POST['p_akhir'];
                                    // penomoran auto-increament 
                                    $no =1;
                                    // Query untuk memanggil semua data dari tabel tabelbukutamu
                                    $tabelbukutamu = query("SELECT * FROM tabelbukutamu WHERE tanggal BETWEEN '$p_awal' AND '$p_akhir'");
                                    foreach ($tabelbukutamu as $tamu) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $tamu['tanggal'] ?></td>
                                        <td><?= $tamu['nama_tamu'] ?></td>
                                        <td><?= $tamu['alamat'] ?></td>
                                        <td><?= $tamu['no_hp'] ?></td>
                                        <td><?= $tamu['bertemu'] ?></td>
                                        <td><?= $tamu['kepentingan'] ?></td>
                                        <td>
                                            <a href="edit-tamu.php?id=<?= $tamu['id_tamu']?>">Ubah</a>
                                            <a href="hapus-tamu.php?id=<?= $tamu['id_tamu']?>">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php endforeach;
                                }
                            ?>
                        </tbody>
                    </table>
    <div class="col-xl-5 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <form method="post" action="">
                                <div class="form-row align-items-center">
                                    <div class="col-auto">
                                        Periode
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <input type="date" class="form-control mb-2" id="p_awal" name="p_awal" required>
                                </div>
                                <div class="col-auto">
                                    <div class="font-weight-bold text-primary mb-2">
                                        s.d
                                    </div>
                                    <div class="col-auto">
                                        <input type="date" class="form-control mb-2" id="p_akhir" name="p_akhir" required>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" name="tampilkan" class="btn btn-primary mb-2">
                                            Tampilkan 
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
<!-- /.container-fluid -->

<?php 
include_once('templates/footer.php');
?>