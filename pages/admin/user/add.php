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
            <h4 class="py-1 ms-3 mb-1"><span class="text-muted fw-light">Tambah</span> Data Users</h4>
            <div class="col-12 text-end mb-3">
                <a href="?page=data_user" class="btn btn-primary">Kembali</a>
            </div>
            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Data User</h5>
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
                                    <label class="form-label" for="basic-icon-default-fullname">Username</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                                        <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Username" name="username" aria-label="Username" aria-describedby="basic-icon-default-fullname2" required />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-company">Password</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-password2" class="input-group-text"><i class="ti ti-building"></i></span>
                                        <input type="password" id="basic-icon-default-password" class="form-control" placeholder="Password." name="password" aria-label="Password." aria-describedby="basic-icon-default-password" required />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-company">Konfirmasi Password</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-password2" class="input-group-text"><i class="ti ti-building"></i></span>
                                        <input type="password" id="basic-icon-default-password" class="form-control" placeholder="Password." name="konfirmasi" aria-label="Password." aria-describedby="basic-icon-default-password" required />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-email">Email</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="ti ti-mail"></i></span>
                                        <input type="text" id="basic-icon-default-email" class="form-control" placeholder="Enter your email" name="email" aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
                                        <span id="basic-icon-default-email2" class="input-group-text text-muted fw-light">@jhonlin.com</span>
                                    </div>
                                    <div class="form-text">You can use letters, numbers & periods</div>
                                </div>
                                <input type="hidden" name="level" class="form-control" value="0" required />

                                <button type="submit" name="simpan" class="btn btn-primary">Save</button>
                                <button type="reset" name="reset" class="btn btn-danger">Reset</button>

                                <!-- <div class="col ms-4">
                                <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                                <input type="reset" class="btn btn-danger" value="Reset" name="reset">
                            </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>


    <?php
    if (isset($_POST['simpan'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $password2 = $_POST['konfirmasi'];
        $email = $_POST['email'];
        $level = $_POST['level'];

        $result = mysqli_query($link, "SELECT * FROM users WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'username sudah terdaftar!',
                customClass: {
                    confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                }).then(function() {
                window.location.href = '?page=tambah_user'; 
            });
        </script>";

            return false;
        }
        if ($password !== $password2) {
            echo "<script>
            Swal.fire({
                icon: 'warning',
                title: 'konfirmasi password tidak sesuai!',
                customClass: {
                    confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                }).then(function() {
                window.location.href = '?page=tambah_user'; 
            });
        </script>";
            return false;
        }
        $pass = md5($password);

        $simpan = $link->query("INSERT INTO users (username, password, email, level) VALUES ('$username', '$pass', '$email', '$level')");

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
                window.location.href = '?page=data_user'; 
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
                window.location.href = '?page=tambah_user'; 
            });
        </script>";
        }
    }
}
    ?>