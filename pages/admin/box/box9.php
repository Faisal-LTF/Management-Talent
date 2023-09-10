<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
} else {


?>
<script src="../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>

<script>
function confirmDelete(id) {
    Swal.fire({
        icon: 'warning',
        title: 'Anda yakin ingin menghapus data?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        customClass: {
            confirmButton: 'btn btn-primary me-1',
            cancelButton: 'btn btn-label-secondary'
        },
        buttonsStyling: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `?page=hapus&id=${id}`;
        }
    });
}
</script>


<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class=" text-center mb-3">
            <a href="home.php" class="btn btn-info">BOX 9 <br> <br> KINERJA DIATAS EKSPEKTASI DAN POTENSI TINGGI
            </a>
        </div>
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table id="example" class="table align-items-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Nilai Potensi</th>
                            <th class="text-center">Nilai Kinerja</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $query = mysqli_query($link, "SELECT n.id_nilai, n.id_pegawai, n.np, n.nk, p.nama
                            FROM nilai n
                            JOIN pegawai p ON n.id_pegawai = p.id_pegawai
                            WHERE n.np BETWEEN 91 AND 100 AND n.nk BETWEEN 91 AND 100");
                            $i = 1;
                            while ($row = $query->fetch_array()) {
                            ?>
                        <tr>
                            <td align="left"><?= $i++ ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td align="center"><?= $row['np']; ?></td>
                            <td align="center"><?= $row['nk']; ?></td>
                        </tr>
                        <?php
                            }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>





    <?php
}
    ?>