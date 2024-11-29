<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";
include "../../model/sanpham.php";

// Kiểm tra id sản phẩm
if (!isset($_GET['id_sp'])) {
    die("Sản phẩm không tồn tại.");
}

$id_sp = $_GET['id_sp'];

// Kiểm tra người dùng đã đăng nhập hay chưa
if (isset($_SESSION["user"])) {
    $id_nguoidung = $_SESSION["user"]["id"];
} else {
    echo "Vui lòng đăng nhập để bình luận.";
    exit;
}

// Lấy tất cả bình luận của sản phẩm
$listbl = loadall_binhluan($id_sp);
// Lấy thông tin sản phẩm
$sanpham = loadone_sanpham($id_sp);

if (is_array($sanpham)) {
    extract($sanpham);
}

// Nếu người dùng đã đăng nhập và gửi bình luận
if (!empty($_SESSION["user"]) && isset($_POST['guibinhluan']) && !empty($_POST['noidung'])) {

    $noidung = $_POST['noidung'];
    $id_sp = $_POST['id_sp'];
    $id_nguoidung = $_SESSION['user']['id'];
    $ngaybinhluan = date('Y-m-d');  // Ngày bình luận theo định dạng chuẩn

    // Thêm bình luận vào cơ sở dữ liệu
    insert_binhluan($noidung, $id_nguoidung, $id_sp, $ngaybinhluan);
    
    // Sau khi thêm, chuyển hướng lại trang hiện tại (refresh trang)
    header("Location: " . $_SERVER['PHP_SELF'] . "?id_sp=" . $id_sp);
    exit();  // Dừng mã sau khi chuyển hướng
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình luận sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/sanpham.css">
</head>
<body>
    <div class="container mt-3 px-3">
        <h1>Bình luận cho sản phẩm: <?= $sanpham['tensp'] ?></h1>

        <!-- Hiển thị danh sách bình luận -->
        <div class="mt-3">
            <table class="table table-borderless text-center" style="border: 1px solid black; height: 140px;">
                <thead>
                    <tr>
                        <th class="w-5">Người dùng</th>
                        <th class="w-5">Nội dung</th>
                        <th class="w-5">Ngày bình luận</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listbl as $bl) {
                        extract($bl);
                        echo '<tr>
                            <td>' . $nguoidung . '</td>
                            <td>' . $noidung . '</td>
                            <td>' . $ngaybinhluan . '</td>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Form thêm bình luận mới -->
        <form style="margin: 10px 15px;" action="binhluanform.php?id_sp=<?= $id_sp ?>" method="POST">
            <input type="hidden" name="id_sp" value="<?= $id_sp ?>">
            <input type="hidden" name="id_nguoidung" value="<?= $id_nguoidung ?>">

            <div class="mb-3">
                <label for="noidung" class="form-label">Nội dung bình luận:</label>
                <textarea class="form-control" name="noidung" id="noidung" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary" name="guibinhluan">Gửi bình luận</button>
        </form>
    </div>
</body>
</html>
