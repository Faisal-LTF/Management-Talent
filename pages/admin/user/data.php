<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
} else {

    $id = $_SESSION['id_user'];
    $query = mysqli_query($link, "SELECT * FROM users WHERE id_user = '$id' ");
    $data = $query->fetch_array();

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
            window.location.href = `?page=hapus_user&id=${id}`;
        }
    });
}
</script>


<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table id="example" class="table align-items-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $query = mysqli_query($link, "SELECT * FROM users");
                            $i = 1;
                            while ($row = $query->fetch_array()) {
                            ?>
                        <tr>

                            <td class="w-0" align="left"><?= $i++ ?></td>
                            <td class="w-5" align="left"><?= $row['username']; ?></td>
                            <td class="w-30"><?= $row['email']; ?></td>
                            <td class="w-5" align="left">
                                <?php
                                        if ($row['level'] == 0) {
                                            echo "Admin";
                                        } elseif ($row['level'] == 1) {
                                            echo "Pegawai";
                                        } elseif ($row['level'] == 2) {
                                            echo "Masyarakat";
                                        } elseif ($row['level'] == 3) {
                                            echo "Camat";
                                        }
                                        ?>
                            </td>
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
    <!--/ DataTable with Buttons -->




    <?php
}
    ?>