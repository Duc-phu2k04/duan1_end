<?php
// Sửa đổi để sử dụng include_once để tránh lỗi khai báo lại
include_once __DIR__ . "/../../model/pdo.php";  // Đảm bảo file pdo.php chỉ được include một lần
include_once __DIR__ . "/../../model/binhluan.php";  // Đảm bảo file binhluan.php chỉ được include một lần

// Kiểm tra sự tồn tại của id_sp và tránh lỗi
$id_sp = isset($_REQUEST['id_sp']) ? $_REQUEST['id_sp'] : null; 

// Nếu id_sp không tồn tại thì dừng và thông báo lỗi
if (!$id_sp) {
    die("Không tìm thấy id sản phẩm.");
}

// Lấy tất cả bình luận
$listbinhluan = loadall_binhluan($id_sp);

// Xử lý xóa bình luận nếu có id và id hợp lệ
if (isset($_GET['id']) && ($_GET['id'] > 0)) {
    delete_binhluan($id_sp, $_GET['id']);
    // Sau khi xóa xong, chuyển hướng về trang danh sách bình luận
    header("Location: listbl.php?id_sp=$id_sp");
    exit();
}
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Bình luận</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <br>
            <table id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>STT</th>
                    <th>Tên khách hàng</th>
                    <th>Nội dung</th>
                    <th>Ngày bình luận</th>
                    <th>Hành động</th>
                </tr>

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
            </table>
        </div>
    </div>
</div>

<script>
    function confirmDeletebl() {
        if (confirm("Bạn có muốn xóa bình luận này không")) {
            return true;
        } else {
            return false;
        }
    }
</script>
