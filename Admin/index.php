<?php

include "../model/pdo.php";
include "../model/sanpham.php";
include "../model/danhmuc.php";
include "../model/taikhoan.php";
include "../model/thongke.php";
include "../model/donhang.php";
include "../model/giohang.php";
include "../model/sptheomua.php";
include "../model/binhluan.php";
include "../model/tong.php";

include "header.php";

// contronler
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

        // Danh mục
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
                    //echo "Load ảnh thành công";
                } else {
                    //echo "Upload ảnh không thành công";
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

        // Sản phẩm
        case "listsp":
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
                $id_sp_theomua = $_POST['id_sp_theomua'];
            } else {
                $kyw = '';
                $iddm = 0;
                $id_sp_theomua = 0;
            }

            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $iddm);
            include "sanpham/list.php";
            break;

        case "chitietsp":
            if (isset($_GET['id']) && $_GET['id'] > 0) {

                $sanpham = loadone_sanpham($_GET['id']);


            }
            $listmua = loadall_sptheomua();
            $listbinhluan = loadall_binhluan_admin();
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/chitietsp.php";
            break;

        case "addsp":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {

                $iddm = $_POST['iddm'];
                $id_sptheomua = $_POST['id_sptheomua'];
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
                    //echo "Load ảnh thành công";
                } else {
                    //echo "Upload ảnh không thành công";
                }
                insert_sanpham($tensp, $giasp, $hinh, $mota, $soluong, $luotxem, $trangthai, $iddm, $id_sptheomua);
                $thongbao = "Thêm thành công";
            }
            $listmua = loadall_sptheomua();
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
            $listmua = loadall_sptheomua();
            include "sanpham/update.php";
            break;

        case "updatesp":
            if (isset($_POST["capnhat"]) && ($_POST["capnhat"])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $id_sptheomua = $_POST['id_sptheomua'];
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
                    //echo "Load ảnh thành công";
                } else {
                    // echo "Upload ảnh không thành công";
                }

                update_sanpham($id, $iddm, $id_sptheomua, $tensp, $giasp, $mota, $soluong, $luotxem, $trangthai, $hinh);
                $thongbao = 'Cập nhật thành công';

            }

            $listmua = loadall_sptheomua();
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham();
            include "sanpham/list.php";
            break;

        // Bình luận
        case "listbl":

            $listsanpham = loadall_sanpham("", 0);
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

        // Đơn hàng
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
            $tongdm = tinhtongdm();
            $tongsp = tinhtongsp();
            $tongtk = tinhtongtk();
            $tongbl = tinhtongbl();
            $listdanhmuc = loadall_danhmuc();
            $listthongke = loadall_thongke();
            $listsanpham = loadall_sanpham($kym, $iddm);
            include "home.php";
            break;
    }
} else {

    if (isset($_POST['listok']) && ($_POST['listok'])) {
        $kym = $_POST['kym'];
        $iddm = $_POST['iddm'];
    } else {
        $kym = "";
        $iddm = 0;
    }
    ;
    $listthongke = loadall_thongke();
    $tongdm = tinhtongdm();
    $tongsp = tinhtongsp();
    $tongtk = tinhtongtk();
    $tongbl = tinhtongbl();
    $listdanhmuc = loadall_danhmuc();
    $listsanpham = loadall_sanpham($kym, $iddm);
    include "home.php";
}



include "footer.php";
?>