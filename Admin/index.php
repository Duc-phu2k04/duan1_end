<?php
// Bao gồm các file cần thiết
include "../model/pdo.php";
include "../model/thongke.php";
include "../model/donhang.php";
include "../model/giohang.php";
include "../model/binhluan.php";
include "../model/tong.php";
include "../model/taikhoan.php";  // Đã thêm phần include taikhoan.php từ nhánh `main`

// Bao gồm header
include "header.php";

// Controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {

        // Bình luận
        case "listbl":
            $listbl = loadall_binhluan($id_sp);
            $listbinhluan = loadall_binhluan_admin();
            include "binhluan/list.php";
            break;

        // Thống kê
        case "thongke":
            $listthongke = loadall_thongke();
            include "thongke/list.php";
            break;

        case "bieudo":
            $listthongke = loadall_thongke();
            include "thongke/bieudo.php";
            break;

        // Tài khoản (từ nhánh `main`)
        case "listtk":
            $listtaikhoan = loadall_taikhoan();
            $listrole = loadall_role();
            include "taikhoan/list.php";
            break;

        case "updatetk":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $nguoidung = $_POST['nguoidung'];
                $matkhau = $_POST['matkhau'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $sdt = $_POST['sdt'];
                $id_role = $_POST['id_role'];
                update_taikhoan_admin($id, $nguoidung, $matkhau, $email, $diachi, $sdt, $id_role);
                $thongbao = "Cập nhật thành công";
            }
            $listrole = loadall_role();
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;

        case "xoatk":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;

        case "suatk":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $taikhoan = loadone_taikhoan($_GET['id']);
            }
            $listrole = loadall_role();
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/update.php";
            break;

        default:
            // Nếu không có hành động nào phù hợp
            echo "Action không hợp lệ!";
            break;
    }
} else {
    // Nếu không có act trong URL
    $kym = isset($_POST['listok']) && ($_POST['listok']) ? $_POST['kym'] : "";
    $iddm = isset($_POST['listok']) && ($_POST['listok']) ? $_POST['iddm'] : 0;

    $listthongke = loadall_thongke();
    $tongdm = tinhtongdm();
    $tongsp = tinhtongsp();
    $tongtk = tinhtongtk();
    $tongbl = tinhtongbl();
    include "home.php";
}

// Bao gồm footer
include "footer.php";
?>
