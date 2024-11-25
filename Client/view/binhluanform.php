<?php

session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";
include "../../model/sanpham.php";


$id_sp = $_REQUEST['id_sp'];

if(isset($_SESSION["user"])) {
    $id_nguoidung = $_SESSION["user"]["id"];
} else {
    echo "";
}

// if (empty($_SESSION["user"]))  {

// }else {
//     echo"";
// }
$listbl = loadall_binhluan($id_sp);
$sanpham = loadone_sanpham($id_sp);
if(is_array($sanpham)) {
    extract($sanpham);
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../CSS/index.css">
<link rel="stylesheet" href="../CSS/sanpham.css">
<div class="mt-3 px-3">
    <h1>Bình luận</h1>
    <div class="mt-3">
        <table class="table table-borderless text-center" style="border: 1px solid black; height: 140px;">
            <tr>
                <th class="w-5">Người dùng</th>
                <th class="w-5">Nội dung</th>
                <th class="w-5">Ngày bình luận</th>
            </tr>
            <?php
            foreach($listbl as $bl) {
                extract($bl);
                echo '<tr>
                    <td>'.$nguoidung.'</td>
                    <td>'.$noidung.'</td>
                    <td>'.$ngaybinhluan.'</td>
                  </tr>';
            }
            ?>
        </table>
    </div>
</div>

<form style="margin: 10px 15px;" action="binhluanform.php" method="POST">
    <input type="hidden" name="id_sp" value="<?= $id_sp ?>">
    <input type="hidden" name="id_nguoidung" value="<?= $id_nguoidung ?>">

    <input type="text" name="noidung">
    <input type="submit" class="guibl" name="guibinhluan" value="Gửi bình luận">
</form>



<?php
if(!empty($_SESSION["user"])) {

    if(isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {

        $noidung = $_POST['noidung'];
        $id_sp = $_POST['id_sp'];
        $id_nguoidung = $_SESSION['user']['id'];
        $ngaybinhluan = date('d/m/Y');
        insert_binhluan($noidung, $id_nguoidung, $sanpham['id'], $ngaybinhluan);
        header("Location: ".$_SERVER['HTTP_REFERER']);

    }
    
} else {
    echo "";
}
?>