<?php
// Sử dụng include_once để đảm bảo không khai báo lại các file model
include_once __DIR__ . "/../../model/pdo.php";  // Đảm bảo file pdo.php chỉ được include một lần
include_once __DIR__ . "/../../model/binhluan.php";  // Đảm bảo file binhluan.php chỉ được include một lần

// Kiểm tra sự tồn tại của id_sp và tránh lỗi
$id_sp = isset($_GET['id_sp']) ? $_GET['id_sp'] : null;

// Nếu không tìm thấy id_sp, hiển thị thông báo lỗi
if (!$id_sp) {
    die("Không tìm thấy id sản phẩm.");
}

// Lấy tất cả bình luận của sản phẩm có id_sp
$listbinhluan = loadall_binhluan($id_sp);

// Xử lý xóa bình luận nếu có id và id hợp lệ
if (isset($_GET['id']) && ($_GET['id'] > 0)) {
    delete_binhluan($id_sp, $_GET['id']);
    // Sau khi xóa xong, chuyển hướng về trang danh sách bình luận
    header("Location: listbl.php?id_sp=$id_sp");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Bình Luận</title>
    <style>
        /* Cải thiện bảng bình luận */
        .table-responsive {
            margin-top: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow-x: auto;
        }

        /* Tạo kiểu cho bảng */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Cải thiện kiểu cho các tiêu đề bảng */
        table thead {
            background-color: #f8f9fc;
            color: #4e73df;
            text-align: center;
        }

        /* Cải thiện kiểu cho các ô trong bảng */
        table th, table td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        /* Tạo hiệu ứng hover cho các dòng */
        table tr:hover {
            background-color: #f1f1f1;
        }

        /* Cải thiện kiểu cho các ô nội dung */
        table td {
            font-size: 14px;
            color: #333;
            word-wrap: break-word;
        }

        /* Cải thiện kiểu cho các nút "Xóa" */
        input[type="button"] {
            background-color: #e74a3b;
            color: white;
            width: 130px;
            height: 40px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Hiệu ứng khi hover chuột qua nút */
        input[type="button"]:hover {
            background-color: #c0392b;
        }

        /* Cải thiện khoảng cách giữa các phần tử */
        .card-body {
            padding: 20px;
        }

        /* Cải thiện kiểu cho các tiêu đề trong card */
        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #ddd;
            padding: 10px;
        }

        /* Cải thiện kiểu cho phần tử "STT" */
        table th:nth-child(1), table td:nth-child(1) {
            width: 10%;
        }

        /* Cải thiện kiểu cho phần tử "Tên khách hàng" */
        table th:nth-child(2), table td:nth-child(2) {
            width: 20%;
        }

        /* Cải thiện kiểu cho phần tử "Nội dung" */
        table th:nth-child(3), table td:nth-child(3) {
            width: 40%;
            text-align: left;
        }

        /* Cải thiện kiểu cho phần tử "Ngày bình luận" */
        table th:nth-child(4), table td:nth-child(4) {
            width: 20%;
        }

        /* Cải thiện kiểu cho phần tử "Hành động" */
        table th:nth-child(5), table td:nth-child(5) {
            width: 10%;
        }

        /* Cải thiện kiểu cho ô trong bảng khi không có nội dung */
        table td:empty {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Bình luận</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <br>
            <table id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên khách hàng</th>
                        <th>Nội dung</th>
                        <th>Ngày bình luận</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listbinhluan as $key => $binhluan):
                        extract($binhluan);
                        $xoabl = "listbl.php?id_sp=$id_sp&id=" . $id;
                    ?>
                        <tr class="text-center">
                            <td><?= $key + 1 ?></td>
                            <td><?= $nguoidung ?></td>
                            <td><?= $noidung ?></td>
                            <td><?= $ngaybinhluan ?></td>
                            <td>
                                <a href="<?= $xoabl ?>" onclick="return confirmDeletebl()">
                                    <input type="button" class="form-control btn btn-danger mt-2" value="Xóa" style="background-color: red; color: white; width: 130px; height: 40px; border-radius: 5px">
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
        </div>
    </div>
</div>

<script>
    function confirmDeletebl() {
        return confirm("Bạn có muốn xóa bình luận này không?");
    }
</script>

</body>
</html>
