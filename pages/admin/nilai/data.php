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
            window.location.href = `?page=hapus_nilai&id=${id}`;
        }
    });
}
</script>


<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-12 text-end mb-3">
            <a href="?page=tambah_nilai" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table id="example" class="table align-items-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th class="text-center">Nilai Akhir Assesment</th>
                            <th class="text-center">Nilai Rekam Jejak</th>
                            <th class="text-center">Nilai Potensial</th>
                            <th class="text-center">Predikat Kinerja Pegawai</th>
                            <th class="text-center">Presensi Pegawai</th>
                            <th class="text-center">Nilai Kinerja</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $query = mysqli_query($link, "SELECT * FROM nilai n join pegawai p on n.id_pegawai = p.id_pegawai");
                            $i = 1;
                            while ($row = $query->fetch_array()) {
                            ?>
                        <tr>
                            <td align="left"><?= $i++ ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td align="center"><?= $row['naa']; ?></td>
                            <td align="center"><?= $row['nrj']; ?></td>
                            <td align="center"><?= $row['np']; ?></td>
                            <td align="center"><?= $row['pkp']; ?></td>
                            <td align="center"><?= $row['pp']; ?></td>
                            <td align="center"><?= $row['nk']; ?></td>
                            <td class="w-5">
                                <div class=" mt-3">
                                    <button type="button"
                                        class="btn btn-primary dropdown-toggle border-radius-lg px-3 py-1 "
                                        id="dropdownMenuButton" data-bs-toggle="dropdown">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                    <ul class="dropdown-menu shadow-lg mt-2  dropdown-menu-end px-2 py-2 me-sm-n4"
                                        role="menu">
                                        <li><a class="dropdown-item border-radius-md"
                                                href="?page=edit_nilai&id=<?= $row[0]; ?>"><i class="fa fa-edit"></i>
                                                Edit Data</a></li>
                                        <li><a class="dropdown-item border-radius-md"
                                                onclick="confirmDelete(<?= $row[0]; ?>);" href="#">
                                                <i class="fa fa-trash"></i> Hapus
                                            </a></li>
                                    </ul>
                                </div>
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
</div>
<!--/ DataTable with Buttons -->




<?php
}
?>