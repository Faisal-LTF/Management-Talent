<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
} else {

    $id = $_GET['id'];
    $query = $link->query("SELECT * FROM kinerja k join pegawai p on k.id_pegawai = p.id_pegawai  WHERE id_kinerja = '$id' ");
    $data = $query->fetch_array();


    $skp = null;
    if (@$_GET['id']) {
        $skp = $link->query("SELECT * FROM kinerja WHERE id_kinerja = '$_GET[id]'")->fetch_assoc();
    }
?>

<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y ">
        <h4 class="py-1 ms-3 mb-1"><span class="text-muted fw-light">Mengukur</span> Tingkat Kinerja </h4>
        <div class="col-12 text-end mb-3">
            <a href="?page=data_kinerja" class="btn btn-primary">Kembali</a>
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
                            <div class="row">
                                <input type="hidden" class="form-control" name="id_pegawai" id="id_pegawai"
                                    value="<?= $data['id_pegawai'] ?>" required>

                                <div class="mb-3 col-6">
                                    <label class="form-label" for="basic-icon-default-fullname">Nama Pegawai</label>
                                    <div class="input-group ">
                                        <span class="input-group-append">
                                            <button type="button" data-toggle="modal" data-target="#modal"
                                                class="btn btn-success "><i class="ti ti-search "></i></button>

                                        </span>
                                        <input type="text" class="form-control" placeholder="Nama" id="nama"
                                            aria-label="nama" aria-describedby="basic-icon-default-fullname2" readonly
                                            value="<?= $data['nama'] ?>" />
                                    </div>
                                </div>
                                <div class="mb-3 col-6">
                                    <label class="form-label" for="basic-icon-default-fullname">NIP</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="ti ti-dialpad-filled"></i></span>
                                        <input type="text" class="form-control" placeholder="NIP" id="nip"
                                            aria-label="Nip" aria-describedby="basic-icon-default-fullname2"
                                            value="<?= $data['nip'] ?>" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <h5 class="mt-3"> PENILAIAN</h5>
                                <div class="row">
                                    <div class="input-grou my-3 col-6">
                                        <label for="nilai_pkp"
                                            class="col-12 col-md-12 text-right pr-4 font-weight-normal">Predikat Kinerja
                                            Pegawai</label>
                                        <div class="col-12 col-md-12">
                                            <input step="0.1" type="number" id="nilai_pkp" class="form-control"
                                                role="nilai-pkp" placeholder="Masukan Angka 1 - 100"
                                                data-label="#nilai_pkp_label" required>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <input placeholder="Disabled" type="text" name="pkp" name="nilai_pkp_label"
                                                id="nilai_pkp_label" class="form-control" value="<?= @$skp['pkp'] ?>"
                                                required readonly>
                                        </div>
                                    </div>
                                    <div class="input-grou my-3 col-6">
                                        <label for="nilai_pp"
                                            class="col-12 col-md-6 text-right pr-4 font-weight-normal">Presensi
                                            Pegawai</label>
                                        <div class="col-12 col-md-12">
                                            <input step="0.1" type="number" placeholder="Masukan Angka 1 - 100"
                                                id="nilai_pp" class="form-control" role="nilai-pp"
                                                data-label="#nilai_pp_label" required>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <input placeholder="Disabled" type="text" name="pp" name="nilai_pp_label"
                                                id="nilai_pp_label" class="form-control" value="<?= @$skp['pp'] ?>"
                                                required readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-group input-group-outline my-3">
                                        <label for="nilai_kinerja" class="col-6 col-md-6 text-right pr-4">
                                            <em>Nilai Kinerja :</em>
                                        </label>
                                        <div class="col-6 col-md-3">
                                            <input placeholder="Disabled" step="0.1" type="number" name="nk"
                                                id="nilai_kinerja" class="form-control" value="<?= @$skp['nk'] ?>"
                                                data-label="#nilai_kinerja_label" readonly required>
                                        </div>
                                        <div class="col-6 col-md-2">
                                            <input placeholder="Disabled" type="text" name="nilai_kinerja_label"
                                                id="nilai_kinerja_label" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                            <button type="reset" name="reset" class="btn btn-danger">Reset</button>


                            <!-- MODAL START -->
                            <div class="modal fade" id="modal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-lg " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Pilih Nama Pegawai</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body ">
                                            <div class="table-responsive">
                                                <table id="example1" class="table table-bordered">
                                                    <thead class="bg-lightblue">
                                                        <tr align="center">
                                                            <th>No</th>
                                                            <th>Nama Pegawai</th>
                                                            <th>NIP</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                            $no = 1;
                                                            $data = $link->query("SELECT * FROM pegawai");
                                                            while ($row = $data->fetch_array()) {
                                                            ?>
                                                        <tr>
                                                            <td align="center" width="5%"><?= $no++ ?></td>
                                                            <td><?= $row['nama'] ?></td>
                                                            <td><?= $row['nip'] ?></td>
                                                            <td align="center" width="18%">
                                                                <button class="btn btn-xs btn-success" class="close"
                                                                    aria-label="Close" data-dismiss="modal" id="select"
                                                                    data-id_pegawai="<?= $row['id_pegawai'] ?>"
                                                                    data-nama="<?= $row['nama'] ?>"
                                                                    data-nip="<?= $row['nip'] ?>">
                                                                    Pilih
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- MODAL END -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script>
    $(function() {
        const tabs = document.querySelectorAll('[role=tab]');
        const tabPanels = document.querySelectorAll('[role=tabpanel]');
        tabs.forEach(tab => {
            tab.addEventListener('click', (event) => {
                event.preventDefault();
                const targetId = tab.dataset.toggle;
                const target = document.getElementById(targetId);
                if (!target) return;
                tabs.forEach(tab => tab.classList.remove('active'));
                tabPanels.forEach(tabPanel => tabPanel.classList.remove('active'));
                tab.classList.add('active');
                target.classList.add('active');
            });
        });
    });

    function standarNilaiKinerja(nilai) {
        nilai = parseInt(nilai);
        const dibawahStandar = [0, 'Buruk'];
        const standars = [
            [50, 'Kurang'],
            [60, 'Cukup'],
            [70, 'Baik'],
            [90, 'Sangat Baik'],
        ];

        const hasil = standars.reduce((prev, current, i, arr) => {
            if (nilai > current[0]) return current[1]
            return prev
        }, dibawahStandar[1]);
        return hasil;
    }

    // NIlai Akhir Assesment
    function standarNilaiPkp(nilai) {
        nilai = parseInt(nilai);
        const dibawahStandar = [0, 'Buruk'];
        const standars = [
            [50, 'Kurang'],
            [60, 'Cukup'],
            [70, 'Baik'],
            [90, 'Sangat Baik'],
        ];

        const hasil = standars.reduce((prev, current, i, arr) => {
            if (nilai > current[0]) return current[1]
            return prev
        }, dibawahStandar[1]);
        return hasil;
    }

    function changeNilaiPkp(htmlSelector, nilai) {
        const label = document.querySelector(htmlSelector);
        const standar = standarNilaiPkp(nilai);
        label.value = standar;
        // inputNilaiNaa.value = nilai; // Memperbarui nilai Naa
        updateTotalKinerja();
    }

    function rumusNilaiPkp(nilai) {
        const hasil = Number(nilai) * 60 / 100;

        if (!hasil) return 0;
        return hasil.toFixed(2)
    }

    function changePkp(htmlSelector, nilai) {
        const label = document.querySelector(htmlSelector);
        const hasil = rumusNilaiPkp(nilai);
        label.value = hasil;
        updateTotalKinerja();
    }

    // Nilai Rekam Jejak
    function standarNilaiPp(nilai) {
        nilai = parseInt(nilai);
        const dibawahStandar = [0, 'Buruk'];
        const standars = [
            [50, 'Kurang'],
            [60, 'Cukup'],
            [70, 'Baik'],
            [90, 'Sangat Baik'],
        ];

        const hasil = standars.reduce((prev, current, i, arr) => {
            if (nilai > current[0]) return current[1]
            return prev
        }, dibawahStandar[1]);
        return hasil;
    }

    function changeNilaiPp(htmlSelector, nilai) {
        const label = document.querySelector(htmlSelector);
        const standar = standarNilaiPp(nilai);
        label.value = standar;
        updateTotalKinerja();
    }

    function rumusNilaiPp(nilai) {
        const hasil = Number(nilai) * 40 / 100;

        if (!hasil) return 0;
        return hasil.toFixed(2)
    }

    function changePp(htmlSelector, nilai) {
        const label = document.querySelector(htmlSelector);
        const hasil = rumusNilaiPp(nilai);
        label.value = hasil;
        updateTotalKinerja();
    }

    const inputNilaiPkp = document.querySelector('#nilai_pkp');

    const inputNilaiPp = document.querySelector('#nilai_pp');

    const inputNilaiKinerja = document.querySelector('#nilai_kinerja');
    const labelNilaiKinerja = document.querySelector(inputNilaiKinerja.dataset.label);


    inputNilaiPkp.addEventListener('keyup', (event) => changePkp('#nilai_pkp_label', event.target.value));
    inputNilaiPp.addEventListener('keyup', (event) => changePp('#nilai_pp_label', event.target.value));

    inputNilaiKinerja.addEventListener('keyup', (event) => changeKinerja('nilai_kinerja', event.target
        .value));

    function updateTotalKinerja() {
        const nilaiPkpLabel = parseFloat(document.querySelector('#nilai_pkp_label').value) || 0;
        const nilaiPpLabel = parseFloat(document.querySelector('#nilai_pp_label').value) || 0;

        const totalNilai = nilaiPkpLabel + nilaiPpLabel;
        inputNilaiKinerja.value = totalNilai.toFixed(2);
        labelNilaiKinerja.value = standarNilaiKinerja(totalNilai);
    }
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#select', function() {

            var id_pegawai = $(this).data('id_pegawai');
            var nama = $(this).data('nama');
            var nip = $(this).data('nip');

            $('#id_pegawai').val(id_pegawai);
            $('#nama').val(nama);
            $('#nip').val(nip);

            $('#modal').modal('hide');
        });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#select', function() {

            var id_pegawai = $(this).data('id_pegawai');
            var nama = $(this).data('nama');
            var nip = $(this).data('nip');

            $('#id_pegawai').val(id_pegawai);
            $('#nama').val(nama);
            $('#nip').val(nip);

            $('#modal').modal('hide');
        });
    });
    </script>

    <?php
    if (isset($_POST['edit'])) {

        $id_pegawai = $_POST['id_pegawai'];
        $pkp = $_POST['pkp'];
        $pp = $_POST['pp'];
        $nk = $_POST['nk'];


        $edit = $link->query("UPDATE kinerja SET 
id_pegawai = '$id_pegawai', 
pkp = '$pkp',
pp = '$pp',
nk = '$nk'

WHERE id_kinerja = '$id'");

        if ($edit) {
            echo "<script>
Swal.fire({
icon: 'success',
title: 'Data berhasil disimpan',
customClass: {
    confirmButton: 'btn btn-primary'
    },
    buttonsStyling: false
}).then(function() {
window.location.href = '?page=data_kinerja'; 
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
window.location.href = '?page=edit_kinerja'; 
});
</script>";
        }
    }
}


    ?>