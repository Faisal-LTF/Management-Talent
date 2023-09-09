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
        <h4 class="py-1 ms-3 mb-1"><span class="text-muted fw-light">Tambah</span> Data Pegawai</h4>
        <div class="col-12 text-end mb-3">
            <a href="?page=data_pegawai" class="btn btn-primary">Kembali</a>
        </div>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Data Pegawai</h5>
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
                                <label class="form-label" for="basic-icon-default-fullname">Nama</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="ti ti-user"></i></span>
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="nama" name="nama" aria-label="nama"
                                        aria-describedby="basic-icon-default-fullname2" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Jenis Kelamin</label>
                                <div class="input-group">
                                    <select name="jk" class="form-select" id="inputGroupSelect02">
                                        <option>-- PILIH --</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Tempat Lahir</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="ti ti-home-check"></i></span>
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Tanggal Lahir" name="tempatLahir" aria-label="Tanggal Lahir"
                                        aria-describedby="basic-icon-default-fullname2" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Tanggal Lahir</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="ti ti-calendar"></i></span>
                                    <input type="date" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Tanggal Lahir" name="tanggalLahir" aria-label="Tanggal Lahir"
                                        aria-describedby="basic-icon-default-fullname2" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-alamat">Alamat</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-address-book"></i></span>
                                    <input type="text" id="basic-icon-default-alamat" class="form-control"
                                        placeholder="Masukan Alamat" name="alamat" aria-label="alamat"
                                        aria-describedby="basic-icon-default-alamat" required />
                                    <span id="basic-icon-default-alamat2"></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Nip</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="ti ti-dialpad-filled"></i></span>
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Nip" name="nip" aria-label="Nip"
                                        aria-describedby="basic-icon-default-fullname2" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Golongan</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="ti ti-assembly"></i></span>
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Golongan" name="golongan" aria-label="Golongan"
                                        aria-describedby="basic-icon-default-fullname2" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Jabatan</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="ti ti-assembly"></i></span>
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Jabatan" name="jabatan" aria-label="Jabatan"
                                        aria-describedby="basic-icon-default-fullname2" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">No Telepon</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="ti ti-number"></i></span>
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="No Telepon" name="no_tlp" aria-label="No Telepon"
                                        aria-describedby="basic-icon-default-fullname2" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Instansi</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="ti ti-brand-google-home"></i></span>
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Instansi" name="instansi" aria-label="Instansi"
                                        aria-describedby="basic-icon-default-fullname2" required />
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

        $nama = $_POST['nama'];
        $tempatLahir = $_POST['tempatLahir'];
        $tanggalLahir = $_POST['tanggalLahir'];
        $alamat = $_POST['alamat'];
        $nip = $_POST['nip'];
        $golongan = $_POST['golongan'];
        $jabatan = $_POST['jabatan'];
        $no_tlp = $_POST['no_tlp'];
        $instansi = $_POST['instansi'];
        $jk = $_POST['jk'];

        $simpan = $link->query("INSERT INTO pegawai VALUES (
            '', 
            '$nama',
            '$tempatLahir',
            '$tanggalLahir',
            '$alamat',
            '$nip',
            '$golongan',
            '$jabatan',
            '$no_tlp',
            '$instansi',
            '$jk'
            )");

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
                window.location.href = '?page=data_pegawai'; 
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
                window.location.href = '?page=tambah_pegawai'; 
            });
        </script>";
        }
    }
}
    ?>