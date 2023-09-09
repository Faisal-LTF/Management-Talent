<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
} else {

    include '../public/layouts/header.php';
    include '../public/layouts/sidebar.php';
    include '../db/koneksi.php';


    $id = $_SESSION['id_user'];

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
        case "data_potensi";
            include "../pages/admin/potensi/data.php";
            break;
        case "tambah_potensi";
            include "../pages/admin/potensi/add.php";

            break;
        case "hapus_potensi";
            include "../pages/admin/potensi/delete.php";
            break;
        case "edit_potensi";
            include "../pages/admin/potensi/edit.php";
            break;
        case "data_kinerja";
            include "../pages/admin/kinerja/data.php";
            break;

        case "tambah_kinerja";
            include "../pages/admin/kinerja/add.php";
            break;
        case "edit_kinerja";
            include "../pages/admin/kinerja/edit.php";
            break;
        case "hapus_pegawai";
            include "../pages/admin/pegawai/delete.php";
            break;
        case "hapus_kinerja";
            include "../pages/admin/kinerja/delete.php";
            break;
        case "data_nilai";
            include "../pages/admin/nilai/data.php";
            break;
        case "data_box1";
            include "../pages/admin/box/box1.php";
            break;
        case "data_box2";
            include "../pages/admin/box/box2.php";
            break;
        case "data_box3";
            include "../pages/admin/box/box3.php";
            break;
        case "data_box4";
            include "../pages/admin/box/box4.php";
            break;
        case "data_box5";
            include "../pages/admin/box/box5.php";
            break;
        case "data_box6";
            include "../pages/admin/box/box6.php";
            break;
        case "data_box7";
            include "../pages/admin/box/box7.php";
            break;
        case "data_box8";
            include "../pages/admin/box/box8.php";
            break;
        case "data_box9";
            include "../pages/admin/box/box9.php";
            break;
        case "tambah_nilai";
            include "../pages/admin/nilai/add.php";
            break;
        case "edit_nilai";
            include "../pages/admin/nilai/edit.php";
            break;
        case "hapus_nilai";
            include "../pages/admin/nilai/delete.php";
            break;
    }
?>

<?php
    include '../public/layouts/footer.php';
}
?>