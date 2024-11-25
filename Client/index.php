<?php

session_start();
ob_start();
include("../model/pdo.php");
include("../model/taikhoan.php");
include("../model/binhluan.php");
include("../model/danhmuc.php");
include("../model/sanpham.php");
include("../model/sptheomua.php");
include("../model/giohang.php");
include("../model/donhang.php");
include("global.php");

include("header.php");

if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}

if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        //Liên Hệ
        case "lienhe":
            include("view/menu/lienhe.php");
            break;

        case "about":
            include("view/menu/about.php");
            break;


        case 'addgiohang':
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id = $_POST['id'];
                $tensp = $_POST['tensp'];
                $img = $_POST['img'];
                $giasp = $_POST['giasp'];
                $soluong = $_POST['soluong'];
                $thanhtien = ((int) $soluong * (int) $giasp);
                $sanphamadd = [$id, $tensp, $img, $giasp, $soluong, $thanhtien];
                if (isset($_SESSION['mycart'])) {
                    $cartItems = $_SESSION['mycart'];
                    $existingItemKey = null;
                    foreach ($cartItems as $key => $item) {
                        if ($item[0] == $id) {
                            $existingItemKey = $key;
                            break;
                        }
                    }
                }
                if ($existingItemKey !== null) {
                    $cartItems[$existingItemKey][5] += $thanhtien;
                    $cartItems[$existingItemKey][4]++;
                } else {

                    array_push($cartItems, $sanphamadd);
                }
                $_SESSION['mycart'] = $cartItems;
            }

            if (isset($_POST['tangsoluong']) && $_POST['tangsoluong']) {
                $id = $_POST['id'];
                $cartItems = $_SESSION['mycart'];

                // Tìm kiếm sản phẩm trong giỏ hàng
                foreach ($cartItems as $key => $item) {
                    if ($item[0] == $id) {
                        // Tăng số lượng và giá tiền của sản phẩm
                        $cartItems[$key][4]++;
                        $cartItems[$key][5] += (int) $item[3];
                        break;
                    }
                }
                //Lưu giỏ hàng SESSION
                $_SESSION['mycart'] = $cartItems;
            }

            if (isset($_POST['giamsoluong']) && $_POST['giamsoluong']) {
                $id = $_POST['id'];
                $cartItems = $_SESSION['mycart'];

                // Tìm kiếm sản phẩm trong giỏ hàng
                foreach ($cartItems as $key => $item) {
                    if ($item[0] == $id) {
                        // Giảm số lượng và giá tiền của sản phẩm
                        if ($item[4] > 1) {
                            $cartItems[$key][4]--;
                            $cartItems[$key][5] -= (int) $item[3];
                            break;
                        }
                    }
                }
                //Lưu giỏ hàng SESSION
                $_SESSION['mycart'] = $cartItems;
            }
            // $sanphamtop6 = load_sanpham_top6();
             include('view/menu/giohang.php');
            break;

        case "thanhtoan":
            if (isset($_SESSION["user"]) === [] || !isset($_SESSION['user'])) {
                echo "Bạn chưa đăng nhập tài khoản";
                die;
            }

            $donhang = null;
            $giohang = null;
            if (isset($_POST['dongythanhtoan']) && ($_POST['dongythanhtoan'])) {
                $nguoidung = $_POST['nguoidung'];
                $diachi = $_POST['diachi'];
                $sdt = $_POST['sdt'];
                $email = $_POST['email'];
                $thoigian_mua = date('d/m/Y');
                $pt_thanhtoan = $_POST['pt_thanhtoan'];

              $id_dathang = insert_donhang($nguoidung, $sdt, $email, $diachi, $thoigian_mua, $pt_thanhtoan, count($_SESSION['mycart']), $_SESSION['user']['id']);

                 $donhang = loadone_donhang($id_dathang);
                $giohang = load_cart($id_dathang);
                 foreach ($_SESSION['mycart'] as $cart) {
                    insert_giohang($_SESSION['user']['id'], $cart[0], $cart[1], $cart[2], $cart[3], $cart[4], $id_dathang);
                }
                 $_SESSION['mycart'] = [];
                 header("Location: index.php?act=hoadon&id_donhang=$id_dathang");
             }
            $donhang = load_hoadon_user($_SESSION['user']['id']);
            $giohang = load_cart($_SESSION['user']['id']);
             //$sanphamtop5 = loadall_sanpham_top5();
             include("view/thanhtoan.php");
            break;

        case "hoadon":
            if (!isset($_SESSION["user"])) {
                header("Location: index.php");
            }
             if (isset($_GET['id_donhang']) && ($_GET['id_donhang']) > 0) {
                 $giohang = load_cart($_GET['id_donhang']);
             }
            $donhang = loadonedonang();
            include "view/hoadon.php";
            break;

        case "deletecart":
            if (isset($_GET['id'])) {
                array_splice($_SESSION['mycart'], $_GET['id'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            header("Location: index.php?act=addgiohang");
            break;

        default:
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = "";
                $iddm = 0;
            }
            ;
            // $listdanhmuc = loadall_danhmuc();
            // $listsanpham = loadall_sanpham($kyw, $iddm);
             include("home.php");
            break;

    }
} else {
    if (isset($_POST['listok']) && ($_POST['listok'])) {
        $kyw = $_POST['kyw'];
        $iddm = $_POST['iddm'];
    } else {
        $kyw = "";
        $iddm = 0;
    }
    ;
    // $sanphamShop = loadall_shop();
    // $sanphamtop5 = loadall_sanpham_top10();
    // $listdanhmuc = loadall_danhmuc();
    // $listsanpham = loadall_sanpham($kyw, $iddm);

    include("home.php");
}

include("footer.php");
ob_end_flush();
?>