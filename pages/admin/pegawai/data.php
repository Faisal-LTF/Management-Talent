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
            window.location.href = `?page=hapus_pegawai&id=${id}`;
        }
    });
}
</script>


<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-12 text-end mb-3">
            <a href="?page=tambah_pegawai" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table id="example" class="table align-items-center">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Nama</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Tempat Lahir</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>nip</th>
                            <th>golongan</th>
                            <th>jabatan</th>
                            <th>No Telepon</th>
                            <th>Instansi</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $query = mysqli_query($link, "SELECT * FROM pegawai");
                            $i = 1;
                            while ($row = $query->fetch_array()) {
                            ?>
                        <tr>

                            <td align="left"></td>
                            <td align="left"><?= $i++ ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['jk']; ?></td>
                            <td><?= $row['tempatLahir']; ?></td>
                            <td class="w-10"><?= $row['tanggalLahir']; ?></td>
                            <td><?= $row['alamat']; ?></td>
                            <td><?= $row['nip']; ?></td>
                            <td><?= $row['golongan']; ?></td>
                            <td><?= $row['jabatan']; ?></td>
                            <td><?= $row['no_tlp']; ?></td>
                            <td><?= $row['instansi']; ?></td>
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
                                                href="?page=edit_pegawai&id=<?= $row[0]; ?>"><i class="fa fa-edit"></i>
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
        <!-- Modal to add new record -->
        <div class="offcanvas offcanvas-end" id="add-new-record">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body flex-grow-1">
                <form class="add-new-record pt-0 row g-2" id="form-add-new-record" onsubmit="return false">
                    <div class="col-sm-12">
                        <label class="form-label" for="basicFullname">Full Name</label>
                        <div class="input-group input-group-merge">
                            <span id="basicFullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                            <input type="text" id="basicFullname" class="form-control dt-full-name" name="basicFullname"
                                placeholder="John Doe" aria-label="John Doe" aria-describedby="basicFullname2" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicPost">Post</label>
                        <div class="input-group input-group-merge">
                            <span id="basicPost2" class="input-group-text"><i class="ti ti-briefcase"></i></span>
                            <input type="text" id="basicPost" name="basicPost" class="form-control dt-post"
                                placeholder="Web Developer" aria-label="Web Developer" aria-describedby="basicPost2" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicEmail">Email</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="ti ti-mail"></i></span>
                            <input type="text" id="basicEmail" name="basicEmail" class="form-control dt-email"
                                placeholder="john.doe@example.com" aria-label="john.doe@example.com" />
                        </div>
                        <div class="form-text">You can use letters, numbers & periods</div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicDate">Joining Date</label>
                        <div class="input-group input-group-merge">
                            <span id="basicDate2" class="input-group-text"><i class="ti ti-calendar"></i></span>
                            <input type="text" class="form-control dt-date" id="basicDate" name="basicDate"
                                aria-describedby="basicDate2" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicSalary">Salary</label>
                        <div class="input-group input-group-merge">
                            <span id="basicSalary2" class="input-group-text"><i
                                    class="ti ti-currency-dollar"></i></span>
                            <input type="number" id="basicSalary" name="basicSalary" class="form-control dt-salary"
                                placeholder="12000" aria-label="12000" aria-describedby="basicSalary2" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary"
                            data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ DataTable with Buttons -->




<?php
}
?>