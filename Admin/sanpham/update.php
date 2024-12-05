<?php
if (is_array($sanpham)) {
    extract($sanpham);
}
$hinhpath = ".././upload_file/" . $img;
if (is_file($hinhpath)) {
    $img = "<img src='" . $hinhpath . "' height='200'>";
} else {
    $img = "no photo";
}
?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sản phẩm</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Sửa sản phẩm</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <br>
                <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <select name="iddm">
                            <option value="0" seclection>Tất cả</option>
                            <?php
                            foreach ($listdanhmuc as $danhmuc) {
                                extract($danhmuc);
                                $s = ($iddm == $id) ? "selected" : "";
                                echo '<option value="' . $id . '" ' . $s . '>' . $tendm . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Chọn mùa hoặc chất liệu -->
                    <div class="mb-3">

                        <select name="id_sptheochatlieu">
                            <option value="0" seclection>Chất liệu</option>
                            <?php
                            foreach ($listchatlieu as $sptheochatlieu) {
                                extract($sptheochatlieu);
                                $s = ($id_sptheochatlieu == $id_chatlieu) ? "selected" : "";
                                echo '<option value="' . $id_chatlieu . '" ' . $s . '>' . $ten_chatlieu . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Các trường thông tin sản phẩm -->
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="tensp" value="<?= $tensp ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPrice" class="form-label">Giá</label>
                        <input type="text" class="form-control" name="giasp" value="<?= $giasp ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputImg" class="form-label">Ảnh</label>
                        <br>
                        <?= $img ?>
                        <br>
                        <input type="file" class="mt-2" name="hinh">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescribe" class="form-label">Mô tả</label>
                        <textarea class="form-control" rows="10" name="mota"><?= $mota ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescribe" class="form-label">Số lượng</label>
                        <input class="form-control" name="soluong" value="<?= $soluong ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescribe" class="form-label">Lượt xem</label>
                        <input class="form-control" name="luotxem" value="<?= $luotxem ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescribe" class="form-label">Trang thái</label>
                        <br>
                        <input type="hidden" class="form-control" name="trangthai" value="<?= $trangthai ?>">
                        <select name="trangthai" class="form-control" id="trangthai">
                            <option value="">Chọn</option>
                            <option value="0" <?= ($trangthai == 0) ? "selected" : "" ?>>Còn hàng</option>
                            <option value="1" <?= ($trangthai == 1) ? "selected" : "" ?>>Hết hàng</option>
                        </select>
                    </div>

                    <input type="hidden" name="id" value="<?= $sanpham['id']; ?>">
                    <input type="submit" class="btn btn-success" name="capnhat" onclick="return confirmUpdatesp()" value="Cập nhật">
                    <input type="reset" class="btn btn-info" value="Nhập lại">
                    <a href="index.php?act=listsp"><input type="button" class="btn btn-primary" value="Danh sách"></a>

                    <?php
                    if (isset($thongbao) && ($thongbao != ""))
                        echo $thongbao;
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmUpdatesp() {
        if (confirm("Bạn có muốn sửa sản phẩm này không?")) {
            document.location = "index.php?act=listsp";
        } else {
            return false;
        }
    }
</script>

</div>