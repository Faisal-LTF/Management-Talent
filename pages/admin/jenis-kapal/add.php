<?php
session_start();

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
} else {

?>

    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y ">
            <h4 class="py-1 ms-3 mb-1"><span class="text-muted fw-light">Tambah</span> Jenis Kapal</h4>
            <div class="col-12 text-end mb-3">
                <a href="?page=data_jenisKapal" class="btn btn-primary">Kembali</a>
            </div>
            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Data Jenis Kapal</h5>
                            <small class="text-muted float-end"></small>
                        </div>
                        <div class="card-body">
                            <form data-toggle="validator" action="" method="POST" enctype="multipart/form-data">
                                <?php
                                if ($status) {
                                ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <button class="close" type="button" data-dismiss="alert" ariahidden="true">&times;
                                        </button>
                                        <h4><i class="icon fa fa-close">Gagal! </i></h4>
                                        <?php echo $status; ?>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-fullname">Jenis Kapal</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-sailboat"></i></span>
                                        <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Jenis Kapal" name="namaJenisKapal" aria-label="Jenis Kapal" aria-describedby="basic-icon-default-fullname2" required />
                                    </div>
                                </div>
                                <button type="submit" name="simpan" class="btn btn-primary">Save</button>
                                <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>


    <?php
    if (isset($_POST['simpan'])) {

        $namaJenisKapal = $_POST['namaJenisKapal'];

        $simpan = $link->query("INSERT INTO jenis_kapal (namaJenisKapal) VALUES ('$namaJenisKapal')");

        if ($simpan) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Data berhasil disimpan',
                customClass: {
                    confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                }).then(function() {
                window.location.href = '?page=data_jenisKapal'; 
            });
        </script>";
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Data anda gagal disimpan. Ulangi sekali lagi!',
                customClass: {
                    confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                }).then(function() {
                window.location.href = '?page=tambah_jenisKapal'; 
            });
        </script>";
        }
    }
}
    ?>