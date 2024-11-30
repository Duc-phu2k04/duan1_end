<?php

// Import các tệp model cần thiết
include "../model/pdo.php";
include "../model/taikhoan.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/thongke.php";
include "../model/donhang.php";
include "../model/giohang.php";
include "../model/binhluan.php";
include "../model/tong.php";

// Bao gồm header
include "header.php";

// Controller chính
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
            // Kiểm tra và bao gồm file listbl.php nếu tồn tại
            if (file_exists("binhluan/listbl.php")) {  // Đảm bảo đường dẫn đúng
                include "binhluan/listbl.php"; // Bao gồm file quản lý bình luận
            } else {
                echo "";
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

        // Tài khoản
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

        // Don hàng
        case "listdh":
            $listdonhang = loadall_donhang();
            include "donhang/list.php";
            break;

        case "chitietdh":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $giohang = load_cart($_GET['id']);
                $donhang = loadone_donhang($_GET['id']);
            }
            include "donhang/chitietdh.php";
            break;

        case "suadh":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $donhang = loadone_donhang($_GET['id']);
            }
            $listtrangthai = loadall_trangthai();
            $listdonhang = loadall_donhang();
            include "donhang/update.php";
            break;

        case "xoadh":
            if (isset($_GET['id']) && ($_GET['id'])) {
                delete_donhang($_GET['id']);
            }
            $listdonhang = loadall_donhang();
            include "donhang/list.php";
            break;

        case "updatedh":
            if (isset($_POST["capnhat"]) && ($_POST["capnhat"])) {
                $id = $_POST['id'];
                $nguoidung = $_POST['nguoidung'];
                $sdt = $_POST['sdt'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $thoigian_mua = $_POST['thoigian_mua'];
                $soluong = $_POST['soluong'];
                $id_trangthai_donhang = $_POST['trangthai'];

                update_donhang($id, $nguoidung, $sdt, $email, $diachi, $thoigian_mua, $soluong, $id_trangthai_donhang);
                $thongbao = 'Cập nhật thành công';
            }
            $listtrangthai = loadall_trangthai();
            $listsanpham = loadall_sanpham();
            $listdonhang = loadall_donhang();
            include "donhang/list.php";
            break;

        // Quản lý danh mục
        case "listdm":
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case "adddm":
            if (isset($_POST["themmoi"]) && ($_POST["themmoi"])) {
                $tendm = $_POST['tendm'];
                $img = $_FILES['hinh']['name'];
                $target_dir = "../upload_file/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // File uploaded thành công
                }
                insert_danhmuc($tendm, $img);
                $thongbao = "Thêm thành công danh mục";
            }
            include "danhmuc/add.php";
            break;

        case "suadm":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $danhmuc = loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;

        case "xoadm":
            if (isset($_GET['id']) && ($_GET['id'])) {
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case "updatedm":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $tendm = $_POST['tendm'];
                $hinh = $_POST['img'];
                update_danhmuc($id, $tendm, $hinh);
                $thongbao = "Cập nhật thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        // Quản lý sản phẩm
        case "listsp":
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
                $id_sp_theodotuoi = $_POST['id_sp_theodotuoi'];
            } else {
                $kyw = '';
                $iddm = 0;
                $id_sp_theodotuoi = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $iddm);
            include "sanpham/list.php";
            break;

        case "chitietsp":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            include "sanpham/chitietsp.php";
            break;

        default:
            echo "Action không hợp lệ!";
            break;
    }
} else {
    echo "Không có hành động được chỉ định!";
}

// Bao gồm footer
include "footer.php";
?>
