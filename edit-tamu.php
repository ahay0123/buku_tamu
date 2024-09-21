<?php
include_once('templates/header.php');
include_once('function.php');
?>

<?php
if (isset($_GET['id'])) {
    $id_tamu = $_GET['id'];
    // ambil data tamu yang sesuai dengan id_tamu
    $data = query("SELECT * FROM tabelbukutamu WHERE id_tamu = '$id_tamu'")[0];
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ubah Data Tamu</h1>



    <?php
    // Jika ada tombol simpan 
    if (isset($_POST['simpan'])) {
        if (ubah_tamu($_POST) > 0) {
    ?>
            <div class="alert alert-success" role="alert">
                Data berhasil diubah !
            </div>
        <?php
        } else {
        ?>
            <div class="alert alert-danger" role="alert">
                Data gagal diubah !
            </div>
    <?php
        }
    }
    ?>

</div>

<!-- Konten Edit Data Tamu -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6>Data Tamu</h6>
    </div>
    <div class="card-body">
        <form method="post" action="">
            <input type="hidden" name="id_tamu" value="<?= $kodeTamu ?>">
            <div class="form-group row">
                <label for="nama_tamu" class="col-sm-3 col-form-label"> Nama Tamu </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama_tamu" name="nama_tamu" value="<?= $data['nama_tamu'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="alamat" class="col-sm-3 col-form-label"> Alamat </label>
                <div class="col-sm-8">
                    <Textarea class="form-control" id="alamat" name="alamat"><?= $data['alamat'] ?>  </Textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="no_hp" class="col-sm-3 col-form-label"> No. Telepon </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $data['no_hp'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="bertemu" class="col-sm-3 col-form-label"> Bertemu dg. </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="bertemu" name="bertemu" value="<?= $data['bertemu'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="Kepentingan" class="col-sm-3 col-form-label"> Kepentingan </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="kepentingan" name="kepentingan" value="<?= $data['kepentingan'] ?>">
                </div>
            </div>
            <div class="modal-footer">
                <a href="buku-tamu.php">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                </a>
                <a href="buku-tamu.php">
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </a>
            </div>
        </form>

    </div>
</div>



<!-- /.container-fluid -->

<?php
include_once('templates/footer.php');
?>