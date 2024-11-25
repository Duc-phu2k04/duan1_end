<?php

include "../model/pdo.php";
include "../model/thongke.php";
include "../model/donhang.php";
include "../model/giohang.php";
include "../model/binhluan.php";
include "../model/tong.php";

include "header.php";

// contronler
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        // Bình luận
        case "listbl":

            // $listsanpham = loadall_sanpham("", 0);
            $listbl = loadall_binhluan($id_sp);
            $listbinhluan = loadall_binhluan_admin();
            include "binhluan/list.php";
            break;

        // Thống kê
        case "thongke":
            // $listthongke = loadall_thongke();
            include "thongke/list.php";
            break;

        case "bieudo":
            // $listthongke = loadall_thongke();
            include "thongke/bieudo.php";
            break;
        default:
            // $tongdm = tinhtongdm();
            // $tongsp = tinhtongsp();
            // $tongtk = tinhtongtk();
            // $tongbl = tinhtongbl();
            // $listdanhmuc = loadall_danhmuc();
            // $listthongke = loadall_thongke();
            // $listsanpham = loadall_sanpham($kym, $iddm);
            // include "home.php";
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
    // $listthongke = loadall_thongke();
    // $tongdm = tinhtongdm();
    // $tongsp = tinhtongsp();
    // $tongtk = tinhtongtk();
    // $tongbl = tinhtongbl();
    // $listdanhmuc = loadall_danhmuc();
    // $listsanpham = loadall_sanpham($kym, $iddm);
    include "home.php";
}



include "footer.php";
?>