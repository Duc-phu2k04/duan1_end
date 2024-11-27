<?php

include "../model/pdo.php";
include "../model/taikhoan.php";
include "../model/donhang.php";


include "header.php";

// controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {

        // Tài khoản
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
// don hang
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

        default:
            // Nếu không có hành động nào phù hợp
            echo "Action không hợp lệ!";
            break;
    }
} else {
    // Nếu không có act trong URL
    echo "Không có hành động nào được yêu cầu!";
}

include "footer.php";
?>
