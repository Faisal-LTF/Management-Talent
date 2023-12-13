<?php
session_start();
if (!isset($_SESSION['idUser'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
} else {

    include '../public/layouts/header.php';
    include '../public/layouts/sidebar.php';
    include '../db/koneksi.php';


    $id = $_SESSION['idUser'];

?>
<?php
    error_reporting(0);
    switch ($_GET['page']) {
        default:

            if ($level === '0') {
                include "../public/dashboard.php";
            }
            break;


        case "data_user";
            include "../pages/admin/user/data.php";
            break;
        case "tambah_user";
            include "../pages/admin/user/add.php";
            break;
        case "edit_user";
            include "../pages/admin/user/edit.php";

            break;
        case "data_pegawai";
            include "../pages/admin/pegawai/data.php";
            break;
        case "tambah_pegawai";
            include "../pages/admin/pegawai/add.php";
            break;
        case "edit_pegawai";
            include "../pages/admin/pegawai/edit.php";

            break;
        case "hapus_user";
            include "../pages/admin/user/delete.php";
            break;
    }
?>

<?php
    include '../public/layouts/footer.php';
}
?>