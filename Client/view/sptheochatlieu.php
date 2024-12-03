<?php
// Kiểm tra và gán giá trị cho các biến nếu chưa được xác định
if (!isset($sptheochatlieu)) {
    $sptheochatlieu = []; // Gán mảng rỗng nếu chưa có giá trị
}

if (!isset($ten_chatlieu)) {
    $ten_chatlieu = ''; // Gán chuỗi rỗng nếu chưa có giá trị
}

// Kiểm tra xem biến $sptheochatlieu có phải là mảng không trước khi sử dụng extract
if (is_array($sptheochatlieu)) {
    extract($sptheochatlieu);
}
?>
<div class="main-container no-slidebar">
    <div class="container">
        <div class="row">
            <div class="main-content col-sm-12">
                <div class="shop-top">
                    <div class="shop-top-left">
                        <div class="breadcrumbs">
                            <a href="index.php">Home</a>
                            <span>Chất liệu <?= $ten_chatlieu ?></span>
                        </div>
                    </div>
                </div>
                <ul class="product-list-grid desktop-columns-4 tablet-columns-3 mobile-columns-1 row flex-flow">
                    <?php
                    // Lặp qua danh sách sản phẩm
                    foreach ($listsp_theochatlieu as $sanpham) {
                        $mr = "mr"; // Gán giá trị mặc định cho biến $mr
                        extract($sanpham); // Lấy các giá trị từ $sanpham và gán vào các biến tương ứng
                        $linksp = "index.php?act=chitietsp&id=" . $id;

                        // Hiển thị thông tin sản phẩm
                        echo '<li class="product-item col-xs-12 col-sm-4 col-md-3">
                                <div class="product-inner">
                                    <div class="product-thumb has-back-image">
                                        <form action="index.php?act=addgiohang" method="post">
                                            <input type="hidden" name="id" value="' . $id . '">
                                            <input type="hidden" name="img" value="' . $img . '">
                                            <a href="' . $linksp . '"><img src="../upload_file/' . $img . '" alt=""></a>
                                        </div>

                                        <div class="product-info">
                                            <input type="hidden" name="tensp" class="product-name" value="' . $tensp . '">
                                            <h3 class="product-name"><a href="#">' . $tensp . '</a></h3>
                                            <input type="hidden" name="soluong" value="1">
                                            <input type="hidden" name="giasp" class="price" value="' . $giasp . '">
                                            <span class="price"><ins>' . $giasp . ' ₫</ins></span>
                                            <input type="submit" name="addtocart" onclick="return confirmAddgh()" value="Thêm vào giỏ hàng">
                                        </form>
                                    </div>
                                </div>
                            </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php include 'menu/3hopcn.php'; ?>
<script>
    function confirmAddgh() {
        if (confirm("Bạn muốn thêm sản phẩm này vào giỏ hàng?")) {
            document.location = "index.php?act=listsp";
        } else {
            return false;
        }
    }
</script>
</div>
</div>
