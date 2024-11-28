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
    // Lấy tham số act từ URL
    $act = $_GET['act'];

    // Kiểm tra hành động và xử lý
    switch ($act) {

        // Bình luận
        case "listbl":
            $id_sp = isset($_GET['id_sp']) ? $_GET['id_sp'] : 0; // Lấy id sản phẩm từ URL
            $listbl = loadall_binhluan($id_sp); // Lấy tất cả bình luận theo id sản phẩm
            $listbinhluan = loadall_binhluan_admin(); // Lấy tất cả bình luận từ admin
            // Kiểm tra và bao gồm file list.php nếu tồn tại
            if (file_exists("sanpham/listbl.php")) {  // Sửa đường dẫn thành "sanpham/listbl.php"
                include "sanpham/listbl.php"; // Bao gồm file quản lý bình luận
            } else {
                echo "File sanpham/listbl.php không tồn tại!";
            }
            break;

        // Thống kê
        case "thongke":
            $listthongke = loadall_thongke(); // Lấy dữ liệu thống kê
            include "thongke/list.php"; // Bao gồm trang thống kê
            break;

        case "bieudo":
            $listthongke = loadall_thongke(); // Lấy dữ liệu thống kê
            include "thongke/bieudo.php"; // Bao gồm trang biểu đồ
            break;

        // Tài khoản (từ nhánh `main`)
        case "listtk":
            $listtaikhoan = loadall_taikhoan(); // Lấy danh sách tài khoản
            $listrole = loadall_role(); // Lấy danh sách vai trò
            include "taikhoan/list.php"; // Bao gồm trang quản lý tài khoản
            break;

        case "updatetk":
            // Cập nhật tài khoản
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
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
            include "taikhoan/list.php"; // Bao gồm trang quản lý tài khoản
            break;

        case "xoatk":
            // Xóa tài khoản
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                delete_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php"; // Bao gồm trang quản lý tài khoản
            break;

        case "suatk":
            // Sửa tài khoản
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $taikhoan = loadone_taikhoan($_GET['id']);
            }
            $listrole = loadall_role();
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/update.php"; // Bao gồm trang sửa tài khoản
            break;

        default:
            // Nếu không có hành động nào phù hợp, hiển thị trang chủ
            echo "Action không hợp lệ!";
            break;
    }
} else {
    // Nếu không có tham số 'act', hiển thị trang tổng quan (dashboard)
    $kym = isset($_POST['listok']) && $_POST['listok'] ? $_POST['kym'] : "";
    $iddm = isset($_POST['listok']) && $_POST['listok'] ? $_POST['iddm'] : 0;

    $listthongke = loadall_thongke(); // Lấy dữ liệu thống kê
    $tongdm = tinhtongdm(); // Tính tổng danh mục
    $tongsp = tinhtongsp(); // Tính tổng sản phẩm
    $tongtk = tinhtongtk(); // Tính tổng tài khoản
    $tongbl = tinhtongbl(); // Tính tổng bình luận
    include "home.php"; // Bao gồm trang tổng quan
}

// Bao gồm footer
include "footer.php";
?>
