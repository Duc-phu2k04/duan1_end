<?php
if(is_array($giohang)) {
    extract($giohang);
}
?>
<div class="container">
    <div class="shop-top">
        <div class="shop-top-left">
            <div class="breadcrumbs">
                <a href="index.php?act=tkcanhan">Tài khoản cá nhân</a>
                <span>Chi tiết đơn hàng</span>
            </div>
        </div>
    </div>
    <div class="content-information">
        <div class="login">
            <h1>Chi tiết đơn hàng</h1>
        </div>
        <div class="table">
            <table class="table-bordered" border="1">
                <tr>
                    <th style="padding: 10px; width: 50px;" class="text-center">Mã đơn</th>
                    <th style="padding: 10px; width: 250px;" class="text-center">Tên sản phẩm</th>
                    <th style="padding: 10px; width: 250px;" class="text-center">Ảnh</th>
                    <th style="padding: 10px; width: 250px;" class="text-center">Địa chỉ giao hàng</th>
                    <th style="padding: 10px; width: 100px;" class="text-center">Giá tiền</th>
                    <th style="padding: 10px; width: 100px;" class="text-center">Số lượng</th>
                    <th style="padding: 10px; width: 100px;" class="text-center">Thành tiền</th>
                </tr>
                <?php
                foreach($giohang as $value):
                    extract($value);
                    ?>
                    <tr>
                        <td style="padding: 10px;" class="text-center">
                            <?= $id_donhang ?>
                        </td>
                        <td style="padding: 10px;" class="text-center">
                            <?= $tensp ?>
                        </td>
                        <td style="padding: 10px;" class="text-center"><img src="../upload_file/<?= $img ?>" width="200px"
                                height="150px" style="object-fit: cover" /></td>
                        <td style="padding: 10px;" class="text-center">
                            <?= $diachi ?>
                        </td>
                        <td style="padding: 10px;" class="text-center">
                            <?= $giasp ?>
                        </td>
                        <td style="padding: 10px;" class="text-center">
                            <?= $soluong ?>
                        </td>
                        <td style="padding: 10px;" class="text-center">
                            <?= ((int)$giasp * $soluong) ?>.000 đ
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <h1 style="margin: 15px 0px; font-size: 24px;">Tổng số tiền:
                <?php
                $tong = 0;
                foreach($giohang as $value) {
                    extract($value);
                    $tong += (int)$giasp * $soluong;
                }
                echo '<b>'.$tong.'.000 đ</b>' ?>
            </h1>
        </div>
    </div>
    <div class="btn btn-dark my-3 text-center" style="width: 300px; margin: auto;">
        <a style="color: #fff; text-decoration: none;" href="index.php?act=lichsudathang">Quay lại lịch sử đơn
            hàng</a>
    </div>
</div>