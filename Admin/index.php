<?
include "../model/pdo.php";
include "../model/danhmuc.php";

include "header.php";

if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($variable) {
        //danh mục
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
}
}