<?php

// Import các tệp model cần thiết
include "../model/pdo.php";
include "../model/taikhoan.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";

include "header.php";

// Controller chính
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {

        // Quản lý tài khoản
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
            $luotmua = loadall_sptheodotuoi();
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/chitietsp.php";
            break;

        case "addsp":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST['iddm'];
                $id_sptheodotuoi = $_POST['id_sptheodotuoi'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $soluong = $_POST['soluong'];
                $luotxem = $_POST['luotxem'];
                $trangthai = $_POST['trangthai'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload_file/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // File uploaded thành công
                }
                insert_sanpham($tensp, $giasp, $hinh, $mota, $soluong, $luotxem, $trangthai, $iddm, $id_sptheodotuoi);
                $thongbao = "Thêm thành công sản phẩm";
            }
            $luotmua = loadall_sptheodotuoi();
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/add.php";
            break;

        case "xoasp":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sapham($_GET['id']);
            }
            $listsanpham = loadall_sanpham(" ", 0);
            include "sanpham/list.php";
            break;

        case "suasp":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            $luotmua = loadall_sptheodotuoi();
            include "sanpham/update.php";
            break;

        case "updatesp":
            if (isset($_POST["capnhat"]) && ($_POST["capnhat"])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $id_sptheodotuoi = $_POST['id_sptheodotuoi'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $soluong = $_POST['soluong'];
                $luotxem = $_POST['luotxem'];
                $trangthai = $_POST['trangthai'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload_file/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // File uploaded thành công
                }
                update_sanpham($id, $iddm, $id_sptheodotuoi, $tensp, $giasp, $mota, $soluong, $luotxem, $trangthai, $hinh);
                $thongbao = 'Cập nhật thành công';
            }
            $listmua = loadall_sptheodotuoi();
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham();
            include "sanpham/list.php";
            break;

        default:
            echo "Action không hợp lệ!";
            break;
    }
} else {
    echo "Không có hành động nào được yêu cầu!";
}

include "footer.php";
?>